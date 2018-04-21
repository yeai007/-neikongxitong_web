<?php

require( "../../common.php");
$pagetype = _get("pagetype");
require (DT_ROOT . "/data/dbClass.php");
$data = array();
$request_data = _post("param");
$data["mid"] = _post("mid");
$data["pid"] = _post("pid");
$request_id = $request_data;
$request_type = _get("type");

$sql = "select * 
from invoice a
where ProCode=$request_id";
$result = $db->query($sql);
$data["list"] = $result;
echo $twig->render('report/invoice_report.twig', $data);
