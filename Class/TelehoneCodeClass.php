<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TelehoneCodeClass {

    private $Id; //唯一ID
    private $Telephone; //电话号码
    private $Code; //验证码
    private $Createtime; //创建时间
    private $Expir_time; //过期时间

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("AppTelephoneCode", null);
    }

    function checkInfo($phone, $code) {
        $sql = "select * from AppTelephoneCode where Telephone='$phone' and Code=$code 
and (unix_timestamp(now()) between unix_timestamp(Createtime) and unix_timestamp(Expir_time) );";
        $result = $this->db->query($sql); //返回查询结果到数组
        return count($result) > 0 ? true : false;
    }

    function setInfo($id) {
        $sql = "select * from AppTelephoneCode where Id=$id";
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
        $sql = "update AppTelephoneCode set $condition where Id=$this->Id";
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
        $sql = "insert into AppTelephoneCode set $condition ";
        $this->db->query($sql);
        return $this->db->lastInsertId();
    }

    function getId() {
        return $this->Id;
    }

    function getTelephone() {
        return $this->Telephone;
    }

    function getCode() {
        return $this->Code;
    }

    function getCreatetime() {
        return $this->Createtime;
    }

    function getExpir_time() {
        return $this->Expir_time;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setTelephone($Telephone) {
        $this->Telephone = $Telephone;
    }

    function setCode($Code) {
        $this->Code = $Code;
    }

    function setCreatetime($Createtime) {
        $this->Createtime = $Createtime;
    }

    function setExpir_time($Expir_time) {
        $this->Expir_time = $Expir_time;
    }

}

?>