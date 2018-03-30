<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ReimTypeClass {

    private $Id; //报销类别ID
    private $ReimTypeName; //报销类别名称
    private $ReimSubName; //报销科目列表;隔开
    private $Flag; //作废标记

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("reimtype", null);
    }

    function getInfo($id) {
        $sql = "select * from reimtype where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from reimtype where Id=$id";
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
        $sql = "update reimtype set $condition where Id=$this->Id";

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
        $sql = "insert into reimtype set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getId() {
        return $this->Id;
    }

    function getReimTypeName() {
        return $this->ReimTypeName;
    }

    function getReimSubName() {
        return $this->ReimSubName;
    }

    function getFlag() {
        return $this->Flag;
    }

    function setId($Id) {
        $this->Id = $Id;
        return $this;
    }

    function setReimTypeName($ReimTypeName) {
        $this->ReimTypeName = $ReimTypeName;
        return $this;
    }

    function setReimSubName($ReimSubName) {
        $this->ReimSubName = $ReimSubName;
        return $this;
    }

    function setFlag($Flag) {
        $this->Flag = $Flag;
        return $this;
    }

}
