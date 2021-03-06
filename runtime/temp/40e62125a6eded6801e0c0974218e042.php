<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/home/wwwroot/www.yuanzigo.com/public/../application/mobile/view/index/ask.html";i:1524460678;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title><?php echo (isset($page_title) && ($page_title !== '')?$page_title:'客服中心'); ?></title>
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
	.jiao{
		border-radius:5px;
	}
	.input-search{
		border-radius:15px;
		margin:0 0.5em;
		width:95%;
		background-color:#f8f9fa;
	}
	
	input[type='text']{
	    text-align:center;
	}
	
	input[type='text']:focus{
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
<div class="row text-center bg-light pad-all">
	<div class="col-xs-6    bord-rgt"><a href="tel:13248285336 "><i class="ion-ios-telephone-outline icon-5x icon-circle text-warning"></i><p>电话咨询</p></a></div>
	<div class="col-xs-6  "><i class="ion-chatbubbles icon-5x text-success"></i><p>微信留言</p></div>
</div>
<div id="askbody" class="mar-top bg-light pad-all">
	<p class="text-bold text-center pad-btm bord-btm text-dark text-lg">常见问题</p>
	<div id="ask-box"></div>
</div>

<div id="qr" class="mar-top bg-light" style="display:none">
	<p class="text-bold text-center pad-btm bord-btm text-dark text-lg pad-top">长按下面二维码，添加客服并咨询</p>
	<div class="pad-all">
		<img src="__IMG__/datong.jpg" class="img-responsive" style="max-width:70%;margin-left:15%"/>
	</div>
</div>

<div class="pad-all" style="height:15em;"></div>
<div class="footmenu row text-center bg-gray-light">
	<a href="<?php echo url('mobile/activity/index'); ?>">
		<span class="col-xs-4">
			<i class="ion-grid icon-2x"></i><br>
			发现
		</span>
	</a>
	<a href="<?php echo url('mobile/shop/index'); ?>">
		<span class="col-xs-4">
			<i class="ion-compose icon-2x"></i><br>
			管理小店
		</span>
	</a>
	<a href="<?php echo url('mobile/index/ask'); ?>" data-page="ask">
		<span class="col-xs-4 on">
			<i class="ion-chatbubble-working icon-2x"></i><br>
			有疑问找我
		</span>
	</a>
</div>

<script id="ask-temp" type="html/text">
{{each msg as v i}}
	<p class="text-dark text-lg">{{v.title}}</p>
	<div class="mar-btm">{{=v.intro}}</div>
{{/each}}
</script>	
<script>
$('.ion-chatbubbles').click(function(){
	$('#qr').show();
	$('#askbody').hide()
})
var base_url='http://www.xiaomange.com/api4/'
var ask_url=base_url+'pub/getQuestionList'
var tagsId=0;
$(function(){
	getList()
})


function getList(){
	$.get(ask_url,{},function(data){
		if(data.data.code==1){
			$('#emptylist').hide();
			console.log(data)
			var html=template('ask-temp',data.data)
			$('#ask-box').append(html)
		}else{
			$('#emptylist').show();
		}				
	})
	
}

$('.footmenu a').click(function(){
	location.href=$(this).attr('data-page')+'.html'
})

</script>
<script id="tags-temp" type="html/text">
{{each data as v}}
	<li ><a href="javascript:void(0)" data-id="{{v.id}}">{{v.name}}</a></li>
{{/each}}	
</script>
<script id="item-temp" type="html/text">
{{each list as v}}
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
					<div class="col-xs-7">统一零售价<span>￥{{v.format.price}}</span></div>
					<div class="col-xs-5">利润<span>￥{{v.format.price-v.format.cost}}</span></div>
				</div>
			</div>
		</div>
	</div>
</a>
{{/each}}
</script>
<script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script>
$(function(){
	var murl=window.location.href
	var js_url="<?php echo url('toc/jssign'); ?>"
	$.post(js_url,{fromurl:murl},function(data){
		options=data.data.msg;
		wx.config(options);
		wx.ready(function () {
			wx.hideOptionMenu();
			// 支付成功后的操作		     
		})
	})
})
</script>
</body>
</html>
