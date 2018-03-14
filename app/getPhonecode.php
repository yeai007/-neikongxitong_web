<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require '../common.php';
include 'AppAction.php';
require_once '../Class/TelehoneCodeClass.php';
$phone = _post("PhoneNumber");
$info = new TelehoneCodeClass();
$param = array();
$param['Telephone'] = $phone;
$param['Code'] = "1234";
$param['Createtime'] = date('Y-m-d H:i:s', time());
$param['Expir_time'] = date('Y-m-d H:i:s', strtotime("+3 minute", time()));
$update = $info->insertInfo($param);
echo app_wx_iconv_result('getPhonecode', $update > 0 ? true : false, $update > 0 ? '验证码已发送' : '验证码发送失败', 0, 0, 0, $update);
?>
