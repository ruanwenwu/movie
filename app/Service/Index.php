<?php
namespace App\Service;

use App\model\movie;
use App\model\Category;

class Index{
    /**
     * 获得今日推荐
     * 取最新的36条数据
     */
    public static function getTodayRecommend(){
        $res = movie::getIndexRecommend(36);
        //数据处理
        foreach($res as $re){
            $re->detailUrl = self::getDetailUrl($re->etype, $re->id); 
            if(strpos($re->smallpic,"http")===false){
                $re->smallpic = "http://www.piaohua.com".$re->smallpic;
            }
            $re->name = preg_replace("/HD\d+.*$/", "", $re->name);
        }
        return $res;
    }
    
    /**
     * 获取详情页信息
     */
    public static function getDetailInfo($cate,$id){
        if(!$id) return false;
        return movie::getDetailInfo($id);
    }
    
    /**
     * 获得详情页url
     */
    public static function getDetailUrl($cate,$id){
        return "/".$cate."/".$id.".html";
    }
    
    /**
     * 获取导航
     */
    public static function getNavs(){
        $navs = Category::getNavs();
        foreach($navs as $nav){
            $nav->url = self::getListUrl($nav->ename);
        }
        return $navs;
    }
    
    /**
     * 得到列表页url
     */
    public static function getListUrl($type,$page=''){
        if(!$type) return '';
        if(!$page){
            return "/{$type}.html";
        }else{
            return "/{$type}_{$page}.html";
        }
    }
    
}