<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require( "../../common.php");
require (DT_ROOT . "/data/dbClass.php");
$data = array();
$customerlevel_list = "select * from customerlevelinfo where LevelFlag=0";
$data["customerlevel_list"] = $db->query($customerlevel_list);
//echo $customerlist;
echo $twig->render('market/customerlevel_list.html', $data);
