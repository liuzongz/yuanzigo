<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:79:"/home/wwwroot/www.yuanzigo.com/public/../application/index/view/user/money.html";i:1517125122;s:83:"/home/wwwroot/www.yuanzigo.com/public/../application/index/view/layoutfootmenu.html";i:1517125117;s:82:"/home/wwwroot/www.yuanzigo.com/public/../application/index/view/public/header.html";i:1517125120;s:86:"/home/wwwroot/www.yuanzigo.com/public/../application/index/view/public/footermenu.html";i:1517125120;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title><?php echo (isset($page_title) && ($page_title !== '')?$page_title:''); ?></title>
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
.size12{
	font-size:1.2em;
}
	</style>
</head>
<body>
 
<style>
.quartr {
			/* width: 25%;*/
			font-size: 14px;
			text-align: center;
			/* border-bottom: 0px solid gray; */
			float: left;
			color: black;
			padding-top: 10px;
			padding-bottom: 10px;
		}
		
		.kuang {
			background:#0191CD;
			/* height: 43px; */
			position: relative;
			width: 50%;
			margin: 0px;
			color:#ffffff;
		}
			
		.kuang:after {
			content: '';
			position: absolute;
			border: 10px solid transparent;
			border-top-color: #0191CD;
			top: 99%;
			left: 40%;
		}
		.bord-yuan{
			border-radius: 5px;
			margin-right:3px;
		}
		.col-xs-7 p{
			padding:0.2em;
		}
</style>
<div class="row mar-no " style="background-color: #FFFFFF;width:100%;">
	<div class="col-xs-6 quartr kuang" data-id="elementlist">
		资源
	</div>
	<div class="col-xs-6 quartr " data-id="eventlist">
		活动
	</div>
</div>

<div id="elementlist" class="boxs pad-no mar-top" style="display:block;">
	<?php if(!(empty($element) || (($element instanceof \think\Collection || $element instanceof \think\Paginator ) && $element->isEmpty()))): if(is_array($element) || $element instanceof \think\Collection || $element instanceof \think\Paginator): $k = 0; $__LIST__ = $element;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
		<div class="panel">
			<div class="row pad-all bord-btm">			
				<div class="col-xs-5"><?php echo date("m-d",$v['otime']); ?> <?php echo wk($v['otime']); ?></div>
				<div class="col-xs-7 text-right pad-rgt">订单号：<?php echo $v['trade']; ?></div>
			</div>
			<div class="row pad-all">	
				<div class="col-xs-5 text-center bord-rgt">
					<p>交易中的资金</p>
					<p >￥<span class="text-2x"><?php echo formatprice($v['commission']); ?></span></p>
				</div>
				<div class="col-xs-7">
					<p class="bord-btm  row">
						<span class="col-xs-6">资源结算价</span>
						<span class="col-xs-6"><?php echo formatprice($v['element']); ?>￥</span>
					</p>
					<p class="row">
						<span class="col-xs-6">技术服务费</span>
						<span class="col-xs-6"><?php echo formatprice($v['fee']); ?>￥</span>
					</p>
				</div>
			</div>
		</div>		
	<?php endforeach; endif; else: echo "" ;endif; else: ?>
	
	<div class="text-center">
		<i class="ion-sad-outline icon-5x"></i>
		<p class="mar-top">这个分类中暂时没有可提现的哦~</p>
	</div>
	<?php endif; ?>
</div>

<div id="eventlist" class="boxs pad-no mar-top" style="display:none;">
	<?php if(!(empty($event) || (($event instanceof \think\Collection || $event instanceof \think\Paginator ) && $event->isEmpty()))): if(is_array($event) || $event instanceof \think\Collection || $event instanceof \think\Paginator): $k = 0; $__LIST__ = $event;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>			
		<div class="panel">
			<div class="row pad-all bord-btm">			
				<div class="col-xs-5"><?php echo date("m-d",$v['otime']); ?> <?php echo wk($v['otime']); ?></div>
				<div class="col-xs-7 text-right pad-rgt">订单号：<?php echo $v['trade']; ?></div>
			</div>
			<div class="row pad-all">	
				<div class="col-xs-5 text-center bord-rgt">
					<p>交易中的资金</p>
					<p >￥<span class="text-2x"><?php echo formatprice($v['commission']); ?></span></p>
				</div>
				<div class="col-xs-7">
					<p class="bord-btm  row">
						<span class="col-xs-6">订单金额</span>
						<span class="col-xs-6">￥<?php echo formatprice($v['pay_total']/100); ?></span>
					</p>
					<p class="bord-btm  row">
						<span class="col-xs-6">与上游结算</span>
						<span class="col-xs-6">￥<?php echo formatprice($v['element']); ?></span>
					</p>
					<p class="row">
						<span class="col-xs-6">技术服务费</span>
						<span class="col-xs-6">￥<?php echo formatprice($v['fee']); ?></span>
					</p>
				</div>
			</div>
		</div>
		<?php endforeach; endif; else: echo "" ;endif; else: ?>
		<div class="text-center">
			<i class="ion-sad-outline icon-5x"></i>
			<p class="mar-top">这个分类中暂时没有可提现哦~</p>
		</div>
		<?php endif; ?>
	
</div>
<script>
$('.link').click(function(){
	location.href=$(this).attr('data-url');
})


$('.quartr').click(function(){
		var that=$(this)
		$('.quartr').removeClass('kuang');
		that.addClass('kuang');
		$('.boxs').css('display','none');
		$('#'+that.attr('data-id')).css('display','block');
	})
	
	
</script>

<style>
	.isbtm{
		position:fixed;
		bottom:0;
		left: 0;
		width: 100%;
		height:60px;
		background: #fff;
		z-index:998;
	}
	.isbtm ul{
	    list-style:none;
	    margin: 0px;
	    padding: 0px;
	    width: 100%;
	}
	.isbtm ul li{
		float:left;
		width:20%;
		text-align:center;	
	}
	.isbtm ul li div{
		margin-top:0.7em;
	}
	.plus{
		position:relative;
		top:-1em;
	}
</style>
<div style="height:100px"></div>
<div class="isbtm">
<ul>
	<li>
		<div class="<?php if($menuinfo['controller'] == 'Element'): ?>text-primary<?php endif; ?> link" data-url="<?php echo url('element/index'); ?>">
			<i class="ion-map icon-2x"></i>
			<p>资源</p>
		</div>
	</li>
	<li>
		<div class="<?php if($menuinfo['controller'] == 'Event'): ?>text-primary<?php endif; ?> link" data-url="<?php echo url('event/index'); ?>">
			<i class="ion-earth icon-2x"></i>
			<p>活动</p>
		</div>
	</li>
	<li>
		<div  class="link" data-url="<?php echo url('active/address'); ?>">
			<i class="ion-plus-circled icon-2x"></i>
			<p>发布</p>
		</div>
	</li>
	<li>
		<div class="<?php if($menuinfo['controller'] == 'Order'): ?>text-primary<?php endif; ?> link" data-url="<?php echo url('order/index'); ?>">
			<i class="ion-clipboard icon-2x"></i>
			<p>订单</p>
		</div>
	</li>
	<li>
		<div class="<?php if($menuinfo['controller'] == 'User'): ?>text-primary<?php endif; ?> link" data-url="<?php echo url('user/index'); ?>">
			<i class="ion-person icon-2x"></i>
			<p>我的</p>
		</div>
	</li>
</ul>
</div>

<script>
$('.link').click(function(){
	location.href=$(this).attr('data-url');
})

</script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.1.0.js"></script>
<script>
wx.config({
	//debug: true,
    appId: '<?php echo $signPackage["appId"]; ?>',
    timestamp: <?php echo $signPackage["timestamp"]; ?>,
    nonceStr: '<?php echo $signPackage["nonceStr"]; ?>',
    signature: '<?php echo $signPackage["signature"]; ?>',
    jsApiList: [
	'checkJsApi','onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ','onMenuShareWeibo','hideMenuItems','showMenuItems','hideAllNonBaseMenuItem','showAllNonBaseMenuItem','translateVoice','startRecord','stopRecord','onRecordEnd','playVoice','pauseVoice','stopVoice','uploadVoice','downloadVoice','chooseImage','previewImage','uploadImage','downloadImage','getNetworkType','openLocation','getLocation','hideOptionMenu','showOptionMenu','closeWindow','scanQRCode','chooseWXPay','openProductSpecificView','addCard','chooseCard','openCard'
	]
  });
var wxData = {
	    "appId": "",
	    "imgUrl" : "<?php echo $shareinfo['logo']; ?>",
	    "link" : "<?php echo $shareinfo['link']; ?>",
	    "desc" : "<?php echo $shareinfo['desc']; ?>",
		"title" : "<?php echo $shareinfo['title']; ?>"
	  };
wx.ready(function () {
	//分享给朋友
	wx.onMenuShareAppMessage({
	      title: wxData.title,
	      desc: wxData.desc,
	      link: wxData.link,
	      imgUrl: wxData.imgUrl,
	      trigger: function (res) {
	        //alert('用户点击发送给朋友');
	      },
	      success: function (res) {
	      },
	      cancel: function (res) {
	      },
	      fail: function (res) {
	      }
	    });
    //分享到朋友圈
	wx.onMenuShareTimeline({
	      title: wxData.title,
	      link: wxData.link,
	      imgUrl: wxData.imgUrl,
	      trigger: function (res) {
	        //alert('用户点击分享到朋友圈');
	      },
	      success: function (res) {
	      },
	      cancel: function (res) {
	      },
	      fail: function (res) {
	      }
	    });    
});

</script>