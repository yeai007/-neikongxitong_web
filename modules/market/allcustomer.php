<?php

require( "../../common.php");
require (DT_ROOT . "/data/dbClass.php");
$data = array();
$customerlevel = "select Id,LevelCode,LevelName from CustomerLevelInfo ";
$data["customerlevel"] = $db->query($customerlevel);
$PerformanceLevel = "select Id,PerformanceLevelName,PerformanceLevelCode from PerformanceLevelInfo ";
$data["PerformanceLevel"] = $db->query($PerformanceLevel);
$market = "select UserId,UserName,UserCode from Users where UserRoleId=1";
$data["market"] = $db->query($market);

echo $twig->render('market/allcustomer.xhtml', $data);
