<?php
//公共函数
	//无限极分类
	function getCateInfo($Cate_Info,$parent_id=0,$level=0){
		static $info=[];//定义静态数组，让查询下一级可以不断赋值
		foreach ($Cate_Info as $k => $v) {
				//print_r($v);所有数据
			if($v['parent_id']==$parent_id){
				// print_r($v);
				$v['level']=$level;
				$info[]=$v;
				getCateInfo($Cate_Info,$v['cate_id'],$level+1);//拿到顶级分类下的子类数据
				// print_r($info);
			}
		}
		return $info;
    }




    // // session的使用
    //    // 设置session
    //     //session(['user'=>'zhangsan']);
    //     //request()->session()->put('username', 'lisi');

    //    //获取
    //     //echo session('user');
    //    // echo request()->session()->get('username');
    //     //删除
    //     //session(['user'=>null]);
    //     //echo request()->session()->pull('username');//先获取再删除

    //    // request()->session()->forget('username');//删除单个
    //     request()->session()->flush();//删除所有
    //     dump(session('user'));
    //     dd(session('username'));


//查询id
function getcateid($goodsinfo,$parent_id){
    static $c_id=[];
    // $c_id['parent_id']=$parent_id;
    foreach($goodsinfo as $k=>$v){
        if($v['parent_id']==$parent_id){
            $c_id[$v['cate_id']]=$v['cate_id'];
            getcateid($goodsinfo,$v['cate_id']);
        }
    }
    return $c_id;
}