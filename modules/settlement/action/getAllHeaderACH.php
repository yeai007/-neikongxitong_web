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
$list = "select *,getTeacherACH(aa.StuCount,aa.TeachDays)  TeacherACH 
from (select a.Id, a.ProCode, a.ProName,a.TeachDays
,a.OtherDesc,a.ArrangeDate,j.TeacherName HeaderMasterName,a.TeachStartDate,a.TeachEndDate
,(select count(*) from studentinfo stu where stu.ProjectCode=a.ProCode) StuCount,a.HeaderMaster,c.BusTypeName
,case WHEN ISNULL(d.Status) then '未结算' ELSE '已结算' END Status,e.UserName,d.SettlementDate,d.Id RachId
 from teacharrange a
left join projectsinfo b on a.ProCode=b.ProjectCode
left join teacherinfo j on a.HeaderMaster=j.TeacherId
left join bustype c on b.BusType=c.Id
left join headermasterach d on a.ProCode=d.ProCode and a.HeaderMaster=d.HeaderMaster and d.`Status`=1
left join users e on d.SettlementPerson=e.UserId
where a.Flag=0 ) aa";
$data["list"] = $db->query($list);
$data["pagetype"] = $pagetype;
echo $twig->render('settlement/all_headermaster_ach_list.twig', $data);

