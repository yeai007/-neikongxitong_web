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
$pagetype = _post("pagetype");

$project_person = "select UserId,UserName from users";
$data["project_person"] = $db->query($project_person);
$project_leader = "select UserId,UserName from users";
$data["project_leader"] = $db->query($project_leader);

$bustype = "select Id,BusTypeName from BusType where Flag=0";
$data["bustype"] = $db->query($bustype);
$project_type = "select * from projecttype where ParentLevel=1";
$data["project_type"] = $db->query($project_type);
$sub_training = "select * from projecttype where ParentLevel=2";
$data["sub_training"] = $db->query($sub_training);
$sub_type = "select * from projecttype where ParentLevel=3";
$data["sub_type"] = $db->query($sub_type);
$data["pagetype"] = $pagetype;
$data["user"] = $user;
$readonly = false;
$data["btn"] = "add";
$request_id = _post("id");
$request_type = _post("type");
require DT_ROOT . '/Class/ProjectClass.php';
$info = new ProjectClass();
if (isset($request_id) && $request_id > 0 && isset($request_type)) {
    if ($request_type == "see") {
        $result = $info->getInfo($request_id);
        $data["info"] = $result;
        $data["btn"] = "see";
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
echo $twig->render('project/set_student.html', $data);
