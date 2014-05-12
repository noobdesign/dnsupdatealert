<?php
/**
 * Created by PhpStorm.
 * Distr4ctio
 * Date: 2014/05/12
 */
$dbUsername = "root";
$dbName = "domain_list";
$dbPassword = "";
$dbServer = "127.0.0.1";
$db_handle = mysql_connect($dbServer, $dbUsername, $dbPassword);
$db_found = mysql_select_db($dbName, $db_handle);
?>