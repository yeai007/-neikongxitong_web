<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RoleInfoClass {

    private $RoleId; //
    private $RoleName; //角色名称
    private $RoleLevel; //
    private $RoleDesc; //角色描述
    private $Flag; //作废标记
    private $RoleMenu; //角色权限

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("roleinfo", null);
    }

    function getInfo($id) {
        $sql = "select * from roleinfo where RoleId=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from roleinfo where RoleId=$id";
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
        $sql = "update roleinfo set $condition where RoleId=$this->RoleId";
        
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
        $sql = "insert into roleinfo set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getRoleId() {
        return $this->RoleId;
    }

    function getRoleName() {
        return $this->RoleName;
    }

    function getRoleLevel() {
        return $this->RoleLevel;
    }

    function getRoleDesc() {
        return $this->RoleDesc;
    }

    function getFlag() {
        return $this->Flag;
    }

    function getRoleMenu() {
        return $this->RoleMenu;
    }

    function setRoleId($RoleId) {
        $this->RoleId = $RoleId;
        return $this;
    }

    function setRoleName($RoleName) {
        $this->RoleName = $RoleName;
        return $this;
    }

    function setRoleLevel($RoleLevel) {
        $this->RoleLevel = $RoleLevel;
        return $this;
    }

    function setRoleDesc($RoleDesc) {
        $this->RoleDesc = $RoleDesc;
        return $this;
    }

    function setFlag($Flag) {
        $this->Flag = $Flag;
        return $this;
    }

    function setRoleMenu($RoleMenu) {
        $this->RoleMenu = $RoleMenu;
        return $this;
    }

}
