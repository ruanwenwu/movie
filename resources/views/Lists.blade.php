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
<div class="m-list1 row">
    <div class="col-md-3">
        <div class="snav">
            <h3>动作片下载排行</h3>
            <ul>
            		@foreach($recom as $rek=> $red)
    				<li>
                        <a href="/{{$red->etype}}/{{$red->id}}.html">
                            <span>{{$rek+1}}</span>
                            <h4><font color='#FF0000'>{{$red->name}}</font>({{config("usualdata")['cate'][$red->etype]}}片）</h4>
                        </a>
                 </li>
                 @endforeach
            </ul>
        </div>
    </div>
    <div class="col-md-9">
        <div class="m-film">
            <div class="cur">
                当前位置：<a href='/'>飘花电影</a>><a href='/html/dongzuo/index.html'>{{config("usualdata")['cate'][$cate]}}片</a>>>迅雷电影列表
            </div>
            <ul class="ul-imgtxt2 row">
            @foreach($data as $cdk => $cdv)
			<li class="col-md-6">
                    <div class="pic"><a target="_blank" href="/{{$cdv->etype}}/{{$cdv->id}}.html"><img src="{{$cdv->smallpic}}" alt="<b><font color='#FF0000'>{{$cdv->name}}</font></b>" /></a></div>
                    <div class="txt">
                        <h3><a target="_blank" href="/{{$cdv->etype}}/{{$cdv->id}}.html"><b><font color='#FF0000'>{{$cdv->name}}</font></b><em>BD1280高清</em></a></h3>
                        <p>{{$cdv->brief}}</p>
                        <span>   
						更新时间：{{$cdv->pubdate}}
						<a href="/{{$cdv->etype}}/{{$cdv->id}}.html">点击下载</a></span>
                    </div>
                </li>
             @endforeach
            </ul>
        </div>
        {!!$pagestr!!}
   </div>
 </div>

@endsection