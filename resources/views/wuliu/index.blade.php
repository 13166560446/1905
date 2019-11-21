<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="">
	</form>
	<a href="{{url('wuliu/create')}}">货物入库</a>
	<table border="1">
		<tr>
			<td>货物id</td>
			<td>货物名称</td>
			<td>货物图片</td>
			<td>货物的数量</td>
			<td>入库时间</td>
			<td>操作</td>
		</tr>
		@foreach ($data as $v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td>{{$v->img}}</td>
			<td>{{$v->number}}</td>
			<td>{{$v->time}}</td>
			<td><a href="">出库</a></td>
		</tr>
		@endforeach
		</table>
	
</body>
</html>