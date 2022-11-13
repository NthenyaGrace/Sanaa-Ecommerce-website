<?php
require('database/DBController.php');


//DBController object
$db=new DBController();

//product object
$product=new product($db);
?>
