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
$pagetype = _get("pagetype");
$data = array();
$write_person = "select UserId,UserName,UserCode,UserDepart from users";
$data["write_person"] = $db->query($write_person);
$reimtype = "select * from reimtype";
$data["reimtype"] = $db->query($reimtype);
$data["pagetype"] = $pagetype;
$data["user"] = $user;
$readonly = false;
$readonly_grant = false;
$data["btn"] = "add";
$request_data = _post("param");
$data["mid"] = _post("mid");
$data["pid"] = _post("pid");
$request_id = $request_data;
$request_type = _get("type");
require DT_ROOT . '/Class/ReimClass.php';
$info = new ReimClass();
if (isset($request_id) && $request_id > 0 && isset($request_type)) {
    if ($request_type == "see") {
        $result = $info->getInfo($request_id);
        $data["info"] = $result;
        $readonly = "disabled='disabled'";
    } elseif ($request_type == "modify") {
        $result = $info->getInfo($request_id);
        $data["info"] = $result;
        $data["btn"] = "modify";
    } elseif ($request_type == "delete") {
        $result = $info->getInfo($request_id);
        $data["info"] = $result;
    } elseif ($request_type == "audit") {
        $result = $info->getInfo($request_id);
        $data["info"] = $result;

        $readonly = "disabled='disabled'";
    } elseif ($request_type == "grant") {
        $result = $info->getInfo($request_id);
        $data["info"] = $result;
        $data["btn"] = "grant";
        $readonly_grant = "disabled='disabled'";
    }
}
$data["readonly"] = $readonly;
$data["readonly_grant"] = $readonly_grant;
echo $twig->render('finance/set_reim.twig', $data);
