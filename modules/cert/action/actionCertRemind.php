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
require DT_ROOT . '/Class/CertReceiveClass.php';
$info = new CertReceiveClass();
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
    $arr["ProCode"] = _post("pro_code");
    $arr["ProName"] = _post("pro_name");
    $arr["SubTraining"] = _post("sub_training");
    $arr["SubType"] = _post("sub_type");
    $arr["StudentName"] = _post("student_name");
    $arr["StudentId"] = _post("studentid");
    $arr["StudentNum"] = _post("student_num");
    $arr["UnitName"] = _post("unit_name");
    $arr["Phone"] = _post("student_phone");
    $arr["CertCode"] = _post("cert_code");
    $arr["NextExamDate"] = _post("nextexam_date");
    $arr["IssuingOrgan"] = _post("issuing_organ");
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
    $arr["ProCode"] = _post("pro_code");
    $arr["ProName"] = _post("pro_name");
    $arr["SubTraining"] = _post("sub_training");
    $arr["SubType"] = _post("sub_type");
    $arr["StudentId"] = _post("studentid");
    $arr["StudentName"] = _post("student_name");
    $arr["StudentNum"] = _post("student_num");
    $arr["UnitName"] = _post("unit_name");
    $arr["Phone"] = _post("student_phone");
    $arr["CertCode"] = _post("cert_code");
    $arr["NextExamDate"] = _post("nextexam_date");
    $arr["IssuingOrgan"] = _post("issuing_organ");
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