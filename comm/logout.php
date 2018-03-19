<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!session_id()) {
    session_start();
}
if (isset($_SESSION['user'])) {
    session_unset(); //free all session variable
    session_destroy(); //销毁一个会话中的全部数据
    header("location: ../modules/index/index.php");
} else {
    header("location: ../modules/index/index.php");
}