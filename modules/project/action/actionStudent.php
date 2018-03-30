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
require DT_ROOT . '/Class/StudentClass.php';
$info = new StudentClass();
$type = _post("type");
if ($type == "delete") {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["StudentStatus"] = 1;
    $result = $info->updateInfo($arr);
    echo returnResult($result, 1);
    exit();
}
if (isset($_POST ["add"])) {
    $arr = array();
    $arr["ProjectCode"] = _post("project_code");
    $arr["ProjectName"] = _post("project_name");
    $arr["StudentName"] = _post("student_name");
    $arr["StudentPhone"] = _post("student_phone");
    $arr["StudentNum"] = _post("student_num");
    $arr["UnitName"] = _post("unit_name");
    $arr["ChargeAmount"] = _post("charge_amount");
    $arr["WriteDate"] = _post("write_date");
    $arr["WritePerson"] = $user["UserName"];
    $result = $info->insertInfo($arr);
    if ($result > 0) {
        $result = "添加成功";
    }
    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["modify"])) {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["ProjectCode"] = _post("project_code");
    $arr["ProjectName"] = _post("project_name");
    $arr["StudentName"] = _post("student_name");
    $arr["StudentPhone"] = _post("student_phone");
    $arr["StudentNum"] = _post("student_num");
    $arr["UnitName"] = _post("unit_name");
    $arr["ChargeAmount"] = _post("charge_amount");
    $arr["WriteDate"] = _post("write_date");
    $arr["WritePerson"] = $user["UserName"];
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "修改成功";
    } else {
        $result = "修改失败，请重试！";
    }

    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["adopt"])) {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["ChargeMode"] = _post("charge_mode");
    $arr["ProjectLeader"] = _post("project_leader");
    $arr["ProjectStatus"] = 1;
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "修改成功";
    } else {
        $result = "修改失败，请重试！";
    }
    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["refuse"])) {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["ProjectStatus"] = 2;
    $arr["RefuseResult"] = _post("text");
    $result = $info->updateInfo($arr);
    echo returnResult($result == 1 ? "拒绝成功" : "拒绝失败", 0);
    exit();
}