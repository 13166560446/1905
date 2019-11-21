<?php

namespace App\Http\Controllers\Wuliu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin;
use App\wuliu;
class IndexController extends Controller
{
   public function admin(){
    return view('wuliu.admin');
   }
   public function logindo(){
    $post=request()->except('_token');
    $res=admin::where($post)->first();
    // dd($res);
        if($res){
            session(['users'=>$res]);
            return redirect()->intended('/wuliu/index');
        }else{
            return redirect('/wuliu/logindo')->with('msg','登录失败');
        }   
   } 
   public function index(){
    $data=wuliu::get();
    // dd($data);
    return view('wuliu.index',['data'=>$data]);
   }
   public function create(){
    return view('wuliu.create');
   }
   public function store(){
    $post=request()->except('_token');
    $post['time']=time();
    $id = wuliu::create($post);
        if ($id->id) {
            return redirect('/wuliu/index');
        }
   }
   
}
