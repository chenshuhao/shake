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

    <!--<a href="<?php echo U('Drive/regDrive');?>">申请设备</a>-->
    <!--<a href="<?php echo U('Drive/refreshDrive');?>">刷新设备</a>-->

    <div class="margin-l15">
        <h2>设备列表</h2>
        <blockquote>
            <p class="font14 darkcyan">如果您没有设备,可以通过左上角的申请按钮申请设备。<br>
                设备需要第一次进行激活，激活完的设备才可以和页面进行绑定哦！<br>
                如果您还没有设置页面可以去右侧的页面选项卡中进行设置。</p>
        </blockquote>
        <div class="row margin-l15  margin-t15px float-r">
            <a class="btn btn-info" href="<?php echo U('RedPackets/addRedPacket');?>">创建红包</a>
        </div>


<table class="table">
    
    <tr>
        <th>ID</th>
        <th>商户订单号</th>
        <!--<th>.mch_id</th>-->
        <!--<th>.wxappid</th>-->
        <th>红包类型</th>
        <th>总金额</th>
        <th>红包发放总人数</th>
        <!--<th>.amt_type</th>-->
        <th>红包祝福语</th>
        <th>活动名称</th>
        <th>备注</th>
        <!--<th>.auth_mchid</th>-->
        <!--<th>.auth_appid</th>-->
        <!--<th>.risk_cntl</th>-->
        <!--<th>.nonce_str</th>-->
        <!--<th>.uid</th>-->
        <!--<th>.sign</th>-->
        <th>创建时间</th>
        <!--<th>.sp_ticket</th>-->
        <th>红包订单号</th>
        <!--<th>发送时间</th>-->
    </tr>

    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($list["id"]); ?></td>
            <td><?php echo ($list["mch_billno"]); ?></td>
            <!--<td><?php echo ($list["mch_id"]); ?></td>-->
            <!--<td><?php echo ($list["wxappid"]); ?></td>-->
            <td>
                <?php echo ($list['hb_type'] == 'NORMAL' ? '普通红包':''); ?>
                <?php echo ($list['hb_type'] == 'GROUP' ? '裂变红包':''); ?>
            </td>
            <td><?php echo ($list["total_amount"]); ?></td>
            <td><?php echo ($list["total_num"]); ?></td>
            <!--<td><?php echo ($list["amt_type"]); ?></td>-->
            <td><?php echo ($list["wishing"]); ?></td>
            <td><?php echo ($list["act_name"]); ?></td>
            <td><?php echo ($list["remark"]); ?></td>
            <!--<td><?php echo ($list["auth_mchid"]); ?></td>-->
            <!--<td><?php echo ($list["auth_appid"]); ?></td>-->
            <!--<td><?php echo ($list["risk_cntl"]); ?></td>-->
            <!--<td><?php echo ($list["nonce_str"]); ?></td>-->
            <!--<td><?php echo ($list["uid"]); ?></td>-->
            <!--<td><?php echo ($list["sign"]); ?></td>-->
            <td><?php echo (date('Y-m-d H:i:s',$list["addtime"])); ?></td>
            <!--<td><?php echo ($list["sp_ticket"]); ?></td>-->
            <td><?php echo ($list["detail_id"]); ?></td>
            <!--<td><?php echo ($list["send_time"]); ?></td>-->
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
        </div></div>