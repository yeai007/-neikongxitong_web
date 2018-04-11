<?php

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
$pagetype = _get("pagetype");
require (DT_ROOT . "/data/dbClass.php");
$data = array();
$data["pagetype"] = $pagetype;
echo $twig->render('invoice/all_invoice_info.twig', $data);
