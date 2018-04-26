<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:79:"/home/wwwroot/www.yuanzigo.com/public/../application/home/view/index/index.html";i:1517125096;s:76:"/home/wwwroot/www.yuanzigo.com/public/../application/home/view/layouthd.html";i:1517125097;s:81:"/home/wwwroot/www.yuanzigo.com/public/../application/home/view/public/header.html";i:1517125098;s:81:"/home/wwwroot/www.yuanzigo.com/public/../application/home/view/public/footer.html";i:1517125098;}*/ ?>
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
<div class="bg-success" style="height:0.3em;widht:100%;"></div>
<div class="row bg-light">
	<div class="col-lg-4 col-lg-offset-2 pad-all">
			<img src="__IMAGES__/logo-hor.png" class="img-responsive " style="max-height:4em;"/>
	</div>
	<?php if(empty($talent) || (($talent instanceof \think\Collection || $talent instanceof \think\Paginator ) && $talent->isEmpty())): ?>
	<div class="col-lg-4 text-right" style="height:4em;padding:3em 1em;">
		<span class="pad-top">第一次使用原子出发？</span>
		<a href="" class="text-primary">立即注册</a>
		<span class="pad-hor">|</span>
		<a href="" class="text-primary">联系客服</a>
	</div>
	<?php else: ?>
	<div class="col-lg-4" style="height:4em;padding:2.5em 1em;">		
		<div class="text-right">
			<span class="mar-hor"><?php echo $talent['shopname']; ?></span>
			<?php if($talent['group'] == '1'): ?>
			<span class="btn btn-primary btn-xs ">VIP</span>
			<?php endif; if($talent['verify'] == '0'): ?>
			<span class="btn btn-default btn-xs link" data-url="<?php echo url('user/verify'); ?>">未认证</span>
			<?php endif; if($talent['verify'] == '1'): ?>
			<span class="btn btn-warning btn-xs">待审核</span>
			<?php endif; if($talent['verify'] == '2'): ?>
			<span class="btn btn-success btn-xs link" data-url="<?php echo url('user/verify'); ?>">已认证</span>
			<?php endif; if($talent['verify'] == '3'): ?>
			<span class="btn btn-danger btn-xs link" data-url="<?php echo url('user/verify'); ?>">认证失败</span>
			<?php endif; ?>				
			<span class="mar-hor">|</span>
			<a class="text-primary" href="<?php echo url('index/logout'); ?>">退出</a>
		</div>
	</div>
	<?php endif; ?>
</div>
 
<style>
.jumbotron{
	padding-left: 0;
    padding-right: 0;
    margin-top: 0;
    min-height: 30em;
	background-image:url(__IMAGES__/bannerbg.jpg);
	color:#fff;
}
</style>
<div style="background-color:#ffffff">
	<div class="jumbotron row">
		<div class="col-lg-3 col-lg-offset-7 bg-light img-yuan text-center" style="height:25em;padding:2em;">
			<p style="font-size:2em;">微信扫码登录</p>
			<img src="<?php echo $qr; ?>" class=" text-center" style="max-height:14em;" />
			<p>请打开微信扫一扫，扫码登录！</p>
			<!-- <div class="bord-all text-muted">
				<p class="row pad-hor pad-top">
					<span class="col-lg-1">
						<i class="ion-person"></i>
					</span>
					<span class="col-lg-10">
						<input id="phone" type="number" class="form-control input-lg bord-no"  placeholder="手机号">
					</span>
				</p>
				<p class="row pad-hor pad-top bord-top">
					<span class="col-lg-1">
						<i class="ion-locked"></i>
					</span>
					<span class="col-lg-10">
						<input id="password" type="password" class="form-control input-lg bord-no"  placeholder="密码">
					</span>
				</p>
			</div>
			<span id="submit" class="btn btn-success btn-lg img-yuan mar-top" style="width:33%;">登录</span>
			<span class="btn btn-default btn-lg img-yuan mar-top" style="width:33%;margin-left:31%">忘记密码</span> -->
		</div>
	</div>
	<div class="row pad-ver">
		<div class="col-lg-8 col-lg-offset-2 bord-all mar-ver pad-all img-yuan">
			<span class="pad-lft">系统公告</span>
			<span class="pull-right">查看更多<i class="ion-chevron-right mar-hor"></i></span>
		</div>
	</div>
</div>
<script>
$(function(){
	var timer=setInterval("ck()",3000);//1000为1秒钟
})

function ck(){
     $.post("<?php echo url('index/scan'); ?>",{c:1},function(data){
    	 if(data.status==1){
    		 layer.alert(data.msg,{title:false,closeBtn:false},function(){
    			 location.reload();
    		 })
    	 }
    	 if(data.status==2){
    		 layer.alert(data.msg,{title:false,closeBtn:false},function(){
    			 clearInterval(timer);
    		 })
    	 }
     })
 }
</script>
<div style="width:100%;height:10em;"></div>
<script>
$('.link').click(function(){
	location.href=$(this).attr('data-url');
})
$('.newie').click(function(){
	var h=$(window).height();
	window.open($(this).attr('data-url'),'_blank',"location=no, menubar=no, toolbar=no, resizable=yes, width=400, height="+h);
})
</script>
</body>
</html>