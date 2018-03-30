<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ProjectClass {

    private $ProjectId; //
    private $ProjectCode; //项目编号
    private $ProjectYear; //项目年份
    private $ProjectBatch; //批次
    private $ProjectType; //项目分类
    private $SubTraining; //培训科目
    private $SubType; //培训类别
    private $BusType; //业务类别
    private $ProjectDate; //立项日期
    private $PlanNum; //计划人数
    private $PlanAmount; //计划项目金额
    private $PlanStartDate; //计划开始日期
    private $PlanEndDate; //计划结束日期
    private $PlanDays; //计划天数
    private $ProjectPerson; //立项人
    private $ProjectDesc; //项目说明
    private $ProjectStatus; //项目状态
    private $ChargeMode; //收费方式
    private $ProjectLeader; //项目负责人
    private $RefuseResult; //拒绝原因

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("projectsinfo", null);
    }

    function getInfo($id) {
        $sql = "select * from projectsinfo where ProjectId=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function checkInfo($code) {
        $sql = "select * from projectsinfo where ProjectCode='$code'";
        $result = $this->db->query($sql); //返回查询结果到数组
        return count($result) > 0 ? true : false;
    }

    function setInfo($id) {
        $sql = "select * from projectsinfo where ProjectId=$id";
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
        $sql = "update projectsinfo set $condition where ProjectId=$this->ProjectId";
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
        $sql = "insert into projectsinfo set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getProjectId() {
        return $this->ProjectId;
    }

    function getProjectCode() {
        return $this->ProjectCode;
    }

    function getProjectYear() {
        return $this->ProjectYear;
    }

    function getProjectBatch() {
        return $this->ProjectBatch;
    }

    function getProjectType() {
        return $this->ProjectType;
    }

    function getSubTraining() {
        return $this->SubTraining;
    }

    function getSubType() {
        return $this->SubType;
    }

    function getBusType() {
        return $this->BusType;
    }

    function getProjectDate() {
        return $this->ProjectDate;
    }

    function getPlanNum() {
        return $this->PlanNum;
    }

    function getPlanAmount() {
        return $this->PlanAmount;
    }

    function getPlanStartDate() {
        return $this->PlanStartDate;
    }

    function getPlanEndDate() {
        return $this->PlanEndDate;
    }

    function getPlanDays() {
        return $this->PlanDays;
    }

    function getProjectPerson() {
        return $this->ProjectPerson;
    }

    function getProjectDesc() {
        return $this->ProjectDesc;
    }

    function getProjectStatus() {
        return $this->ProjectStatus;
    }

    function getChargeMode() {
        return $this->ChargeMode;
    }

    function setProjectId($ProjectId) {
        $this->ProjectId = $ProjectId;
        return $this;
    }

    function setProjectCode($ProjectCode) {
        $this->ProjectCode = $ProjectCode;
        return $this;
    }

    function setProjectYear($ProjectYear) {
        $this->ProjectYear = $ProjectYear;
        return $this;
    }

    function setProjectBatch($ProjectBatch) {
        $this->ProjectBatch = $ProjectBatch;
        return $this;
    }

    function setProjectType($ProjectType) {
        $this->ProjectType = $ProjectType;
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

    function setBusType($BusType) {
        $this->BusType = $BusType;
        return $this;
    }

    function setProjectDate($ProjectDate) {
        $this->ProjectDate = $ProjectDate;
        return $this;
    }

    function setPlanNum($PlanNum) {
        $this->PlanNum = $PlanNum;
        return $this;
    }

    function setPlanAmount($PlanAmount) {
        $this->PlanAmount = $PlanAmount;
        return $this;
    }

    function setPlanStartDate($PlanStartDate) {
        $this->PlanStartDate = $PlanStartDate;
        return $this;
    }

    function setPlanEndDate($PlanEndDate) {
        $this->PlanEndDate = $PlanEndDate;
        return $this;
    }

    function setPlanDays($PlanDays) {
        $this->PlanDays = $PlanDays;
        return $this;
    }

    function setProjectPerson($ProjectPerson) {
        $this->ProjectPerson = $ProjectPerson;
        return $this;
    }

    function setProjectDesc($ProjectDesc) {
        $this->ProjectDesc = $ProjectDesc;
        return $this;
    }

    function setProjectStatus($ProjectStatus) {
        $this->ProjectStatus = $ProjectStatus;
        return $this;
    }

    function setChargeMode($ChargeMode) {
        $this->ChargeMode = $ChargeMode;
        return $this;
    }

    function getProjectLeader() {
        return $this->ProjectLeader;
    }

    function setProjectLeader($ProjectLeader) {
        $this->ProjectLeader = $ProjectLeader;
        return $this;
    }

    function getRefuseResult() {
        return $this->RefuseResult;
    }

    function setRefuseResult($RefuseResult) {
        $this->RefuseResult = $RefuseResult;
        return $this;
    }

}
