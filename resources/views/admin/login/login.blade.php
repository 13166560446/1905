<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href=" /status/admin/css/bootstrap.min.css">
</head>
<body>
   <h2 align="center">登录</h2><hr/>
   <!-- 错误信息显示
	@if ($errors->any())
	<div class="alert alert-danger">
	<ul>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
	</ul>
	</div>
	@endif -->
    <form action="{{url('/login/store')}}" method="post" class="form-horizontal" role="form">
	@csrf{{session('msg')}}
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">账号</label>
		<div class="col-sm-10">
			<input type="text" name='admin_name' class="form-control" id="firstname"
				   placeholder="请输入账号">
			<b style="color:red">@php echo $errors->first('admin_name'); @endphp</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">密码</label>
		<div class="col-sm-10">
			<input type="text" name='admin_pwd' class="form-control" id="lastname"
				   placeholder="请输入密码">
			<b style="color:red">@php echo $errors->first('admin_pwd'); @endphp</b>
		</div>
	</div>

	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">登录</button>
		</div>
	</div>
</form>
</body>
</html>
