<?php
	/**
	 * Created by PhpStorm.
	 * User: chenshuhao
	 * Date: 15-11-3
	 * Time: 上午10:38
	 * Copyright Reserved By Ding.No reprint or modify without permission.
	 */

	namespace Admin\Controller;

	class PageController extends BaseController
	{
		 
		public function index()
		{	
			$res = M('pagemanage')->where(array('uid' => $this->uid ))->select();
			$this->assign("res",$res);
			$this->display();
		}
		//新增页面
		public function add()
		{
			$this->display();
		}
		public function pageadd()
		{

			if(empty($_POST['img'])) $this->error("错误");
			if(empty($_POST['title'])) $this->error("错误");
			if(empty($_POST['description'])) $this->error("错误");

			$img = $_POST['img'];
			$sucai_data = json_decode(\wxapi\core\shakearound::materialadd($img),1);
			$data['icon_url'] = $sucai_data['data']['pic_url'];
			$msg = $sucai_data['errmsg'];
			if($msg == "success."){
				$data['uid'] = $this->uid;
				$data['title'] = $_POST['title'];
				$data['description'] = $_POST['description'];
				$data['comment'] = $_POST['comment'];
				$data['page_url'] = $_POST['page_url'];
				$pages = \wxapi\core\shakearound::pageadd($data['title'],$data['description'],$data['icon_url'],$data['page_url'],$data['comment']);
				$pages_data = json_decode($pages);
				$data['page_id'] = $pages_data['data']['$pages_data'];
				$data['addtime'] = time();
				M('pagemanage')->create($data);
				$r = M('pagemanage')->add();
				if($r) $this->success ( "添加成功!" );
			}else{
				$this->success ( "失败!" );
			}

		}
		public function update()
		{
			$res = M('pagemanage')->where(array('uid' => $this->uid,'page_id' => $_GET['page_id'] ))->find();
			$this->assign("res",$res);
			$this->display();
		}
		public function pageupdate()
		{
			
			if(empty($_POST['title'])) $this->error("错误");
			if(empty($_POST['description'])) $this->error("错误");

			if($_POST['img']){
				$sucai_data = json_decode(\wxapi\core\shakearound::materialadd($img),1);
				$data['icon_url'] = $sucai_data['data']['pic_url'];
			}
			$msg = $sucai_data['errmsg'];
			if($msg == "success."){
				$data['uid'] = $this->uid;
				$data['title'] = $_POST['title'];
				$data['description'] = $_POST['description'];
				$data['icon_url'] = $icon_url;
				$data['comment'] = $_POST['comment'];
				$data['page_url'] = $_POST['page_url'];
				$pages = \wxapi\core\shakearound::pageupdate($data['title'],$data['description'],$data['icon_url'],$data['page_url'],$data['comment']);
				$pages_data = json_decode($pages);
				$data['page_id'] = $pages_data['data']['$pages_data'];
				M('pagemanage')->create($data);
				$r = M('pagemanage')->add();
				if($r) $this->success ( "修改成功!" );
			}else{
				$this->success ( "失败!" );
			}
			
		}
		public function pagedel()
		{
			$id = $_GET['id'];
			$msg = json_decode(\wxapi\core\shakearound::pagedelete($id));
			if($msg == "success."){
				$r = M('pagemanage')->where(array('id' => $id ))->delete();
				if($r) $this->success ( "删除成功!" );
			}
		}
	}