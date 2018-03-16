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
$chargeperson = "select UserId,UserName,UserCode,UserDepart from users";
$data["chargeperson"] = $db->query($chargeperson);
$data["marketperson"] = $db->query($chargeperson);
echo $twig->render('market/setcustomer.html', $data);
