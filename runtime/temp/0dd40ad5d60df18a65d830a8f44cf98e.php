<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"/home/wwwroot/www.yuanzigo.com/public/../application/shop1801/view/activity/add.html";i:1518363109;s:78:"/home/wwwroot/www.yuanzigo.com/public/../application/shop1801/view/layout.html";i:1517976524;s:85:"/home/wwwroot/www.yuanzigo.com/public/../application/shop1801/view/public/header.html";i:1517976525;s:85:"/home/wwwroot/www.yuanzigo.com/public/../application/shop1801/view/public/footer.html";i:1517976525;}*/ ?>
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
			<span class="mar-hor"><?php echo $userinfo['name']; ?></span>
			<span class="btn btn-danger btn-xs"><?php echo $userinfo['ruletxt']; ?></span>
			<span class="mar-hor">|</span>
			<a class="text-primary" href="<?php echo url('index1801/index/logout'); ?>">退出</a>
		</div>
	</div>
	<?php endif; ?>
</div>
<style>
.listson p{
	padding-left:4em;
	padding-top:1em;
	padding-bottom:0.5em;
}
.first{
	padding-top:2em;
}
</style>
<div class="row bord-all" style="margin-top:3em;">
	<div class="col-lg-10 col-lg-offset-1">
		<div class="row" style="background-color:#fff">
			<div class="col-lg-2 bord-rgt  pad-no">
				<div class="list-group bord-no pad-no mar-top">
					<a class="list-group-item pad-no <?php if($menuinfo['controller'] == 'Index'): ?>bg-success<?php endif; ?>"  href="<?php echo url('index/index'); ?>">
						<div class="bord-btm pad-all">
							<i class="ion-home icon-2x mar-hor"></i>首页
						</div>
					</a>
					<?php if(is_array($leftMenu) || $leftMenu instanceof \think\Collection || $leftMenu instanceof \think\Paginator): $i = 0; $__LIST__ = $leftMenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
					<div class="list-group-item pad-no">
						<div class="bord-btm pad-all listson">
							<div class="mar-btm"><i class="<?php echo $v['icon']; ?> icon-2x mar-hor"></i><?php echo $v['name']; ?></div>
							<ul class="list-group">
								<?php if(is_array($v['son']) || $v['son'] instanceof \think\Collection || $v['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?>
									<a href="<?php echo url($s['url']); ?>" class="list-group-item <?php if($menuinfo['controller'] == $s['model']): if($menuinfo['action'] == $s['action']): ?> active<?php endif; endif; ?>" ><span class="mar-lft pad-lft">|--</span> <?php echo $s['name']; ?></a>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div>
					</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					
				</div>
			</div>
			<div class="col-lg-10 bord-lft">
				<div class="pad-all mar-all">
					
<script src="__PLUGINS__/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="__PLUGINS__/bootstrap-datepicker/locales/bootstrap-datepicker.zh-CN.min.js"></script>
<link href="__PLUGINS__/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
<script src="__PLUGINS__/summernote/summernote.min.js"></script>  
<script src="__PLUGINS__/summernote/lang/summernote-zh-CN.js"></script>  
<link href="__PLUGINS__/summernote/summernote.css" rel="stylesheet">
<script type="text/javascript" src="http://www.17sucai.com/preview/1/2017-02-25/jquery-dragarrange/drag-arrange.js"></script>

<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-control">
			<ul class="nav nav-tabs">
				<li class="active">
					<a data-toggle="tab" href="#base-box" aria-expanded="true">基本介绍</a>
				</li>
				<li class="">
					<a data-toggle="tab" href="#format-box" aria-expanded="false">规格票价</a>
				</li>
				<li>
					<a data-toggle="tab" href="#itinerary-box" aria-expanded="false">日程规划</a>					
				</li>
				<li>
					<a data-toggle="tab" href="#notice-box" aria-expanded="false">注意事项</a>					
				</li>
				<li>
					<a data-toggle="tab" href="#intro-box" aria-expanded="false">详细介绍</a>					
				</li>
			</ul>					
		</div>
		<h3 class="panel-title">活动发布</h3>
	</div>
	<div class="panel-body">
		<div class="tab-content">
			<div id="base-box" class="tab-pane fade active in">
				<div class="form-horizontal pad-top mar-top">
					<div class="form-group">
						<label class="col-sm-2 control-label">活动标题</label>
						<div class="col-sm-6">
							<input id="title" placeholder="活动标题" value="<?php echo (isset($info['title']) && ($info['title'] !== '')?$info['title']:''); ?>" type="text" class="form-control" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">活动副标题</label>
						<div class="col-sm-6">
							<input id="subtitle" placeholder="活动副标题" value="<?php echo (isset($info['subtitle']) && ($info['subtitle'] !== '')?$info['subtitle']:''); ?>" type="text" class="form-control" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">售价</label>
						<div class="col-sm-6">
							<input id="price" placeholder="主要用于购买页面底部，显示多少元起" value="<?php echo (isset($info['price']) && ($info['price'] !== '')?$info['price']:''); ?>" type="text" class="form-control" >
						</div>
						<div class="col-sm-4">主要用于显示“每客XXXX元起，中的XXXX”</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">标签</label>
						<div class="col-sm-6">
							<input id="tags" placeholder="比如:北海道" value="<?php echo (isset($info['tags']) && ($info['tags'] !== '')?$info['tags']:''); ?>" type="text" class="form-control" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">发出地</label>
						<div class="col-sm-6">
							<input id="fromcity" placeholder="比如:上海" value="<?php echo (isset($info['fromcity']) && ($info['fromcity'] !== '')?$info['fromcity']:''); ?>" type="text" class="form-control" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">视频链接</label>
						<div class="col-sm-6">
							<input id="video" placeholder="视频链接" value="<?php echo (isset($info['video']) && ($info['video'] !== '')?$info['video']:''); ?>" type="text" class="form-control" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">视频占位符</label>
						<?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): ?>
						<div class="col-sm-2" id="videoimgdiv">
							<img src="<?php echo $info['videoimg']; ?>" class="img-responsive" style="max-width:100px"/>						
						</div>
						<?php else: ?> 
						<div class="col-sm-2" id="videoimgdiv" style="display:none">						
						</div>
						<?php endif; ?>
						<div class="col-sm-2">
							<input id="videoimg" value="<?php echo (isset($info['videoimg']) && ($info['videoimg'] !== '')?$info['videoimg']:''); ?>" type="hidden">
							<i class="mar-all pad-hor bord-all ion-ios-cloud-upload-outline icon-3x" data-type='videoimg' id="upvideoimg"></i>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">活动封面</label>
						<?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): ?>
						<div class="col-sm-2" id="headimgdiv">
							<img src="<?php echo $info['headimg']; ?>" class="img-responsive" style="max-width:100px"/>						
						</div>
						<?php else: ?> 
						<div class="col-sm-2" id="headimgdiv" style="display:none">						
						</div>
						<?php endif; ?>
						<div class="col-sm-2">
							<input id="headimg" value="<?php echo (isset($info['headimg']) && ($info['headimg'] !== '')?$info['headimg']:''); ?>" type="hidden">
							<i class="mar-all pad-hor bord-all ion-ios-cloud-upload-outline icon-3x" data-type='headimg' id="upheadimg"></i>
						</div>
					</div>
					<div class="text-center pad-all">
						<input type="hidden" id="id" value="<?php echo (isset($info['id']) && ($info['id'] !== '')?$info['id']:'0'); ?>" />
						<button class="btn btn-success btn-lg" onclick="addbase()">保存</button>
					</div>
				</div>
			</div>
			<div id="intro-box" class="tab-pane fade">
				<div class="form-horizontal pad-top mar-top">
					<div class="form-group">
						<label class="col-lg-2 control-label">详细介绍</label>						
						<?php if(!(empty($info['intro']) || (($info['intro'] instanceof \think\Collection || $info['intro'] instanceof \think\Paginator ) && $info['intro']->isEmpty()))): ?>
						<div class="col-lg-8 drag-list" id="introimgdiv">
							<?php if(is_array($info['intro']) || $info['intro'] instanceof \think\Collection || $info['intro'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['intro'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
							<img src="<?php echo $v; ?>" class="img-responsive" style="max-width:500px"/>	
							<?php endforeach; endif; else: echo "" ;endif; ?>					
						</div>
						<?php else: ?>
						<div class="col-lg-8 drag-list" id="introimgdiv" style="display:none">						
						</div>
						<?php endif; ?>
						<div class="col-lg-2">
							<i class="mar-all pad-hor bord-all ion-ios-cloud-upload-outline icon-3x" data-type='introimg' id="upintroimg"></i>
						</div>
					</div>
					<div class="text-center pad-all">
						<button class="btn btn-success btn-lg" onclick="addintro()">保存</button>
					</div>
				</div>
			</div>
			<div id="format-box" class="tab-pane fade">
				<div class="form-horizontal pad-top mar-top">
					<?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if(!(empty($format) || (($format instanceof \think\Collection || $format instanceof \think\Paginator ) && $format->isEmpty()))): if(is_array($format) || $format instanceof \think\Collection || $format instanceof \think\Paginator): $i = 0; $__LIST__ = $format;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($key > '0'): ?>
					<p class="bord-top"></p>
					<?php endif; ?>
					<div class="format">
						<div class="form-group">
							<label class="col-sm-2 control-label">规格名称</label>
							<div class="col-sm-6">
								<input id="name" placeholder="比如：成人票，儿童票" value="<?php echo (isset($v['name']) && ($v['name'] !== '')?$v['name']:''); ?>" type="text" class="form-control" >
							</div>
							<div class="col-sm-3 text-danger text-xs">留空则删除此规格</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">价格</label>
							<div class="col-sm-6">
								<input id="price" placeholder="售卖价格" value="<?php echo (isset($v['price']) && ($v['price'] !== '')?$v['price']:''); ?>" type="number" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">结算价格</label>
							<div class="col-sm-6">
								<input id="cost" placeholder="结算价格" value="<?php echo (isset($v['cost']) && ($v['cost'] !== '')?$v['cost']:''); ?>" type="number" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">库存</label>
							<div class="col-sm-6">
								<input id="stock" placeholder="库存量" value="<?php echo (isset($v['stock']) && ($v['stock'] !== '')?$v['stock']:''); ?>" type="number" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">规格介绍</label>
							<div class="col-sm-6">
								<input id="intro" placeholder="规格介绍，可为空" value="<?php echo (isset($v['intro']) && ($v['intro'] !== '')?$v['intro']:''); ?>" type="text" class="form-control" >
							</div>
						</div>
					</div>
					<?php endforeach; endif; else: echo "" ;endif; else: ?>
					<div class="format">
						<div class="form-group">
							<label class="col-sm-2 control-label">规格名称</label>
							<div class="col-sm-6">
								<input id="name" placeholder="比如：成人票，儿童票" value="<?php echo (isset($format['name']) && ($format['name'] !== '')?$format['name']:''); ?>" type="text" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">价格</label>
							<div class="col-sm-6">
								<input id="price" placeholder="售卖价格" value="<?php echo (isset($format['price']) && ($format['price'] !== '')?$format['price']:''); ?>" type="number" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">结算价格</label>
							<div class="col-sm-6">
								<input id="cost" placeholder="结算价格" value="<?php echo (isset($format['cost']) && ($format['cost'] !== '')?$format['cost']:''); ?>" type="number" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">库存</label>
							<div class="col-sm-6">
								<input id="stock" placeholder="库存量" value="<?php echo (isset($format['stock']) && ($format['stock'] !== '')?$format['stock']:''); ?>" type="number" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">规格介绍</label>
							<div class="col-sm-6">
								<input id="intro" placeholder="规格介绍，可为空" value="<?php echo (isset($format['intro']) && ($format['intro'] !== '')?$format['intro']:''); ?>" type="text" class="form-control" >
							</div>
						</div>
					</div>
					<?php endif; ?>
					<div id="moreformat"></div>
					<div class="text-center pad-all">
						<button class="btn btn-warning btn-lg" onclick="addFormatTemp()">增加规格</button>
						<button class="btn btn-success btn-lg" onclick="addFormat()">保存</button>
					</div>
					<?php else: ?>
					请先完善基本信息
					<?php endif; ?>
				</div>
				
			</div>
			<div id="itinerary-box" class="tab-pane fade">
				<div class="form-horizontal pad-top mar-top">
					<?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if(!(empty($itinerary) || (($itinerary instanceof \think\Collection || $itinerary instanceof \think\Paginator ) && $itinerary->isEmpty()))): if(is_array($itinerary) || $itinerary instanceof \think\Collection || $itinerary instanceof \think\Paginator): $i = 0; $__LIST__ = $itinerary;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($key > '0'): ?>
					<p class="bord-top"></p>
					<?php endif; ?>
					<div class="itinerary">
						<div class="form-group">
							<label class="col-sm-2 control-label">行程日期</label>
							<div class="col-sm-6">
								<div class="input-group">
									<input type="text"  value="<?php echo $v['date']; ?>"   class="form-control start_time" id="date">
									<span class="input-group-addon">
										<i class="ion-calendar"></i>
									</span>
								</div>			
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">行程图标</label>
							<div class="col-sm-6">
								<input id="icon" placeholder="行程的icon图标" value="<?php echo (isset($v['icon']) && ($v['icon'] !== '')?$v['icon']:''); ?>" type="text" class="form-control" >
							</div>
							<div class="col-sm-3 text-danger text-xs">留空则删除此行程</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">行程标题</label>
							<div class="col-sm-6">
								<input id="title" placeholder="行程的标题，如：D1|北海道" value="<?php echo (isset($v['title']) && ($v['title'] !== '')?$v['title']:''); ?>" type="text" class="form-control" >
							</div>
							<div class="col-sm-3 text-danger text-xs">留空则删除此行程</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">行程介绍</label>
							<div class="col-sm-6">
								<div id="intro" class="summernote"><?php echo $v['intro']; ?></div>
							</div>
						</div>
					</div>
					<?php endforeach; endif; else: echo "" ;endif; else: ?>
					<div class="itinerary">
						<div class="form-group">
							<label class="col-sm-2 control-label">行程日期</label>
							<div class="col-sm-6">
								<div class="input-group">
									<input type="text"  placeholder="行程日期" class="form-control start_time" id="date">
									<span class="input-group-addon">
										<i class="ion-calendar"></i>
									</span>
								</div>			
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">行程图标</label>
							<div class="col-sm-6">
								<input id="icon" placeholder="行程的icon图标" type="text" class="form-control" >
							</div>
							<div class="col-sm-3 text-danger text-xs">留空则删除此行程</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">行程标题</label>
							<div class="col-sm-6">
								<input id="title" placeholder="行程的标题，如：D1|北海道" type="text" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">行程介绍</label>
							<div class="col-sm-6">
								<div id="intro" class="summernote"></div>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<div id="moreitinerary"></div>
					<div class="text-center pad-all">
						<button class="btn btn-warning btn-lg" onclick="addItineraryTemp()">增加日程</button>
						<button class="btn btn-success btn-lg" onclick="addItinerary()">保存</button>
					</div>
					<?php else: ?>
					请先完善基本信息
					<?php endif; ?>
				</div>
			</div>
			<div id="notice-box" class="tab-pane fade">
				<div class="form-horizontal pad-top mar-top">					
					<div class="form-group">
						<label class="col-sm-2 control-label">注意事项</label>
						<div class="col-sm-6">
							<div id="notice" class="summernote"><?php echo (isset($info['notice']) && ($info['notice'] !== '')?$info['notice']:''); ?></div>
						</div>
					</div>
					
					<div class="text-center pad-all">
						<input type="hidden" id="id" value="<?php echo (isset($info['id']) && ($info['id'] !== '')?$info['id']:'0'); ?>" />
						<button class="btn btn-success btn-lg" onclick="addnotice()">保存</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>		                

<div id="format-temp" style="display:none">
	<div class="format">
		<p class="bord-top"></p>
		<div class="form-group">
			<label class="col-sm-2 control-label">规格名称</label>
			<div class="col-sm-6">
				<input id="name" placeholder="比如：成人票，儿童票" type="text" class="form-control" >
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">价格</label>
			<div class="col-sm-6">
				<input id="price" placeholder="售卖价格" type="number" class="form-control" >
			</div>
		</div>
		<div class="form-group">
							<label class="col-sm-2 control-label">结算价格</label>
							<div class="col-sm-6">
								<input id="cost" placeholder="结算价格" type="number" class="form-control" >
							</div>
						</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">库存</label>
			<div class="col-sm-6">
				<input id="stock" placeholder="库存量" type="number" class="form-control" >
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">规格介绍</label>
			<div class="col-sm-6">
				<input id="intro" placeholder="规格介绍，可为空" type="text" class="form-control" >
			</div>
		</div>
	</div>
</div>
<div id="itinerary-temp" style="display:none">
	<div class="itinerary">
		<p class="bord-top"></p>
		<div class="form-group">
			<label class="col-sm-2 control-label">行程日期</label>
			<div class="col-sm-6">
				<div class="input-group">
					<input type="text"  placeholder="行程日期" class="form-control start_time" id="date">
					<span class="input-group-addon">
						<i class="ion-calendar"></i>
					</span>
				</div>			
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">行程图标</label>
			<div class="col-sm-6">
				<input id="icon" placeholder="行程的icon图标" type="text" class="form-control" >
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">行程标题</label>
			<div class="col-sm-6">
				<input id="title" placeholder="行程的标题，如：D1|北海道" type="text" class="form-control" >
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">行程介绍</label>
			<div class="col-sm-6">
				<div id="intro" class="summernote"></div>
			</div>
		</div>
	</div>
</div>

<script>
var uptype='video'
$('.ion-ios-cloud-upload-outline').click(function(){
	uptype=$(this).attr('data-type');
})
function addnotice(){
	var id=$('#notice-box #id').val();
	var notice=$('#notice-box #notice').summernote('code');
	var url="<?php echo url('activity/addnotice'); ?>"
	$.post(url,{id:id,notice:notice},function(data){
		if(data.status==1){
			layer.alert(data.msg,function(){
				location.href="<?php echo url('activity/index'); ?>/id/"+id;
			})
		}else{
			layer.alert(data.msg,function(){
				layer.closeAll();
			})
		}
	});
}
$(function(){
	$('.start_time').datepicker({
        format: "yyyy-mm-dd",
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true,
        language: "zh-CN",
    });
	$('.summernote').summernote({  
        height: "100px", 
        toolbar: [],
    })
})
function sendFile(file) {  
    data = new FormData();  
    data.append("file", file); 
    $.ajax({
        data: data,  
        type: "POST",  
        url: "<?php echo url('pub/uposs'); ?>",  
        cache: false,  
        contentType: false,  
        processData: false,  
        success: function(data) {  
              $("#intro").summernote('insertImage', data.pic, 'image name');
        }  
    });  
} 

function addItineraryTemp(){
	var html=$('#itinerary-temp').html();
	$('#moreitinerary').append(html);
	$('.start_time').datepicker({
        format: "yyyy-mm-dd",
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true,
        language: "zh-CN",
    });

}
function addItinerary(){
	var itinerarys = new Array(); 
	$('.itinerary').each(function(){
		var that=$(this);
		var nowdata=new Array();		
		var date=that.find('#date').val();
		var icon=that.find('#icon').val();
		var title=that.find('#title').val();
		var intro=that.find('#intro').summernote('code');
		if(title!=''){
			nowdata.push(date);
			nowdata.push(title);
			nowdata.push(intro);
			nowdata.push(icon);
			itinerarys.push(nowdata);
		}		
	})
	var url="<?php echo url('activity/add_do',['t'=>3]); ?>";
	var id="<?php echo $id; ?>";
	console.log(itinerarys);
	$.post(url,{id:id,itinerarys:itinerarys},function(data){
		if(data.status==1){
			layer.alert(data.msg,function(){
				location.href="<?php echo url('activity/add'); ?>/id/"+id;
			})
		}else{
			layer.alert(data.msg,function(){
				layer.closeAll();
			})
		}		
	})
}
function addFormatTemp(){
	var html=$('#format-temp').html();
	$('#moreformat').append(html);
}
function addFormat(){
	var formats = new Array(); 
	$('.format').each(function(){
		var that=$(this);
		var nowdata=new Array();
		var name=that.find('#name').val();
		var price=that.find('#price').val();
		var stock=that.find('#stock').val();
		var intro=that.find('#intro').val();
		var cost=that.find('#cost').val();
		if(name!=''){
			nowdata.push(name);
			nowdata.push(price);
			nowdata.push(stock);
			nowdata.push(intro);
			nowdata.push(cost);
			formats.push(nowdata);
		}		
	})
	var url="<?php echo url('activity/add_do',['t'=>2]); ?>";
	var id="<?php echo $id; ?>";
	$.post(url,{id:id,formats:formats},function(data){
		if(data.status==1){
			layer.alert(data.msg,function(){
				location.href="<?php echo url('activity/add'); ?>/id/"+id;
			})
		}else{
			layer.alert(data.msg,function(){
				layer.closeAll();
			})
		}		
	})
}
function addbase(){
	var title=$('#title').val();
	var subtitle=$('#subtitle').val();
	var video=$('#video').val();
	var headimg=$('#headimg').val();
	var videoimg=$('#videoimg').val();
	var price=$('#price').val();
	var fromcity=$('#fromcity').val();
	var id=$('#id').val();
	var tags=$('#tags').val();
	var url="<?php echo url('activity/add_do',['t'=>1]); ?>";
	$.post(url,{id:id,title:title,fromcity:fromcity,subtitle:subtitle,price:price,video:video,videoimg:videoimg,tags:tags,headimg:headimg},function(data){
		if(data.status==1){
			layer.alert('保存成功',function(){
				location.href="<?php echo url('activity/add'); ?>/id/"+data.msg;
			})
		}else{
			layer.alert(data.msg,function(){
				layer.closeAll();
			})
		}		
	})
}

</script>
<script type="text/javascript">
      $(function() {    	  
    	  /* $('#introdiv').arrangeable({dragSelector: 'img'}); */
          $('#introimgdiv img').arrangeable();
          $('#introimgdiv img').click(function(){
        	  var that=$(this);
        	  layer.confirm('是否删除这张图片？', {
        		  btn: ['删除','不删除'] //按钮
        		}, function(){
        		  that.remove();
        		  layer.closeAll();
        		}, function(){
        		  layer.closeAll();
        		});
          });
      });
      function addintro(){
    	  var imgs='';
    	  var id=$('#id').val();
    	  $('#introimgdiv img').each(function(){
    		  var that=$(this);
    		  if(imgs==''){
    			  imgs=that.attr('src')
    		  }else{
    			  imgs=imgs+'|'+that.attr('src')
    		  }
    	  })
    	  if(imgs==''){
    		  layer.alert('详细介绍不能为空，请至少上传一张图片',function(){
    			  layer.closeAll()
    		  })
    		  return false;
    	  }
    	  console.log(imgs)
    	  console.log('id:'+id)
    	  $.post("<?php echo url('activity/add_do',['t'=>4]); ?>",{imgs:imgs,id:id},function(data){
    		  console.log(data)
    		  if(data.status==1){
    				layer.alert(data.msg,function(){
    					location.href="<?php echo url('activity/add'); ?>/id/"+id;
    				})
    			}else{
    				layer.alert(data.msg,function(){
    					layer.closeAll();
    				})
    			}
    	  })
      }
</script>
<script type="text/javascript" src="__PLUS__/plupload/plupload.full.min.js"></script>
<script type="text/javascript">
	var picupurl="<?php echo url('pub/uposs'); ?>"	
	var uploader = new plupload.Uploader({
		runtimes: 'html5,flash,silverlight,html4', 
		browse_button: ['upheadimg','upvideoimg','upintroimg'],
		url: picupurl, //远程上传地址
		flash_swf_url: 'plupload/Moxie.swf',
		silverlight_xap_url: 'plupload/Moxie.xap', 
		filters: {
					max_file_size: '10mb', 
					mime_types: [{title: "files", extensions: "jpg,jpeg,gif,png"}]
                },
		multi_selection: true, //true:ctrl多文件上传, false 单文件上传
		init: {
				FilesAdded: function(up, files) { //文件上传前
					if ($("#ul_pics_1").children("li").length > 30) {
						alert("您上传的图片太多了！");
                        uploader.destroy();
					} else {
						var li = '';
						plupload.each(files, function(file) { //遍历文件
							li += "<li id='" + file['id'] + "'><div class='progress'><span class='bar'></span><span class='percent'>0%</span></div></li>";
						});
						$("#ul_pics_1").prepend(li);
						uploader.start();
					}
				},
				UploadProgress: function(up, file) { //上传中，显示进度条
                        var percent = file.percent;
                        $("#" + file.id).find('.bar').css({"width": percent + "%"});
                        $("#" + file.id).find(".percent").text(percent + "%");
                    },
				FileUploaded: function(up, file, info) {
					var data = eval("(" + info.response + ")");
					if(data.error==0){
						if(uptype=='headimg'){
							$('#headimgdiv').html('<img src="'+data.pic+'" class="img-responsive" style="max-width:100px"/>').css('display','block');
							$('#headimg').val(data.pic);
						}
						if(uptype=='videoimg'){
							$('#videoimgdiv').html('<img src="'+data.pic+'" class="img-responsive" style="max-width:100px"/>').css('display','block');
							$('#videoimg').val(data.pic);
						}
						if(uptype=='introimg'){
							$('#introimgdiv').append('<img src="'+data.pic+'" class="img-responsive" style="max-width:500px" draggable="true"/>').css('display','block');
							$('#introimgdiv img').arrangeable();
							$('#introimgdiv img').click(function(){
					        	  var that=$(this);
					        	  layer.confirm('是否删除这张图片？', {
					        		  btn: ['删除','不删除'] //按钮
					        		}, function(){
					        		  that.remove();
					        		  layer.closeAll();
					        		}, function(){
					        		  layer.closeAll();
					        		});
					          });
						}			
						
					}
					console.log(data.msg);
				},
				Error: function(up, err) { //上传出错的时候触发
					alert(err.message);
				}
			}
		});
		uploader.init();
</script>
				</div>
			</div>
		</div>
	</div>
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
