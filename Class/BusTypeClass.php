<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BusTypeClass {

    private $Id; //
    private $BusTypeName; //业务类别名称
    private $BusTypeCode; //业务类别编码
    private $Flag; //作废标记0:正常，1:作废

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("bustype", null);
    }

    function getInfo($id) {
        $sql = "select * from bustype where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from bustype where Id=$id";
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
        $sql = "update bustype set $condition where Id=$this->Id";
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
        $sql = "insert into bustype set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getId() {
        return $this->Id;
    }

    function getBusTypeName() {
        return $this->BusTypeName;
    }

    function getBusTypeCode() {
        return $this->BusTypeCode;
    }

    function getFlag() {
        return $this->Flag;
    }

    function setId($Id) {
        $this->Id = $Id;
        return $this;
    }

    function setBusTypeName($BusTypeName) {
        $this->BusTypeName = $BusTypeName;
        return $this;
    }

    function setBusTypeCode($BusTypeCode) {
        $this->BusTypeCode = $BusTypeCode;
        return $this;
    }

    function setFlag($Flag) {
        $this->Flag = $Flag;
        return $this;
    }

}
