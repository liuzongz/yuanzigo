<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/home/wwwroot/www.yuanzigo.com/public/../application/mobile/view/toc/fill.html";i:1524460680;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title><?php echo (isset($page_title) && ($page_title !== '')?$page_title:'订单确认'); ?></title>
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
		.text-1x{
			font-size:1.2em;		
		}
	</style>
</head>
<body>
<div class="bg-light pad-all bord-btm" id="shop-title">
	<span>
		<img class="img-xs img-circle" src="<?php echo $shop['headimg']; ?>">
	</span>
	<span class="text-bold text-dark text-lg pad-lft">
		<?php echo $shop['shopname']; ?>
	</span>
</div>

<div class="bg-light pad-all row bord-btm" id="activity-title">
	<div class="col-xs-3">
		<img class="img-md" src="<?php echo $activity['headimg'][0]; ?>">
	</div>
	<div class="col-xs-9">
		<p></p>
		<p class="text-bold text-dark text-lg">
			【<?php echo $activity['destination']; ?>】<?php echo $activity['title']; ?>
		</p>
		
		<p class="row">
			<span class="col-xs-8"><?php echo $period['name']; ?></span>
			<span class="col-xs-4 text-lg text-danger">￥<?php echo $format['price']; ?></span>
		</p>
	</div>
</div>

<div class="bg-light pad-all bord-btm row">
	<div class="col-xs-3 text-lg pad-top text-dark">购买数量</div>
	<div class="col-xs-9 text-right">
		<span class="btn" onclick="minus()"><i class="ion-minus icon-2x"></i></span>
		<span class="btn btn-lg" id="buynum"><?php echo (isset($num) && ($num !== '')?$num:"1"); ?></span>
		<span class="btn" onclick="plus()"><i class="ion-plus icon-2x"></i></span>		
	</div>
</div>

<div class="bg-light pad-all mar-top bord-hor text-dark text-lg text-bold">
	订单联系人信息
</div>

<div class="bg-light pad-all mar-top bord-hor text-lg ">
	<form class="form-horizontal">
		<div class="form-group bord-btm">
			<label class="col-xs-3 control-label pad-lft" style="margin-top:0.5em">姓名<span class="text-danger" style="margin-left:0.2em">*</span></label>
			<div class="col-xs-9">
				<input type="text" placeholder="请输入姓名" id="name" class="form-control input-lg bord-no">
			</div>
		</div>
		<div class="form-group bord-btm">
			<label class="col-xs-3 control-label pad-lft" style="margin-top:0.5em">联系手机<span class="text-danger" style="margin-left:0.2em">*</span></label>
			<div class="col-xs-9">
				<input type="text" placeholder="请输入联系手机" id="tel" class="form-control input-lg bord-no">
			</div>
		</div>
		<div class="form-group bord-btm">
			<label class="col-xs-3 control-label pad-lft" style="margin-top:0.5em">微信号</label>
			<div class="col-xs-9">
				<input type="text"  placeholder="请输入微信号，方便联系" id="wechat" class="form-control input-lg bord-no">
			</div>
		</div>
		
		<div class="form-group bord-btm">
			<label class="col-xs-3 control-label pad-lft" style="margin-top:0.5em">联系邮箱</label>
			<div class="col-xs-9">
				<input type="email" placeholder="请输入联系邮箱" id="email" class="form-control input-lg bord-no">
			</div>
		</div>
		<div class="form-group bord-btm">
			<label class="col-xs-3 control-label pad-lft" style="margin-top:0.5em">留言</label>
			<div class="col-xs-9">
				<input type="text" placeholder="请输入留言" id="note" class="form-control input-lg bord-no">
			</div>
		</div>
	</form>
	<p class="text-right"><span class="pad-rgt">共<span class="pad-hor" id="gong"><?php echo (isset($num) && ($num !== '')?$num:"1"); ?></span>份产品</span> 合计：<span class="text-danger text-lg" id="total-price">￥<?php echo $num*$format['price']; ?></span></p>
</div>
	
<div class="pad-all" style="height:15em;"></div>
<div class="footmenu text-center bg-gray-light row">
	<div class="col-xs-6 pad-all text-lg">金额<span class="text-danger" id="btm-price">￥<?php echo $num*$format['price']; ?></span></div>
	<div class="col-xs-6 pad-all bg-warning text-lg" onclick="addOrder()">支付</div>	
</div>

<script>
var price=<?php echo $format['price']; ?>;
var orderid=0;
$(function(){
	getMyaddress()
})
function minus(){
	var buynum=parseInt($('#buynum').text())
	var newnum=buynum-1
	if(newnum<1){
		layer.msg('最少要购买1份')
		$('#buynum').text(1)
		return false;
	}else{
		$('#buynum').text(newnum)
		$('#gong').text(newnum)
	}
	$('#btm-price').text('￥'+price*newnum)
	$('#total-price').text('￥'+price*newnum)
}

function plus(){
	var buynum=parseInt($('#buynum').text())
	var newnum=buynum+1
	$('#buynum').text(newnum)
	$('#gong').text(newnum)
	$('#btm-price').text('￥'+price*newnum)
	$('#total-price').text('￥'+price*newnum)
}


function addOrder(){
	var name=$('#name').val()
	var tel=$('#tel').val()
	var email=$('#email').val()
	var note=$('#note').val()
	var wechat=$('#wechat').val()
	var buynum=parseInt($('#buynum').text())
	var id=getQueryVariable('id')
	var add_url="<?php echo url('toc/addOrder'); ?>"

	if(isNull(name)){
		layer.alert('联系人姓名不能为空')
		return false
	}
	if(!ckTel(tel)){
		layer.alert('手机号码为空或有误')
		return false
	}
	
	$.post(add_url,{buynum:buynum,name:name,tel:tel,wechat:wechat,email:email,note:note,id:<?php echo $id; ?>,orderid:orderid,format:<?php echo $format_id; ?>,period:<?php echo $period_id; ?>},function(data){
		if(data.status==1){
			orderid=data.msg
			callpay(orderid)
		}else{
			layer.alert(data.data.msg)
		}
	})
}

function getMyaddress(){
	var get_url="<?php echo url('toc/getMyAddress'); ?>"
	$.get(get_url,function(data){
		console.log(data)
		if(data.status==1){
			$('#name').val(data.msg.contact)
			$('#tel').val(data.msg.tel)
			$('#wechat').val(data.msg.wechat)
			$('#email').val(data.msg.email)
		}
	})
}

</script>

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