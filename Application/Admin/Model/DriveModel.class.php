<?php
	/**
	 * Created by PhpStorm.
	 * User: chenshuhao
	 * Date: 15-11-6
	 * Time: 上午9:07
	 */
	namespace Admin\Model;


	class DriveModel extends BaseModel
	{
		/**
		 * @param null $status
		 *
		 * @return array
		 */
		public function getDriveList($status = NULL)
		{
			if ($status) {
				return $dirve_result = page($this, 20, array('status' => $status), array('addtime' => 'desc'));
			} else {
				return $dirve_result = page($this, 20, array(), array('addtime' => 'desc'));
			}
		}

		/**
		 * @return array
		 */
		public function driveRegList()
		{
			return $dirve_result = page(M('reg_drive'), 20, array(), array('apply_time' => 'desc'));
		}


		public function refreshDriveList()
		{
			$reg_drive_list = M('reg_drive')->select();
			if (!$reg_drive_list) return array('errmsg' => 'error', 'msg' => '无申请记录');
			foreach ($reg_drive_list as $key => $val) {
				if ($val['audit_status'] == 2) {
					$res = M('drive')->where(array('apply_id' => $val['apply_id']))->select();
					if (!$res) {
						$list = \wxapi\core\shakearound::getDriveListByApplyId($val['apply_id'], $val['quantity']);
						if ($list) $this->addDirve($list, $val['apply_id']);
					}
				} elseif ($val['audit_status'] == 1) {
					$result = \wxapi\core\shakearound::getRegStatus($val['apply_id']);
					if ($result) {
						$res = M('reg_drive')->where(array('apply_id'))->save($result);
						if ($result['audit_status'] == 2) {
							$list = \wxapi\core\shakearound::getDriveListByApplyId($val['apply_id'], $val['quantity']);
							if ($list) $this->addDirve($list, $val['apply_id']);
						}
					}
				}
			}
		}


		/**
		 * @param $drive_list
		 * @param $apply_id
		 *
		 * @return false | string
		 */

		private function addDirve($drive_list, $apply_id)
		{

			foreach ($drive_list as &$val) {
				$val['apply_id'] = $apply_id;
				$val['uid'] = self::$uid;
				$val['addtime'] = time();
			}

			return $this->addAll($drive_list);
		}

		public function regDrive($quantity, $apply_reason, $comment, $poi_id = NULL)
		{
			$result = \wxapi\core\shakearound::deviceapplyid($quantity, $apply_reason, $comment, $poi_id);
			if ($result['errmsg'] == 'success.') {
				$data = array(
					'quantity'      => $quantity,
					'apply_reason'  => $apply_reason,
					'comment'       => $comment,
					'poi_id'        => $poi_id,
					'apply_id'      => $result['data']['apply_id'],
					'audit_status'  => $result['data']['audit_status'],
					'audit_comment' => $result['data']['audit_comment'],
					'apply_time'    => time(),
					'uid'           => self::$uid
				);
				M('reg_drive')->create($data);
				$res = M('reg_drive')->add();
				if ($res) {
					return array('errmsg' => 'success', 'msg' => '申请成功');
				} else {
					return array('errmsg' => 'success', 'msg' => '申请成功,写入数据库失败');
				}
			} else {
				return array('errmsg' => 'error', 'msg' => '申请失败');

			}
		}

		public function getDriveInfoById($drive_id)
		{
			if (!$drive_id && !is_numeric($drive_id)) return FALSE;

			return $this->where(array('id' => $drive_id))->find();
		}


		public function getPageByUid()
		{
			return page(D('pagemanage'), 20, array('uid' => $this->uid), array('addtime' => 'desc'));
		}

	}