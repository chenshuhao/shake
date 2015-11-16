<?php
	/**
	 * Created by PhpStorm.
	 * User: chenshuhao
	 * Date: 15-11-9
	 * Time: 下午2:07
	 */
	namespace Admin\Controller;
	class RedPacketsController extends BaseController
	{
		protected  $model;
		public function _initialize()
		{
			parent::_initialize();
			$this->model = D('RedPackets');
		}

		public function index()
		{
			$res = $this->model->getRedPacketsList();
			$this->assign($res);

			$this->display();
		}

		public function addRedPacket()
		{
			if(IS_POST){
				$total = I('post.total','',null);
				$wasing = I('post.wasing','',null);
				$act_name = I('post.act_name','',null);
				$remark = I('post.remark','',null);

				if(!is_numeric($total)) return;
				if(strlen($wasing) > 36) return;
				if(strlen($act_name) > 96) return;
				if(strlen($remark) > 96) return;

				$res = $this->model->addRedpacket($total,$wasing,$act_name,$remark);
//				var_dump($res);
				$this->$res['errmsg']($res['msg']);
			}else{
				$this->display();
			}
		}
	}