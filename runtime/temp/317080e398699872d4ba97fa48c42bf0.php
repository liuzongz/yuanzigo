<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/home/wwwroot/www.yuanzigo.com/public/../application/mobile/view/toc/detail.html";i:1524460679;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title><?php echo (isset($page_title) && ($page_title !== '')?$page_title:'活动详情'); ?></title>
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
	#zhezhao{
		-webkit-user-select: none;
		display: none;
		position: fixed;
		width: 100%;
		height: 100%;  
		background: rgba(255,255,255,1);
		/* text-align: center; */
		top: 0;
		left: 0;
		z-index: 800;  
	}
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
	.period,.format,.jiao{
	border-radius:5px;
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
	.headbox{
		background:url("__IMG__/huangbg.jpg")
	}
	.nickname{	 
		width:7em;
	  overflow:hidden;
	  text-overflow:ellipsis;
	  -o-text-overflow:ellipsis;
	  -webkit-text-overflow:ellipsis;
	  -moz-text-overflow:ellipsis;
	  white-space:nowrap;
	}
.nicknames{	 
		width:7em;
	  overflow:hidden;
		display:none;
	  text-overflow:ellipsis;
	  -o-text-overflow:ellipsis;
	  -webkit-text-overflow:ellipsis;
	  -moz-text-overflow:ellipsis;
	  white-space:nowrap;
	}
	</style>
</head>
<body>
<div class="bg-light row pad-ver">
	<div class="col-xs-3">
		<img class="img-md img-circle" src="<?php echo $shop['headimg']; ?>">
	</div>
	<div class="col-xs-7">
		<p class="text-bold text-1x mar-1x"><?php echo $shop['shopname']; ?></p>
		<p class="text-warning">★★★★★</p>
	</div>
	<div class="col-xs-2">
		<div class="mar-1x">
			<a href="tel:<?php echo $shop['tel']; ?>">
				<i class="ion-social-whatsapp icon-3x text-warning"></i>
			</a>
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
	<p class="text-bold text-1x text-dark pad-hor pad-top">【<?php echo $shop['shopname']; ?>专享 | <?php echo $info['destination']; ?>】<?php echo $info['title']; ?></p>
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

<?php if(!(empty($buyer) || (($buyer instanceof \think\Collection || $buyer instanceof \think\Paginator ) && $buyer->isEmpty()))): ?>
<div class="bg-light pad-btm">
	<p class="pad-all text-warning text-lg">已购买的人(<?php echo (isset($buynum) && ($buynum !== '')?$buynum:"0"); ?>人)</p>
	<div class="pad-hor row">
	<?php if(is_array($buyer) || $buyer instanceof \think\Collection || $buyer instanceof \think\Paginator): $k = 0; $__LIST__ = $buyer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
		<div class="text-center col-xs-2 <?php if($k > '4'): ?>nicknames<?php else: ?>nickname<?php endif; ?>">
		<img class="img-sm img-circle" src="<?php echo $v['headimgurl']; ?>">
		<br><span class=""><?php echo $v['nickname']; ?></span>
		</div>
		<?php if($k == '4'): ?>
		<div class="text-center col-xs-2 pad-all" id="lookallbuyer">查看<br>所有<br>人</div>
		<?php endif; endforeach; endif; else: echo "" ;endif; ?>
	</div>
</div>
<?php endif; ?>
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
<div class="footmenu text-center bg-gray-light" id="btm-select">
	<a href="#" data-id="{info.id}"><button class="btn btn-lg btn-block btn-warning pad-ver">我要参加</button></a>
</div>
<?php endif; ?>
<div class="footmenu text-center bg-gray-light row" style="display:none" id="btm-buy">
	<div class="col-xs-6 pad-all text-lg">金额<span class="text-danger" id="btm-price">￥<?php echo $format[0]['price']; ?></span></div>
	<div class="col-xs-6 pad-all bg-warning text-lg" onclick="buy()">立即购买</div>	
</div>
<div id="zhezhao" class="pad-all" >
<p class="mar-hor text-lg text-bold">请选择规格</p>
<?php if(is_array($format) || $format instanceof \think\Collection || $format instanceof \think\Paginator): $k = 0; $__LIST__ = $format;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
<span class="btn btn-lg <?php if($k == '1'): ?>btn-success<?php else: ?>btn-default<?php endif; ?> mar-1x format" data-price="<?php echo $v['price']; ?>" data-format="<?php echo $v['id']; ?>"><?php echo $v['name']; ?>(￥<?php echo $v['price']; ?>)</span>
<?php endforeach; endif; else: echo "" ;endif; ?>
<p class="pad-all"></p>
<p class="mar-hor text-lg text-bold mar-top">请选择团期</p>
<?php if(is_array($info['period']) || $info['period'] instanceof \think\Collection || $info['period'] instanceof \think\Paginator): $k = 0; $__LIST__ = $info['period'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
<span class="btn btn-lg <?php if($k == '1'): ?>btn-success<?php else: ?>btn-default<?php endif; ?> period mar-1x" data-period="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></span>
<?php endforeach; endif; else: echo "" ;endif; ?>

<div class="bg-light pad-all bord-btm row mar-top">
	<div class="col-xs-3 text-lg pad-top text-dark">购买数量</div>
	<div class="col-xs-9 text-right">
		<span class="btn" onclick="minus()"><i class="ion-minus icon-2x"></i></span>
		<span class="btn btn-lg" id="buynum">1</span>
		<span class="btn" onclick="plus()"><i class="ion-plus icon-2x"></i></span>		
	</div>
</div>
</div>
<script>
$('#lookallbuyer').click(function(){
	$(this).hide();
	$('.nicknames').css('display','block');
})
function buy(){
	var format=$('.format.btn-success').attr('data-format')
	var period=$('.period.btn-success').attr('data-period')	
	var num=parseInt($('#buynum').text())

	var url="<?php echo url('toc/ckStock'); ?>"
	$.post(url,{format:format,period:period,num:num},function(data){
		if(data.status==1){
			location.href="<?php echo url('toc/fill'); ?>?id=<?php echo $info['id']; ?>&format="+format+"&period="+period+"&num="+num
		}else{
			layer.msg(data.msg)
		}
	})
}

$('#btm-select').click(function(){
	$(this).hide();
	$('#btm-select').hide();
	$('#btm-buy').show();
	$('#zhezhao').show();
});

$('span.period').click(function(){
	$('span.period').removeClass('btn-success').addClass('btn-default')
	$(this).removeClass('btn-default').addClass('btn-success')
})

$('span.format').click(function(){
	$('span.format').removeClass('btn-success').addClass('btn-default')
	$(this).removeClass('btn-default').addClass('btn-success')
	var price=parseFloat($(this).attr('data-price'))
	var buynum=parseInt($('#buynum').text())
	console.log(price)
	$('#btm-price').text('￥'+price*buynum)
})


function minus(){
	var price=parseFloat($('span.format.btn-success').attr('data-price'));
	if(!price){
		layer.msg('请先选择规格')
		return false;
	}
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
}

function plus(){
	var price=parseFloat($('span.format.btn-success').attr('data-price'));
	if(!price){
		layer.msg('请先选择规格')
		return false;
	}
	var buynum=parseInt($('#buynum').text())
	var newnum=buynum+1
	$('#buynum').text(newnum)
	$('#gong').text(newnum)
	$('#btm-price').text('￥'+price*newnum)
}

</script>
<script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script>
$(function(){
	var id='<?php echo $info['id']; ?>'
	var murl=window.location.href
	var js_url="<?php echo url('toc/jssignAndShare'); ?>"
	$.post(js_url,{fromurl:murl,id:id},function(data){
		options=data.data.msg;
		wx.config(options);
		wx.ready(function () {
			wx.onMenuShareTimeline({
			    title: data.data.share.title,
			    link: data.data.share.url,
			    imgUrl: data.data.share.logo,
			    success: function () {
				},
				cancel: function () {
				}
			})
			wx.onMenuShareAppMessage({
				title:data.data.share.title,
				desc:data.data.share.desc,
				link: data.data.share.url,
				imgUrl: data.data.share.logo,
				success: function () {
				},
				cancel: function () {
				}
			});			
		})
	})	
})
</script>
</body>
</html>