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
         <a type="button" class="btn btn-success" href="<?php echo U('Drive/regDrive');?>" >申请设备</a>
         <a type="button" class="btn btn-info" href="<?php echo U('Drive/refreshDrive');?>" >刷新设备</a>
     </div>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>设备id</th>
            <th>uuid</th>
            <th>major</th>
            <th>minor</th>
            <th>状态</th>
            <th>最后一次激活时间</th>
            <th>关联店铺id</th>
            <th>关联页面数量</th>
            <th>备注</th>
            <th>添加时间</th>
            <th>批次号</th>
            <th>配置</th>
        </tr>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($list["id"]); ?></td>
                <td><?php echo ($list["device_id"]); ?></td>
                <td><?php echo ($list["uuid"]); ?></td>
                <td><?php echo ($list["major"]); ?></td>
                <td><?php echo ($list["minor"]); ?></td>
                <td><?php echo ($list["status"]); ?></td>
                <td><?php echo ($list["last_active_time"]); ?></td>
                <td><?php echo ($list["poi_id"]); ?></td>
                <td>
                    <?php if($list['page_ids']){ echo count(json_decode($list['page_ids'])); }else{ echo '无关联页面'; } ?>
                </td>
                <td><?php echo ($list["comment"]); ?></td>
                <td><?php echo ($list["addtime"]); ?></td>
                <td><?php echo ($list["apply_id"]); ?></td>
                <td><a href="<?php echo U('Drive/setDriveInfo');?>?drive_id=<?php echo ($list["id"]); ?>">配置</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

    </table>
    <?php echo ($show); ?>
 </div>
</div>
</div>

<div class="warning">

</div>


		<script src="/shake/Public/js/includ.js"></script>
</body>
</html>