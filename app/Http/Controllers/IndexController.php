<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\Index;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Service\Page;

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
    
    public function Lists(Request $request,$cate,$page=1){
        //获得列表推荐数据
        $cateRecom = Index::getCateRecom($cate,18);
        //获得当页数据
        $pageSize = 12;
        $cateData = Index::getCateData($cate,$page,$pageSize);
        $total = Index::getMovieTotal();
        $pageUrlInitial = "/{$cate}/p_".urlencode("[PAGE]").".html";
        $pageObj = new Page($page,$total,$pageSize,array(),$pageUrlInitial);
        $pageStr = $pageObj->show();
        $data['recom'] = $cateRecom;
        $data['data']  = $cateData;
        $data['cate']  = $cate;
        $data['pagestr'] = $pageStr;
        return view("Lists",$data);
    }
    
    public function Search(Request $request,$keywords,$page=1){
        $s = new \SphinxClient;
        $s->setServer("101.200.168.135", 9313);
        $s->setMatchMode(SPH_MATCH_PHRASE);
        $s->setMaxQueryTime(30);
        $perPage = 30;
        $start = ($page - 1)*$perPage;
        $s->setLimits($start, $perPage);
        $res = $s->query($keywords,'*'); #[宝马]关键字，[main]数据源source
        $err = $s->GetLastError();
        $total = $res['total'];
        $movieIds = array_keys($res['matches']);
        $movies = Index::getMoviesByIds($movieIds);
	$pageUrlInitial = "/search/{$keywords}/p_".urlencode("[PAGE]").".html";
	$pageObj = new Page($page,$total,$perPage,array(),$pageUrlInitial);
        $pageStr = $pageObj->show();
        $data['movies'] = $movies;
        $data['keyword'] = $keywords;
	$data['pagestr'] = $pageStr;
        //根据id查询电影内容
        return view("Search",$data);
    }
    
}
