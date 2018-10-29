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
        $data['title']     = "最新电影下载_0.3电影网首页_最全电影下载网站-0.3电影库";
        $data['keywords'] = "最新电影下载大全,迅雷电影下载,电影下载,0.3电影,0.3电影网,动作片下载,爱情片下载,喜剧片下载,伦理片下载,动画片下载";
        $data['description'] = "0.3电影网库提供10多个类别，2万多部电影的下载,包括动作、爱情、剧情、悬疑、动漫、战争等热门分类,为您提供有效实用的电影资讯和下载链接,实时权威的电影下载就在0.3电影网";
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
        $data['title']     ="{$res[0]->name}下载_迅雷下载_免费下载_0.3电影网";
        $data['keywords'] = "{$res[0]->name}迅雷下载,{$res[0]->name}下载,失恋日下载地址";
        $data['description'] = "{$res[0]->name}迅雷下载、{$res[0]->name}免费下载，在飘花网您可以免费获得{$res[0]->name}的详细剧情介绍,剧照和迅雷高速免费下载地址";
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
        $cnName = config("usualdata")['cate'][$cate]."片";
        $data['pagestr'] = $pageStr;
        $data['title']     =$cnName."_迅雷下载_免费下载_0.3电影网";
        $data['keywords'] = "{$cnName}迅雷下载，免费下载";
        $data['description'] = "{$cnName}迅雷下载、免费下载，剧情介绍等。";
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
        if($total){
            $movieIds = array_keys($res['matches']);
            $movies = Index::getMoviesByIds($movieIds);
    	        $pageUrlInitial = "/search/{$keywords}/p_".urlencode("[PAGE]").".html";
    	        $pageObj = new Page($page,$total,$perPage,array(),$pageUrlInitial);
            $pageStr = $pageObj->show();
            $data['movies'] = $movies;
            $data['pagestr'] = $pageStr;
        }
        $data['keyword'] = $keywords;
	    $data['total'] = $total;
        //根据id查询电影内容
	    $data['title']     ="0.3电影下载网迅雷电影下载站-搜索最新电影电视剧免费下载";
	    $data['keywords'] = "迅雷下载,免费电影下载,海报剧情";
	    $data['description'] = "本站每天搜集最新电影、连续剧、MTV、讯雷下载";
        return view("Search",$data);
    }
    
}
