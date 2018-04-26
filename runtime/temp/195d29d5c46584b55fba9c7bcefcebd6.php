<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/home/wwwroot/www.yuanzigo.com/public/../application/mobile/view/index/myshop.html";i:1523469027;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title><?php echo (isset($page_title) && ($page_title !== '')?$page_title:'管理我的店铺'); ?></title>
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
			padding:1em;
			border-top:1px solid #999999;
		}
		.on{
			color:#efb239;
			font-weight:600;
		}
		.ontab{
			color:#efb239;
			font-weight:600;
			border-bottom:3px solid #efb239;
		}
		.jiao{
			border-radius:5px;
		}
	</style>
</head>
<body>
<div class="bg-light text-center text-dark text-lg pad-hor">
	<p class="pad-ver text-bold bord-btm">总营收</p>
	<div class="row pad-ver" id="profit-box">
		<div class="col-xs-3" data-page="profit.html?type=1">
			<p>销售额</p><span id="allprice">0</span>
		</div>
		<div class="col-xs-3 bord-rgt" data-page="profit.html?type=2">
			<p>利润</p><span id="profit">0</span>
		</div>
		<div class="col-xs-3"  data-page="cost.html?type=1">
			<p>未提现</p><span id="waitclear">0</span>
		</div>
		<div class="col-xs-3"  data-page="cost.html?type=2">
			<p>已提现</p><span id="overclear">0</span>
		</div>
	</div>
</div>

<div class="bg-light text-center  mar-top text-lg row" id="status-box">
	<div class="col-xs-6 bord-rgt ontab pad-all">售卖中</div>
	<div class="col-xs-6 pad-all">已结束</div>
</div>
<div id="listbox"></div>




<div id="nolist-box" class="text-center" style="margin-top:3em;display:none">
	<i class="ion-clipboard" style="font-size:10em;"></i>
	<p class="text-lg">您还没有产品哦！</p>
</div>

<div class="pad-all" style="height:15em;"></div>
<div class="footmenu row text-center bg-gray-light">
	<a href="#" data-page="index">
		<span class="col-xs-4">
			<i class="ion-grid icon-2x"></i><br>
			发现
		</span>
	</a>
	<a href="#" data-page="myshop">
		<span class="col-xs-4">
			<i class="ion-compose icon-2x on"></i><br>
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
<script id="list-temp" type="html/text">
{{each msg as v}}
<div class="bg-light pad-all row mar-top bord-btm">
	<div class="col-xs-3">
		<img class="img-md jiao" src="{{v.headimgs}}">
	</div>

	<div class="col-xs-9">
		<p class="text-bold text-lg text-dark title"><a href="#" data-page="detailtoc.html?id={{v.id}}">【{{v.destination}}】{{v.title}}</a></p>
		<div class="row">
			<div class="col-xs-6">
				<p>销售额<span class="text-danger">￥{{v.allPrice}}</span></p>	
				<p>利润<span class="text-danger">￥{{v.profit}}</span></p>			
				
			</div>
			<div class="col-xs-6">
				<p>单价￥{{v.format.price}}</p>
				<p>销量{{v.allsalenum}} 库存{{v.lastnum}}</p>
			</div>
		</div>
	</div>
</div>

<div class="bord-btm pad-all text-right bg-light act">
	<a href="#" data-page="orderlist.html?id={{v.id}}"><button class="btn btn-warning jiao mar-rgt">查看订单</button></a>
	<button class="btn btn-warning jiao mar-rgt">确认出行</button>
	<a href="#" data-page="detailtoc.html?id={{v.id}}"><button class="btn btn-warning jiao">预览</button></a>
</div>
{{/each}}
</script>
<script>

$(function(){
	getActivity()
	getCount()
})

function getActivity(){
	var get_url=base_url+'shop/getMyActivity'
	$.get(get_url,{token:token},function(data){
		if(data.data.code==1){
			var html=template('list-temp',data.data)
			$('#listbox').empty().append(html)
			$('.act a,.title a').click(function(){
				var page=$(this).attr('data-page');
				location.href=page+'&token='+token
			})
			$('#nolist-box').hide();
		}else{
			$('#nolist-box').show();
		}
	})
}

function getCount(){
	var get_url=base_url+'shop/getCount'
	$.get(get_url,{token:token},function(data){
		if(data.data.code==1){
			$('#allprice').text(data.data.msg.allPrice)
			$('#profit').text(data.data.msg.profit)
		}
	})
}
$('.footmenu a').click(function(){
	location.href=$(this).attr('data-page')+'.html?token='+token
})
</script>
</body>
</html>