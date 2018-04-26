<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"/home/wwwroot/www.yuanzigo.com/public/../application/admin1801/view/system/user.html";i:1517976570;s:79:"/home/wwwroot/www.yuanzigo.com/public/../application/admin1801/view/layout.html";i:1517976565;s:86:"/home/wwwroot/www.yuanzigo.com/public/../application/admin1801/view/public/header.html";i:1517976569;s:86:"/home/wwwroot/www.yuanzigo.com/public/../application/admin1801/view/public/footer.html";i:1517976569;}*/ ?>
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
					
<div class="panel" id="listdiv" <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): ?>style="display:none"<?php endif; ?>>
	<div class="panel-body">
		<div class="pad-btm form-inline">
			<div class="row">
				<div class="col-sm-6 table-toolbar-left">
					<?php if(is_array($rule) || $rule instanceof \think\Collection || $rule instanceof \think\Paginator): $i = 0; $__LIST__ = $rule;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>	
						<a href="<?php echo url('system/user',['r'=>$v['id']]); ?>" class="btn <?php if($rl == $v['id']): ?>btn-primary<?php else: ?>btn-default<?php endif; ?>"><?php echo $v['name']; ?></a>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<div class="col-sm-6 table-toolbar-right">
					<button class="btn btn-warning" onclick="add()">
						<i class="ion-plus"></i> 添加用户
					</button>
				</div>
			</div>
		</div>
		
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
					<th>店铺ID</th>
						<th>昵称</th>
						<th>推广二维码</th>
						<th>用户组</th>
						<th>注册时间</th>
						<th>管理操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
						<tr>
							<td><?php echo $v['rule_id']; ?></td>
							<td><?php if($v['rule'] == '3'): ?><?php echo $v['shop']['shopname']; else: ?><?php echo $v['name']; endif; ?></td>
							<td><?php if($v['rule'] == '3'): ?> <img src="<?php echo $v['shop']['qr']; ?>" style="max-width:2em" onclick="seeImg('<?php echo $v['shop']['qr']; ?>')"/><?php endif; ?></td>
							<td><?php echo $v['ruletxt']; ?></td>
							<td><?php echo $v['create_time']; ?></td>
							<td><a href="<?php echo url('system/user',['id'=>$v['id']]); ?>" class="btn btn-warning">修改</a></td>
						</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
			
			<div class="text-center">
				<?php echo $list->render(); ?>
			</div>			
		</div>		
	</div>
</div>

<div class="row" id="adddiv" <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>>
	<div class="col-xs-12 col-md-8 col-lg-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">用户基本资料</h3>
			</div>
			<div class="panel-body">								
				<div class="form-horizontal form-padding">
					<div class="form-group">
						<label class="col-md-3 control-label">所属分组</label>
						<div class="col-md-9">
							<select id="rule" class="form-control select2-hidden-accessible" >
								<option value="0">请选择</option>
									<?php if(is_array($rule) || $rule instanceof \think\Collection || $rule instanceof \think\Paginator): $i = 0; $__LIST__ = $rule;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
										<option value="<?php echo $v['id']; ?>"  <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($v['id'] == $info['rule']): ?>selected="selected"<?php endif; endif; ?>><?php echo $v['name']; ?></option>
									<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label" for="demo-text-input">登录名</label>
						<div class="col-md-9">
							<input type="text" id="name" class="form-control" placeholder="登录名" value="<?php echo (isset($info['name']) && ($info['name'] !== '')?$info['name']:''); ?>">
							<small class="help-block"></small>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="demo-text-input">登陆密码</label>
						<div class="col-md-9">
							<input type="text" id="password" class="form-control" value="">
							<small class="help-block">默认密码为888888</small>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="demo-text-input">店铺名称</label>
						<div class="col-md-9">
							<input type="text" id="shopname" class="form-control" placeholder="比如：周游天下" value="<?php echo (isset($info['shopname']) && ($info['shopname'] !== '')?$info['shopname']:''); ?>">
							<small class="help-block"></small>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-7 col-lg-offset-3">
							<input type="hidden" id="id" value="<?php echo (isset($info['uid']) && ($info['uid'] !== '')?$info['uid']:'0'); ?>"/>
							<button type="button" class="btn btn-primary" id="submit">提交</button>
							<button class="btn btn-default" onclick="cancel()">取消</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
function seeImg(img){
	layer.open({
		  type: 1,
		  shade: [0.9, '#000000'],
		  closeBtn: 0, //不显示关闭按钮
		  anim: 2,
		  shadeClose: true, //开启遮罩关闭
		  content: '<img src="'+img+'">'
		});
}

	$('#submit').click(function(){
		var url="<?php echo url('system/useradd'); ?>";
		$.post(url,{
			name:$('#name').val(),
			password:$('#password').val(),
			shopname:$('#shopname').val(),
			rule:$('#rule').val(),
			id:$('#id').val()
		},function(data){
			layer.alert(data.msg,function(){
				location.href="<?php echo url('system/user'); ?>"
			});
		})
	})
	function add(){
		$('#listdiv').hide();
		$('#adddiv').show();
	}
	function cancel(){
		$('#listdiv').show();
		$('#adddiv').hide();
	}
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
