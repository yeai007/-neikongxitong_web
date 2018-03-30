<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AchievementClass {

    private $Id; //
    private $ProCode; //
    private $ProName; //
    private $StudentId; //学员Id
    private $TheoryAch; //理论成绩
    private $TheoryExamTime; //考试时间
    private $TheoryExamAddress; //考试地点
    private $ActualOperatAch; //实际操作成绩
    private $ActualExamTime; //考试时间
    private $ActualExamAddress; //考试地点
    private $IsAdopt; //是否通过
    private $HeaderMaster; //班主任
    private $WritePerson; //录入人
    private $WriteDate; //录入时间
    private $Flag;

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("achievementrecord", null);
    }

    function getInfo($id) {
        $sql = "select * from achievementrecord where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from achievementrecord where Id=$id";
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
        $sql = "update achievementrecord set $condition where Id=$this->Id";
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
        $sql = "insert into achievementrecord set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getId() {
        return $this->Id;
    }

    function getProName() {
        return $this->ProName;
    }

    function getStudentId() {
        return $this->StudentId;
    }

    function getTheoryAch() {
        return $this->TheoryAch;
    }

    function getTheoryExamTime() {
        return $this->TheoryExamTime;
    }

    function getTheoryExamAddress() {
        return $this->TheoryExamAddress;
    }

    function getActualOperatAch() {
        return $this->ActualOperatAch;
    }

    function getActualExamTime() {
        return $this->ActualExamTime;
    }

    function getActualExamAddress() {
        return $this->ActualExamAddress;
    }

    function getIsAdopt() {
        return $this->IsAdopt;
    }

    function getHeaderMaster() {
        return $this->HeaderMaster;
    }

    function getWritePerson() {
        return $this->WritePerson;
    }

    function getWriteDate() {
        return $this->WriteDate;
    }

    function setId($Id) {
        $this->Id = $Id;
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

    function setTheoryAch($TheoryAch) {
        $this->TheoryAch = $TheoryAch;
        return $this;
    }

    function setTheoryExamTime($TheoryExamTime) {
        $this->TheoryExamTime = $TheoryExamTime;
        return $this;
    }

    function setTheoryExamAddress($TheoryExamAddress) {
        $this->TheoryExamAddress = $TheoryExamAddress;
        return $this;
    }

    function setActualOperatAch($ActualOperatAch) {
        $this->ActualOperatAch = $ActualOperatAch;
        return $this;
    }

    function setActualExamTime($ActualExamTime) {
        $this->ActualExamTime = $ActualExamTime;
        return $this;
    }

    function setActualExamAddress($ActualExamAddress) {
        $this->ActualExamAddress = $ActualExamAddress;
        return $this;
    }

    function setIsAdopt($IsAdopt) {
        $this->IsAdopt = $IsAdopt;
        return $this;
    }

    function setHeaderMaster($HeaderMaster) {
        $this->HeaderMaster = $HeaderMaster;
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

    function getProCode() {
        return $this->ProCode;
    }

    function setProCode($ProCode) {
        $this->ProCode = $ProCode;
        return $this;
    }

    function getFlag() {
        return $this->Flag;
    }

    function setFlag($Flag) {
        $this->Flag = $Flag;
        return $this;
    }

}
