<?php

require( "../../common.php");
$pagetype = _get("pagetype");
$pro_code = _post("id");
require (DT_ROOT . "/data/dbClass.php");
$data = array();
$sql = "select a.Id,a.ProCode,a.ProName,
'班主任绩效结算' ProType,'' SubTraining,a.AchAmount Amount,'绩效结算' Desctribe,a.HeaderMasterName Disbursement, a.SettlementDate date
from headermasterach a
UNION ALL
select b.Id,b.ProCode,b.ProName,
b.ProType,b.SubTraining,b.Amount Amount,b.Desctribe Desctribe,b.Disbursement Disbursement,b.KnotDate date
from expenditure b ";
$result = $db->query($sql);
$data["list"] = $result;
echo $twig->render('report/outcome_report.twig', $data);
