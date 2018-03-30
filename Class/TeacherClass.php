<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TeacherClass {

    private $TeacherId; //
    private $TeacherName; //教师姓名
    private $TeacherSex; //性别：0：未填写，1：男，2：女
    private $TeacherPNum; //身份证号码
    private $TeacherPhone; //联系电话
    private $QQ; //QQ
    private $Wechat; //微信
    private $CardNum; //卡号
    private $OpeningBank; //开户行
    private $BankAddress; //开户行地址
    private $FeeStandard; //课师费标准
    private $TeacherDesc; //教师介绍
    private $WritePerson; //录入人
    private $WriteDate; //录入时间
    private $TeacherStatus; //教师状态

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("teacherinfo", null);
    }

    function getInfo($id) {
        $sql = "select * from teacherinfo where TeacherId=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from teacherinfo where TeacherId=$id";
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
        $sql = "update teacherinfo set $condition where TeacherId=$this->TeacherId";
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
        $sql = "insert into teacherinfo set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getTeacherId() {
        return $this->TeacherId;
    }

    function getTeacherName() {
        return $this->TeacherName;
    }

    function getTeacherSex() {
        return $this->TeacherSex;
    }

    function getTeacherPNum() {
        return $this->TeacherPNum;
    }

    function getTeacherPhone() {
        return $this->TeacherPhone;
    }

    function getQQ() {
        return $this->QQ;
    }

    function getWechat() {
        return $this->Wechat;
    }

    function getCardNum() {
        return $this->CardNum;
    }

    function getOpeningBank() {
        return $this->OpeningBank;
    }

    function getBankAddress() {
        return $this->BankAddress;
    }

    function getFeeStandard() {
        return $this->FeeStandard;
    }

    function getTeacherDesc() {
        return $this->TeacherDesc;
    }

    function getWritePerson() {
        return $this->WritePerson;
    }

    function getWriteDate() {
        return $this->WriteDate;
    }

    function getTeacherStatus() {
        return $this->TeacherStatus;
    }

    function setTeacherId($TeacherId) {
        $this->TeacherId = $TeacherId;
        return $this;
    }

    function setTeacherName($TeacherName) {
        $this->TeacherName = $TeacherName;
        return $this;
    }

    function setTeacherSex($TeacherSex) {
        $this->TeacherSex = $TeacherSex;
        return $this;
    }

    function setTeacherPNum($TeacherPNum) {
        $this->TeacherPNum = $TeacherPNum;
        return $this;
    }

    function setTeacherPhone($TeacherPhone) {
        $this->TeacherPhone = $TeacherPhone;
        return $this;
    }

    function setQQ($QQ) {
        $this->QQ = $QQ;
        return $this;
    }

    function setWechat($Wechat) {
        $this->Wechat = $Wechat;
        return $this;
    }

    function setCardNum($CardNum) {
        $this->CardNum = $CardNum;
        return $this;
    }

    function setOpeningBank($OpeningBank) {
        $this->OpeningBank = $OpeningBank;
        return $this;
    }

    function setBankAddress($BankAddress) {
        $this->BankAddress = $BankAddress;
        return $this;
    }

    function setFeeStandard($FeeStandard) {
        $this->FeeStandard = $FeeStandard;
        return $this;
    }

    function setTeacherDesc($TeacherDesc) {
        $this->TeacherDesc = $TeacherDesc;
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

    function setTeacherStatus($TeacherStatus) {
        $this->TeacherStatus = $TeacherStatus;
        return $this;
    }

}
