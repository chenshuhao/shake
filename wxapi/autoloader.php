<?php
namespace wxapi;

/**
 * 自动载入函数
 */
class autoloader {

    const NAMESPACE_PREFIX = 'wxapi\\';
    
    /**
     * 向PHP注册在自动载入函数
     */
    public static function register() {
        spl_autoload_register(array(new self, 'autoload'));
    }

    /**
     * 根据类名载入所在文件
     */
    public static function autoload($classname) {
        $namespaceprefixstrlen = strlen(self::NAMESPACE_PREFIX);
        if (strncmp(self::NAMESPACE_PREFIX, $classname, $namespaceprefixstrlen) === 0) {
            $classname = strtolower($classname);
            $filepath = str_replace('\\', DIRECTORY_SEPARATOR, substr($classname, $namespaceprefixstrlen));
            $filepath = realpath(__DIR__ . (empty($filepath) ? '' : DIRECTORY_SEPARATOR) . $filepath . '.class.php');
            if (file_exists($filepath)) {
                require_once $filepath;
            } else {
                echo $filepath;
            }
        }
    }
}