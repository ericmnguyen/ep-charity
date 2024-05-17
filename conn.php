<?php
$mysql_hostname = '127.0.0.1';
$mysql_username = 'root';
$mysql_password = 'root123456';
$mysql_dbname = 'ep_charity';
$mysqli = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_dbname)
  or die(mysqli_connect_error());

# set encoding to match PHP script encoding
mysqli_set_charset($mysqli, 'utf8');

// printf("Host information: %s\n", mysqli_get_host_info($mysqli));
?>
