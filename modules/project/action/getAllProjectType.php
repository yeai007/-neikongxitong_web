<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!session_id()) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    $_SESSION['userurl'] = $_SERVER['REQUEST_URI'];
    header("location:../login.php?"); //重新定向到其他页面
    exit();
} else {
    $user = $_SESSION['user'][0];
}
$userid = $user["UserId"];
require( "../../../common.php");
require (DT_ROOT . "/data/dbClass.php");
$data = array();
$condition = "";
$project_list = "select a.Id Id_1,a.Name Name_1,b.Id Id_2,b.Name Name_2,c.Id Id_3,c.Name Name_3 
from  projecttype a
left jOIN projecttype b on a.ParentId=b.Id
left jOIN projecttype c on b.ParentId=c.Id where a.Flag=0  ORDER by a.ParentLevel desc";
$data["projecttype_list"] = $db->query($project_list);
//$first = "select * from  projecttype where ParentLevel=1";
//$arr_first = $db->query($first);
//$second = "select * from  projecttype where ParentLevel=2";
//$arr_second = $db->query($second);
//$third = "select * from  projecttype where ParentLevel=3";
//$arr_third = $db->query($third);
//$arr = array();
//$i = 0;
//foreach ($arr_first as $row_first) {
//    foreach ($arr_second as $row_second) {
//        if ($row_first["Id"] == $row_second["ParentId"]) {
//            foreach ($arr_third as $row_third) {
//                if ($row_second["Id"] == $row_third["ParentId"]) {
//                    $row_second["third"][] = $row_third;
//                }
//            }
//            $row_first["second"][] = $row_second;
//        }
//    }
//    $arr[] = $row_first;
//}
//echo json_encode($arr, true);
//var_dump($arr);
//$data["projecttype_list"] = $arr;
echo $twig->render('project/all_projecttype_list.html', $data);

