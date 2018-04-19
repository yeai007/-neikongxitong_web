<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
// store session data


require( "../common.php");
$data = array();
echo $twig->render('login.twig', $data);
?>