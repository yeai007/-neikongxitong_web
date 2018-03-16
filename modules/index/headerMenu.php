<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require( "../../common.php");
require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
$arr = _post("arr");
$condition = '';
for ($i = 0; $i < count($arr); $i++) {
    if ($i == 0) {
        $condition = $arr[$i];
    } else {
        $condition = $condition . "," . $arr[$i];
    }
}
$data = array();
$sql = "select Id,Name,MenuParentId from MenuConfig where Id in ($condition)";
$data["menulist"] = $db->query($sql);
echo $twig->render('main/menu_top.html', $data);
