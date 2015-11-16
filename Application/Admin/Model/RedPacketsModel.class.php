<?php
	/**
	 * Created by PhpStorm.
	 * User: chenshuhao
	 * Date: 15-11-9
	 * Time: 下午2:09
	 */

	namespace Admin\Model;


	class RedPacketsModel extends BaseModel
	{
		public function getRedPacketsList()
		{
			if ($status) {
				return $dirve_result = page($this, 20, array('status' => $status), array('addtime' => 'desc'));
			} else {
				return $dirve_result = page($this, 20, array(), array('addtime' => 'desc'));
			}
		}


		//	$post_arr = array(
		//		'mch_billno' => '',
		//		'mch_id' => '',
		//		'wxappid' => '',
		//		'send_name' => '',
		//		'hb_type' => '',
		//		'total_amount' => '',
		//		'total_num' => '',
		//		'amt_type' => '',
		//		'wishing' => '',
		//		'act_name' => '',
		//		'remark ' => '',
		//		'auth_mchid ' => '',
		//		'auth_appid ' => '',
		//		'risk_cntl ' => '',
		//	);

		public function addRedpacket($total, $wasing, $act_name, $remark)
		{

			//读取商户配置
			$apiclient_cert = $this->pem_path['apiclient_cert'];
			$apiclient_key = $this->pem_path['apiclient_key'];
			$rootca = $this->pem_path['rootca'];

			$post_arr = array(
				'mch_billno'   =>  \wxapi\core\redpacketsshake::mchBillno(self::$mch_id),
				'mch_id'       => self::$mch_id,
				'wxappid'      => self::$appid,
				'send_name'    => self::$wx_name,
				'hb_type'      => 'NORMAL',
				'total_amount' => $total,
				'total_num'    => 1,   //默认模式 无裂变
				'amt_type'     => 'ALL_RAND',
				'wishing'      => $wasing,
				'act_name'     => $act_name,
				'remark'      => $remark,
				'auth_mchid'  => self::$mch_id,
				'auth_appid'  => self::$appid,
				'risk_cntl'   => 'NORMAL'
			);

			$res = \wxapi\core\redpacketsshake::hbpreorder($post_arr,self::$pay_key,self::$pem_path['apiclient_cert'],self::$pem_path['apiclient_key'],self::$pem_path['rootca'],self::$pay_key);
			if($res){

				$obj_xml = get_xml_array($res);

				if($obj_xml['return_code'] == 'SUCCESS' && $obj_xml['result_code'] != 'SUCCESS'){
					return array('errmsg'=>'error','msg'=>$obj_xml['err_code_des']);
				}elseif($obj_xml['return_code'] == 'SUCCESS' && $obj_xml['result_code'] == 'SUCCESS'){
					$post_arr['sp_ticket'] = $obj_xml['sp_ticket'];
					$post_arr['detail_id'] = $obj_xml['detail_id'];
					$post_arr['send_time'] = $obj_xml['send_time'];
					$post_arr['addtime'] = time();
					$post_arr['uid'] = self::$uid;

					$this->create($post_arr);
					if($this->add()){
						return array('errmsg'=>'success','msg'=>'添加成功');
					}else{
						return array('errmsg'=>'error','msg'=>'请求微信服务器成功,添加本地缓存服务器失败,请联系管理员');
					}
				}
			}else{
				return array('errmsg'=>'error','msg'=>'未知错误');
			}

		}

		public function addLotteryId()
		{

		}

		public function addRedPacketPage()
		{

		}
	}