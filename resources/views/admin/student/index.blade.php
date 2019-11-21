<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>姓名</td>
			<td>班级</td>
		</tr>
		@foreach ($data as $v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td>{{$v->class}}</td>
		</tr>
		@endforeach
	</table>
	{{$data->links()}}
</body>
</html>