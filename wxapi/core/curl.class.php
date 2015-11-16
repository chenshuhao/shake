<?php
namespace wxapi\core;

/**
 * curl工具
 */
class curl {

	private static $_ch;
	private static $_header;
	private static $_body;
	
	private static $_cookie = array();
    private static $_options = array();
    private static $_url = array();
    private static $_referer = array();

    /**
     * 调用外部url
     * @param $queryurl
     * @param $param 参数
     * @param string $method
     * @return bool|mixed
     */
    public static function callwebserver($queryurl, $param = '', $method = 'get', $is_json = true, $is_urlcode = true) {
        if (empty($queryurl)) {
            return false;
        }
        $method = strtolower($method);
        $ret = '';
        $param = empty($param) ? array() : $param;
        self::_init();
        if ($method == 'get') {
            $ret = self::_httpget($queryurl, $param);
        } elseif ($method == 'post') {
            $ret = self::_httppost($queryurl, $param, $is_urlcode);
        }
        if (!empty($ret)) {
            if ($is_json) {
                return json_decode($ret, true);
            } else {
                return $ret;
            }
        }
        return true;
    }

    private static function _init() {
        self::$_ch = curl_init();
        curl_setopt(self::$_ch, CURLOPT_HEADER, true);// 如果你想把一个头包含在输出中，设置这个选项为一个非零值
        curl_setopt(self::$_ch, CURLOPT_RETURNTRANSFER, true);// 如果成功只将结果返回，不自动输出任何内容。如果失败返回false
    }

    public static function setoption($optarray = array()) {
		foreach ($optarray as $opt) {
			curl_setopt(self::$_ch, $opt['key'], $opt['value']);
		} 
	}
	
	private static function _close() {
		if (is_resource(self::$_ch)) {  
            curl_close(self::$_ch);
        }
        return true;
	}
	
	private static function _httpget($url, $query = array()) {
        if (!empty($query)) {
            $url .= (strpos($url, '?') === false) ? '?' : '&';  
            $url .= is_array($query) ? http_build_query($query) : $query;  
        }
        curl_setopt(self::$_ch, CURLOPT_URL, $url);
        curl_setopt(self::$_ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(self::$_ch, CURLOPT_HEADER, 0);
        curl_setopt(self::$_ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt(self::$_ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt(self::$_ch, CURLOPT_SSLVERSION, 1);
        $ret = self::_execute();
        self::_close();
        return $ret;
	}
	
	private static function _httppost($url, $query = array(), $is_urlcode = true) {
  		if (is_array($query)) {
            foreach ($query as $key => $val) {  
				if ($is_urlcode) {
                    $encode_key = urlencode($key);
                } else {
                    $encode_key = $key;
                }
				if ($encode_key != $key) {  
					unset($query[$key]);  
				}
                if ($is_urlcode) {
                    $query[$encode_key] = urlencode($val);
                } else {
                    $query[$encode_key] = $val;
                }
            }  
        }

        curl_setopt(self::$_ch, CURLOPT_URL, $url);
        curl_setopt(self::$_ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(self::$_ch, CURLOPT_HEADER, 0);
        curl_setopt(self::$_ch, CURLOPT_POST, true);
        curl_setopt(self::$_ch, CURLOPT_POSTFIELDS, $query);
        curl_setopt(self::$_ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt(self::$_ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt(self::$_ch, CURLOPT_SSLVERSION, 1);

        $ret = self::_execute();
        self::_close();
        return $ret;  
	}
	
	private static function _put($url, $query = array()) {
		curl_setopt(self::$_ch, CURLOPT_CUSTOMREQUEST, 'PUT');  
		return self::_httppost($url, $query);
	}

	private static function _delete($url, $query = array()) {
		curl_setopt(self::$_ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
		return self::_httppost($url, $query);
	}

	private static function _head($url, $query = array()) {
		curl_setopt(self::$_ch, CURLOPT_CUSTOMREQUEST, 'HEAD');
		return self::_httppost($url, $query);
	}
	
	private static function _execute() {
		$response = curl_exec(self::$_ch);
		$errno = curl_errno(self::$_ch);
		if ($errno > 0) {
			throw new \exception(curl_error(self::$_ch), $errno);
		}
		return  $response;
	}
}