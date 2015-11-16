-- 微信配置表
CREATE TABLE `wechatConfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `appid` varchar(255) NOT NULL COMMENT '微信appid',
  `appsecret` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

ALTER TABLE wechat_config ADD INDEX wechatConfig_uid (uid)

-- 用户表
create table users(
  id int AUTO_INCREMENT PRIMARY KEY not null,
  username VARCHAR(255) NOT NULL ,
  password VARCHAR(32) not null,
  logintime int not null,
  regtime int not null,
  lastlogintime int not null
)ENGINE=innodb default CHARSET utf8;

create table usersextends(
  id int AUTO_INCREMENT PRIMARY KEY NOT NULL ,
  uid int not null
)ENGINE=innodb DEFAULT CHARSET utf8;

-- 页面管理
create table pagemanage (
  id int AUTO_INCREMENT PRIMARY KEY NOT NULL ,
  uid int not null COMMENT '所属id',
  page_id VARCHAR(255) NOT NULL COMMENT '页面id',
  title VARCHAR(12) NOT NULL COMMENT '主标题',
  description VARCHAR(14) NOT NULL COMMENT '副标题',
  page_url VARCHAR(255) COMMENT '跳转连接',
  icon_url VARCHAR(255) NOT NULL COMMENT '图片',
  comment VARCHAR(30) COMMENT '备注',
  addtime int COMMENT '添加时间'
)ENGINE=innodb DEFAULT CHARSET utf8;

-- 设备
CREATE TABLE `reg_drive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `apply_reason` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `poi_id` int(11) DEFAULT NULL,
  `apply_id` float NOT NULL,
  `audit_status` int(11) NOT NULL,
  `audit_comment` varchar(255) DEFAULT NULL,
  `apply_time` int(11) NOT NULL,
  `audit_time` int(11) DEFAULT NULL,
  page_ids VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reg_drive_uid` (`uid`),
  KEY `reg_drive_apply_id` (`apply_id`),
  KEY `reg_drive_apply_audit_status` (`audit_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

CREATE TABLE `drive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` bigint(20) NOT NULL,
  `major` bigint(20) NOT NULL,
  `minor` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `last_active_time` int(11) NOT NULL,
  `uuid` VARCHAR(255) NOT NULL ,
  `poi_id` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  `apply_id` int(11) not NULL ,
  PRIMARY KEY (`id`),
  KEY `drive_device_id` (`device_id`),
  KEY `drive_major` (`major`),
  KEY `drive_minor` (`minor`),
  KEY `drive_status` (`status`),
  KEY `drive_last_active_time` (`last_active_time`),
  KEY `drive_uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- 红包表
create table red_packets(
  id int AUTO_INCREMENT PRIMARY KEY not null,
  mch_billno VARCHAR(255) not null,
  mch_id VARCHAR(255) not null,
  wxappid VARCHAR(255) not null,
  send_name VARCHAR(255) not null,
  hb_type VARCHAR(255) not null,
  total_amount int not null,
  total_num int not null,
  amt_type  VARCHAR(255) not null,
  wishing  VARCHAR(255) not null,
  act_name VARCHAR(255) not null,
  remark VARCHAR(255) not null,
  auth_mchid VARCHAR(255) not null,
  auth_appid VARCHAR(255) not null,
  risk_cntl VARCHAR(255) not null,
  nonce_str VARCHAR(255) not null,
  uid int not null,
  sign VARCHAR(255) not null,
  addtime int not null,
  sp_ticket VARCHAR(255),
  detail_id VARCHAR(255),
  send_time int
)ENGINE=innodb default charset utf8;