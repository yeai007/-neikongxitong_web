<?php

require( "../../common.php");
$pagetype = _get("pagetype");
$id = _post("id");
require (DT_ROOT . "/data/dbClass.php");

$data = array();
$request_data = _post("param");
$data["mid"] = _post("mid");
$data["pid"] = _post("pid");
$id = $request_data;
$request_type = _get("type");
$sql = "select * 
from communicaterecord a
where a.CompanyId=$id";
$result = $db->query($sql);
$data["list"] = $result;
echo $twig->render('report/communicate_report.twig', $data);
