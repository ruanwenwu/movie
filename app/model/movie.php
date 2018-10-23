<?php

namespace App\model;

use Illuminate\Support\Facades\DB;

class movie
{
    //获取首页推荐
    public static function getIndexRecommend($num=36){
        return DB::select("select * from movies where smallpic != '' and downloadurl != '' order by pubdate desc limit {$num}");
    }
    
    //获取详情信息
    public static function getDetailInfo($id){
        return DB::select("select * from movies where id = :id",["id"=>$id]);
    }
}
