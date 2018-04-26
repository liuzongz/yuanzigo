<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"/home/wwwroot/www.yuanzigo.com/public/../application/mobile/view/shop/orderlist.html";i:1524460679;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title><?php echo (isset($page_title) && ($page_title !== '')?$page_title:'活动订单列表'); ?></title>
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
	</style>
</head>
<body>
<div class="bg-light pad-all row bord-btm" id="activity-box">--
	<div class="col-xs-3">
		<img class="img-md jiao" src="<?php echo $info['headimg']['0']; ?>">
	</div>
	<div class="col-xs-9">
		<p class="text-bold text-lg text-dark">【<?php echo $info['destination']; ?>】<?php echo $info['title']; ?></p>
		<div class="row">
			<div class="col-xs-6">
				<p>销售额<span class="text-danger text-lg">￥<?php echo getActivityTotalSalePrice($info['id']); ?></span></p>
				<p>利润<span class="text-danger text-lg">￥<?php echo getActivityTotalProfit($info['id']); ?></span></p>
			</div>
			<div class="col-xs-6">
				<p>单价<span class="text-danger text-lg">￥<?php echo getActivityFormatLowerPrice($info['id']); ?></span>元起</p>				
				<p>销量<span class="text-danger text-lg"> <?php echo getActivityTotalSaleNum($info['id']); ?></span></p>
			</div>
		</div>
	</div>
</div>

<div class="bg-light text-center text-dark text-lg pad-hor mar-top">
	<div class="row pad-ver" id="status-box">
		<div class="col-xs-3 " data-status='9'>
			<p>待支付</p><span id="wait-pay"><?php echo $count['s9']; ?></span>
		</div>
		<div class="col-xs-3 ontab" data-status='1'>
			<p>已支付</p><span id="already-pay"><?php echo $count['s1']; ?></span>
		</div>
		<div class="col-xs-3" data-status='2'>
			<p>已核销</p><span id="wait-clean"><?php echo $count['s2']; ?></span>
		</div>
		<div class="col-xs-3" data-status='3'>
			<p>已出行</p><span id="already-go"><?php echo $count['s3']; ?></span>
		</div>
	</div>
</div>

<div class="mar-top " id="list-box">

<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
<div class="row pad-all bg-light bord-btm">
	<div class="col-xs-6 pad-btm bord-btm mar-btm">订单编号：<?php echo $v['order_code']; ?></div>
	<div class="col-xs-6 text-right pad-btm bord-btm mar-btm"><?php echo $v['update_time']; ?></div>
	<div class="col-xs-2  text-center bord-rgt">
		<img class="img-sm img-circle" src="<?php echo $v['member']['headimgurl']; ?>">
		<br><?php echo $v['member']['nickname']; ?>
	</div>	
	<div class="col-xs-8 pad-lft">
		<p>团期：<?php echo $v['period']['name']; ?></p>
		<p>规格：<?php echo $v['format']['name']; ?> * <?php echo $v['total_num']; ?>份</p>
		<p>联系人：<?php echo $v['contact']; ?><a href="tel:<?php echo $v['tel']; ?>" style="padding-left:2em"><span class="text-primary"><?php echo $v['tel']; ?></span></a></p>
	</div>
	<div class="col-xs-2 text-danger text-center text-bold text-lg bord-lft">
		<p class="pad-top" ></p>
		<p style="padding-bottom:2em"><?php if($v['status'] == '9'): ?> <span class="text-muted"><?php echo $v['total_price']; ?></span>  <?php else: ?><?php echo $v['pay_price']; endif; ?></p>		
	</div>
</div>
<?php endforeach; endif; else: echo "" ;endif; if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
<div class="text-center" style="margin-top:3em;">
	<i class="ion-clipboard" style="font-size:10em;"></i>
	<p class="text-lg"><span id="tabname" class="text-warning text-bold hide">待支付</span> 该分类下没有订单</p>
</div>
<?php endif; ?>
</div>

<div id="nolist" class="text-center" style="margin-top:3em;display:none">
	<i class="ion-clipboard" style="font-size:10em;"></i>
	<p class="text-lg"><span id="tabname" class="text-warning text-bold hide">待支付</span> 该分类下没有订单</p>
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
{{each msg as v i}}
	<div class="row pad-all bg-light bord-btm">
	<div class="col-xs-6 pad-btm bord-btm mar-btm">订单编号：{{v.order_code}}</div>
	<div class="col-xs-6 text-right pad-btm bord-btm mar-btm">{{v.update_time}}</div>
	<div class="col-xs-2  text-center bord-rgt">
		<img class="img-sm img-circle" src="{{v.member.headimgurl}}">
		<br>{{v.member.nickname}}
	</div>	
	<div class="col-xs-8 pad-lft">
		<p>团期：{{v.period.name}}</p>
		<p>规格：{{v.format.name}} * {{v.total_num}}份</p>
		<p>联系人：{{v.contact}}<a href="tel:{{v.tel}}" style="padding-left:2em"><span class="text-primary">{{v.tel}}</span></a></p>
	</div>
	<div class="col-xs-2 text-danger text-center text-bold text-lg bord-lft">
		<p class="pad-top" ></p>
		<p style="padding-bottom:2em">
		{{ if v.status==9}}
		<span class="text-muted">{{v.total_price}}</span>
		{{ else}}
		{{v.pay_price}}
		{{ /if}}
		</p>		
	</div>
</div>
{{/each}}
</script>


<script>
$('#status-box div').click(function(){
	var status=$(this).attr('data-status')
	var that=$(this)
	var tabname=that.find('p').text()
	$('#status-box div').removeClass('ontab')
	$(this).addClass('ontab')
	$('#tabname').text(tabname)
	var list_url="<?php echo url('shop/orderlistApi'); ?>"
	var id="<?php echo $info['id']; ?>"
	$.get(list_url,{id:id,status:status},function(data){
		console.log(data)
		if(data.status==1){
			$('#nolist').hide();
			var html=template('list-temp',data)
			$('#list-box').empty().append(html)
			$('#list-box').show();
		}else{
			
			$('#nolist').show();
			$('#list-box').hide();
		}
	})
	
})
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