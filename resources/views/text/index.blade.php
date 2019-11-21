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
	<h4 align="center"><a href="{{url('/text/create')}}">添加</a></h4>
	<h4 align="center"><a href="{{url('/login/del')}}">退出</a></h4>
	<hr/>
	<form action="">
		<input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入标题关键字">
        <select name="cate_id" id="">
            <option value="">--请选择--</option>
            @foreach ($info as $v)
                <option value="{{$v['cate_id']}}">@php echo str_repeat('&nbsp;&nbsp;',$v['level']*3)@endphp {{$v['cate_name']}}</option>
            @endforeach
        </select>
        <button>搜索</button>
	</form>
	<thead>
		<tr>
			<th>文章ID</th>
            <th>文章标题</th>
			<th>文章分类</th>
			<th>文章重要性</th>
            <th>文章展示</th>
            <th>文章作者</th>
            <th>文章email</th>
            <th>关键字</th>
            <th>文章描述</th>
            <th>文章LOGO</th>
            <th>状态</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($data as $v)
		<tr id="{{$v->id}}">
			<th>{{$v->id}}</th>
            <th>{{$v->title}}</th>
			<th>{{$v->cate_name}}</th>
			<th>@if ($v->zhongyao==1)普通 @else 置顶 @endif</th>
            <th>@if ($v->zhanshi==1)显示 @else 不显示 @endif</th>
            <th>{{$v->zuozhe}}</th>
            <th>{{$v->email}}</th>
            <th>{{$v->guanjian}}</th>
            <th>{{$v->miaoshu}}</th>
            <th><img src="{{env('UPLOAD_URL')}}{{$v->img}}" width="80"></th>
            <td>
				<a href="{{url('/text/edit/'.$v->id)}}" class="btn btn-primary">编辑</a>
				<button class="btn btn-danger" id="del">删除</button>
			</td>
		</tr>
        @endforeach
	</tbody>
</table>
{{$data->appends($query)->links()}}
</body>
</html>
<script src="{{asset('/status/jquery.js')}}"></script>
<script>
	$('#del').click(function() {
        // alert(11111);
        if(window.confirm('是否确认删除?')){
            var _this=$(this);//
            var id=_this.parents('tr').attr('id');
            location.href="{{url('/text/delete/'.$v->id)}}";
        }

	});


</script>
