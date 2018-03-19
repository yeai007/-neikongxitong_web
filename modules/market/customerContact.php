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
ChargePerson,DATE_FORMAT(WriteDate,'%Y-%m-%e') WriteDate,CustomerStatus,VisitCount,MarketPerson ,b.PerformanceLevelCode,b.PerformanceLevelName,c.LevelCode,c.LevelName
from customerinfo a
left join performancelevelinfo b on a.PerformanceLevel=b.Id
left join customerlevelinfo c on a.Customerlevel=c.Id";
$data["customerlist"] = $db->query($customerlist);
echo $twig->render('market/allcustomer.xhtml', $data);
