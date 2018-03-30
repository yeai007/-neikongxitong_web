<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CommunicateClass {

    private $id; //
    private $CommunicateContent; //沟通内容
    private $CompanyName; //拜访公司名称
    private $CompanyPerson; //单位联系人
    private $CommunicateMode; //拜访沟通方式
    private $CommunicateDate; //沟通日期
    private $CommunicatePerson; //拜访沟通人id
    private $CommunicateResult; //沟通成果
    private $Flag; //作废0：正常，1：作废

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("communicaterecord", null);
    }

    function getInfo($id) {
        $sql = "select * from communicaterecord where id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from communicaterecord where id=$id";
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
        $sql = "update communicaterecord set $condition where id=$this->id";
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
        $sql = "insert into communicaterecord set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getId() {
        return $this->id;
    }

    function getCommunicateContent() {
        return $this->CommunicateContent;
    }

    function getCompanyName() {
        return $this->CompanyName;
    }

    function getCompanyPerson() {
        return $this->CompanyPerson;
    }

    function getCommunicateMode() {
        return $this->CommunicateMode;
    }

    function getCommunicateDate() {
        return $this->CommunicateDate;
    }

    function getCommunicatePerson() {
        return $this->CommunicatePerson;
    }

    function getCommunicateResult() {
        return $this->CommunicateResult;
    }

    function getFlag() {
        return $this->Flag;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setCommunicateContent($CommunicateContent) {
        $this->CommunicateContent = $CommunicateContent;
        return $this;
    }

    function setCompanyName($CompanyName) {
        $this->CompanyName = $CompanyName;
        return $this;
    }

    function setCompanyPerson($CompanyPerson) {
        $this->CompanyPerson = $CompanyPerson;
        return $this;
    }

    function setCommunicateMode($CommunicateMode) {
        $this->CommunicateMode = $CommunicateMode;
        return $this;
    }

    function setCommunicateDate($CommunicateDate) {
        $this->CommunicateDate = $CommunicateDate;
        return $this;
    }

    function setCommunicatePerson($CommunicatePerson) {
        $this->CommunicatePerson = $CommunicatePerson;
        return $this;
    }

    function setCommunicateResult($CommunicateResult) {
        $this->CommunicateResult = $CommunicateResult;
        return $this;
    }

    function setFlag($Flag) {
        $this->Flag = $Flag;
        return $this;
    }

}
