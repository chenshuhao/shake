<?php
namespace wxapi\core;

/**
 * 微信公众平台来来路认证，处理中心，消息分发
 */
class wechat {

    /**
     * 调试模式，将错误通过文本消息回复显示
     * @var boolean
     */
    private $debug;

    /**
     * 以数组的形式保存微信服务器每次发来的请求
     * @var array
     */
    private $request;

    /**
     * 初始化，判断此次请求是否为验证请求，并以数组形式保存
     * @param string $token 验证信息
     * @param boolean $debug 调试模式，默认为关闭
     */
    public function __construct($token, $debug = false) {
        // 未通过消息真假性验证
        if ($this->isValid() && $this->validatesignature($token)) {
            return $_GET['echostr'];
        }
        //是否打印错误报告
        $this->debug = $debug;
        // 接受并解析微信中心POST发送XML数据
        $xml = (array) simplexml_load_string($GLOBALS['HTTP_RAW_POST_DATA'], 'SimpleXMLElement', LIBXML_NOCDATA);

        //将数组键名转换为小写
        $this->request = array_change_key_case($xml, CASE_LOWER);
    }

    /**
     * 判断此次请求是否为验证请求
     * @return boolean
     */
    private function isvalid() {
        return isset($_GET['echostr']);
    }

    /**
     * 判断验证请求的签名信息是否正确
     * @param  string $token 验证信息
     * @return boolean
     */
    private function validatesignature($token) {
        $signature = $_GET['signature'];
        $timestamp = $_GET['timestamp'];
        $nonce = $_GET['nonce'];
        $signaturearray = array($token, $timestamp, $nonce);
        sort($signaturearray, SORT_STRING);
        return sha1(implode($signaturearray)) == $signature;
    }

    /**
     * 获取本次请求中的参数，不区分大小
     * @param  string $param 参数名，默认为无参
     * @return mixed
     */
    protected function getrequest($param = false) {
        if ($param === false) {
            return $this->request;
        }
        $param = strtolower($param);
        if (isset($this->request[$param])) {
            return $this->request[$param];
        }
        return null;
    }

    /**
     * 分析消息类型，并分发给对应的函数
     * @return void
     */
    public function run() {
        return wechatrequest::switchtype($this->request);
    }

    public function checksignature() {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = WECHAT_TOKEN;
        $tmparr = array($token, $timestamp, $nonce);
        sort($tmparr, SORT_STRING);
        $tmpstr = implode($tmparr);
        $tmpstr = sha1($tmpstr);

        if ($tmpstr == $signature) {
            echo $_GET['echostr'];
            return true;
        } else {
            return false;
        }
    }
}