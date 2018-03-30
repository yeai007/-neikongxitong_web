<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ReimClass {

    private $ReimId; //
    private $Year; //
    private $ReimPerson; //报销人
    private $ProCode; //项目编码
    private $ProName; //项目名称
    private $ReimType; //类别
    private $ReimSub; //科目
    private $ReimDesc; //用途及票据说明
    private $WritePerson; //
    private $WriteDate; //
    private $ReimStatus; //状态
    private $ReimExam; //审批人
    private $ExamDate; //审批日期
    private $ReimAmount; //报销金额
    private $GrantAmount; //发放金额
    private $FinanceName; //支出财务主体名称
    private $VoucherNum; //凭证号
    private $GrantDate; //发放日期
    private $GrantPerson; //发放人
    private $GrantDesc; //发放说明
    private $ReimPersonId;

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("reimbursement", null);
    }

    function getInfo($id) {
        $sql = "select * from reimbursement where ReimId=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from reimbursement where ReimId=$id";
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
        $sql = "update reimbursement set $condition where ReimId=$this->ReimId";
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
        $sql = "insert into reimbursement set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getReimId() {
        return $this->ReimId;
    }

    function getYear() {
        return $this->Year;
    }

    function getReimPerson() {
        return $this->ReimPerson;
    }

    function getProName() {
        return $this->ProName;
    }

    function getReimType() {
        return $this->ReimType;
    }

    function getReimSub() {
        return $this->ReimSub;
    }

    function getReimDesc() {
        return $this->ReimDesc;
    }

    function getWritePerson() {
        return $this->WritePerson;
    }

    function getWriteDate() {
        return $this->WriteDate;
    }

    function getReimStatus() {
        return $this->ReimStatus;
    }

    function getReimExam() {
        return $this->ReimExam;
    }

    function getExamDate() {
        return $this->ExamDate;
    }

    function getReimAmount() {
        return $this->ReimAmount;
    }

    function getGrantAmount() {
        return $this->GrantAmount;
    }

    function getFinanceName() {
        return $this->FinanceName;
    }

    function getVoucherNum() {
        return $this->VoucherNum;
    }

    function getGrantDate() {
        return $this->GrantDate;
    }

    function getGrantPerson() {
        return $this->GrantPerson;
    }

    function getGrantDesc() {
        return $this->GrantDesc;
    }

    function setReimId($ReimId) {
        $this->ReimId = $ReimId;
        return $this;
    }

    function setYear($Year) {
        $this->Year = $Year;
        return $this;
    }

    function setReimPerson($ReimPerson) {
        $this->ReimPerson = $ReimPerson;
        return $this;
    }

    function setProName($ProName) {
        $this->ProName = $ProName;
        return $this;
    }

    function setReimType($ReimType) {
        $this->ReimType = $ReimType;
        return $this;
    }

    function setReimSub($ReimSub) {
        $this->ReimSub = $ReimSub;
        return $this;
    }

    function setReimDesc($ReimDesc) {
        $this->ReimDesc = $ReimDesc;
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

    function setReimStatus($ReimStatus) {
        $this->ReimStatus = $ReimStatus;
        return $this;
    }

    function setReimExam($ReimExam) {
        $this->ReimExam = $ReimExam;
        return $this;
    }

    function setExamDate($ExamDate) {
        $this->ExamDate = $ExamDate;
        return $this;
    }

    function setReimAmount($ReimAmount) {
        $this->ReimAmount = $ReimAmount;
        return $this;
    }

    function setGrantAmount($GrantAmount) {
        $this->GrantAmount = $GrantAmount;
        return $this;
    }

    function setFinanceName($FinanceName) {
        $this->FinanceName = $FinanceName;
        return $this;
    }

    function setVoucherNum($VoucherNum) {
        $this->VoucherNum = $VoucherNum;
        return $this;
    }

    function setGrantDate($GrantDate) {
        $this->GrantDate = $GrantDate;
        return $this;
    }

    function setGrantPerson($GrantPerson) {
        $this->GrantPerson = $GrantPerson;
        return $this;
    }

    function setGrantDesc($GrantDesc) {
        $this->GrantDesc = $GrantDesc;
        return $this;
    }

    function getProCode() {
        return $this->ProCode;
    }

    function setProCode($ProCode) {
        $this->ProCode = $ProCode;
        return $this;
    }

    function getReimPersonId() {
        return $this->ReimPersonId;
    }

    function setReimPersonId($ReimPersonId) {
        $this->ReimPersonId = $ReimPersonId;
        return $this;
    }

}
