@extends('layouts.shop')
@section('titel','注册')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="{{asset('/status/index/images/head.jpg')}}" />
     </div><!--head-top/-->
     <form action="{{url('/regdo')}}" method="get" class="reg-login">
      <h3>已经有账号了？点此<a class="orange" href="{{url('/login')}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" placeholder="输入手机号码或者邮箱号" id="email" name="email" /><b style="color:red">@php echo $errors->first('email'); @endphp</b></div>
       <div class="lrList2"><input type="text" placeholder="输入短信验证码" name="remember_token" /><b style="color:red">@php echo $errors->first('remember_token'); @endphp</b> <button><a href="javascript:;" id="sendEmail" >获取验证码</a></button></div>
       <div class="lrList"><input type="text" placeholder="设置新密码（6-18位数字或字母）" name="password" /><b style="color:red">@php echo $errors->first('password'); @endphp</b></div>
       <div class="lrList"><input type="text" placeholder="再次输入密码" name="pwd2" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即注册" />
      </div>
     </form><!--reg-login/-->
     <script src="{{asset('/status/jquery.js')}}"></script>
   <script>
      $('#sendEmail').click(function(){
        var email=$("#email").val();
        $.post(
            "{{url('/login2')}}",
            {email:email,_token:"{{csrf_token()}}"},
            function(res){
              alert(res.font);
            },
            'json'
          )
      })
   </script>   
 @include('index.public.footer');
     
   @endsection
   