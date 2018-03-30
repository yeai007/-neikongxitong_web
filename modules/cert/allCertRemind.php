<?php

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
require( "../../common.php");
$pagetype = _get("pagetype");
require (DT_ROOT . "/data/dbClass.php");
$data = array();
$cert_list = "select a.CertId, a.ProCode, a.ProName, a.SubTraining, a.SubType, a.StudentName, a.StudentNum, 
a.UnitName, a.Phone, a.CertCode, a.NextExamDate, a.IssuingOrgan, a.WritePerson, a.WriteDate, a.Flag, a.IsRemind
,b.Name SubTrainingName,c.Name SubTypeName,d.UserName WritePersonName,TIMESTAMPDIFF(DAY,now(),a.NextExamDate) RemindDate
from certinfo a 
left join projecttype b on a.SubTraining=b.Id
left join projecttype c on a.SubType=c.Id
left join users d on a.WritePerson=d.UserId
where a.Flag=0";
$data["cert_list"] = $db->query($cert_list);
$data["pagetype"] = $pagetype;
echo $twig->render('cert/all_cert_remind.twig', $data);
