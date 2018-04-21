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
$pagetype = _post("pagetype");
$data = array();
$project_list = "select a.*,c.Name SubTrainingName,e.Name SubTypeName,f.UserName WritePersonName
from studentinfo a
left join projectsinfo b on a.ProjectCode=b.ProjectCode
left join projecttype c on b.SubTraining=c.Id
left join projecttype e on b.SubType=e.Id
left join users f on a.WritePerson=f.UserId";
$data["project_list"] = $db->query($project_list);
$data["pagetype"] = $pagetype;
echo $twig->render('project/all_student_list.twig', $data);

