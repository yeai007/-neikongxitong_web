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
$work_list = "select a.TeacherId, a.TeacherName, a.TeacherSex, a.TeacherPNum, a.TeacherPhone, a.QQ, a.Wechat, a.CardNum, 
a.OpeningBank, a.BankAddress, a.FeeStandard, a.TeacherDesc, a.WritePerson, a.WriteDate, a.TeacherStatus,b.UserName WirtePersonName
 from teacherinfo a
left join users b on a.WritePerson=b.UserId where a.TeacherStatus !=1";
$data["work_list"] = $db->query($work_list);
$data["pagetype"] = $pagetype;
echo $twig->render('teach/all_teacher_list.twig', $data);

