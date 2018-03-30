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
$cert_list = "select e.Id,a.CertId, a.ProCode, a.ProName, a.SubTraining, a.SubType, a.StudentName, a.StudentNum, 
a.UnitName, a.Phone, a.CertCode, DATE_FORMAT(a.NextExamDate,'%Y-%m-%d') NextExamDate, a.IssuingOrgan, e.ReceiveWritePerson,
 DATE_FORMAT(e.ReceiveWriteDate,'%Y-%m-%d') WriteDate, a.Flag, a.IsRemind,b.Name SubTrainingName,c.Name SubTypeName,d.UserName WritePersonName,
e.ReceivePerson,DATE_FORMAT(e.ReceiveDate,'%Y-%m-%d') ReceiveDate,
DATE_FORMAT(e.ReceiveWriteDate,'%Y-%m-%d') ReceiveWriteDate,e.RecievePhone
from certreciverecord e
left join certinfo a on e.CertId=a.CertId 
left join projecttype b on a.SubTraining=b.Id
left join projecttype c on a.SubType=c.Id
left join users d on e.ReceiveWritePerson=d.UserId
where e.Flag=0";
$data["cert_list"] = $db->query($cert_list);
$data["pagetype"] = $pagetype;
echo $twig->render('cert/all_cert_receive_list.twig', $data);

