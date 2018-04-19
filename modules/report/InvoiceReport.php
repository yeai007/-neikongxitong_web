<?php

require( "../../common.php");
$pagetype = _get("pagetype");
$id = _post("id");
require (DT_ROOT . "/data/dbClass.php");
$id = _post("id");
$data = array();
$sql = "select * 
from invoice a
where ProCode=$id";
$result = $db->query($sql);
$data["list"] = $result;
echo $twig->render('report/invoice_report.twig', $data);
