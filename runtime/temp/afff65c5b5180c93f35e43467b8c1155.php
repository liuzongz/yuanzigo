<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/home/wwwroot/www.yuanzigo.com/public/../application/mobile/view/index/index.html";i:1523515453;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title><?php echo (isset($page_title) && ($page_title !== '')?$page_title:'发现优质资源'); ?></title>
    <link href="__CSS__/bootstrap.css" rel="stylesheet">
    <link href="__CSS__/nifty.css" rel="stylesheet">
    <link href="__PLUGINS__/ionicons/css/ionicons.min.css" rel="stylesheet">    
    <script src="__JS__/jquery-2.2.4.min.js"></script>
    <script src="__JS__/bootstrap.min.js"></script>
    <script src="__JS__/nifty.js"></script>
    <script src="__PLUS__/Layer/layer.js"></script>
    <script src="__PLUS__/template.js"></script>
    <script type="text/javascript" src="http://yanshi.sucaihuo.com/jquery/20/2018/demo/js/flexible.js"></script>
	<script type="text/javascript" src="http://yanshi.sucaihuo.com/jquery/20/2018/demo/js/iscroll.js"></script>
	<script type="text/javascript" src="http://yanshi.sucaihuo.com/jquery/20/2018/demo/js/navbarscroll.js"></script>
    <script src="__JS__/common.js"></script>
    <style>
	.jiao{
		border-radius:5px;
	}
	.input-search{
		border-radius:15px;
		margin:0 0.5em;
		width:95%;
		background-color:#f8f9fa;
	}
	
	input[type='search']{
	    text-align:center;
	}
	
	input[type='search']:focus{
	    text-align:left;
	}
	
	.wrapper {
		position:relative;
		height: 1rem;
		width: 100%;
		overflow: hidden;
		margin:0.3em auto;
		border-bottom:1px solid #ccc;
		background-color:#fff;
		
	}
	.wrapper .scroller {
		position:absolute
	}
	.wrapper .scroller li {
		height: 1rem;
		color:#333;
		float: left;
		line-height: 1rem;
		font-size: .4rem;
		text-align: center
	}
	.wrapper .scroller li a{
		color:#333;
		display:block;
		margin:0 .3rem;
		padding:0 .1rem
	}
	.wrapper .scroller li.cur a{
		color:#1cbb9b;
		height:.9rem;
		border-bottom:.1rem solid #1cbb9b
	}
	ol,ul{list-style:none}	
	
	body,div,ul,ol,li{margin:0;padding:0}
	
	.tags-mini span{
		padding: 0.15em 1em;
    	margin: 0.1em;
		border-radius:5px;
		border-color: #efb239 !important;
		vertical-align: middle;
		text-align: center;
		white-space: nowrap;
		border: 1px solid transparent;
		color:#efb239;
		display: inline-block;		
	}
	
	.title{}
	
	.price span{
		color:#e2175b;
		font-size:1.5em;
		font-weight:600;
	}
	.footmenu{
		position:fixed; 
		bottom:0; 
		left:0; 
		width:100%; 
		z-index:900; 
		padding:1em;
		border-top:1px solid #999999;
	}
	.on{
		color:#efb239;
		font-weight:600;
	}
	</style>
</head>
<body>
<div class="bg-light" style="padding:0.5em 0;">
	<form id="myform" action="" onsubmit="return false;">
		<input type="search" placeholder="搜索" class="form-control input-lg input-search" id="searchkeyword" >
	</form>
	
</div>

<div class="wrapper wrapper" id="wrapper">
	<div class="scroller">
		<ul class="clearfix" id="tagslist">
		<li class="cur"><a href="#" data-id="0">全部</a></li>
		</ul>
	</div>
</div>
<div id="listdiv"></div>
<div class="text-center" id="emptylist" style="margin-top:3em;display:none">
	<i class="ion-clipboard" style="font-size:10em;"></i>
	<p class="text-lg">这个分类中暂时没有活动哦！</p>
</div>
<div class="pad-all" style="height:15em;"></div>
<div class="footmenu row text-center bg-gray-light">
	<a href="#" data-page="index">
		<span class="col-xs-4 on">
			<i class="ion-grid icon-2x"></i><br>
			发现
		</span>
	</a>
	<a href="#" data-page="myshop">
		<span class="col-xs-4">
			<i class="ion-compose icon-2x"></i><br>
			管理小店
		</span>
	</a>
	<a href="#" data-page="ask">
		<span class="col-xs-4">
			<i class="ion-chatbubble-working icon-2x"></i><br>
			有疑问找我
		</span>
	</a>
</div>
<script>
var tags_url=base_url+'pub/gettags'
var activity_url=base_url+'activity/getAllActivityList'
var tagsId=0;
var token=getQueryVariable('token')
$(function(){
	getTags()
	getList()
})
$('#searchkeyword').bind('search', function () {
	tagsId=$('#tagslist >li.cur>a').attr('data-id')
	keyword=$('#searchkeyword').val()
	console.log(keyword)
	getList(tagsId,keyword)
})
function getTags(){
		var tags_url=base_url+'pub/gettags'
		$.get(tags_url,function(data){
			var html=template('tags-temp',data.data)
			$('#tagslist').append(html)			
			$('.wrapper').navbarscroll();			
			$('#tagslist a').click(function(){
				$('#listdiv').empty();
				var that=$(this);
				tagsId=that.attr('data-id');
				keyword=$('#searchkeyword').val()
				
				getList(tagsId,keyword)
			})
		})
	}


function getList(tagsId,keyword){
	console.log(keyword)
	console.log(tagsId)
	$.get(activity_url,{token:token,tagsid:tagsId,keyword:keyword},function(data){
		if(data.data.code==1){
			$('#emptylist').hide();
			console.log(data)
			var html=template('item-temp',data.data)
			$('#listdiv').empty().append(html)
			$('#listdiv a').click(function(){
				location.href='detail.html?id='+$(this).attr('data-id')+'&token='+token
			})
		}else{
			$('#emptylist').show();
		}				
	})
	
}

$('.footmenu a').click(function(){
	location.href=$(this).attr('data-page')+'.html?token='+token
})

</script>
<script id="tags-temp" type="html/text">
{{each data as v}}
	<li ><a href="javascript:void(0)" data-id="{{v.id}}">{{v.name}}</a></li>
{{/each}}	
</script>
<script id="item-temp" type="html/text">
{{each list as v}}
{{ if v.ck==0}}
<a href="#" data-id="{{v.id}}">
	<div class="bg-light mar-top">
		<div class="row title bord-btm">
			<div class="col-xs-7 pad-all">{{v.shopname}}</div>
			<div class="col-xs-5 pad-all">活动日期：{{v.execution_time}}	</div>
		</div>
		<div class="row">
			<div class="col-xs-2 pad-all">
				<img class="img-md jiao" src="{{v.headimgs}}">
			</div>
			<div class="col-xs-10 pad-ver">
				<p class="text-bold">【{{v.destination}}】{{v.title}}</p>
				<div class="tags-mini">
					{{each v.tags as t}}
					<span>{{t}}</span>
					{{/each}}
				</div>
				<div class="row price pad-top">
					<div class="col-xs-7">建议零售价<span>￥{{v.format.price}}</span></div>
					<div class="col-xs-5">利润<span>￥{{v.format.price-v.format.cost}}</span></div>
				</div>
			</div>
		</div>
	</div>
</a>
{{ /if}}
{{/each}}
</script>
</body>
</html>
