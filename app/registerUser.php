<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//ini_set('display_errors', 1);            //错误信息  
//ini_set('display_startup_errors', 1);    //php启动错误信息  
//error_reporting(-1);                    //打印出所有的 错误信息 
require '../common.php';
include 'AppAction.php';
require_once '../Class/UserClass.php';
require_once '../Class/TelehoneCodeClass.php';
$phone = _post("PhoneNumber");
$pass = _post("PassWord");
$code = _post("PhoneCode");
$tel_info = new TelehoneCodeClass();
if ($tel_info->checkInfo($phone, $code)) {
    $info = new UserClass();
    if ($info->checkInfo($phone)) {
        echo app_wx_iconv_result('registerUser', false, '用户已经存在nouser', 0, 0, 0, 0);
    } else {
        $param = array();
        $param['UserName'] = $phone;
        $param['UserCode'] = $phone;
        $param['UserStatus'] = 0;
        $param['Telephone'] = $phone;
        $param['PassWord'] = $pass;
        $insert = $info->insertInfo($param);
        echo app_wx_iconv_result('registerUser', $insert > 0 ? true : false, $insert > 0 ? '注册成功success' : '注册失败', 0, 0, 0, $insert > 0 ? $info->getInfo($insert) : 0);
    }
} else {
    echo app_wx_iconv_result('registerUser', false, '验证码错误codeerror', 0, 0, 0, 0);
}





