<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PaymentClass {

    private $Id; //
    private $ProCode; //项目编号
    private $ProName; //项目名称
    private $UnitName; //单位名称
    private $InvoiceNum; //发票号码
    private $InvoiceDate; //开票日期
    private $PaymentAmount; //回款金额
    private $PaymentDate; //回款日期
    private $PaymentSub; //回款主体
    private $PaymentType; //回款方式
    private $VoucherNum; //凭证号
    private $Agent; //经办人
    private $PaymentDesc; //说明
    private $PaymentStatus; //回款状态
    private $WritePerson; //
    private $WriteDate; //
    private $UnitId;
    private $IncomeType;

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("payment", null);
    }

    function getInfo($id) {
        $sql = "select * from payment where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from payment where Id=$id";
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
        $sql = "update payment set $condition where Id=$this->Id";
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
        $sql = "insert into payment set $condition ";
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

    function getInvoiceNum() {
        return $this->InvoiceNum;
    }

    function getInvoiceDate() {
        return $this->InvoiceDate;
    }

    function getPaymentAmount() {
        return $this->PaymentAmount;
    }

    function getPaymentDate() {
        return $this->PaymentDate;
    }

    function getPaymentSub() {
        return $this->PaymentSub;
    }

    function getPaymentType() {
        return $this->PaymentType;
    }

    function getVoucherNum() {
        return $this->VoucherNum;
    }

    function getAgent() {
        return $this->Agent;
    }

    function getPaymentDesc() {
        return $this->PaymentDesc;
    }

    function getPaymentStatus() {
        return $this->PaymentStatus;
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

    function setInvoiceNum($InvoiceNum) {
        $this->InvoiceNum = $InvoiceNum;
        return $this;
    }

    function setInvoiceDate($InvoiceDate) {
        $this->InvoiceDate = $InvoiceDate;
        return $this;
    }

    function setPaymentAmount($PaymentAmount) {
        $this->PaymentAmount = $PaymentAmount;
        return $this;
    }

    function setPaymentDate($PaymentDate) {
        $this->PaymentDate = $PaymentDate;
        return $this;
    }

    function setPaymentSub($PaymentSub) {
        $this->PaymentSub = $PaymentSub;
        return $this;
    }

    function setPaymentType($PaymentType) {
        $this->PaymentType = $PaymentType;
        return $this;
    }

    function setVoucherNum($VoucherNum) {
        $this->VoucherNum = $VoucherNum;
        return $this;
    }

    function setAgent($Agent) {
        $this->Agent = $Agent;
        return $this;
    }

    function setPaymentDesc($PaymentDesc) {
        $this->PaymentDesc = $PaymentDesc;
        return $this;
    }

    function setPaymentStatus($PaymentStatus) {
        $this->PaymentStatus = $PaymentStatus;
        return $this;
    }

    function getUnitName() {
        return $this->UnitName;
    }

    function setUnitName($UnitName) {
        $this->UnitName = $UnitName;
        return $this;
    }

    function getWritePerson() {
        return $this->WritePerson;
    }

    function getWriteDate() {
        return $this->WriteDate;
    }

    function setWritePerson($WritePerson) {
        $this->WritePerson = $WritePerson;
        return $this;
    }

    function setWriteDate($WriteDate) {
        $this->WriteDate = $WriteDate;
        return $this;
    }

    function getUnitId() {
        return $this->UnitId;
    }

    function setUnitId($UnitId) {
        $this->UnitId = $UnitId;
        return $this;
    }
    function getIncomeType() {
        return $this->IncomeType;
    }

    function setIncomeType($IncomeType) {
        $this->IncomeType = $IncomeType;
        return $this;
    }


}
