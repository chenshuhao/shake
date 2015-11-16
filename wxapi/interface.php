<?php
namespace wxapi;

use wxapi\core\wechat;

// 微信接口唯一入口文件

// 引入配置文件
include_once __DIR__ . '/config.php';

// 引入自动载入函数
include_once __DIR__ . '/autoloader.php';

// 调用自动载入函数
autoloader::register();

// 初始化微信类
$wechat = new wechat(WECHAT_TOKEN, true);

// 首次使用需要注视掉下面这1行（26行），并打开最后一行（29行）
// echo $wechat->run();
$wechat->run();
// 首次使用需要打开下面这一行（29行），并且注释掉上面1行（26行）。本行用来验证URL
// $wechat->checksignature();