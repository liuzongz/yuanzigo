<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/home/wwwroot/www.yuanzigo.com/public/../application/mobile/view/toc/myorder.html";i:1524132465;}*/ ?>
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
	
	<script type="text/javascript"> 
function showTime(orderid, time_distance) { 
	this.orderid = orderid;
	this.time_distance = time_distance * 1000; 
}

showTime.prototype.setTimeShow = function () {
	var timer = $("#lasttime_" + this.orderid); 
	var payp=$('#order_p_'+this.orderid);
	var str_time; 
	var int_day, int_hour, int_minute, int_second; 
	time_distance = this.time_distance; 
	this.time_distance = this.time_distance - 1000; 
	if (time_distance > 0) { 
		int_day = Math.floor(time_distance / 86400000); 
		time_distance -= int_day * 86400000; 
		int_hour = Math.floor(time_distance / 3600000); 
		time_distance -= int_hour * 3600000; 
		int_minute = Math.floor(time_distance / 60000); 
		time_distance -= int_minute * 60000; 
		int_second = Math.floor(time_distance / 1000); 
		if (int_hour < 10) 
			int_hour = "0" + int_hour; 
		if (int_minute < 10) 
			int_minute = "0" + int_minute; 
		if (int_second < 10) 
			int_second = "0" + int_second; 
		str_time = int_minute + "分钟" + int_second + "秒"; 
		timer.text(str_time); 
		var self = this; 
		setTimeout(function () { 
			self.setTimeShow(); 
			}, 1000);
	} else { 
		timer.text("请重新下单购买");
		payp.html('')
		return; 
	} 
} 
</script> 
</head>
<body>

<div class="bg-light text-center text-dark text-lg pad-hor">
	<div class="row pad-ver" id="status-box">
		<a href="<?php echo url('toc/myorder'); ?>?status=9" class="col-xs-3 <?php if($status == '9'): ?>ontab<?php endif; ?>" data-status='9'>
			<p>待支付</p><span id="wait-pay"><?php echo (isset($count['s9']) && ($count['s9'] !== '')?$count['s9']:'0'); ?></span>
		</a>
		<a href="<?php echo url('toc/myorder'); ?>?status=1" class="col-xs-3 <?php if($status == '1'): ?>ontab<?php endif; ?>" data-status='1'>
			<p>已支付</p><span id="already-pay"><?php echo (isset($count['s1']) && ($count['s1'] !== '')?$count['s1']:'0'); ?></span>
		</a>
		<a href="<?php echo url('toc/myorder'); ?>?status=2" class="col-xs-3 <?php if($status == '2'): ?>ontab<?php endif; ?>" data-status='3'>
			<p>已核销</p><span id="wait-clean"><?php echo (isset($count['s2']) && ($count['s2'] !== '')?$count['s2']:'0'); ?></span>
		</a>
		<a href="<?php echo url('toc/myorder'); ?>?status=3" class="col-xs-3 <?php if($status == '3'): ?>ontab<?php endif; ?>" data-status='4'>
			<p>已出行</p><span id="already-go"><?php echo (isset($count['s3']) && ($count['s3'] !== '')?$count['s3']:'0'); ?></span>
		</a>
	</div>
</div>


<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
<div class="bg-light">
<p class="mar-top bord-btm row">
<span class="col-xs-6 pad-ver">订单号：<?php echo $v['order_code']; ?></span>
<span class="col-xs-6 pad-ver text-right"><?php echo $v['update_time']; ?></span>
</p>
<a href="<?php echo url('toc/detail'); ?>?id=<?php echo $v['activity']['id']; ?>">
<div class="row bord-btm pad-btm" >	
	<div class="col-xs-3">
		<img class="img-md jiao" src="<?php echo $v['activity']['headimg'][0]; ?>">
	</div>
	<div class="col-xs-9">
		<p></p>
		<p class="text-bold">
			【<?php echo $v['activity']['destination']; ?>】<?php echo $v['activity']['title']; ?>
		</p>
		
		<p class="row">
			<span class="col-xs-8"><?php echo $v['periodname']; ?></span>
			<span class="col-xs-4 text-lg text-danger">￥<?php echo $v['format']['price']; ?></span>
		</p>
	</div>
</div>
</a>
<?php if($status == '9'): if($v['overtime'] > '0'): ?>
<p class="pad-ver row" >
<span class="col-xs-8">剩余时间：<span id="lasttime_<?php echo $v['id']; ?>"></span></span>
<span class="col-xs-4 text-right pad-rgt" id="order_p_<?php echo $v['id']; ?>">
	<button class="btn btn-success" onclick="callpay(<?php echo $v['id']; ?>)">立即支付</button>
</span>
</p>
<script type="text/javascript"> 
var st = new showTime(<?php echo $v['id']; ?>,<?php echo $v['overtime']; ?>);
st.setTimeShow(); 
</script> 
<?php else: ?>
<p class="pad-ver pad-rgt text-right"><button class="btn btn-default btn-sm" >已过期</button></p>
<?php endif; else: ?>
<p class="pad-ver pad-rgt text-right"><button class="btn btn-default btn-sm" >已支付</button></p>
<?php endif; ?>
</div>
<?php endforeach; endif; else: echo "" ;endif; if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
<div id="nolist" class="text-center" style="margin-top:3em;">
	<i class="ion-clipboard" style="font-size:10em;"></i>
	<p class="text-lg">该分类下没有订单</p>
</div>
<?php endif; ?>

<script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>

<script>
$(function(){
	var base_url="http://www.xiaomange.com/api4/"
	var id=getQueryVariable('id')
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

function callpay(orderId){
	var prepay_url="<?php echo url('toc/prepay'); ?>"
	$.get(prepay_url,{orderId:orderId},function(data){
		options=data.data.msg;
		options.success = function () {
	     	location.href ="<?php echo url('toc/payok'); ?>?id="+orderId
	     };
	    
	    //  取消支付的操作
	     options.cancel = function () {
	    	 pay_order = true;
	     };
	     
	    // 支付失败的处理 
	     options.fail = function () {
	     	pay_order = true;
	     };
	     
		wx.chooseWXPay(options);
	})
}
</script>
</body>
</html>