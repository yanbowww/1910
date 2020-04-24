<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lianjie extends Model
{
    protected $table = 'lianjie';
    protected $primaryKey = 'l_id';

    public $timestamps = false;
    //黑名单
    protected $guarded = [];
}