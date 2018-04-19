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
$sql = "select a.ProjectId,a.ProjectCode,a.ProjectName,a.ProjectType,a.SubTraining,a.ProjectPerson,a.ProjectDate,b.KnotDate
from projectsinfo a
inner join projectknot b on a.ProjectCode=b.ProCode";
$result = $db->query($sql);
$data["list"] = $result;
echo $twig->render('report/project_report.twig', $data);
