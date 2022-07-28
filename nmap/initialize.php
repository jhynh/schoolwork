<?php include_once '../config.php';
$conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
//print it out with row# using ROW_NUMBER()
$check = $conn->prepare("CREATE TABLE IF NOT EXISTS".DBCREATE);

//$check->bind_param('sss','students','name','name');
$check->execute();