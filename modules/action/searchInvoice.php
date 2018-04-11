<?php

require("../../common.php");
require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
header("Content-Type:text/html;charset=UTF-8");
$q = str_replace('"', '', strtolower($_GET["term"]));
$result = $db->query("select * from invoice where ProCode like '%$q%' or InvoiceCode like '%$q%' LIMIT 0,10");
foreach ($result as $row) {
    $data[] = array(
        'value' => addslashes($row['ProCode']),
        'label' => addslashes($row['ProCode'] . ";" . $row['ProName']),
        'data' => $row
    );
}
echo urldecode(json_encode(url_encode($data)));
?>