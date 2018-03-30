<?php

require("../../common.php");
require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
header("Content-Type:text/html;charset=UTF-8");
$q = str_replace('"', '', _post("text"));
$result = $db->row("select a.ProjectId, a.ProjectCode, a.ProjectYear, a.ProjectBatch, a.ProjectType, a.SubTraining, a.SubType, a.BusType,
 a.PlanAmount,a.ProjectStatus,b.`Name` SubTrainingName,c.`Name` SubTypeName from projectsinfo a
left join projecttype b on a.SubTraining=b.Id
left join projecttype c on a.SubType=c.Id
 where ProjectCode ='$q' LIMIT 0,1");
echo urldecode(json_encode(url_encode($result)));
?>