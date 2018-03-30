<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require( "../../../common.php");
require (DT_ROOT . "/data/dbClass.php");
$id = _post("id");
$sel = _post("sel");
$data = array();
$sub_list = "select * from reimtype where Id=$id limit 0,1";
$str_sub_list = $db->row($sub_list);
$arr = explode(" ", $str_sub_list["ReimSubName"]);
$data["sub_names"] = $arr;
$data["sel"]=$sel;
echo $twig->render('finance/all_sub_list.twig', $data);

