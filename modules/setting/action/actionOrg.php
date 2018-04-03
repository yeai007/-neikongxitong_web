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
require DT_ROOT . '/Class/OrganizationClass.php';
$info = new OrganizationClass();
$type = _post("type");
if ($type == "delete") {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["OrgStatu"] = 1;
    $result = $info->updateInfo($arr);
    echo returnResult($result, 1);
    exit();
}
if (isset($_POST ["add"])) {
    $checkedNodes = _post("checkedNodes");
    $arr = array();
    $arr["OrgCode"] = _post("org_code");
    $arr["OrgName"] = _post("org_name");
    $arr["CreditCode"] = _post("credit_code");
    $arr["OrgAddress"] = _post("org_address");
    $arr["OrgPhone"] = _post("org_phone");
    $arr["OpenBank"] = _post("open_bank");
    $arr["BankAccount"] = _post("bank_account");
    $arr["ChargePerson"] = _post("charge_person");
    $arr["ChargerPhone"] = _post("charge_phone");
    $arr["OrgDesc"] = _post("org_desc");
    $result = $info->insertInfo($arr);
    if ($result > 0) {
        $result = "添加成功";
    } else {
        $result = "修改失败，请重试！";
    }
    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["modify"])) {
    $info->setInfo(_post("id"));
    $arr["OrgCode"] = _post("org_code");
    $arr["OrgName"] = _post("org_name");
    $arr["CreditCode"] = _post("credit_code");
    $arr["OrgAddress"] = _post("org_address");
    $arr["OrgPhone"] = _post("org_phone");
    $arr["OpenBank"] = _post("open_bank");
    $arr["BankAccount"] = _post("bank_account");
    $arr["ChargePerson"] = _post("charge_person");
    $arr["ChargerPhone"] = _post("charge_phone");
    $arr["OrgDesc"] = _post("org_desc");
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "修改成功";
    } else {
        $result = "修改失败，请重试！";
    }

    echo returnResult($result, 1);
    exit();
} 