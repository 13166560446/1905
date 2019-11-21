<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //主键
    public $primaryKey='brand_id';
    //表名
    protected $table = 'brand';
    //去除自主创建的时间
    public $timestamps = false;
    //白名单  表设计中不允许为空的
    protected $guarded = [];
}
