<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
//        $this->show('摇一摇 <div style="display:none">yaonimagenaizi</div>');
        echo realpath(THINK_PATH.'/../');
    }
}