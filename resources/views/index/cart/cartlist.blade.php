@extends('layouts.shop')
@section('titel','全国最大珠宝商')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>购物车</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="{{asset('/status/index/images/head.jpg')}}" />
     </div><!--head-top/-->
     <table class="shoucangtab">
      <tr>
       <td width="75%"><span class="hui">购物车共有：<strong class="orange">2</strong>件商品</span></td>
       <td width="25%" align="center" style="background:#fff url(images/xian.jpg) left center no-repeat;">
        <span class="glyphicon glyphicon-shopping-cart" style="font-size:2rem;color:#666;"></span>
       </td>
      </tr>
     </table>
     <tr>
        <td width="100%" colspan="4"><a href="javascript:;"><input type="checkbox" name="1" /> 全选</a></td>
       </tr>
      @foreach ($data as $v)
     <div class="dingdanlist" id="{{$v->cart_id}}" goods_id="{{$v->goods_id}}">
      <table> 
       <tr>
        <td width="4%"><input type="checkbox" name="1" class="box" /></td>
        <td class="dingimg" width="15%"><img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}" /></td>
        <td width="50%">
         <h3>三级分销农庄有机瓢瓜400g</h3>
         <time>下单时间：2015-08-11  13:51</time>
        </td>
        <td align="right"><input type="text" class="spinnerExample" value="{{$v->buy_number}}" /></td>
       </tr>
       <tr>
        <th colspan="4"><strong class="orange">¥{{$v->goods_price*$v->buy_number}}</strong></th>
       </tr>
       <a href="javascript:;" class="del" >删除</a>
      </table>
     </div><!--dingdanlist/-->
     @endforeach
     <div class="dingdanlist">
      <tr>
        <td width="100%" colspan="4"><a href="javascript:;" style="color:blue"> 批量删除</a></td>
       </tr>
     </div><!--dingdanlist/-->
     
     
      <tr>
       <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
       <td width="50%">总计：<strong class="orange" id="money">¥0</strong></td>
       <td width="40%"><a href="javascript:;" id="pay" class="jiesuan">去结算</a></td>
      </tr>
   <script src="{{asset('/status/jquery.js')}}"></script>
   <script>
      $('.del').click(function(){
          var c_id=$(this).parent('div').attr('id');
          var obj=$(this);
          $.post(
            "{{url('cart/cartdel')}}",
            {c_id:c_id,_token:"{{csrf_token()}}"},
            function(res){
              if(res==1){
                obj.parent("div").hide();
              }
            },
           
          )
      })
      $('.spinnerExample').blur(function(){
          var _this=$(this);
          var buy_number=$(this).val();
          var c_id=$(this).parents('div').attr('id');
          var reg=/^\d+$/;
          if(!reg.test(buy_number)||parseInt(buy_number)<=0){
            buy_number=1;
            _this.val(buy_number);
          }else if(parseInt(buy_number)>=8000){
            buy_number=8000
            _this.val(buy_number);
          }else{
            buy_number=parseInt(buy_number);
            _this.val(buy_number);
          }
          //改变文本框的值
          changeNum(c_id,buy_number);
          getTotal(c_id,_this);
          checkedTr(_this);
          getCount();
      })
      $('.box').click(function(){
          getCount();
      })
      function changeNum(c_id,buy_number){
            $.ajax({
              method:'post',
              url:"{{url('cart/changeNum')}}",
              data:{buy_number:buy_number,c_id:c_id,_token:"{{csrf_token()}}"},
              async:false,
              dataType:'json'
            }).done(function(res){
              
            });
        }
      //获取小计
        function getTotal(c_id,_this){
          $.post(
            "{{url('cart/getTotal')}}",
            {c_id:c_id,_token:"{{csrf_token()}}"},
            function(res){
              _this.parents('tr').next('tr').find('strong').text("¥"+res);
            }

            );
        }
        //获取总价
        function getCount(){
          //获取选中的复选框的  商品id
          var _box=$(".box:checked");
          var c_id='';
          _box.each(function(index){
            c_id+=$(this).parents('div').attr('id')+',';
          });
          c_id=c_id.substr(0,c_id.length-1);//去除右边','

          //求总价
          $.post(
            "{{url('cart/getCount')}}",
            {c_id:c_id,_token:"{{csrf_token()}}"},
            function(res){
              // console.log(res);
              $("#money").text("¥"+res);
            }
            );
        }
        //给当前选中  复选框选中
        function checkedTr(_this){  
          _this.parents('tr').find("input[class='box']").prop('checked',true);
        }
        //点击确认结算
        $("#pay").click(function(){
            var _box=$(".box:checked");
          var goods_id='';
          _box.each(function(index){
            goods_id+=$(this).parents('div').attr('goods_id')+',';
          });
          goods_id=goods_id.substr(0,goods_id.length-1);//去除右边','
          if(goods_id==''){
            alert('至少选择一件商品进行结算');
            return false;
          }
          
          location.href="{{url('cart/pay')}}?goods_id="+goods_id;
        })
   </script>  
        
@include('index.public.footer');
     
   @endsection