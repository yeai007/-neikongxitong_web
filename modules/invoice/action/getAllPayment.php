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
require( "../../../common.php");
require (DT_ROOT . "/data/dbClass.php");
$pagetype = _post("pagetype");
$data = array();
$list = "select a.Id, a.ProCode, a.ProName, a.UnitName, a.InvoiceNum, a.InvoiceDate,
 a.PaymentAmount, a.PaymentDate, a.PaymentSub, a.PaymentType, a.VoucherNum, 
a.Agent, a.PaymentDesc, a.PaymentStatus,a.WritePerson,a.WriteDate
from payment a";
$data["list"] = $db->query($list);
$data["pagetype"] = $pagetype;
echo $twig->render('invoice/all_payment_list.twig', $data);

