<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\Index;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    //首页
    public function Index(){
        $data = array();    //首页模板数据
        $recommendData = Index::getTodayRecommend();
        $data['recommend'] = $recommendData;       
        return view("Index",$data);
    }
    
    //详情页
    public function Detail($cate,$id){
        //获取详情信息
        $res = Index::getDetailInfo($cate,$id);
        
        //获取分类信息
        $cateInfo = config("usualdata")['cate'];
        $cateChinese = $cateInfo[$cate];
        //内容中如果不是以http开头的，要加上https://www.piaohua.com
        $res[0]->oricontent = preg_replace_callback("/(<img.*src=)('|\")(.*)(\\2)/iUs",function($matches){
            if(strpos($matches[3],"http") === false){
                return $matches[1].$matches[2]."http://www.piaohua.com".$matches[3].$matches[4];
            }else{
                return $matches[0];
            }
            
        },$res[0]->oricontent);
        $data['details']    = $res[0];
        $data['cate']   = ["name"=>$cateChinese,"url"=>"/{$cate}.html"];
        return view("Detail",$data);
    }
    
}
