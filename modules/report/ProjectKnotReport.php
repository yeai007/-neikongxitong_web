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
$request_data = _post("param");
$data["mid"] = _post("mid");
$data["pid"] = _post("pid");
$request_id = $request_data;
$request_type = _get("type");
$sql = "select * 
from projectknot a
where ProCode=$request_id";
$result = $db->query($sql);
$data["list"] = $result;
echo $twig->render('report/project_knot_report.twig', $data);
