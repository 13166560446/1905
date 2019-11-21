<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;
use App\goods;
use App\brand;
use App\cart;
class OrderController extends Controller
{
   public function paymoney($money){
        // $c_id=request()->c_id;
        
      	$orderinfo=time().rand(100000,999999);
        return view('index.order.paymoney',['money'=>$money,'orderinfo'=>$orderinfo]);
    }
    public function pay(){
    require_once app_path().'/libs/alipay/wappay/service/AlipayTradeService.php';
	require_once app_path().'/libs/alipay/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php';
	$config=config('alipay');
	// dd($config);


	$order=\DB::table('order')->first();
	// dd($order);
    //商户订单号，商户网站订单系统中唯一订单号，必填
  
    $out_trade_no = $order->order_no;

    //订单名称，必填
    $subject = "小粉猪";

    //付款金额，必填
    $total_amount = $order->order_amount;

    //商品描述，可空
    $body = '';

    //超时时间
    $timeout_express="1m";

    $payRequestBuilder = new \AlipayTradeWapPayContentBuilder();
    $payRequestBuilder->setBody($body);
    $payRequestBuilder->setSubject($subject);
    $payRequestBuilder->setOutTradeNo($out_trade_no);
    $payRequestBuilder->setTotalAmount($total_amount);
    $payRequestBuilder->setTimeExpress($timeout_express);

    $payResponse = new \AlipayTradeService($config);
    $result=$payResponse->wapPay($payRequestBuilder,$config['return_url'],$config['notify_url']);

 //    return ;
    }

   
}
