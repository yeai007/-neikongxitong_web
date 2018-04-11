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
$list = "select a.Id, a.ProCode, a.ProName,a.TeachDays
,a.OtherDesc,a.ArrangeDate,j.TeacherName HeaderMasterName,a.TeachStartDate,a.TeachEndDate
,(select count(*) from studentinfo stu where stu.ProjectCode=a.ProCode) StuCount
 from teacharrange a
left join projectsinfo b on a.ProCode=b.ProjectCode
left join teacherinfo j on a.HeaderMaster=j.TeacherId
where a.Flag=0;";
$data["list"] = $db->query($list);
$data["pagetype"] = $pagetype;
echo $twig->render('settlement/all_headermaster_ach_list.twig', $data);

