<?php
	/**
	 * Created by PhpStorm.
	 * User: chenshuhao
	 * Date: 15-11-3
	 * Time: 上午10:38
	 * Copyright Reserved By Ding.No reprint or modify without permission.
	 */

	namespace Admin\Controller;
	use \Think\Controller;

	class LoginController extends Controller
	{
		public function index()
		{
			if(IS_POST){
				D('Login')->checkLogin() && $this->ajaxReturn(array('code'=>1),'JSON');
				$this->ajaxReturn(array('code'=>0),'JSON');
			}else{
				$this->display();
			}
		}
	}