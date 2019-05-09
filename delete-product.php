<?php 
session_start();

include_once('conn.php');

mysqli_query($connection, "delete from product_table where ProductID = '" . $_GET['productid'] . "' ");

header("Location: products.php");


 ?>