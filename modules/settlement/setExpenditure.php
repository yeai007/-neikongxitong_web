<?php

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
require( "../../common.php");
require (DT_ROOT . "/data/dbClass.php");
$data = array();
$pagetype = _get("pagetype");
$request_data = _post("param");
$data["mid"] = _post("mid");
$data["pid"] = _post("pid");
$pro_code = $request_data;
$request_type = _get("type");


$sql = "select * from expenditure where ProCode='$pro_code'";
$result = $db->query($sql);
$sql_amount = "select sum(Amount) amount from expenditure where ProCode='$pro_code'";
$data["amount"] = $db->row($sql_amount)["amount"];

$data["btn"] = "knot";
$data["list"] = $result;
$data["id"] = $pro_code;
$data["pagetype"] = $pagetype;
echo $twig->render('settlement/set_expenditure.twig', $data);
