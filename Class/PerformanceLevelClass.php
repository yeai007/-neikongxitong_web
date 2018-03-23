<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PerformanceLevelClass {

    private $Id; //
    private $PerformanceLevelName; //单位层次
    private $PerformanceLevelCode; //单位层次代码
    private $PerformanceLevelPro; //
    private $Flag; //作废：0：正常，1：作废

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("performancelevelinfo", null);
    }

    function getInfo($id) {
        $sql = "select * from performancelevelinfo where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from performancelevelinfo where Id=$id";
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
        $sql = "update performancelevelinfo set $condition where Id=$this->Id";
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
        $sql = "insert into performancelevelinfo set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getId() {
        return $this->Id;
    }

    function getPerformanceLevelName() {
        return $this->PerformanceLevelName;
    }

    function getPerformanceLevelCode() {
        return $this->PerformanceLevelCode;
    }

    function getPerformanceLevelPro() {
        return $this->PerformanceLevelPro;
    }

    function getFlag() {
        return $this->Flag;
    }

    function setId($Id) {
        $this->Id = $Id;
        return $this;
    }

    function setPerformanceLevelName($PerformanceLevelName) {
        $this->PerformanceLevelName = $PerformanceLevelName;
        return $this;
    }

    function setPerformanceLevelCode($PerformanceLevelCode) {
        $this->PerformanceLevelCode = $PerformanceLevelCode;
        return $this;
    }

    function setPerformanceLevelPro($PerformanceLevelPro) {
        $this->PerformanceLevelPro = $PerformanceLevelPro;
        return $this;
    }

    function setFlag($Flag) {
        $this->Flag = $Flag;
        return $this;
    }

}
