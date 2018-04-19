<?php

/**
 * @author  PVer
 * @date    2018-4-17 14:28:21
 * @version V1.0
 * @desc    
 */
if (!session_id()) {
    session_start();
}
require( "../../common.php");
require (DT_ROOT . "/data/dbClass.php");
$data = array();
$id = _post("id");
$sql = "select * 
from projectknot a
where ProCode=$id";
$result = $db->query($sql);
$data["list"] = $result;
echo $twig->render('report/project_knot_report.twig', $data);
