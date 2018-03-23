<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require( "../../common.php");
require (DT_ROOT . "/data/dbClass.php");
$data = array();
$contract_list = "select *,b.UserName WritePersonName from contractinfo a
left join users b on a.WritePersonId=b.UserId where ContractStatus=0";
$data["contract_list"] = $db->query($contract_list);
//echo $customerlist;
echo $twig->render('market/all_contract_list.xhtml', $data);
