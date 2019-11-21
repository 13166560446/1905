<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;
use App\goods;
use App\brand;
class GoodsController extends Controller
{
    public function index($id){	
        $cate_id=$id;
        if(empty($cate_id)){
            $where=[];
        }else{
            $cateinfo=category::get();
            $c_id=getcateid($cateinfo,1);
            $where=
                ['cate_id',$c_id]
            ;

        }
        // dd($c_id);
        $goodsinfo=goods::where('cate_id','in',[60,21,22])->get();
        // dd($goodsinfo);
        return view('index.goods.index',['goodsinfo'=>$goodsinfo]);
    }

    public function detail($id){
        $data=goods::where('goods_id',$id)->first();
        // dd($data);
        return view('index.goods.detail',['data'=>$data]);
    }
   
}
