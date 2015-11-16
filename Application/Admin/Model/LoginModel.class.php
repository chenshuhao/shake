<?php
	/**
	 * Created by PhpStorm.
	 * User: chenshuhao
	 * Date: 15-11-3
	 * Time: 下午4:15
	 * Copyright Reserved By Ding.No reprint or modify without permission.
	 */
	namespace Admin\Model;

	use \Think\Model;

	class LoginModel extends Model
	{
		/*
		 * 验证登入
		 * @return true false
		 * */
		public function checkLogin ()
		{
			$username = I ('post.username', NULL);
			$password = I ('post.password', NULL);
			if (!$username || !$password) return FALSE;

			$password = md5 ($password);

			$result = $this->where (array('username' => $username, 'password' => $password))->find ();
			if ($result) {
				//更新最后登入时间
				$this->where (array('id' => $result['id']))->save (array('lastlogintime' => time ()));
				//写入SESSION
				$_SESSION['userinfo'] = $result;

				return TRUE;
			} else {
				return FALSE;
			}
		}

		/*
		 * 用户注册
		 * @return true false
		 * */

		public function register()
		{

		}
	}