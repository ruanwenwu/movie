@extends('layouts.app')
@section('title')
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
					<font color="red">{{$keywords}}</font>搜索结果
				</div>
				<ul class="ul-imgtxt2 row">
					@foreach($movies as $movie)
					<li class="col-md-6">
						<div class="pic"><a href="/{{$movie->etype}}/{{$movie->id}}.html"><img src="{{$movie->smallpic}}" alt="" /></a></div>
						<div class="txt">
							<h3><a href="/html/kehuan/2018/0509/33652.html"><font color='red'>{{$movie->name}}</font><em>BD1280高清</em></a></h3>
							<p>◎片 名 <font color='red'>{{$movie->name}}</font></p>
							<span>影片分类：<a href="/{{$movie->etype}}.html" target="_blank">{{env("config")['cate'][$movie->etype]}}</a></span>
							<span>
							更新时间：2018-07-04
							<a href="/{{$movie->etype}}/{{$movie->id}}.html">点击下载</a></span>
						</div>
					</li>	
					@endforeach						
				</ul>
				<!-- 页码 -->
				<div class="pages">
				   共1页/1条记录
				</div>
				<!-- 页码 end-->
			</div>
		</div>
	</div>
</div>

@endsection