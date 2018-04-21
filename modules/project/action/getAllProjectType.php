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
$userid = $user["UserId"];
require( "../../../common.php");
require (DT_ROOT . "/data/dbClass.php");
$data = array();
$condition = "";
$project_list = "select a.Id Id_1,a.Name Name_1,b.Id Id_2,b.Name Name_2,c.Id Id_3,c.Name Name_3 
from  projecttype a
left jOIN projecttype b on a.ParentId=b.Id
left jOIN projecttype c on b.ParentId=c.Id where a.Flag=0 and a.ParentLevel=3 ORDER by a.ParentLevel desc";
$data["projecttype_list"] = $db->query($project_list);
echo $twig->render('project/all_projecttype_list.twig', $data);

