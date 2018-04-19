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
$pagetype = _post("pagetype");
$data = array();
$write_person = "select UserId,UserName,UserCode,UserDepart from users";
$data["write_person"] = $db->query($write_person);
$organization = "select * from organization ";
$data["org_list"] = $db->query($organization);
$data["pagetype"] = $pagetype;
$data["user"] = $user;
$readonly = false;
$data["btn"] = "add";
$request_id = _post("id");
$UintId = _get("UintId");
$request_type = _post("type");

require DT_ROOT . '/Class/ApplyInvoiceClass.php';
$info = new ApplyInvoiceClass();
if (isset($request_id) && $request_id > 0 && isset($request_type)) {
    if ($request_type == "modify") {
        $result = $info->getInfo($request_id);
        $data["info"] = $result;
        $data["btn"] = "modify";
    } elseif ($request_type == "delete") {
        $result = $info->getInfo($request_id);
        $data["info"] = $result;
    }
}
$data["readonly"] = $readonly;
echo $twig->render('invoice/set_apply_invoice.twig', $data);
