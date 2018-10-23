<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    //获取菜单
    public static function getNavs(){
        return DB::select("select * from category where status = 1");
    }
}
