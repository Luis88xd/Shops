<?php

$host = 'localhost'; // your host
$db_user = 'your user name'; //database user name
$db_password = 'database password'; //database password
$db_name = 'databse name'; //database name
$db_table = 'table name'; //your table name where you want to set the order


$connection = mysql_connect($host, $db_user, $db_password) or die('Failed'); //establish DB connection
$connect_to_db = mysql_select_db($db_name, $connection);
echo mysql_error();


?>