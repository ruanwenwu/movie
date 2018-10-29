<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="keywords" content="电影下载,最新电影,电影天堂,电影网,高清电影下载,电影网站,eee4.com,piaohua.com"/>
	<meta name="description" content="飘花电影网－最新电影,3E迅雷电影下载网(原3edyy.com)-每天搜集最新迅雷免费电影下载。为使用迅雷软件的用户提供最新的免费电影下载、小电影下载、高清电影下载等服务。"/>
	<meta name="wap-font-scale" content="no">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/lib.css" />
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="/css/less.css">
</head>
<body>

    <!-- 头部 -->
    <div class="header visible-xs-block">
        <div class="wp">
        	<div class="logo">
        		<a href="/"><img src="/logo.png" alt="飘花资源网"></a>
        	</div>
            <div class="right">
                 <div class="hd-top">
                    <a href="/html/dianying.html">今日最新电影</a>
                    <a href="/html/daylianxuju.html">今日最新电视剧</a>
					<a href="/html/zuixindianying.html">近一周最新电影</a>
                </div>
                <div class="so" id="pc_so">
                    <form id="form1" name="formsearch" action="/plus/search.php" target="_blank">
						<input name="kwtype" type="hidden" value="0" />
                        <input name="keyword" type="text" id="search-keyword" placeholder="直接输入电影的关键词..." class="inp" onfocus="if(this.value=='直接输入电影的关键词...'){this.value='';}"  onblur="if(this.value==''){this.value='直接输入电影的关键词...';}" />
                        <input name="searchtype" type="submit" value="影视搜索" class="sub"/>
                    </form>
                </div>
                <div class="bot">
                    <a href="/">最新电影下载</a>
                    就上飘花网 www.piaohua.com
                </div>
            </div>
            <span class="menuBtn"></span>
        </div>
    </div>
    <!-- 头部 end-->
    <div class="nav">
        <div class="wp">
            <div class="so" id="mobile_so">
                <form id="form1" name="formsearch" action="/plus/search.php" target="_blank">
						<input name="kwtype" type="hidden" value="0" />
                        <input name="keyword" type="text" id="search-keyword" placeholder="直接输入电影的关键词..." class="inp" onfocus="if(this.value=='直接输入电影的关键词...'){this.value='';}"  onblur="if(this.value==''){this.value='直接输入电影的关键词...';}" />
                        <input name="searchtype" type="submit" value="影视搜索" class="sub" />
                </form>
            </div>
            <ul>
                <li><a href="/">飘花首页</a></li>
                @foreach($nav as $navdetail)
                <li><a href="{{$navdetail->url}}">{{$navdetail->name}}</a></li>
                @endforeach
				
            </ul>
        </div>
    </div>

    <!-- 主内容 -->
    <div class="main">
        <div class="wp">
            
                @section("container")                	                               
                		主体部分
                	@show
            
        </div>
    </div>
    <!-- 主内容 end--> 
    <!-- 底部 -->
    <div class="footer">
        <div class="wp">
            <p>2006-2010 飘花免费 <a href="/">电影下载站</a> www.piaohua.com. All Rights Reserved <a href="/">电影下载网站 免费</a>就在飘花网</p>
            <p><a href="/">下载电影</a>就来飘花电影网，本站资源均为网络免费资源搜索机器人自动搜索的结果，本站只提供 <a href="/">最新电影下载</a>，并不存放任何资源。</p>
            <p>所有视频版权归原权利人，将于24小时内删除！我们强烈建议所有影视爱好者购买正版音像制品！</p>
            <p>本站拒绝一切非法，淫秽电影，欢迎大家监督 有问题可联系管理员</p>
        </div>
    </div>
    <!-- 底部 end-->
	
	<script type="text/javascript" src="/templets/new/js/jquery.js"></script>
<script type="text/javascript" src="/templets/new/js/bootstrap.js"></script>
<script type="text/javascript" src="/templets/new/js/slick.min.js"></script>
<script type="text/javascript" src="/templets/new/js/lib.js"></script>	
<script type="text/javascript" src="/templets/new/js/jquery.xdomainrequest.min.js"></script>
<script type="text/javascript" src="/templets/new/js/fcdelect.js?0905"></script>
<script type="text/javascript" src="/templets/new/js/protocolcheck.js?0905"></script>
	<script>
	$(document).ready(function() {
		$('#banner .slider').slick({
			dots:true,
			arrows:true,
			autoplay:true,
			slidesToShow: 1,
			autoplaySpeed: 5000,
			pauseOnHover:false,
			lazyLoad: 'ondemand'
		});
	});
	</script>
<div style="display:none"><script language="javascript" src="/js/yzz/tj.js?=1016"></script></div>
</body>
<script>
	var form1 = document.getElementById("form1");
	form1.onsubmit=function(){
		var keyword = document.getElementById("search-keyword").value;
		location.href="/search/"+keyword+".html";
		return false;
	}
</script>
</html>
