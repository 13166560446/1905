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
	<h2 align="center">商品信息添加</h2><hr/>
	<h4 align="center"><a href="{{url('/login/del')}}">退出</a></h4>
	<!--错误信息显示
	@if ($errors->any())
	<div class="alert alert-danger">
	<ul>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
	</ul>
	</div>
	@endif -->

    <form class="form-horizontal" role="form" method="post" action="{{url('goods/store')}}" enctype="multipart/form-data">
		@csrf			<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品名称 </label>

						<div class="col-sm-9">
							<input type="text" name="goods_name" id="form-field-1" placeholder="商品名称" class="col-xs-10 col-sm-5" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 商品价格 </label>

						<div class="col-sm-9">
							<input type="text" name="goods_price" id="form-field-2" placeholder="商品价格" class="col-xs-10 col-sm-5" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-5"> 商品库存 </label>

						<div class="col-sm-9">
							<input type="text" name="goods_num" id="form-field-5" placeholder="商品库存" class="col-xs-10 col-sm-5" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 所属分类 </label>

						 <div class="col-sm-9">
                        <select name="cate_id">
                            <option>--请选择--</option>
                        @foreach ($info as $v)
                            <option value="{{$v['cate_id']}}">@php echo str_repeat('&nbsp;&nbsp;',$v['level']*3)@endphp {{$v['cate_name']}}</option>
                        @endforeach
                        </select>
                        </div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 商品品牌 </label>

						<div class="col-sm-9">
							<select name="brand_id">
							@foreach ($BInfo as $v)
								<option value="{{$v['brand_id']}}">{{$v['brand_name']}}</option>
							@endforeach
							</select>
						</div>
					</div>

					<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 是否新品 </label>

						<div class="col-sm-9">
							<input type="radio" name="is_new" value="1" checked/>是
							<input type="radio" name="is_new" value="2" />否
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 是否精品 </label>

						<div class="col-sm-9">
							<input type="radio" name="is_best" value="1" checked/>是
							<input type="radio" name="is_best" value="2" />否
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 是否热销 </label>

						<div class="col-sm-9">
							<input type="radio" name="is_hot" value="1" checked/>是
							<input type="radio" name="is_hot" value="2" />否
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 是否上架 </label>

						<div class="col-sm-9">
							<input type="radio" name="is_up" value="1" checked/>是
							<input type="radio" name="is_up" value="2" />否
						</div>
					</div>


					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 商品图片 </label>

						<div class="col-sm-9">
							<input type="file" name="goods_img" id="form-field-3" />
						</div>
					</div>

					<!-- <div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 商品相册 </label>

						<div class="col-sm-9">
							<input type="file" name="imgs" id="form-field-4" multiple/>
						</div>
					</div> -->

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 商品详情 </label>

						<div class="col-sm-9">
							<textarea id="editor" name="goods_desc"></textarea>
						</div>
					</div>



					<div class="clearfix form-actions">
						<div class="col-md-offset-3 col-md-9">
							<button class="btn btn-info" type="submit">
								<i class="icon-ok bigger-110"></i>
								增加
							</button>

							&nbsp; &nbsp; &nbsp;
							<button class="btn" type="reset">
								<i class="icon-undo bigger-110"></i>
								重置
							</button>
						</div>
					</div>

					<div class="hr hr-24"></div>

				</form>

</body>
</html>
