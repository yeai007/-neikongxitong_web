<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require( "../../common.php");
require (DT_ROOT . "/data/dbClass.php");
$data = array();
$data = array();
$readonly = false;
$data["btn"] = "add";
$request_id = _post("id");
$request_type = _post("type");
if (isset($request_id) && $request_id > 0 && isset($request_type)) {
    if ($request_type == "modify") {
        require DT_ROOT . '/Class/CustomerLevelClass.php';
        $info = new CustomerLevelClass();
        $result = $info->getInfo($request_id);
        $data["info"] = $result;
        $data["btn"] = "modify";
    } elseif ($request_type == "delete") {
        require DT_ROOT . '/Class/CustomerLevelClass.php';
        $info = new CustomerLevelClass();
        $result = $info->getInfo($request_id);
        $data["info"] = $result;
    }
}

$data["readonly"] = $readonly;
echo $twig->render('market/set_customerlevel.html', $data);
