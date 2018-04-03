<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class StudentClass {

    private $Id; //
    private $StudentName; //学员姓名
    private $StudentNum; //身份证号
    private $UnitName; //单位名称
    private $StudentPhone; //联系电话
    private $WritePerson; //
    private $WriteDate; //
    private $StudentStatus; //学员状态
    private $ChargeAmount; //收费金额
    private $ChargeDesc; //收费说明
    private $ProjectCode; //项目编码
    private $ProjectName; //项目名称

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("studentinfo", null);
    }

    function getInfo($id) {
        $sql = "select * from studentinfo where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from studentinfo where Id=$id";
        $result = $this->db->row($sql); //返回查询结果到数组
        foreach ($this->columns as $column) {
            $aa = "set" . "$column";
            $this->$aa($result["$column"]);
        }
        return $result;
    }

    function updateStudentBilling($ids, $statu) {
        $sql = "update studentinfo set IsBilling=$statu where Id in($ids)";
        return $this->db->query($sql);
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
        $sql = "update studentinfo set $condition where Id=$this->Id";
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
        $sql = "insert into studentinfo set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getId() {
        return $this->Id;
    }

    function getStudentName() {
        return $this->StudentName;
    }

    function getStudentNum() {
        return $this->StudentNum;
    }

    function getUnitName() {
        return $this->UnitName;
    }

    function getStudentPhone() {
        return $this->StudentPhone;
    }

    function getWritePerson() {
        return $this->WritePerson;
    }

    function getWriteDate() {
        return $this->WriteDate;
    }

    function getStudentStatus() {
        return $this->StudentStatus;
    }

    function getChargeAmount() {
        return $this->ChargeAmount;
    }

    function getChargeDesc() {
        return $this->ChargeDesc;
    }

    function setId($Id) {
        $this->Id = $Id;
        return $this;
    }

    function setStudentName($StudentName) {
        $this->StudentName = $StudentName;
        return $this;
    }

    function setStudentNum($StudentNum) {
        $this->StudentNum = $StudentNum;
        return $this;
    }

    function setUnitName($UnitName) {
        $this->UnitName = $UnitName;
        return $this;
    }

    function setStudentPhone($StudentPhone) {
        $this->StudentPhone = $StudentPhone;
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

    function setStudentStatus($StudentStatus) {
        $this->StudentStatus = $StudentStatus;
        return $this;
    }

    function setChargeAmount($ChargeAmount) {
        $this->ChargeAmount = $ChargeAmount;
        return $this;
    }

    function setChargeDesc($ChargeDesc) {
        $this->ChargeDesc = $ChargeDesc;
        return $this;
    }

    function getProjectCode() {
        return $this->ProjectCode;
    }

    function getProjectName() {
        return $this->ProjectName;
    }

    function setProjectCode($ProjectCode) {
        $this->ProjectCode = $ProjectCode;
        return $this;
    }

    function setProjectName($ProjectName) {
        $this->ProjectName = $ProjectName;
        return $this;
    }

}
