<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require("../../../common.php");
require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
header("Content-Type:text/html;charset=UTF-8");
$departid = _post("id") ?? "";
$ccc = '';
if ($departid == '') {
    $select = "select a.Id id,a.MenuParentId pId,a.Name name,TRUE checked 
from menuconfig a";
} else {
    $sql = "select RoleMenu from roleinfo  where RoleId=$departid";
    $condition = $db->row($sql)["RoleMenu"] ?? "";
    if ($condition == "") {
        $select = "select a.Id id,a.MenuParentId pId,a.Name name,TRUE checked 
from menuconfig a";
    } else {
        $select = "select a.Id id,a.MenuParentId pId,a.Name name,CASE WHEN ISNULL(b.Id) THEN FALSE ELSE TRUE END checked 
from menuconfig a
left join (select Id from menuconfig where Id in ($condition)) as b on a.Id=b.Id";
    }
}

$result = $db->query($select);
//echo $select;
echo json_encode($result);
