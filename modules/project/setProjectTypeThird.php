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
$first = "select Id,Name from  ProjectType where ParentLevel=1";
$data["first"] = $db->query($first);
$first_row = $db->row("select Id from  ProjectType where ParentLevel=1 and Flag=0 limit 0,1");
$row_id = $first_row["Id"];
$second = "select Id,Name from  ProjectType where ParentLevel=2 and ParentId=$row_id";
$data["second"] = $db->query($second);
$data["user"] = $user;
$readonly = false;
$data["btn"] = "add_third";
$request_id = _post("id");
$request_type = _post("type");
require DT_ROOT . '/Class/ProjectTypeClass.php';
$info = new ProjectTypeClass();
if (isset($request_id) && $request_id > 0 && isset($request_type)) {
    if ($request_type == "see") {
        $result = $info->getInfo($request_id);
        $data["info"] = $result;
        $readonly = "disabled='disabled'";
    } elseif ($request_type == "modify") {
        $result = $info->getInfo($request_id);
        $data["info"] = $result;
        $data["btn"] = "modify_third";
    } elseif ($request_type == "delete") {
        $result = $info->getInfo($request_id);
        $data["info"] = $result;
    }
}

$data["readonly"] = $readonly;
echo $twig->render('project/set_projecttype_third.html', $data);
