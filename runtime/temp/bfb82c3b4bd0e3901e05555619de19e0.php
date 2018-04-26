<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:80:"/home/wwwroot/www.yuanzigo.com/public/../application/admin/view/login/index.html";i:1517125078;s:75:"/home/wwwroot/www.yuanzigo.com/public/../application/admin/view/nohead.html";i:1517125078;s:84:"/home/wwwroot/www.yuanzigo.com/public/../application/admin/view/public/noheader.html";i:1517125078;s:82:"/home/wwwroot/www.yuanzigo.com/public/../application/admin/view/public/footer.html";i:1517125078;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>管理后台</title>
<link href="__CSS__/bootstrap.min.css" rel="stylesheet">
<link href="__CSS__/nifty.min.css" rel="stylesheet">
<link href="__PLUGINS__/magic-check/css/magic-check.min.css" rel="stylesheet">

<script src="__JS__/jquery-2.2.4.min.js"></script>
<script src="__JS__/bootstrap.min.js"></script>
<script src="__JS__/nifty.min.js"></script>
<link href="__PLUGINS__/ionicons/css/ionicons.min.css" rel="stylesheet">
<script src="__PLUS__/Layer/layer.js"></script>
</head>
<body>
	
 

<div id="container" class="cls-container">
	<div id="bg-overlay" class="bg-img" style="background-image: url(__IMAGES__/bg-img/bg-img-4.jpg);"></div>
	<div class="cls-content">
		<div class="cls-content-sm panel">
			<div class="panel-body">
				<div class="mar-ver pad-btm">
					<h3 class="h4 mar-no">用户登录!</h3>
					<p class="text-muted">请输入你的账号信息</p>
				</div>
				<form>
					<div class="form-group">
						<input type="text" id="username" class="form-control" placeholder="Username" autofocus="">
					</div>
					<div class="form-group">
						<input type="password" id="password" class="form-control" placeholder="Password">
					</div>
					<div class="checkbox pad-btm text-left">
						<input id="demo-form-checkbox" class="magic-checkbox" type="checkbox">
						<label for="demo-form-checkbox">记住我，下回免登录</label>
					</div>
					<span class="btn btn-primary btn-lg btn-block" id="submit">登录</span>
				</form>
			</div>
		
			<div class="pad-all">
				<a href="pages-password-reminder.html" class="btn-link mar-rgt">忘记密码</a>
				<a href="pages-register.html" class="btn-link mar-lft">注册新用户</a>
		
				<div class="media pad-top bord-top">
					<div class="text-center">
						<a href="#" class="pad-rgt "><i class="ion-chatbubbles icon-lg text-success icon-2x pad-rgt"></i>微信登录</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$('#password').bind('keyup', function(event) {
	if (event.keyCode == "13") {
		$.post("<?php echo url('login/loginapi'); ?>",{username:$('#username').val(),password:$('#password').val()},function(data){
			if(data.status==1){
				layer.msg(data.msg,function(){
					location.href="<?php echo url('index/index'); ?>"
				})
			}else{
				layer.msg(data.msg)
			}
		})
	}
});
$('#submit').click(function(){
	$.post("<?php echo url('login/loginapi'); ?>",{username:$('#username').val(),password:$('#password').val()},function(data){
		if(data.status==1){
			layer.msg(data.msg,function(){
				location.href="<?php echo url('index/index'); ?>"
			})
		}else{
			layer.msg(data.msg)
		}
	})
})
</script>
</body>
</html>