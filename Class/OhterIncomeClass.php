<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class OhterIncomeClass {

    private $Id; //
    private $Amount; //金额
    private $Agent; //经办人
    private $VoucherNum; //凭证号
    private $IncomeDesc; //说明
    private $WritePerson; //
    private $WriteDate; //
    private $Flag; //作废
    private $Year;

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("otherincome", null);
    }

    function getInfo($id) {
        $sql = "select * from otherincome where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from otherincome where Id=$id";
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
        $sql = "update otherincome set $condition where Id=$this->Id";
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
        $sql = "insert into otherincome set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getId() {
        return $this->Id;
    }

    function getAmount() {
        return $this->Amount;
    }

    function getAgent() {
        return $this->Agent;
    }

    function getVoucherNum() {
        return $this->VoucherNum;
    }

    function getWritePerson() {
        return $this->WritePerson;
    }

    function getWriteDate() {
        return $this->WriteDate;
    }

    function getFlag() {
        return $this->Flag;
    }

    function setId($Id) {
        $this->Id = $Id;
        return $this;
    }

    function setAmount($Amount) {
        $this->Amount = $Amount;
        return $this;
    }

    function setAgent($Agent) {
        $this->Agent = $Agent;
        return $this;
    }

    function setVoucherNum($VoucherNum) {
        $this->VoucherNum = $VoucherNum;
        return $this;
    }

    function setWritePerson($WritePerson) {
        $this->WritePerson = $WritePerson;
        return $this;
    }

    function setWriteDate($WriteDate) {
        $this->WriteDate = $WriteDate;
        return $this;
    }

    function setFlag($Flag) {
        $this->Flag = $Flag;
        return $this;
    }

    function getIncomeDesc() {
        return $this->IncomeDesc;
    }

    function setIncomeDesc($IncomeDesc) {
        $this->IncomeDesc = $IncomeDesc;
        return $this;
    }

    function getYear() {
        return $this->Year;
    }

    function setYear($Year) {
        $this->Year = $Year;
        return $this;
    }

}
