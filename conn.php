<?php
$mysql_localhost='127.0.0.1';
$mysql_name='22074118';
$mysql_password='Zuhan@123';
$mysql_dbname='Zuhan@123';
$mysqli = mysqli_connect($mysql_localhost, $mysql_name, $mysql_password, $mysql_dbname)
OR die
  (mysqli_connect_error());

# set encoding to match PHP script encoding
mysqli_set_charset($dbc, 'utf8');

// printf("Host information: %s\n", mysqli_get_host_info($dbc));
?>
