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
require("../../../common.php");
require DT_ROOT . '/Class/ReimClass.php';
$info = new ReimClass();
require DT_ROOT . '/Class/ExpenditureClass.php';
$expend = new ExpenditureClass();

$type = _post("type");
if ($type == "refuse") {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["ReimStatus"] = 3;
    $arr["RefuseText"] = _post("text");
    $result = $info->updateInfo($arr);
    echo returnResult($result, 1);
    exit();
}
if ($type == "delete") {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["ReimStatus"] = 1;
    $result = $info->updateInfo($arr);
    echo returnResult($result, 1);
    exit();
}

if (isset($_POST ["add"])) {
    $arr = array();

    $arr["Year"] = gmdate("Y", strtotime(_post("writedate")));
    $arr["WriteDate"] = _post("writedate");
    $arr["ReimPersonId"] = _post("reim_person_id");
    $arr["ReimPerson"] = _post("reim_person");
    $arr["ProCode"] = _post("pro_code");
    $arr["ProName"] = _post("pro_name");
    $arr["ReimType"] = _post("reim_type");
    $arr["ReimSub"] = _post("reim_sub");
    $arr["ReimAmount"] = _post("reim_amount");
    $arr["ReimDesc"] = _post("reim_desc");
    $arr["WritePerson"] = _post("write_person");
    $result = $info->insertInfo($arr);
    if ($result > 0) {
        $result = "添加成功";
    }
    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["modify"])) {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["Year"] = gmdate("Y", strtotime(_post("writedate")));
    $arr["WriteDate"] = _post("writedate");
    $arr["ReimPersonId"] = _post("reim_person_id");
    $arr["ReimPerson"] = _post("reim_person");
    $arr["ProCode"] = _post("pro_code");
    $arr["ProName"] = _post("pro_name");
    $arr["ReimType"] = _post("reim_type");
    $arr["ReimTypeName"] = _post("reim_type_name");
    $arr["ReimSub"] = _post("reim_sub");
    $arr["ReimAmount"] = _post("reim_amount");
    $arr["ReimDesc"] = _post("reim_desc");
    $arr["WritePerson"] = _post("write_person");
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "修改成功";
    } else {
        $result = "修改失败，请重试！";
    }
    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["audit"])) {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["ReimStatus"] = 2;
    $arr["ReimExam"] = _post("reim_exam");
    $arr["ExamDate"] = _post("examdate");
    $result = $info->updateInfo($arr);
    if ($result > -1) {
        $result = "审核成功";
    } else {
        $result = "审核失败，请重试！";
    }
    echo returnResult($result, 1);
    exit();
} elseif (isset($_POST ["grant"])) {
    $info->setInfo(_post("id"));
    $arr = array();
    $arr["ReimStatus"] = 4;
    $arr["GrantAmount"] = _post("grant_amount");
    $arr["FinanceName"] = _post("finance_name");
    $arr["VoucherNum"] = _post("voucher_num");
    $arr["GrantDate"] = _post("grantdate");
    $arr["GrantPerson"] = _post("grantperson");
    $arr["GrantDesc"] = _post("grant_desc");
    $result = $info->updateInfo($arr);
    $info->setInfo(_post("id"));
    if ($result > -1) {
        if (!$expend->check($info->getReimId())) {
            $ex_arr = array();
            $ex_arr['ProCode'] = $info->getProCode();
            $ex_arr['ProName'] = $info->getProName();
            $ex_arr['ProType'] = $info->getReimTypeName();
            $ex_arr['SubTraining'] = $info->getReimSub();
            $ex_arr['Amount'] = $info->getGrantAmount();
            $ex_arr['DisbursementId'] = $info->getReimPersonId();
            $ex_arr['Disbursement'] = $info->getReimPerson();
            $ex_arr['Desctribe'] = $info->getReimDesc();
            $ex_arr['AboutId'] = $info->getReimId();
            $ex_arr['AboutType'] = 0;
            $lastid = $expend->insertInfo($ex_arr);
            if ($lastid > 0) {
                $result = "发放成功-1";
            } else {
                $arr = array();
                $arr["ReimStatus"] = 2;
                $result = $info->updateInfo($arr);
                $result = "发放失败，请重试！错误代码：写入支出失败";
            }
        } else {
            $expend->setInfoByAboutId($info->getReimId(), 0);
            $ex_arr = array();
            $ex_arr['ProCode'] = $info->getProCode();
            $ex_arr['ProName'] = $info->getProName();
            $ex_arr['ProType'] = $info->getReimTypeName();
            $ex_arr['SubTraining'] = $info->getReimSub();
            $ex_arr['Amount'] = $info->getGrantAmount();
            $ex_arr['DisbursementId'] = $info->getReimPersonId();
            $ex_arr['Disbursement'] = $info->getReimPerson();
            $ex_arr['Desctribe'] = $info->getReimDesc();
            $ex_arr['AboutId'] = $info->getReimId();
            $ex_arr['AboutType'] = 0;
            $update = $expend->updateInfo($ex_arr);
            if ($update > -1) {
                $result = "发放成功-2";
            } else {
                $arr = array();
                $arr["ReimStatus"] = 2;
                $result = $info->updateInfo($arr);
                $result = "发放失败，请重试！错误代码：更新支出失败";
            }
        }
    } else {
        $result = "发放失败，请重试！";
    }
    echo returnResult($result, 1);
    exit();
}