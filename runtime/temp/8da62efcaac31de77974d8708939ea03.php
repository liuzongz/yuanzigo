<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"/home/wwwroot/www.yuanzigo.com/public/../application/mobile/view/activity/index.html";i:1524648966;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="full-screen" content="yes">
	<meta name="x5-fullscreen" content="true">
    <title><?php echo (isset($page_title) && ($page_title !== '')?$page_title:'发现优质资源'); ?></title>
    <link href="__CSS__/bootstrap.css" rel="stylesheet">
    <link href="__CSS__/nifty.css" rel="stylesheet">
    <link href="__PLUGINS__/ionicons/css/ionicons.min.css" rel="stylesheet">    
    <script src="__JS__/jquery-2.2.4.min.js"></script>
    <script src="__JS__/bootstrap.min.js"></script>
    <script src="__JS__/nifty.js"></script>
    <script src="__PLUS__/Layer/layer.js"></script>
    <script src="__PLUS__/template.js"></script>
    <script type="text/javascript" src="__PLUS__/flexible/flexible.js"></script>
	<script type="text/javascript" src="__PLUS__/flexible/iscroll.js"></script>
	<script type="text/javascript" src="__PLUS__/flexible/navbarscroll.js"></script>
    <script src="__JS__/common.js?t=<?php echo $nowtime; ?>"></script>
    <script src="__PLUS__/mescroll/mescroll.min.js"></script>
	<link href="__PLUS__/mescroll/mescroll.min.css" rel="stylesheet"> 
		<style type="text/css">
			* {
				margin: 0;
				padding: 0;
				-webkit-touch-callout:none;
				-webkit-user-select:auto;
				-webkit-tap-highlight-color:transparent;
			}
			body{background-color: white}
			ul{list-style-type: none}
			
			.jiao{
				border-radius:5px;
			}
			.input-search{
				border-radius:15px;
				margin:0 0.5em;
				width:95%;
				background-color:#f8f9fa;
			}
			
			input[type='text']{
			    text-align:center;
			}
			
			input[type='text']:focus{
			    text-align:left;
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
			
			.title{}
			
			.price span{
				color:#e2175b;
				font-size:1em;
				font-weight:600;
			}
			
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
			/*模拟的标题*/
			.header{
				z-index: 9990;
				position: fixed;
				top: 0;
				left: 0;
				width: 100%;
				height: 44px;
				line-height: 44px;
				text-align: center;
				border-bottom: 1px solid #eee;
				background-color: white;
			}
			/*菜单*/
			.nav{
				text-align: center;
				border-bottom: 1px solid #ddd;
				background-color: white;
				overflow-x:scroll;
				white-space: nowrap;


			}
			.nav p{
				display: inline-block;
				/* width: 30%; */
				padding: 1em;
            	
			}
			.nav .active{
				border-bottom: 1px solid #FF6990;
				color: #FF6990;
			}
			/*ios使用sticky样式实现*/
			.nav-sticky{
				z-index: 9999;
				position: -webkit-sticky;
				position: sticky;
			    top: 0;
			}
			/*android和pc端悬停*/
			.nav-fixed{
				z-index: 9999;
				position: fixed;
				top: 44px;
				left: 0;
				width: 100%;
			}
			/*列表*/
			.mescroll{
				position: fixed;
				top: 44px;
				bottom: 0;
				width: 100%;
				height: auto;
			}
			/*展示上拉加载的数据列表*/
			.data-list li{
				position: relative;
				padding: 10px 8px 10px 120px;
				border-bottom: 1px solid #eee;
			}
			.data-list .pd-img{
				position: absolute;
				left: 18px;
				top: 18px;
				width: 80px;
				height: 80px;
			}
			.data-list .pd-name{
				font-size: 16px;
				line-height: 20px;
				height: 40px;
				overflow: hidden;
			}
			.data-list .pd-price{
				margin-top: 8px;
				color: red;
			}
			.data-list .pd-sold{
				font-size: 12px;
				margin-top: 8px;
				color: gray;
			}
		</style>
	</head>

	<body>
		<!--标题-->
		<div class="header row">
			<span class="col-xs-10 bord-btm">
				<input type="text" placeholder="搜索" class=" form-control bord-no input-lg " id="searchkeyword">
			</span>	
			<span id="searchbtn" class="col-xs-2 text-center " style="padding-top:0.5em;padding-right:0.5em">
				<i class="ion-search icon-2x"></i>
			</span>
		</div>
		<!--滑动区域-->
		<div id="mescroll" class="mescroll">
			<div id="navWarp">
				<div id="navContent" class="nav">
					<p class="active" i="0">全部</p>
					<?php if(is_array($tags) || $tags instanceof \think\Collection || $tags instanceof \think\Paginator): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
					<p i="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></p>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
			<div id="upscrollWarp">
				<div id="dataList" class="data-list bg-gray"></div>
			</div>
		</div>
		
		<div class="pad-all" style="height:15em;"></div>
<div class="footmenu row text-center bg-gray-light">
	<a href="<?php echo url('mobile/activity/index'); ?>">
		<span class="col-xs-4 on">
			<i class="ion-grid icon-2x"></i><br>
			发现
		</span>
	</a>
	<a href="<?php echo url('mobile/shop/index'); ?>">
		<span class="col-xs-4">
			<i class="ion-compose icon-2x"></i><br>
			管理小店
		</span>
	</a>
	<a href="<?php echo url('mobile/index/ask'); ?>" data-page="ask">
		<span class="col-xs-4">
			<i class="ion-chatbubble-working icon-2x"></i><br>
			有疑问找我
		</span>
	</a>
</div>
	
	
	<script type="text/javascript" charset="utf-8">
		$(function(){
			var mescroll = new MeScroll("mescroll", {
				up: {
					callback: getListData,
					isBounce: false,
					clearEmptyId: "dataList",
					warpId: "upscrollWarp",
					showNoMore:nodates
				},
				down: {
					isLock:true
	            },
			});
			
			
			var navWarp=document.getElementById("navWarp");
			if(mescroll.os.ios){
				navWarp.classList.add("nav-sticky");
			}else{
				navWarp.style.height=navWarp.offsetHeight+"px";//固定高度占位,避免悬浮时列表抖动
				var navContent=document.getElementById("navContent");
				mescroll.optUp.onScroll=function(mescroll, y, isUp){
					console.log("up --> onScroll 列表当前滚动的距离 y = " + y + ", 是否向上滑动 isUp = " + isUp);
					if(y>=navWarp.offsetTop){
						navContent.classList.add("nav-fixed");
					}else{
						navContent.classList.remove("nav-fixed");
					}
				}
			}
			
			/*初始化菜单*/
			var pdType=0;
			$(".nav p").click(function(){
				var i=$(this).attr("i");
				if(pdType!=i) {
					pdType=i;
					$(".nav p").each(function(i,dom){
						if(dom.getAttribute("i")==pdType){
							dom.classList.add("active");
						}else{
							dom.classList.remove("active");
						}
					})
					var minHight = mescroll.getClientHeight() - navWarp.offsetHeight;
					document.getElementById("upscrollWarp").style.minHeight = minHight+"px";
					mescroll.resetUpScroll();
				}
			})
			
			function getListData(page){
				url= "<?php echo url('mobile/activity/getActivityListApi'); ?>"
				keyword=$('#searchkeyword').val()
				$.get(url,{page:page.num,tagsid:pdType,keyword:keyword},function(data){
					console.log(data)
					if(data.status==1){
						var html=template('item-temp',data)
						$('#dataList').append(html)
						mescroll.endBySize(data.per_page, data.total);
					}
				})
			}
			
			$('#searchbtn').click(function(){
				keyword=$('#searchkeyword').val()
				url= "<?php echo url('mobile/activity/getActivityListApi'); ?>"
				$.get(url,{keyword:keyword},function(data){
					if(data.status==1){
						var html=template('item-temp',data)
						$('#dataList').html(html)
					}
				})
			})
		})
		
		function nodates(){
			layer.msg('没有更多了')
		}
	</script>
<script id="item-temp" type="html/text">
{{each msg.data as v}}
<a href="<?php echo url('activity/detail'); ?>?id={{v.id}}" class="mar-btm">
	<div class="bg-light">
		<div class="row title bord-btm">
			<div class="pad-all" style="float:left">{{v.shopname}}</div>
			<div class="pad-all" style="float:right">活动日期：{{v.execution_time}}	</div>
		</div>
		<div class="row">
			<div class="col-xs-2 pad-all text-center" style="position:relative">
				{{ if v.hot==1}}<span style="position:absolute; left:0; top:0;"><img src="__IMG__/hot.png" style="width:4em;" /></span>{{ /if}}
				<img class="img-md jiao" src="{{v.headimgs}}">
				{{ if v.ck==1}}<br><br><span class="text-success">已添加</span>{{ /if}}	
			</div>
			<div class="col-xs-10 pad-ver " style="position:relative">
				
				<p class="text-bold">【{{v.destination}}】{{v.title}}</p>
				<div class="tags-mini">
					{{each v.tags as t}}
					<span>{{t}}</span>
					{{/each}}
				</div>
				<div class="row price pad-top">
					<div class="col-xs-7">建议零售价<span>￥{{v.format.price}}</span></div>
					<div class="col-xs-5">利润<span>￥{{v.profit}}</span></div>
				</div>
			</div>
		</div>
	</div>
</a>
<p class="bg-gray" style="height:0.2em;width:100%;"></p>
{{/each}}
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