<?php

/**
 * @author  PVer
 * @date    2018-4-17 9:05:19
 * @version V1.0
 * @desc    
 */
class ProjectKnotClass {

    private $Id; //
    private $ProCode; //项目编码
    private $ProName; //项目名称
    private $ReceiveAmount; //应收款金额
    private $PaidAmount; //已收款金额
    private $TotalAmount; //项目总支出
    private $GrossProfit; //毛利润
    private $Status; //结项情况0：可结项1：不可结项
    private $KnotPerson; //结项人
    private $KnotDate; //结项日期
    private $KnotPersonId;
    private $ReimAmount; //报销总金额
    private $HeadMasterAmount; //班主任绩效总额

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("projectknot", null);
    }

    function getInfo($id) {
        $sql = "select * from projectknot where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function check($code) {
        $result = false;
        $sql = "select * from projectknot where ProCode='$code'";
        $head = $this->db->query($sql);
        if (count($head) > 0) {
            $result = true;
        }
        return $result;
    }

    function setInfoByCode($code) {
        $sql = "select * from projectknot where ProCode='$code' limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        foreach ($this->columns as $column) {
            $aa = "set" . "$column";
            $this->$aa($result["$column"]);
        }
        return $result;
    }

    function getThis($code) {
        $sql = "select aa.*,(ReimAmount+HeadMasterAmount) ZCAmount,(aa.ApplyAmount-ReimAmount-HeadMasterAmount) MAmount from (select a.ProjectId,a.ProjectCode,a.ProjectName,
(select sum(ChargeAmount)  from studentinfo where ProjectCode =a.ProjectCode) ReceiveAmount,
(select sum(ThisAmount) from applyinvoice where ProCode=a.ProjectCode) ApplyAmount,
(select sum(Amount) from projectknotex where  ProCode=a.ProjectCode) ReimAmount,
(select sum(AchAmount) from headermasterach where  ProCode=a.ProjectCode) HeadMasterAmount,
(select count(*) from studentinfo where ProjectCode=a.ProjectCode) StuCount
from projectsinfo a) aa where aa.ProjectCode='$code' limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from projectknot where Id=$id";
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
        $sql = "update projectknot set $condition where Id=$this->Id";
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
        $sql = "insert into projectknot set $condition ";
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

    function getReceiveAmount() {
        return $this->ReceiveAmount;
    }

    function getPaidAmount() {
        return $this->PaidAmount;
    }

    function getTotalAmount() {
        return $this->TotalAmount;
    }

    function getGrossProfit() {
        return $this->GrossProfit;
    }

    function getStatus() {
        return $this->Status;
    }

    function getKnotPerson() {
        return $this->KnotPerson;
    }

    function getKnotDate() {
        return $this->KnotDate;
    }

    function setId($Id) {
        $this->Id = $Id;
        return $this;
    }

    function setProName($ProName) {
        $this->ProName = $ProName;
        return $this;
    }

    function setReceiveAmount($ReceiveAmount) {
        $this->ReceiveAmount = $ReceiveAmount;
        return $this;
    }

    function setPaidAmount($PaidAmount) {
        $this->PaidAmount = $PaidAmount;
        return $this;
    }

    function setTotalAmount($TotalAmount) {
        $this->TotalAmount = $TotalAmount;
        return $this;
    }

    function setGrossProfit($GrossProfit) {
        $this->GrossProfit = $GrossProfit;
        return $this;
    }

    function setStatus($Status) {
        $this->Status = $Status;
        return $this;
    }

    function setKnotPerson($KnotPerson) {
        $this->KnotPerson = $KnotPerson;
        return $this;
    }

    function setKnotDate($KnotDate) {
        $this->KnotDate = $KnotDate;
        return $this;
    }

    function getProCode() {
        return $this->ProCode;
    }

    function setProCode($ProCode) {
        $this->ProCode = $ProCode;
        return $this;
    }

    function getKnotPersonId() {
        return $this->KnotPersonId;
    }

    function setKnotPersonId($KnotPersonId) {
        $this->KnotPersonId = $KnotPersonId;
        return $this;
    }

    function getReimAmount() {
        return $this->ReimAmount;
    }

    function getHeadMasterAmount() {
        return $this->HeadMasterAmount;
    }

    function setReimAmount($ReimAmount) {
        $this->ReimAmount = $ReimAmount;
        return $this;
    }

    function setHeadMasterAmount($HeadMasterAmount) {
        $this->HeadMasterAmount = $HeadMasterAmount;
        return $this;
    }

}
