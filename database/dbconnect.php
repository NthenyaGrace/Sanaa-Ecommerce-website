<?php
// Include functions and connect to the database using PDO MySQL
include 'database/functions.php';
$pdo = pdo_connect_mysql();
require'database/DBController.php';

global $db;
$GLOBALS['db'] = mysqli_connect('localhost','root', '');

?>