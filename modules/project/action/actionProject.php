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
require DT_ROOT . '/Class/ProjectClass.php';
$info = new ProjectClass();
$type = _post("type");
if ($type == "delete") {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["ProjectStatus"] = 4;
    $result = $info->updateInfo($arr);
    echo returnResult($result, 1);
    exit();
}
if (isset($_POST ["add"])) {
    if ($info->checkInfo(_post("project_code"))) {
        $result = "编码重复";
    } else {
        $arr = array();
        $arr["ProjectYear"] = _post("project_year");
        $arr["ProjectCode"] = _post("project_code");
        $arr["ProjectBatch"] = _post("project_batch");
        $arr["ProjectType"] = _post("project_type");
        $arr["SubTraining"] = _post("sub_training");
        $arr["SubType"] = _post("sub_type");
        $arr["BusType"] = _post("bus_type");
        $arr["ProjectDate"] = _post("project_date");
        $arr["PlanNum"] = _post("plan_num");
        $arr["PlanAmount"] = _post("plan_amount");
        $arr["ProjectPerson"] = _post("project_person");
        $arr["ProjectDesc"] = _post("project_desc");
        $result = $info->insertInfo($arr);
        if ($result > 0) {
            $result = "添加成功";
        }
    }
    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["modify"])) {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["ProjectYear"] = _post("project_year");
    $arr["ProjectCode"] = _post("project_code");
    $arr["ProjectBatch"] = _post("project_batch");
    $arr["ProjectType"] = _post("project_type");
    $arr["SubTraining"] = _post("sub_training");
    $arr["SubType"] = _post("sub_type");
    $arr["BusType"] = _post("bus_type");
    $arr["ProjectDate"] = _post("project_date");
    $arr["PlanNum"] = _post("plan_num");
    $arr["PlanAmount"] = _post("plan_amount");
    $arr["ProjectPerson"] = _post("project_person");
    $arr["ProjectDesc"] = _post("project_desc");
    $arr["ChargeMode"] = _post("charge_mode");
    $arr["ProjectLeader"] = _post("project_leader");
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
//    $arr["ProjectYear"] = _post("project_year");
//    $arr["ProjectCode"] = _post("project_code");
//    $arr["ProjectBatch"] = _post("project_batch");
//    $arr["ProjectType"] = _post("project_type");
//    $arr["SubTraining"] = _post("sub_training");
//    $arr["SubType"] = _post("sub_type");
//    $arr["BusType"] = _post("bus_type");
//    $arr["ProjectDate"] = _post("project_date");
//    $arr["PlanNum"] = _post("plan_num");
//    $arr["PlanAmount"] = _post("plan_amount");
//    $arr["ProjectPerson"] = _post("project_person");
//    $arr["ProjectDesc"] = _post("project_desc");
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