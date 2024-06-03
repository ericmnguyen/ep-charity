<?php

// FOR ERIC
// $mysql_hostname = '127.0.0.1';
// $mysql_username = 'root';
// $mysql_password = 'root123456';
// $mysql_dbname = 'ep_charity';




// FOR PRATIK

// $mysql_hostname = 'localhost';
// $mysql_username = 'root';
// $mysql_password = '';
// $mysql_dbname = 'ep_charity';





// FOR PRATIK'S REMOTE DB SERVER

$mysql_hostname = 'localhost';
$mysql_username = '20634982';
$mysql_password = 'webtech1@#';
$mysql_dbname = 'db_20634982';

// FOR Eric'S REMOTE DB SERVER

$mysql_hostname = 'localhost';
$mysql_username = '22074118';
$mysql_password = 'Zuhan@123';
$mysql_dbname = 'db_22074118';


$mysqli = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_dbname);


// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}
