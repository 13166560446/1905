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
	<h4 align="center"><a href="{{url('/goods/create')}}">添加</a></h4>
	<h4 align="center"><a href="{{url('/login/del')}}">退出</a></h4>
	<hr/>
	<form action="">
		<input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入品牌名称关键字"><button>搜索</button>
	</form>
	<thead>
		<tr>
			<th>商品id</th>
            <th>商品名称</th>
            <th>价格</th>
            <th>库存</th>
            <th>图片</th>
            <th>相册</th>
            <th>新品</th>
            <th>精品</th>
            <th>热卖</th>
            <th>上架</th>
            <th>品牌</th>
            <th>分类</th>
            <th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($data as $v)
		<tr>
			<th>{{$v->goods_id}}</th>
            <th>{{$v->goods_name}}</th>
            <th>{{$v->goods_price}}</th>
            <th>{{$v->goods_num}}</th>
            <th><img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}" width="80"></th>
            <td>{{$v->is_new==1?'√':'×'}}</td>
            <td>{{$v->is_best==1?'√':'×'}}</td>
            <td>{{$v->is_hot==1?'√':'×'}}</td>
            <td>{{$v->is_up==1?'√':'×'}}</td>
            <td>{{$v->brand_name}}</td>
            <td>{{$v->cate_name}}</td>

            <td>
				<a href="{{url('/goods/edit/'.$v->goods_id)}}" class="btn btn-primary">编辑</a>
				<a href="{{url('/goods/delete/'.$v->goods_id)}}" class="btn btn-danger">删除</a>
			</td>
		</tr>
        @endforeach
	</tbody>
</table>
{{$data->appends($query)->links()}}
</body>
</html>
