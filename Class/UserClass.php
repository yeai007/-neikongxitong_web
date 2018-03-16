<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserClass {

    private $UserId;
    private $UserName;
    private $UserCode;
    private $CreateTime;
    private $UserStatus;
    private $Telephone;
    private $PassWord;

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("AppUser", null);
    }

    function loginInfo($phone, $pass) {
        $sql = "select * from AppUser where Telephone='$phone' and PassWord='$pass' limit 0,1";
        $result = $this->db->query($sql); //返回查询结果到数组
        if (count($result) > 0) {
            return $result;
        } else {
            return 0;
        }
    }

    function checkInfo($phone) {
        $sql = "select * from AppUser where Telephone='$phone'";
        $result = $this->db->query($sql); //返回查询结果到数组
        return count($result) > 0 ? true : false;
    }

    function getInfo($id) {
        $sql = "select * from AppUser where UserId=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfoByPhone($phone) {
        $sql = "select * from AppUser where Telephone='$phone'";
        $result = $this->db->row($sql); //返回查询结果到数组
        foreach ($this->columns as $column) {
            $aa = "set" . "$column";
            $this->$aa($result["$column"]);
        }
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from AppUser where UserId=$id";
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
        $sql = "update AppUser set $condition where Id=$this->UserId";
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
        $sql = "insert into AppUser set $condition ";
        $this->db->query($sql);
        return $sql;
        //return $this->db->lastInsertId();
    }

    function getUserId() {
        return $this->UserId;
    }

    function getUserName() {
        return $this->UserName;
    }

    function getUserCode() {
        return $this->UserCode;
    }

    function getCreateTime() {
        return $this->CreateTime;
    }

    function getUserStatus() {
        return $this->UserStatus;
    }

    function getTelephone() {
        return $this->Telephone;
    }

    function setUserId($UserId) {
        $this->UserId = $UserId;
    }

    function setUserName($UserName) {
        $this->UserName = $UserName;
    }

    function setUserCode($UserCode) {
        $this->UserCode = $UserCode;
    }

    function setCreateTime($CreateTime) {
        $this->CreateTime = $CreateTime;
    }

    function setUserStatus($UserStatus) {
        $this->UserStatus = $UserStatus;
    }

    function setTelephone($Telephone) {
        $this->Telephone = $Telephone;
    }

    function getPassWord() {
        return $this->PassWord;
    }

    function setPassWord($PassWord) {
        $this->PassWord = $PassWord;
    }

}

?>
