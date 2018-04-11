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
$work_list = "select a.Id,a.ProCode,a.ProName,a.UnitName,a.Amount,a.InvoiceNum,a.SubName,a.InvoiceType,
b.UserName DrawerName,c.UserName GiverName,a.InvoiceDate,a.GiveTime
from invoice a
left join users b on a.Drawer=b.UserId
left join users c on a.Giver=c.UserId";
$data["list"] = $db->query($work_list);
$data["pagetype"] = $pagetype;
echo $twig->render('invoice/all_invoiceinfo_list.twig', $data);

