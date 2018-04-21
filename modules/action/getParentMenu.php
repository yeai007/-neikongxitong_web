<?php

/**
 * @author  PVer
 * @date    2018-4-19 15:05:55
 * @version V1.0
 * @desc    
 */
require("../../common.php");
require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
$q = str_replace('"', '', _post("id"));
$result = $db->query("select * from MenuConfig where Id in ($q)");
$data = array();
$data["menulist"] = $result;
echo $twig->render('main/parent_menu.twig', $data);
