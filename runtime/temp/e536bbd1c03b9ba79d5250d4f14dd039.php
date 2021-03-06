<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:85:"/home/wwwroot/www.yuanzigo.com/public/../application/admin1801/view/system/rules.html";i:1517976570;s:79:"/home/wwwroot/www.yuanzigo.com/public/../application/admin1801/view/layout.html";i:1517976565;s:86:"/home/wwwroot/www.yuanzigo.com/public/../application/admin1801/view/public/header.html";i:1517976569;s:86:"/home/wwwroot/www.yuanzigo.com/public/../application/admin1801/view/public/footer.html";i:1517976569;}*/ ?>
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
	<div class="col-xs-12 col-md-6 col-lg-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">用户组列表</h3>
			</div>
			<div class="panel-body">
				<table class="table table-hover table-vcenter">
					<thead>
						<tr>
							<th class="text-center">序</th>
							<th class="text-center">名称</th>
							<th class="text-center">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($rules) || $rules instanceof \think\Collection || $rules instanceof \think\Paginator): $i = 0; $__LIST__ = $rules;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?>
						<tr id="tr<?php echo $r['id']; ?>">
							<td class="text-center"><?php echo $key+1; ?></td>
							<td class="text-center"><?php echo $r['name']; ?></td>
							<td class="text-center">
								<a class="btn btn-warning" href="<?php echo url('system/rules',['id'=>$r['id']]); ?>">修改</a>
								<button class="btn btn-danger" onclick="del(<?php echo $r['id']; ?>)">删除</button>
							</td>
						</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title"><?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): ?>修改<?php else: ?>添加<?php endif; ?>用户组</h3>
			</div>
			<div class="panel-body">								
				<form class="form-horizontal form-padding">							
					<div class="form-group">
						<label class="col-md-3 control-label">用户组名</label>
						<div class="col-md-9">
							<input type="text" id="name" class="form-control" value="<?php echo (isset($info['name']) && ($info['name'] !== '')?$info['name']:''); ?>">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-7 col-lg-offset-3">
							<input type="hidden" id="id" value="<?php echo (isset($info['id']) && ($info['id'] !== '')?$info['id']:'0'); ?>"/>
							<button type="button" class="btn btn-primary" id="submit">提交</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>			

<script>
$('#submit').click(function(){
	var name=$('#name').val();
	var id=$('#id').val();
	$.post("<?php echo url('system/rules'); ?>",{id:id,name:name},function(data){
		if(data.status==1){
			layer.alert(data.msg,function(){
				location.href="<?php echo url('system/rules'); ?>"
			})
		}else{
			layer.msg(data.msg);
		}
	})
})
function del(id){
	$.post("<?php echo url('system/rulesdel'); ?>",{id:id},function(data){
		if(data.status==1){
			layer.alert(data.msg,function(){
				$('#tr'+id).remove();
				layer.closeAll();
			})
		}else{
			layer.msg(data.msg);
		}
	})
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
