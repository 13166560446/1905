<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user;
class LoginController extends Controller
{
    public function index(){
    	$email=request()->email;
    	$code=rand(100000,999999);
    	$message='您正在注册全国最大珠宝商会员,验证码是:'.$code;
    	//发送邮件
    	$res=$this->sendEmail($email,$message);
    	if(!$res){
            echo json_encode(['font'=>'发送成功','code'=>1]);
        }else{
            echo json_encode(['font'=>'发送失败','code'=>2]);exit;
        }
    }
    public function sendEmail($email,$message){
        \Mail::raw($message ,function($message)use($email){
        //设置主题
            $message->subject("欢迎注册潘潘有限公司");
        //设置接收方
            $message->to($email);
        });
       }
    public function regdo(){
    	$post=request()->all();
    	$validator = \Validator::make($post, [
            'email' => 'required|unique:users',
            'password' => 'required|unique:users',
        ],[
            'email.required' => '手机号码或邮箱不能为空',
            'email.remember_token' => '验证码不能为空',
            'email.unique' => '手机号码或邮箱已存在',
            'password.required' => '密码不能为空',
            // 'brand_url.url' => '请写出正确的网址信息',
        ]);
        if ($validator->fails()) {
            return redirect('/reg')
            ->withErrors($validator)
            ->withInput();
        }
        $user =User::create($post);
        if ($user->id) {
            return redirect('/login');
        }


    }
    public function logindo(){
        // $email=request()->email();
        // $password=request()->password();
        $post=request()->all();
        $res=user::where($post)->first();
        if($res){
            session(['user'=>$res]);
            return redirect()->intended('/');
        }else{
            return redirect('/login')->with('msg','登录失败');
        }   
    }
  
}
