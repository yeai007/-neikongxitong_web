<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!session_id()) {
    session_start();
}
require("../../common.php");
require DT_ROOT . '/Class/UserClass.php';
$info = new UserClass();
$type = _post("type");
if ($type == "login") {
    $code = _post("code");
    $pass = _post("pass");
    if ($info->checkInfo($code)) {
        $result = $info->loginInfo($code, $pass);
        if ($result == 0) {
            $result = "密码错误！";
            echo returnResult($result, 0);
        } else {
            $_SESSION['user'] = $result;
            echo returnResult($result, 1);
        }
    } else {
        $result = "用户不存在！";
        echo returnResult($result, 0);
    }
    exit();
}