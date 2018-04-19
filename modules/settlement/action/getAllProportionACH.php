<?php

/**
 * @author  PVer
 * @date    2018-4-13 10:42:25
 * @version V1.0
 * @desc    
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
$list = "select * from achproportion";
$data["list"] = $db->query($list);
$data["pagetype"] = $pagetype;
echo $twig->render('settlement/project_ach_list.twig', $data);

