<?php

require("../../common.php");
require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
header("Content-Type:text/html;charset=UTF-8");

$q = str_replace('"', '', strtolower($_GET["term"]));
// if(!empty($q)){$q='';}
//echo str_replace('"', '', $q);

$result = $db->query("select CustomerId,CustomerName from customerinfo where CustomerName like '%$q%' and Flag=0 LIMIT 0,10");
foreach ($result as $row) {
    $data[] = array(
        'value' => addslashes($row['CustomerName']),
        'label' => addslashes($row['CustomerName']),
        'data' => addslashes($row['CustomerId'])
    );
}

echo urldecode(json_encode(url_encode($data)));
?>