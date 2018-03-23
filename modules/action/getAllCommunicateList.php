<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require( "../../common.php");
require (DT_ROOT . "/data/dbClass.php");
$data = array();
$customerlist = "select a.*,b.ModeName,c.UserName 
from communicaterecord a
left join communicatemode b on CommunicateMode=b.Id
left join users c on a.CommunicatePerson=c.UserId where a.Flag=0";
$data["communicate_list"] = $db->query($customerlist);
//echo $customerlist;
echo $twig->render('market/all_communicate_list.xhtml', $data);
