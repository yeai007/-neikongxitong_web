<?php

/**
 * Description of HeaderMasterACHClass
 *
 * @author PVer
 */
class HeaderMasterACHClass {

    //put your code here
    private $Id; //
    private $ProCode; //项目编号
    private $ProName; //项目名称
    private $BusType; //业务类型
    private $ClassStartDate; //开课日期
    private $ClassEndDate; //结课日期
    private $ClassDays; //课程天数
    private $ClassStudentAmount; //上课人数
    private $HeaderMaster; //班主任
    private $HeaderMasterName;
    private $AchAmount; //绩效总额
    private $Status; //计算情况0：未结算，1：已结算
    private $SettlementPerson; //结算人
    private $SettlementDate; //结算日期

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("headermasterach", null);
    }

    function checkSettlement($headerid, $code) {
        $result = false;
        $sql = "select * from headermasterach where HeaderMaster=$headerid and ProCode='$code' and Status=1";
        $head = $this->db->query($sql);
        if (count($head) > 0) {
            $result = true;
        }
        return $result;
    }

    function check($headerid, $code) {
        $result = false;
        $sql = "select * from headermasterach where HeaderMaster=$headerid and ProCode='$code'";
        $head = $this->db->query($sql);
        if (count($head) > 0) {
            $result = true;
        }
        return $result;
    }

    function Settlement($headerid, $code, $user) {
        if ($this->check($headerid, $code)) {
            $h_sql = "select * from headermasterach where HeaderMaster=$headerid and ProCode='$code' limit 0,1";
            $h_head = $this->db->row($h_sql);
            $this->setInfo($h_head["Id"]);
            $sql = "select *,getTeacherACH(aa.StuCount,aa.TeachDays)  TeacherACH 
from (select a.Id, a.ProCode, a.ProName,a.TeachDays
,a.OtherDesc,a.ArrangeDate,j.TeacherName HeaderMasterName,a.TeachStartDate,a.TeachEndDate
,(select count(*) from studentinfo stu where stu.ProjectCode=a.ProCode) StuCount,a.HeaderMaster,c.BusTypeName
 from teacharrange a
left join projectsinfo b on a.ProCode=b.ProjectCode
left join teacherinfo j on a.HeaderMaster=j.TeacherId
left join bustype c on b.BusType=c.Id
where a.Flag=0 and a.HeaderMaster=$headerid and a.ProCode='$code') aa limit 0,1";
            $arrange = $this->db->row($sql);
            date_default_timezone_set('PRC');
            $arr = array();
            $arr["ProCode"] = $arrange["ProCode"];
            $arr["ProName"] = $arrange["ProName"];
            $arr["BusType"] = $arrange["BusTypeName"];
            $arr["ClassStartDate"] = $arrange["TeachStartDate"];
            $arr["ClassEndDate"] = $arrange["TeachEndDate"];
            $arr["ClassDays"] = $arrange["TeachDays"];
            $arr["ClassStudentAmount"] = $arrange["StuCount"];
            $arr["HeaderMaster"] = $arrange["HeaderMaster"];
            $arr["HeaderMasterName"] = $arrange["HeaderMasterName"];
            $arr["AchAmount"] = $arrange["TeacherACH"];
            $arr["Status"] = 1;
            $arr["SettlementPerson"] = $user['UserId'];
            $arr["SettlementDate"] = date('y-m-d h:i:s', time());
            if ($this->updateInfo($arr) > -1) {
                return $h_head["Id"];
            } else {
                return 0;
            }
        } else {
            $sql = "select *,getTeacherACH(aa.StuCount,aa.TeachDays)  TeacherACH 
from (select a.Id, a.ProCode, a.ProName,a.TeachDays
,a.OtherDesc,a.ArrangeDate,j.TeacherName HeaderMasterName,a.TeachStartDate,a.TeachEndDate
,(select count(*) from studentinfo stu where stu.ProjectCode=a.ProCode) StuCount,a.HeaderMaster,c.BusTypeName
 from teacharrange a
left join projectsinfo b on a.ProCode=b.ProjectCode
left join teacherinfo j on a.HeaderMaster=j.TeacherId
left join bustype c on b.BusType=c.Id
where a.Flag=0 and a.HeaderMaster=$headerid and a.ProCode='$code') aa limit 0,1";
            $arrange = $this->db->row($sql);
            date_default_timezone_set('PRC');
            $arr = array();
            $arr["ProCode"] = $arrange["ProCode"];
            $arr["ProName"] = $arrange["ProName"];
            $arr["BusType"] = $arrange["BusTypeName"];
            $arr["ClassStartDate"] = $arrange["TeachStartDate"];
            $arr["ClassEndDate"] = $arrange["TeachEndDate"];
            $arr["ClassDays"] = $arrange["TeachDays"];
            $arr["ClassStudentAmount"] = $arrange["StuCount"];
            $arr["HeaderMaster"] = $arrange["HeaderMaster"];
            $arr["HeaderMasterName"] = $arrange["HeaderMasterName"];
            $arr["AchAmount"] = $arrange["TeacherACH"];
            $arr["Status"] = 1;
            $arr["SettlementPerson"] = $user['UserId'];
            $arr["SettlementDate"] = date('y-m-d h:i:s', time());
            return $this->insertInfo($arr);
        }
    }

    function getInfo($id) {
        $sql = "select * from headermasterach where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from headermasterach where Id=$id";
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
        $sql = "update headermasterach set $condition where Id=$this->Id";
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
        $sql = "insert into headermasterach set $condition ";
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

    function getBusType() {
        return $this->BusType;
    }

    function getClassStartDate() {
        return $this->ClassStartDate;
    }

    function getClassEndDate() {
        return $this->ClassEndDate;
    }

    function getClassDays() {
        return $this->ClassDays;
    }

    function getClassStudentAmount() {
        return $this->ClassStudentAmount;
    }

    function getHeaderMaster() {
        return $this->HeaderMaster;
    }

    function getAchAmount() {
        return $this->AchAmount;
    }

    function getStatus() {
        return $this->Status;
    }

    function getSettlementPerson() {
        return $this->SettlementPerson;
    }

    function getSettlementDate() {
        return $this->SettlementDate;
    }

    function setId($Id) {
        $this->Id = $Id;
        return $this;
    }

    function setProName($ProName) {
        $this->ProName = $ProName;
        return $this;
    }

    function setBusType($BusType) {
        $this->BusType = $BusType;
        return $this;
    }

    function setClassStartDate($ClassStartDate) {
        $this->ClassStartDate = $ClassStartDate;
        return $this;
    }

    function setClassEndDate($ClassEndDate) {
        $this->ClassEndDate = $ClassEndDate;
        return $this;
    }

    function setClassDays($ClassDays) {
        $this->ClassDays = $ClassDays;
        return $this;
    }

    function setClassStudentAmount($ClassStudentAmount) {
        $this->ClassStudentAmount = $ClassStudentAmount;
        return $this;
    }

    function setHeaderMaster($HeaderMaster) {
        $this->HeaderMaster = $HeaderMaster;
        return $this;
    }

    function setAchAmount($AchAmount) {
        $this->AchAmount = $AchAmount;
        return $this;
    }

    function setStatus($Status) {
        $this->Status = $Status;
        return $this;
    }

    function setSettlementPerson($SettlementPerson) {
        $this->SettlementPerson = $SettlementPerson;
        return $this;
    }

    function setSettlementDate($SettlementDate) {
        $this->SettlementDate = $SettlementDate;
        return $this;
    }

    function getProCode() {
        return $this->ProCode;
    }

    function setProCode($ProCode) {
        $this->ProCode = $ProCode;
        return $this;
    }

    function getHeaderMasterName() {
        return $this->HeaderMasterName;
    }

    function setHeaderMasterName($HeaderMasterName) {
        $this->HeaderMasterName = $HeaderMasterName;
        return $this;
    }

}
