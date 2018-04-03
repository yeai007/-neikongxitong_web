<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class OrganizationClass {

    private $Id; //
    private $OrgCode; //机构编码
    private $OrgName; //机构名称
    private $CreditCode; //统一社会信用代码
    private $OrgAddress; //
    private $OrgPhone; //
    private $OpenBank; //开户行
    private $BankAccount; //开户帐号
    private $ChargePerson; //机构负责人
    private $ChargerPhone; //负责人电话
    private $OrgStatu; //机构状态
    private $OrgDesc;

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("organization", null);
    }

    function getInfo($id) {
        $sql = "select * from organization where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from organization where Id=$id";
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
        $sql = "update organization set $condition where Id=$this->Id";
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
        $sql = "insert into organization set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getId() {
        return $this->Id;
    }

    function getOrgCode() {
        return $this->OrgCode;
    }

    function getOrgName() {
        return $this->OrgName;
    }

    function getCreditCode() {
        return $this->CreditCode;
    }

    function getOrgAddress() {
        return $this->OrgAddress;
    }

    function getOrgPhone() {
        return $this->OrgPhone;
    }

    function getOpenBank() {
        return $this->OpenBank;
    }

    function getBankAccount() {
        return $this->BankAccount;
    }

    function getChargePerson() {
        return $this->ChargePerson;
    }

    function getChargerPhone() {
        return $this->ChargerPhone;
    }

    function getOrgStatu() {
        return $this->OrgStatu;
    }

    function setId($Id) {
        $this->Id = $Id;
        return $this;
    }

    function setOrgCode($OrgCode) {
        $this->OrgCode = $OrgCode;
        return $this;
    }

    function setOrgName($OrgName) {
        $this->OrgName = $OrgName;
        return $this;
    }

    function setCreditCode($CreditCode) {
        $this->CreditCode = $CreditCode;
        return $this;
    }

    function setOrgAddress($OrgAddress) {
        $this->OrgAddress = $OrgAddress;
        return $this;
    }

    function setOrgPhone($OrgPhone) {
        $this->OrgPhone = $OrgPhone;
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

    function setChargePerson($ChargePerson) {
        $this->ChargePerson = $ChargePerson;
        return $this;
    }

    function setChargerPhone($ChargerPhone) {
        $this->ChargerPhone = $ChargerPhone;
        return $this;
    }

    function setOrgStatu($OrgStatu) {
        $this->OrgStatu = $OrgStatu;
        return $this;
    }

    function getOrgDesc() {
        return $this->OrgDesc;
    }

    function setOrgDesc($OrgDesc) {
        $this->OrgDesc = $OrgDesc;
        return $this;
    }

}
