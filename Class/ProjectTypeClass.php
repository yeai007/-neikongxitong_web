<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ProjectTypeClass {

    private $Id; //
    private $Name; //分类名称
    private $ParentId; //所属上级分类ID，一级分类：项目分类，二级分类：培训科目，三级分类：培训类别
    private $Flag; //作废标记0：正常，1：作废
    private $ParentLevel; //级别：1:一级分类，2：二级分类，3:三级分类

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("ProjectType", null);
    }

    function getInfo($id) {
        $sql = "select * from ProjectType where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from ProjectType where Id=$id";
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
        $sql = "update ProjectType set $condition where Id=$this->Id";
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
        $sql = "insert into ProjectType set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getId() {
        return $this->Id;
    }

    function getName() {
        return $this->Name;
    }

    function getParentId() {
        return $this->ParentId;
    }

    function getFlag() {
        return $this->Flag;
    }

    function getParentLevel() {
        return $this->ParentLevel;
    }

    function setId($Id) {
        $this->Id = $Id;
        return $this;
    }

    function setName($Name) {
        $this->Name = $Name;
        return $this;
    }

    function setParentId($ParentId) {
        $this->ParentId = $ParentId;
        return $this;
    }

    function setFlag($Flag) {
        $this->Flag = $Flag;
        return $this;
    }

    function setParentLevel($ParentLevel) {
        $this->ParentLevel = $ParentLevel;
        return $this;
    }

}
