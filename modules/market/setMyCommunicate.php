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
$communicatemode = "select * from CommunicateMode";
$data["communicatemode"] = $db->query($communicatemode);
$readonly = false;
$data["btn"] = "add";
$request_id = _post("id");
$request_type = _post("type");
if (isset($request_id) && $request_id > 0 && isset($request_type)) {
    if ($request_type == "modify") {
        require DT_ROOT . '/Class/CommunicateClass.php';
        $info = new CommunicateClass();
        $result = $info->getInfo($request_id);
        $data["info"] = $result;
        $data["btn"] = "modify";
    } elseif ($request_type == "delete") {
        require DT_ROOT . '/Class/CommunicateClass.php';
        $info = new CommunicateClass();
        $result = $info->getInfo($request_id);
        $data["info"] = $result;
    }
}
$data["readonly"] = $readonly;
$data["user"] = $user;
echo $twig->render('market/set_mycommunicate.xhtml', $data);