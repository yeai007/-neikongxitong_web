<?php

require("../../common.php");
require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
header("Content-Type:text/html;charset=UTF-8");
$q = str_replace('"', '', strtolower($_GET["term"]));
$result = $db->query("select Id,StudentName,StudentNum from studentinfo where StudentName like '%$q%' or StudentPhone like '%$q%' LIMIT 0,10");
foreach ($result as $row) {
    $data[] = array(
        'value' => addslashes($row['StudentName']),
        'label' => addslashes($row['Id'] . ";" . $row['StudentName'])
    );
}
echo urldecode(json_encode(url_encode($data)));
?>