<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //主键
    public $primaryKey='cart_id';
    //表名
    protected $table = 'cart';
    //去除自主创建的时间
    public $timestamps = false;
    //白名单  表设计中不允许为空的
    protected $guarded = [];
}
