<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class WorkRecordClass {

    private $RecordId; //记录ID
    private $WorkName; //工作名称
    private $WorkContent; //工作内容
    private $WorkResult; //工作结果
    private $WorkDate; //
    private $WritePerson; //
    private $WriteDate; //
    private $Flag; //作废：0：正常，1：作废

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("workrecord", null);
    }

    function getInfo($id) {
        $sql = "select * from workrecord where RecordId=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from workrecord where RecordId=$id";
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
        $sql = "update workrecord set $condition where RecordId=$this->RecordId";
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
        $sql = "insert into workrecord set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getRecordId() {
        return $this->RecordId;
    }

    function getWorkName() {
        return $this->WorkName;
    }

    function getWorkContent() {
        return $this->WorkContent;
    }

    function getWorkResult() {
        return $this->WorkResult;
    }

    function getWorkDate() {
        return $this->WorkDate;
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

    function setRecordId($RecordId) {
        $this->RecordId = $RecordId;
        return $this;
    }

    function setWorkName($WorkName) {
        $this->WorkName = $WorkName;
        return $this;
    }

    function setWorkContent($WorkContent) {
        $this->WorkContent = $WorkContent;
        return $this;
    }

    function setWorkResult($WorkResult) {
        $this->WorkResult = $WorkResult;
        return $this;
    }

    function setWorkDate($WorkDate) {
        $this->WorkDate = $WorkDate;
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

}
