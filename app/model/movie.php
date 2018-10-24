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
    
    //获取电影总数
    public static function getMovieTotal(){
        return DB::select("select count(*) as c from movies where smallpic != '' and downloadurl != ''");
        
    }
    
    //获得分类推荐（分类最新)数据
    public static function getCateList($cate,$start=0,$offset=20,$orderby='pubdate desc'){
        return DB::select("select * from movies where etype='{$cate}' and smallpic != '' and downloadurl != '' order by {$orderby} limit {$start},{$offset}");
    }
}
