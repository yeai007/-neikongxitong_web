<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DepartMentClass {

    private $DepartId; //
    private $DepartName; //部门名称
    private $DepartDesc; //部门描述
    private $Flag; //作废标记
    private $DepartMenu;//部门菜单

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("department", null);
    }

    function getInfo($id) {
        $sql = "select * from department where DepartId=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from department where DepartId=$id";
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
        $sql = "update department set $condition where DepartId=$this->DepartId";
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
        $sql = "insert into department set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }
    function getDepartMenu() {
        return $this->DepartMenu;
    }

    function setDepartMenu($DepartMenu) {
        $this->DepartMenu = $DepartMenu;
        return $this;
    }

        function getDepartId() {
        return $this->DepartId;
    }

    function getDepartName() {
        return $this->DepartName;
    }

    function getDepartDesc() {
        return $this->DepartDesc;
    }

    function getFlag() {
        return $this->Flag;
    }

    function setDepartId($DepartId) {
        $this->DepartId = $DepartId;
        return $this;
    }

    function setDepartName($DepartName) {
        $this->DepartName = $DepartName;
        return $this;
    }

    function setDepartDesc($DepartDesc) {
        $this->DepartDesc = $DepartDesc;
        return $this;
    }

    function setFlag($Flag) {
        $this->Flag = $Flag;
        return $this;
    }

}
