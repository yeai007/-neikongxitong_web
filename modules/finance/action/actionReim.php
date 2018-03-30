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
require("../../../common.php");
require DT_ROOT . '/Class/ReimClass.php';
$info = new ReimClass();
$type = _post("type");
if ($type == "delete") {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["ReimStatus"] = 1;
    $result = $info->updateInfo($arr);
    echo returnResult($result, 1);
    exit();
}
if (isset($_POST ["add"])) {
    $arr = array();

    $arr["Year"] = gmdate("Y", strtotime(_post("writedate")));
    $arr["WriteDate"] = _post("writedate");
    $arr["ReimPersonId"] = _post("reim_person_id");
    $arr["ReimPerson"] = _post("reim_person");
    $arr["ProCode"] = _post("pro_code");
    $arr["ProName"] = _post("pro_name");
    $arr["ReimType"] = _post("reim_type");
    $arr["ReimSub"] = _post("reim_sub");
    $arr["ReimAmount"] = _post("reim_amount");
    $arr["ReimDesc"] = _post("reim_desc");
    $arr["WritePerson"] = _post("write_person");
    $result = $info->insertInfo($arr);
    if ($result > 0) {
        $result = "添加成功";
    }
    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["modify"])) {
    $info->setInfo(_post("id"));
    $arr = array();
     $arr["Year"] = gmdate("Y", strtotime(_post("writedate")));
    $arr["WriteDate"] = _post("writedate");
    $arr["ReimPersonId"] = _post("reim_person_id");
    $arr["ReimPerson"] = _post("reim_person");
    $arr["ProCode"] = _post("pro_code");
    $arr["ProName"] = _post("pro_name");
    $arr["ReimType"] = _post("reim_type");
    $arr["ReimSub"] = _post("reim_sub");
    $arr["ReimAmount"] = _post("reim_amount");
    $arr["ReimDesc"] = _post("reim_desc");
    $arr["WritePerson"] = _post("write_person");
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "修改成功";
    } else {
        $result = "修改失败，请重试！";
    }
    echo returnResult($result, 1);
    exit();
} 