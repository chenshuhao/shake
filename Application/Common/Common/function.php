<?php
	/**
	 * Created by PhpStorm.
	 * User: chenshuhao
	 * Date: 15-11-6
	 * Time: 上午9:12
	 */

	//常量定义
	define('ROOT',realpath(THINK_PATH.'/../'));


	/**
	 * @param       $obj
	 * @param       $page_count
	 * @param array $where
	 * @param null  $order
	 *
	 * @return array
	 */
	function page($obj, $page_count, $where = array(), $order = NULL)
	{
		$obj = $obj->where($where);

		$count = $obj->count();
		$Page = new \Think\Page($count, $page_count);
		$show = $Page->show();// 分页显示输出

		$list = $obj->order($order)->limit($Page->firstRow . ',' . $Page->listRows)->select();

		return array('list' => $list, 'show' => $show);

	}

	/**
	 * @param        $key
	 * @param string $dir
	 * @param int    $size
	 * @param array  $type
	 *
	 * @return array
	 */
	function uploads($key, $dir = './Uploads/', $size = 3145728, $type = array('jpg', 'gif', 'png', 'jpeg'))
	{
		$upload = new \Think\Upload();
		$upload->maxSize = $size;
		$upload->exts = $type;
		$upload->rootPath = $dir;
		$info = $upload->uploadOne($_FILES[ $key ]);
		if (!$info) {
			return array('err_msg' => 'error', 'msg' => $upload->getError());
		} else {
			return array('err_msg' => 'ok', 'file_path' => $info['savepath'] . $info['savename']);
		}
	}


	/**
	 * convert simplexml object to array sets
	 * $array_tags 表示需要转为数组的 xml 标签。例：array('item', '')
	 * 出错返回False
	 *
	 * @param object $simplexml_obj
	 * @param array $array_tags
	 * @param int $strip_white 是否清除左右空格
	 * @return mixed
	 */
	function simplexml_to_array($simplexml_obj, $array_tags=array(), $strip_white=1)
	{
		if( is_object($simplexml_obj) )
		{
			if( count($simplexml_obj)==0 )
				return $strip_white?trim((string)$simplexml_obj):(string)$simplexml_obj;

			$attr = array();
			foreach ($simplexml_obj as $k=>$val) {
				if( !empty($array_tags) && in_array($k, $array_tags) ) {
					$attr[] = simplexml_to_array($val, $array_tags, $strip_white);
				}else{
					$attr[$k] = simplexml_to_array($val, $array_tags, $strip_white);
				}
			}
			return $attr;
		}

		return false;
	}

	function get_xml_array($xml)
	{
		$xml = str_replace( array( '<![CDATA[' , ']]>'), array( '' , '' ), $xml );
		if(is_array($xml = simplexml_to_array(simplexml_load_string($xml)))){
			return $xml;
		}
		return false;
	}