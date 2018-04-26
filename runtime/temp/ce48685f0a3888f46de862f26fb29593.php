<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/home/wwwroot/www.yuanzigo.com/public/../application/index/view/passport/reg.html";i:1522847652;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<title>注册原子出发</title>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link href="__CSS__/bootstrap.css" rel="stylesheet">
	<script src="__JS__/jquery-2.2.4.min.js"></script>
	<style>
		img {
			width: 100%;
			margin-top: 10px;
			border-radius: 10px;
		}
		
		.col-xs-6 {
			padding-right: 5px;
			padding-left: 5px;
			padding-top: 0px;
		}
		.carousel-indicators {
			position: absolute;
			top: 0;   
		    left: 50%;
		    z-index: 15;
		    width: 60%;
		    padding-left: 0;
		    margin-left: -30%;
		    text-align: center;
		    list-style: none;
		}
		.carousel-indicators .active {
		    width: 12px;
		    height: 12px;
		    margin: 0;
		    background-color:#169BD5;
		}
		.carousel-indicators li {
		    display: inline-block;
		    width: 10px;
		    height: 10px;
		    margin: 1px;
		    text-indent: -999px;
		    cursor: pointer;
		    background-color: #000\9;
		    background-color: rgba(0,0,0,0);
		    border: 1px solid #169BD5;
		    border-radius: 10px;
		}
		.col-xs-12{
			padding-left: 0px;
			padding-right: 0px;
		}
		 ol>li{
			margin-left: 10px;
		}
	</style>
</head>

<body style="background-color:#F5F5F5 ;font-family: '微软雅黑';text-align: left;">
	<div class="container" style="width: 100%;padding-left: 0px;padding-right: 0px;">
		<div  class="inpt">
		
			<div class="col-xs-12" style="text-align: center;margin-top: 40px;margin-bottom: 60px;" >
				<img src="__IMAGES__/mei/logo1.jpg" alt="__IMAGES__/mei/logo1.jpg" style="width: 100px;height: 100px;">	
			</div>
			
		    <div class="col-xs-12" style="padding-left: 10px;padding-right: 10px;">
				<input type="number" class="form-control" name="tel" id="tel"  placeholder="请输入手机号码"  style="height: 45px;">
			</div>
			
			<div class="col-xs-12" style="padding-left: 10px;padding-right: 10px;margin-top: 1em;">
				<input type="text" class="form-control" name="invite" id="invite"  placeholder="请输入邀请码"  style="height: 45px;">
				<small>感谢关注原子出发，由于注册人数过多，目前注册采用邀请制，请输入邀请码，敬请谅解。</small>
			</div>
  
		    <div class="col-xs-12" style="margin-top: 1em;">
		    	<div class="col-xs-8"  style="padding-left: 10px;padding-right: 0px;">
		    		<input type="number" class="form-control" name="yzminput" id="yzminput" placeholder="请输入验证码" style="height: 45px;" >
		    	</div>
		    	<div class="col-xs-4">
		    		<div style="font-size: 16px;font-weight: 600;margin-top: 10px;margin-left: 10px;color: #169BD5;" id="yzm">获取验证码</div>
		    	</div>
			</div>
  
			<div class="col-xs-12" style="margin-top:1.5em;margin-bottom: 35px;">
				<input type="hidden"  value="0" id="flag"/>
				<div  style="text-align: left;margin-left: 38px;margin-bottom: 10px;">
					<img src="__IMAGES__/mei/ico_agree-@2x.png"  style="height: 20px;width: 20px;" id="agreephoto" onclick="agreebotton()"/>
					<a style="position: relative;top: 5px;text-decoration: none;">《用户协议》</a>
				</div>
				<button id="submit"  class="btn btn-default btn-lg  btn-block center-block agree" style="font-size:14px;width: 80%;background-color: #169BD5;color: #FFFFFF;font-size: 16px;" >确定注册</button>
			</div>
			
		</div>
	</div>	
</body>

<script src="__PLUS__/Layer/layer.js"></script>
<script>
	function agreebotton() {
		var flag = document.getElementById("flag").value;
		if (flag == 0) {
			document.getElementById("agreephoto").src = "__IMAGES__/mei//ico_noagree-@2x.png";
			$("#flag").val(1);
			$("#submit").css("background-color", "lightgray");
		} else {
			document.getElementById("agreephoto").src = "__IMAGES__/mei/ico_agree-@2x.png";
			$("#flag").val(0);
		$("#submit").css("background-color", "#169BD5");
	
		}
	}

	$(function(){
		$('#submit').attr("disabled", true); 
		$("#yzminput").bind('input porpertychange',function(){
			var code=$("#yzminput").val();
			if(code.length==4 || code==8888){
				$('#submit').attr("disabled", false); 
			}else{
				$('#submit').attr("disabled", true); 
			}
		});
	});
	$('#yzm').click(function(){
		var mobile   = $("#tel").val();
		if(mobile.length==11){
			$.post("<?php echo url('Sms/send_code'); ?>",{mobile:mobile},function(data){
				if(data.status==1){
					layer.msg(data.msg)
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
					layer.alert(data.msg,{title:false,closeBtn:false});
				}
			})
		}else{
			layer.alert('您输入的手机号码有误',{title:false,closeBtn:false});
		}
	})
	
	$('#submit').click(function(){
		var mobile=$("#tel").val();
		var code=$('#yzminput').val();
		var invite=$('#invite').val();
		if(mobile.length!=11){
			layer.alert('手机号码不正确',{title:false,closeBtn:false});
			return false;
		}
		if(invite.length<1){
			layer.alert('邀请码不能为空',{title:false,closeBtn:false});
			return false;
		}
		$.post("<?php echo url('passport/ckmobile'); ?>",{mobile:mobile,code:code,invite:invite},function(data){
			if(data.status==1){
				location.href="<?php echo url('passport/regb'); ?>"
			}else{
				layer.alert(data.msg,{title:false,closeBtn:false});
			}
		})
	})
	</script>

</html>