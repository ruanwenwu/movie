<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="keywords" content="@yield('keywords')"/>
	<meta name="description" content="@yield('description')"/>
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
        		<a href="/"><img src="/logo.png" alt="0.3电影网"></a>
        	</div>
            <div class="right">
                 <div class="hd-top">
                   <!-- <a href="">今日最新电影</a>
					<a href="">近一周最新电影</a>-->
                </div>
                <div class="so" id="pc_so">
                    <form id="form1" name="formsearch" action="/plus/search.php" target="_blank">
						<input name="kwtype" type="hidden" value="0" />
                        <input name="keyword" type="text" id="search-keyword" placeholder="直接输入电影的关键词..." class="inp" onfocus="if(this.value=='直接输入电影的关键词...'){this.value='';}"  onblur="if(this.value==''){this.value='直接输入电影的关键词...';}" />
                        <input name="searchtype" type="submit" value="影视搜索" class="sub"/>
                    </form>
                </div>
                <!--<div class="bot">
                    <a href="/">最新电影下载 就上0.3电影网 {{config("usualdata")['host']}}</a>
                    
                </div>-->
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
                <li><a href="/">0.3首页</a></li>
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
            <p>2006-2018 0.3免费 <a href="/">电影下载站</a> www.0dian3.com. All Rights Reserved <a href="/">电影下载网站 免费</a>就在0.3电影网</p>
            <p><a href="/">下载电影</a>就来0.3电影网，本站资源均为网络免费资源搜索机器人自动搜索的结果，本站只提供 <a href="/">最新电影下载</a>，并不存放任何资源。</p>
            <p>所有视频版权归原权利人，将于24小时内删除！我们强烈建议所有影视爱好者购买正版音像制品！</p>
            <p>本站拒绝一切非法，淫秽电影，欢迎大家监督 有问题可联系管理员</p>
        </div>
    </div>
    <!-- 底部 end-->
</body>
<script>
	var form1 = document.getElementById("form1");
	form1.onsubmit=function(){
		var keyword = document.getElementById("search-keyword").value;
		if(keyword=="") keyword=" ";
		location.href="/search/"+keyword+".html";
		return false;
	}
</script>
</html>
