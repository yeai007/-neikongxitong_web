<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require("../../common.php");
require DT_ROOT . '/Class/Customer.class';
$info = new Customer();
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
    $arr["WriteDate"] = _post("writedate");
    $result = $info->insertInfo($arr);
    echo returnResult($result, 0);
    exit();
}