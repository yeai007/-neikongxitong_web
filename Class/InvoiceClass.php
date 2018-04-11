<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class InvoiceClass {

    private $Id; //
    private $ProCode; //项目编码
    private $ProName; //项目名称
    private $InvoiceCode; //发票编号
    private $UnitId; //单位ID
    private $UnitName; //单位名称
    private $Amount; //开票金额
    private $InvoiceNum; //发票号码
    private $SubName; //开票主体单位名称
    private $InvoiceType; //开票类型
    private $InvoiceDate; //开票日期
    private $Drawer; //开票人
    private $Giver; //送票人
    private $GiveTime; //送票日期
    private $Receiver; //发票接收人
    private $ReceiverPhone; //接收人联系方式
    private $ReceiveDate; //接收日期
    private $InvoiceStatus; //状态
    private $WirteDate; //
    private $WirtePerson; //

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("invoice", null);
    }

    function getInfo($id) {
        $sql = "select * from invoice where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from invoice where Id=$id";
        $result = $this->db->row($sql); //返回查询结果到数组
        foreach ($this->columns as $column) {
            $aa = "set" . "$column";
            $this->$aa($result["$column"]);
        }
        return $result;
    }

    function updateInfo($param) {
        $condition = '';
        foreach ($this->columns as $column) {
            if (isset($param[$column])) {
                if (empty($condition)) {
                    $condition = $column . "='" . $param[$column] . "'";
                } else {
                    $condition = $condition . "," . $column . "='" . $param[$column] . "'";
                }
            }
        }
        $sql = "update invoice set $condition where Id=$this->Id";
        //return $sql;
        return $this->db->query($sql);
    }

    function insertInfo($param) {
        $condition = '';
        foreach ($this->columns as $column) {
            if (isset($param[$column])) {
                if (empty($condition)) {
                    $condition = $column . "='" . $param[$column] . "'";
                } else {
                    $condition = $condition . "," . $column . "='" . $param[$column] . "'";
                }
            }
        }
        $sql = "insert into invoice set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getId() {
        return $this->Id;
    }

    function getProCode() {
        return $this->ProCode;
    }

    function getProName() {
        return $this->ProName;
    }

    function getInvoiceCode() {
        return $this->InvoiceCode;
    }

    function getUnitId() {
        return $this->UnitId;
    }

    function getUnitName() {
        return $this->UnitName;
    }

    function getAmount() {
        return $this->Amount;
    }

    function getInvoiceNum() {
        return $this->InvoiceNum;
    }

    function getSubName() {
        return $this->SubName;
    }

    function getInvoiceType() {
        return $this->InvoiceType;
    }

    function getInvoiceDate() {
        return $this->InvoiceDate;
    }

    function getDrawer() {
        return $this->Drawer;
    }

    function getGiver() {
        return $this->Giver;
    }

    function getGiveTime() {
        return $this->GiveTime;
    }

    function getReceiver() {
        return $this->Receiver;
    }

    function getReceiverPhone() {
        return $this->ReceiverPhone;
    }

    function getReceiveDate() {
        return $this->ReceiveDate;
    }

    function getInvoiceStatus() {
        return $this->InvoiceStatus;
    }

    function setId($Id) {
        $this->Id = $Id;
        return $this;
    }

    function setProCode($ProCode) {
        $this->ProCode = $ProCode;
        return $this;
    }

    function setProName($ProName) {
        $this->ProName = $ProName;
        return $this;
    }

    function setInvoiceCode($InvoiceCode) {
        $this->InvoiceCode = $InvoiceCode;
        return $this;
    }

    function setUnitId($UnitId) {
        $this->UnitId = $UnitId;
        return $this;
    }

    function setUnitName($UnitName) {
        $this->UnitName = $UnitName;
        return $this;
    }

    function setAmount($Amount) {
        $this->Amount = $Amount;
        return $this;
    }

    function setInvoiceNum($InvoiceNum) {
        $this->InvoiceNum = $InvoiceNum;
        return $this;
    }

    function setSubName($SubName) {
        $this->SubName = $SubName;
        return $this;
    }

    function setInvoiceType($InvoiceType) {
        $this->InvoiceType = $InvoiceType;
        return $this;
    }

    function setInvoiceDate($InvoiceDate) {
        $this->InvoiceDate = $InvoiceDate;
        return $this;
    }

    function setDrawer($Drawer) {
        $this->Drawer = $Drawer;
        return $this;
    }

    function setGiver($Giver) {
        $this->Giver = $Giver;
        return $this;
    }

    function setGiveTime($GiveTime) {
        $this->GiveTime = $GiveTime;
        return $this;
    }

    function setReceiver($Receiver) {
        $this->Receiver = $Receiver;
        return $this;
    }

    function setReceiverPhone($ReceiverPhone) {
        $this->ReceiverPhone = $ReceiverPhone;
        return $this;
    }

    function setReceiveDate($ReceiveDate) {
        $this->ReceiveDate = $ReceiveDate;
        return $this;
    }

    function setInvoiceStatus($InvoiceStatus) {
        $this->InvoiceStatus = $InvoiceStatus;
        return $this;
    }
    function getWirteDate() {
        return $this->WirteDate;
    }

    function getWirtePerson() {
        return $this->WirtePerson;
    }

    function setWirteDate($WirteDate) {
        $this->WirteDate = $WirteDate;
        return $this;
    }

    function setWirtePerson($WirtePerson) {
        $this->WirtePerson = $WirtePerson;
        return $this;
    }


}
