<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TeachArrangeClass {

    private $Id; //
    private $ProCode; //项目编号
    private $ProName; //项目名称
    private $TeachStartDate; //上课开始日期
    private $TeachEndDate; //上课结束日期
    private $TeachDays; //课程天数
    private $HeaderMaster; //班主任
    private $OtherDesc; //其他说明
    private $ChargePerson; //教学负责人
    private $ArrangeDate; //安排日期
    private $Flag; //作废
    private $TeacherFirst; //上课教师1
    private $StartDateFirst; //
    private $EndDateFirst; //
    private $TeachDaysFirst; //
    private $TeacherSecond; //上课教师2
    private $StartDateSecond; //
    private $EndDateSecond; //
    private $TeachDaysSecond; //
    private $TeacherThird; //上课教师3
    private $StartDateThird; //
    private $EndDateThird; //
    private $TeachDaysThird; //

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("teacharrange", null);
    }

    function getInfo($id) {
        $sql = "select * from teacharrange where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from teacharrange where Id=$id";
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
        $sql = "update teacharrange set $condition where Id=$this->Id";
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
        $sql = "insert into teacharrange set $condition ";
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

    function setId($Id) {
        $this->Id = $Id;
        return $this;
    }

    function setProCode($ProCode) {
        $this->ProCode = $ProCode;
        return $this;
    }

    function getProName() {
        return $this->ProName;
    }

    function getTeachStartDate() {
        return $this->TeachStartDate;
    }

    function getTeachEndDate() {
        return $this->TeachEndDate;
    }

    function getTeachDays() {
        return $this->TeachDays;
    }

    function getHeaderMaster() {
        return $this->HeaderMaster;
    }

    function getOtherDesc() {
        return $this->OtherDesc;
    }

    function getChargePerson() {
        return $this->ChargePerson;
    }

    function getArrangeDate() {
        return $this->ArrangeDate;
    }

    function getFlag() {
        return $this->Flag;
    }

    function getTeacherFirst() {
        return $this->TeacherFirst;
    }

    function getStartDateFirst() {
        return $this->StartDateFirst;
    }

    function getEndDateFirst() {
        return $this->EndDateFirst;
    }

    function getTeachDaysFirst() {
        return $this->TeachDaysFirst;
    }

    function getTeacherSecond() {
        return $this->TeacherSecond;
    }

    function getStartDateSecond() {
        return $this->StartDateSecond;
    }

    function getEndDateSecond() {
        return $this->EndDateSecond;
    }

    function getTeachDaysSecond() {
        return $this->TeachDaysSecond;
    }

    function getTeacherThird() {
        return $this->TeacherThird;
    }

    function getStartDateThird() {
        return $this->StartDateThird;
    }

    function getEndDateThird() {
        return $this->EndDateThird;
    }

    function getTeachDaysThird() {
        return $this->TeachDaysThird;
    }

    function setProName($ProName) {
        $this->ProName = $ProName;
        return $this;
    }

    function setTeachStartDate($TeachStartDate) {
        $this->TeachStartDate = $TeachStartDate;
        return $this;
    }

    function setTeachEndDate($TeachEndDate) {
        $this->TeachEndDate = $TeachEndDate;
        return $this;
    }

    function setTeachDays($TeachDays) {
        $this->TeachDays = $TeachDays;
        return $this;
    }

    function setHeaderMaster($HeaderMaster) {
        $this->HeaderMaster = $HeaderMaster;
        return $this;
    }

    function setOtherDesc($OtherDesc) {
        $this->OtherDesc = $OtherDesc;
        return $this;
    }

    function setChargePerson($ChargePerson) {
        $this->ChargePerson = $ChargePerson;
        return $this;
    }

    function setArrangeDate($ArrangeDate) {
        $this->ArrangeDate = $ArrangeDate;
        return $this;
    }

    function setFlag($Flag) {
        $this->Flag = $Flag;
        return $this;
    }

    function setTeacherFirst($TeacherFirst) {
        $this->TeacherFirst = $TeacherFirst;
        return $this;
    }

    function setStartDateFirst($StartDateFirst) {
        $this->StartDateFirst = $StartDateFirst;
        return $this;
    }

    function setEndDateFirst($EndDateFirst) {
        $this->EndDateFirst = $EndDateFirst;
        return $this;
    }

    function setTeachDaysFirst($TeachDaysFirst) {
        $this->TeachDaysFirst = $TeachDaysFirst;
        return $this;
    }

    function setTeacherSecond($TeacherSecond) {
        $this->TeacherSecond = $TeacherSecond;
        return $this;
    }

    function setStartDateSecond($StartDateSecond) {
        $this->StartDateSecond = $StartDateSecond;
        return $this;
    }

    function setEndDateSecond($EndDateSecond) {
        $this->EndDateSecond = $EndDateSecond;
        return $this;
    }

    function setTeachDaysSecond($TeachDaysSecond) {
        $this->TeachDaysSecond = $TeachDaysSecond;
        return $this;
    }

    function setTeacherThird($TeacherThird) {
        $this->TeacherThird = $TeacherThird;
        return $this;
    }

    function setStartDateThird($StartDateThird) {
        $this->StartDateThird = $StartDateThird;
        return $this;
    }

    function setEndDateThird($EndDateThird) {
        $this->EndDateThird = $EndDateThird;
        return $this;
    }

    function setTeachDaysThird($TeachDaysThird) {
        $this->TeachDaysThird = $TeachDaysThird;
        return $this;
    }

}
