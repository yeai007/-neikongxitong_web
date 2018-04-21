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
$condition = "";
if ($pagetype == "my") {
    $condition = " and a.WritePerson=$userid";
}
$work_list = "select a.RecordId,a.WorkName,a.WorkContent,a.WorkResult,DATE_FORMAT(a.WorkDate,'%Y-%m-%e') WorkDate,a.WritePerson,
DATE_FORMAT(a.WriteDate,'%Y-%m-%e') WriteDate,b.UserName WritePersonName
 from workrecord a
left join users b on a.WritePerson=b.UserId where a.Flag=0 $condition";
$data["work_list"] = $db->query($work_list);
$data["pagetype"] = $pagetype;
echo $twig->render('work/all_workrecord_list.twig', $data);

