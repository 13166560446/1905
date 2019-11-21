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
    <h2 align="center">分类添加</h2><br>
    <h4 align="center"><a href="{{url('/login/del')}}">退出</a></h4>
    <div class="main-content">


    <div class="page-content">
            <div class="row">


                    <div class="col-xs-12">

                    <form action="{{url('/category/store')}}" method="post" class="form-horizontal" role="form" id="myform">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 分类名称 </label>

                        <div class="col-sm-9">
                            <input type="text" name="cate_name" id="form-field-1" placeholder="分类名称" class="col-xs-10 col-sm-5" />
                            <b style="color:red">@php echo $errors->first('cate_name'); @endphp</b>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 是否展示 </label>

                        <div class="col-sm-9">
                            <input type="radio" name="cate_show" value="1" checked />是
                            <input type="radio" name="cate_show" value="2" />否
                        </div>
                    </div>

                    <div class="space-4"></div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 是否在导航栏展示 </label>

                        <div class="col-sm-9">
                        <input type="radio" name="cate_nav_show" value="1">是
                        <input type="radio" name="cate_nav_show" value="2" checked>否
                        </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 上级分类 </label>

                        <div class="col-sm-9">
                        <select name="parent_id">
                            <option>--请选择--</option>
                        @foreach ($info as $v)
                            <option value="{{$v['cate_id']}}">@php echo str_repeat('&nbsp;&nbsp;',$v['level']*3)@endphp {{$v['cate_name']}}</option>
                        @endforeach
                        </select>
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
                    </div><!-- /span -->
                </div><!-- /row -->

    </div><!-- /.page-content -->
</div><!-- /.main-content -->
</body>
</html>
