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
require DT_ROOT . '/Class/UserClass.php';
$info = new UserClass();
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
    $arr["UserAccount"] = _post("user_account");
    $arr["UserPassword"] = _post("user_pass");
    $arr["UserCode"] = _post("user_code");
    $arr["UserDepart"] = _post("user_depart");
    $arr["UserRoleId"] = _post("user_role");
    $arr["UserName"] = _post("user_name");
    $arr["Phone"] = _post("user_phone");
    $arr["UserNum"] = _post("user_num");
    $arr["Address"] = _post("user_address");
    $result = $info->insertInfo($arr);
    if ($result > 0) {
        $result = "添加成功";
    }
    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["modify"])) {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["UserAccount"] = _post("user_account");
    $arr["UserPassword"] = _post("user_pass");
    $arr["UserCode"] = _post("user_code");
    $arr["UserRoleId"] = _post("user_role");
    $arr["UserDepart"] = _post("user_depart");
    $arr["UserName"] = _post("user_name");
    $arr["Phone"] = _post("user_phone");
    $arr["UserNum"] = _post("user_num");
    $arr["Address"] = _post("user_address");
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "修改成功";
    } else {
        $result = "修改失败，请重试！";
    }
    echo returnResult($result, 1);
    exit();
}