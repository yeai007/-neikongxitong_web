<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExpenditureClass
 *
 * @author PVer
 */
class ExpenditureClass {

    //put your code here
    private $Id; //
    private $ProCode; //项目编号
    private $ProName; //项目名称
    private $ProType; //项目类别
    private $SubTraining; //培训科目
    private $Amount; //金额
    private $Disbursement; //支出人
    private $Desctribe; //用途及支出情况
    private $Status; //结项情况0：可结项，1:已结项，2：不可结项
    private $KnotPerson; //结项人
    private $KnotDate; //结项日期
    private $DisbursementId;
    private $AboutId;
    private $AboutType;
    private $KnotPersonId;

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("expenditure", null);
    }

    function check($aboutid) {
        $result = false;
        $sql = "select * from expenditure where AboutId=$aboutid";
        $head = $this->db->query($sql);
        if (count($head) > 0) {
            $result = true;
        }
        return $result;
    }

    function getInfo($id) {
        $sql = "select * from expenditure where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function cancel($id, $type) {
        $rec = false;
        $sql = "select * from expenditure where AboutId=$id and AboutType=$type limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        $this->setInfo($result["Id"]);
        $arr = array();
        $arr["Status"] = 3;
        $aa = $this->updateInfo($arr);
        if ($aa > -1) {
            $rec = true;
        }
        return $rec;
    }

    function setInfoByProCode($code) {
        $sql = "select * from expenditure where ProCode='$code' limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        foreach ($this->columns as $column) {
            $aa = "set" . "$column";
            $this->$aa($result["$column"]);
        }
        return $result;
    }

    function setInfoByAboutId($id, $type) {
        $sql = "select * from expenditure where AboutId=$id and AboutType=$type limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        foreach ($this->columns as $column) {
            $aa = "set" . "$column";
            $this->$aa($result["$column"]);
        }
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from expenditure where Id=$id";
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
        $sql = "update expenditure set $condition where Id=$this->Id";
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
        $sql = "insert into expenditure set $condition ";
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

    function getProType() {
        return $this->ProType;
    }

    function getSubTraining() {
        return $this->SubTraining;
    }

    function getAmount() {
        return $this->Amount;
    }

    function getDisbursement() {
        return $this->Disbursement;
    }

    function getDesctribe() {
        return $this->Desctribe;
    }

    function getStatus() {
        return $this->Status;
    }

    function getKnotPerson() {
        return $this->KnotPerson;
    }

    function getKnotDate() {
        return $this->KnotDate;
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

    function setProType($ProType) {
        $this->ProType = $ProType;
        return $this;
    }

    function setSubTraining($SubTraining) {
        $this->SubTraining = $SubTraining;
        return $this;
    }

    function setAmount($Amount) {
        $this->Amount = $Amount;
        return $this;
    }

    function setDisbursement($Disbursement) {
        $this->Disbursement = $Disbursement;
        return $this;
    }

    function setDesctribe($Desctribe) {
        $this->Desctribe = $Desctribe;
        return $this;
    }

    function setStatus($Status) {
        $this->Status = $Status;
        return $this;
    }

    function setKnotPerson($KnotPerson) {
        $this->KnotPerson = $KnotPerson;
        return $this;
    }

    function setKnotDate($KnotDate) {
        $this->KnotDate = $KnotDate;
        return $this;
    }

    function getDisbursementId() {
        return $this->DisbursementId;
    }

    function getAboutId() {
        return $this->AboutId;
    }

    function getAboutType() {
        return $this->AboutType;
    }

    function setDisbursementId($DisbursementId) {
        $this->DisbursementId = $DisbursementId;
        return $this;
    }

    function setAboutId($AboutId) {
        $this->AboutId = $AboutId;
        return $this;
    }

    function setAboutType($AboutType) {
        $this->AboutType = $AboutType;
        return $this;
    }

    function getKnotPersonId() {
        return $this->KnotPersonId;
    }

    function setKnotPersonId($KnotPersonId) {
        $this->KnotPersonId = $KnotPersonId;
        return $this;
    }

}
