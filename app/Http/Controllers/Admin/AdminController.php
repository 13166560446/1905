<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Http\Requests\StoreAdminPost;
use Illuminate\Support\Facades\Cache;
class AdminController extends Controller
{
    public function index()
    {
        $page=request()->page??1;
        $word=request()->word??'';
        $data=Cache::get('data_'.$page.'_'.$word);
        if(!$data){
        $pageSize = config('app.pageSize');

        $word = request()->word;
        $where=[];
        if ($word) {
            $where[]=['admin_name','like',"%$word%"];
        }

        $data = Admin::where($where)->paginate($pageSize);
        Cache::put('data_'.$page.'_'.$word,$data,60*60*24*30);
        }
        $query = request()->all();
        //dd($data);
        return view('admin.admin.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     * 添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in stora
     * ge.
     * 执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(\App\Http\Requests\StoreBrandPost $request){
    public function store(Request $request)
    {

         $post=$request->except('_token');
          $validator = \Validator::make($post, [
            'admin_name' => 'required|alpha_dash|unique:admin',
            'admin_email' => 'required|email|unique:admin',
            'admin_pwd' => 'required|between:4,10'
        ],[
            'admin_name.required' => '账号不能为空',
            'admin_name.alpha_dash' => '账号可以包含字母和数字，以及破折号和下划线',
            'admin_name.unique' => '账号已存在',
            'admin_email.required' => '邮箱不能为空',
            'admin_email.email' => '请用正确的邮箱格式',
            'admin_email.unique' => '邮箱已存在',
            'admin_pwd.required' => '密码不能为空',
            'admin_pwd.between' => '密码必须在4-10之间',
        ]);
        if ($validator->fails()) {
            return redirect('admin/create')
            ->withErrors($validator)
            ->withInput();
        }
        $admin = Admin::create($post);
        if ($admin->admin_id) {
            return redirect('/admin/index');
        }
    }



    /**
     * Display the specified resource.
     * 单个产品介绍
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 编辑页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$id) {
            return;
        }
        $date=Admin::find($id);
        return view('admin.admin.edit',['date'=>$date]);
    }

    /**
     * Update the specified resource in storage.
     * 编辑执行页面
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAdminPost $request, $id)
    {
        //检验
        //接值
        $post=$request->except('_token');
        //dd($post);
        $admin = Admin::where('admin_id',$id)->update($post);

        return redirect('/admin/index');

    }

    /**
     * Remove the specified resource from storage.
     * 删除页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo $id;
        if (!$id) {
            abort(404);
        }
        $res = Admin::where('admin_id',$id)->delete();
        if ($res) {
            return redirect('/admin/index');
        }
    }
}
