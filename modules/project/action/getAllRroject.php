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
$condition = "";
if ($pagetype == "my") {
    $condition = "";
}
$project_list = "select a.ProjectId, a.ProjectCode, a.ProjectYear, a.ProjectBatch, a.ProjectType, a.SubTraining, a.SubType, a.BusType, DATE_FORMAT(ProjectDate,'%Y-%m-%e') ProjectDate, 
a.PlanNum, a.PlanAmount,DATE_FORMAT(PlanStartDate,'%Y-%m-%e') PlanStartDate,DATE_FORMAT(PlanEndDate,'%Y-%m-%e') PlanEndDate, a.PlanDays, a.ProjectPerson, a.ProjectDesc, 
a.ProjectStatus, a.ChargeMode,a.ProjectLeader,b.BusTypeName,c.`Name` ProjectTypeName,d.`Name` SubTrainingName,e.`Name` SubTypeName
from projectsinfo a
left join bustype b on a.BusType=b.Id 
left join projecttype c on a.ProjectType=c.Id
left join projecttype d on a.SubTraining=d.Id
left join projecttype e on a.SubType=e.Id
where a.ProjectStatus != 4 $condition";
$data["project_list"] = $db->query($project_list);
$data["pagetype"] = $pagetype;
echo $twig->render('project/all_project_list.twig', $data);

