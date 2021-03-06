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
	<div class="m-pic1">
		<script type="text/javascript"src="/js/yzz/piaohua_banner_980_60_4.js"></script>
	</div>
	<div class="m-list1 row">
		<div class="col-md-12">
			<div class="m-film">
				<div class="cur">
					@if($total>0)
					<font color="red">{{$keyword}}</font>搜索结果
					@else
					暂未收入<span>{{$keyword}}</span>相关的电影哦~~
					@endif
				</div>
				@if($total>0)
				<ul class="ul-imgtxt2 row">
					@foreach($movies as $movie)
					<li class="col-md-6">
						<div class="pic"><a href="/{{$movie->etype}}/{{$movie->id}}.html"><img src="{{$movie->smallpic}}" alt="" /></a></div>
						<div class="txt">
							<h3><a href="/html/kehuan/2018/0509/33652.html"><font color='red'>{{$movie->name}}</font></font><em>BD1280高清</em></a></h3>
							<p>◎片 名 <font color='red'>{{$movie->name}}</font><br/>{{$movie->brief}}</p>
							<span>影片分类：<a href="/{{$movie->etype}}.html" target="_blank">{{config("usualdata")['cate'][$movie->etype]}}</a></span>
							<span>
							更新时间：{{$movie->pubdate}}
							<a href="/{{$movie->etype}}/{{$movie->id}}.html">点击下载</a></span>
						</div>
					</li>	
					@endforeach						
				</ul>
				<!-- 页码 -->
				{!!$pagestr!!}
				<!-- 页码 end-->
				@endif
			</div>
		</div>
	</div>
</div>

@endsection
