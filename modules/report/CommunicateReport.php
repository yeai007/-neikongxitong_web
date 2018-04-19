<?php

require( "../../common.php");
$pagetype = _get("pagetype");
$id = _post("id");
require (DT_ROOT . "/data/dbClass.php");
$id = _post("id");
$data = array();

$sql = "select * 
from communicaterecord a
where a.CompanyId=$id";
$result = $db->query($sql);
$data["list"] = $result;
echo $twig->render('report/communicate_report.twig', $data);
