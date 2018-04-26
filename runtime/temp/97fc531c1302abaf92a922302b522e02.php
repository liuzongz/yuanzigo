<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"/home/wwwroot/www.yuanzigo.com/public/../application/shop1801/view/orders/index.html";i:1517976525;s:78:"/home/wwwroot/www.yuanzigo.com/public/../application/shop1801/view/layout.html";i:1517976524;s:85:"/home/wwwroot/www.yuanzigo.com/public/../application/shop1801/view/public/header.html";i:1517976525;s:85:"/home/wwwroot/www.yuanzigo.com/public/../application/shop1801/view/public/footer.html";i:1517976525;}*/ ?>
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
	<div class="panel">
		<div class="panel-body ">
			<div class="pad-all bord-btm">
				<a href="<?php echo url('Orders/index',['s'=>1]); ?>" class="btn <?php if($status == '1'): ?>btn-primary<?php else: ?> btn-default<?php endif; ?>">已支付</a>
				<a href="<?php echo url('Orders/index',['s'=>9]); ?>" class="btn <?php if($status == '9'): ?>btn-primary<?php else: ?> btn-default<?php endif; ?>">待支付</a>
				<a href="<?php echo url('Orders/index',['s'=>2]); ?>" class="btn <?php if($status == '2'): ?>btn-primary<?php else: ?> btn-default<?php endif; ?>">已完成</a>
				<a href="<?php echo url('Orders/index',['s'=>10]); ?>" class="btn <?php if($status == '10'): ?>btn-primary<?php else: ?> btn-default<?php endif; ?>">已过期（下单但未支付）</a>
			</div>
			
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>购买人</th>
							<th>活动名称</th>
							<th>购买清单</th>
							<th>购买时间</th>
							<th>支付状态</th>
							<th class="text-center">操作</th>
						</tr>
					</thead>
					<tbody id="tablelists">
						<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
							<tr id="tr<?php echo $v['id']; ?>">
								<td><img src="<?php echo $v['userinfo']['member']['headimgurl']; ?>" class="img-circle img-sm" title="<?php echo $v['userinfo']['member']['nickname']; ?>"/></td>
								<td><?php echo $v['activity']['title']; ?></td>
								<td>
								<?php if(is_array($v['mylist']) || $v['mylist'] instanceof \think\Collection || $v['mylist'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['mylist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?>
									<?php echo $s['format']['name']; ?> <span class="pad-ver">x</span> <?php echo $s['num']; ?><br>
								<?php endforeach; endif; else: echo "" ;endif; ?>
								</td>
								<td><?php echo $v['update_time']; ?></td>
								<td><?php echo $v['statustxt']; ?></td>
								<td>
									<button class="btn btn-default" onclick="look(<?php echo $v['id']; ?>)">详情</button>
								</td>
							</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
			<div class="text-center">
			<?php echo $list->render(); ?>
			</div>
		</div>
	</div>
</div>
<script>
function look(id){
	var url="<?php echo url('orders/orderDetail'); ?>/id/"+id;
	layer.open({
	      type: 2,
	      title:false,
	      shadeClose: true,
	      shade: true,
	      maxmin: false, 
	      area: ['80%', '80%'],
	      content:url
	    });
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
