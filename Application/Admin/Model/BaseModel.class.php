<?php
	/**
	 * Created by PhpStorm.
	 * User: chenshuhao
	 * Date: 15-11-3
	 * Time: 上午11:51
	 * Copyright Reserved By Ding.No reprint or modify without permission.
	 */

	namespace Admin\Model;
	use \Think\Model;


	class BaseModel extends Model
	{
		static public $uid = 1;
		static public $pem_path = array(
			'apiclient_cert' => '',
			'apiclient_key' => '',
			'rootca' => ''
		);

		static public $mch_id;
		static public $appid;
		static public $wx_name;
		static public $pay_key;

	}