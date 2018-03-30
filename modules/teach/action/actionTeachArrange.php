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
require DT_ROOT . '/Class/TeachArrangeClass.php';
$info = new TeachArrangeClass();
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
    $arr["ProCode"] = _post("pro_code");
    $arr["ProName"] = _post("pro_name");
    $arr["TeachStartDate"] = _post("teach_start_date");
    $arr["TeachEndDate"] = _post("teach_end_date");
    $arr["TeachDays"] = _post("teacher_days");
    $arr["HeaderMaster"] = _post("header_master_id");
    $arr["TeacherFirst"] = _post("first_id");
    $arr["StartDateFirst"] = _post("startdate_first");
    $arr["EndDateFirst"] = _post("enddate_first");
    $arr["TeachDaysFirst"] = _post("teachdays_first");
    $arr["TeacherSecond"] = _post("second_id");
    $arr["StartDateSecond"] = _post("startdate_second");
    $arr["EndDateSecond"] = _post("enddate_second");
    $arr["TeachDaysSecond"] = _post("teachdays_second");
    $arr["TeacherThird"] = _post("third_id");
    $arr["StartDateThird"] = _post("startdate_third");
    $arr["EndDateThird"] = _post("enddate_third");
    $arr["TeachDaysThird"] = _post("teachdays_third");
    $arr["OtherDesc"] = _post("other_desc");
    $arr["ChargePerson"] = _post("charge_person");
    $arr["ArrangeDate"] = _post("arrange_date");

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
    $arr["TeachStartDate"] = _post("teach_start_date");
    $arr["TeacherPhone"] = _post("teach_end_date");
    $arr["HeaderMaster"] = _post("header_master");
    $arr["TeacherFirst"] = _post("teacher_first");
    $arr["StartDateFirst"] = _post("startdate_first");
    $arr["EndDateFirst"] = _post("enddate_first");
    $arr["TeachDaysFirst"] = _post("teachdays_first");
    $arr["TeacherSecond"] = _post("teacher_second");
    $arr["StartDateSecond"] = _post("startdate_second");
    $arr["EndDateSecond"] = _post("enddate_second");
    $arr["TeachDaysSecond"] = _post("teachdays_second");
    $arr["TeacherThird"] = _post("teacher_third");
    $arr["StartDateThird"] = _post("startdate_third");
    $arr["EndDateThird"] = _post("enddate_third");
    $arr["TeachDaysThird"] = _post("teachdays_third");
    $arr["OtherDesc"] = _post("other_desc");
    $arr["ChargePerson"] = _post("charge_person");
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "修改成功";
    } else {
        $result = "修改失败，请重试！";
    }

    echo returnResult($result, 1);
    exit();
}