<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ContractClass {

    private $ContractId; //
    private $ContractCode; //合同编码
    private $ContractName; //合同名称
    private $ContractCustomerId; //
    private $ContractCustomerName; //客户单位名称
    private $ContractSub; //合同签订主体
    private $ContractAmount; //合同金额
    private $ContractLimitDate; //实施期限
    private $ContractIntroduct; //合同简介
    private $ContractSignDate; //合同签订日期
    private $WritePersonId; //录入人
    private $WriteDate; //录入日期
    private $ContractStatus; //合同状态

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("contractinfo", null);
    }

    function getInfo($id) {
        $sql = "select * from contractinfo where ContractId=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from contractinfo where ContractId=$id";
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
            if (!empty($param[$column])) {
                if (empty($condition)) {
                    $condition = $column . "='" . $param[$column] . "'";
                } else {
                    $condition = $condition . "," . $column . "='" . $param[$column] . "'";
                }
            }
        }
        $sql = "update contractinfo set $condition where ContractId=$this->ContractId";
        return $this->db->query($sql);
    }

    function insertInfo($param) {
        $condition = '';
        foreach ($this->columns as $column) {
            if (!empty($param[$column])) {
                if (empty($condition)) {
                    $condition = $column . "='" . $param[$column] . "'";
                } else {
                    $condition = $condition . "," . $column . "='" . $param[$column] . "'";
                }
            }
        }
        $sql = "insert into contractinfo set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getContractId() {
        return $this->ContractId;
    }

    function getContractCode() {
        return $this->ContractCode;
    }

    function getContractName() {
        return $this->ContractName;
    }

    function getContractCustomerId() {
        return $this->ContractCustomerId;
    }

    function getContractCustomerName() {
        return $this->ContractCustomerName;
    }

    function getContractSub() {
        return $this->ContractSub;
    }

    function getContractAmount() {
        return $this->ContractAmount;
    }

    function getContractLimitDate() {
        return $this->ContractLimitDate;
    }

    function getContractIntroduct() {
        return $this->ContractIntroduct;
    }

    function getContractSignDate() {
        return $this->ContractSignDate;
    }

    function getWritePersonId() {
        return $this->WritePersonId;
    }

    function getWriteDate() {
        return $this->WriteDate;
    }

    function getContractStatus() {
        return $this->ContractStatus;
    }

    function setContractId($ContractId) {
        $this->ContractId = $ContractId;
        return $this;
    }

    function setContractCode($ContractCode) {
        $this->ContractCode = $ContractCode;
        return $this;
    }

    function setContractName($ContractName) {
        $this->ContractName = $ContractName;
        return $this;
    }

    function setContractCustomerId($ContractCustomerId) {
        $this->ContractCustomerId = $ContractCustomerId;
        return $this;
    }

    function setContractCustomerName($ContractCustomerName) {
        $this->ContractCustomerName = $ContractCustomerName;
        return $this;
    }

    function setContractSub($ContractSub) {
        $this->ContractSub = $ContractSub;
        return $this;
    }

    function setContractAmount($ContractAmount) {
        $this->ContractAmount = $ContractAmount;
        return $this;
    }

    function setContractLimitDate($ContractLimitDate) {
        $this->ContractLimitDate = $ContractLimitDate;
        return $this;
    }

    function setContractIntroduct($ContractIntroduct) {
        $this->ContractIntroduct = $ContractIntroduct;
        return $this;
    }

    function setContractSignDate($ContractSignDate) {
        $this->ContractSignDate = $ContractSignDate;
        return $this;
    }

    function setWritePersonId($WritePersonId) {
        $this->WritePersonId = $WritePersonId;
        return $this;
    }

    function setWriteDate($WriteDate) {
        $this->WriteDate = $WriteDate;
        return $this;
    }

    function setContractStatus($ContractStatus) {
        $this->ContractStatus = $ContractStatus;
        return $this;
    }

}
