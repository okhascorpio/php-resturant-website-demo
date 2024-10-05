<?php
//start session
session_start();

//constants for DB
define('SITEURL', 'https://okhascorpio.freewebhostmost.com/');
define('LOCALHOAST', 'server6.webhostmost.com');
define('DB_USERNAME','ciqpzpwr_okhascorpio');
define('DB_PASSWORD','c2#VPC£M5k&j7TZ%Vt5$');
define('DB_NAME','ciqpzpwr_okhascorpio');
//connect to DB
$conn = mysqli_connect(LOCALHOAST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
?>  