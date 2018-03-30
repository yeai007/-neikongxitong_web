<?php

require("../../common.php");
require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
header("Content-Type:text/html;charset=UTF-8");
$q = str_replace('"', '', _post("text"));
$result = $db->row("select * from studentinfo where Id='$q' LIMIT 0,1");
echo urldecode(json_encode(url_encode($result)));
?>