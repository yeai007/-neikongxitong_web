<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require( "../../common.php");
require (DT_ROOT . "/data/dbClass.php");
$data = array();
$data = array();
$readonly = false;
$chargeperson = "select UserId,UserName,UserCode,UserDepart from users";
$data["chargeperson"] = $db->query($chargeperson);
$data["marketperson"] = $db->query($chargeperson);
$data["writeperson"] = $db->query($chargeperson);
$data["examperson"] = $db->query($chargeperson);
$customerlevel = "select Id,LevelCode,LevelName from CustomerLevelInfo ";
$data["customerlevel"] = $db->query($customerlevel);
$PerformanceLevel = "select Id,PerformanceLevelName,PerformanceLevelCode from PerformanceLevelInfo ";
$data["PerformanceLevel"] = $db->query($PerformanceLevel);
$request_id = _post("id");
$request_type = _post("type");
if (isset($request_id) && $request_id > 0 && isset($request_type)) {
    if ($request_type == "see") {
        require DT_ROOT . '/Class/CustomerClass.php';
        $info = new CustomerClass();
        $result = $info->getInfo($request_id);
        $data["info"] = $result;
        $readonly = "disabled='disabled'";
    } elseif ($request_type == "exam_adopt") {
        require DT_ROOT . '/Class/CustomerClass.php';
        $info = new CustomerClass();
        $result = $info->setInfo($request_id);
        $arr = array();
        $arr["Customerlevel"] = _post("customerlevel");
        $arr["PerformanceLevel"] = _post("performancelevel");
        $arr["ExamPerson"] = _post("examperson");
        $arr["ExamDate"] = _post("examdate");
        $arr["CustomerStatus"] = 1;
        $info->updateInfo($arr);
    } elseif ($request_type == "refuse") {
        require DT_ROOT . '/Class/CustomerClass.php';
        $info = new CustomerClass();
        $result = $info->setInfo($request_id);
        $arr = array();
        $arr["Customerlevel"] = _post("customerlevel");
        $arr["PerformanceLevel"] = _post("performancelevel");
        $arr["ExamPerson"] = _post("examperson");
        $arr["ExamDate"] = _post("examdate");
        $arr["CustomerStatus"] = 2;
        $info->updateInfo($arr);
    }
}

$data["readonly"] = $readonly;
echo $twig->render('market/set_exam_customer.html', $data);
