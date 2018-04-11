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
require DT_ROOT . '/Class/InvoiceClass.php';
$info = new InvoiceClass();
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
    $arr["Amount"] = _post("amount");
    $arr["InvoiceNum"] = _post("invoice_num");
    $arr["SubName"] = _post("subname");
    $arr["InvoiceType"] = _post("invoicetype");
    $arr["InvoiceDate"] = _post("invoice_date");
    $arr["Drawer"] = _post("drawer");
    $arr["GiveTime"] = _post("givetime");
    $arr["Giver"] = _post("giver");
    $result = $info->insertInfo($arr);
    if ($result > 0) {
        $result = "添加成功";
    } else {
        $result = "添加失败，请重试！";
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
    $arr["Amount"] = _post("amount");
    $arr["InvoiceNum"] = _post("invoice_num");
    $arr["SubName"] = _post("subname");
    $arr["InvoiceType"] = _post("invoicetype");
    $arr["InvoiceDate"] = _post("invoice_date");
    $arr["Drawer"] = _post("drawer");
    $arr["GiveTime"] = _post("givetime");
    $arr["Giver"] = _post("giver");
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "修改成功";
    } else {
        $result = "修改失败，请重试！";
    }

    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["rec"])) {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["Receiver"] = _post("receiver");
    $arr["ReceiverPhone"] = _post("receiverphone");
    $arr["ReceiveDate"] = _post("receivedate");
    $arr["InvoiceStatus"] = 2;
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "修改成功（接收）";
    } else {
        $result = "修改失败，请重试！";
    }

    echo returnResult($result, 1);
    exit();
}