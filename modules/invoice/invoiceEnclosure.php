<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require( "../../common.php");
require (DT_ROOT . "/data/dbClass.php");
$pagetype = _post("pagetype");
$data = array();
$readonly = false;
$data["btn"] = "add";
$request_data = _post("param");
$data["mid"] = _post("mid");
$data["pid"] = _post("pid");
$request_id = $request_data;
$request_type = _get("type");
require DT_ROOT . '/Class/ApplyInvoiceClass.php';
$info = new ApplyInvoiceClass();
if (isset($request_id) && $request_id > 0 && isset($request_type)) {
    if ($request_type == "see") {
        $result = $info->getInfo($request_id);
        $data["info"] = $result;
        $readonly = "readonly";
    }
}
$data["readonly"] = $readonly;
echo $twig->render('invoice/invoice_enclosure.twig', $data);
