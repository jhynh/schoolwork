<?php include 'initializeDB.php';
if($conn->connect_error) {
    //die("connection failed: ". $conn->connection_error);
    echo "<div id=\"status\">";
    echo "<a>connected</a><input type=\"checkbox\" disabled=\"disabled\"/></a>";
    echo "</div>";
} else {
    echo "<div id=\"status\">";
    echo "<a>connected</a><input type=\"checkbox\" disabled=\"disabled\" checked/></a>";
    echo "</div>";
}