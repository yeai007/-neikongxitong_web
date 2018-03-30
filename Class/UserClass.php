<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserClass {

    private $UserId; //
    private $UserAccount; //用户帐号
    private $UserName; //用户名称
    private $UserCode; //用户登录编码、用户名
    private $UserDepart; //部门
    private $UserPost; //职务
    private $Phone; //联系方式
    private $UserNum; //身份证号码
    private $Address; //家庭住址
    private $UserStatus; //用户作废、状态标记
    private $UserRoleId; //用户所对应角色Id
    private $UserPassword; //

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("users", null);
    }

    function loginInfo($code, $pass) {
        $sql = "select * from users where UserCode='$code' and UserPassword='$pass' limit 0,1";
        $result = $this->db->query($sql); //返回查询结果到数组
        if (count($result) > 0) {
            return $result;
        } else {
            return 0;
        }
    }

    function getInfo($id) {
        $sql = "select * from users where UserId=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function checkInfo($code) {
        $sql = "select * from users where UserCode='$code'";
        $result = $this->db->query($sql); //返回查询结果到数组
        return count($result) > 0 ? true : false;
    }

    function setInfo($id) {
        $sql = "select * from users where UserId=$id";
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
        $sql = "update users set $condition where UserId=$this->UserId";
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
        $sql = "insert into users set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getUserAccount() {
        return $this->UserAccount;
    }

    function setUserAccount($UserAccount) {
        $this->UserAccount = $UserAccount;
        return $this;
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

    function getUserDepart() {
        return $this->UserDepart;
    }

    function getUserPost() {
        return $this->UserPost;
    }

    function getPhone() {
        return $this->Phone;
    }

    function getUserNum() {
        return $this->UserNum;
    }

    function getAddress() {
        return $this->Address;
    }

    function getUserStatus() {
        return $this->UserStatus;
    }

    function getUserRoleId() {
        return $this->UserRoleId;
    }

    function getUserPassword() {
        return $this->UserPassword;
    }

    function setUserId($UserId) {
        $this->UserId = $UserId;
        return $this;
    }

    function setUserName($UserName) {
        $this->UserName = $UserName;
        return $this;
    }

    function setUserCode($UserCode) {
        $this->UserCode = $UserCode;
        return $this;
    }

    function setUserDepart($UserDepart) {
        $this->UserDepart = $UserDepart;
        return $this;
    }

    function setUserPost($UserPost) {
        $this->UserPost = $UserPost;
        return $this;
    }

    function setPhone($Phone) {
        $this->Phone = $Phone;
        return $this;
    }

    function setUserNum($UserNum) {
        $this->UserNum = $UserNum;
        return $this;
    }

    function setAddress($Address) {
        $this->Address = $Address;
        return $this;
    }

    function setUserStatus($UserStatus) {
        $this->UserStatus = $UserStatus;
        return $this;
    }

    function setUserRoleId($UserRoleId) {
        $this->UserRoleId = $UserRoleId;
        return $this;
    }

    function setUserPassword($UserPassword) {
        $this->UserPassword = $UserPassword;
        return $this;
    }

}
