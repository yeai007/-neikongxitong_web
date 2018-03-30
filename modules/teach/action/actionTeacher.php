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
require DT_ROOT . '/Class/TeacherClass.php';
$info = new TeacherClass();
$type = _post("type");
if ($type == "delete") {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["TeacherStatus"] = 1;
    $result = $info->updateInfo($arr);
    echo returnResult($result, 1);
    exit();
}
if (isset($_POST ["add"])) {
    $arr = array();
    $arr["TeacherName"] = _post("teacher_name");
    $arr["TeacherSex"] = _post("teacher_sex");
    $arr["TeacherPNum"] = _post("teacher_pnum");
    $arr["TeacherPhone"] = _post("teacher_phone");
    $arr["QQ"] = _post("teacher_qq");
    $arr["Wechat"] = _post("teacher_wechat");
    $arr["CardNum"] = _post("card_num");
    $arr["OpeningBank"] = _post("opening_bank");
    $arr["BankAddress"] = _post("bank_address");
    $arr["FeeStandard"] = _post("fee_standard");
    $arr["TeacherDesc"] = _post("teacher_desc");
    $arr["WritePerson"] = _post("write_person");
    $arr["WriteDate"] = _post("write_date");
    $result = $info->insertInfo($arr);
    if ($result > 0) {
        $result = "添加成功";
    }
    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["modify"])) {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["TeacherName"] = _post("teacher_name");
    $arr["TeacherSex"] = _post("teacher_sex");
    $arr["TeacherPNum"] = _post("teacher_pnum");
    $arr["TeacherPhone"] = _post("teacher_phone");
    $arr["QQ"] = _post("teacher_qq");
    $arr["Wechat"] = _post("teacher_wechat");
    $arr["CardNum"] = _post("card_num");
    $arr["OpeningBank"] = _post("opening_bank");
    $arr["BankAddress"] = _post("bank_address");
    $arr["FeeStandard"] = _post("fee_standard");
    $arr["TeacherDesc"] = _post("teacher_desc");
    $arr["WritePerson"] = _post("write_person");
    $arr["WriteDate"] = _post("write_date");
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "修改成功";
    } else {
        $result = "修改失败，请重试！";
    }

    echo returnResult($result, 1);
    exit();
}