<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"/home/wwwroot/www.yuanzigo.com/public/../application/mobile/view/activity/detail.html";i:1524460677;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title><?php echo (isset($page_title) && ($page_title !== '')?$page_title:'资源详情'); ?></title>
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
	.on{
		color:#efb239;
		font-weight:600;
	}
	.text-1x{
		font-size:1.2em;		
	}
	.mar-1x{
		margin-top:0.5em;
	}
	.carousel-inner .item{
		padding-top:0px;
	}
	.tags-mini span{
		padding: 0.15em 1em;
    	margin: 0.1em;
		border-radius:5px;
		border-color: #efb239 !important;
		vertical-align: middle;
		text-align: center;
		white-space: nowrap;
		border: 1px solid transparent;
		color:#efb239;
		display: inline-block;		
	}
	.price span{
		color:#e2175b;
		font-size:1.5em;
		font-weight:600;
		margin-left:0.5em;
		margin-right:0.5em;
	}
	.on{
		color:#efb239;
		font-weight:600;
		border-bottom: 3px solid #efb239;
	}
	#introbox img, #noticebox img, #featuresbox img{
		max-width:100%;
	}
	</style>
</head>
<body>

<div class="bg-light row pad-ver">
	<div class="col-xs-3">
		<img class="img-md img-circle" src="<?php echo $shop['headimg']; ?>" alt="Sample Image">
	</div>
	<div class="col-xs-7">
		<p class="text-bold text-1x mar-1x"><?php echo $shop['shopname']; ?></p>
		<p>原子出发官方认证</p>
	</div>
	<div class="col-xs-2">
		<div class="mar-1x">
			<a href="tel:<?php echo $shop['tel']; ?>"><i class="ion-social-whatsapp icon-3x text-warning"></i></a>
		</div>		
	</div>
</div>


<div id="titu" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators in">
		<?php if(is_array($info['headimg']) || $info['headimg'] instanceof \think\Collection || $info['headimg'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['headimg'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
		<li class="<?php if($i==1): ?>active<?php endif; ?>" data-slide-to="<?php echo $i; ?>" data-target="#titu"></li>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</ol>
	<div class="carousel-inner text-center">
		<?php if(is_array($info['headimg']) || $info['headimg'] instanceof \think\Collection || $info['headimg'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['headimg'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
		<div class="item <?php if($i==1): ?>active<?php endif; ?>">
			<img src="<?php echo $v; ?>?x-oss-process=style/16-9"/>
		</div>	
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
</div>

<div class="bg-light mar-btm pad-btm">
	<p class="text-bold text-1x text-dark pad-hor pad-top">【<?php echo $info['destination']; ?>】<?php echo $info['title']; ?></p>
	<div class="tags-mini pad-hor">
		<?php if(is_array($tags) || $tags instanceof \think\Collection || $tags instanceof \think\Paginator): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
			<span><?php echo $v; ?></span>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<div class="bg-light mar-all pad-hor">	
		<p class="text-lg text-bold">规格</p>
		<?php if(is_array($format) || $format instanceof \think\Collection || $format instanceof \think\Paginator): $k = 0; $__LIST__ = $format;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
		<p class="mar-1x" data-price="<?php echo $v['price']; ?>" data-format="<?php echo $v['id']; ?>"><?php echo $v['name']; ?>(￥<?php echo $v['price']; ?>)</p>
		<?php endforeach; endif; else: echo "" ;endif; ?>
		<p class="text-lg text-bold pad-top">团期</p>
		<?php if(is_array($info['period']) || $info['period'] instanceof \think\Collection || $info['period'] instanceof \think\Paginator): $k = 0; $__LIST__ = $info['period'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
		<p class="mar-1x" data-period="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></p>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	
</div>

<div class="bg-light row text-center text-bold">
	<div class="col-xs-6 pad-top">
		<p class="text-1x">
			每单利润<br>
			<span class="text-danger">￥<?php echo $format['0']['price']-$format['0']['cost']; ?></span>
		</p>		
	</div>
<!-- 	<div class="col-xs-4 pad-top">
		<p class="text-1x">
			库存<br>
			<span></span>
		</p>
	</div> -->
	<div class="col-xs-6 pad-top">
		<p class="text-1x">
			销量<br>
			<span><?php echo $info['sale_num']; ?></span>
		</p>
	</div>
</div>

<div class="bg-light text-center text-bold mar-top">
	<div class="pad-all bord-hor on">活动详情</div>
</div>
<div id="introbox">
	<?php if(is_array($info['intro']) || $info['intro'] instanceof \think\Collection || $info['intro'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['intro'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
	<img src="<?php echo $v; ?>"/>
	<?php endforeach; endif; else: echo "" ;endif; ?>
</div>


<div class="pad-all" style="height:15em;"></div>
<?php if($info['status'] == '0'): ?>
<div class="footmenu text-center bg-gray-light">
	<button class="btn btn-lg btn-block btn-default pad-ver" disabled>该活动已经停售</button>
</div>
<?php else: ?>
<div class="footmenu text-center bg-gray-light" style="box-shadow: 1px 1px 3px 3px #888888;">
	<a href="<?php echo url('activity/preview',['id'=>$info['id']]); ?>"><button class="btn btn-lg btn-block btn-warning pad-ver"><span class="text-lg">一键变成</span><br>我的专属产品</button></a>
</div>
<?php endif; ?>
<script>

</script>
</body>
</html>