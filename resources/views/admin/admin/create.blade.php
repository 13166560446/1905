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
	<h2 align="center">管理员添加</h2><hr/>
	<h4 align="center"><a href="{{url('/login/del')}}">退出</a></h4>
    <form action="{{url('/admin/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员账号</label>
		<div class="col-sm-10">
			<input type="text" name='admin_name' class="form-control" id="firstname"
				   placeholder="请输入账号">
			<b style="color:red">@php echo $errors->first('admin_name'); @endphp</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">管理员密码</label>
		<div class="col-sm-10">
			<input type="text" name='admin_pwd' class="form-control" id="lastname"
				   placeholder="请输入密码">
			<b style="color:red">@php echo $errors->first('admin_pwd'); @endphp</b>
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">管理员邮箱</label>
		<div class="col-sm-10">
			<input type="text" name='admin_email' class="form-control" id="lastname"
				   placeholder="请输入邮箱">
			<b style="color:red">@php echo $errors->first('admin_email'); @endphp</b>
		</div>
	</div>


	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>
