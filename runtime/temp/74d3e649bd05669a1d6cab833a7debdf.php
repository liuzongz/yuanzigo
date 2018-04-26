<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:78:"E:\wamp\www\www.yuanzigo.com\public/../application/index\view\index\index.html";i:1524460675;s:73:"E:\wamp\www\www.yuanzigo.com\public/../application/index\view\layout.html";i:1524460675;s:78:"E:\wamp\www\www.yuanzigo.com\public/../application/index\view\public\head.html";i:1524460675;s:78:"E:\wamp\www\www.yuanzigo.com\public/../application/index\view\public\foot.html";i:1524460675;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo (isset($page_title) && ($page_title !== '')?$page_title:'原子出发'); ?></title>
	<link rel="stylesheet" href="__CSS__/bootstrap.min.css" />
	<link rel="stylesheet" href="__CSS__/nifty.css" />
	<link rel="stylesheet" href="__PLUGINS__/ionicons/css/ionicons.min.css"> 
	<script src="__JS__/jquery-2.2.4.min.js"></script>
	<script src="__JS__/bootstrap.min.js"></script>
	<script src="__JS__/nifty.min.js"></script>
	<script src="__PLUS__/Layer/layer.js"></script>
</head>
<body>

<div class="bg-success" style="height:0.3em;widht:100%;"></div>
<div class="row bg-light">
	<div class="col-lg-5 col-lg-offset-1 ">
			<img src="__IMG__/logo-hor.png" class=" " style="max-height:6em;"/>
	</div>
	<?php if(empty($userinfo) || (($userinfo instanceof \think\Collection || $userinfo instanceof \think\Paginator ) && $userinfo->isEmpty())): ?>
	<div class="col-lg-4 text-right" style="height:4em;padding:3em 1em;">
		<span class="pad-top">第一次光临原子出发？</span>
		<a href="" class="text-primary">立即注册</a>
		<span class="pad-hor">|</span>
		<a href="" class="text-primary">联系客服</a>
	</div>
	<?php else: ?>
	<div class="col-lg-4" style="height:4em;padding:2.5em 1em;">		
		<div class="text-right">
			<span class="mar-hor"><?php echo $userinfo['username']; ?></span>
			<span class="btn btn-danger btn-xs"><?php echo $userinfo['roletxt']; ?></span>
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
	background-image:url(__IMG__/bannerbg.jpg);
	color:#fff;
}
</style>
<div style="background-color:#ffffff">
	<div class="jumbotron row">
		<div class="col-lg-3 col-lg-offset-7 bg-light img-yuan text-center" style="height:25em;padding:2em;">
			
			<div class="bord-all text-muted">
				<p class="row pad-hor pad-top">
					<span class="col-lg-1">
						<i class="ion-person"></i>
					</span>
					<span class="col-lg-9">
						<input id="username" type="text" class="form-control input-lg bord-no"  placeholder="用户名">
					</span>
				</p>
				<p class="row pad-hor pad-top bord-top">
					<span class="col-lg-1">
						<i class="ion-locked"></i>
					</span>
					<span class="col-lg-9">
						<input id="password" type="password" class="form-control input-lg bord-no"  placeholder="密码">
					</span>
				</p>
			</div>
			<span id="submit" class="btn btn-warning btn-lg img-yuan mar-top" style="width:33%;" onclick="login()">登录</span>
			<span class="btn btn-default btn-lg img-yuan mar-top" style="width:33%;margin-left:31%">忘记密码</span>
		</div>
	</div>
	<div class="row pad-ver">
		<div class="col-lg-10 col-lg-offset-1 bord-all mar-ver pad-all img-yuan">
			<span class="pad-lft">系统公告</span>
			<span class="pull-right">查看更多<i class="ion-chevron-right mar-hor"></i></span>
		</div>
	</div>
</div>
<script>
function login(){
	var password=$('#password').val();
	var username=$('#username').val();
	$.post("<?php echo url('index/login'); ?>",{password:password,username:username},function(data){
		if(data.status==1){
			layer.alert(data.msg,function(){
				location.reload();
			})
		}else{
			layer.alert(data.msg);
		}
	})
}
</script>
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