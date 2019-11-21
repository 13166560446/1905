<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Brand;
use App\Http\Requests\StoreBrandPost;
use Illuminate\Support\Facades\Cache;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     * 列表展示页面
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $page=request()->page??1;
        $word=request()->word??'';
        $data=Cache::get('data_'.$page.'_'.$word);
        if(!$data){
        echo 'dd====';
        $pageSize = config('app.pageSize');

        $word = request()->word;
        $where=[];
        if ($word) {
            $where[]=['brand_name','like',"%$word%"];
        }

        $data = Brand::where($where)->paginate($pageSize);
        Cache::put('data_'.$page.'_'.$word,$data,60*60*24*30);
        }
        $query = request()->all();
        //dd($data);
        return view('admin.brand.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     * 添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
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
            'brand_name' => 'required|alpha_dash|unique:brand',
            'brand_url' => 'required|unique:brand',
        ],[
            'brand_name.required' => '品牌名称不能为空',
            'brand_name.alpha_dash' => '品牌名称可以包含字母和数字，以及破折号和下划线',
            'brand_name.unique' => '品牌名称已存在',
            'brand_url.required' => '品牌网址不能为空',
            'brand_url.unique' => '品牌网址已存在',
            // 'brand_url.url' => '请写出正确的网址信息',
        ]);
        if ($validator->fails()) {
            return redirect('brand/create')
            ->withErrors($validator)
            ->withInput();
        }

        // unset($post['_token']);
        //dd($post);
        // $res=DB::table('brand')->insert($post);
        //文件上传
        // dump($post);
        if ($request->hasFile('brand_logo')) {
            $post['brand_logo'] = $this->upload('brand_logo');
        }
        //  dd($post);
        $brand = Brand::create($post);
        if ($brand->brand_id) {
            return redirect('/brand/index');
        }
    }
    public function upload($filename){
        if (request()->file($filename)->isValid()){
            $photo = request()->file($filename);
            $store_result = $photo->store('photo');
            return $store_result;
        }
            exit('未获取到上传文件或上传过程出错');
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
        $date=Brand::find($id);
        return view('admin.brand.edit',['date'=>$date]);
    }

    /**
     * Update the specified resource in storage.
     * 编辑执行页面
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBrandPost $request, $id)
    {
        //检验
        //接值
        $post=$request->except('_token');
        //有无文件上传
        if ($request->hasFile('brand_logo')) {
            $post['brand_logo'] = $this->upload('brand_logo');
        }
        $brand = Brand::where('brand_id',$id)->update($post);

        return redirect('/brand/index');

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
        $res = Brand::where('brand_id',$id)->delete();
        if ($res) {
            return redirect('/brand/index');
        }
    }
}
