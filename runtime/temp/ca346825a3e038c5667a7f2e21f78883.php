<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:87:"/home/wwwroot/www.yuanzigo.com/public/../application/admin1801/view/leftmenu/index.html";i:1517976566;s:79:"/home/wwwroot/www.yuanzigo.com/public/../application/admin1801/view/layout.html";i:1517976565;s:86:"/home/wwwroot/www.yuanzigo.com/public/../application/admin1801/view/public/header.html";i:1517976569;s:86:"/home/wwwroot/www.yuanzigo.com/public/../application/admin1801/view/public/footer.html";i:1517976569;}*/ ?>
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
					
<style>
.add{
	color:#fff;
}
</style>
<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
		<div class="panel">
			<div class="panel-body">
				<div class="pad-btm form-inline">
					<div class="row">
						<div class="col-sm-3 table-toolbar-left">
							<a href="<?php echo url('leftmenu/add'); ?>" class="btn btn-purple add">
								<i class="ion-plus-circled icon-fw"></i>添加
							</a>											
						</div>
						<div class="col-sm-9 table-toolbar-right">
							<?php if(is_array($rules) || $rules instanceof \think\Collection || $rules instanceof \think\Paginator): $i = 0; $__LIST__ = $rules;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?>
							<a href="<?php echo url('leftmenu/index',['rule'=>$r['id']]); ?>" class="btn btn-default">
								<?php echo $r['name']; ?>
							</a>
							<?php endforeach; endif; else: echo "" ;endif; ?>
																
						</div>
					</div>
				</div>
				
				<div class="table-responsive">
					<table class="table ">
						<thead>
							<tr>
								<th>菜单名称</th>
								<th>权限</th>												
								<th class="text-center">操作</th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
								<tr id="tr<?php echo $v['id']; ?>" class="list-group-item-dark">
									<td><?php echo $v['name']; ?></td>
									<td><?php echo $v['ruletxt']; ?></td>												
									<td class="text-center">
										<a class="btn btn-warning" href="<?php echo url('leftmenu/add',['id'=>$v['id']]); ?>"><i class="ion-edit icon-fw"></i>修改</a>
										<button class="btn btn-danger del" data-id="<?php echo $v['id']; ?>"><i class="ion-close-round icon-fw"></i>删除</button>
									</td>
								</tr>
								<?php if(is_array($v['son']) || $v['son'] instanceof \think\Collection || $v['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($i % 2 );++$i;?>
									<tr id="tr<?php echo $vs['id']; ?>">
										<td style="padding-left:2em;">├─<?php echo $vs['name']; ?></td>
										<td><?php echo $v['ruletxt']; ?></td>												
										<td class="text-center">
											<a class="btn btn-warning" href="<?php echo url('leftmenu/add',['id'=>$vs['id']]); ?>"><i class="ion-edit icon-fw"></i>修改</a>
											<button class="btn btn-danger del" data-id="<?php echo $vs['id']; ?>"><i class="ion-close-round icon-fw"></i>删除</button>
										</td>
									</tr>
								<?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>										
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
	
<script>
	$('.del').click(function(){		
		var id=$(this).attr('data-id');
		$.post("<?php echo url('Leftmenu/del'); ?>",{id:id},function(data){
			if(data.status==1){
				layer.alert(data.msg,function(){
					$('#tr'+id).remove();
				});				
			}else{
				layer.msg(data.msg);
			}
		})
	})
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
