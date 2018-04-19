<?php

/**
 * @author  PVer
 * @date    2018-4-17 9:04:41
 * @version V1.0
 * @desc    
 */
ini_set('display_errors', 1);            //错误信息  
ini_set('display_startup_errors', 1);    //php启动错误信息  
error_reporting(-1);                    //打印出所有的 错误信息  
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
require DT_ROOT . '/Class/ProjectKnotClass.php';
$info = new ProjectKnotClass();

$type = _post("type");
if ($type == "delete") {
    $id = _post("id");
    $info->setInfo($id);
    $arr = array();
    $arr["Status"] = 0;
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "解除成功";
    }
    echo returnResult($result, 1);
    exit();
}
if ($type == "knot") {
    $code = _post("projectCode");
    if (!$info->check($code)) {
        $temp = $info->getThis($code);
        $arr = array();
        date_default_timezone_set('PRC');
        $arr["ProCode"] = $temp["ProjectCode"];
        $arr["ProName"] = $temp["ProjectName"];
        $arr["ReceiveAmount"] = $temp["ReceiveAmount"];
        $arr["PaidAmount"] = $temp["ApplyAmount"];
        $arr["TotalAmount"] = $temp["ZCAmount"];
        $arr["GrossProfit"] = $temp["MAmount"];
        $arr["ReimAmount"] = $temp["ReimAmount"];
        $arr["HeadMasterAmount"] = $temp["HeadMasterAmount"];
        $arr["Status"] = 1;
        $arr["KnotPerson"] = $user["UserName"];
        $arr["KnotDate"] = date('y-m-d h:i:s', time());
        $arr["KnotPersonId"] = $user["UserId"];

        $result = $info->insertInfo($arr);
        if ($result > 0) {
            $result = "结项成功-1";
        } else {
            $result = "结项失败-1";
        }
    } else {
        $info->setInfoByCode($code);
        $temp = $info->getThis($code);
        $arr = array();
        date_default_timezone_set('PRC');
        $arr["ProCode"] = $temp["ProjectCode"];
        $arr["ProName"] = $temp["ProjectName"];
        $arr["ReceiveAmount"] = $temp["ReceiveAmount"];
        $arr["PaidAmount"] = $temp["ApplyAmount"];
        $arr["TotalAmount"] = $temp["ZCAmount"];
        $arr["GrossProfit"] = $temp["MAmount"];
        $arr["ReimAmount"] = $temp["ReimAmount"];
        $arr["HeadMasterAmount"] = $temp["HeadMasterAmount"];
        $arr["Status"] = 1;
        $arr["KnotPerson"] = $user["UserName"];
        $arr["KnotDate"] = date('y-m-d h:i:s', time());
        $arr["KnotPersonId"] = $user["UserId"];
        $result = $info->updateInfo($arr);
        if ($result > -1) {
            $result = "结项成功-2";
        } else {
            $result = "结项失败-2";
        }
    }
    echo returnResult($result, 1);
    exit();
} 