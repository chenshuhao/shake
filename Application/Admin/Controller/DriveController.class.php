<?php
	/**
	 * Created by PhpStorm.
	 * User: chenshuhao
	 * Date: 15-11-3
	 * Time: 上午9:57
	 * Copyright Reserved By Ding.No reprint or modify without permission.
	 */

	namespace Admin\Controller;

	class DriveController extends BaseController
	{
		private $model;

		public function _initialize()
		{
			parent::_initialize();
			$this->model = D('Drive');
		}


		public function index()
		{
			$list = $this->model->getDriveList();
			$this->assign($list);

			$this->display();

		}

		public function refreshDrive()
		{
			$res = $this->model->refreshDriveList();
			if (is_array($res)) {
				$this->$res['errmsg']($res['msg']);
			} else {
				$this->redirect('index');
			}
		}

		public function regDrive()
		{
			if (IS_POST) {
				$quantity = I('post.quantity', NULL);
				$apply_reason = I('post.apply_reason', NULL);
				$comment = I('post.comment', NULL);

				if (!$quantity && !$apply_reason && !$comment) $this->error('请填写所有内容');

				$result = $this->model->regDrive((int)$quantity, $apply_reason, $comment);
				$this->$result['errmsg']($result['msg']);
			} else {
				$this->display();
			}
		}

		public function setDriveInfo()
		{
			$drive_id = I('get.drive_id', FALSE, 'int');
			if ($drive_id) {
				$drive_info = $this->model->getDriveInfoById($drive_id);
				if (is_null($drive_info)) {
					$this->error('设备不存在');
				} else {
					if (!file_exists('./Public/qecode_drive/')) $this->error('/Public/qecode_drive/不存在或者目录不可写');
					if (!file_exists('./Public/qecode_drive/' . $drive_id . '.png')) {
						\PHPQRCode\QRcode::png('http://' . $_SERVER['SERVER_NAME'] . U('Home/GetDriveInfo/index', array(
									'UUID'  => $drive_info['uuid'],
									'Major' => $drive_info['major'],
									'Minor' => $drive_info['minor'],
								)
							), './Public/qecode_drive/' . $drive_id . '.png');
					}

					$this->assign('drive_info', $drive_info); // 设备信息

					$this->display();
				}
			} else {
				$this->error('获取设备信息出错');
			}
		}

		//配置页面到设备
		//可绑定多个页面

		public function getPageList()
		{
			echo '123';
			if ($page = $this->model->getPageByUid()) {
				$this->assign($page);
				var_dump($page);
			} else {
				$this->error('系统出错');
			}

		}


	}