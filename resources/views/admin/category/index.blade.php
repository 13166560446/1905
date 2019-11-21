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
	<h2 align="center">商品分类列表</h2><br>
	<h4 align="center"><a href="{{url('/category/create')}}">添加</a></h4>
	<h4 align="center"><a href="{{url('/login/del')}}">退出</a></h4>
	<hr/>
	<form action="">
		<input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入品牌名称关键字"><button>搜索</button>
	</form>
	<thead>
		<tr>
			<th>分类ID</th>
            <th>分类名称</th>
			<th>是否展示</th>
			<th>是否在导航栏展示</th>
            <th>状态</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($data as $v)
		<tr>
			<td>{{$v->cate_id}}</td>
			<td>{{$v->cate_name}}</td>
            <td>{{$v->cate_show}}</td>
            <td>{{$v->cate_nav_show}}</td>
            <td>
				<a href="{{url('/category/edit/'.$v->cate_id)}}" class="btn btn-primary">编辑</a>
				<a href="{{url('/category/delete/'.$v->cate_id)}}" class="btn btn-danger">删除</a>
			</td>
		</tr>
        @endforeach
	</tbody>
</table>
{{$data->appends($query)->links()}}
</body>
</html>
