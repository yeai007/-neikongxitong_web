<?php

/**
 * @author  PVer
 * @date    2018-4-18 8:47:53
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
$list = "select * 
from message a where Status=0";
$data["list"] = $db->query($list);
$data["pagetype"] = $pagetype;
echo $twig->render('message/all_message_list.twig', $data);

