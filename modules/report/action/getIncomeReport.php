<?php

/**
 * @author  PVer
 * @date    2018-4-17 10:49:22
 * @version V1.0
 * @desc    
 */
require( "../../../common.php");
require (DT_ROOT . "/data/dbClass.php");
$pagetype = _post("pagetype");
$data = array();
$list = "select a.*,b.UserName AgentName
from payment a
left join users b on a.Agent=b.UserId
where a.PaymentStatus=0";
//$list = "select * from expenditure ";
$data["list"] = $db->query($list);
$data["pagetype"] = $pagetype;
echo $twig->render('report/income_list.twig', $data);
