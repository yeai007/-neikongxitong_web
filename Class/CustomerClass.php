<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//客户信息类





class CustomerClass {

    private $CustomerId; //客户唯一id
    private $Customerlevel; //所在单位级别
    private $CustomerName; //客户名称、单位名称
    private $CreditCode; //统一社会信用代码
    private $CustomerAddress; //住所
    private $CustomerPhone; //客户电话
    private $OpenBank; //开户行
    private $BankAccount; //开户帐号
    private $PerformanceLevel; //绩效级别,单位层次
    private $ChargePerson; //客服单位负责人
    private $ChargerPhone; //负责人电话
    private $ChargerQQ; //负责人QQ
    private $ChargerWechat; //负责人微信
    private $CustomerContact; //客户联系人
    private $ContactPhone; //联系人电话
    private $ContactQQ; //联系人QQ
    private $ContactWechat; //联系人微信
    private $CustomerDesc; //客户单位介绍
    private $MarketPerson; //单位所属市场人员
    private $WritePerson; //信息录入人
    private $WriteDate; //信息录入日期
    private $VisitCount; //拜访次数
    private $CustomerStatus; //客户状态
    private $ExamPerson; //审核人
    private $ExamDate; //审核时间
    private $Flag; //作废标记

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("customerinfo", null);
    }

    function getInfo($id) {
        $sql = "select * from customerinfo where CustomerId=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from customerinfo where CustomerId=$id";
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
            if (!empty($param[$column])) {
                if (empty($condition)) {
                    $condition = $column . "='" . $param[$column] . "'";
                } else {
                    $condition = $condition . "," . $column . "='" . $param[$column] . "'";
                }
            }
        }
        $sql = "update customerinfo set $condition where CustomerId=$this->CustomerId";
        return $this->db->query($sql);
    }

    function insertInfo($param) {
        $condition = '';
        foreach ($this->columns as $column) {
            if (!empty($param[$column])) {
                if (empty($condition)) {
                    $condition = $column . "='" . $param[$column] . "'";
                } else {
                    $condition = $condition . "," . $column . "='" . $param[$column] . "'";
                }
            }
        }
        $sql = "insert into customerinfo set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getCustomerId() {
        return $this->CustomerId;
    }

    function getCustomerlevel() {
        return $this->Customerlevel;
    }

    function getCustomerName() {
        return $this->CustomerName;
    }

    function getCreditCode() {
        return $this->CreditCode;
    }

    function getCustomerAddress() {
        return $this->CustomerAddress;
    }

    function getCustomerPhone() {
        return $this->CustomerPhone;
    }

    function getOpenBank() {
        return $this->OpenBank;
    }

    function getBankAccount() {
        return $this->BankAccount;
    }

    function getPerformanceLevel() {
        return $this->PerformanceLevel;
    }

    function getChargePerson() {
        return $this->ChargePerson;
    }

    function getChargerPhone() {
        return $this->ChargerPhone;
    }

    function getChargerQQ() {
        return $this->ChargerQQ;
    }

    function getChargerWechat() {
        return $this->ChargerWechat;
    }

    function getCustomerContact() {
        return $this->CustomerContact;
    }

    function getContactPhone() {
        return $this->ContactPhone;
    }

    function getContactQQ() {
        return $this->ContactQQ;
    }

    function getContactWechat() {
        return $this->ContactWechat;
    }

    function getCustomerDesc() {
        return $this->CustomerDesc;
    }

    function getMarketPerson() {
        return $this->MarketPerson;
    }

    function getWritePerson() {
        return $this->WritePerson;
    }

    function getWriteDate() {
        return $this->WriteDate;
    }

    function getVisitCount() {
        return $this->VisitCount;
    }

    function getCustomerStatus() {
        return $this->CustomerStatus;
    }

    function getExamPerson() {
        return $this->ExamPerson;
    }

    function getExamDate() {
        return $this->ExamDate;
    }

    function setCustomerId($CustomerId) {
        $this->CustomerId = $CustomerId;
        return $this;
    }

    function setCustomerlevel($Customerlevel) {
        $this->Customerlevel = $Customerlevel;
        return $this;
    }

    function setCustomerName($CustomerName) {
        $this->CustomerName = $CustomerName;
        return $this;
    }

    function setCreditCode($CreditCode) {
        $this->CreditCode = $CreditCode;
        return $this;
    }

    function setCustomerAddress($CustomerAddress) {
        $this->CustomerAddress = $CustomerAddress;
        return $this;
    }

    function setCustomerPhone($CustomerPhone) {
        $this->CustomerPhone = $CustomerPhone;
        return $this;
    }

    function setOpenBank($OpenBank) {
        $this->OpenBank = $OpenBank;
        return $this;
    }

    function setBankAccount($BankAccount) {
        $this->BankAccount = $BankAccount;
        return $this;
    }

    function setPerformanceLevel($PerformanceLevel) {
        $this->PerformanceLevel = $PerformanceLevel;
        return $this;
    }

    function setChargePerson($ChargePerson) {
        $this->ChargePerson = $ChargePerson;
        return $this;
    }

    function setChargerPhone($ChargerPhone) {
        $this->ChargerPhone = $ChargerPhone;
        return $this;
    }

    function setChargerQQ($ChargerQQ) {
        $this->ChargerQQ = $ChargerQQ;
        return $this;
    }

    function setChargerWechat($ChargerWechat) {
        $this->ChargerWechat = $ChargerWechat;
        return $this;
    }

    function setCustomerContact($CustomerContact) {
        $this->CustomerContact = $CustomerContact;
        return $this;
    }

    function setContactPhone($ContactPhone) {
        $this->ContactPhone = $ContactPhone;
        return $this;
    }

    function setContactQQ($ContactQQ) {
        $this->ContactQQ = $ContactQQ;
        return $this;
    }

    function setContactWechat($ContactWechat) {
        $this->ContactWechat = $ContactWechat;
        return $this;
    }

    function setCustomerDesc($CustomerDesc) {
        $this->CustomerDesc = $CustomerDesc;
        return $this;
    }

    function setMarketPerson($MarketPerson) {
        $this->MarketPerson = $MarketPerson;
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

    function setVisitCount($VisitCount) {
        $this->VisitCount = $VisitCount;
        return $this;
    }

    function setCustomerStatus($CustomerStatus) {
        $this->CustomerStatus = $CustomerStatus;
        return $this;
    }

    function setExamPerson($ExamPerson) {
        $this->ExamPerson = $ExamPerson;
        return $this;
    }

    function setExamDate($ExamDate) {
        $this->ExamDate = $ExamDate;
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
