<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>设置微信配置</title>
	<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
</head>
<body>
	<form>
		<p>appid:<input type="text" name="appid" value="<?php echo ($wechatConfig["appid"]); ?>"></p>
		<p>appsecret:<input type="text" name="appsecret" value="<?php echo ($wechatConfig["appsecret"]); ?>"></p>
		<p><input type="submit" id="submit"></p>
	</form>
</body>
<script>
	$('#submit').click(function(){
		$.post('<?php echo U('Index/set');?>',$('form').serialize(),function(e){
			if(e.code == 1){
				alert('添加成功');
			}else{
				alert('添加失败');
			}
		},'JSON')
		return false
	});
</script>
</html>