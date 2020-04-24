<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //指定表名
    protected $table = 'book';
    //指定主键
    protected $primaryKey = 'book_id';
    //关闭时间戳
    public $timestamps = false;
    //黑名单
    protected $guarded = [];
}
