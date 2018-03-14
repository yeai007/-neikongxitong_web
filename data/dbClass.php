<?php
require 'dbConfig.php';
require_once 'PDODB.php';
//数据连接初始化
$db = new PDODB($db_config['db_host'], $db_config['db_name'], $db_config['db_user'], $db_config['db_pass']);
$db->__construct($db_config['db_host'], $db_config['db_name'], $db_config['db_user'], $db_config['db_pass']);
