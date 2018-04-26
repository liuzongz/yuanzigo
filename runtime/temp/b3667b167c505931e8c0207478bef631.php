<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:81:"/home/wwwroot/www.yuanzigo.com/public/../application/admin/view/activity/add.html";i:1524647049;s:75:"/home/wwwroot/www.yuanzigo.com/public/../application/admin/view/layout.html";i:1524460663;s:82:"/home/wwwroot/www.yuanzigo.com/public/../application/admin/view/public/header.html";i:1524460666;s:82:"/home/wwwroot/www.yuanzigo.com/public/../application/admin/view/public/footer.html";i:1524460665;}*/ ?>
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
			<a class="text-primary" href="<?php echo url('index/index/logout'); ?>">退出</a>
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
<script type="text/javascript" src="http://www.17sucai.com/preview/1/2017-02-25/jquery-dragarrange/drag-arrange.js"></script>

<script src="__PLUGINS__/bootstrap-select/bootstrap-select.min.js"></script>
<link href="__PLUGINS__/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
<link href="__PLUGINS__/select2/css/select2.min.css" rel="stylesheet">
<script src="__PLUGINS__/select2/js/select2.min.js"></script>
<link href="__PLUGINS__/chosen/chosen.min.css" rel="stylesheet">
<script src="__PLUGINS__/chosen/chosen.jquery.min.js"></script>

<script src="__PLUGINS__/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<link href="__PLUGINS__/bootstrap-tagsinput/bootstrap-tagsinput.min.css" rel="stylesheet">
<script src="__PLUS__/template.js"></script>

<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-control">
			<ul class="nav nav-tabs">
				<li class="active">
					<a data-toggle="tab" href="#base-box" aria-expanded="true">基本介绍</a>
				</li>
				<li>
					<a data-toggle="tab" href="#headimg-box" aria-expanded="false">封面题图</a>
				</li>
				<li>
					<a data-toggle="tab" href="#tags-box" aria-expanded="false">活动标签</a>
				</li>
				<li>
					<a data-toggle="tab" href="#format-box" aria-expanded="false">规格票价</a>
				</li>				
				<!-- <li>
					<a data-toggle="tab" href="#features-box" aria-expanded="false">活动特色</a>					
				</li>
				<li>
					<a data-toggle="tab" href="#notice-box" aria-expanded="false">注意事项</a>					
				</li> -->
				<li>
					<a data-toggle="tab" href="#intro-box" aria-expanded="false">详细介绍</a>					
				</li>
				<li>
					<a data-toggle="tab" href="#period-box" aria-expanded="false">团期设置</a>					
				</li>
			</ul>					
		</div>
		<h3 class="panel-title">活动发布</h3>
	</div>
	<div class="panel-body">
		<div class="tab-content">
			<div id="base-box" class="tab-pane fade active in">
				<div class="form-horizontal pad-top mar-top">
					<div class="form-group  <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['element'] > '0'): ?>hide<?php endif; endif; ?>">
						<label class="col-sm-2 control-label">所属店铺</label>
						<div class="col-sm-6">
							 <select data-placeholder="请选择所属店铺" class="form-control" id="shop_id" tabindex="1">
							 	<?php if(is_array($shoplist) || $shoplist instanceof \think\Collection || $shoplist instanceof \think\Paginator): $i = 0; $__LIST__ = $shoplist;if( count($__LIST__)==0 ) : echo "<option>请先添加店铺</option>" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
							 	<option value="<?php echo $v['id']; ?>"><?php echo $v['shopname']; ?></option>
							 	<?php endforeach; endif; else: echo "<option>请先添加店铺</option>" ;endif; ?>
							 </select>
						</div>
					</div>
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
						<label class="col-sm-2 control-label">目的地</label>
						<div class="col-sm-6">
							<input id="destination" placeholder="比如:上海" value="<?php echo (isset($info['destination']) && ($info['destination'] !== '')?$info['destination']:''); ?>" type="text" class="form-control" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">虚假销量</label>
						<div class="col-sm-6">
							<input id="sale_num" placeholder="主要让人产生已经卖很多的幻觉" value="<?php echo (isset($info['sale_num']) && ($info['sale_num'] !== '')?$info['sale_num']:''); ?>" type="number" class="form-control" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label">开始日期</label>
						<div class="col-lg-6">
							<div class="input-group">
								<input type="text"  value="<?php echo (isset($info['start_time']) && ($info['start_time'] !== '')?$info['start_time']:''); ?>"   class="form-control" id="start_time">
								<span class="input-group-addon">
									<i class="ion-calendar"></i>
								</span>
							</div>			
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label">结束日期</label>
						<div class="col-lg-6">
							<div class="input-group">
								<input type="text"  value="<?php echo (isset($info['end_time']) && ($info['end_time'] !== '')?$info['end_time']:''); ?>"   class="form-control" id="end_time">
								<span class="input-group-addon">
									<i class="ion-calendar"></i>
								</span>
							</div>			
						</div>
					</div>
										
					<div class="text-center pad-all">
						<input type="hidden" id="id" value="<?php echo (isset($info['id']) && ($info['id'] !== '')?$info['id']:'0'); ?>" />
						<button class="btn btn-success btn-lg" onclick="addbase()">保存</button>
					</div>
				</div>
			</div>
			<div id="tags-box" class="tab-pane fade">
				<div class="form-horizontal pad-top mar-top">
					<div class="form-group">
						<label class="col-lg-2 control-label">活动标签</label>
						<?php if(is_array($alltags) || $alltags instanceof \think\Collection || $alltags instanceof \think\Paginator): $i = 0; $__LIST__ = $alltags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
							<button class="btn  btn-lg tags <?php if(!(empty($thetags) || (($thetags instanceof \think\Collection || $thetags instanceof \think\Paginator ) && $thetags->isEmpty()))): if(in_array(($v['id']), is_array($thetags)?$thetags:explode(',',$thetags))): ?>btn-warning<?php else: ?>btn-default<?php endif; else: ?>btn-default<?php endif; ?>" data-id="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></button>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<div class="text-center pad-all">
						<button class="btn btn-success btn-lg" onclick="addTags()">保存</button>
					</div>
				</div>
			</div>
			<div id="intro-box" class="tab-pane fade">
				<div class="form-horizontal pad-top mar-top">
					<div class="form-group">
						<label class="col-lg-2 control-label">详细介绍</label>						
						<?php if(!(empty($info['intro']) || (($info['intro'] instanceof \think\Collection || $info['intro'] instanceof \think\Paginator ) && $info['intro']->isEmpty()))): ?>
						<div class="col-lg-8 drag-list" id="introImgdiv">
							<?php if(is_array($info['intro']) || $info['intro'] instanceof \think\Collection || $info['intro'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['intro'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
							<img src="<?php echo $v; ?>" class="img-responsive" style="max-width:500px"/>	
							<?php endforeach; endif; else: echo "" ;endif; ?>					
						</div>
						<?php else: ?>
						<div class="col-lg-8 drag-list" id="introImgdiv" style="display:none">						
						</div>
						<?php endif; ?>
						<div class="col-lg-2">
							<i class="mar-all pad-hor bord-all ion-ios-cloud-upload-outline icon-3x" data-type='introImg' id="upIntroImg"></i>
						</div>
					</div>
					<div class="text-center pad-all">
						<button class="btn btn-success btn-lg" onclick="addIntro()">保存</button>
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
						<div class="form-group">
							<label class="col-sm-2 control-label">排序</label>
							<div class="col-sm-6">
								<input id="xu" placeholder="排序" value="<?php echo (isset($v['xu']) && ($v['xu'] !== '')?$v['xu']:''); ?>" type="text" class="form-control" >
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
						<div class="form-group">
							<label class="col-sm-2 control-label">排序</label>
							<div class="col-sm-6">
								<input id="xu" placeholder="排序" value="<?php echo (isset($format['xu']) && ($format['xu'] !== '')?$format['xu']:''); ?>" type="text" class="form-control" >
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
			<div id="headimg-box" class="tab-pane fade">
				<div class="form-horizontal pad-top mar-top">
					<div class="form-group">
						<label class="col-lg-2 control-label">封面题图</label>						
						<?php if(!(empty($info['headimg']) || (($info['headimg'] instanceof \think\Collection || $info['headimg'] instanceof \think\Paginator ) && $info['headimg']->isEmpty()))): ?>
						<div class="col-lg-8 drag-list" id="headimgImgdiv">
							<?php if(is_array($info['headimg']) || $info['headimg'] instanceof \think\Collection || $info['headimg'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['headimg'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
							<img src="<?php echo $v; ?>" class="img-responsive" style="max-width:500px"/>	
							<?php endforeach; endif; else: echo "" ;endif; ?>					
						</div>
						<?php else: ?>
						<div class="col-lg-8 drag-list" id="headimgImgdiv" style="display:none">						
						</div>
						<?php endif; ?>
						<div class="col-lg-2">
							<i class="mar-all pad-hor bord-all ion-ios-cloud-upload-outline icon-3x" data-type='headimgImg' id="upHeadimgImg"></i>
						</div>
					</div>
					<div class="text-center pad-all">
						<button class="btn btn-success btn-lg" onclick="addHeadimg()">保存</button>
					</div>
				</div>
			</div>
			
			<div id="period-box" class="tab-pane fade">
				<div class="form-horizontal pad-top mar-top">
					<?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if(is_array($info['period']) || $info['period'] instanceof \think\Collection || $info['period'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['period'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
					<div class="period" id="period_<?php echo $v['id']; ?>">
						<div class="form-group">
							<label class="col-sm-2 control-label">团期名称</label>
							<div class="col-sm-6">
								<input placeholder="用回车键隔开多个团期" value="<?php echo (isset($v['name']) && ($v['name'] !== '')?$v['name']:''); ?>" data-id="<?php echo $v['id']; ?>" type="text" class="form-control period_name">
							</div>
							<div class="col-xs-2"><span class="btn btn-danger" data-id="<?php echo $v['id']; ?>" onclick="del_period(<?php echo $v['id']; ?>)">删除</span></div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">排序</label>
							<div class="col-sm-6">
								<input placeholder="排序" value="<?php echo (isset($v['xu']) && ($v['xu'] !== '')?$v['xu']:''); ?>" type="text" class="form-control period_xu" >
							</div>
						</div>
					</div>
					<?php endforeach; endif; else: echo "" ;endif; endif; ?>
					<div id="period-add-box"></div>
					<div class="text-center pad-all">
						<input type="hidden" id="id" value="<?php echo (isset($info['id']) && ($info['id'] !== '')?$info['id']:'0'); ?>" />
						<button class="btn btn-default btn-lg" onclick="addperiodinput()">添加一个团期</button>
						<button class="btn btn-success btn-lg" onclick="addperiod()">保存</button>
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
		<div class="form-group">
			<label class="col-sm-2 control-label">排序</label>
			<div class="col-sm-6">
				<input id="xu" placeholder="排序" type="text" class="form-control" >
			</div>
		</div>
	</div>
</div>


<script>
function del_period(id){
	$.post("<?php echo url('activity/periodDel'); ?>",{id:id},function(data){
		if(data.status==1){
			layer.msg(data.msg)
			$('#period_'+id).remove();
		}else{
			layer.alert(data.msg)
		}
	})
}

function addperiodinput(){
	var html=template('period-temp');
	$('#period-add-box').append(html)
}

var uptype='video'
$('.ion-ios-cloud-upload-outline').click(function(){
	uptype=$(this).attr('data-type');
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

function addbase(){
	var title=$('#title').val();
	var subtitle=$('#subtitle').val();
	var destination=$('#destination').val();
	var id=$('#id').val();
	var shop_id=$('#shop_id').val();
	var sale_num=$('#sale_num').val();
	var start_time=$('#start_time').val();
	var end_time=$('#end_time').val();
	var url="<?php echo url('activity/add_do',['t'=>1]); ?>";
	
	$.post(url,{
			id:id,
			shop_id:shop_id,
			title:title,
			destination:destination,
			subtitle:subtitle,
			sale_num:sale_num,
			start_time:start_time,
			end_time:end_time
		},function(data){
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

function addperiod(){
	var id=$('#id').val();
	$('.period').each(function(){
		var that=$(this)
		var period_name=that.find('.period_name').val()
		var period_xu=that.find('.period_xu').val()
		var period_id=that.find('.period_name').attr('data-id')
		console.log('period_name='+period_name)
		console.log('period_xu='+period_xu)
		console.log('period_id='+period_id)

		var url="<?php echo url('activity/add_do',['t'=>8]); ?>";
		$.post(url,{
			id:id,
			period_id:period_id,
			period_name:period_name,
			xu:period_xu
		},function(data){
			if(data.status==1){
				that.find('.period_name').addClass('bg-success').attr('disabled','disabled')
				layer.msg(data.msg)
			}else{
				layer.msg(data.msg)	
				that.addClass('bg-danger')
			}				
		})
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
		var xu=that.find('#xu').val();
		if(name!=''){
			nowdata.push(name);
			nowdata.push(price);
			nowdata.push(stock);
			nowdata.push(intro);
			nowdata.push(cost);
			nowdata.push(xu);
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
function addHeadimg(){
	  var imgs='';
	  var id=$('#id').val();
	  $('#headimgImgdiv img').each(function(){
		  var that=$(this);
		  if(imgs==''){
			  imgs=that.attr('src')
		  }else{
			  imgs=imgs+'|'+that.attr('src')
		  }
	  })
	  if(imgs==''){
		  layer.alert('封面题图不能为空，请至少上传一张图片',function(){
			  layer.closeAll()
		  })
		  return false;
	  }
	  console.log(imgs)
	  console.log('id:'+id)
	  $.post("<?php echo url('activity/add_do',['t'=>7]); ?>",{imgs:imgs,id:id},function(data){
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
function addFeatures(){
	var imgs='';
	  var id=$('#id').val();
	  $('#featuresImgdiv img').each(function(){
		  var that=$(this);
		  if(imgs==''){
			  imgs=that.attr('src')
		  }else{
			  imgs=imgs+'|'+that.attr('src')
		  }
	  })
	  if(imgs==''){
		  layer.alert('注意事项不能为空，请至少上传一张图片',function(){
			  layer.closeAll()
		  })
		  return false;
	  }

	  $.post("<?php echo url('activity/add_do',['t'=>3]); ?>",{imgs:imgs,id:id},function(data){
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

function addNotice(){
	var imgs='';
	  var id=$('#id').val();
	  $('#noticeImgdiv img').each(function(){
		  var that=$(this);
		  if(imgs==''){
			  imgs=that.attr('src')
		  }else{
			  imgs=imgs+'|'+that.attr('src')
		  }
	  })
	  if(imgs==''){
		  layer.alert('注意事项不能为空，请至少上传一张图片',function(){
			  layer.closeAll()
		  })
		  return false;
	  }

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


function addIntro(){
	  var imgs='';
	  var id=$('#id').val();
	  $('#introImgdiv img').each(function(){
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
	  $.post("<?php echo url('activity/add_do',['t'=>5]); ?>",{imgs:imgs,id:id},function(data){
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



$('.tags').click(function(){
	var that=$(this)
	if(that.hasClass('btn-warning')){
		that.removeClass('btn-warning')
		that.addClass('btn-default')
	}else{
		that.removeClass('btn-default')
		that.addClass('btn-warning')
	}
})

function addTags(){
	var tags = new Array()
	$('#tags-box .btn-warning').each(function(){			
		var that=$(this)
		var id=that.attr('data-id')
		tags.push(id)
	})
	tags=tags.join(',')
	if(!tags){
		layer.alert('请至少选择一个活动标签')
		return false
	}
	
	var id=$('#id').val();
	$.post("<?php echo url('activity/add_do',['t'=>6]); ?>",{tags:tags,id:id},function(data){
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
<script type="text/javascript">
      $(function() {
    	  $('#start_time,#end_time').datepicker({
    	        format: "yyyy-mm-dd",
    	        todayBtn: "linked",
    	        autoclose: true,
    	        todayHighlight: true,
    	        language: "zh-CN",
    	    });
    	  
    	  $('#shop_id').chosen();
          $('#introImgdiv img,#featuresImgdiv img,#noticeImgdiv img,#headimgImgdiv img').arrangeable();
          $('#introImgdiv img,#featuresImgdiv img,#noticeImgdiv img,#headimgImgdiv img').click(function(){
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
</script>
<script type="text/javascript" src="__PLUS__/plupload/plupload.full.min.js"></script>
<script type="text/javascript">
	var picupurl="<?php echo url('pub/uposs'); ?>"	
	var uploader = new plupload.Uploader({
		runtimes: 'html5,flash,silverlight,html4', 
		browse_button:  ['upHeadimg','upNoticeImg','upFeaturesImg','upIntroImg','upHeadimgImg'],
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
						if(uptype=='introImg'){
							$('#introImgdiv').append('<img src="'+data.pic+'" class="img-responsive" style="max-width:500px" draggable="true"/>').css('display','block');
							$('#introImgdiv img').arrangeable();
							$('#introImgdiv img').click(function(){
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
						if(uptype=='noticeImg'){
							$('#noticeImgdiv').append('<img src="'+data.pic+'" class="img-responsive" style="max-width:500px" draggable="true"/>').css('display','block');
							$('#noticeImgdiv img').arrangeable();
							$('#noticeImgdiv img').click(function(){
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
						if(uptype=='featuresImg'){
							$('#featuresImgdiv').append('<img src="'+data.pic+'" class="img-responsive" style="max-width:500px" draggable="true"/>').css('display','block');
							$('#featuresImgdiv img').arrangeable();
							$('#featuresImgdiv img').click(function(){
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
						if(uptype=='headimgImg'){
							$('#headimgImgdiv').append('<img src="'+data.pic+'" class="img-responsive" style="max-width:500px" draggable="true"/>').css('display','block');
							$('#headimgImgdiv img').arrangeable();
							$('#headimgImgdiv img').click(function(){
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
<script id="period-temp" type="html/text">
	<div class="period" >
	<div class="form-group">
		<label class="col-sm-2 control-label">团期名称</label>
		<div class="col-sm-6">
			<input name="period_name" type="text" class="form-control period_name" data-id="0">
		</div>		
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">排序</label>
		<div class="col-sm-6">
			<input id="xu" placeholder="排序" type="text" class="form-control" >
		</div>
	</div>
</div>
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
