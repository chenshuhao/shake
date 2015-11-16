<?php
namespace Admin\Controller;
class IndexController extends BaseController {

    public function index(){

    }

    public function setConfig()
    {
        if(IS_POST){
            //Ajax请求
            D('WechatConfig')->setConfig() && $this->ajaxReturn(array('code'=> 1));
            $this->ajaxReturn(array('code'=> 0));
        }else{
            $config = D('WechatConfig')->getConfig();
            if(is_array($config)) $this->assign('wechatConfig',$config);
            $this->display();
        }
    }


}