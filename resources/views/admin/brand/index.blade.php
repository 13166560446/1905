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
    <table class="table table-striped">
	<h2 align="center">商品品牌列表</h2><br>
	<h4 align="center"><a href="{{url('/brand/create')}}">添加</a></h4>
	<h4 align="center"><a href="{{url('/login/del')}}">退出</a></h4>
	<hr/>
	<form action="">
		<input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入品牌名称关键字"><button>搜索</button>
	</form>
	<thead>
		<tr>
			<th>品牌ID</th>
            <th>品牌LOGO</th>
			<th>品牌名称</th>
			<th>品牌url</th>
            <th>品牌简介</th>
            <th>状态</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($data as $v)
		<tr>
			<td>{{$v->brand_id}}</td>
			<td><img src="{{env('UPLOAD_URL')}}{{$v->brand_logo}}" width="80"></td>
			<td>{{$v->brand_name}}</td>
            <td>{{$v->brand_url}}</td>
            <td>{{$v->brand_desc}}</td>
            <td>
				<a href="{{url('/brand/edit/'.$v->brand_id)}}" class="btn btn-primary">编辑</a>
				<a href="{{url('/brand/delete/'.$v->brand_id)}}" class="btn btn-danger">删除</a>
			</td>
		</tr>
        @endforeach
	</tbody>
</table>
{{$data->appends($query)->links()}}
</body>
</html>
