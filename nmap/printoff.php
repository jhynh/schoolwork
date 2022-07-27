<?php
include 'initialize.php';
$online = $conn->query("SELECT * FROM ip_status WHERE status='down' ORDER BY
INET_ATON(ip)");
while($row = $online->fetch_array()) {
    echo "<tr>";
    echo "<td>".$row['ip']."</td>"; // Print a single column data
    //echo print_r($row);       // Print the entire row data
    echo "</tr>";
}
?>