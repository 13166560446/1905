<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('/text/update/'.$text->id)}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章标题</label>
		<div class="col-sm-10">
			<input type="text" name='title' class="form-control" id="firstname"
				   placeholder="请输入标题" value="{{$text->title}}">
			<b style="color:red">@php echo $errors->first('title'); @endphp</b>
		</div>
	</div>
	<!-- <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">文章分类</label>
		<div class="col-sm-10">
            <select name="cate_id" id="cate_id">
                <option value="">--请选择--</option>
                @foreach ($info as $v)
                    <option value="{{$v['cate_id']}}">@php echo str_repeat('&nbsp;&nbsp;',$v['level']*3)@endphp {{$v['cate_name']}}</option>
                @endforeach
            </select>
			<b style="color:red">@php echo $errors->first('cate_id'); @endphp</b>
		</div>
	</div> -->

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">文章的重要性</label>
		<div class="col-sm-10">
			@if ($text->zhongyao==1)
            <input type="radio" name="zhongyao" value="1" checked>普通
            <input type="radio" name="zhongyao" value="2" >置顶
            @else
            <input type="radio" name="zhongyao" value="1">普通
            <input type="radio" name="zhongyao" value="2" checked>置顶
            @endif
			<b style="color:red">@php echo $errors->first('zhongyao'); @endphp</b>
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">是否展示</label>
		<div class="col-sm-10">
            @if ($text->zhanshi==1)
			<input type="radio" name='zhanshi' value='1' checked>显示
            <input type="radio" name='zhanshi' value='2'>不显示
            @else
            <input type="radio" name='zhanshi' value='1'>显示
            <input type="radio" name='zhanshi' value='2' checked>不显示
            @endif
			<b style="color:red">@php echo $errors->first('zhanshi'); @endphp</b>
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">文章作者</label>
		<div class="col-sm-10">
			<input type="text" name="zuozhe" value="{{$text->zuozhe}}">
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">文章email</label>
		<div class="col-sm-10">
			<input type="text" name="email" value="{{$text->email}}">
			<b style="color:red">@php echo $errors->first('email'); @endphp</b>
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">关键字</label>
		<div class="col-sm-10">
			<input type="text" name="guanjian" value="{{$text->guanjian}}">
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">网页描述</label>
		<div class="col-sm-10">
			<textarea name="miaoshu" cols="30" rows="10">{{$text->miaoshu}}</textarea>
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">文件上传</label>
		<div class="col-sm-10">
            <img src="{{env('UPLOAD_URL')}}{{$text->img}}" width="80" >
			<input type="file" name='img' class="form-control" id="lastname">
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
<script src="{{asset('/status/jquery.js')}}"></script>
<script>
	$('#firstname').blur(function() {
		// alert(1111);
        $(this).next().remove();
        var name = $(this).val();
        var reg = /^(?!_)(?!.*?_$)[a-zA-Z0-9_\u4e00-\u9fa5]+$/;
        if (!reg.test(name)) {
            $(this).after("<p style=color:red;>标题可以包含字母和数字，以及破折号和下划线</p>")
		}
	});
</script>
