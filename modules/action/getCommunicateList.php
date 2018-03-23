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
require( "../../common.php");
require (DT_ROOT . "/data/dbClass.php");
$data = array();
$userid = $user["UserId"];
$customerlist = "select a.*,b.ModeName,c.UserName 
from communicaterecord a
left join communicatemode b on CommunicateMode=b.Id
left join users c on a.CommunicatePerson=c.UserId where a.Flag=0 and CommunicatePerson=$userid";
$data["communicate_list"] = $db->query($customerlist);
//echo $customerlist;
echo $twig->render('market/my_communicate_list.xhtml', $data);
