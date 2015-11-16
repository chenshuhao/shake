<?php
	function mchBillno($mch_id)
	{
		$str = $mch_id;
		echo $str .= date('Ymd');

		return $str .= date('ids') . mt_rand(1000, 9999);
	}


	echo mchBillno(123123123).PHP_EOL;

	echo microtime();