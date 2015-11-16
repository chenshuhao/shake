<?php
namespace wxapi\core;

/**
 * 通用函数
 */
class common {

    /**
     * 微信api不支持中文转义的json结构
     * @param  [type] $array [description]
     * @return [type]        [description]
     */
    public static function json_encode($array) {
        $parts = array();
        $is_list = false;
        $keys = array_keys($array);
        $max_length = count($array) - 1;
        if (($keys[0] === 0) && ($keys[$max_length] === $max_length)) {
            $is_list = true;
            for ($i = 0; $i < count($keys); $i++) {
                if ($i != $keys[$i]) {
                    $is_list = false;
                    break;
                }
            }
        }
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if ($is_list) {
                    $parts[] = self::json_encode($value);
                } else {
                    $parts[] = '"' . $key . '":' . self::json_encode($value);
                }
            } else {
                $str = '';
                if (!$is_list) {
                    $str = '"' . $key . '":';
                }
                if (!is_string($value) && is_numeric($value) && $value < 2000000000) {
                    $str .= $value;
                } elseif ($value === false) {
                    $str .= 'false';
                } elseif ($value === true) {
                    $str .= 'true';
                } else {
                    $str .= '"' . addslashes($value) . '"';
                }
                $parts[] = $str;
            }
        }
        $json = implode(',', $parts);
        if ($is_list) {
            return '[' . $json . ']';
        }
        return '{' . $json . '}';
    }
}