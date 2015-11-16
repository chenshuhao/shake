<?php
	/**
	 * Created by PhpStorm.
	 * User: chenshuhao
	 * Date: 15-11-3
	 * Time: 上午10:44
	 * Copyright Reserved By Ding.No reprint or modify without permission.
	 */

	namespace Admin\Model;

	class WechatConfigModel extends BaseModel
	{
		public function getConfig ($uid)
		{
			if (!$uid) return NULL;
			$find_data = $this->where (array('uid' => $uid))->find ();
			if ($find_data) return $find_data;

			return NULL;
		}

		public function setConfig ()
		{
			$appid = I ('post.appid', NULL);
			$appsecret = I ('post.appsecret', NULL);
			$uid = I ('session.userinfo.uid', null);
			$is_add = I ('post.is_add', NULL);
			if (!$uid || !$appid || !$appsecret) return false;

			$data = array(
				'appid'     => $appid,
				'appsecret' => $appsecret,
				'uid'       => $uid
			);
			$data = $this->create ($data);
			if ($is_add) {
				return $this->add();
			}else{
				return $this->where(array('uid'=>$uid))->save($data);
			}
		}

		//初始化
		public function setInit($init = array())
		{
			self::$mch_id = $init['mch_id'];
			self::$appid = $init['appid'];
			self::$wx_name = $init['wx_name'];
			self::$pem_path = $init['pem_path'];

			self::$uid = $init['uid'];

			self::$pay_key = $init['pay_key'];

		}
	}