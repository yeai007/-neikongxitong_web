<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function _post($str) {
    $val = !empty($_POST[$str]) ? $_POST[$str] : null;
    return $val;
}

function _get($str) {
    $val = !empty($_GET[$str]) ? $_GET[$str] : null;
    return $val;
}

?>