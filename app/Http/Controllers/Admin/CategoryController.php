<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Category;
use App\Http\Requests\StoreCategoryPost;
use Illuminate\Support\Facades\Cache;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * 列表展示页面
     * @return \Illuminate\Http\Response
     */
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
            $where[]=['cate_name','like',"%$word%"];
        }

        $data = Category::where($where)->paginate($pageSize);
        Cache::put('data_'.$page.'_'.$word,$data,60*60*24*30);
        }
        $query = request()->all();
        //dd($data);
        return view('admin.Category.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     * 添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Cate_Info = Category::get()->toArray();
        //dd($Cate_Info);
        $info = getCateInfo($Cate_Info);
        //dd($info);
        return view('admin.category.create',['info'=>$info]);
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
        //第一种方法
        // $request->validate([
        //     'brand_name' => 'required|unique:brand',
        //     'brand_url' => 'required',
        // ],[
        //     'brand_name.required' => '品牌名称不能为空',
        //     'brand_name.unique' => '品牌名称已存在',
        //     'brand_url.required' => '品牌网址不能为空',
        //     'brand_url.unique' => '品牌网址已存在',
        // ]);

        $post=$request->except('_token');
        // 第三种方法
        $validator = \Validator::make($post, [
            'cate_name' => 'required|unique:category',
        ],[
            'cate_name.required' => '分类名称不能为空',
            'cate_name.unique' => '分类名称已存在',
        ]);
        if ($validator->fails()) {
            return redirect('category/create')
            ->withErrors($validator)
            ->withInput();
        }


        //  dd($post);
        $cate = Category::create($post);
        if ($cate->cate_id) {
            return redirect('/category/index');
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
        $date=Category::find($id);
        return view('admin.category.edit',['date'=>$date]);
    }

    /**
     * Update the specified resource in storage.
     * 编辑执行页面
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $post=$request->except('_token');
        $cate = Category::where('cate_id',$id)->update($post);
        return redirect('/category/index');
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
        // //DB 删除
        // $res = DB::table('brand')->where('brand_id',$id)->delete();
        // $res = Brand::destroy($id);
        $res = Category::where('cate_id',$id)->delete();
        if ($res) {
            return redirect('/category/index');
        }
    }
}
