<?php

/**
 * @filename common.php  
 * @encoding UTF-8  
 * @author liguangming <JN XianHe>  
 * @datetime 2017-7-11 15:34:13
 *  @version 1.0 
 * @Description
 *  */
//定义文件路径


define('DT_ROOT', str_replace("\\", '/', dirname(__FILE__)));
//引入全局配置文件
$CFG = array();
require DT_ROOT . '/config.php';

//引用通用方法库文件
require_once DT_ROOT . '/comm/currency.php';
//引入模版文件
require_once DT_ROOT . '/vendor/autoload.php';
//模版配置文件

$config = array(
    'cache_dir' => DT_ROOT . '/compilation_cache',
    'template_dir' => DT_ROOT . '/templates'
);
$twig_data = array(
    "url" => $CFG["url"],
    'DT_ROOT' => DT_ROOT
);

//初始化twig框架
require_once DT_ROOT . '/comm/Twig.class.php';
$twigclass = TwigClass::class;
$twig = new $twigclass($config, $twig_data);
$twig->__construct($config, $twig_data);
//定义系统定量
define('DT_CHARSET', $CFG['charset']);
define('DT_PATH', $CFG ['url']);

/**
 * action返回
 */
function returnResult($msg, $status = 0) {
    $msg = array('status' => $status, 'msg' => $msg);
    $str = json_encode($msg);
    return $str;
}

?>