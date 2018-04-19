<?php

/**
 * @author  PVer
 * @date    2018-4-18 9:03:09
 * @version V1.0
 * @desc    
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
require DT_ROOT . '/Class/MessageClass.php';
$info = new MessageClass();
$type = _post("type");
if ($type == "delete") {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["Status"] = 1;
    $result = $info->updateInfo($arr);
    echo returnResult($result, 1);
    exit();
}
if (isset($_POST ["add"])) {
    $arr = array();
    $arr["Title"] = _post("title");
    $arr["CreateTime"] = _post("createtime");
    $arr["Content"] = _post("content");
    $arr["Status"] = 0;
    $arr["CreatePerson"] = $user['UserName'];
    $arr["CreatePersonId"] = $user['UserId'];
    $result = $info->insertInfo($arr);
    if ($result > 0) {
        $result = "添加成功";
    }
    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["modify"])) {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["Title"] = _post("title");
    $arr["CreateTime"] = _post("createtime");
    $arr["Content"] = _post("content");
    $arr["Status"] = 0;
    $arr["CreatePerson"] = $user['UserName'];
    $arr["CreatePersonId"] = $user['UserId'];
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "修改成功";
    } else {
        $result = "修改失败，请重试！";
    }

    echo returnResult($result, 1);
    exit();
}