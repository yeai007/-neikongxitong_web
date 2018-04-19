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
$work_list = "select a.*,c.UserName MarketName,d.UserName ApplicantName
from applyinvoice a
left join customerinfo b on a.UnitId=b.CustomerId
left join users c on b.MarketPerson=c.UserId
left join users d on a.Applicant=d.UserId";
$data["work_list"] = $db->query($work_list);
$data["pagetype"] = $pagetype;
echo $twig->render('invoice/all_apply_invoice_list.twig', $data);

