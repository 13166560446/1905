<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;
use App\goods;
class IndexController extends Controller
{
    public function index(){
    	$info=category::where('parent_id',0)->get();
    	// dd($info);
    	$data=goods::limit(8)->get();
    	// dd($data);
    	return view('index.index.index',['info'=>$info,'data'=>$data]);
    }
    public function login(){
    	return view('index.login.login');
    }
    public function reg(){
    	return view('index.login.reg');
    }
}
