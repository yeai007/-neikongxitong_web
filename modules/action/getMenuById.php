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
$result = $db->row("select * from MenuConfig where Id='$q' LIMIT 0,1");
echo json_encode($result);
?>