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
if ($type == "refuse") {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["ReimStatus"] = 3;
    $arr["RefuseText"] = _post("text");
    $result = $info->updateInfo($arr);
    echo returnResult($result, 1);
    exit();
}
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
} elseif (isset($_POST ["audit"])) {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["ReimStatus"] = 2;
    $arr["ReimExam"] = _post("reim_exam");
    $arr["ExamDate"] = _post("examdate");
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "审核成功";
    } else {
        $result = "审核失败，请重试！";
    }
    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["grant"])) {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["ReimStatus"] = 4;
    $arr["GrantAmount"] = _post("grant_amount");
    $arr["FinanceName"] = _post("finance_name");
    $arr["VoucherNum"] = _post("voucher_num");
    $arr["GrantDate"] = _post("grantdate");
    $arr["GrantPerson"] = _post("grantperson");
    $arr["GrantDesc"] = _post("grant_desc");
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "发放成功";
    } else {
        $result = "发放失败，请重试！";
    }
    echo returnResult($result, 1);
    exit();
}