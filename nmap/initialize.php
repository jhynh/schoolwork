<?php include_once '../config.php';
$conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
//print it out with row# using ROW_NUMBER()
$check = $conn->prepare("CREATE TABLE IF NOT EXISTS `ip_status` ( `ip` varchar(15), PRIMARY KEY (`ip`), `status` varchar(4), `name` varchar(255), `last_active` varchar(24), `up_time` varchar(8),`down_time` varchar(8))DEFAULT CHARSET=utf8mb4");

//$check->bind_param('sss','students','name','name');
$check->execute();