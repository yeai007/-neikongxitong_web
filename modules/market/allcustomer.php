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
$customerlist = "select CustomerId,CustomerName,Customerlevel,CreditCode,CustomerAddress,CustomerPhone,OpenBank,BankAccount,PerformanceLevel,
ChargePerson,WriteDate,CustomerStatus,VisitCount,MarketPerson from customerinfo";
$data["customerlist"] = $db->query($customerlist);
echo $twig->render('market/allcustomer.xhtml', $data);
