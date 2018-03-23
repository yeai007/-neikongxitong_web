<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require("../../common.php");
require DT_ROOT . '/Class/PerformanceLevelClass.php';
$info = new PerformanceLevelClass();
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
    $arr["PerformanceLevelCode"] = _post("level_code");
    $arr["PerformanceLevelName"] = _post("level_name");
    $arr["PerformanceLevelPro"] = _post("level_pro");
    $result = $info->insertInfo($arr);
    if ($result > 0) {
        $result = "添加成功";
    }
    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["modify"])) {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["PerformanceLevelCode"] = _post("level_code");
    $arr["PerformanceLevelName"] = _post("level_name");
    $arr["PerformanceLevelPro"] = _post("level_pro");
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "修改成功";
    } else {
        $result = "修改失败，请重试！";
    }
    echo returnResult($result, 1);
    exit();
}