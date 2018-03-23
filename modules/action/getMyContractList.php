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
$userid = $user["UserId"];
require( "../../common.php");
require (DT_ROOT . "/data/dbClass.php");
$data = array();
$contract_list = "select *,b.UserName WritePersonName from contractinfo a
left join users b on a.WritePersonId=b.UserId where ContractStatus=0 and b.UserId=$userid";
$data["contract_list"] = $db->query($contract_list);
//echo $customerlist;
echo $twig->render('market/my_contract_list.xhtml', $data);
