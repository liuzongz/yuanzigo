<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/home/wwwroot/www.yuanzigo.com/public/../application/mobile/view/index/detail.html";i:1523469026;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title><?php echo (isset($page_title) && ($page_title !== '')?$page_title:'资源详情'); ?></title>
    <link href="__CSS__/bootstrap.css" rel="stylesheet">
    <link href="__CSS__/nifty.css" rel="stylesheet">
    <link href="__PLUGINS__/ionicons/css/ionicons.min.css" rel="stylesheet">    
    <script src="__JS__/jquery-2.2.4.min.js"></script>
    <script src="__JS__/bootstrap.min.js"></script>
    <script src="__JS__/nifty.js"></script>
    <script src="__PLUS__/Layer/layer.js"></script>
    <script src="__PLUS__/template.js"></script>
    <script src="__JS__/common.js"></script>
    <style>
    .footmenu{
		position:fixed; 
		bottom:0; 
		left:0; 
		width:100%; 
		z-index:900; 
		border-top:1px solid #999999;
	}
	.on{
		color:#efb239;
		font-weight:600;
	}
	.text-1x{
		font-size:1.2em;		
	}
	.mar-1x{
		margin-top:0.5em;
	}
	.carousel-inner .item{
		padding-top:0px;
	}
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
	.price span{
		color:#e2175b;
		font-size:1.5em;
		font-weight:600;
		margin-left:0.5em;
		margin-right:0.5em;
	}
	.on{
		color:#efb239;
		font-weight:600;
		border-bottom: 3px solid #efb239;
	}
	#introbox img, #noticebox img, #featuresbox img{
		max-width:100%;
	}
	</style>
</head>
<body>
<div id="detaildiv"></div>
<script id="detail-temp" type="html/text">
<div class="bg-light row pad-ver">
	<div class="col-xs-3">
		<img class="img-md img-circle" src="{{info.shopinfo.headimg}}" alt="Sample Image">
	</div>
	<div class="col-xs-7">
		<p class="text-bold text-1x mar-1x">{{info.shopinfo.shopname}}</p>
		<p>原子出发官方认证</p>
	</div>
	<div class="col-xs-2">
		<div class="mar-1x">
			<a href="tel:{{info.shopinfo.tel}}"><i class="ion-social-whatsapp icon-3x text-warning"></i></a>
		</div>		
	</div>
</div>


<div id="titu" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators in">
		{{each info.headimg as v i}}
		<li class="{{ if i==0}}active{{ /if}}" data-slide-to="{{i}}" data-target="#titu"></li>
		{{/each}}
	</ol>
	<div class="carousel-inner text-center">
		{{each info.headimg as v i}}
		<div class="item {{ if i==0}}active{{ /if}}">
			<img src="{{v}}?x-oss-process=style/16-9"/>
		</div>	
		{{/each}}	
	</div>
</div>

<div class="bg-light mar-btm pad-btm">
	<p class="text-bold text-1x text-dark pad-hor pad-top">【{{info.destination}}】{{info.title}}</p>
	<div class="tags-mini pad-hor">
		{{each info.tags as v}}
			<span>{{v}}</span>
		{{/each}}
	</div>
	<p class="text-1x pad-hor pad-top">
			<span>活动日期：{{info.execution_time}}</span>
		</p>
	<div class="row price">
		<div class="col-xs-7"><span>￥{{info.format.price}}</span>建议零售价</div>
	</div>
	
</div>

<div class="bg-light row text-center text-bold">
	<div class="col-xs-4 pad-top">
		<p class="text-1x">
			每单利润<br>
			<span class="text-danger">￥{{info.format.price-info.format.cost}}</span>
		</p>		
	</div>
	<div class="col-xs-4 pad-top">
		<p class="text-1x">
			库存<br>
			<span>{{info.format.stock}}</span>
		</p>
	</div>
	<div class="col-xs-4 pad-top">
		<p class="text-1x">
			销量<br>
			<span>{{info.sale_num}}</span>
		</p>
	</div>
</div>

<div class="bg-light text-center text-bold mar-top">
	<div class="pad-all bord-hor on">活动详情</div>
</div>
<div id="introbox">
	{{each info.intro as v}}
	<img src="{{v}}"/>
	{{/each}}
</div>


<div class="pad-all" style="height:15em;"></div>
<div class="footmenu text-center bg-gray-light" style="box-shadow: 1px 1px 3px 3px #888888;">
	<a href="#" data-id="{{info.id}}"><button class="btn btn-lg btn-block btn-warning pad-ver"><span class="text-lg">一键变成</span><br>我的专属产品</button></a>
</div>
</script>

<script>
var id=getQueryVariable('id')
function getDetail(){
	var detail_url=base_url+'activity/getActivityDetail?id='+id+'&token='+token;
	$.get(detail_url,function(data){		
		var html=template('detail-temp',data.data)
		$('#detaildiv').html(html)
		$('#titu').carousel()
		$('.footmenu a').click(function(){
			var add_url=base_url+'activity/addActivity'
			var id=$(this).attr('data-id')
			$.post(add_url,{token:token,id:id},function(data){
				if(data.data.code==1){
					location.href="preview.html?id="+data.data.newid+'&token='+token
				}else{
					layer.msg(data.data.msg)
				}
			})				
		})
	})
}

$(function(){
	getDetail()
})
</script>
</body>
</html>