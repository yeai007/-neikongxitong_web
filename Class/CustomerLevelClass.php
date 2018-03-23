<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CustomerLevelClass {

    private $Id; //
    private $LevelCode; //级别代码A、B、C、D
    private $LevelName; //重要客户、较重要客户、一般客户、个人客户
    private $LevelFlag; //作废标记0：正常，1：作废

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("customerlevelinfo", null);
    }

    function getInfo($id) {
        $sql = "select * from customerlevelinfo where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from customerlevelinfo where Id=$id";
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
        $sql = "update customerlevelinfo set $condition where Id=$this->Id";
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
        $sql = "insert into customerlevelinfo set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getId() {
        return $this->Id;
    }

    function getLevelCode() {
        return $this->LevelCode;
    }

    function getLevelName() {
        return $this->LevelName;
    }

    function getLevelFlag() {
        return $this->LevelFlag;
    }

    function setId($Id) {
        $this->Id = $Id;
        return $this;
    }

    function setLevelCode($LevelCode) {
        $this->LevelCode = $LevelCode;
        return $this;
    }

    function setLevelName($LevelName) {
        $this->LevelName = $LevelName;
        return $this;
    }

    function setLevelFlag($LevelFlag) {
        $this->LevelFlag = $LevelFlag;
        return $this;
    }

}
