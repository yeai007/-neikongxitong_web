<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProjectKnotEX
 *
 * @author PVer
 */
class ProjectKnotEX {

    //put your code here
    private $Id; //
    private $ProId; //项目ID
    private $ProCode; //项目编码
    private $Status; //项目支出结项状态0：未结项，1：已结项，2：不可结项
    private $KnotPersonId; //结项人ID
    private $KnotPerson; //结项人
    private $KnotDate; //结项日期
    private $Amount;

    function check($code) {
        $result = false;
        $sql = "select * from projectknotex where ProCode='$code'";
        $head = $this->db->query($sql);
        if (count($head) > 0) {
            $result = true;
        }
        return $result;
    }

    function setInfoByCode($code) {
        $sql = "select * from projectknotex where ProCode='$code' limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        foreach ($this->columns as $column) {
            $aa = "set" . "$column";
            $this->$aa($result["$column"]);
        }
        return $result;
    }

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("projectknotex", null);
    }

    function getInfo($id) {
        $sql = "select * from projectknotex where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from projectknotex where Id=$id";
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
        $sql = "update projectknotex set $condition where Id=$this->Id";
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
        $sql = "insert into projectknotex set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getId() {
        return $this->Id;
    }

    function getProId() {
        return $this->ProId;
    }

    function getProCode() {
        return $this->ProCode;
    }

    function getStatus() {
        return $this->Status;
    }

    function getKnotPersonId() {
        return $this->KnotPersonId;
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

    function setProId($ProId) {
        $this->ProId = $ProId;
        return $this;
    }

    function setProCode($ProCode) {
        $this->ProCode = $ProCode;
        return $this;
    }

    function setStatus($Status) {
        $this->Status = $Status;
        return $this;
    }

    function setKnotPersonId($KnotPersonId) {
        $this->KnotPersonId = $KnotPersonId;
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

    function getAmount() {
        return $this->Amount;
    }

    function setAmount($Amount) {
        $this->Amount = $Amount;
        return $this;
    }

}
