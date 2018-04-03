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
$cert_list = "select a.Id,a.Year,a.Amount,a.Agent,a.VoucherNum,a.IncomeDesc,a.WritePerson,a.WriteDate,b.UserName AgentName,c.UserName WritePersonName
from otherincome a
left join users b on a.Agent=b.UserId
left join users c on a.WritePerson=c.UserId
 where a.Flag!=1";
$data["income_list"] = $db->query($cert_list);
$data["pagetype"] = $pagetype;
echo $twig->render('finance/all_otherincome_list.twig', $data);

