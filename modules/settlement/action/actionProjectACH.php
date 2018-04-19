<?php

/**
 * @author  PVer
 * @date    2018-4-14 16:00:42
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
require DT_ROOT . '/Class/ProjectACHClass.php';
$info = new ProjectACHClass();

$type = _post("type");
$projectid = _post("projectid");
$unitid = _post("unitid");
if ($type == "delete") {
    $code = _post("id");
    $info->setInfo($id);
    $arr = array();
    $arr["AccountStatus"] = 0;
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "解除成功";
    } if ($result > -1) {
        $result = "解除失败";
    }
    echo returnResult($result, 1);
    exit();
}
if ($type = "account") {
    $code = _post("id");
    if (!$info->check($projectid, $unitid)) {
        $temp = $info->getThisACH($projectid, $unitid);
        $arr = array();
        date_default_timezone_set('PRC');
        $arr["ProCode"] = $temp["ProjectCode"];
        $arr["ProName"] = $temp["ProjectName"];
        $arr["UnitId"] = $temp["UnitId"];
        $arr["UnitName"] = $temp["UnitName"];
        $arr["BusType"] = $temp["BusType"];
        $arr["BusTypeName"] = $temp["BusTypeName"];
        $arr["ReceiveAmount"] = $temp["ReceiveAmount"];
        $arr["PersonalAmount"] = $temp["PersonalAmount"];
        $arr["PublicAmount"] = $temp["PublicAmount"];
        $arr["AchAmount"] = $temp["AmountACH"];
        $arr["Personal"] = $temp["CustomerContact"];
        $arr["AccountStatus"] = 1;
        $arr["AccountDate"] = date('y-m-d h:i:s', time());
        $arr["AccountPerson"] = $user["UserName"];
        $arr["AccountPersonId"] = $user["UserId"];
        $result = $info->insertInfo($arr);
        if ($result > 0) {
            $result = "核算成功-1";
        } else {
            $result = "核算失败-1";
        }
    } else {
        $info->setInfoByCode($projectid, $unitid);
        $temp = $info->getThisACH($projectid, $unitid);
        $arr = array();
        date_default_timezone_set('PRC');
        $arr["ProCode"] = $temp["ProjectCode"];
        $arr["ProName"] = $temp["ProjectName"];
        $arr["UnitId"] = $temp["UnitId"];
        $arr["UnitName"] = $temp["UnitName"];
        $arr["BusType"] = $temp["BusType"];
        $arr["BusTypeName"] = $temp["BusTypeName"];
        $arr["ReceiveAmount"] = $temp["ReceiveAmount"];
        $arr["PersonalAmount"] = $temp["PersonalAmount"];
        $arr["PublicAmount"] = $temp["PublicAmount"];
        $arr["AchAmount"] = $temp["AmountACH"];
        $arr["Personal"] = $temp["CustomerContact"];
        $arr["AccountStatus"] = 1;
        $arr["AccountDate"] = date('y-m-d h:i:s', time());
        $arr["AccountPerson"] = $user["UserName"];
        $arr["AccountPersonId"] = $user["UserId"];
        $result = $info->updateInfo($arr);
        if ($result > -1) {
            $result = "核算成功-2";
        } else {
            $result = "核算失败-2";
        }
    }
    echo returnResult($result, 1);
    exit();
} 