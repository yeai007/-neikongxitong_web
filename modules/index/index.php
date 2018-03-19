<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//unset($_SESSION);
//session_destroy();
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
require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
$data = array();
$sql = "select Id,Name,MenuParentId,Url from MenuConfig where Flag=0";
$data["menulist"] = $db->query($sql);
$data["user"] = $user;
echo $twig->render('main/index.xhtml', $data);
?>
