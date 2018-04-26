<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"/home/wwwroot/www.yuanzigo.com/public/../application/shop1801/view/shop/index.html";i:1522224055;s:78:"/home/wwwroot/www.yuanzigo.com/public/../application/shop1801/view/layout.html";i:1517976524;s:85:"/home/wwwroot/www.yuanzigo.com/public/../application/shop1801/view/public/header.html";i:1517976525;s:85:"/home/wwwroot/www.yuanzigo.com/public/../application/shop1801/view/public/footer.html";i:1517976525;}*/ ?>
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
					
<div class="row">
	<div class="panel col-lg-6" >
		<div class="panel-header">
			<h3>我的店推广二维码</h3>
		</div>
		<div class="panel-body">
			<img src="<?php echo $info['qr']; ?>" alt="" />
		</div>
	</div>
	<div class="panel col-lg-6" id="infodiv">
		<div class="panel-header">
			<h3>店铺信息</h3>
		</div>
		<div class="panel-body">
			<p>店铺名称：<?php echo $info['shopname']; ?></p>
			<p>店铺联系人：<?php echo $info['contact']; ?></p>
			<p>联系电话：<?php echo $info['tel']; ?></p>
			<p>店铺地址：<?php echo $info['address']; ?></p>
			<p>店铺LOGO：<?php if(!(empty($info['headimg']) || (($info['headimg'] instanceof \think\Collection || $info['headimg'] instanceof \think\Paginator ) && $info['headimg']->isEmpty()))): ?><img src="<?php echo $info['headimg']; ?>" style="max-width:5em;" alt="" /><?php endif; ?></p>
			<p>店铺推广网址：http://www.yuanzigo.com/wx1801/index.html?shopid=<?php echo $info['id']; ?></p>
		</div>
		<div class="panel-footer text-center">
			<button class="btn btn-warning btn-lg" onclick="edit()">修改</button>
		</div>
	</div>
	<div class="panel col-lg-6" id="editdiv" style="display:none">
		<div class="panel-header">
			<h3>修改店铺信息</h3>
		</div>
		<div class="panel-body">
			<div class="form-horizontal pad-top mar-top">
				<div class="form-group">
					<label class="col-sm-2 control-label">店铺名称</label>
					<div class="col-sm-6">
						<input id="shopname" value="<?php echo (isset($info['shopname']) && ($info['shopname'] !== '')?$info['shopname']:''); ?>" type="text" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">联系人</label>
					<div class="col-sm-6">
						<input id="contact" placeholder="请填写店铺联系人" value="<?php echo (isset($info['contact']) && ($info['contact'] !== '')?$info['contact']:''); ?>" type="text" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">联系电话</label>
					<div class="col-sm-6">
						<input id="tel" placeholder="主要用于客服" value="<?php echo (isset($info['tel']) && ($info['tel'] !== '')?$info['tel']:''); ?>" type="text" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">店铺地址</label>
					<div class="col-sm-6">
						<input id="address" placeholder="您店铺所在的详细地址" value="<?php echo (isset($info['address']) && ($info['address'] !== '')?$info['address']:''); ?>" type="text" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">店铺的LOGO</label>
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
						<i class="mar-all pad-hor bord-all ion-ios-cloud-upload-outline icon-3x" id="upheadimg"></i>
					</div>
				</div>
				
				<div class="text-center pad-all">
					<input type="hidden" id="id" value="<?php echo (isset($info['id']) && ($info['id'] !== '')?$info['id']:'0'); ?>" />
					<button class="btn btn-success btn-lg" onclick="addbase()">保存</button>
					<button class="btn btn-default btn-lg" onclick="cancel()">取消</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
function edit(){
	$('#editdiv').show();
	$('#infodiv').hide();
}
function cancel(){
	$('#editdiv').hide();
	$('#infodiv').show();
}
function addbase(){
	var shopname=$('#shopname').val();
	var headimg=$('#headimg').val();
	var contact=$('#contact').val();
	var tel=$('#tel').val();
	var address=$('#address').val();
	var id=$('#id').val();
	var url="<?php echo url('shop/baseinfo'); ?>";
	$.post(url,{id:id,shopname:shopname,contact:contact,tel:tel,address:address,headimg:headimg},function(data){
		if(data.status==1){
			layer.alert('保存成功',function(){
				location.href="<?php echo url('shop/index'); ?>";
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
		browse_button: ['upheadimg'],
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
						$('#headimgdiv').html('<img src="'+data.pic+'" class="img-responsive" style="max-width:100px"/>').css('display','block');
						$('#headimg').val(data.pic);
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
