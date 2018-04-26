<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:83:"/home/wwwroot/www.yuanzigo.com/public/../application/admin/view/activity/share.html";i:1524473707;s:75:"/home/wwwroot/www.yuanzigo.com/public/../application/admin/view/layout.html";i:1524460663;s:82:"/home/wwwroot/www.yuanzigo.com/public/../application/admin/view/public/header.html";i:1524460666;s:82:"/home/wwwroot/www.yuanzigo.com/public/../application/admin/view/public/footer.html";i:1524460665;}*/ ?>
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
					
<div class="row" id="listDiv">
	<div class="panel">
		<div class="panel-body">
			<div class="pad-all row">
				<div class="col-lg-8">
					<a class="btn btn-default <?php if($tags_on == '0'): ?>btn-success<?php endif; ?>" href="<?php echo url('activity/share'); ?>/tags/0/shop/<?php echo $type_on; ?>">全部</a>
					<?php if(is_array($tags) || $tags instanceof \think\Collection || $tags instanceof \think\Paginator): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
					<a class="btn btn-default <?php if($tags_on == $v['id']): ?>btn-success<?php endif; ?>" href="<?php echo url('activity/share'); ?>/tags/<?php echo $v['id']; ?>/shop/<?php echo $type_on; ?>"><?php echo $v['name']; ?></a>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<select name="shop" id="shop" style="float: right;height: 32px;">
					<option value="0">请选择所属店铺</option>
					<?php if(is_array($slist) || $slist instanceof \think\Collection || $slist instanceof \think\Paginator): $i = 0; $__LIST__ = $slist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $v['id']; ?>" <?php if(input('shop') == $v['id']): ?> selected<?php endif; ?>><?php echo $v['shopname']; ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				<div class="col-lg-4">
				<div class="searchbox">
                        <div class="input-group custom-search-form">
                            <input type="text" id="keyword" class="form-control input-lg" placeholder="搜索">
                            <span class="input-group-btn">
                                <button class="text-primary" type="button" onclick="search()" ><i class="ion-search icon-2x"></i></button>
                            </span>
                        </div>
                    </div>
				</div>				
			</div>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>题图</th>
							<th>活动名称</th>
							<th>所属店铺</th>
							<th>二维码ToC</th>
							<th>更新时间</th>
							<th class="text-center">操作</th>
						</tr>
					</thead>
					<tbody id="tablelists">
						<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
							<tr id="tr<?php echo $v['id']; ?>">
								<td><img src="<?php echo $v['headimgs']; ?>" style="width:100px"/></td>
								<td><?php echo $v['title']; ?></td>
								<td><?php echo $v['shop']['shopname']; ?></td>
								<td><img src="<?php echo $v['qr']; ?>" style="max-width:5em;" onclick="seeImg('<?php echo $v['qr']; ?>')"/></td>
								
								<td><?php echo $v['update_time']; ?></td>
								<td>
									<a href="<?php echo url('activity/add',['id'=>$v['id']]); ?>" class="btn btn-sm btn-warning">修改</a>
									<button class="btn btn-default btn-sm del" data-id="<?php echo $v['id']; ?>">删除</button>
									<?php if($v['hot'] == '0'): ?>
									<button class="btn btn-warning btn-sm" onclick="hot(<?php echo $v['id']; ?>)">设为爆款</button>
									<?php else: ?>
									<span class="btn btn-danger btn-sm">我是爆款</span>
									<?php endif; ?>
									<!-- <button class="btn btn-success btn-sm" data-id="<?php echo $v['id']; ?>"  onclick="copy(<?php echo $v['id']; ?>)">复制</button> -->									
								</td>
							</tr>
							<tr>
							<td colspan="3">ToC链接：<?php echo $v['tocurl']; ?></td>
							<td colspan="4"></td>
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

<div id="copyHtml">
	<div id="copyDiv">
		<script src="__PLUGINS__/bootstrap-select/bootstrap-select.min.js"></script>
		<link href="__PLUGINS__/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
		<link href="__PLUGINS__/select2/css/select2.min.css" rel="stylesheet">
		<script src="__PLUGINS__/select2/js/select2.min.js"></script>
		<link href="__PLUGINS__/chosen/chosen.min.css" rel="stylesheet">
		<script src="__PLUGINS__/chosen/chosen.jquery.min.js"></script>	
		<div class="form-horizontal pad-top mar-top">
			<div class="form-group">
				<label class="col-sm-2 control-label">所属店铺</label>
				<div class="col-sm-6">
					<select data-placeholder="请选择所属店铺" class="form-control" id="shop_id" tabindex="1">
					<?php if(is_array($shoplist) || $shoplist instanceof \think\Collection || $shoplist instanceof \think\Paginator): $i = 0; $__LIST__ = $shoplist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $v['id']; ?>"><?php echo $v['shopname']; ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
			</div>
			<div class="text-center">
				<input type="hidden" id="activity_id" value="0"/>
				<button class="btn btn-primary btn-lg" onclick="subCopy()">确定复制</button>			
			</div>
		</div>
	</div>
</div>

<script>
$(function() {
		$('#copyDiv #shop_id').chosen();
		$('#copyHtml').hide();
})
function search(){
	var keyword=$('#keyword').val()
	location.href="<?php echo url('activity/share'); ?>?keyword="+keyword
}
$("#keyword").keydown(function(e) {  
    if (e.keyCode == 13) {  
    	search()
    }  
}); 
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
function ck(id){
	layer.open({
		  type: 2,
		  title:false,
		  shadeClose: true,
		  shade: 0.9,
		  area: ['480px', '90%'],
		  content:"<?php echo url('activity/detail'); ?>/id/"+id
		}); 
}


function hot(id){
	$.post("<?php echo url('activity/hot'); ?>",{id:id},function(data){
		if(data.status==1){
			layer.alert(data.msg,function(){
				location.reload();
			});				
		}else{
			layer.msg(data.msg);
		}
	})
}

$('.del').click(function(){
	var id=$(this).attr('data-id');
	$.post("<?php echo url('activity/del'); ?>",{id:id},function(data){
		if(data.status==1){
			layer.alert(data.msg,function(){
				$('#tr'+id).remove();
				layer.closeAll();
			});				
		}else{
			layer.msg(data.msg);
		}
	})
})

function copy(id){
	$('#listDiv').hide();
	$('#copyHtml').show();
	$('#copyDiv #activity_id').val(id)
}

function subCopy(){
	var id=$('#copyDiv #activity_id').val()
	var shop_id=$('#copyDiv #shop_id').val()
	console.log(shop_id)
	var url="<?php echo url('activity/copyActivity'); ?>"
	$.post(url,{id:id,shop_id:shop_id},function(data){
		if(data.status==1){
			layer.alert(data.msg,function(){
				location.reload()
			});				
		}else{
			layer.msg(data.msg);
		}
	})
}
$('#shop').change(function(){
	var type = $(this).val();
	window.location.href="<?php echo url("","",true,false);?>/tags/<?php echo $tags_on; ?>/shop/"+type;
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
