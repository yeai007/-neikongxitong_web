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
$pagetype = _get("pagetype");
$pro_code = _post("id");
require (DT_ROOT . "/data/dbClass.php");
$data = array();
$sql = "select * from expenditure where ProCode='$pro_code'";
$result = $db->query($sql);
$sql_amount = "select sum(Amount) amount from expenditure where ProCode='$pro_code'";
$data["amount"] = $db->row($sql_amount)["amount"];

$data["btn"] = "knot";
$data["list"] = $result;
$data["id"] = $pro_code;
$data["pagetype"] = $pagetype;
echo $twig->render('settlement/set_expenditure.twig', $data);
