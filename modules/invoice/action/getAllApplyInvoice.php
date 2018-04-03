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
$work_list = "select a.ProjectId, a.ProjectCode, '项目名称' ProName,'单位名称' UnitName,
(select sum(ChargeAmount)  from studentinfo where ProjectCode =a.ProjectCode) ReceiveAmount,
(select sum(ThisAmount) from applyinvoice where ProCode =a.ProjectCode) InvoicedAmount,
(select sum(PaymentAmount) from payment where ProCode =a.ProjectCode) PaymentAmount
from projectsinfo a";
$data["work_list"] = $db->query($work_list);
$data["pagetype"] = $pagetype;
echo $twig->render('invoice/all_apply_invoice_list.twig', $data);

