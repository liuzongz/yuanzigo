<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:90:"/home/wwwroot/www.yuanzigo.com/public/../application/shop1801/view/orders/orderdetail.html";i:1517976525;s:78:"/home/wwwroot/www.yuanzigo.com/public/../application/shop1801/view/nohead.html";i:1517976524;s:87:"/home/wwwroot/www.yuanzigo.com/public/../application/shop1801/view/public/noheader.html";i:1517976526;s:85:"/home/wwwroot/www.yuanzigo.com/public/../application/shop1801/view/public/footer.html";i:1517976525;}*/ ?>
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
			<div class="col-lg-6">
				<img src="<?php echo $info['userinfo']['member']['headimgurl']; ?>" class="img-circle img-sm mar-rgt"/>
				<?php echo $info['userinfo']['member']['nickname']; ?>
			</div>
			<div class="col-lg-6 text-right">
				<span class="pad-hor pad-ver">下单时间：<?php echo $info['create_time']; ?></span>
				<span class="pad-hor">状态：<span class="text-danger text-2x text-bold"><?php echo $info['statustxt']; ?></span></span>
			</div>
		</div>
		
		<div class="bord-all pad-all mar-ver">
			<h4>购物清单</h4>
			<div class="row">
			<div class="col-lg-4"><?php echo $info['activity']['title']; ?></div>
			<div class="col-lg-4">
				<?php if(is_array($info['mylist']) || $info['mylist'] instanceof \think\Collection || $info['mylist'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['mylist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?>
					<?php echo $s['format']['name']; ?> <span class="pad-ver">x</span> <?php echo $s['num']; ?><br>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			</div>
		</div>
		
		<div class="well well-sm row">
			<h4>联系方式</h4>
			<div class="col-lg-6  mar-top">
				<p>联系人：<?php echo $info['contact']; ?></p>
				<p>联系电话：<?php echo $info['tel']; ?></p>
				<p>联系邮箱：<?php echo $info['email']; ?></p>
			</div>
		</div>
		
		<div class="bord-all pad-all mar-ver">
			<h4>游客信息</h4>
			<div class="row">
				<?php if(is_array($info['mytraveler']) || $info['mytraveler'] instanceof \think\Collection || $info['mytraveler'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['mytraveler'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
				<div class="col-lg-3 col-md-4 col-xs-12 bord-rgt">
				<p>姓名：<?php echo $v['name']; ?></p>
				<p>电话：<?php echo $v['tel']; ?></p>
				<p>身份证：<?php echo $v['idcard']; ?></p>
				</div>
				<?php endforeach; endif; else: echo "" ;endif; ?>
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