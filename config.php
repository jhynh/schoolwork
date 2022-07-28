<?php
define('DBUSER','jason');
define('DBPWD','jh9868');
define('DBHOST','localhost');
define('DBNAME','members');
define('DBCREATE', '`ip_status` ( `ip` varchar(15), PRIMARY KEY (`ip`), `status` varchar(4), `name` varchar(255), `last_active` varchar(24), `up_time` varchar(8),`down_time` varchar(8))DEFAULT CHARSET=utf8mb4');
//`ip_status` ( `ip` varchar(15), PRIMARY KEY (`ip`), `status` varchar(4), `name` varchar(255), `last_active` varchar(24), `up_time` varchar(8),`down_time` varchar(8))DEFAULT CHARSET=utf8mb4
?>
