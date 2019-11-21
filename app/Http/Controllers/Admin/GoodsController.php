<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Goods;
use App\Category;
use App\Brand;
use App\Http\Requests\StoreGoodsPost;
use Illuminate\Support\Facades\Cache;
class GoodsController extends Controller
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
            $where[]=['goods_name','like',"%$word%"];
        }

        // $data = Goods::where($where)->paginate($pageSize);
        $query = request()->all();
        // //dd($data);
        // return view('admin.goods.index',['data'=>$data,'query'=>$query]);
        $data=DB::table('goods')
            ->join('brand', 'goods.brand_id', '=', 'brand.brand_id')
            ->join('category', 'goods.cate_id', '=', 'category.cate_id')
            ->select('goods.*', 'category.cate_name', 'brand.brand_name')
            ->where($where)->paginate($pageSize);
        Cache::put('data_'.$page.'_'.$word,$data,60*60*24*30);
        }
        // dd($goodsInfo);

         return view('admin.goods.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     * 添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $BInfo = Brand::get();
        $Cate_Info = Category::get()->toArray();
        //dd($Cate_Info);
        $info = getCateInfo($Cate_Info);
        //dd($info);
        return view('admin.goods.create',['info'=>$info,'BInfo'=>$BInfo]);
    }

    /**
     * Store a newly created resource in stora
     * ge.
     * 执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(\App\Http\Requests\StoreBrandPost $request){
    public function store(request $request)
    {
        $post = $request->except('_token');

        if ($request->hasFile('goods_img')) {
            $post['goods_img'] = $this->upload('goods_img');
        }
         //dd($post);
        $goods = Goods::create($post);
        //dd($goods);
        if ($goods->goods_id) {
            return redirect('/goods/index');
        }

    }
    //图片
    public function upload($filename){
        if (request()->file($filename)->isValid()){
            $photo = request()->file($filename);
            $store_result = $photo->store('photos');
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
       $goodsInfo=goods::find($id);
        $brandInfo=Brand::all();
        $Cate_Info = Category::get()->toArray();
        //dd($Cate_Info);
        $cateInfo = getCateInfo($Cate_Info);
        return view('admin.goods.edit',['brandInfo'=>$brandInfo,'cateInfo'=>$cateInfo,'goodsInfo'=>$goodsInfo]);
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
        $data=$request->except('_token');
        $res=goods::where('goods_id',$id)->update($data);
        if($res){
            return redirect('goods/index');
        }
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
        $res = Goods::where('goods_id',$id)->delete();
        if ($res) {
            return redirect('/goods/index');
        }
    }
}
