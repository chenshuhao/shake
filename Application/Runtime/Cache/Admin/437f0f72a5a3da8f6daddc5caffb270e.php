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
        <h2>配置设备</h2>
        <blockquote>
            <p class="font14 darkcyan">配置设备信息,使用配置软件(点击下载)进行配置<br>
                您可以用微信扫一扫下面的二维码,即可用手机查看</p>
        </blockquote>

        <table class="col-md-12">
            <tr>
                <td class="col-md-2">
                         <img src="/shake/Public/qecode_drive/<?php echo ($drive_info["id"]); ?>.png" width="100%">
                </td>

                <td class="col-md-10">
                    <p class="bg-primary margin0 paddingt5 padding-l15">设备ID:<?php echo ($drive_info["device_id"]); ?></p>

                    <p class="bg-success margin0 paddingt5 padding-l15">UUID:<?php echo ($drive_info["uuid"]); ?></p>

                    <p class="bg-info margin0 paddingt5 padding-l15">Major:<?php echo ($drive_info["major"]); ?></p>

                    <p class="bg-warning margin0 paddingt5 padding-l15">Minor:<?php echo ($drive_info["minor"]); ?></p>

                    <p class="bg-danger margin0 paddingt5 padding-l15">备注信息: <input type="text" value="<?php echo ($drive_info["comment"]); ?>"
                                                                        disabled="false"></p>
                </td>
            </tr>
        </table>
    </div>
</div>


</div>

<div class="warning">

</div>


		<script src="/shake/Public/js/includ.js"></script>
</body>
</html>