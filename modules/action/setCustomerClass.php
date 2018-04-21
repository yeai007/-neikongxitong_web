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
require("../../common.php");
require DT_ROOT . '/Class/CustomerClass.php';
$info = new CustomerClass();
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
    $arr["CustomerName"] = _post("customer_name");
    $arr["CreditCode"] = _post("customer_num");
    $arr["CustomerAddress"] = _post("customer_address");
    $arr["CustomerPhone"] = _post("customer_phone");
    $arr["OpenBank"] = _post("customer_openbank");
    $arr["BankAccount"] = _post("customer_bankaccount");
    $arr["ChargePerson"] = _post("chargeperson");
    $arr["ChargerPhone"] = _post("charger_phone");
    $arr["ChargerQQ"] = _post("charger_QQ");
    $arr["ChargerWechat"] = _post("charger_Wechat");
    $arr["CustomerContact"] = _post("customer_contact");
    $arr["ContactPhone"] = _post("contact_phone");
    $arr["ContactQQ"] = _post("contact_QQ");
    $arr["ContactWechat"] = _post("contact_Wechat");
    $arr["CustomerDesc"] = _post("customer_desc");
    $arr["MarketPerson"] = _post("marketperson");
    $arr["WritePerson"] = $user["UserId"];
    $arr["WriteDate"] = _post("writedate");
    $result = $info->insertInfo($arr);
    if ($result > 0) {
        $result = "添加成功";
    } else {
        $result = "添加失败，请重试";
    }
    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["modify"])) {

    $info->setInfo(_post("id"));
    $arr = array();
    $arr["CustomerName"] = _post("customer_name");
    $arr["CreditCode"] = _post("customer_num");
    $arr["CustomerAddress"] = _post("customer_address");
    $arr["CustomerPhone"] = _post("customer_phone");
    $arr["OpenBank"] = _post("customer_openbank");
    $arr["BankAccount"] = _post("customer_bankaccount");
    $arr["ChargePerson"] = _post("chargeperson");
    $arr["ChargerPhone"] = _post("charger_phone");
    $arr["ChargerQQ"] = _post("charger_QQ");
    $arr["ChargerWechat"] = _post("charger_Wechat");
    $arr["CustomerContact"] = _post("customer_contact");
    $arr["ContactPhone"] = _post("contact_phone");
    $arr["ContactQQ"] = _post("contact_QQ");
    $arr["ContactWechat"] = _post("contact_Wechat");
    $arr["CustomerDesc"] = _post("customer_desc");
    $arr["MarketPerson"] = _post("marketperson");
    $arr["WritePerson"] = $user["UserId"];
    $arr["WriteDate"] = _post("writedate");
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "修改成功";
    } else {
        $result = "修改失败，请重试";
    }
    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["see"])) {
    $result = "查看成功";
    echo returnResult($result, 1);
    exit();
}