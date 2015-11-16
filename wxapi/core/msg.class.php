<?php
namespace wxapi\core;

/**
 * 错误提示类
 */
class msg {

	/**
	 * 返回错误信息 ...
	 * @param int $code 错误码
	 * @param string $errormsg 错误信息
	 * @return ambigous <multitype:unknown , multitype:, boolean>
	 */
	public static function returnerrmsg($code, $errormsg = null) {
		$returnmsg = array('error_code' => $code);
		if (!empty($errormsg)) {
			$returnmsg['custom_msg'] = $errormsg;
		}
        $returnmsg['custom_msg'] = '出错啦！' . $returnmsg['custom_msg'];
        exit($returnmsg['custom_msg']);
	}
}