<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CertReceiveClass {

    private $Id; //
    private $CertId; //
    private $ReceivePerson; //证书领取人
    private $ReceiveDate; //证书领取日期
    private $RecievePhone; //证书领取人联系电话
    private $SignForm; //签收表
    private $ReceiveWritePerson; //领取证书操作人
    private $ReceiveWriteDate; //
    private $Flag;

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("certreciverecord", null);
    }

    function getInfo($id) {
        $sql = "select * from certreciverecord where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from certreciverecord where Id=$id";
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
        $sql = "update certreciverecord set $condition where Id=$this->Id";
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
        $sql = "insert into certreciverecord set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getId() {
        return $this->Id;
    }

    function getCertId() {
        return $this->CertId;
    }

    function getReceivePerson() {
        return $this->ReceivePerson;
    }

    function getReceiveDate() {
        return $this->ReceiveDate;
    }

    function getRecievePhone() {
        return $this->RecievePhone;
    }

    function getSignForm() {
        return $this->SignForm;
    }

    function getReceiveWritePerson() {
        return $this->ReceiveWritePerson;
    }

    function getReceiveWriteDate() {
        return $this->ReceiveWriteDate;
    }

    function setId($Id) {
        $this->Id = $Id;
        return $this;
    }

    function setCertId($CertId) {
        $this->CertId = $CertId;
        return $this;
    }

    function setReceivePerson($ReceivePerson) {
        $this->ReceivePerson = $ReceivePerson;
        return $this;
    }

    function setReceiveDate($ReceiveDate) {
        $this->ReceiveDate = $ReceiveDate;
        return $this;
    }

    function setRecievePhone($RecievePhone) {
        $this->RecievePhone = $RecievePhone;
        return $this;
    }

    function setSignForm($SignForm) {
        $this->SignForm = $SignForm;
        return $this;
    }

    function setReceiveWritePerson($ReceiveWritePerson) {
        $this->ReceiveWritePerson = $ReceiveWritePerson;
        return $this;
    }

    function setReceiveWriteDate($ReceiveWriteDate) {
        $this->ReceiveWriteDate = $ReceiveWriteDate;
        return $this;
    }
    function getFlag() {
        return $this->Flag;
    }

    function setFlag($Flag) {
        $this->Flag = $Flag;
        return $this;
    }


}
