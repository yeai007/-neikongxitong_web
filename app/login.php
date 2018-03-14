<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../common.php';
include 'AppAction.php';
require_once '../Class/UserClass.php';
$phone = _post("PhoneNumber");
$pass = _post("PassWord");
$info = new UserClass();
if ($info->checkInfo($phone)) {
    $info->setInfoByPhone($phone);
    if ($info->getPassWord() == $pass) {
        echo app_wx_iconv_result('login', false, '登录成功', 0, 0, 0, $info->getInfo($info->getUserId()));
    } else {
        echo app_wx_iconv_result('login', false, '密码错误', 0, 0, 0, 0);
    }
} else {
    echo app_wx_iconv_result('login', false, '用户不存在', 0, 0, 0, 0);
}






