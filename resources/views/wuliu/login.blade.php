<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="{{url('/wuliu/logindo')}}" method="post">
	@csrf
		管理员账号: <input type="text" name="admin_name"><br>
		管理员密码: <input type="password" name="admin_pwd"><br>
		<input type="submit" value="登录">
	</form>
</body>
</html>