<?php
namespace wxapi\core;

/**
 * 微信access_token的获取与过期检查
 */
class accesstoken {

    /**
     * 获取微信access_token
     */
    public static function getaccesstoken() {
        // 检测本地是否已经拥有access_token，并且检测access_token是否过期
        $accesstoken = self::_checkaccesstoken();
        if ($accesstoken === false) {
            $accesstoken = self::_getaccesstoken();
        }
        return $accesstoken['access_token'];
    }

    /**
     * @descrpition 从微信服务器获取微信access_token
     * @return ambigous|bool
     */
    private static function _getaccesstoken() {
        $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . WECHAT_APPID . '&secret=' . WECHAT_APPSECRET;
        $accesstoken = curl::callwebserver($url, '', 'get');
        if (!isset($accesstoken['access_token'])) {
            return msg::returnerrmsg(msgconstant::ERROR_GET_ACCESS_TOKEN, '获取ACCESS_TOKEN失败');
        }
        $accesstoken['time'] = time();
        $accesstokenjson = json_encode($accesstoken);
        // 存入数据库
        /**
         * 这里通常我会把access_token存起来，然后用的时候读取，判断是否过期，如果过期就重新调用此方法获取，存取操作请自行完成
         *
         * 请将变量$accesstokenjson给存起来，这个变量是一个字符串
         */
        $f = fopen('access_token', 'w+');
        fwrite($f, $accesstokenjson);
        fclose($f);
        return $accesstoken;
    }

    /**
     * @descrpition 检测微信access_token是否过期,-100是预留的网络延迟时间
     * @return bool
     */
    private static function _checkaccesstoken() {
        // 获取access_token。是上面的获取方法获取到后存起来的。
        // $accesstoken = yourdatabase::get('access_token');
        if (file_exists('access_token')) {
            $data = file_get_contents('access_token');
            $accesstoken['value'] = $data;
            if (!empty($accesstoken['value'])) {
                $accesstoken = json_decode($accesstoken['value'], true);
                if (time() - $accesstoken['time'] < $accesstoken['expires_in'] - 100) {
                    return $accesstoken;
                }
            }
        }
        return false;
    }

    // 删除验证数据
    private static function resetaccesstoken() {
        if (file_exists('access_token')) {
            unlink('access_token');
        }
        return false;
    }
}