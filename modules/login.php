<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require( "common.php");
$data = array();
//$img = new ImageYZM();
//$data["img"] = $img->vCode(4, 15);
echo $twig->render('login.xhtml', $data);
?>