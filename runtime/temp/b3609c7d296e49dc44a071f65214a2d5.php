<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:85:"/home/wwwroot/www.yuanzigo.com/public/../application/admin1801/view/leftmenu/add.html";i:1517976566;s:79:"/home/wwwroot/www.yuanzigo.com/public/../application/admin1801/view/layout.html";i:1517976565;s:86:"/home/wwwroot/www.yuanzigo.com/public/../application/admin1801/view/public/header.html";i:1517976569;s:86:"/home/wwwroot/www.yuanzigo.com/public/../application/admin1801/view/public/footer.html";i:1517976569;}*/ ?>
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
					<div class="col-xs-6">
						<div class="panel">
							<!--Data Table-->
							<div class="panel-body">								
								<div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">添加菜单</h3>
					            </div>
					            <form class="panel-body form-horizontal form-padding">
					                <!--多选项-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label">上级菜单</label>
					                    <div class="col-md-9">
					                    <select id="fid" class="form-control select2-hidden-accessible" >
					                                    <option value="0">一级菜单</option>
					                                    <?php if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
					                                    <option value="<?php echo $v['id']; ?>"  <?php if(!(empty($menu) || (($menu instanceof \think\Collection || $menu instanceof \think\Paginator ) && $menu->isEmpty()))): if($menu['fid'] == $v['id']): ?>selected="selected"<?php endif; endif; ?>><?php echo $v['name']; ?></option>
					                                    <?php endforeach; endif; else: echo "" ;endif; ?>
					                            </select>
					                    </div>
					                </div>
					
					                <!--Text Input-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label" for="demo-text-input">菜单名称</label>
					                    <div class="col-md-9">
					                        <input type="text" id="name" class="form-control" placeholder="菜单名称" value="<?php echo (isset($menu['name']) && ($menu['name'] !== '')?$menu['name']:''); ?>">
					                        <small class="help-block">尽量简洁</small>
					                    </div>
					                </div>
					                <!--Text Input-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label" for="demo-text-input">菜单图标</label>
					                    <div class="col-md-9">
					                        <input type="text" id="icon" class="form-control" placeholder="菜单左侧图标" value="<?php echo (isset($menu['icon']) && ($menu['icon'] !== '')?$menu['icon']:''); ?>">
					                        <small class="help-block">显示在菜单左侧的图标</small>
					                    </div>
					                </div>
					             
					                <div class="form-group">
					                    <label class="col-md-3 control-label" for="demo-text-input">所属模块</label>
					                    <div class="col-md-9">
					                        <input type="text" id="model" class="form-control" placeholder="菜单的模块" value="<?php echo (isset($menu['model']) && ($menu['model'] !== '')?$menu['model']:''); ?>">
					                        <small class="help-block"></small>
					                    </div>
					                </div>
					                
					                <div class="form-group">
					                    <label class="col-md-3 control-label" for="demo-text-input">所属行为</label>
					                    <div class="col-md-9">
					                        <input type="text" id="action" class="form-control" placeholder="菜单的模块" value="<?php echo (isset($menu['action']) && ($menu['action'] !== '')?$menu['action']:''); ?>">
					                        <small class="help-block"></small>
					                    </div>
					                </div>
					                
					                <div class="form-group">
					                    <label class="col-md-3 control-label" for="demo-text-input">菜单链接</label>
					                    <div class="col-md-9">
					                        <input type="text" id="url" class="form-control" placeholder="菜单的链接" value="<?php echo (isset($menu['url']) && ($menu['url'] !== '')?$menu['url']:''); ?>">
					                        <small class="help-block">一级菜单可不填，二级菜单格式：../一级/二级</small>
					                    </div>
					                </div>
					                <div class="form-group">
					                    <label class="col-md-3 control-label" for="demo-text-input">排序</label>
					                    <div class="col-md-9">
					                        <input type="text" id="order" class="form-control" placeholder="菜单显示的顺序，数字小的排在前面" value="<?php echo (isset($menu['order']) && ($menu['order'] !== '')?$menu['order']:'9999'); ?>">
					                        <small class="help-block">一级菜单可不填，二级菜单格式：../一级/二级</small>
					                    </div>
					                </div>
					                 <!--多选项-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label">菜单权限</label>
					                    <div class="col-md-9">
					                    	<select id="rule" class="form-control select2-hidden-accessible">
					                        	<?php if(is_array($rules) || $rules instanceof \think\Collection || $rules instanceof \think\Paginator): $i = 0; $__LIST__ = $rules;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
					                        	<option value="<?php echo $v['id']; ?>" <?php if(!(empty($menu) || (($menu instanceof \think\Collection || $menu instanceof \think\Paginator ) && $menu->isEmpty()))): if($menu['rule'] == $v['id']): ?>selected="selected"<?php endif; endif; ?>><?php echo $v['name']; ?></option>
					                        	<?php endforeach; endif; else: echo "" ;endif; ?>
					                                    
					                            </select>
					                    </div>
					                </div>
					
					                <div class="form-group">
					                                <div class="col-lg-7 col-lg-offset-3">
					                                	<input type="hidden" id="id" value="<?php echo (isset($menu['id']) && ($menu['id'] !== '')?$menu['id']:'0'); ?>"/>
					                                    <button type="button" class="btn btn-primary" id="submit">提交</button>
					                                </div>
					                            </div>
					            </form>
					            <!--===================================================-->
					            <!-- END BASIC FORM ELEMENTS -->
					
					
					        </div>
							</div>
							<!--End Data Table-->
						</div>
					</div>
					
					<div class="col-xs-6">
					<div class="panel" style="overflow-y:scroll;height:600px;">
					
					    <!--Panel heading-->
					    <div class="panel-heading">
					        <div class="panel-control pull-left">
					            <ul class="nav nav-tabs">
					                <li class="active"><a data-toggle="tab" href="#demo-icon-box-1" aria-expanded="true">Default Icons</a></li>
					                <li><a data-toggle="tab" href="#demo-icon-box-2" aria-expanded="false">iOS 7-style icons</a></li>
					                <li><a data-toggle="tab" href="#demo-icon-box-3" aria-expanded="false">Brand icons</a></li>
					            </ul>
					        </div>
					        <h3 class="panel-title">&nbsp;</h3>
					    </div>
					
					    <!--Panel body-->
					    <style>
					    .demo-icon{							
					    	font-size:1.5em;
					    }
					    .demo-icon i{
							padding:1em;
					    }
					    </style>
					    
					    <div class="panel-body">
					        <div class="tab-content">
					            <div id="demo-icon-box-1" class="tab-pane fade active in">
					                <div class="clearfix demo-icon-list">
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ionic"></i><span>ion-ionic</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-up-a"></i><span>ion-arrow-up-a</span></div>
					                    </div>
					                    <div class="col-sm-3 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-right-a"></i><span>ion-arrow-right-a</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-down-a"></i><span>ion-arrow-down-a</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-left-a"></i><span>ion-arrow-left-a</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-up-b"></i><span>ion-arrow-up-b</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-right-b"></i><span>ion-arrow-right-b</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-down-b"></i><span>ion-arrow-down-b</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-left-b"></i><span>ion-arrow-left-b</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-up-c"></i><span>ion-arrow-up-c</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-right-c"></i><span>ion-arrow-right-c</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-down-c"></i><span>ion-arrow-down-c</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-left-c"></i><span>ion-arrow-left-c</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-return-right"></i><span>ion-arrow-return-right</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-return-left"></i><span>ion-arrow-return-left</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-swap"></i><span>ion-arrow-swap</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-shrink"></i><span>ion-arrow-shrink</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-expand"></i><span>ion-arrow-expand</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-move"></i><span>ion-arrow-move</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-resize"></i><span>ion-arrow-resize</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-chevron-up"></i><span>ion-chevron-up</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-chevron-right"></i><span>ion-chevron-right</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-chevron-down"></i><span>ion-chevron-down</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-chevron-left"></i><span>ion-chevron-left</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-navicon-round"></i><span>ion-navicon-round</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-navicon"></i><span>ion-navicon</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-drag"></i><span>ion-drag</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-log-in"></i><span>ion-log-in</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-log-out"></i><span>ion-log-out</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-checkmark-round"></i><span>ion-checkmark-round</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-checkmark"></i><span>ion-checkmark</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-checkmark-circled"></i><span>ion-checkmark-circled</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-close-round"></i><span>ion-close-round</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-close"></i><span>ion-close</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-close-circled"></i><span>ion-close-circled</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-plus-round"></i><span>ion-plus-round</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-plus"></i><span>ion-plus</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-plus-circled"></i><span>ion-plus-circled</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-minus-round"></i><span>ion-minus-round</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-minus"></i><span>ion-minus</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-minus-circled"></i><span>ion-minus-circled</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-information"></i><span>ion-information</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-information-circled"></i><span>ion-information-circled</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-help"></i><span>ion-help</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-help-circled"></i><span>ion-help-circled</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-backspace-outline"></i><span>ion-backspace-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-backspace"></i><span>ion-backspace</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-help-buoy"></i><span>ion-help-buoy</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-asterisk"></i><span>ion-asterisk</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-alert"></i><span>ion-alert</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-alert-circled"></i><span>ion-alert-circled</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-refresh"></i><span>ion-refresh</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-loop"></i><span>ion-loop</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-shuffle"></i><span>ion-shuffle</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-home"></i><span>ion-home</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-search"></i><span>ion-search</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-flag"></i><span>ion-flag</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-star"></i><span>ion-star</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-heart"></i><span>ion-heart</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-heart-broken"></i><span>ion-heart-broken</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-gear-a"></i><span>ion-gear-a</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-gear-b"></i><span>ion-gear-b</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-toggle-filled"></i><span>ion-toggle-filled</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-toggle"></i><span>ion-toggle</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-settings"></i><span>ion-settings</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-wrench"></i><span>ion-wrench</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-hammer"></i><span>ion-hammer</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-edit"></i><span>ion-edit</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-trash-a"></i><span>ion-trash-a</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-trash-b"></i><span>ion-trash-b</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-document"></i><span>ion-document</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-document-text"></i><span>ion-document-text</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-clipboard"></i><span>ion-clipboard</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-scissors"></i><span>ion-scissors</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-funnel"></i><span>ion-funnel</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-bookmark"></i><span>ion-bookmark</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-email"></i><span>ion-email</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-email-unread"></i><span>ion-email-unread</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-folder"></i><span>ion-folder</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-filing"></i><span>ion-filing</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-archive"></i><span>ion-archive</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-reply"></i><span>ion-reply</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-reply-all"></i><span>ion-reply-all</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-forward"></i><span>ion-forward</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-share"></i><span>ion-share</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-paper-airplane"></i><span>ion-paper-airplane</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-link"></i><span>ion-link</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-paperclip"></i><span>ion-paperclip</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-compose"></i><span>ion-compose</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-briefcase"></i><span>ion-briefcase</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-medkit"></i><span>ion-medkit</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-at"></i><span>ion-at</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-pound"></i><span>ion-pound</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-quote"></i><span>ion-quote</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-cloud"></i><span>ion-cloud</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-upload"></i><span>ion-upload</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-more"></i><span>ion-more</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-grid"></i><span>ion-grid</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-calendar"></i><span>ion-calendar</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-clock"></i><span>ion-clock</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-compass"></i><span>ion-compass</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-pinpoint"></i><span>ion-pinpoint</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-pin"></i><span>ion-pin</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-navigate"></i><span>ion-navigate</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-location"></i><span>ion-location</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-map"></i><span>ion-map</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-lock-combination"></i><span>ion-lock-combination</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-locked"></i><span>ion-locked</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-unlocked"></i><span>ion-unlocked</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-key"></i><span>ion-key</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-graph-up-right"></i><span>ion-arrow-graph-up-right</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-graph-down-right"></i><span>ion-arrow-graph-down-right</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-graph-up-left"></i><span>ion-arrow-graph-up-left</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-arrow-graph-down-left"></i><span>ion-arrow-graph-down-left</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-stats-bars"></i><span>ion-stats-bars</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-connection-bars"></i><span>ion-connection-bars</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-pie-graph"></i><span>ion-pie-graph</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-chatbubble"></i><span>ion-chatbubble</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-chatbubble-working"></i><span>ion-chatbubble-working</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-chatbubbles"></i><span>ion-chatbubbles</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-chatbox"></i><span>ion-chatbox</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-chatbox-working"></i><span>ion-chatbox-working</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-chatboxes"></i><span>ion-chatboxes</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-person"></i><span>ion-person</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-person-add"></i><span>ion-person-add</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-person-stalker"></i><span>ion-person-stalker</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-woman"></i><span>ion-woman</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-man"></i><span>ion-man</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-female"></i><span>ion-female</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-male"></i><span>ion-male</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-transgender"></i><span>ion-transgender</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-fork"></i><span>ion-fork</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-knife"></i><span>ion-knife</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-spoon"></i><span>ion-spoon</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-soup-can-outline"></i><span>ion-soup-can-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-soup-can"></i><span>ion-soup-can</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-beer"></i><span>ion-beer</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-wineglass"></i><span>ion-wineglass</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-coffee"></i><span>ion-coffee</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-icecream"></i><span>ion-icecream</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-pizza"></i><span>ion-pizza</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-power"></i><span>ion-power</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-mouse"></i><span>ion-mouse</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-battery-full"></i><span>ion-battery-full</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-battery-half"></i><span>ion-battery-half</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-battery-low"></i><span>ion-battery-low</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-battery-empty"></i><span>ion-battery-empty</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-battery-charging"></i><span>ion-battery-charging</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-wifi"></i><span>ion-wifi</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-bluetooth"></i><span>ion-bluetooth</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-calculator"></i><span>ion-calculator</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-camera"></i><span>ion-camera</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-eye"></i><span>ion-eye</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-eye-disabled"></i><span>ion-eye-disabled</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-flash"></i><span>ion-flash</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-flash-off"></i><span>ion-flash-off</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-qr-scanner"></i><span>ion-qr-scanner</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-image"></i><span>ion-image</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-images"></i><span>ion-images</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-wand"></i><span>ion-wand</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-contrast"></i><span>ion-contrast</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-aperture"></i><span>ion-aperture</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-crop"></i><span>ion-crop</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-easel"></i><span>ion-easel</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-paintbrush"></i><span>ion-paintbrush</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-paintbucket"></i><span>ion-paintbucket</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-monitor"></i><span>ion-monitor</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-laptop"></i><span>ion-laptop</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ipad"></i><span>ion-ipad</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-iphone"></i><span>ion-iphone</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ipod"></i><span>ion-ipod</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-printer"></i><span>ion-printer</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-usb"></i><span>ion-usb</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-outlet"></i><span>ion-outlet</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-bug"></i><span>ion-bug</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-code"></i><span>ion-code</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-code-working"></i><span>ion-code-working</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-code-download"></i><span>ion-code-download</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-fork-repo"></i><span>ion-fork-repo</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-network"></i><span>ion-network</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-pull-request"></i><span>ion-pull-request</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-merge"></i><span>ion-merge</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-xbox"></i><span>ion-xbox</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-playstation"></i><span>ion-playstation</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-steam"></i><span>ion-steam</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-closed-captioning"></i><span>ion-closed-captioning</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-videocamera"></i><span>ion-videocamera</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-film-marker"></i><span>ion-film-marker</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-disc"></i><span>ion-disc</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-headphone"></i><span>ion-headphone</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-music-note"></i><span>ion-music-note</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-radio-waves"></i><span>ion-radio-waves</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-speakerphone"></i><span>ion-speakerphone</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-mic-a"></i><span>ion-mic-a</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-mic-b"></i><span>ion-mic-b</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-mic-c"></i><span>ion-mic-c</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-volume-high"></i><span>ion-volume-high</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-volume-medium"></i><span>ion-volume-medium</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-volume-low"></i><span>ion-volume-low</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-volume-mute"></i><span>ion-volume-mute</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-levels"></i><span>ion-levels</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-play"></i><span>ion-play</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-pause"></i><span>ion-pause</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-stop"></i><span>ion-stop</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-record"></i><span>ion-record</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-skip-forward"></i><span>ion-skip-forward</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-skip-backward"></i><span>ion-skip-backward</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-eject"></i><span>ion-eject</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-bag"></i><span>ion-bag</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-card"></i><span>ion-card</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-cash"></i><span>ion-cash</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-pricetag"></i><span>ion-pricetag</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-pricetags"></i><span>ion-pricetags</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-thumbsup"></i><span>ion-thumbsup</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-thumbsdown"></i><span>ion-thumbsdown</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-happy-outline"></i><span>ion-happy-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-happy"></i><span>ion-happy</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-sad-outline"></i><span>ion-sad-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-sad"></i><span>ion-sad</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-bowtie"></i><span>ion-bowtie</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-tshirt-outline"></i><span>ion-tshirt-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-tshirt"></i><span>ion-tshirt</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-trophy"></i><span>ion-trophy</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-podium"></i><span>ion-podium</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ribbon-a"></i><span>ion-ribbon-a</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ribbon-b"></i><span>ion-ribbon-b</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-university"></i><span>ion-university</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-magnet"></i><span>ion-magnet</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-beaker"></i><span>ion-beaker</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-erlenmeyer-flask"></i><span>ion-erlenmeyer-flask</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-egg"></i><span>ion-egg</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-earth"></i><span>ion-earth</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-planet"></i><span>ion-planet</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-lightbulb"></i><span>ion-lightbulb</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-cube"></i><span>ion-cube</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-leaf"></i><span>ion-leaf</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-waterdrop"></i><span>ion-waterdrop</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-flame"></i><span>ion-flame</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-fireball"></i><span>ion-fireball</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-bonfire"></i><span>ion-bonfire</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-umbrella"></i><span>ion-umbrella</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-nuclear"></i><span>ion-nuclear</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-no-smoking"></i><span>ion-no-smoking</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-thermometer"></i><span>ion-thermometer</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-speedometer"></i><span>ion-speedometer</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-model-s"></i><span>ion-model-s</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-plane"></i><span>ion-plane</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-jet"></i><span>ion-jet</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-load-a"></i><span>ion-load-a</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-load-b"></i><span>ion-load-b</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-load-c"></i><span>ion-load-c</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-load-d"></i><span>ion-load-d</span></div>
					                    </div>
					                </div>
					            </div>
					
					
					            <div id="demo-icon-box-2" class="tab-pane fade">
					                <div class="clearfix demo-icon-list">
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-ionic-outline"></i><span>ion-ios-ionic-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-arrow-back"></i><span>ion-ios-arrow-back</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-arrow-forward"></i><span>ion-ios-arrow-forward</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-arrow-up"></i><span>ion-ios-arrow-up</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-arrow-right"></i><span>ion-ios-arrow-right</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-arrow-down"></i><span>ion-ios-arrow-down</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-arrow-left"></i><span>ion-ios-arrow-left</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-arrow-thin-up"></i><span>ion-ios-arrow-thin-up</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-arrow-thin-right"></i><span>ion-ios-arrow-thin-right</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-arrow-thin-down"></i><span>ion-ios-arrow-thin-down</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-arrow-thin-left"></i><span>ion-ios-arrow-thin-left</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-circle-filled"></i><span>ion-ios-circle-filled</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-circle-outline"></i><span>ion-ios-circle-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-checkmark-empty"></i><span>ion-ios-checkmark-empty</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-checkmark-outline"></i><span>ion-ios-checkmark-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-checkmark"></i><span>ion-ios-checkmark</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-plus-empty"></i><span>ion-ios-plus-empty</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-plus-outline"></i><span>ion-ios-plus-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-plus"></i><span>ion-ios-plus</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-close-empty"></i><span>ion-ios-close-empty</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-close-outline"></i><span>ion-ios-close-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-close"></i><span>ion-ios-close</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-minus-empty"></i><span>ion-ios-minus-empty</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-minus-outline"></i><span>ion-ios-minus-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-minus"></i><span>ion-ios-minus</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-information-empty"></i><span>ion-ios-information-empty</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-information-outline"></i><span>ion-ios-information-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-information"></i><span>ion-ios-information</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-help-empty"></i><span>ion-ios-help-empty</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-help-outline"></i><span>ion-ios-help-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-help"></i><span>ion-ios-help</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-search"></i><span>ion-ios-search</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-search-strong"></i><span>ion-ios-search-strong</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-star"></i><span>ion-ios-star</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-star-half"></i><span>ion-ios-star-half</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-star-outline"></i><span>ion-ios-star-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-heart"></i><span>ion-ios-heart</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-heart-outline"></i><span>ion-ios-heart-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-more"></i><span>ion-ios-more</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-more-outline"></i><span>ion-ios-more-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-home"></i><span>ion-ios-home</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-home-outline"></i><span>ion-ios-home-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-cloud"></i><span>ion-ios-cloud</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-cloud-outline"></i><span>ion-ios-cloud-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-cloud-upload"></i><span>ion-ios-cloud-upload</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-cloud-upload-outline"></i><span>ion-ios-cloud-upload-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-cloud-download"></i><span>ion-ios-cloud-download</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-cloud-download-outline"></i><span>ion-ios-cloud-download-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-upload"></i><span>ion-ios-upload</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-upload-outline"></i><span>ion-ios-upload-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-download"></i><span>ion-ios-download</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-download-outline"></i><span>ion-ios-download-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-refresh"></i><span>ion-ios-refresh</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-refresh-outline"></i><span>ion-ios-refresh-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-refresh-empty"></i><span>ion-ios-refresh-empty</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-reload"></i><span>ion-ios-reload</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-loop-strong"></i><span>ion-ios-loop-strong</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-loop"></i><span>ion-ios-loop</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-bookmarks"></i><span>ion-ios-bookmarks</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-bookmarks-outline"></i><span>ion-ios-bookmarks-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-book"></i><span>ion-ios-book</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-book-outline"></i><span>ion-ios-book-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-flag"></i><span>ion-ios-flag</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-flag-outline"></i><span>ion-ios-flag-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-glasses"></i><span>ion-ios-glasses</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-glasses-outline"></i><span>ion-ios-glasses-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-browsers"></i><span>ion-ios-browsers</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-browsers-outline"></i><span>ion-ios-browsers-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-at"></i><span>ion-ios-at</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-at-outline"></i><span>ion-ios-at-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-pricetag"></i><span>ion-ios-pricetag</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-pricetag-outline"></i><span>ion-ios-pricetag-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-pricetags"></i><span>ion-ios-pricetags</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-pricetags-outline"></i><span>ion-ios-pricetags-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-cart"></i><span>ion-ios-cart</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-cart-outline"></i><span>ion-ios-cart-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-chatboxes"></i><span>ion-ios-chatboxes</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-chatboxes-outline"></i><span>ion-ios-chatboxes-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-chatbubble"></i><span>ion-ios-chatbubble</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-chatbubble-outline"></i><span>ion-ios-chatbubble-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-cog"></i><span>ion-ios-cog</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-cog-outline"></i><span>ion-ios-cog-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-gear"></i><span>ion-ios-gear</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-gear-outline"></i><span>ion-ios-gear-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-settings"></i><span>ion-ios-settings</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-settings-strong"></i><span>ion-ios-settings-strong</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-toggle"></i><span>ion-ios-toggle</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-toggle-outline"></i><span>ion-ios-toggle-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-analytics"></i><span>ion-ios-analytics</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-analytics-outline"></i><span>ion-ios-analytics-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-pie"></i><span>ion-ios-pie</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-pie-outline"></i><span>ion-ios-pie-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-pulse"></i><span>ion-ios-pulse</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-pulse-strong"></i><span>ion-ios-pulse-strong</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-filing"></i><span>ion-ios-filing</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-filing-outline"></i><span>ion-ios-filing-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-box"></i><span>ion-ios-box</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-box-outline"></i><span>ion-ios-box-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-compose"></i><span>ion-ios-compose</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-compose-outline"></i><span>ion-ios-compose-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-trash"></i><span>ion-ios-trash</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-trash-outline"></i><span>ion-ios-trash-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-copy"></i><span>ion-ios-copy</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-copy-outline"></i><span>ion-ios-copy-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-email"></i><span>ion-ios-email</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-email-outline"></i><span>ion-ios-email-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-undo"></i><span>ion-ios-undo</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-undo-outline"></i><span>ion-ios-undo-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-redo"></i><span>ion-ios-redo</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-redo-outline"></i><span>ion-ios-redo-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-paperplane"></i><span>ion-ios-paperplane</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-paperplane-outline"></i><span>ion-ios-paperplane-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-folder"></i><span>ion-ios-folder</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-folder-outline"></i><span>ion-ios-folder-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-paper"></i><span>ion-ios-paper</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-paper-outline"></i><span>ion-ios-paper-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-list"></i><span>ion-ios-list</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-list-outline"></i><span>ion-ios-list-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-world"></i><span>ion-ios-world</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-world-outline"></i><span>ion-ios-world-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-alarm"></i><span>ion-ios-alarm</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-alarm-outline"></i><span>ion-ios-alarm-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-speedometer"></i><span>ion-ios-speedometer</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-speedometer-outline"></i><span>ion-ios-speedometer-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-stopwatch"></i><span>ion-ios-stopwatch</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-stopwatch-outline"></i><span>ion-ios-stopwatch-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-timer"></i><span>ion-ios-timer</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-timer-outline"></i><span>ion-ios-timer-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-clock"></i><span>ion-ios-clock</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-clock-outline"></i><span>ion-ios-clock-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-time"></i><span>ion-ios-time</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-time-outline"></i><span>ion-ios-time-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-calendar"></i><span>ion-ios-calendar</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-calendar-outline"></i><span>ion-ios-calendar-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-photos"></i><span>ion-ios-photos</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-photos-outline"></i><span>ion-ios-photos-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-albums"></i><span>ion-ios-albums</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-albums-outline"></i><span>ion-ios-albums-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-camera"></i><span>ion-ios-camera</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-camera-outline"></i><span>ion-ios-camera-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-reverse-camera"></i><span>ion-ios-reverse-camera</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-reverse-camera-outline"></i><span>ion-ios-reverse-camera-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-eye"></i><span>ion-ios-eye</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-eye-outline"></i><span>ion-ios-eye-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-bolt"></i><span>ion-ios-bolt</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-bolt-outline"></i><span>ion-ios-bolt-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-color-wand"></i><span>ion-ios-color-wand</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-color-wand-outline"></i><span>ion-ios-color-wand-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-color-filter"></i><span>ion-ios-color-filter</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-color-filter-outline"></i><span>ion-ios-color-filter-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-grid-view"></i><span>ion-ios-grid-view</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-grid-view-outline"></i><span>ion-ios-grid-view-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-crop-strong"></i><span>ion-ios-crop-strong</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-crop"></i><span>ion-ios-crop</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-barcode"></i><span>ion-ios-barcode</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-barcode-outline"></i><span>ion-ios-barcode-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-briefcase"></i><span>ion-ios-briefcase</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-briefcase-outline"></i><span>ion-ios-briefcase-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-medkit"></i><span>ion-ios-medkit</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-medkit-outline"></i><span>ion-ios-medkit-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-medical"></i><span>ion-ios-medical</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-medical-outline"></i><span>ion-ios-medical-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-infinite"></i><span>ion-ios-infinite</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-infinite-outline"></i><span>ion-ios-infinite-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-calculator"></i><span>ion-ios-calculator</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-calculator-outline"></i><span>ion-ios-calculator-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-keypad"></i><span>ion-ios-keypad</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-keypad-outline"></i><span>ion-ios-keypad-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-telephone"></i><span>ion-ios-telephone</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-telephone-outline"></i><span>ion-ios-telephone-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-drag"></i><span>ion-ios-drag</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-location"></i><span>ion-ios-location</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-location-outline"></i><span>ion-ios-location-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-navigate"></i><span>ion-ios-navigate</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-navigate-outline"></i><span>ion-ios-navigate-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-locked"></i><span>ion-ios-locked</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-locked-outline"></i><span>ion-ios-locked-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-unlocked"></i><span>ion-ios-unlocked</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-unlocked-outline"></i><span>ion-ios-unlocked-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-monitor"></i><span>ion-ios-monitor</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-monitor-outline"></i><span>ion-ios-monitor-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-printer"></i><span>ion-ios-printer</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-printer-outline"></i><span>ion-ios-printer-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-game-controller-a"></i><span>ion-ios-game-controller-a</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-game-controller-a-outline"></i><span>ion-ios-game-controller-a-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-game-controller-b"></i><span>ion-ios-game-controller-b</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-game-controller-b-outline"></i><span>ion-ios-game-controller-b-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-americanfootball"></i><span>ion-ios-americanfootball</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-americanfootball-outline"></i><span>ion-ios-americanfootball-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-baseball"></i><span>ion-ios-baseball</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-baseball-outline"></i><span>ion-ios-baseball-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-basketball"></i><span>ion-ios-basketball</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-basketball-outline"></i><span>ion-ios-basketball-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-tennisball"></i><span>ion-ios-tennisball</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-tennisball-outline"></i><span>ion-ios-tennisball-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-football"></i><span>ion-ios-football</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-football-outline"></i><span>ion-ios-football-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-body"></i><span>ion-ios-body</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-body-outline"></i><span>ion-ios-body-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-person"></i><span>ion-ios-person</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-person-outline"></i><span>ion-ios-person-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-personadd"></i><span>ion-ios-personadd</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-personadd-outline"></i><span>ion-ios-personadd-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-people"></i><span>ion-ios-people</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-people-outline"></i><span>ion-ios-people-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-musical-notes"></i><span>ion-ios-musical-notes</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-musical-note"></i><span>ion-ios-musical-note</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-bell"></i><span>ion-ios-bell</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-bell-outline"></i><span>ion-ios-bell-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-mic"></i><span>ion-ios-mic</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-mic-outline"></i><span>ion-ios-mic-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-mic-off"></i><span>ion-ios-mic-off</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-volume-high"></i><span>ion-ios-volume-high</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-volume-low"></i><span>ion-ios-volume-low</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-play"></i><span>ion-ios-play</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-play-outline"></i><span>ion-ios-play-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-pause"></i><span>ion-ios-pause</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-pause-outline"></i><span>ion-ios-pause-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-recording"></i><span>ion-ios-recording</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-recording-outline"></i><span>ion-ios-recording-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-fastforward"></i><span>ion-ios-fastforward</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-fastforward-outline"></i><span>ion-ios-fastforward-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-rewind"></i><span>ion-ios-rewind</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-rewind-outline"></i><span>ion-ios-rewind-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-skipbackward"></i><span>ion-ios-skipbackward</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-skipbackward-outline"></i><span>ion-ios-skipbackward-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-skipforward"></i><span>ion-ios-skipforward</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-skipforward-outline"></i><span>ion-ios-skipforward-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-shuffle-strong"></i><span>ion-ios-shuffle-strong</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-shuffle"></i><span>ion-ios-shuffle</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-videocam"></i><span>ion-ios-videocam</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-videocam-outline"></i><span>ion-ios-videocam-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-film"></i><span>ion-ios-film</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-film-outline"></i><span>ion-ios-film-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-flask"></i><span>ion-ios-flask</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-flask-outline"></i><span>ion-ios-flask-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-lightbulb"></i><span>ion-ios-lightbulb</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-lightbulb-outline"></i><span>ion-ios-lightbulb-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-wineglass"></i><span>ion-ios-wineglass</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-wineglass-outline"></i><span>ion-ios-wineglass-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-pint"></i><span>ion-ios-pint</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-pint-outline"></i><span>ion-ios-pint-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-nutrition"></i><span>ion-ios-nutrition</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-nutrition-outline"></i><span>ion-ios-nutrition-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-flower"></i><span>ion-ios-flower</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-flower-outline"></i><span>ion-ios-flower-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-rose"></i><span>ion-ios-rose</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-rose-outline"></i><span>ion-ios-rose-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-paw"></i><span>ion-ios-paw</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-paw-outline"></i><span>ion-ios-paw-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-flame"></i><span>ion-ios-flame</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-flame-outline"></i><span>ion-ios-flame-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-sunny"></i><span>ion-ios-sunny</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-sunny-outline"></i><span>ion-ios-sunny-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-partlysunny"></i><span>ion-ios-partlysunny</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-partlysunny-outline"></i><span>ion-ios-partlysunny-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-cloudy"></i><span>ion-ios-cloudy</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-cloudy-outline"></i><span>ion-ios-cloudy-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-rainy"></i><span>ion-ios-rainy</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-rainy-outline"></i><span>ion-ios-rainy-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-thunderstorm"></i><span>ion-ios-thunderstorm</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-thunderstorm-outline"></i><span>ion-ios-thunderstorm-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-snowy"></i><span>ion-ios-snowy</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-moon"></i><span>ion-ios-moon</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-moon-outline"></i><span>ion-ios-moon-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-cloudy-night"></i><span>ion-ios-cloudy-night</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-ios-cloudy-night-outline"></i><span>ion-ios-cloudy-night-outline</span></div>
					                    </div>
					                </div>
					            </div>
					
					
					            <div id="demo-icon-box-3" class="tab-pane fade">
					                <div class="alert alert-info">
					                    All brand icons are trademarks of their respective owners. The use of these trademarks does not indicate endorsement of the trademark holder by Drifty, nor vice versa.
					                </div>
					
					                <div class="clearfix demo-icon-list">
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-twitter"></i><span>ion-social-twitter</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-twitter-outline"></i><span>ion-social-twitter-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-facebook"></i><span>ion-social-facebook</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-facebook-outline"></i><span>ion-social-facebook-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-googleplus"></i><span>ion-social-googleplus</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-googleplus-outline"></i><span>ion-social-googleplus-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-google"></i><span>ion-social-google</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-google-outline"></i><span>ion-social-google-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-dribbble"></i><span>ion-social-dribbble</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-dribbble-outline"></i><span>ion-social-dribbble-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-octocat"></i><span>ion-social-octocat</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-github"></i><span>ion-social-github</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-github-outline"></i><span>ion-social-github-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-instagram"></i><span>ion-social-instagram</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-instagram-outline"></i><span>ion-social-instagram-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-whatsapp"></i><span>ion-social-whatsapp</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-whatsapp-outline"></i><span>ion-social-whatsapp-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-snapchat"></i><span>ion-social-snapchat</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-snapchat-outline"></i><span>ion-social-snapchat-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-foursquare"></i><span>ion-social-foursquare</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-foursquare-outline"></i><span>ion-social-foursquare-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-pinterest"></i><span>ion-social-pinterest</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-pinterest-outline"></i><span>ion-social-pinterest-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-rss"></i><span>ion-social-rss</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-rss-outline"></i><span>ion-social-rss-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-tumblr"></i><span>ion-social-tumblr</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-tumblr-outline"></i><span>ion-social-tumblr-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-wordpress"></i><span>ion-social-wordpress</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-wordpress-outline"></i><span>ion-social-wordpress-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-reddit"></i><span>ion-social-reddit</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-reddit-outline"></i><span>ion-social-reddit-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-hackernews"></i><span>ion-social-hackernews</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-hackernews-outline"></i><span>ion-social-hackernews-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-designernews"></i><span>ion-social-designernews</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-designernews-outline"></i><span>ion-social-designernews-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-yahoo"></i><span>ion-social-yahoo</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-yahoo-outline"></i><span>ion-social-yahoo-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-buffer"></i><span>ion-social-buffer</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-buffer-outline"></i><span>ion-social-buffer-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-skype"></i><span>ion-social-skype</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-skype-outline"></i><span>ion-social-skype-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-linkedin"></i><span>ion-social-linkedin</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-linkedin-outline"></i><span>ion-social-linkedin-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-vimeo"></i><span>ion-social-vimeo</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-vimeo-outline"></i><span>ion-social-vimeo-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-twitch"></i><span>ion-social-twitch</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-twitch-outline"></i><span>ion-social-twitch-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-youtube"></i><span>ion-social-youtube</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-youtube-outline"></i><span>ion-social-youtube-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-dropbox"></i><span>ion-social-dropbox</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-dropbox-outline"></i><span>ion-social-dropbox-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-apple"></i><span>ion-social-apple</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-apple-outline"></i><span>ion-social-apple-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-android"></i><span>ion-social-android</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-android-outline"></i><span>ion-social-android-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-windows"></i><span>ion-social-windows</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-windows-outline"></i><span>ion-social-windows-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-html5"></i><span>ion-social-html5</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-html5-outline"></i><span>ion-social-html5-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-css3"></i><span>ion-social-css3</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-css3-outline"></i><span>ion-social-css3-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-javascript"></i><span>ion-social-javascript</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-javascript-outline"></i><span>ion-social-javascript-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-angular"></i><span>ion-social-angular</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-angular-outline"></i><span>ion-social-angular-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-nodejs"></i><span>ion-social-nodejs</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-sass"></i><span>ion-social-sass</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-python"></i><span>ion-social-python</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-chrome"></i><span>ion-social-chrome</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-chrome-outline"></i><span>ion-social-chrome-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-codepen"></i><span>ion-social-codepen</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-codepen-outline"></i><span>ion-social-codepen-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-markdown"></i><span>ion-social-markdown</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-tux"></i><span>ion-social-tux</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-freebsd-devil"></i><span>ion-social-freebsd-devil</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-usd"></i><span>ion-social-usd</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-usd-outline"></i><span>ion-social-usd-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-bitcoin"></i><span>ion-social-bitcoin</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-bitcoin-outline"></i><span>ion-social-bitcoin-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-yen"></i><span>ion-social-yen</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-yen-outline"></i><span>ion-social-yen-outline</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-euro"></i><span>ion-social-euro</span></div>
					                    </div>
					                    <div class="col-sm-6 col-md-6">
					                        <div class="demo-icon"><i class="ion-social-euro-outline"></i><span>ion-social-euro-outline</span></div>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div>
					</div>
					</div>
				</div>
			</div>
			<!--End page content-->

	<!-- SCROLL PAGE BUTTON -->
	<button class="scroll-top btn">
		<i class="pci-chevron chevron-up"></i>
	</button>
	</div>
	<!-- END OF CONTAINER -->
	
	<script type="text/javascript">
	$('.demo-icon >span').click(function(){
		var that=$(this);
		var txt=that.text();
		$('#icon').val(txt);
	});
	$('#submit').click(function(){
		var url="<?php echo url('Leftmenu/add'); ?>";
		$.post(url,{
			name:$('#name').val(),
			fid:$('#fid').val(),
			rule:$('#rule').val(),
			icon:$('#icon').val(),
			url:$('#url').val(),
			model:$('#model').val(),
			action:$('#action').val(),
			order:$('#order').val(),
			id:$('#id').val()
		},function(data){
			layer.alert(data.msg,function(){
				location.href="<?php echo url('Leftmenu/index'); ?>"
			});
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
