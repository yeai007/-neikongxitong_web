<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class StudentWorkClass {

    private $Id; //
    private $ProCode; //项目编号
    private $ProName; //项目名称
    private $StudentId; //学员Id
    private $ShouldDays; //应出勤天数
    private $RealDays; //实际出勤天数
    private $WorkDescribe; //考勤说明
    private $WritePerson; //录入人
    private $WriteDate; //录入日期
    private $HeadMaster; //班主任
    private $Flag; //作废标记

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("studentworkinfo", null);
    }

    function getInfo($id) {
        $sql = "select * from studentworkinfo where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from studentworkinfo where Id=$id";
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
        $sql = "update studentworkinfo set $condition where Id=$this->Id";
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
        $sql = "insert into studentworkinfo set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getFlag() {
        return $this->Flag;
    }

    function setFlag($Flag) {
        $this->Flag = $Flag;
        return $this;
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

    function getStudentId() {
        return $this->StudentId;
    }

    function getShouldDays() {
        return $this->ShouldDays;
    }

    function getRealDays() {
        return $this->RealDays;
    }

    function getWorkDescribe() {
        return $this->WorkDescribe;
    }

    function getWritePerson() {
        return $this->WritePerson;
    }

    function getWriteDate() {
        return $this->WriteDate;
    }

    function getHeadMaster() {
        return $this->HeadMaster;
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

    function setStudentId($StudentId) {
        $this->StudentId = $StudentId;
        return $this;
    }

    function setShouldDays($ShouldDays) {
        $this->ShouldDays = $ShouldDays;
        return $this;
    }

    function setRealDays($RealDays) {
        $this->RealDays = $RealDays;
        return $this;
    }

    function setWorkDescribe($WorkDescribe) {
        $this->WorkDescribe = $WorkDescribe;
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

    function setHeadMaster($HeadMaster) {
        $this->HeadMaster = $HeadMaster;
        return $this;
    }

}
