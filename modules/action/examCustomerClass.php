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
require DT_ROOT . '/Class/CustomerClass.php';
$info = new CustomerClass();
$id = _post("id");
if (isset($_POST ["exam_adopt"])) {
    $info->setInfo($id);
    $arr = array();
    $arr["Customerlevel"] = _post("customerlevel");
    $arr["PerformanceLevel"] = _post("performancelevel");
    $arr["ExamPerson"] = _post("examperson");
    $arr["ExamDate"] = _post("examdate");
    $arr["CustomerStatus"] = 1;
    $arr["ExamPerson"] = $user["UserId"];
    $result = $info->updateInfo($arr);
    echo returnResult($result == 1 ? "审核通过" : "审核失败", 1);
    exit();
} elseif (isset($_POST ["refuse"])) {
    $info->setInfo($id);
    $arr = array();
    $arr["RefuseText"] = _post("text");
    $arr["ExamDate"] = date("Y-m-d");
    $arr["CustomerStatus"] = 2;
    $arr["ExamPerson"] = $user["UserId"];
    $result = $info->updateInfo($arr);
    echo returnResult($result == 1 ? "拒绝成功" : "拒绝失败", 1);
    exit();
}