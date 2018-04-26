<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"/home/wwwroot/www.yuanzigo.com/public/../application/admin1801/view/weixin/menu.html";i:1518065147;s:79:"/home/wwwroot/www.yuanzigo.com/public/../application/admin1801/view/layout.html";i:1517976565;s:86:"/home/wwwroot/www.yuanzigo.com/public/../application/admin1801/view/public/header.html";i:1517976569;s:86:"/home/wwwroot/www.yuanzigo.com/public/../application/admin1801/view/public/footer.html";i:1517976569;}*/ ?>
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
					
<script src="http://www.yuanzigo.com/static/Plus/template.js"></script>
		<!--END NAVBAR-->
		<div class="boxed">
			<!--CONTENT CONTAINER-->
			<div id="content-container">
				<!--Page Title-->
				<div id="page-title">
					<h1 class="page-header text-overflow">微信自定义菜单管理</h1>
				</div>
				<!--End page title-->
				<div class="pad-btm form-inline">
					<div class="row">
						<div class="col-sm-6 table-toolbar-left">
							<div class="btn-group marginL">
								<button class="btn btn-success marginL" data-id="999">所有人</button>
								<button class="btn btn-primary btn-icon" data-id="999"><i class="ion-share"></i></button>
							</div>
							<?php if(is_array($group) || $group instanceof \think\Collection || $group instanceof \think\Paginator): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
							<div class="btn-group marginL">
								<button class="btn btn-success marginL" data-id="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></button>
								<button class="btn btn-primary btn-icon" data-id="<?php echo $v['id']; ?>"><i class="ion-share"></i></button>
							</div>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
				</div>
				<!--Page content-->
				<div class="row">
				<!-- 自定义菜单列表 -->
					<div class="col-xs-6">
						<div class="panel row" style="height:550px;vertical-align:bottom;">
							<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
								<div class="col-xs-6 col-md-4" style="padding-top:500px;">
									<div class="dropup">
										<button class="btn btn-default dropdown-toggle" style="width:100%;" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<?php echo $v['title']; ?>
										</button>
											<ul class="dropdown-menu w100" aria-labelledby="dropdownMenu2">
												<li data-id="<?php echo $v['id']; ?>" data-act='del' class="list-group-item-danger"><a href="javascript:;" class="w100">删除一级菜单</a></li>
												<li data-id="<?php echo $v['id']; ?>" class="list-group-item-warning"><a href="javascript:;" class="w100">修改一级菜单</a></li>
												<?php if(is_array($v['son']) || $v['son'] instanceof \think\Collection || $v['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($i % 2 );++$i;?>
												<li data-id="<?php echo $vs['id']; ?>"><a href="javascript:;" class="w100"><?php echo $vs['title']; ?></a></li>
												<?php endforeach; endif; else: echo "" ;endif; ?>
											</ul>
									</div>
								</div>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
					<!-- 自定义菜单列表End -->
					<!-- 自定义菜单添加 -->
					<div class="col-xs-6">
						<div class="panel">
							<!--Data Table-->
							<div class="panel-body">								
								<div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">添加菜单</h3>
					            </div>
					            <form class="panel-body form-horizontal form-padding">
					            <div id="formtemp">
					            	 <!--多选项-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label">角色分组</label>
					                    <div class="col-md-9">
					                    <select id="tag" class="form-control select2-hidden-accessible" >
											<option value="0">所有用户</option>
											<?php if(is_array($group) || $group instanceof \think\Collection || $group instanceof \think\Paginator): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
												<option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
											<?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
					                    </div>
					                </div>
					                <!--多选项-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label">上级菜单</label>
					                    <div class="col-md-9">
					                    <select id="pid" class="form-control select2-hidden-accessible" >
											<option value="0">一级菜单</option>
											<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
												<option value="<?php echo $v['id']; ?>"><?php echo $v['title']; ?></option>
											<?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
					                    </div>
					                </div>
					                <!--多选项-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label">菜单类型</label>
					                    <div class="col-md-9">
					                    	<select id="type" class="form-control select2-hidden-accessible">
					                    		<option value="0">一级菜单不用选择</option>
												<option value="view">链接</option>
												<option value="click">关键字回复</option>
											</select>
											<small class="help-block">类似为关键字回复时，需要到关键字中心中添加对应的关键词哦</small>
					                    </div>
					                </div>
					
					                <!--Text Input-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label" for="demo-text-input">菜单名称</label>
					                    <div class="col-md-9">
					                        <input type="text" id="title" class="form-control" placeholder="菜单名称">
					                        <small class="help-block">尽量简洁</small>
					                    </div>
					                </div>
					                <!--Text Input-->
					                <div class="form-group" id="keywordgroup" style="display:none">
					                    <label class="col-md-3 control-label" for="demo-text-input">关键词</label>
					                    <div class="col-md-9">
					                        <input type="text" id="keyword" class="form-control" placeholder="点击后回复哪个关键词的内容">
					                    </div>
					                </div>
					                <!--Text Input-->
					                <div class="form-group" id="urlgroup">
					                    <label class="col-md-3 control-label" for="demo-text-input">菜单链接</label>
					                    <div class="col-md-9">
					                    	<input type="hidden" id="menuid" value="0"/>
					                        <input type="text" id="url" class="form-control" placeholder="菜单的链接">					                        
					                    </div>
					                </div>
					                </div>					
					                <div class="form-group">
										<div class="col-lg-7 col-lg-offset-3">										
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
					
					
				</div>
			</div>
			<!--End page content-->
		</div>
		<!--END CONTENT CONTAINER-->

		<!--MAIN NAVIGATION-->
		<include file='Public/left' />
		<!--END MAIN NAVIGATION-->
	</div>
	<!-- SCROLL PAGE BUTTON -->
	<button class="scroll-top btn">
		<i class="pci-chevron chevron-up"></i>
	</button>
	</div>
	<!-- END OF CONTAINER -->
	
	<!-- TEMP STAR-->

    <script id="form-temp" type="text/html">	
<!--多选项-->
<div class="form-group">
	<label class="col-md-3 control-label">角色分组</label>
	<div class="col-md-9">
		<select id="tag" class="form-control select2-hidden-accessible" >
			<option value="0">所有用户</option>
			{{each group as g}}
			<option value="{{ g.id }}" {{ if info.tag==g.id }}selected{{/if}}>{{g.name}}</option>
			{{/each}}
		</select>
	</div>
</div>
<!--多选项-->
<div class="form-group">
	<label class="col-md-3 control-label">上级菜单</label>
	<div class="col-md-9">
		<select id="pid" class="form-control select2-hidden-accessible" >
			<option value="0">一级菜单</option>
			{{each menuone as m}}
			<option value="{{m.id}}" {{ if info.pid==m.id }}selected{{/if}}>{{m.title}}</option>
			{{/each}}
		</select>
	</div>
</div>
<!--多选项-->
<div class="form-group">
	<label class="col-md-3 control-label">菜单类型</label>
	<div class="col-md-9">
		<select id="type" class="form-control select2-hidden-accessible">
			<option value="0">一级菜单不用选择</option>
			<option value="view" {{ if info.type=='view' }}selected{{/if}}>链接</option>
			<option value="click" {{ if info.type=='click' }}selected{{/if}}>关键字回复</option>
		</select>
		<small class="help-block">类似为关键字回复时，需要到关键字中心中添加对应的关键词哦</small>
	</div>
</div>

<!--Text Input-->
<div class="form-group">
	<label class="col-md-3 control-label" for="demo-text-input">菜单名称</label>
	<div class="col-md-9">
		<input type="text" id="title" class="form-control" placeholder="菜单名称" value="{{info.title}}">
		<small class="help-block">尽量简洁</small>
	</div>
</div>
<!--Text Input-->
<div class="form-group" id="keywordgroup" style="display:none">
	<label class="col-md-3 control-label" for="demo-text-input">关键词</label>
	<div class="col-md-9">
		<input type="hidden" id="menuid" value="{{info.id}}"/>
		<input type="text" id="keyword" class="form-control" placeholder="点击后回复哪个关键词的内容" value="{{info.keyword}}">
	</div>
</div>
<!--Text Input-->
<div class="form-group" id="urlgroup">
	<label class="col-md-3 control-label" for="demo-text-input">菜单链接</label>
	<div class="col-md-9">
		<input type="text" id="url" class="form-control" placeholder="菜单的链接"  value="{{info.url}}">
	</div>
</div>
	</script>
	<!-- TEMP END -->
	
	
	<script type="text/javascript">
	$('#type').change(function(){
		var that=$(this);
		var id=that.val();
		if(id=='click'){
			$('#urlgroup').css('display','none');
			$('#keywordgroup').css('display','block');
		}else{
			$('#urlgroup').css('display','block');
			$('#keywordgroup').css('display','none');
			
		}
	});
	
	$('#submit').click(function(){
		var url="<?php echo url('Weixin/menuAdd'); ?>";
		$.post(url,{
			id:$('#menuid').val(),
			pid:$('#pid').val(),
			tag:$('#tag').val(),
			type:$('#type').val(),
			title:$('#title').val(),
			keyword:$('#keyword').val(),
			url:$('#url').val(),
		},function(data){
			layer.msg(data.msg,function(){
				//location.href="<?php echo url('admin/Weixin/menu'); ?>"
			});
		})
	})
	
	$('.dropdown-menu li').click(function(){
		var id=$(this).attr('data-id');
		var act=$(this).attr('data-act');
		if(act=='del'){
			$.post("<?php echo url('Weixin/menuDel'); ?>",{id:id},function(data){
				console.log(data);
				if(data.status==1){
					
					layer.msg(data.msg,function(){
						location.reload();
					})
				}else{
					layer.msg(data.msg);
				}
			})
		}else{
			$.post("<?php echo url('Weixin/menuGetById'); ?>",{id:id},function(data){
				var html = template('form-temp',data);
				$('#formtemp').empty();
				$('#formtemp').append(html);
			});
		}
		
	})
	$('.form-inline .btn-group .btn-success').click(function(){
		var tag=$(this).attr('data-id');
		location.href="<?php echo url('Weixin/menu'); ?>/tag/"+tag;
	});
	$('.form-inline .btn-group .btn-primary').click(function(){
		var tag=$(this).attr('data-id');
		if(tag==999){
			$.post("<?php echo url('Weixin/menuToWeixin'); ?>",{tag:tag},function(data){
				layer.msg(data.msg);
			})
		}
		if(tag==0){
			$.post("<?php echo url('Weixin/menuToWeixin'); ?>",{tag:tag},function(data){
				layer.msg(data.msg);
			})
		}else{
			console.log(tag);
			$.post("<?php echo url('Weixin/menuDiy'); ?>",{tag:tag},function(data){
				layer.msg(data.msg);
			})
		}
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
