<?php

/**
 * @author  PVer
 * @date    2018-4-17 10:33:59
 * @version V1.0
 * @desc    
 */
require( "../../../common.php");
require (DT_ROOT . "/data/dbClass.php");
$pagetype = _post("pagetype");
$data = array();
$list = "select a.*,b.UserName,b.UserPost
from workrecord a
left join users b on a.WritePerson=b.UserId
where a.Flag=0";
//$list = "select * from expenditure ";
$data["list"] = $db->query($list);
$data["pagetype"] = $pagetype;
echo $twig->render('report/work_list.twig', $data);

