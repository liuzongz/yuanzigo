<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/home/wwwroot/www.yuanzigo.com/public/../application/mobile/view/shop/index.html";i:1524644335;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title><?php echo (isset($page_title) && ($page_title !== '')?$page_title:'管理我的店铺'); ?></title>
    <link href="__CSS__/bootstrap.css" rel="stylesheet">
    <link href="__CSS__/nifty.css" rel="stylesheet">
    <link href="__PLUGINS__/ionicons/css/ionicons.min.css" rel="stylesheet">    
    <script src="__JS__/jquery-2.2.4.min.js"></script>
    <script src="__JS__/bootstrap.min.js"></script>
    <script src="__JS__/nifty.js"></script>
    <script src="__PLUS__/Layer/layer.js"></script>
    <script src="__PLUS__/template.js"></script>
    <script src="__JS__/common.js"></script>
    <script src="__JS__/html2canvas.min.js"></script>
    <link href="__PLUGINS__/animate-css/animate.min.css" rel="stylesheet">
    
    
    <style>
    	html,body{height: 100%;width: 100%;}
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
		.pad-1x{
			padding:0.5em;
		}
		.ids .mar-rgt{margin-right: 10px;}
		.ids .mar-rgt:first:child{margin-right: 0;}
		.cen{width: 100%;height: 100%;position: absolute;top: 0;left: 0;display: none;z-index:-99;}
		.cen1{width: 100%;height: 100%;background: rgba(0,0,0,1);position: fixed;top: 0;left: 0;display: none;z-index:9;}
		.guan{padding: 6px 6px;background: #666;color:#fff;position: absolute;top: 10px;right: 10px;z-index: 99999;}
		.tu{width:250px;height: 445px;margin: 20px auto;position: relative;}
		.bg{width: 100%;height:250px;position: absolute;top: 0;left: 0;}
		.pro{width: 100%;position:absolute;top: 155px;left: 0px;}
		.price{margin: 10px 0 0 25px;font-weight: bolder;color: #fff;}
		.ti{width: 90%;margin-top: 50px;font-size: 1.4em;color: #000;font-weight: bolder;margin-left: 10px;}
		.dc{width: 90%;margin-top: 5px;font-size: 1em;line-height:20px;color: #000; bolder;margin-left: 10px;}
	</style>
</head>
<body>
<div class="bg-light text-center text-dark text-lg pad-hor">
	<p class="pad-ver  bord-btm">	
	<a href="<?php echo url('shop/setting'); ?>" class="pull-right" style="font-size:0.5em;color:red;animation:flash 2s infinite linear;animation-play-state: running;display:none"><i class="ion-flag pad-1x"></i><br>新手必看</a>
	<span class="text-bold">总营收</span>
	<br>
	<span class="text-muted text-xs"><?php echo $create_time; ?> 开店至今</span>	
	</p>
	
	<div class="row pad-ver" id="profit-box">
		<div class="col-xs-3" data-page="profit.html?type=1">
			<p>销售额</p><span id="allprice"><?php echo $shopdata['price']; ?></span>
		</div>
		<div class="col-xs-3 bord-rgt" data-page="profit.html?type=2">
			<p>利润</p><span id="profit"><?php echo $shopdata['profit']; ?></span>
		</div>
		<div class="col-xs-3"  data-page="cost.html?type=1">
			<p>未提现</p><span id="waitclear">0</span>
		</div>
		<div class="col-xs-3"  data-page="cost.html?type=2">
			<p>已提现</p><span id="overclear">0</span>
		</div>
	</div>
</div>

<div class="bg-light text-center  mar-top text-lg row" id="status-box">
	<div class="col-xs-6 bord-rgt ontab pad-all" data-status="1">售卖中</div>
	<div class="col-xs-6 pad-all" data-status="0">已结束</div>
</div>

<div id="list-box">
<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
<div id="list_<?php echo $v['id']; ?>">
<div class="bg-light pad-all row mar-top bord-btm">
	<div class="col-xs-3">
		<img class="img-md jiao" src="<?php echo $v['headimgss']; ?>">
	</div>

	<div class="col-xs-9">
		<p class="text-bold text-lg text-dark title"><a href="#" data-page="detailtoc.html?id={{v.id}}">【<?php echo $v['destination']; ?>】<?php echo $v['title']; ?></a></p>
		<div class="row">
			<div class="col-xs-6">
				<p>销售额<span class="text-danger">￥<?php echo $v['allPrice']; ?></span></p>	
				<p>利润<span class="text-danger">￥<?php echo $v['profit']; ?></span></p>			
				
			</div>
			<div class="col-xs-6">
				<p>单价￥<?php echo $v['format']['price']; ?></p>
				<p>销量<?php echo getActivitySales($v['id']); ?></p>
			</div>
		</div>
	</div>
</div>
<div class="cen">
	<div class="tu">
		<img src="<?php echo $v['headimgs']; ?>" crossorigin="*" width="100%" class="bg">
		<img src="__IMG__/pic.png" width="100%" style="position: absolute;">
		<div class="pro">
			<div class="price"><?php echo $v['format']['price']; ?></div>
			<div class="ti"><?php echo $v['title']; ?></div>
			<div class="dc"><?php echo $v['subtitle']; ?></div>
			<img src="<?php echo $v['code']; ?>" style="max-width:5em;margin: 50px 0 0 30px;">
		</div>
	</div>
</div>
<div class="bord-btm pad-all text-right bg-light act">
	<button class="btn btn-warning jiao mar-rgt hai" style="float: left;margin-right: 0;">生成海报</button>
	<a href="<?php echo url('mobile/shop/orderlist',['id'=>$v['id']]); ?>"><button class="btn btn-warning jiao mar-rgt">查看订单</button></a>
	<!-- <button class="btn btn-warning jiao mar-rgt">确认出行</button> -->
	<a href="<?php echo url('mobile/activity/detailtoc',['id'=>$v['id']]); ?>"><button class="btn btn-warning jiao">预览</button></a>
	<button class="btn btn-danger jiao mar-lft" onclick="stopSale(<?php echo $v['id']; ?>)">停售</button>
</div>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div id="pic"></div>
<div id="nolist-box" class="text-center" style="margin-top:3em;display:none">
	<i class="ion-clipboard" style="font-size:10em;"></i>
	<p class="text-lg">该分类下没有数据</p>
</div>

<div class="pad-all" style="height:15em;"></div>
<div class="footmenu row text-center bg-gray-light">
	<a href="<?php echo url('mobile/activity/index'); ?>">
		<span class="col-xs-4">
			<i class="ion-grid icon-2x"></i><br>
			发现
		</span>
	</a>
	<a href="<?php echo url('mobile/shop/index'); ?>">
		<span class="col-xs-4 on">
			<i class="ion-compose icon-2x"></i><br>
			管理小店
		</span>
	</a>
	<a href="<?php echo url('mobile/index/ask'); ?>">
		<span class="col-xs-4">
			<i class="ion-chatbubble-working icon-2x"></i><br>
			有疑问找我
		</span>
	</a>
</div>
<script id="list-temp" type="html/text">
{{each msg as v}}
<div id="list_{{v.id}}">
<div class="bg-light pad-all row mar-top bord-btm" >
	<div class="col-xs-3">
		<img class="img-md jiao" src="{{v.headimgs}}">
	</div>

	<div class="col-xs-9">
		<p class="text-bold text-lg text-dark title"><a href="#" data-page="detailtoc.html?id={{v.id}}">【{{v.destination}}】{{v.title}}</a></p>
		<div class="row">
			<div class="col-xs-6">
				<p>销售额<span class="text-danger">￥{{v.allPrice}}</span></p>	
				<p>利润<span class="text-danger">￥{{v.profit}}</span></p>			
				
			</div>
			<div class="col-xs-6">
				<p>单价￥{{v.format.price}}</p>
				<p>销量{{v.allsalenum}}</p>
			</div>
		</div>
	</div>
</div>

<div class="bord-btm pad-all text-right bg-light act">
	<a href="<?php echo url('shop/orderlist'); ?>?id={{v.id}}"><button class="btn btn-warning jiao mar-rgt">查看订单</button></a>
	<!--<button class="btn btn-warning jiao mar-rgt">确认出行</button>-->
	<a href="<?php echo url('mobile/activity/detailtoc'); ?>?id={{v.id}}"><button class="btn btn-warning jiao">预览</button></a>
	{{ if v.status==0}}
	<button class="btn btn-success jiao mar-lft" onclick="setSale({{v.id}})">恢复售卖</button>
	{{ else}}
	<button class="btn btn-danger jiao mar-lft" onclick="stopSale({{v.id}})">停售</button>
	{{ /if}}
</div>
<div>
{{/each}}
</script>

<script>
function stopSale(id){
	layer.confirm('您确定要停售这个活动吗？<br>停售后，之前分享出去的链接也将无法继续购买', {
		  btn: ['停售','不停售'] //按钮
		}, function(){
			var url="<?php echo url('shop/stopSale'); ?>"
			$.post(url,{id:id},function(data){
				if(data.status==1){
					$('#list_'+id).remove();
					layer.closeAll()
				}else{
					layer.alert(data.msg,function(){
						layer.closeAll()
					})
				}
			})

		}, function(){
		  layer.closeAll()
		});
}

function setSale(id){
	layer.confirm('您确定要恢复售卖这个活动吗？', {
		  btn: ['恢复','不恢复'] //按钮
		}, function(){
			var url="<?php echo url('shop/setSale'); ?>"
			$.post(url,{id:id},function(data){
				if(data.status==1){
					$('#list_'+id).remove();
					layer.closeAll()
				}else{
					layer.alert(data.msg,function(){
						layer.closeAll()
					})
				}
			})

		}, function(){
		  layer.closeAll()
		});
}

$('#status-box div').click(function(){
	var status=$(this).attr('data-status')
	var that=$(this)
	var tabname=that.find('p').text()
	$('#status-box div').removeClass('ontab')
	$(this).addClass('ontab')
	$('#tabname').text(tabname)
	var list_url="<?php echo url('shop/myActivityApi'); ?>"
	$.get(list_url,{status:status},function(data){
		console.log(data)
		if(data.status==1){
			$('#nolist-box').hide();
			var html=template('list-temp',data)
			$('#list-box').empty().append(html)
			$('#list-box').show();
		}else{			
			$('#nolist-box').show();
			$('#list-box').hide();
		}
	})
	
})
$(function(){

	$('.hai').click(function(){
		$(this).parent().prev().show();
		var index = $(".hai").index(this);
		var opts = {useCORS: true};
		html2canvas(document.getElementsByClassName('tu')[index],opts).then(function(canvas) {
		    // document.getElementById('pic').appendChild(canvas);
		    var image = canvas.toDataURL("image/png"); 
		    var html = '<div class="cen1"><div class="guan" onclick="guan()">关闭</div><div class="tu"><img src='+image+' width="100%" class="img-responsive"/></div><p style="color:#fff;text-align:center;">可长按图片选择保存或转发</p</div>'; 

        	$('#pic').html(html); 
   //      	layer.open({
			// 	type: 1,
			// 	skin: '', 
			// 	area: ['100%', '100%'],
			// 	shadeClose: true,
			// 	content: html
			// });
        	$('.cen1').show();
        	document.body.parentNode.style.overflowY = 'hidden';
		});
	})
})
function guan(){
	$('.cen1').remove(); 
	$('.cen').hide();
	layer.closeAll()
	document.body.parentNode.style.overflowY = 'auto';
}
</script>
<script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script>
$(function(){
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
</script>
</body>
</html>