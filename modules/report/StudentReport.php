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
from studentinfo a
where a.UnitId=$id";
$result = $db->query($sql);
$amount_sql = "select sum(ChargeAmount) amount
from studentinfo a
where a.UnitId=$id";
$amount = $db->row($amount_sql);
$data["amount"] = $amount["amount"];
$data["list"] = $result;
echo $twig->render('report/student_report.twig', $data);
