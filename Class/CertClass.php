<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CertClass {

    private $CertId; //
    private $ProCode; //项目编码
    private $ProName; //项目名称
    private $SubTraining; //培训科目
    private $SubType; //培训类别
    private $StudentName; //姓名
    private $StudentNum; //身份证号
    private $UnitName; //单位名称
    private $Phone; //联系电话
    private $CertCode; //证书编码
    private $NextExamDate; //下次复审日期
    private $IssuingOrgan; //发证机关
    private $WritePerson; //
    private $WriteDate; //
    private $Flag; //
    private $IsRemind; //是否到期提醒
    private $StudentId;

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("certinfo", null);
    }

    function getInfo($id) {
        $sql = "select * from certinfo where CertId=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from certinfo where CertId=$id";
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
        $sql = "update certinfo set $condition where CertId=$this->CertId";
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
        $sql = "insert into certinfo set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getCertId() {
        return $this->CertId;
    }

    function getProCode() {
        return $this->ProCode;
    }

    function getProName() {
        return $this->ProName;
    }

    function getSubTraining() {
        return $this->SubTraining;
    }

    function getSubType() {
        return $this->SubType;
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

    function getPhone() {
        return $this->Phone;
    }

    function getCertCode() {
        return $this->CertCode;
    }

    function getNextExamDate() {
        return $this->NextExamDate;
    }

    function getIssuingOrgan() {
        return $this->IssuingOrgan;
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

    function getIsRemind() {
        return $this->IsRemind;
    }

    function setCertId($CertId) {
        $this->CertId = $CertId;
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

    function setSubTraining($SubTraining) {
        $this->SubTraining = $SubTraining;
        return $this;
    }

    function setSubType($SubType) {
        $this->SubType = $SubType;
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

    function setPhone($Phone) {
        $this->Phone = $Phone;
        return $this;
    }

    function setCertCode($CertCode) {
        $this->CertCode = $CertCode;
        return $this;
    }

    function setNextExamDate($NextExamDate) {
        $this->NextExamDate = $NextExamDate;
        return $this;
    }

    function setIssuingOrgan($IssuingOrgan) {
        $this->IssuingOrgan = $IssuingOrgan;
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

    function setIsRemind($IsRemind) {
        $this->IsRemind = $IsRemind;
        return $this;
    }

    function getStudentId() {
        return $this->StudentId;
    }

    function setStudentId($StudentId) {
        $this->StudentId = $StudentId;
        return $this;
    }

}
