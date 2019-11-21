<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;
use App\goods;
use App\Cart;
use DB;
class CartController extends Controller
{
    public function addcart(){
         $goods_id=request()->goods_id;
         $goods_price=request()->goods_price;
         $buy_number=request()->number;
         $user_id=session('user.id');
        $this->addcartDb($goods_id,$goods_price,$buy_number,$user_id);
        

    }
    public function addcartDb($goods_id,$goods_price,$buy_number,$user_id){
        
        $where=[
            ['user_id','=',$user_id],
            ['goods_id','=',$goods_id]
        
        ];
        $cartinfo=Cart::where($where)->first();
        if(empty($cartinfo)){
            $arr=['goods_id'=>$goods_id,'buy_number'=>$buy_number,'user_id'=>$user_id,'add_time'=>time(),'add_price'=>$goods_price];
            $res=cart::create($arr);
        }else{
            $buy_number=$buy_number+$cartinfo['buy_number'];
            $res=cart::where($where)->update(['buy_number'=>$buy_number,'add_time'=>time()]);
        }
    }
    public function cartlist(){
        $user_id=session('user.id');
        $where=[
            ['user_id','=',$user_id],
            ['is_del','=',1]
        ];
        $data = Cart::join('goods','goods.goods_id','=','cart.goods_id')->where($where)->get();
       // dd($data);
        return view('index.cart.cartlist',['data'=>$data]);
    }

    public function cartdel(){
        $c_id=request()->c_id;
        $res=cart::where('cart_id',$c_id)->update(['is_del'=>2]);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    public function changeNum(){
         $c_id=request()->c_id;
        $buy_number=request()->buy_number;
         $arr=['buy_number'=>$buy_number];
         $res=cart::where('cart_id',$c_id)->update($arr);
    }
    public function getTotal(){
        $c_id=request()->c_id;
        $goods_price=cart::where('cart_id',$c_id)->value('add_price');
        $buy_number=cart::where('cart_id',$c_id)->value('buy_number');
        return $goods_price*$buy_number;
    }
    public function getCount(){
        $c_id=request()->c_id;
        $c_id=explode(',',$c_id);
        $info=cart::where('is_del',1)->whereIn('cart_id',$c_id)->get();
        $money=0;
        foreach($info as $k=>$v){
            $money+=$v['add_price']*$v['buy_number'];
        }
        return $money;
    }
    public function pay(){
        $goods_id=request()->goods_id;
        $goods_id=explode(',',$goods_id);
        $info=goods::leftjoin('cart','goods.goods_id','=','cart.goods_id')->whereIn('goods.goods_id',$goods_id)->get();
        $money=0;
        foreach($info as $k=>$v){
            $money+=$v['add_price']*$v['buy_number'];
        }
        return view('index.cart.pay',['info'=>$info,'money'=>$money]);
    }
   
}
