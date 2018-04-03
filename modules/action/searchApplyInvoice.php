<?php

require("../../common.php");
require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
header("Content-Type:text/html;charset=UTF-8");
$q = str_replace('"', '', strtolower($_GET["term"]));
$result = $db->query("select * from certinfo where CertCode like '%$q%' LIMIT 0,10");
foreach ($result as $row) {
    $data[] = array(
        'value' => addslashes($row['CertCode']),
        'label' => addslashes($row['CertCode'] . ";" . $row['StudentName'] . ";" . $row["ProCode"])
    );
}
echo urldecode(json_encode(url_encode($data)));
?>