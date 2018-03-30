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
$cert_list = "select a.ReimId, a.Year, a.ReimPerson, a.ProCode, a.ProName, a.ReimType, a.ReimSub, a.ReimDesc, 
a.WritePerson, a.WriteDate, a.ReimStatus, a.ReimExam, a.ExamDate, a.ReimAmount, a.GrantAmount, 
a.FinanceName, a.VoucherNum, a.GrantDate, a.GrantPerson, a.GrantDesc,c.UserName WritePersonName
,e.ReimTypeName 
from reimbursement a
left join users c on a.WritePerson=c.UserId
left join projectsinfo d on a.ProCode=d.ProjectCode
left JOIN reimtype e on a.ReimType=e.Id
 where a.ReimStatus!=1";
$data["list"] = $db->query($cert_list);
$data["pagetype"] = $pagetype;
echo $twig->render('finance/all_reim_list.twig', $data);

