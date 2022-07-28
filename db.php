<?php include 'config.php';

class Database{
    
    private static $conn;

    function __construct(){
        $this->conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
        //print it out with row# using ROW_NUMBER()
        $check = $conn->prepare("CREATE TABLE IF NOT EXISTS".DBCREATE);
        //$check->bind_param('sss','students','name','name');
        $check->execute();
    }

    function __destructor(){
        $this->$conn->close();
    }

}

?>