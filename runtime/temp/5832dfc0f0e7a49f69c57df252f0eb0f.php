<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:79:"/home/wwwroot/www.yuanzigo.com/public/../application/admin/view/data/daily.html";i:1524460663;s:75:"/home/wwwroot/www.yuanzigo.com/public/../application/admin/view/layout.html";i:1524460663;s:82:"/home/wwwroot/www.yuanzigo.com/public/../application/admin/view/public/header.html";i:1524460666;s:82:"/home/wwwroot/www.yuanzigo.com/public/../application/admin/view/public/footer.html";i:1524460665;}*/ ?>
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
					
<table class="table table-striped">
	<thead>
		 <tr>
			<th>时间</th>
			<th>游品资源</th>
			<th>在售活动</th>
			<th>资源客户</th>
			<th>社群客户</th>
			<th>销售额</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>今日</td>
			<td><?php echo $num['day1']['youpin']; ?></td>
			<td><?php echo $num['day1']['zaishou']; ?></td>
			<td><?php echo $num['day1']['ekehu']; ?></td>
			<td><?php echo $num['day1']['zkehu']; ?></td>
			<td><?php echo (isset($num['day1']['sale']) && ($num['day1']['sale'] !== '')?$num['day1']['sale']:0); ?></td>
		</tr>
		<tr>
			<td>昨日</td>
			<td><?php echo $num['day2']['youpin']; ?></td>
			<td><?php echo $num['day2']['zaishou']; ?></td>
			<td><?php echo $num['day2']['ekehu']; ?></td>
			<td><?php echo $num['day2']['zkehu']; ?></td>
			<td><?php echo (isset($num['day2']['sale']) && ($num['day2']['sale'] !== '')?$num['day2']['sale']:0); ?></td>
		</tr>
		<tr>
			<td>本周</td>
			<td><?php echo $num['day7']['youpin']; ?></td>
			<td><?php echo $num['day7']['zaishou']; ?></td>
			<td><?php echo $num['day7']['ekehu']; ?></td>
			<td><?php echo $num['day7']['zkehu']; ?></td>
			<td><?php echo (isset($num['day7']['sale']) && ($num['day7']['sale'] !== '')?$num['day7']['sale']:0); ?></td>
		</tr>
		<tr>
			<td>上周</td>
			<td><?php echo $num['day14']['youpin']; ?></td>
			<td><?php echo $num['day14']['zaishou']; ?></td>
			<td><?php echo $num['day14']['ekehu']; ?></td>
			<td><?php echo $num['day14']['zkehu']; ?></td>
			<td><?php echo (isset($num['day14']['sale']) && ($num['day14']['sale'] !== '')?$num['day14']['sale']:0); ?></td>
		</tr>
		<tr>
			<td>本月</td>
			<td><?php echo $num['day30']['youpin']; ?></td>
			<td><?php echo $num['day30']['zaishou']; ?></td>
			<td><?php echo $num['day30']['ekehu']; ?></td>
			<td><?php echo $num['day30']['zkehu']; ?></td>
			<td><?php echo (isset($num['day30']['sale']) && ($num['day30']['sale'] !== '')?$num['day30']['sale']:0); ?></td>
		</tr>
		<tr>
			<td>上月</td>
			<td><?php echo $num['day60']['youpin']; ?></td>
			<td><?php echo $num['day60']['zaishou']; ?></td>
			<td><?php echo $num['day60']['ekehu']; ?></td>
			<td><?php echo $num['day60']['zkehu']; ?></td>
			<td><?php echo (isset($num['day60']['sale']) && ($num['day60']['sale'] !== '')?$num['day60']['sale']:0); ?></td>
		</tr>
		<tr>
			<td>总计</td>
			<td><?php echo $num['all']['youpin']; ?></td>
			<td><?php echo $num['all']['zaishou']; ?></td>
			<td><?php echo $num['all']['ekehu']; ?></td>
			<td><?php echo $num['all']['zkehu']; ?></td>
			<td><?php echo (isset($num['all']['sale']) && ($num['all']['sale'] !== '')?$num['all']['sale']:0); ?></td>
		</tr>
	</tbody>
</table>

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
