<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:86:"/home/wwwroot/www.yuanzigo.com/public/../application/admin/view/shouqianba/detail.html";i:1524460666;s:75:"/home/wwwroot/www.yuanzigo.com/public/../application/admin/view/nohead.html";i:1524460665;s:84:"/home/wwwroot/www.yuanzigo.com/public/../application/admin/view/public/noheader.html";i:1524460666;s:82:"/home/wwwroot/www.yuanzigo.com/public/../application/admin/view/public/footer.html";i:1524460665;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title><?php echo (isset($page_title) && ($page_title !== '')?$page_title:'原子出发'); ?></title>
    <link href="__CSS__/bootstrap.css" rel="stylesheet">
    <link href="__CSS__/nifty.css" rel="stylesheet">
    <link href="__PLUGINS__/ionicons/css/ionicons.min.css" rel="stylesheet">    
    <script src="__JS__/jquery-2.2.4.min.js"></script>
    <script src="__JS__/bootstrap.min.js"></script>
    <script src="__JS__/nifty.js"></script>
    <script src="__PLUS__/Layer/layer.js"></script>
    <script src="__PLUS__/Jquery/template.js"></script>
    <style>
		html,body{ 
			margin:0px; 
			height:100%; 
			-webkit-overflow-scrolling: touch;
			background-color:#e7e8eb;
			/* overflow: hidden;
			overflow-y: hidden; */
		}
		.input{
			border-color: #d1d9de; 
			border-style: solid; 
			border-top-width: 0px;
			border-right-width: 0px; 
			border-bottom-width: 0px;
			border-left-width: 0px
		}
		
		.input-btm{
			border-color: #d1d9de; 
			border-style: solid; 
			border-top-width: 0px;
			border-right-width: 0px; 
			border-bottom-width: 1px;
			border-left-width: 0px
		}
		.img-yuan{
			border-radius: 5px;
		}
		.img-yuan-5{
			border-radius: 5px;
			width:5em;
			height:5em;
		}
		.noclick{
			pointer-events: none;
		}
		.outdian{
			overflow: hidden;
			text-overflow: ellipsis;
			white-space: nowrap; 
		}
		.gotop{
			position:fixed;
			bottom:5em;
			right: 2em;
			z-index:999;
		}
	.isbtm{
			position:fixed;
			bottom:0;
			left: 0;
			width: 100%;
			height:60px;
			background: #fff;
			z-index:999;
		}
		.setstatus,.link{
			cursor:pointer
		}
	</style>
</head>
<body>

 
<div class="panel">
	<div class="panel-heading pad-hor">
		<h3>订单详情</h3>
	</div>
	<div class="panel-body pad-all">		
		<div class="well well-sm row">
			<div class="col-lg-4 text-center pad-top">
			商户订单号：<?php echo $info['order_id']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			订单时间：<?php echo $info['time']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			收款通道：<?php echo $info['from']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			交易模式：<?php echo $info['model']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			订单状态：<?php echo $info['status']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			订单金额：<?php echo $info['price']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			实收金额：<?php echo $info['amount']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			扣率：<?php echo $info['kou']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			手续费：<?php echo $info['post']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			商户名称：<?php echo $info['shop']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			商户号：<?php echo $info['shop_num']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			门店名称：<?php echo $info['dian']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			门店号：<?php echo $info['dian_num']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			终端名称：<?php echo $info['vender_name']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			终端号：<?php echo $info['vender_sn']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			终端类型：<?php echo $info['vender_type']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			设备号：<?php echo $info['dsn']; ?>
			</div><div class="col-lg-4 text-center pad-top">
			付款账户：<?php echo $info['user']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			收款通道订单号：<?php echo $info['save_id']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			操作员：<?php echo $info['opreat']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			收银员：<?php echo $info['shou']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			商户内部订单号：<?php echo $info['in_order_id']; ?>
			</div>
			<div class="col-lg-4 text-center pad-top">
			是否试用：<?php echo $info['try_use']; ?>
			</div>
		</div>
	</div>
	<div class="panel-footer"></div>
</div>

<div style="width:100%;height:10em;"></div>
<script>
layer.ready(function(){
	layer.config({
		  anim: 1,
		  title:0,
		  closeBtn:0,		 
		});
});
</script>
</body>
</html>