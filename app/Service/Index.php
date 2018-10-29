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
    
    /**
     * 获得电影总数
     */
    public static function getMovieTotal(){
        $res = movie::getMovieTotal();
        return $res[0]->c;
    }
    
    /**
     * 获得分类推荐数据
     */
    public static function getCateRecom($cate,$pagesize){
       if(!$cate) return false;
       $res = movie::getCateList($cate,$pagesize);
       if($res && is_array($res)){
           foreach($res as $re){
               $ori = strip_tags($re->oricontent);
               $ori = preg_replace(array("#\n|\r\n|\t#","#{$re->name}迅雷下载地址和剧情：#"), "", $ori);
               $re->brief = mb_substr($ori,0,35,"utf-8")."...";
               if(strpos($re->smallpic,"http")===false){
                   $re->smallpic = "http://www.piaohua.com".$re->smallpic;
               }
               $re->name = preg_replace("/HD\d+.*$/", "", $re->name);
           }
       }
       return $res;
    }
    
    /**
     * 获得分类分页数据
     */
    public static function getCateData($cate,$page,$pagesize){
        if(!$cate) return false;
        $start = ($page - 1 )*$pagesize;
        $res = movie::getCateList($cate,$start,$pagesize);
        if($res && is_array($res)){
            foreach($res as $re){
                $ori = strip_tags($re->oricontent);
                $ori = preg_replace(array("#\n|\r\n|\t#"), "", $ori);
                $re->brief = trim(mb_substr($ori,0,80,"utf-8"))."...";
                if(strpos($re->smallpic,"http")===false){
                    $re->smallpic = "http://www.piaohua.com".$re->smallpic;
                }
                $re->name = preg_replace("/HD\d+.*$/", "", $re->name);
            }
        }
        return $res;
    }
    
    /**
     * 根据id字符串得到电影
     */
    public static function getMoviesByIds($ids){
        if(!$ids) return;
        
        $idstr = implode(",",$ids);
        $res = movie::getMovieByIds($idstr);
        if($res && is_array($res)){
            foreach($res as $re){
                $ori = strip_tags($re->oricontent);
                $ori = preg_replace(array("/\n|\r\n|\t/"), "", $ori);
                $re->brief = trim(mb_substr($ori,0,80,"utf-8"))."...";
                if(strpos($re->smallpic,"http")===false){
                    $re->smallpic = "http://www.piaohua.com".$re->smallpic;
                }
                $re->name = preg_replace("/HD\d+.*$/", "", $re->name);
            }
        }
        return $res;
    }
    
}