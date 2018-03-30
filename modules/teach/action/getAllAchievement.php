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
$arrange_list = "select a.Id, a.ProCode, a.ProName, a.StudentId, a.TheoryAch, a.TheoryExamTime, a.TheoryExamAddress, 
    a.ActualOperatAch, a.ActualExamTime, a.ActualExamAddress, a.IsAdopt, a.WritePerson, a.WriteDate,b.StudentName,b.StudentNum,b.StudentPhone
from achievementrecord a
left join studentinfo b on a.StudentId=b.Id where a.Flag=0";
$data["work_list"] = $db->query($arrange_list);
$data["pagetype"] = $pagetype;
echo $twig->render('teach/all_achievement_list.twig', $data);

