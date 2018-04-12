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
$list = "select a.ProjectId,a.ProjectCode,a.ProjectName,a.ProjectStatus,
(select sum(ChargeAmount)  from studentinfo where ProjectCode =a.ProjectCode) ReceiveAmount,
(select sum(ThisAmount) from applyinvoice where ProCode =a.ProjectCode) InvoicedAmount,
d.KnotDate,d.KnotPerson,d.KnotPersonId,d.`Status` EX_Status
from projectsinfo a
left join projecttype b on a.SubTraining=b.Id
left join projecttype c on a.SubType=c.Id
left join projectknotex d on a.ProjectCode=d.ProCode";
//$list = "select * from expenditure ";
$data["list"] = $db->query($list);
$data["pagetype"] = $pagetype;
echo $twig->render('settlement/all_expenditure_list.twig', $data);

