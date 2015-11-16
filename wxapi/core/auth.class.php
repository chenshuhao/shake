<?php
namespace wxapi\core;

class auth {

    /**
     * 获取微信服务器IP列表
     */
    public static function getwechatiplist() {
        // 获取access_token
        $accesstoken = accesstoken::getaccesstoken();
        $url = 'https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=' . $accesstoken;
        return curl::callwebserver($url, '', 'get');
    }
}