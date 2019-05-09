<?php 
session_start();

include_once('conn.php');

mysqli_query($connection, "insert into product_table (productName, productDescription) values ('" . $_GET['productname'] . "', '" . $_GET['productdescription'] . "')");

$qry = mysqli_query($connection, "SELECT * FROM product_table ORDER BY ProductID DESC LIMIT 1");

$result = mysqli_fetch_assoc($qry);

mysqli_query($connection, "insert into in_table (ProductID,InQuantity,inDate) values ('" . $result['ProductID'] . "','" . $_GET['InQuantity'] . "', '" . date('Y-m-d') . "')");


header("Location: products.php");


 ?>