<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>demo</title>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- 可选的Bootstrap主题文件（一般不用引入） -->
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/shake/Public/css/style.css">
</head>
<body>
		<div class="left col-md-2" style="padding:0px;margin: 0px;">
			<div class="center a_logo">
				<img class="logo_a" src="/shake/Public/image/logo.png">
			</div>
			<ul class="left-nav" >
				<li>
					<i class="glyphicon glyphicon-home" style="font-size:13px;margin:0 10px;"></i>
					<a href="<?php echo U('Index/index');?>">首页</a>
					<!-- <span class='size10 glyphicon glyphicon-minus'></span> -->
				</li>
				<li class="active down-level"><i class="glyphicon glyphicon-hdd" style="font-size:13px;margin:0 10px;"></i>设备管理<span class="size10 glyphicon glyphicon-plus " aria-hidden="true"></span>
				</li>
				<ul class="left-nav1" style="display:show;z-index: 99999999">
					<li class="size10">
						<i class="glyphicon glyphicon-align-left" style="font-size:13px;margin:0 10px;"></i>
						<a href="<?php echo U('Drive/index');?>">设备列表</a>
					</li>
					<li class="size10">
						<i class="glyphicon glyphicon-log-in" style="font-size:13px;margin:0 10px;"></i>
						<a href="<?php echo U('Drive/regDrive');?>">申请设备</a>
					</li>
				</ul>
				<li class="down-level"><i class="glyphicon glyphicon-home" style="font-size:13px;margin:0 10px;"></i>卡券管理<span class="size10 glyphicon glyphicon-plus " aria-hidden="true"></span>
				</li>
					<ul class="left-nav1" style="display:none;z-index: 99999999">
						<li class="size10">创建卡券</li>
						<li class="size10">删除卡券</li>
					</ul>			
				<li class="down-level"><i class="glyphicon glyphicon-home" style="font-size:13px;margin:0 10px;"></i>商户管理<span class="size10 glyphicon glyphicon-plus " aria-hidden="true"></span></li>
					<ul class="left-nav1" style="display:none;z-index: 99999999">
						<li class="size10">创建卡券</li>
						<li class="size10">删除卡券</li>
					</ul>
				<li class="down-level"><i class="glyphicon glyphicon-home" style="font-size:13px;margin:0 10px;"></i>卡券核销<span class="size10 glyphicon glyphicon-plus " aria-hidden="true"></span></li>
					<ul class="left-nav1" style="display:none;z-index: 99999999">
						<li class="size10">创建卡券</li>
						<li class="size10">删除卡券</li>
					</ul>
				<li class="down-level"><i class="glyphicon glyphicon-home" style="font-size:13px;margin:0 10px;"></i>主题活动<span class="size10 glyphicon glyphicon-plus " aria-hidden="true"></span></li>
					<ul class="left-nav1" style="display:none;z-index: 99999999">
						<li class="size10">创建卡券</li>
						<li class="size10">删除卡券</li>
					</ul>
				<li>
					<i class="glyphicon glyphicon-home" style="font-size:13px;margin:0 10px;"></i>
					<a href="<?php echo U('Index/setConfig');?>">系统设置</a>
					<!-- <span class='size10 glyphicon glyphicon-minus'></span> -->
				</li>
			</ul>
			<!-- <div class="phone">
				<p>72小时客户服务</p>
				<p>400-6767-235</p>
			</div> -->
		</div>
		<div class="right col-md-10" id="right">
				<div class="top">
				<span class="glyphicon glyphicon-envelope"></span>
					<select name="username" id="username">
						<option value>用户名</option>
						<option value="set">设置</option>
						<option value="quit">退出</option>
					</select>
				</div>
<div class="content">
    <div class="margin-l15">
        <h2>申请设备</h2>
        <blockquote>
            <p class="font14 darkcyan">一个设备可以覆盖约100-300平方米。<br>
                如果您申请的设备大于500,请联系客服人员！</p>
        </blockquote>

        <form action="" method="post" class="col-md-8">

            <div class="form-group ">
                <label for="regNumber">数量：</label>
                <a id="clickMlus" href="javascript:;" class="pointer">-</a>
                <input type="text" style="width:40px;height:30px;text-align: center;" id="regNumber" name="quantity" value="1">
                <a id="clickPlus" href="javascript:;" class="pointer">+</a>
                <p class="help-block">一个设备可以覆盖约100-300平方米。</p>
            </div>
            <div class="form-group ">
                <label for="comment">备注：</label>
                <input type="text" class=" form-control " id="comment" name="comment" placeholder="">
                <span><a>0</a>/15</span>
                <p class="help-block">描述设备的具体位置或用途，以便日后更方便搜索到该设备。15字以内</p>
            </div>
            <div class="form-group ">
                <label for="apply_reason">申请理由：</label>
                <textarea class="form-control" id="apply_reason" name="apply_reason" rows="3"></textarea>
                <span><a>0</a>/100</span>
                <p class="help-block">请认证填写申请理由,不得超过100个汉字</p>
            </div>

            <button type="submit" class="btn btn-default">提交申请</button>

        </form>
    </div>
</div>
</div>

<div class="warning">

</div>


		<script src="/shake/Public/js/includ.js"></script>
</body>
</html>

<script>
    $('button').click(function(){
        if(isNaN($('#regNumber').val())){
            message_err('请填写正确的数字')
            return false
        }

    })

    $('#regNumber').keypress(function(event){
        if(event.keyCode > 57 || event.keyCode < 48){
            message_err('请填写正确的数字')
            return false;
        }

    })

    $('#regNumber').blur(function(){
        if($(this).val() > 500){
            message_err('设备数量不得超过500')
            $(this).val('500')
            return false;
        }
    })

    $('#comment').keyup(function(){
        var len = $(this).val().length
        if(len>15){
            $(this).next().find('a').html(len).css('color','red')
            $(this).parent('.form-group').addClass('has-warning')
            message_err('字数不能超过15')
        }else{
            $(this).parent('.form-group').removeClass('has-warning')
            $(this).next().find('a').html(len);
        }
    })

    $('#apply_reason').keyup(function(){
        var len = $(this).val().length
        console.dir(len)
        if(len>100){
            $(this).next().find('a').html(len).css('color','red')
            $(this).parent('.form-group').addClass('has-warning')
            message_err('字数不能超过100')
        }else{
            $(this).parent('.form-group').removeClass('has-warning')
            $(this).next().find('a').html(len);
        }
    })
</script>