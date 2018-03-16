<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require( "../../common.php");
require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
$data = array();
$sql = "select Id,Name,MenuParentId,Url from MenuConfig where Flag=0";
$data["menulist"] = $db->query($sql);
echo $twig->render('main/index_1.xhtml', $data);
?>
