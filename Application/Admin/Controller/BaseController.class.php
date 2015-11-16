<?php

	/**
	 * Created by PhpStorm.
	 * User: chenshuhao
	 * Date: 15-11-3
	 * Time: 上午9:57
	 * Copyright Reserved By Ding.No reprint or modify without permission.
	 */

	namespace Admin\Controller;

	use Think\Controller;

	class BaseController extends Controller
	{

		public $uid = NULL;              //当前用户id

		public $pem_path = array();

		public $mch_id = 1272328501;
		public $appid = 'wxee5f674259607538';
		public $wx_name = '人脉圈';
		public $pay_key = '6c5a9c1429b11cbaf6c3b50b222bdff2';


		public function _initialize ()
		{
			//登入后SESSION结构
			//$_SESSION['userinfo'] = array(
			//      'uid'            =>     1,
			//		'username'       =>     'weixin',
			//);

			//获取用户信息
			$this->uid = 1;//$_SESSION['userinfo']['uid'] ? $_SESSION['userinfo']['uid'] : NULL;
			$this->pem_path = array(
				'apiclient_cert' => ROOT.'/pem/apiclient_cert.pem',
				'apiclient_key' => ROOT.'/pem/apiclient_key.pem',
				'rootca' => ROOT.'/pem/rootca.pem'
			);



//			if (CONTROLLER_NAME != 'index' && ACTION_NAME != 'set') {
//				//获取微信配置(uid)
//				$wechat_config = D ('WechatConfig')->getConfig (1);
//				if (!$wechat_config) $this->redirect ('Index/set'); //未设置wxconfig
//			}

			//初始化model层数据
			D('WechatConfig')->setInit(array(
				'mch_id' => $this->mch_id,
				'appid' => $this->appid,
				'wx_name' => $this->wx_name,
				'pem_path' => $this->pem_path,
				'uid' => $this->uid,
				'pay_key'=>$this->pay_key
			));


		}
	}