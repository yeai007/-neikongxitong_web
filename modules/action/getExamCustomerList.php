<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require( "../../common.php");
require (DT_ROOT . "/data/dbClass.php");
$data = array();
$Customerlevel = _post("Customerlevel") ? "and Customerlevel=" . _post("Customerlevel") : "";
$PerformanceLevel = _post("PerformanceLevel") ? "and PerformanceLevel=" . _post("PerformanceLevel") : "";

$customerlist = "select CustomerId,CustomerName,Customerlevel,CreditCode,CustomerAddress,CustomerPhone,OpenBank,BankAccount,PerformanceLevel,
ChargePerson,DATE_FORMAT(WriteDate,'%Y-%m-%e') WriteDate,CustomerStatus,VisitCount,MarketPerson ,b.PerformanceLevelCode,b.PerformanceLevelName,c.LevelCode,c.LevelName
from customerinfo a
left join performancelevelinfo b on a.PerformanceLevel=b.Id
left join customerlevelinfo c on a.Customerlevel=c.Id where a.Flag=0 $Customerlevel $PerformanceLevel";
$data["customerlist"] = $db->query($customerlist);
//echo $customerlist;
echo $twig->render('market/exam_customer_list.xhtml', $data);
