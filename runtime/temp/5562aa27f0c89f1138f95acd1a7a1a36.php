<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"/home/wwwroot/www.yuanzigo.com/public/../application/index/view/order/orderinfo.html";i:1517125118;s:83:"/home/wwwroot/www.yuanzigo.com/public/../application/index/view/layoutfootmenu.html";i:1517125117;s:82:"/home/wwwroot/www.yuanzigo.com/public/../application/index/view/public/header.html";i:1517125120;s:86:"/home/wwwroot/www.yuanzigo.com/public/../application/index/view/public/footermenu.html";i:1517125120;}*/ ?>
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

</style>
<!-- <div class="panel bord-no row mar-no">
	<span class="col-xs-9 col-xs-offset-1 mar-top pad-lft">
		<input type="text" class=" form-control input-lg input-btm mar-btm" placeholder='请输入要搜索的关键字' />
	</span>
	<i class="col-xs-2 ion-search icon-2x mar-top"></i>
</div> -->
<!-- <div class="panel"></div> -->
<div class="panel row mar-no">
	<div class="col-xs-2">	
		<img src="<?php echo $eventinfo['headimg']; ?>" class="img-yuan-5 mar-all" />
	</div>
	<div class="col-xs-10">
		<div class="mar-all">
			<p class="mar-lft"><?php echo $eventinfo['title']; if($dateinfo['status'] == '1'): ?><span class="text-success pull-right">已成团</span><?php endif; ?></p>
			<p class="mar-lft">团期：<?php echo date('m月d日',$dateinfo['start_date']); ?></p>
		</div>
	</div>
</div>
<?php if(!(empty($orderinfo) || (($orderinfo instanceof \think\Collection || $orderinfo instanceof \think\Paginator ) && $orderinfo->isEmpty()))): ?>
<div class="panel-footer row">
		<?php if($dateinfo['status'] == '1'): ?>
			<div class="col-xs-6 text-center">
				<button class="btn btn-success" disabled="disabled">已成团</button>
			</div>
		<?php else: ?>
			<div class="col-xs-6 text-center">
				<button class="date-action btn btn-primary" data-status="3" data-eventid="<?php echo $eventinfo['id']; ?>" data-dateid="<?php echo $dateinfo['id']; ?>">确定成团</button>
			</div>
		<?php endif; ?>
		<div class="col-xs-6 text-center">
			<button class="date-action btn btn-danger" data-status="9" data-eventid="<?php echo $eventinfo['id']; ?>" data-dateid="<?php echo $dateinfo['id']; ?>">取消该团</button>
		</div>
	</div>
<?php endif; ?>
<div class="panel"></div>
<?php if(!(empty($orderinfo) || (($orderinfo instanceof \think\Collection || $orderinfo instanceof \think\Paginator ) && $orderinfo->isEmpty()))): if(is_array($orderinfo) || $orderinfo instanceof \think\Collection || $orderinfo instanceof \think\Paginator): $i = 0; $__LIST__ = $orderinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
	<div class="panel bord-no" id="panel<?php echo $v['id']; ?>">
		<div class="panel-heading row">
		<p class="pad-top pad-lft col-xs-6 text-left"><?php echo date('Y-m-d H:i:s',$v['ctime']); ?></p>
			<?php switch($v['status']): case "1": ?>
					<p class="pad-top col-xs-6 text-right text-muted">待支付</p>
				<?php break; case "2": ?>
					<p class="pad-top col-xs-6 text-right">待确认</p>
				<?php break; case "3": ?>
					<p class="pad-top col-xs-6 text-right">待出行</p>
				<?php break; case "4": ?>
					<p class="pad-top col-xs-6 text-right">已完成</p>
				<?php break; case "5": ?>
					<p class="pad-top col-xs-6 text-right text-danger">申请退款，请及时处理</p>
				<?php break; endswitch; ?>
		</div>
		<div class="panel-body row mar-no">
			<div class="col-xs-3">
			<img src="<?php echo $v['headimg']; ?>" class="img-yuan-5" />
			</div>
			<div class="col-xs-7">
				<p>联系人:<?php echo $v['contact']; ?></p>
				<p>电话:<?php echo $v['tel']; ?></p>
				<p>订单人数：<?php echo $v['adult_num']+$v['baby_num']; ?></p>
			</div>			
			<div class="col-xs-1">
				<div class="pad-top mar-top">
					<i class="ion-chevron-down icon-2x showinfo" data-id="<?php echo $v['id']; ?>"></i>
				</div>			
			</div>
			
		</div>
		<div class="panel-footer row" style="display:none" id="footer<?php echo $v['id']; ?>">
			<?php if(is_array($v['traveler']) || $v['traveler'] instanceof \think\Collection || $v['traveler'] instanceof \think\Paginator): $k = 0; $__LIST__ = $v['traveler'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($k % 2 );++$k;?>
				<div class="col-xs-12">
					<p class=""><span class="label label-success mar-rgt">游客<?php echo $k; ?></span><?php echo $t['name']; if(!(empty($t['tel']) || (($t['tel'] instanceof \think\Collection || $t['tel'] instanceof \think\Paginator ) && $t['tel']->isEmpty()))): ?>(TEL:<?php echo $t['tel']; ?>)<?php endif; ?></p>
					<p class="">
						<?php switch($t['card_style']): case "1": ?>身份证<?php break; case "2": ?>军官证<?php break; case "3": ?>护照<?php break; endswitch; ?>
						<?php echo $t['card']; ?>
					</p>
				</div>
			<?php endforeach; endif; else: echo "" ;endif; if($v['status'] == '5'): ?>
			<div class="col-xs-12 row text-center  pad-ver bord-top">
				<div class="col-xs-4 refund" data-id="<?php echo $v['id']; ?>"><span class="text-primary">退款操作</span></div>
				<a class="col-xs-4" href="tel:<?php echo $v['tel']; ?>"><span class="text-primary">给TA致电</span></a>
				<div class="col-xs-4"></div>
			</div>
			<?php endif; ?>
		</div>
	</div>	
	<?php endforeach; endif; else: echo "" ;endif; else: ?>
	<div class="text-center">
		<i class="ion-sad-outline icon-5x"></i>
		<p class="mar-top">您还没有发布任何订单哦</p>
	</div>
<?php endif; ?>

<script>
$('.refund').click(function(){
	var that=$(this)
	var id=that.attr('data-id');
	var url="<?php echo url('order/refund'); ?>";
	layer.confirm('确定给TA退款吗？', {
		  btn: ['退款','不给退款','取消操作']
		}, function(){
			$.post(url,{id:id},function(data){
				if(data.status==1){
					layer.alert(data.msg,{title:false,closeBtn:false},function(){
						location.reload();
					})
				}else{
					layer.alert(data.msg,{title:false,closeBtn:false},function(){
						layer.closeAll();
					});					
				}
			})
		}, function(){
			$.post("<?php echo url('order/setstatus'); ?>",{id:id,status:3},function(data){
				if(data.status==1){
					layer.alert(data.msg,{title:false,closeBtn:false},function(){
						location.reload();
					})
				}else{
					layer.alert(data.msg,{title:false,closeBtn:false},function(){
						layer.closeAll();
					});					
				}
			})
		},function(){
			layer.closeAll();
		});
})

$('.action').click(function(){	
	var url="<?php echo url('order/setstatus'); ?>"
	var status=$(this).attr('data-status');
	var id=$(this).attr('data-id')
	$.post(url,{id:id,status:status},function(data){
		if(data.status==1){
			layer.alert(data.msg,{title:false,closeBtn:false},function(){
				location.reload();
			})			
		}else{
			layer.alert(data.msg,{title:false,closeBtn:false})
		}
	})
})
$('.date-action').click(function(){
	var url="<?php echo url('order/dateSetStatus'); ?>"
	var eventid=$(this).attr('data-eventid')
	var dateid=$(this).attr('data-dateid')
	var status=$(this).attr('data-status')
	console.log('eventid='+eventid)
	console.log('dateid='+dateid)
	console.log('status='+status)
	if(status==3){
		//如果是设置成团，告诉商家成团后的每个新订单都将无须确认，即可成团
		layer.confirm('确定成团后，所有新订单将自动成团，请确定', {
		  btn: ['确定成团','取消操作']
		}, function(){			
			setdatestatus(url,eventid,dateid,status)
		},function(){
			layer.closeAll()
		})
	}
	
	if(status==9){
		//如果是设置取消成团，告诉商家成团所有订单将自动取消，同时将对游客进行退款
		layer.confirm('取消成团，<p style="color:red">将取消所有游客的订单，同时进行所有人的退款</p>，请先跟游客进行沟通，再慎重选择', {
		  btn: ['取消成团','再看看']
		}, function(){
			var index = layer.load(1, {
				  shade: [0.1,'#fff'] //0.1透明度的白色背景
				});
			setdatestatus(url,eventid,dateid,status)
		},function(){
			layer.closeAll()
		})
	}
	
	
})
function setdatestatus(url,eventid,dateid,status){
	$.post(url,{eventid:eventid,dateid:dateid,status:status},function(data){
		if(data.status==1){
			layer.alert(data.msg,{title:false,closeBtn:false},function(){
				location.reload();
			})			
		}else{
			layer.alert(data.msg,{title:false,closeBtn:false},function(){
				layer.closeAll()
			})
		}
	})
}

$('.showinfo').click(function(){
	//$('.panel-footer').hide();
	$('#footer'+$(this).attr('data-id')).toggle();
	if($(this).hasClass('ion-chevron-down')){
		$(this).removeClass('ion-chevron-down').addClass('ion-chevron-up')
	}else{
		$(this).removeClass('ion-chevron-up').addClass('ion-chevron-down')
	}
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