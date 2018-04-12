<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ini_set('display_errors', 1);            //错误信息  
ini_set('display_startup_errors', 1);    //php启动错误信息  
error_reporting(-1);                    //打印出所有的 错误信息  
if (!session_id()) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    $_SESSION['userurl'] = $_SERVER['REQUEST_URI'];
    header("location:../login.php?"); //重新定向到其他页面
    exit();
} else {
    $user = $_SESSION['user'][0];
}
require("../../../common.php");
require DT_ROOT . '/Class/ProjectKnotEX.php';
$info = new ProjectKnotEX();

$type = _post("type");
if ($type == "delete") {
    $code = _post("id");
    $info->setInfoByCode($code);
    $arr = array();
    $arr["Status"] = 0;
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "解除成功";
    }
    echo returnResult($result, 1);
    exit();
}
if (isset($_POST ["knot"])) {
    $code = _post("id");
    if (!$info->check($code)) {
        $arr = array();
        date_default_timezone_set('PRC');
        $arr["KnotPerson"] = $user["UserName"];
        $arr["KnotDate"] = date('y-m-d h:i:s', time());
        $arr["KnotPersonId"] = $user["UserId"];
        $arr["Amount"] = _post("amount");
        $arr["ProCode"] = $code;
        $arr["Status"] = 1;
        $result = $info->insertInfo($arr);
        if ($result > 0) {
            $result = "结项成功-1";
        } else {
            $result = "结项失败-1";
        }
    } else {
        $info->setInfoByCode($code);
        $arr = array();
        date_default_timezone_set('PRC');
        $arr["KnotPerson"] = $user["UserName"];
        $arr["KnotDate"] = date('y-m-d h:i:s', time());
        $arr["KnotPersonId"] = $user["UserId"];
        $arr["Amount"] = _post("amount");
        $arr["ProCode"] = $code;
        $arr["Status"] = 1;
        $result = $info->updateInfo($arr);
        if ($result > -1) {
            $result = "结项成功-2";
        } else {
            $result = "结项失败-2";
        }
    }
    echo returnResult($result, 1);
    exit();
} 