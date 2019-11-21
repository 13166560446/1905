<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="{{url('wuliu/store')}}" method="post">
	@csrf
		货物名称: <input type="text" name="name"><br>
		货物图片: <input type="file" name="img"><br>
		货物数量: <input type="text" name="number"><br>
		<input type="submit" value="入库">
	</form>
</body>
</html>
