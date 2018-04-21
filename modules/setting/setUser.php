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
$role = "select RoleId,RoleName from roleinfo where Flag=0";
$data["role_list"] = $db->query($role);
$depart = "select DepartId,DepartName from department where Flag=0";
$data["depart_list"] = $db->query($depart);
$data["pagetype"] = $pagetype;
$data["user"] = $user;
$readonly = false;
$data["btn"] = "add";
$request_data = _post("param");
$data["mid"] = _post("mid");
$data["pid"] = _post("pid");
$request_id = $request_data;
$request_type = _get("type");
require DT_ROOT . '/Class/UserClass.php';
$info = new UserClass();
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
    }
}
$data["readonly"] = $readonly;
echo $twig->render('setting/set_user.twig', $data);
