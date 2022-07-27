<?php
interface theTypes{
    public function validate():bool;
    public function input($n, $v);
    public function getType();
}

class dataBase{
    function __construct(){
    include_once '../config.php';
    $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
    $check = $conn->prepare("CREATE TABLE IF NOT EXISTS `students` ( `name` varchar(255) NOT NULL COMMENT 'typeS' , PRIMARY KEY (`name`) )DEFAULT CHARSET=utf8mb4");
    //$check->bind_param('sss','students','name','name');
    $check->execute();
    }

    function __destruct(){
        $conn->close();
    }
}

class table extends dataBase{
    function getColumns(){}
    
    function getRows(){}

    //var is now an array
    function insertRow(...$var){
        //we need to add to the query additional parameters
        $sql = "insert into students(name, grade";
        //a for loop that tags +=var1,
        //else +=) followed by the values in a loop
    }

}

$list = new SplDoublyLinkedList();

?>