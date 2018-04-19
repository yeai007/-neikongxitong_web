<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProjectACHClass
 *
 * @author PVer
 */
class ProjectACHClass {

//put your code here
    private $Id; //
    private $ProCode; //项目编码
    private $ProName; //项目名称
    private $CompanyName; //单位名称
    private $BusType; //业务类别
    private $ReceiveAmount; //收款金额
    private $PersonalAmount; //个人费用
    private $PublicAmount; //公共费用分摊
    private $AchAmount; //绩效金额
    private $Personal; //所属人
    private $AccountStatus; //核算情况0：可核算，1：不可核算，2：已核算
    private $AccountDate; //核算日期
    private $AccountPerson; //核算人
    private $AccountPersonId; //
    private $BusTypeName; //
    private $UnitId; //
    private $UnitName; //单位名称

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("projectachievements", null);
    }

    function getInfo($id) {
        $sql = "select * from projectachievements where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function check($projectid, $unitid) {
        $result = false;
        $sql = "select * from projectachievements where ProCode='$projectid' and UnitId=$unitid";
        $head = $this->db->query($sql);
        if (count($head) > 0) {
            $result = true;
        }
        return $result;
    }

    function setInfoByCode($projectid, $unitid) {
        $sql = "select * from projectachievements where ProCode='$projectid' and UnitId=$unitid limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        foreach ($this->columns as $column) {
            $aa = "set" . "$column";
            $this->$aa($result["$column"]);
        }
        return $result;
    }

    function getThisACH($projectid, $unitid) {
        $sql = "select aa.*,((aa.PublicAmount/aa.StuCount)*aa.StuCountUnit+20*aa.StuCountUnit) PublicAmountFT,
(aa.ReceiveAmount-PersonalAmount-((aa.PublicAmount/aa.StuCount)*aa.StuCountUnit+20*aa.StuCountUnit))*aa.Proportion/100 AmountACH
from (select a.ProjectId,a.ProjectCode,a.ProjectName,b.BusTypeName,
(select sum(ChargeAmount)  from studentinfo where ProjectCode =a.ProjectCode) ReceiveAmount,
(select sum(GrantAmount) from reimbursement where ReimType=2 and ProCode=a.ProjectCode) PersonalAmount,
(select sum(GrantAmount) from reimbursement where ReimType=3 and ProCode=a.ProjectCode) PublicAmount,
(select count(*) from studentinfo where ProjectCode=a.ProjectCode) StuCount,
d.UnitName,d.UnitId,(select count(*) from studentinfo where UnitName=d.UnitName) StuCountUnit,h.Proportion,e.CustomerContact,a.BusType
from projectsinfo a
left join bustype b on a.BusType=b.Id
left join studentinfo d on a.ProjectCode=d.ProjectCode
left join customerinfo e on d.UnitId=e.CustomerId
left join achproportion h on e.PerformanceLevel=h.PerformanceLevelId and a.BusType=h.BusTypeId
) aa where aa.ProjectCode=$projectid and aa.UnitId=$unitid GROUP BY UnitName,UnitId limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from projectachievements where Id=$id";
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
        $sql = "update projectachievements set $condition where Id=$this->Id";
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
        $sql = "insert into projectachievements set $condition ";
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

    function getProName() {
        return $this->ProName;
    }

    function getCompanyName() {
        return $this->CompanyName;
    }

    function getBusType() {
        return $this->BusType;
    }

    function getReceiveAmount() {
        return $this->ReceiveAmount;
    }

    function getPersonalAmount() {
        return $this->PersonalAmount;
    }

    function getPublicAmount() {
        return $this->PublicAmount;
    }

    function getAchAmount() {
        return $this->AchAmount;
    }

    function getPersonal() {
        return $this->Personal;
    }

    function getAccountStatus() {
        return $this->AccountStatus;
    }

    function getAccountDate() {
        return $this->AccountDate;
    }

    function getAccountPerson() {
        return $this->AccountPerson;
    }

    function setId($Id) {
        $this->Id = $Id;
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

    function setCompanyName($CompanyName) {
        $this->CompanyName = $CompanyName;
        return $this;
    }

    function setBusType($BusType) {
        $this->BusType = $BusType;
        return $this;
    }

    function setReceiveAmount($ReceiveAmount) {
        $this->ReceiveAmount = $ReceiveAmount;
        return $this;
    }

    function setPersonalAmount($PersonalAmount) {
        $this->PersonalAmount = $PersonalAmount;
        return $this;
    }

    function setPublicAmount($PublicAmount) {
        $this->PublicAmount = $PublicAmount;
        return $this;
    }

    function setAchAmount($AchAmount) {
        $this->AchAmount = $AchAmount;
        return $this;
    }

    function setPersonal($Personal) {
        $this->Personal = $Personal;
        return $this;
    }

    function setAccountStatus($AccountStatus) {
        $this->AccountStatus = $AccountStatus;
        return $this;
    }

    function setAccountDate($AccountDate) {
        $this->AccountDate = $AccountDate;
        return $this;
    }

    function setAccountPerson($AccountPerson) {
        $this->AccountPerson = $AccountPerson;
        return $this;
    }
    function getAccountPersonId() {
        return $this->AccountPersonId;
    }

    function getBusTypeName() {
        return $this->BusTypeName;
    }

    function getUnitId() {
        return $this->UnitId;
    }

    function getUnitName() {
        return $this->UnitName;
    }

    function setAccountPersonId($AccountPersonId) {
        $this->AccountPersonId = $AccountPersonId;
        return $this;
    }

    function setBusTypeName($BusTypeName) {
        $this->BusTypeName = $BusTypeName;
        return $this;
    }

    function setUnitId($UnitId) {
        $this->UnitId = $UnitId;
        return $this;
    }

    function setUnitName($UnitName) {
        $this->UnitName = $UnitName;
        return $this;
    }


}
