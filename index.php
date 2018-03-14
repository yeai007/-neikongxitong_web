<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require( "common.php");
$data = array();
require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
$sql = "select * from MenuConfig";
$data["menulist"] = $db->query($sql);





echo $twig->render('main/index.xhtml', $data);
?>