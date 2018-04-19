<?php

/**
 * Description of MessageClass
 *
 * @author PVer
 */
class MessageClass {

    //put your code here
    private $Id; //
    private $Title; //消息标题
    private $CreateTime; //消息创建时间
    private $Content; //消息具体内容
    private $Status; //消息状态 0：正常
    private $CreatePerson; //创建人
    private $CreatePersonId; //创建人ID

    public function __construct() {
        require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
        $this->db = $db;
        $this->columns = $this->db->getColumn("message", null);
    }

    function getInfo($id) {
        $sql = "select * from message where Id=$id limit 0,1";
        $result = $this->db->row($sql); //返回查询结果到数组
        return $result;
    }

    function setInfo($id) {
        $sql = "select * from message where Id=$id";
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
        $sql = "update message set $condition where Id=$this->Id";
        //return $sql;
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
        $sql = "insert into message set $condition ";
        $this->db->query($sql);
        // return $sql;
        return $this->db->lastInsertId();
    }

    function getId() {
        return $this->Id;
    }

    function getTitle() {
        return $this->Title;
    }

    function getCreateTime() {
        return $this->CreateTime;
    }

    function getContent() {
        return $this->Content;
    }

    function getStatus() {
        return $this->Status;
    }

    function getCreatePerson() {
        return $this->CreatePerson;
    }

    function getCreatePersonId() {
        return $this->CreatePersonId;
    }

    function setId($Id) {
        $this->Id = $Id;
        return $this;
    }

    function setTitle($Title) {
        $this->Title = $Title;
        return $this;
    }

    function setCreateTime($CreateTime) {
        $this->CreateTime = $CreateTime;
        return $this;
    }

    function setContent($Content) {
        $this->Content = $Content;
        return $this;
    }

    function setStatus($Status) {
        $this->Status = $Status;
        return $this;
    }

    function setCreatePerson($CreatePerson) {
        $this->CreatePerson = $CreatePerson;
        return $this;
    }

    function setCreatePersonId($CreatePersonId) {
        $this->CreatePersonId = $CreatePersonId;
        return $this;
    }

}
