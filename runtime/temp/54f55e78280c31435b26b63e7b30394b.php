<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"/home/wwwroot/www.yuanzigo.com/public/../application/mobile/view/index/orderlist.html";i:1523469027;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title><?php echo (isset($page_title) && ($page_title !== '')?$page_title:'活动订单列表'); ?></title>
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
<div class="bg-light pad-all row bord-btm" id="activity-box">

</div>

<div class="bg-light text-center text-dark text-lg pad-hor mar-top">
	<div class="row pad-ver" id="status-box">
		<div class="col-xs-3 ontab" data-status='9'>
			<p>待支付</p><span id="wait-pay">0</span>
		</div>
		<div class="col-xs-3" data-status='1'>
			<p>已支付</p><span id="already-pay">0</span>
		</div>
		<div class="col-xs-3" data-status='3'>
			<p>已核销</p><span id="wait-clean">0</span>
		</div>
		<div class="col-xs-3" data-status='4'>
			<p>已出行</p><span id="already-go">0</span>
		</div>
	</div>
</div>

<div class="mar-top bg-light" id="list-box"></div>

<div id="nolist" class="text-center" style="margin-top:3em;display:none">
	<i class="ion-clipboard" style="font-size:10em;"></i>
	<p class="text-lg"><span id="tabname" class="text-warning text-bold hide">待支付</span> 该分类下没有订单</p>
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
		<span class="col-xs-4 on">
			<i class="ion-compose icon-2x"></i><br>
			管理小店
		</span>
	</a>
	<a href="#" data-page="ask" >
		<span class="col-xs-4">
			<i class="ion-chatbubble-working icon-2x"></i><br>
			有疑问找我
		</span>
	</a>
</div>

<script id="list-temp" type="html/text">
{{each msg as v i}}
	<p class="pad-all bord-btm row">
		<span class="col-xs-1">{{i+1}}</span>
		<span class="col-xs-2">{{v.total_num}}份</span>
		<span class="col-xs-7">联系人:{{v.contact}} <a href="tel:{{v.tel}}" ><span class="text-primary">{{v.tel}}</span></a></span>
		<span class="col-xs-2">￥ {{ if v.pay_status==1}}{{v.pay_price}}{{ else}}{{v.total_price}}{{ /if}}</span>
	</p>
{{/each}}
</script>

<script id="activity-temp" type="html/text">
	<div class="col-xs-3">
		<img class="img-md jiao" src="{{msg.headimgs}}">
	</div>
	<div class="col-xs-9">
		<p class="text-bold text-lg text-dark">【{{msg.destination}}】{{msg.title}}</p>
		<div class="row">
			<div class="col-xs-6">
				<p>销售额<span class="text-danger text-lg">￥{{msg.allPrice}}</span></p>
				<p>利润<span class="text-danger text-lg">￥{{msg.profit}}</span></p>
			</div>
			<div class="col-xs-6">
				<p>单价￥{{msg.format.price}}</p>				
				<p>销量<span class="text-danger text-lg"> {{msg.allsalenum}}</span> 库存{{msg.lastnum}}</p>
			</div>
		</div>
	</div>
</script>

<script>
$('.footmenu a').click(function(){
	location.href=$(this).attr('data-page')+'.html?token='+token
})

$(function(){
	var list_url=base_url+'shop/getOrderList'
	var id=getQueryVariable('id')
	$.get(list_url,{token:token,id:id},function(data){
		if(data.data.code==1){
			$('#nolist').hide();
			var html=template('list-temp',data.data)
			$('#list-box').empty().append(html)
		}else{
			$('#nolist').show();
		}
	})
	
	var info_url=base_url+'shop/getActivityInfo'
	$.get(info_url,{id:id,token:token},function(data){
		if(data.data.code==1){
			var html=template('activity-temp',data.data)
			$('#activity-box').empty().append(html)
		}
		console.log(data)
	})
	
	var status_url=base_url+"shop/getOrderStatus"
	$.get(status_url,{id:id,token:token},function(data){
		if(data.data.code==1){
			$('#wait-pay').text(data.data.msg.wait_pay)
			$('#already-pay').text(data.data.msg.already_pay)
			$('#wait-clear').text(data.data.msg.wait_clear)
			$('#already-go').text(data.data.msg.already_go)
		}
		console.log(data)
	})	
})
$('#status-box div').click(function(){
	var status=$(this).attr('data-status')
	var that=$(this)
	var tabname=that.find('p').text()
	$('#status-box div').removeClass('ontab')
	$(this).addClass('ontab')
	$('#tabname').text(tabname)
	var list_url=base_url+'shop/getOrderList'
	var id=getQueryVariable('id')
	$.get(list_url,{token:token,id:id,status:status},function(data){
		if(data.data.code==1){
			$('#nolist').hide();
			var html=template('list-temp',data.data)
			$('#list-box').empty().append(html)
			$('#list-box').show();
		}else{
			
			$('#nolist').show();
			$('#list-box').hide();
		}
	})
	
})
</script>
</body>
</html>