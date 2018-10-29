@extends('layouts.app')
@section('title')
{{$title}}
@endsection
@section('keywords')
{{$keywords}}
@endsection
@section('description')
{{$description}}
@endsection


@section('container')
<div class="container">
<div class="m-details">
	 <div class="cur">
        当前位置：<a href='/'>0.3电影</a>><a href='{{$cate['url']}}'>{{$cate['name']}}</a>>>
     </div>
     <div class="m-text1">   
     	<h1>{{$details->name}}</h1>
        <div class="info">
            <span>片名：{{$details->name}} </span>
            <span>发布时间：{{$details->pubdate}}</span>
        </div>
		<div class="showad"style="padding-top:2px; "><script type="text/javascript" src="/js/yzz/piaohua_nei_740_70_1.js"></script></div>
        <div class="txt">
    			{!! $details->oricontent !!}   
    		</div>
    		 <div class="bot">
            <h3>下载地址列表(复制地址到迅雷进行下载)::<i></i></h3>
            <a href="{{$details->downloadurl}}">{{$details->downloadurl}}</a>
          </div>
    		
    </div>
</div>
</div>
@endsection