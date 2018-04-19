<?php

require( "../../common.php");
$pagetype = _get("pagetype");
require (DT_ROOT . "/data/dbClass.php");
$id = _post("id");
$data = array();
$sql = "select * 
from studentinfo a
where ProjectCode=$id";
$result = $db->query($sql);
$data["list"] = $result;
echo $twig->render('report/project_student_report.twig', $data);
