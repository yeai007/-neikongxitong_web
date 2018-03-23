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
require DT_ROOT . '/Class/ProjectTypeClass.php';
$info = new ProjectTypeClass();
$type = _post("type");
if ($type == "delete") {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["Flag"] = 1;
    $result = $info->updateInfo($arr);
    echo returnResult($result, 1);
    exit();
}
if (isset($_POST ["add_first"])) {
    $arr = array();
    $arr["Name"] = _post("projecttype_name");
    $arr["ParentId"] = 0;
    $arr["ParentLevel"] = 1;
    $result = $info->insertInfo($arr);
    if ($result > 0) {
        $result = "添加成功";
    } else {
        $result = "添加失败";
    }
    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["add_second"])) {
    $arr = array();
    $arr["Name"] = _post("projecttype_name");
    $arr["ParentId"] = _post("first_level");
    $arr["ParentLevel"] = 2;
    $result = $info->insertInfo($arr);
    if ($result > 0) {
        $result = "添加成功";
    } else {
        $result = "添加失败";
    }
    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["add_third"])) {
    $arr = array();
    $arr["Name"] = _post("projecttype_name");
    $arr["ParentId"] = _post("second_level");
    $arr["ParentLevel"] = 3;
    $result = $info->insertInfo($arr);
    if ($result > 0) {
        $result = "添加成功";
    } else {
        $result = "添加失败";
    }
    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["modify"])) {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["BusTypeName"] = _post("bustype_name");
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "修改成功";
    } else {
        $result = "修改失败，请重试！";
    }

    echo returnResult($result, 1);
    exit();
}