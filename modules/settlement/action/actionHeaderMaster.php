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
require DT_ROOT . '/Class/TeachArrangeClass.php';
$info = new TeachArrangeClass();
require DT_ROOT . '/Class/HeaderMasterACHClass.php';
$ach_info = new HeaderMasterACHClass();
require DT_ROOT . '/Class/ExpenditureClass.php';
$expend = new ExpenditureClass();
$type = _post("type");
if ($type == "delete") {
    $ach_info->setInfo(_post("id"));
    $arr = array();
    $arr["Status"] = 0;
    if ($expend->cancel(_post("id"), 1)) {
        $result = $ach_info->updateInfo($arr);
        echo returnResult($result, 1);
    } else {
        echo returnResult("解除失败", 1);
    }

    exit();
}
if ($type == "settlement") {
    $info->setInfo(_post("id"));
    $headerid = $info->getHeaderMaster();
    if (!$ach_info->checkSettlement($headerid, $info->getProCode())) {
        $jiesuan = $ach_info->Settlement($headerid, $info->getProCode(), $user);
        if ($jiesuan > 0) {
            $ach_info->setInfo($jiesuan);
            if (!$expend->check($ach_info->getId())) {
                $ex_arr = array();
                $ex_arr['ProCode'] = $ach_info->getProCode();
                $ex_arr['ProName'] = $ach_info->getProName();
                $ex_arr['ProType'] = $ach_info->getBusType();
                $ex_arr['SubTraining'] = '--';
                $ex_arr['Amount'] = $ach_info->getAchAmount();
                $ex_arr['DisbursementId'] = $ach_info->getHeaderMaster();
                $ex_arr['Disbursement'] = $ach_info->getHeaderMasterName();
                $ex_arr['Desctribe'] = '班主任绩效';
                $ex_arr['AboutId'] = $ach_info->getId();
                $ex_arr['AboutType'] = 1;
                $ex_arr['Status'] = 0;
                $lastid = $expend->insertInfo($ex_arr);
                if ($lastid > 0) {
                    $result = "结算成功-1";
                } else {
                    $arr = array();
                    $arr["Status"] = 0;
                    $result = $ach_info->updateInfo($arr);
                    $result = "结算失败，请重试！错误代码：写入支出失败";
                }
            } else {
                $expend->setInfoByAboutId($ach_info->getId(), 1);
                $ex_arr = array();
                $ex_arr['ProCode'] = $ach_info->getProCode();
                $ex_arr['ProName'] = $ach_info->getProName();
                $ex_arr['ProType'] = $ach_info->getBusType();
                $ex_arr['SubTraining'] = '--';
                $ex_arr['Amount'] = $ach_info->getAchAmount();
                $ex_arr['DisbursementId'] = $ach_info->getHeaderMaster();
                $ex_arr['Disbursement'] = $ach_info->getHeaderMasterName();
                $ex_arr['Desctribe'] = '班主任绩效';
                $ex_arr['AboutId'] = $ach_info->getId();
                $ex_arr['AboutType'] = 1;
                $ex_arr['Status'] = 0;
                $update = $expend->updateInfo($ex_arr);
                if ($update > -1) {
                    $result = "结算成功-2";
                } else {
                    $arr = array();
                    $arr["Status"] = 0;
                    $result = $ach_info->updateInfo($arr);
                    $result = "结算失败，请重试！错误代码：更新支出失败";
                }
            }
        } else {
            $result = '结算失败';
        }
    } else {
        $result = '已经结算过了！';
    }

    echo returnResult($result, 1);
    exit();
}    