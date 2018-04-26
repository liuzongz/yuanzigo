<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/home/wwwroot/www.yuanzigo.com/public/../application/mobile/view/index/reg.html";i:1523470046;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title><?php echo (isset($page_title) && ($page_title !== '')?$page_title:'注册'); ?></title>
    <link href="__CSS__/bootstrap.css" rel="stylesheet">
    <link href="__CSS__/nifty.css" rel="stylesheet">
    <link href="__PLUGINS__/ionicons/css/ionicons.min.css" rel="stylesheet">    
    <script src="__JS__/jquery-2.2.4.min.js"></script>
    <script src="__JS__/bootstrap.min.js"></script>
    <script src="__JS__/nifty.js"></script>
    <script src="__PLUS__/Layer/layer.js"></script>
    <script src="__PLUS__/template.js"></script>
    <script src="__JS__/common.js"></script>
    <style>
　/*隐藏掉我们模型的checkbox*/
   .input_agreement_protocol {
                appearance: none;
                -webkit-appearance: none;
                outline: none;
                display: none;
            }
    /*未选中时*/        
    .input_agreement_protocol+span {
                width: 16px;
                height: 16px;
                background-color: red;
                display: inline-block;
                background: url(../../Images/TalentsRegister/icon_checkbox.png) no-repeat;
                background-position-x: 0px;
                background-position-y: -25px;
                position: relative;
                top: 3px;
            }
   /*选中checkbox时,修改背景图片的位置*/            
   .input_agreement_protocol:checked+span {
                background-position: 0 0px
            }
	.tags{
		padding:0.75em 2em;
		margin:0.5em;
		border-radius:5px;
		border-color: #efb239 !important;
		vertical-align: middle;
		text-align: center;
		white-space: nowrap;
		border: 1px solid transparent;
		color:#efb239;
		display: inline-block;		
	}
	.on{
		color:#fff;
		background-color:#efb239
	}
	.jiao{
		border-radius:5px;
	}
	</style>
</head>
<body>
<div id="ckdiv" style="">
	<div class="text-center mar-btm">
		<img id="headimg" src="http://www.isok.cc/html/nifty/img/profile-photos/2.png" class="img-lg img-circle mar-top">
		<p class="text-bold pad-top text-lg"><span id="nickname"></span>的小店</p>
	</div>
	<div class="bg-light pad-top">
		<div class="form-horizontal">
			<div class="form-group bord-btm">
				<label class="col-xs-3 control-label bord-rgt pad-top pad-rgt text-right ">手机号</label>
				<div class="col-xs-5">
					<input type="number" placeholder="请输入手机号码" id="tel" class="form-control input-lg bord-no">
				</div>
				<div class="col-xs-3">
					<button class="btn btn-success" id="yzm">获取验证码</button>					
				</div>
			</div>
			<div class="form-group" style="padding-bottom:0.5em;">
				<label class="col-xs-3 control-label pad-top bord-rgt pad-rgt text-right">验证码</label>
				<div class="col-xs-5">
					<input type="number" class="input-lg bord-no form-control" id="yzminput" />
				</div>
			</div>
		</div>
	</div>
	<div class="form-group pad-all">
		<button class="btn btn-block btn-warning btn-lg" onclick="reg()" id="regbtn">注册</button>
	</div>
	<div class="form-group pad-hor bord-no">
		<div class="input-group mar-btm ">
			<span class="input-group-addon bord-no">
				<input id="read-radio" class="input_agreement_protocol" checked  type="checkbox" name="read-radio">
	
				<label for="read"></label>
			</span>
			<span class="">已阅读《原子出发平台服务协议》</span>
		</div>
	</div>
</div>
<div id="basediv" style="display:none">
	<div class="bg-light pad-top">
		<div class="form-horizontal">
			<div class="form-group bord-btm">
				<label class="col-xs-3 control-label bord-rgt pad-top pad-rgt text-right ">所在城市</label>
				<div class="col-xs-9" id="citynotice" style="padding-top:1.2em;padding-left:15%">
					点击选择城市
					<input type="hidden" id="city" />					
				</div>
			</div>
			<div class="form-group bord-btm" style="padding-bottom:0.5em;">
				<label class="col-xs-3 control-label pad-top bord-rgt pad-rgt text-right">关注领域</label>
				<div class="col-xs-9" style="padding-top:1.2em;padding-left:15%">
					选择标签
				</div>
			</div>
			<div class="pad-lft" id="tagslist">
			</div>
		</div>
	</div>
	
	<div style="margin-top:5em;padding:0 2em">
		<button class="btn btn-warning btn-lg btn-block jiao" onclick="regshop()">完成注册</button>
	</div>
</div>	


<div id="selbody" style="display:none">
<div class="panel">
	<div class="panel-body row mar-no">
		<div class="col-xs-3 text-center pad-all prov" data-id="Abeijing">北京</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Ashanghai">上海</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Achongqing">重庆</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Aitanjin">天津</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Aanhui">安徽</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Afujian">福建</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Aguangdong">广东</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Azhejiang">浙江</div>		
		<div class="col-xs-3 text-center pad-all prov" data-id="Ajiangsu">江苏</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Ayunnan">云南</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Ahubei">湖北</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Ahunan">湖南</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Ahebei">河北</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Ahenan">河南</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Aheilongjiang">黑龙江</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Ajiangxi">江西</div>		
		<div class="col-xs-3 text-center pad-all prov" data-id="Ajilin">吉林</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Aguangxi">广西</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Agansu">甘肃</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Aguizhou">贵州</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Aliaoning">辽宁</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Ashandong">山东</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Ashanxi2">陕西</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Ashanxi">山西</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Asicuan">四川</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Aneimenggu">内蒙古</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Aningxia">宁夏</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Aqinghai">青海</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Ahainan">海南</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Axinjiang">新疆</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Axizang">西藏</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Axianggang">香港</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Aaomen">澳门</div>
		<div class="col-xs-3 text-center pad-all prov" data-id="Ataiwang">台湾</div>
	</div>
</div>

<div class="panel">
	<div class="panel-body row mar-no">
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Abeijing">北京市</p>
				<div class="col-xs-3 text-center pad-all  city">全北京</div>
				<div class="col-xs-3 text-center pad-all  city">朝阳区</div>
				<div class="col-xs-3 text-center pad-all  city">海淀区</div>
				<div class="col-xs-3 text-center pad-all  city">通州区</div>
				<div class="col-xs-3 text-center pad-all  city">房山区</div>
				<div class="col-xs-3 text-center pad-all  city">丰台区</div>
				<div class="col-xs-3 text-center pad-all  city">昌平区</div>
				<div class="col-xs-3 text-center pad-all  city">大兴区</div>
				<div class="col-xs-3 text-center pad-all  city">顺义区</div>
				<div class="col-xs-3 text-center pad-all  city">西城区</div>
				<div class="col-xs-3 text-center pad-all  city">延庆县</div>
				<div class="col-xs-3 text-center pad-all  city">石景山区</div>
				<div class="col-xs-3 text-center pad-all  city">宣武区</div>
				<div class="col-xs-3 text-center pad-all  city">怀柔区</div>
				<div class="col-xs-3 text-center pad-all  city">崇文区</div>
				<div class="col-xs-3 text-center pad-all  city">密云县</div>
				<div class="col-xs-3 text-center pad-all  city">东城区</div>
				<div class="col-xs-3 text-center pad-all  city">平谷区</div>
				<div class="col-xs-3 text-center pad-all  city">门头沟区</div>
				
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Ashanghai">上海市</p>
				<div class="col-xs-3 text-center pad-all  city">全上海</div>
				<div class="col-xs-3 text-center pad-all  city">松江区</div>
				<div class="col-xs-3 text-center pad-all  city">宝山区</div>
				<div class="col-xs-3 text-center pad-all  city">金山区</div>
				<div class="col-xs-3 text-center pad-all  city">嘉定区</div>
				<div class="col-xs-3 text-center pad-all  city">南汇区</div>
				<div class="col-xs-3 text-center pad-all  city">青浦区</div>
				<div class="col-xs-3 text-center pad-all  city">浦东新区</div>
				<div class="col-xs-3 text-center pad-all  city">奉贤区</div>
				<div class="col-xs-3 text-center pad-all  city">徐汇区</div>
				<div class="col-xs-3 text-center pad-all  city">静安区</div>
				<div class="col-xs-3 text-center pad-all  city">闵行区</div>
				<div class="col-xs-3 text-center pad-all  city">黄浦区</div>
				<div class="col-xs-3 text-center pad-all  city">杨浦区</div>
				<div class="col-xs-3 text-center pad-all  city">虹口区</div>
				<div class="col-xs-3 text-center pad-all  city">普陀区</div>
				<div class="col-xs-3 text-center pad-all  city">闸北区</div>
				<div class="col-xs-3 text-center pad-all  city">长宁区</div>
				<div class="col-xs-3 text-center pad-all  city">崇明县</div>
				<div class="col-xs-3 text-center pad-all  city">卢湾区</div>
				
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Atianjin">天津市</p>
				<div class="col-xs-3 text-center pad-all  city">全天津</div>
				<div class="col-xs-3 text-center pad-all  city">和平区</div>
				<div class="col-xs-3 text-center pad-all  city">北辰区</div>
				<div class="col-xs-3 text-center pad-all  city">河北区</div>
				<div class="col-xs-3 text-center pad-all  city">河西区</div>
				<div class="col-xs-3 text-center pad-all  city">西青区</div>
				<div class="col-xs-3 text-center pad-all  city">津南区</div>
				<div class="col-xs-3 text-center pad-all  city">东丽区</div>
				<div class="col-xs-3 text-center pad-all  city">武清区</div>
				<div class="col-xs-3 text-center pad-all  city">宝坻区</div>
				<div class="col-xs-3 text-center pad-all  city">红桥区</div>
				<div class="col-xs-3 text-center pad-all  city">大港区</div>
				<div class="col-xs-3 text-center pad-all  city">汉沽区</div>
				<div class="col-xs-3 text-center pad-all  city">静海县</div>
				<div class="col-xs-3 text-center pad-all  city">塘沽区</div>
				<div class="col-xs-3 text-center pad-all  city">宁河县</div>
				<div class="col-xs-3 text-center pad-all  city">蓟县</div>
				<div class="col-xs-3 text-center pad-all  city">南开区</div>
				<div class="col-xs-3 text-center pad-all  city">河东区</div>
				
				
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Achongqing">重庆市</p>
				<div class="col-xs-3 text-center pad-all  city">全重庆</div>
				<div class="col-xs-3 text-center pad-all  city">江北区</div>
				<div class="col-xs-3 text-center pad-all  city">渝北区</div>
				<div class="col-xs-3 text-center pad-all  city">沙坪坝区</div>
				<div class="col-xs-3 text-center pad-all  city">九龙坡区</div>
				<div class="col-xs-3 text-center pad-all  city">万州区</div>
				<div class="col-xs-3 text-center pad-all  city">永川市</div>
				<div class="col-xs-3 text-center pad-all  city">南岸区</div>
				<div class="col-xs-3 text-center pad-all  city">酉阳县</div>
				<div class="col-xs-3 text-center pad-all  city">北碚区</div>
				<div class="col-xs-3 text-center pad-all  city">涪陵区</div>
				<div class="col-xs-3 text-center pad-all  city">秀山县</div>
				<div class="col-xs-3 text-center pad-all  city">巴南区</div>
				<div class="col-xs-3 text-center pad-all  city">渝中区</div>
				<div class="col-xs-3 text-center pad-all  city">石柱县</div>
				<div class="col-xs-3 text-center pad-all  city">忠县</div>
				<div class="col-xs-3 text-center pad-all  city">合川市</div>
				<div class="col-xs-3 text-center pad-all  city">大渡口区</div>
				<div class="col-xs-3 text-center pad-all  city">开县</div>
				<div class="col-xs-3 text-center pad-all  city">长寿区</div>
				<div class="col-xs-3 text-center pad-all  city">荣昌县</div>
				<div class="col-xs-3 text-center pad-all  city">云阳县</div>
				<div class="col-xs-3 text-center pad-all  city">梁平县</div>
				<div class="col-xs-3 text-center pad-all  city">潼南县</div>
				<div class="col-xs-3 text-center pad-all  city">江津市</div>
				<div class="col-xs-3 text-center pad-all  city">彭水县</div>
				<div class="col-xs-3 text-center pad-all  city">綦江县</div>
				<div class="col-xs-3 text-center pad-all  city">璧山县</div>
				<div class="col-xs-3 text-center pad-all  city">黔江区</div>
				<div class="col-xs-3 text-center pad-all  city">大足县</div>
				<div class="col-xs-3 text-center pad-all  city">巫山县</div>
				<div class="col-xs-3 text-center pad-all  city">巫溪县</div>
				<div class="col-xs-3 text-center pad-all  city">垫江县</div>
				<div class="col-xs-3 text-center pad-all  city">丰都县</div>
				<div class="col-xs-3 text-center pad-all  city">武隆县</div>
				<div class="col-xs-3 text-center pad-all  city">万盛区</div>
				<div class="col-xs-3 text-center pad-all  city">铜梁县</div>
				<div class="col-xs-3 text-center pad-all  city">南川市</div>
				<div class="col-xs-3 text-center pad-all  city">奉节县</div>
				<div class="col-xs-3 text-center pad-all  city">双桥区</div>
				<div class="col-xs-3 text-center pad-all  city">城口县</div>
				
				
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Aguangdong">广东省</p>
				<div class="col-xs-3 text-center pad-all  city">广东全省</div>
				<div class="col-xs-3 text-center pad-all  city">东莞市</div>
				<div class="col-xs-3 text-center pad-all  city">广州市</div>
				<div class="col-xs-3 text-center pad-all  city">中山市</div>
				<div class="col-xs-3 text-center pad-all  city">深圳市</div>
				<div class="col-xs-3 text-center pad-all  city">惠州市</div>
				<div class="col-xs-3 text-center pad-all  city">江门市</div>
				<div class="col-xs-3 text-center pad-all  city">珠海市</div>
				<div class="col-xs-3 text-center pad-all  city">汕头市</div>
				<div class="col-xs-3 text-center pad-all  city">佛山市</div>
				<div class="col-xs-3 text-center pad-all  city">湛江市</div>
				<div class="col-xs-3 text-center pad-all  city">河源市</div>
				<div class="col-xs-3 text-center pad-all  city">肇庆市</div>
				<div class="col-xs-3 text-center pad-all  city">清远市</div>
				<div class="col-xs-3 text-center pad-all  city">潮州市</div>
				<div class="col-xs-3 text-center pad-all  city">韶关市</div>
				<div class="col-xs-3 text-center pad-all  city">揭阳市</div>
				<div class="col-xs-3 text-center pad-all  city">阳江市</div>
				<div class="col-xs-3 text-center pad-all  city">梅州市</div>
				<div class="col-xs-3 text-center pad-all  city">云浮市</div>
				<div class="col-xs-3 text-center pad-all  city">茂名市</div>
				<div class="col-xs-3 text-center pad-all  city">汕尾市</div>
				
				
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Ashandong">山东省</p>
				<div class="col-xs-3 text-center pad-all  city">山东全省</div>
				<div class="col-xs-3 text-center pad-all  city">济南市</div>
				<div class="col-xs-3 text-center pad-all  city">青岛市</div>
				<div class="col-xs-3 text-center pad-all  city">临沂市</div>
				<div class="col-xs-3 text-center pad-all  city">济宁市</div>
				<div class="col-xs-3 text-center pad-all  city">菏泽市</div>
				<div class="col-xs-3 text-center pad-all  city">烟台市</div>
				<div class="col-xs-3 text-center pad-all  city">淄博市</div>
				<div class="col-xs-3 text-center pad-all  city">泰安市</div>
				<div class="col-xs-3 text-center pad-all  city">潍坊市</div>
				<div class="col-xs-3 text-center pad-all  city">日照市</div>
				<div class="col-xs-3 text-center pad-all  city">威海市</div>
				<div class="col-xs-3 text-center pad-all  city">滨州市</div>
				<div class="col-xs-3 text-center pad-all  city">东营市</div>
				<div class="col-xs-3 text-center pad-all  city">聊城市</div>
				<div class="col-xs-3 text-center pad-all  city">德州市</div>
				<div class="col-xs-3 text-center pad-all  city">莱芜市</div>
				<div class="col-xs-3 text-center pad-all  city">枣庄市</div>
				
				
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Ajiangsu">江苏省</p>
				<div class="col-xs-3 text-center pad-all  city">江苏全省</div>
				<div class="col-xs-3 text-center pad-all  city">苏州市</div>
				<div class="col-xs-3 text-center pad-all  city">徐州市</div>
				<div class="col-xs-3 text-center pad-all  city">盐城市</div>
				<div class="col-xs-3 text-center pad-all  city">无锡市</div>
				<div class="col-xs-3 text-center pad-all  city">南京市</div>
				<div class="col-xs-3 text-center pad-all  city">南通市</div>
				<div class="col-xs-3 text-center pad-all  city">连云港市</div>
				<div class="col-xs-3 text-center pad-all  city">常州市</div>
				<div class="col-xs-3 text-center pad-all  city">镇江市</div>
				<div class="col-xs-3 text-center pad-all  city">扬州市</div>
				<div class="col-xs-3 text-center pad-all  city">淮安市</div>
				<div class="col-xs-3 text-center pad-all  city">泰州市</div>
				<div class="col-xs-3 text-center pad-all  city">宿迁市</div>
				
				
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Ahenan">河南省</p>
				<div class="col-xs-3 text-center pad-all  city">河南全省</div>
				<div class="col-xs-3 text-center pad-all  city">郑州市</div>
				<div class="col-xs-3 text-center pad-all  city">南阳市</div>
				<div class="col-xs-3 text-center pad-all  city">新乡市</div>
				<div class="col-xs-3 text-center pad-all  city">安阳市</div>
				<div class="col-xs-3 text-center pad-all  city">洛阳市</div>
				<div class="col-xs-3 text-center pad-all  city">信阳市</div>
				<div class="col-xs-3 text-center pad-all  city">平顶山市</div>
				<div class="col-xs-3 text-center pad-all  city">周口市</div>
				<div class="col-xs-3 text-center pad-all  city">商丘市</div>
				<div class="col-xs-3 text-center pad-all  city">开封市</div>
				<div class="col-xs-3 text-center pad-all  city">焦作市</div>
				<div class="col-xs-3 text-center pad-all  city">驻马店市</div>
				<div class="col-xs-3 text-center pad-all  city">濮阳市</div>
				<div class="col-xs-3 text-center pad-all  city">三门峡市</div>
				<div class="col-xs-3 text-center pad-all  city">漯河市</div>
				<div class="col-xs-3 text-center pad-all  city">许昌市</div>
				<div class="col-xs-3 text-center pad-all  city">鹤壁市</div>
				<div class="col-xs-3 text-center pad-all  city">济源市</div>
				
				
				
				
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Ahebei">河北省</p>
				<div class="col-xs-3 text-center pad-all  city">河北全省</div>
				<div class="col-xs-3 text-center pad-all  city">石家庄市</div>
				<div class="col-xs-3 text-center pad-all  city">唐山市</div>
				<div class="col-xs-3 text-center pad-all  city">保定市</div>
				<div class="col-xs-3 text-center pad-all  city">邯郸市</div>
				<div class="col-xs-3 text-center pad-all  city">邢台市</div>
				<div class="col-xs-3 text-center pad-all  city">河北区</div>
				<div class="col-xs-3 text-center pad-all  city">沧州市</div>
				<div class="col-xs-3 text-center pad-all  city">秦皇岛市</div>
				<div class="col-xs-3 text-center pad-all  city">张家口市</div>
				<div class="col-xs-3 text-center pad-all  city">衡水市</div>
				<div class="col-xs-3 text-center pad-all  city">廊坊市</div>
				<div class="col-xs-3 text-center pad-all  city">承德市</div>
				
				
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Azhejiang">浙江省</p>
				<div class="col-xs-3 text-center pad-all  city">浙江全省</div>
				<div class="col-xs-3 text-center pad-all  city">温州市</div>
				<div class="col-xs-3 text-center pad-all  city">宁波市</div>
				<div class="col-xs-3 text-center pad-all  city">杭州市</div>
				<div class="col-xs-3 text-center pad-all  city">台州市</div>
				<div class="col-xs-3 text-center pad-all  city">嘉兴市</div>
				<div class="col-xs-3 text-center pad-all  city">金华市</div>
				<div class="col-xs-3 text-center pad-all  city">湖州市</div>
				<div class="col-xs-3 text-center pad-all  city">绍兴市</div>
				<div class="col-xs-3 text-center pad-all  city">舟山市</div>
				<div class="col-xs-3 text-center pad-all  city">丽水市</div>
				<div class="col-xs-3 text-center pad-all  city">衢州市</div>
				
				
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Axiangang">香港特别行政区</p>
				<div class="col-xs-3 text-center pad-all  city">香港</div>
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Ashanxi2">陕西省</p>
				<div class="col-xs-3 text-center pad-all  city">陕西全省</div>
				<div class="col-xs-3 text-center pad-all  city">西安市</div>
				<div class="col-xs-3 text-center pad-all  city">咸阳市</div>
				<div class="col-xs-3 text-center pad-all  city">宝鸡市</div>
				<div class="col-xs-3 text-center pad-all  city">汉中市</div>
				<div class="col-xs-3 text-center pad-all  city">渭南市</div>
				<div class="col-xs-3 text-center pad-all  city">安康市</div>
				<div class="col-xs-3 text-center pad-all  city">榆林市</div>
				<div class="col-xs-3 text-center pad-all  city">商洛市</div>
				<div class="col-xs-3 text-center pad-all  city">延安市</div>
				<div class="col-xs-3 text-center pad-all  city">铜川市</div>
				
				
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Ahunan">湖南省</p>
				<div class="col-xs-3 text-center pad-all  city">湖南全省</div>
				<div class="col-xs-3 text-center pad-all  city">长沙市</div>
				<div class="col-xs-3 text-center pad-all  city">邵阳市</div>
				<div class="col-xs-3 text-center pad-all  city">常德市</div>
				<div class="col-xs-3 text-center pad-all  city">衡阳市</div>
				<div class="col-xs-3 text-center pad-all  city">株洲市</div>
				<div class="col-xs-3 text-center pad-all  city">湘潭市</div>
				<div class="col-xs-3 text-center pad-all  city">永州市</div>
				<div class="col-xs-3 text-center pad-all  city">岳阳市</div>
				<div class="col-xs-3 text-center pad-all  city">怀化市</div>
				<div class="col-xs-3 text-center pad-all  city">郴州市</div>
				<div class="col-xs-3 text-center pad-all  city">娄底市</div>
				<div class="col-xs-3 text-center pad-all  city">益阳市</div>
				<div class="col-xs-3 text-center pad-all  city">张家界市</div>
				<div class="col-xs-3 text-center pad-all  city">湘西州</div>
				
				
				
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Afujian">福建省</p>
				<div class="col-xs-3 text-center pad-all  city">福建全省</div>
				<div class="col-xs-3 text-center pad-all  city">漳州市</div>
				<div class="col-xs-3 text-center pad-all  city">厦门市</div>
				<div class="col-xs-3 text-center pad-all  city">泉州市</div>
				<div class="col-xs-3 text-center pad-all  city">福州市</div>
				<div class="col-xs-3 text-center pad-all  city">莆田市</div>
				<div class="col-xs-3 text-center pad-all  city">宁德市</div>
				<div class="col-xs-3 text-center pad-all  city">三明市</div>
				<div class="col-xs-3 text-center pad-all  city">南平市</div>
				<div class="col-xs-3 text-center pad-all  city">龙岩市</div>
				
				
				
				
				
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Ayunnan">云南省</p>
				<div class="col-xs-3 text-center pad-all  city">云南全省</div>
				<div class="col-xs-3 text-center pad-all  city">昆明市</div>
				<div class="col-xs-3 text-center pad-all  city">红河州</div>
				<div class="col-xs-3 text-center pad-all  city">大理州</div>
				<div class="col-xs-3 text-center pad-all  city">文山州</div>
				<div class="col-xs-3 text-center pad-all  city">德宏州</div>
				<div class="col-xs-3 text-center pad-all  city">曲靖市</div>
				<div class="col-xs-3 text-center pad-all  city">昭通市</div>
				<div class="col-xs-3 text-center pad-all  city">楚雄州</div>
				<div class="col-xs-3 text-center pad-all  city">保山市</div>
				<div class="col-xs-3 text-center pad-all  city">玉溪市</div>
				<div class="col-xs-3 text-center pad-all  city">丽江地区</div>
				<div class="col-xs-3 text-center pad-all  city">临沧地区</div>
				<div class="col-xs-3 text-center pad-all  city">思茅地区</div>
				<div class="col-xs-3 text-center pad-all  city">西双版纳州</div>
				<div class="col-xs-3 text-center pad-all  city">怒江州</div>
				<div class="col-xs-3 text-center pad-all  city">迪庆州</div>
				
				
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Asicuan">四川省</p>
				<div class="col-xs-3 text-center pad-all  city">四川全省</div>
				<div class="col-xs-3 text-center pad-all  city">成都市</div>
				<div class="col-xs-3 text-center pad-all  city">绵阳市</div>
				<div class="col-xs-3 text-center pad-all  city">广元市</div>
				<div class="col-xs-3 text-center pad-all  city">达州市</div>
				<div class="col-xs-3 text-center pad-all  city">南充市</div>
				<div class="col-xs-3 text-center pad-all  city">德阳市</div>
				<div class="col-xs-3 text-center pad-all  city">广安市</div>
				<div class="col-xs-3 text-center pad-all  city">阿坝州</div>
				<div class="col-xs-3 text-center pad-all  city">巴中市</div>
				<div class="col-xs-3 text-center pad-all  city">遂宁市</div>
				<div class="col-xs-3 text-center pad-all  city">内江市</div>
				<div class="col-xs-3 text-center pad-all  city">凉山州</div>
				<div class="col-xs-3 text-center pad-all  city">攀枝花市</div>
				<div class="col-xs-3 text-center pad-all  city">乐山市</div>
				<div class="col-xs-3 text-center pad-all  city">自贡市</div>
				<div class="col-xs-3 text-center pad-all  city">泸州市</div>
				<div class="col-xs-3 text-center pad-all  city">雅安市</div>
				<div class="col-xs-3 text-center pad-all  city">宜宾市</div>
				<div class="col-xs-3 text-center pad-all  city">资阳市</div>
				<div class="col-xs-3 text-center pad-all  city">眉山市</div>
				<div class="col-xs-3 text-center pad-all  city">甘孜州</div>
				
				
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Aguangxi">广西壮族自治区</p>
				<div class="col-xs-3 text-center pad-all  city">广西全省</div>
				<div class="col-xs-3 text-center pad-all  city">贵港市</div>
				<div class="col-xs-3 text-center pad-all  city">玉林市</div>
				<div class="col-xs-3 text-center pad-all  city">北海市</div>
				<div class="col-xs-3 text-center pad-all  city">南宁市</div>
				<div class="col-xs-3 text-center pad-all  city">柳州市</div>
				<div class="col-xs-3 text-center pad-all  city">桂林市</div>
				<div class="col-xs-3 text-center pad-all  city">梧州市</div>
				<div class="col-xs-3 text-center pad-all  city">钦州市</div>
				<div class="col-xs-3 text-center pad-all  city">来宾市</div>
				<div class="col-xs-3 text-center pad-all  city">河池市</div>
				<div class="col-xs-3 text-center pad-all  city">百色市</div>
				<div class="col-xs-3 text-center pad-all  city">贺州市</div>
				<div class="col-xs-3 text-center pad-all  city">崇左市</div>
				<div class="col-xs-3 text-center pad-all  city">防城港市</div>
				
				
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Aanhui">安徽省</p>
				<div class="col-xs-3 text-center pad-all  city">安徽全省</div>
				<div class="col-xs-3 text-center pad-all  city">芜湖市</div>
				<div class="col-xs-3 text-center pad-all  city">合肥市</div>
				<div class="col-xs-3 text-center pad-all  city">六安市</div>
				<div class="col-xs-3 text-center pad-all  city">宿州市</div>
				<div class="col-xs-3 text-center pad-all  city">阜阳市</div>
				<div class="col-xs-3 text-center pad-all  city">安庆市</div>
				<div class="col-xs-3 text-center pad-all  city">马鞍山市</div>
				<div class="col-xs-3 text-center pad-all  city">蚌埠市</div>
				<div class="col-xs-3 text-center pad-all  city">淮北市</div>
				<div class="col-xs-3 text-center pad-all  city">淮南市</div>
				<div class="col-xs-3 text-center pad-all  city">宣城市</div>
				<div class="col-xs-3 text-center pad-all  city">黄山市</div>
				<div class="col-xs-3 text-center pad-all  city">铜陵市</div>
				<div class="col-xs-3 text-center pad-all  city">亳州市</div>
				<div class="col-xs-3 text-center pad-all  city">池州市</div>
				<div class="col-xs-3 text-center pad-all  city">巢湖市</div>
				<div class="col-xs-3 text-center pad-all  city">滁州市</div>
				
				
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Ahainan">海南省</p>
				<div class="col-xs-3 text-center pad-all  city">海南全省</div>
				<div class="col-xs-3 text-center pad-all  city">三亚市</div>
				<div class="col-xs-3 text-center pad-all  city">海口市</div>
				<div class="col-xs-3 text-center pad-all  city">琼海市</div>
				<div class="col-xs-3 text-center pad-all  city">文昌市</div>
				<div class="col-xs-3 text-center pad-all  city">东方市</div>
				<div class="col-xs-3 text-center pad-all  city">昌江县</div>
				<div class="col-xs-3 text-center pad-all  city">陵水县</div>
				<div class="col-xs-3 text-center pad-all  city">乐东县</div>
				<div class="col-xs-3 text-center pad-all  city">保亭县</div>
				<div class="col-xs-3 text-center pad-all  city">五指山市</div>
				<div class="col-xs-3 text-center pad-all  city">澄迈县</div>
				<div class="col-xs-3 text-center pad-all  city">万宁市</div>
				<div class="col-xs-3 text-center pad-all  city">儋州市</div>
				<div class="col-xs-3 text-center pad-all  city">临高县</div>
				<div class="col-xs-3 text-center pad-all  city">白沙县</div>
				<div class="col-xs-3 text-center pad-all  city">定安县</div>
				<div class="col-xs-3 text-center pad-all  city">琼中县</div>
				<div class="col-xs-3 text-center pad-all  city">屯昌县</div>
				
				
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Ajiangxi">江西省</p>
				<div class="col-xs-3 text-center pad-all  city">江西全省</div>
				<div class="col-xs-3 text-center pad-all  city">南昌市</div>
				<div class="col-xs-3 text-center pad-all  city">赣州市</div>
				<div class="col-xs-3 text-center pad-all  city">上饶市</div>
				<div class="col-xs-3 text-center pad-all  city">吉安市</div>
				<div class="col-xs-3 text-center pad-all  city">九江市</div>
				<div class="col-xs-3 text-center pad-all  city">新余市</div>
				<div class="col-xs-3 text-center pad-all  city">抚州市</div>
				<div class="col-xs-3 text-center pad-all  city">宜春市</div>
				<div class="col-xs-3 text-center pad-all  city">景德镇市</div>
				<div class="col-xs-3 text-center pad-all  city">萍乡市</div>
				<div class="col-xs-3 text-center pad-all  city">鹰潭市</div>
						
						
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Ahubei">湖北省</p>		
				<div class="col-xs-3 text-center pad-all  city">湖北全省</div>
				<div class="col-xs-3 text-center pad-all  city">武汉市</div>
				<div class="col-xs-3 text-center pad-all  city">宜昌市</div>
				<div class="col-xs-3 text-center pad-all  city">襄樊市</div>
				<div class="col-xs-3 text-center pad-all  city">荆州市</div>
				<div class="col-xs-3 text-center pad-all  city">恩施州</div>
				<div class="col-xs-3 text-center pad-all  city">黄冈市</div>
				<div class="col-xs-3 text-center pad-all  city">孝感市</div>
				<div class="col-xs-3 text-center pad-all  city">十堰市</div>
				<div class="col-xs-3 text-center pad-all  city">咸宁市</div>
				<div class="col-xs-3 text-center pad-all  city">黄石市</div>
				<div class="col-xs-3 text-center pad-all  city">仙桃市</div>
				<div class="col-xs-3 text-center pad-all  city">天门市</div>
				<div class="col-xs-3 text-center pad-all  city">随州市</div>
				<div class="col-xs-3 text-center pad-all  city">荆门市</div>
				<div class="col-xs-3 text-center pad-all  city">潜江市</div>
				<div class="col-xs-3 text-center pad-all  city">鄂州市</div>
				<div class="col-xs-3 text-center pad-all  city">神农架林区</div>
						
						
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Ashanxi">山西省</p>		
				<div class="col-xs-3 text-center pad-all  city">山西全省</div>
				<div class="col-xs-3 text-center pad-all  city">太原市</div>
				<div class="col-xs-3 text-center pad-all  city">大同市</div>
				<div class="col-xs-3 text-center pad-all  city">运城市</div>
				<div class="col-xs-3 text-center pad-all  city">长治市</div>
				<div class="col-xs-3 text-center pad-all  city">晋城市</div>
				<div class="col-xs-3 text-center pad-all  city">忻州市</div>
				<div class="col-xs-3 text-center pad-all  city">临汾市</div>
				<div class="col-xs-3 text-center pad-all  city">吕梁市</div>
				<div class="col-xs-3 text-center pad-all  city">晋中市</div>
				<div class="col-xs-3 text-center pad-all  city">阳泉市</div>
				<div class="col-xs-3 text-center pad-all  city">朔州市</div>
						
						
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Aliaoning">辽宁省</p>		
				<div class="col-xs-3 text-center pad-all  city">辽宁全省</div>
				<div class="col-xs-3 text-center pad-all  city">大连市</div>
				<div class="col-xs-3 text-center pad-all  city">沈阳市</div>
				<div class="col-xs-3 text-center pad-all  city">丹东市</div>
				<div class="col-xs-3 text-center pad-all  city">辽阳市</div>
				<div class="col-xs-3 text-center pad-all  city">葫芦岛市</div>
				<div class="col-xs-3 text-center pad-all  city">锦州市</div>
				<div class="col-xs-3 text-center pad-all  city">朝阳市</div>
				<div class="col-xs-3 text-center pad-all  city">营口市</div>
				<div class="col-xs-3 text-center pad-all  city">鞍山市</div>
				<div class="col-xs-3 text-center pad-all  city">抚顺市</div>
				<div class="col-xs-3 text-center pad-all  city">阜新市</div>
				<div class="col-xs-3 text-center pad-all  city">盘锦市</div>
				<div class="col-xs-3 text-center pad-all  city">本溪市</div>
				<div class="col-xs-3 text-center pad-all  city">铁岭市</div>
						
						
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Ataiwan">台湾省</p>		
				<div class="col-xs-3 text-center pad-all  city">整个台湾</div>
				<div class="col-xs-3 text-center pad-all  city">台北市</div>
				<div class="col-xs-3 text-center pad-all  city">高雄市</div>
				<div class="col-xs-3 text-center pad-all  city">台中市</div>
				<div class="col-xs-3 text-center pad-all  city">新竹市</div>
				<div class="col-xs-3 text-center pad-all  city">基隆市</div>
				<div class="col-xs-3 text-center pad-all  city">台南市</div>
				<div class="col-xs-3 text-center pad-all  city">嘉义市</div>
						
						
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Aheilongjiang">黑龙江</p>		
				<div class="col-xs-3 text-center pad-all  city">黑龙江全省</div>
				<div class="col-xs-3 text-center pad-all  city">齐齐哈尔市</div>
				<div class="col-xs-3 text-center pad-all  city">哈尔滨市</div>
				<div class="col-xs-3 text-center pad-all  city">大庆市</div>
				<div class="col-xs-3 text-center pad-all  city">佳木斯市</div>
				<div class="col-xs-3 text-center pad-all  city">双鸭山市</div>
				<div class="col-xs-3 text-center pad-all  city">牡丹江市</div>
				<div class="col-xs-3 text-center pad-all  city">鸡西市</div>
				<div class="col-xs-3 text-center pad-all  city">黑河市</div>
				<div class="col-xs-3 text-center pad-all  city">绥化市</div>
				<div class="col-xs-3 text-center pad-all  city">鹤岗市</div>
				<div class="col-xs-3 text-center pad-all  city">伊春市</div>
				<div class="col-xs-3 text-center pad-all  city">大兴安岭地区</div>
				<div class="col-xs-3 text-center pad-all  city">七台河市</div>
						
						
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Aneimenggu">内蒙古自治区</p>		
				<div class="col-xs-3 text-center pad-all  city">内蒙古全省</div>
				<div class="col-xs-3 text-center pad-all  city">赤峰市</div>
				<div class="col-xs-3 text-center pad-all  city">包头市</div>
				<div class="col-xs-3 text-center pad-all  city">通辽市</div>
				<div class="col-xs-3 text-center pad-all  city">呼和浩特市</div>
				<div class="col-xs-3 text-center pad-all  city">鄂尔多斯市</div>
				<div class="col-xs-3 text-center pad-all  city">乌海市</div>
				<div class="col-xs-3 text-center pad-all  city">呼伦贝尔市</div>
				<div class="col-xs-3 text-center pad-all  city">兴安盟</div>
				<div class="col-xs-3 text-center pad-all  city">巴彦淖尔盟</div>
				<div class="col-xs-3 text-center pad-all  city">乌兰察布盟</div>
				<div class="col-xs-3 text-center pad-all  city">锡林郭勒盟</div>
				<div class="col-xs-3 text-center pad-all  city">阿拉善盟</div>
						
						
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Aaomen">澳门特别行政区</p>
				<div class="col-xs-3 text-center pad-all  city">澳门</div>	
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Aguizhou">贵州省</p>		
				<div class="col-xs-3 text-center pad-all  city">贵州全省</div>
				<div class="col-xs-3 text-center pad-all  city">贵阳市</div>
				<div class="col-xs-3 text-center pad-all  city">黔东南州</div>
				<div class="col-xs-3 text-center pad-all  city">黔南州</div>
				<div class="col-xs-3 text-center pad-all  city">遵义市</div>
				<div class="col-xs-3 text-center pad-all  city">黔西南州</div>
				<div class="col-xs-3 text-center pad-all  city">毕节地区</div>
				<div class="col-xs-3 text-center pad-all  city">铜仁地区</div>
				<div class="col-xs-3 text-center pad-all  city">安顺市</div>
				<div class="col-xs-3 text-center pad-all  city">六盘水市</div>
						
						
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Agansu">甘肃省</p>		
				<div class="col-xs-3 text-center pad-all  city">甘肃全省</div>
				<div class="col-xs-3 text-center pad-all  city">兰州市</div>
				<div class="col-xs-3 text-center pad-all  city">天水市</div>
				<div class="col-xs-3 text-center pad-all  city">庆阳市</div>
				<div class="col-xs-3 text-center pad-all  city">武威市</div>
				<div class="col-xs-3 text-center pad-all  city">酒泉市</div>
				<div class="col-xs-3 text-center pad-all  city">张掖市</div>
				<div class="col-xs-3 text-center pad-all  city">陇南地区</div>
				<div class="col-xs-3 text-center pad-all  city">白银市</div>
				<div class="col-xs-3 text-center pad-all  city">定西地区</div>
				<div class="col-xs-3 text-center pad-all  city">平凉市</div>
				<div class="col-xs-3 text-center pad-all  city">嘉峪关市</div>
				<div class="col-xs-3 text-center pad-all  city">临夏回族自治州</div>
				<div class="col-xs-3 text-center pad-all  city">金昌市</div>
				<div class="col-xs-3 text-center pad-all  city">甘南州</div>
						
						
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Aqinghai">青海省</p>		
				<div class="col-xs-3 text-center pad-all  city">青海全省</div>
				<div class="col-xs-3 text-center pad-all  city">西宁市</div>
				<div class="col-xs-3 text-center pad-all  city">海西州</div>
				<div class="col-xs-3 text-center pad-all  city">海东地区</div>
				<div class="col-xs-3 text-center pad-all  city">海北州</div>
				<div class="col-xs-3 text-center pad-all  city">果洛州</div>
				<div class="col-xs-3 text-center pad-all  city">玉树州</div>
				<div class="col-xs-3 text-center pad-all  city">黄南藏族自治州</div>
						
						
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Axinjiang">新疆维吾尔自治区</p>	
				<div class="col-xs-3 text-center pad-all  city">新疆全省</div>	
				<div class="col-xs-3 text-center pad-all  city">乌鲁木齐市</div>
				<div class="col-xs-3 text-center pad-all  city">伊犁州</div>
				<div class="col-xs-3 text-center pad-all  city">昌吉州</div>
				<div class="col-xs-3 text-center pad-all  city">石河子市</div>
				<div class="col-xs-3 text-center pad-all  city">哈密地区</div>
				<div class="col-xs-3 text-center pad-all  city">阿克苏地区</div>
				<div class="col-xs-3 text-center pad-all  city">巴音郭楞州</div>
				<div class="col-xs-3 text-center pad-all  city">喀什地区</div>
				<div class="col-xs-3 text-center pad-all  city">塔城地区</div>
				<div class="col-xs-3 text-center pad-all  city">克拉玛依市</div>
				<div class="col-xs-3 text-center pad-all  city">和田地区</div>
				<div class="col-xs-3 text-center pad-all  city">阿勒泰州</div>
				<div class="col-xs-3 text-center pad-all  city">吐鲁番地区</div>
				<div class="col-xs-3 text-center pad-all  city">阿拉尔市</div>
				<div class="col-xs-3 text-center pad-all  city">博尔塔拉州</div>
				<div class="col-xs-3 text-center pad-all  city">五家渠市</div>
				<div class="col-xs-3 text-center pad-all  city">克孜勒苏州</div>
				<div class="col-xs-3 text-center pad-all  city">图木舒克市</div>
						
						
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Axizang">西藏区</p>		
				<div class="col-xs-3 text-center pad-all  city">西藏全省</div>
				<div class="col-xs-3 text-center pad-all  city">拉萨市</div>
				<div class="col-xs-3 text-center pad-all  city">山南地区</div>
				<div class="col-xs-3 text-center pad-all  city">林芝地区</div>
				<div class="col-xs-3 text-center pad-all  city">日喀则地区</div>
				<div class="col-xs-3 text-center pad-all  city">阿里地区</div>
				<div class="col-xs-3 text-center pad-all  city">昌都地区</div>
				<div class="col-xs-3 text-center pad-all  city">那曲地区</div>
						
						
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Ajilin">吉林省</p>		
				<div class="col-xs-3 text-center pad-all  city">吉林全省</div>
				<div class="col-xs-3 text-center pad-all  city">吉林市</div>
				<div class="col-xs-3 text-center pad-all  city">长春市</div>
				<div class="col-xs-3 text-center pad-all  city">白山市</div>
				<div class="col-xs-3 text-center pad-all  city">延边州</div>
				<div class="col-xs-3 text-center pad-all  city">白城市</div>
				<div class="col-xs-3 text-center pad-all  city">松原市</div>
				<div class="col-xs-3 text-center pad-all  city">辽源市</div>
				<div class="col-xs-3 text-center pad-all  city">通化市</div>
				<div class="col-xs-3 text-center pad-all  city">四平市</div>
						
						
				<p class="col-xs-12 text-center pad-all bord-btm text-primary text-bold" style="font-size:1.2em;"  id="Aningxia">宁夏回族自治区</p>		
				<div class="col-xs-3 text-center pad-all  city">宁夏省</div>
				<div class="col-xs-3 text-center pad-all  city">银川市</div>
				<div class="col-xs-3 text-center pad-all  city">吴忠市</div>
				<div class="col-xs-3 text-center pad-all  city">中卫市</div>
				<div class="col-xs-3 text-center pad-all  city">石嘴山市</div>
				<div class="col-xs-3 text-center pad-all  city">固原市</div>
	</div>
</div>
<div style="height:100px"></div>
<div class="gotop">
<i class="ion-jet icon-3x text-success"></i>
</div>
</div>
<script>
$('#citynotice').click(function(){
	$('#selbody').show();
	$('#basediv').hide();
})
$('#citysubmit').click(function(){
	$('#selbody').hide();
	$('#basediv').show();
})
$('.gotop').click(function(){
	$('body').animate({scrollTop:0}, 1000);
})
$('.prov').click(function(){
	var that=$(this);
	var s = $(this).attr('data-id');
	var goheight=parseInt($('#' + s).offset().top)-50
	$('body').animate({scrollTop:$('#'+s).offset().top}, 1000);
	//$(window).scrollTop(goheight);
})

$('.city').click(function(){
	var addressTxt=$(this).text();
	$('#city').val(addressTxt);
	$('#citynotice').text(addressTxt);
	$('#selbody').hide();
	$('#basediv').show();
})
</script>
<script>

	$(function(){
		token=getQueryVariable('token');
		var url_getUserInfo=base_url+'/wechat/getUserInfoByToken?token='+token
		$.get(url_getUserInfo,function(data){
			console.log(data.data.userinfo)
			$('#headimg').attr('src',data.data.userinfo.headimgurl)
			$('#nickname').text(data.data.userinfo.nickname)
		})
		getTags()
	})
	
	function getQueryVariable(variable){
	       var query = window.location.search.substring(1);
	       var vars = query.split("&");
	       for (var i=0;i<vars.length;i++) {
	               var pair = vars[i].split("=");
	               if(pair[0] == variable){return pair[1];}
	       }
	       return(false);
	}
	
	function reg(){
		var reg_url=base_url+'shop/checkYzm'
		var mobile=$("#tel").val();
		var yzm=$("#yzminput").val();
		var ytoken=$("#regbtn").attr('data-token');
		$.post(reg_url,{mobile:mobile,yzm:yzm,ytoken:ytoken},function(data){
			if(data.data.code==1){
				$('#ckdiv').hide();
				$('#basediv').show();
			}else{
				layer.alert(data.data.msg)
			}
		})
	}
	
	$('#yzm').click(function(){
		var mobile   = $("#tel").val();
		var getYzmUrl=base_url+'Pub/SendVerificationCode'
		if(mobile.length==11){
			$.post(getYzmUrl,{mobile:mobile},function(data){
				console.log(data)
				if(data.code!=0){
					layer.msg(data.message)
						$('#regbtn').attr('data-token',data.data.code)
						var wait = 60;
				        $("#yzm").text((--wait) + "秒后重发").css("pointerEvents", 'none');
				        var time_line = setInterval(function(){
				          if(wait == 0){
				        	  $("#yzm").text("获取验证码").css("pointerEvents", 'visiblepainted');
				              return clearInterval(time_line);
				          }else{
				        	  $("#yzm").text((--wait) + "秒后重发").css("pointerEvents", 'none'); 
				          }
				        },1000);
				}else{
					layer.alert(data.message,{title:false,closeBtn:false});
				}
			})
		}else{
			layer.alert('您输入的手机号码有误',{title:false,closeBtn:false});
		}
	})
	
	
	
	
	function getTags(){
		var tags_url=base_url+'pub/gettags'
		$.get(tags_url,function(data){
			var html=template('tags-temp',data.data)
			$('#tagslist').empty().append(html)			
			$('.tags').click(function(){
				var that=$(this);
				if(that.hasClass('on')){
					that.removeClass('on')
				}else{
					that.addClass('on')
				}
			})
		})
	}
	
	function regshop(){
		var tags = new Array()
		$('#tagslist .on').each(function(){			
			var that=$(this)
			var id=that.attr('data-id')
			tags.push(id)
		})
		tags=tags.join(',')
		var city=$('#citynotice').text()
		var mobile=$('#tel').val();
		var reg_url=base_url+'shop/reg'
		$.post(reg_url,{token:token,tags:tags,city:city,mobile:mobile},function(data){
			console.log(data)
			console.log(data.code)
			console.log(data.msg)
			if(data.data.code==1){
				layer.alert('注册成功，开始【发现】优质的活动吧',function(){
					token=data.data.msg
					location.href="index.html?token="+token
				})				
			}else{
				layer.alert(data.data.msg,function(){
					layer.closeAll()
				})
			}
		})
	}
</script>

<script id="tags-temp" type="html/text">
{{each data as v}}
	<span class="tags" data-id="{{v.id}}">{{v.name}}</span>
{{/each}}	
</script>
</body>
</html>