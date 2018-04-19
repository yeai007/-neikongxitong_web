<?php

/**
 * @author  PVer
 * @date    2018-4-19 10:26:26
 * @version V1.0
 * @desc    
 */
session_start();
// store session data


require( "../../common.php");

require( "../../comm/ImageYZMClass.php");
$info = new ImageYZMClass();
$data = array();
$info->getCode();
$code = $info->getYZM();
$_SESSION['yzm_code'] = $code;
$data = $info->vCode($code, 4, 18);
$arr = array();
$arr["data"] = $data;
$arr["code"] = strtolower($code);
echo json_encode($arr);
exit();
