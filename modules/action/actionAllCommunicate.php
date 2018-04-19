<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
require("../../common.php");
require DT_ROOT . '/Class/CommunicateClass.php';
$info = new CommunicateClass();
$type = _post("type");
if ($type == "delete") {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["Flag"] = 1;
    $result = $info->updateInfo($arr);
    echo returnResult($result, 1);
    exit();
}
if (isset($_POST ["add"])) {
    $arr = array();
    $arr["CommunicateContent"] = _post("communicate_content");
    $arr["CompanyName"] = _post("customer_name");
    $arr["CompanyId"] = _post("customerid");
    $arr["CompanyPerson"] = _post("customercontact");
    $arr["CommunicateMode"] = _post("communicate_mode");
    $arr["CommunicateDate"] = _post("communicate_date");
    $arr["CommunicatePerson"] = $user["UserId"];
    $arr["CommunicateResult"] = _post("communicate_result");
    $result = $info->insertInfo($arr);
    if ($result > 0) {
        $result = "添加成功";
    }
    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["modify"])) {
    $info->setInfo(_post("id"));
    $arr = array();
//    $arr["CompanyName"] = _post("customer_name");
//    $arr["CompanyPerson"] = _post("customercontact");
//    $arr["CommunicateDate"] = _post("communicate_date");
//    $arr["CommunicatePerson"] = $user["UserId"];
    $arr["CompanyId"] = _post("customerid");
    $arr["CommunicateContent"] = _post("communicate_content");
    $arr["CommunicateMode"] = _post("communicate_mode");
    $arr["CommunicateResult"] = _post("communicate_result");
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "修改成功";
    } else {
        $result = "修改失败，请重试！";
    }
    echo returnResult($result, 1);
    exit();
}