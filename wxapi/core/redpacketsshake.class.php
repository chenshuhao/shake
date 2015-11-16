<?php
	/**
	 * Created by PhpStorm.
	 * User: chenshuhao
	 * Date: 15-11-9
	 * Time: 上午11:38
	 */

	namespace wxapi\core;

	class redpacketsshake
	{
		static public $hbpreorder = 'https://api.mch.weixin.qq.com/mmpaymkttransfers/hbpreorder'; //预下单

		static public function curl_post_ssl($url, $vars, $apiclient_cert, $apiclient_key, $rootca, $second = 30, $aHeader = array())
		{
			$ch = curl_init();
			//超时时间
			curl_setopt($ch, CURLOPT_TIMEOUT, $second);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			//这里设置代理，如果有的话
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);


			//cert 与 key 分别属于两个.pem文件
			curl_setopt($ch, CURLOPT_SSLCERT, $apiclient_cert);
			curl_setopt($ch, CURLOPT_SSLKEY, $apiclient_key);
			curl_setopt($ch, CURLOPT_CAINFO, $rootca);


			if (count($aHeader) >= 1) {
				curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeader);
			}

			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
			$data = curl_exec($ch);
			if ($data) {
				curl_close($ch);

				return $data;
			} else {
				$error = curl_errno($ch);
				curl_close($ch);

				return FALSE;
			}
		}

		static function arrayToXml($arr, $ture = FALSE)
		{
			ksort($arr);
			$xml = "<xml>";
			foreach ($arr as $key => $val) {
				if (is_numeric($val) && $ture) {
					$xml .= "<" . $key . ">" . $val . "</" . $key . ">";

				} else {
					$xml .= "<" . $key . "><![CDATA[" . $val . "]]></" . $key . ">" . PHP_EOL;
				}
			}
			$xml .= "</xml>";

			return $xml;
		}

		static function getSign($con, $pay_key)
		{
			ksort($con);
			foreach ($con as $key => $val) {
				$str[] = $key . '=' . $val;
			}
			$str[] = 'key=' . $pay_key;
			$sign = join('&', $str);

			return $sign = strtoupper(md5($sign));
		}

		static function getNonceStr($len)
		{
			$str = '1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
			$rstr = '';
			for ($i = 0; $i < $len; $i++) {
				$rstr .= $str[ mt_rand(0, strlen($str)) ];
			}

			return $rstr;

		}

//	$post_arr = array(
//		'mch_billno' => '',
//		'mch_id' => '',
//		'wxappid' => '',
//		'send_name' => '',
//		'hb_type' => '',
//		'total_amount' => '',
//		'total_num' => '',
//		'amt_type' => '',
//		'wishing' => '',
//		'act_name' => '',
//		'remark ' => '',
//		'auth_mchid ' => '',
//		'auth_appid ' => '',
//		'risk_cntl ' => '',
//	);

		/**
		 * @param array  $arr
		 * @param string $key
		 */
		static public function hbpreorder($arr = array(), $key, $apiclient_cert, $apiclient_key, $rootca)
		{
			$arr['nonce_str'] = self::getNonceStr(32);
			$arr['sign'] = self::getSign($arr, $key);

			$xml = self::arrayToXml($arr);

			return self::curl_post_ssl(self::$hbpreorder, $xml, $apiclient_cert, $apiclient_key, $rootca);

		}


		static public function mchBillno($mch_id)
		{
			$str = $mch_id;
			$str .= date('Ymd');

			return $str .= date('ids') . mt_rand(1000, 9999);
		}
	}