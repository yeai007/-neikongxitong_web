<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require( "../../common.php");
require (DT_ROOT . "/data/dbClass.php");
$data = array();
$performancelevel = "select * from performancelevelinfo where Flag=0";
$data["performancelevel_list"] = $db->query($performancelevel);
//echo $customerlist;
echo $twig->render('market/performancelevel_list.html', $data);
