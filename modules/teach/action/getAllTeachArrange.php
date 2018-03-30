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
$arrange_list = "select a.Id, a.ProCode, a.ProName,c.Name Pro_Type,d.Name SubTrainingName,e.Name SubTypeName,a.TeachDays
,f.TeacherName first_teacher,g.TeacherName second_teacher,h.TeacherName third_teacher,a.OtherDesc,i.UserName ChargePersonName
,a.ArrangeDate
 from teacharrange a
left join projectsinfo b on a.ProCode=b.ProjectCode
left join projecttype c on b.ProjectType=c.Id
left join projecttype d on b.SubTraining=d.Id
left join projecttype e on b.SubType=e.Id
left join teacherinfo f on a.TeacherFirst=f.TeacherId
left join teacherinfo g on a.TeacherSecond=g.TeacherId
left join teacherinfo h on a.TeacherThird=h.TeacherId
left join users i on a.ChargePerson=i.UserId where a.Flag=0";
$data["arrange_list"] = $db->query($arrange_list);
$data["pagetype"] = $pagetype;
echo $twig->render('teach/all_arrange_list.twig', $data);

