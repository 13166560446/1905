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
<!-- 错误信息显示 -->
	<!-- @if ($errors->any())
	<div class="alert alert-danger">
	<ul>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
	</ul>
	</div>
	@endif -->
	<h2 align="center">品牌信息编辑</h2><hr/>
	<h4 align="center"><a href="{{url('/login/del')}}">退出</a></h4>
    <form action="{{url('/brand/update/'.$date->brand_id)}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌名称</label>
		<div class="col-sm-10">
			<input type="text" name='brand_name' class="form-control" id="firstname"
				   placeholder="请输入品牌名称" value="{{$date->brand_name}}">
			<b style="color:red">@php echo $errors->first('brand_name'); @endphp</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">品牌网址</label>
		<div class="col-sm-10">
			<input type="text" name='brand_url' class="form-control" id="lastname"
				   placeholder="请输入品牌网址" value="{{$date->brand_url}}">
			<b style="color:red">@php echo $errors->first('brand_url'); @endphp</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">品牌LOGO</label>
		<div class="col-sm-10">
            <img src="{{env('UPLOAD_URL')}}{{$date->brand_logo}}" width="80" >
			<input type="file" name='brand_logo' class="form-control" id="lastname">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">品牌介绍</label>
		<div class="col-sm-10">
			<textarea class="form-control" name="brand_desc" rows="3">{{$date->brand_desc}}</textarea>
		</div>
	</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">提交</button>
		</div>
	</div>
</form>

</body>
</html>
