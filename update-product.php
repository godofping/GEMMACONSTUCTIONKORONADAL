<?php 
session_start();

include_once('conn.php');

mysqli_query($connection, "update product_table set ProductName = '" . $_GET['productname'] . "', ProductDescription = '" . $_GET['productdescription'] . "' where ProductID = '" . $_GET['productid'] . "' ");

header("Location: products.php");


 ?>