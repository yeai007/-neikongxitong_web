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
require DT_ROOT . '/Class/ApplyInvoiceClass.php';
$info = new ApplyInvoiceClass();
require DT_ROOT . '/Class/StudentClass.php';
$student_info = new StudentClass();
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
    $arr["UnitId"] = _post("unitid");
    $arr["UnitName"] = _post("unit_name");
    $arr["ReceiveAmount"] = _post("receive_amount");
    $arr["InvoicedAmount"] = _post("invoiced_amount");
    $arr["ThisAmount"] = _post("this_amount");
    $arr["InvoiceSub"] = _post("invoice_sub");
    $arr["InvoiceType"] = _post("invoice_type");
    $arr["InvoiceContent"] = _post("invoice_content");
    $arr["Applicant"] = _post("applicant");
    $arr["ApplicationTime"] = _post("applicationtime");
    $arr["ThisStudentIds"] = _post("studentids");
    $studentids = _post("studentids");


    $result = $info->insertInfo($arr);
    if ($result > 0) {
        $upStudentStatu = $student_info->updateStudentBilling($studentids, 1); //更新学员已经申请开票状态
        if ($upStudentStatu > -1) {
            $result = "申请成功";
        } else {
            $info->deleteError($result);
            $result = "申请失败，请重试！";
        }
    }
    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["modify"])) {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["ProCode"] = _post("pro_code");
    $arr["ProName"] = _post("pro_name");
    $arr["UnitId"] = _post("unitid");
    $arr["UnitName"] = _post("unit_name");
    $arr["ReceiveAmount"] = _post("receive_amount");
    $arr["InvoicedAmount"] = _post("invoiced_amount");
    $arr["ThisAmount"] = _post("this_amount");
    $arr["InvoiceSub"] = _post("invoice_sub");
    $arr["InvoiceType"] = _post("invoice_type");
    $arr["InvoiceContent"] = _post("invoice_content");
    $arr["Applicant"] = _post("applicant");
    $arr["ApplicationTime"] = _post("applicationtime");
    $arr["ThisStudentIds"] = _post("studentids");
    $studentids = _post("studentids");
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $upStudentStatu = $student_info->updateStudentBilling($studentids, 1); //更新学员已经申请开票状态
        if ($upStudentStatu > -1) {
            $result = "修改成功";
        } else {
            $info->deleteError($result);
            $result = "修改失败，请重试！";
        }
    }
    echo returnResult($result, 1);
    exit();
}