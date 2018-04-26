<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/home/wwwroot/www.yuanzigo.com/public/../application/mobile/view/index/preview.html";i:1523581592;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title><?php echo (isset($page_title) && ($page_title !== '')?$page_title:'生成我的活动'); ?></title>
    <link href="__CSS__/bootstrap.css" rel="stylesheet">
    <link href="__CSS__/nifty.css" rel="stylesheet">
    <link href="__PLUGINS__/ionicons/css/ionicons.min.css" rel="stylesheet">    
    <script src="__JS__/jquery-2.2.4.min.js"></script>
    <script src="__JS__/bootstrap.min.js"></script>
    <script src="__JS__/nifty.js"></script>
    <script src="__PLUS__/Layer/layer.js"></script>
    <script src="__PLUS__/template.js"></script>
    <script src="__JS__/common.js?t=<?php echo $nowtime; ?>"></script>
    <style>
	#zhezhao{
		-webkit-user-select: none;
		display: none;
		position: fixed;
		width: 100%;
		height: 100%;  
		background: rgba(0,0,0,0.90);
		text-align: center;
		top: 0;
		left: 0;
		z-index: 999;  
	}
	#zhezhao img { max-width: 100%;}
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
	.headbox{
		background:url("__IMG__/huangbg.jpg")
	}
	</style>
</head>
<body>
<div id="detaildiv"></div>
<div id="zhezhao"><img src="__IMG__/shareit.png"/></div>
<script id="detail-temp" type="html/text">
<div class="bg-light row pad-ver headbox">
	<div class="col-xs-3">
		<img class="img-md img-circle" src="{{info.shopinfo.headimg}}" alt="Sample Image">
	</div>
	<div class="col-xs-9">
	<br>
		<p class="text-bold  text-dark text-1x mar-1x">{{info.shopinfo.shopname}}</p>
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
	<p class="text-bold text-1x text-dark pad-hor pad-top">【{{info.shopinfo.shopname}}专享 | {{info.destination}}】{{info.title}}</p>
	
<div class="tags-mini pad-hor">
		{{each info.tags as v}}
			<span>{{v}}</span>
		{{/each}}
	</div>
<p class="pad-lft text-lg" style="padding-top:0.5em;font-weight:600;">活动日期：{{info.execution_time}}</p>	
	<div class="row price pad-top">
		<div class="col-xs-7"><span>￥{{info.format.price}}</span>销量{{info.salenum}} 库存{{info.lastnum}}</div>
		
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
<div class="footmenu text-center bg-gray-light row " style="box-shadow: 1px 1px 3px 3px #888888;">
	<a href="tel:13248285336"><div class="col-xs-6 pad-all">联系客服修改</div></a>
	<a href="#"><div class="col-xs-6 pad-all bg-warning go" data-id="{{info.id}}">我很满意，现在就分享</div></a>	
</div>

</script>
<script>
var id=getQueryVariable('id')
function getDetail(){
	var detail_url=base_url+'activity/getActivityPreview?id='+id+'&token='+token;
	
	$.get(detail_url,function(data){		
		console.log(data)
		var html=template('detail-temp',data.data)
		$('#detaildiv').html(html)
		$('#titu').carousel()
		$('.footmenu .go').click(function(){
			$('#zhezhao').show();
			getShareInfoA(id)	
		})
	})
}

$(function(){
	getDetail()
})
</script>
<script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>

<script>
$(function(){
	var murl=window.location.href
	var js_url=base_url+'Wechat/jssign'	
	console.log(murl);
	$.post(js_url,{fromurl:murl},function(data){
		options=data.data.msg;
		wx.config(options);
		wx.ready(function () {})
	})
})
function getShareInfoA(id){
	var url=base_url+'activity/getShareInfo'
	$.get(url,{id:id,token:token},function(data){
		if(data.data.code==1){
			wx.onMenuShareTimeline({
			    title: data.data.msg.title, // 分享标题
			    link: data.data.msg.url, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
			    imgUrl: data.data.msg.logo, // 分享图标
			    success: function () {
			    	$('#zhezhao').hide()
			    	location.href="myshop.html?token="+token;
				},
				cancel: function () {
					$('#zhezhao').hide()
			    	location.href="myshop.html?token="+token;
				}
			})
			wx.onMenuShareAppMessage({
				title: data.data.msg.title, // 分享标题
				desc: data.data.msg.desc, // 分享描述
				link: data.data.msg.url, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
				imgUrl: data.data.msg.logo, // 分享图标
				success: function () {
					$('#zhezhao').hide()
			    	location.href="myshop.html?token="+token;
				},
				cancel: function () {
					$('#zhezhao').hide()
			    	location.href="myshop.html?token="+token;
				}
			});
		}
	})
}

</script>
</body>
</html>