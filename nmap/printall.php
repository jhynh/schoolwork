<?php
include 'initialize.php';
/**
*   DESC: prints all the ips and their statuses, the left side of the page
*   ***use (call_user_func_array) to call bind param with variable number of arguments***
*
*/

//echo "\x20\x20\x20"; (space)

//-------------------------------------------------------------------
//a refresh
$dropper=$conn->prepare("DROP TABLE IF EXISTS ip_status");
$spoofer=$conn->prepare("CREATE TABLE IF NOT EXISTS `ip_status` ( `ip` varchar(15), PRIMARY KEY (`ip`), `status` varchar(4), `name` varchar(255), `last_active` varchar(24), `up_time` varchar(8),`down_time` varchar(8))DEFAULT CHARSET=utf8mb4");
//$spoofer=$conn->prepare("CREATE TABLE IF NOT EXISTS `ip_status` ( `ip` varchar(15), PRIMARY KEY (`ip`), `status` varchar(4), `name` varchar(255), `date` DATE)DEFAULT CHARSET=utf8mb4");
$check=$conn->prepare("select 1 from `ip_status`");
//if table exists, drop it firsts

$dropper->execute();
$spoofer->execute();
//-------------------------------------------------------------------

$sql="INSERT INTO ip_status (ip, status, name, last_active, up_time, down_time) VALUES (?,?,?,?,?,?)";
$stmt= $conn->prepare($sql);

$filename='/home/jason/public_html/nmap/result.xml';
if(file_exists($filename))
    $xml=simplexml_load_file('result.xml');
else{
    echo "<a>file missing</a>";
    exit(0);
}
//------------------------title_info----------------------------------
$nametag = $xml->getName();
$date = $xml->attributes()['startstr'];
/*
print_r("title: ".$nametag."<br>");
var_dump(count($xml->host));
print_r("<br><br>");
*/
//--------------------------------------------------------------------
//forloop for 256-1
for($i =0 ; $i<256; $i++){
    $ip = (string)$xml->host[$i]->address->attributes()['addr'];
    $state = (string)$xml->host[$i]->status->attributes()['state'];
    
//-------------------------if_down_highlight_row_grey-----------------
    if($state === "down")
        echo "<tr class=\"highlight\">";
    else
        echo "<tr>";

//-------------------------print_NAME---------------------------------
    $names = (int)count($xml->host[$i]->hostnames);
    if($names === 0){
        echo "<td>NA</td>";
        $thename ="NA";
    }else{
        for($t=0;$t<$names;$t++){
            if(!empty($xml->host[$i]->hostnames[$t]->hostname->attributes()['name']))
                $thename = $xml->host[$i]->hostnames[$t]->hostname->attributes()['name'];
            else
                $thename ="NULL";

            if($state ==="down")
                echo "<td>".$thename."</td>";    
            else
                echo "<td class=\"available\">".$thename."</td>";    
        }
    }
//-------------------------print_IP-----------------------------------
    if($state === "up"){
        echo "<td class=\"available\">".$ip."</td>";
    }else{
        echo "<td class=\"unavailable\">".$ip."</td>";
    }
//---------------------print_STATE&DATE-------------------------------
    if($state ==="down"){
        echo "<td>".$state."</td>";
        echo "<td>".$date."</td>";
    } else {
        echo "<td class=\"available\">".$state."</td>";
    }
    echo "</tr>";
    $stmt->bind_param("ssssss", $ip, $state, $thename, $lactive, $upT, $dwnT);
    $stmt->execute();
}//end of for_loop

//create temporary table temp(date DATE, ip int unsigned);
//insert into temp(date,ip) values (20011023,INET_ATON("127.0.0.1"));
//select INET_NTOA(`ip`) FROM temp;
?>
