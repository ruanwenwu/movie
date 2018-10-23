@extends('layouts.app')

@section('title')
laravel
@endsection

@section('container')
	<div class="m-recom">
        <div class="g-tit1">
            <a href="/html/dianying.html" target="_blank">更多..</a>
            <h3>今日热门电影推荐</h3>
        </div>
		 <ul class="ul-imgtxt1 row">
		 	@foreach($recommend as $recom)
		 	<li class="col-sm-4 col-md-3 col-lg-2">
                <a href="{{$recom->detailUrl}}">
                    <div class="pic"><img src="{{$recom->smallpic}}" alt="<font color='#FF0000'>古剑奇谭之流月昭明</font>" /></div>
                    <div class="txt">
                        <h3 style="color:#FF0000;"><font color='#FF0000'>{{$recom->name}}</font></h3>
                        <span><font color=red>{{$recom->pubdate}}</font></span>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    
    <div class="m-link">
        <span class="tit">友情连接</span>
        <div class="txt">
            <div class="link">
              <a href="/">飘花电影网</a>
    		  <a href="http://www.dy2018.com" target=_blank>电影天堂</a>  
    		  <a href="http://www.juqingba.cn" target=_blank>剧情介绍</a>
    		  <a href="/" target=_blank>快播电影</a> 
    		  <a href="/" target=_blank>2013最新电影</a> 
    		  <a href="http://www.66721.com/" target=_blank>TXT小说</a>
    		  <a href="http://www.dagougou.cc" target=_blank>百度影音</a>
            </div>
            <p><span>权重大于7的</span><span>欢迎友链</span></p>
        </div>
    </div>
@endsection