<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AchProportionClass
 *
 * @author PVer
 */
class AchProportionClass {

    //put your code here
    private $Id; //
    private $PerformanceLevelId; //单位层次ID
    private $PerformanceLevelName; //单位层次名称
    private $BusTypeId; //
    private $BusTypeName; //
    private $Proportion; //
    private $Flag; //

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("achproportion", null);
    }

    function checkInfo($perId, $busId) {
        $rec = false;
        $sql = "select * from achproportion where PerformanceLevelId=$perId and BusTypeId=$busId and Flag=0";
        $result = $this->db->query($sql); //返回查询结果到数组
        if (count($result) > 0) {
            $rec = true;
        }
        return $rec;
    }

    function getInfo($id) {
        $sql = "select * from achproportion where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfoByDId($perId, $busId) {
        $sql = "select * from achproportion where PerformanceLevelId=$perId and BusTypeId=$busId and Flag=0 limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        foreach ($this->columns as $column) {
            $aa = "set" . "$column";
            $this->$aa($result["$column"]);
        }
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from achproportion where Id=$id";
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
        $sql = "update achproportion set $condition where Id=$this->Id";
        //return $sql;
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
        $sql = "insert into achproportion set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getId() {
        return $this->Id;
    }

    function getPerformanceLevelId() {
        return $this->PerformanceLevelId;
    }

    function getPerformanceLevelName() {
        return $this->PerformanceLevelName;
    }

    function getBusTypeId() {
        return $this->BusTypeId;
    }

    function getBusTypeName() {
        return $this->BusTypeName;
    }

    function getProportion() {
        return $this->Proportion;
    }

    function getFlag() {
        return $this->Flag;
    }

    function setId($Id) {
        $this->Id = $Id;
        return $this;
    }

    function setPerformanceLevelId($PerformanceLevelId) {
        $this->PerformanceLevelId = $PerformanceLevelId;
        return $this;
    }

    function setPerformanceLevelName($PerformanceLevelName) {
        $this->PerformanceLevelName = $PerformanceLevelName;
        return $this;
    }

    function setBusTypeId($BusTypeId) {
        $this->BusTypeId = $BusTypeId;
        return $this;
    }

    function setBusTypeName($BusTypeName) {
        $this->BusTypeName = $BusTypeName;
        return $this;
    }

    function setProportion($Proportion) {
        $this->Proportion = $Proportion;
        return $this;
    }

    function setFlag($Flag) {
        $this->Flag = $Flag;
        return $this;
    }

}
