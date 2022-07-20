<?php include_once '../config.php';
$conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
$check = $conn->prepare("CREATE TABLE IF NOT EXISTS `students` ( `name` varchar(255) NOT NULL COMMENT 'typeS' , PRIMARY KEY (`name`) )DEFAULT CHARSET=utf8mb4");
//$check->bind_param('sss','students','name','name');
$check->execute();