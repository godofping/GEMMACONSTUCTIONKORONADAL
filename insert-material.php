<?php 
session_start();

include_once('conn.php');

mysqli_query($connection, "insert into material_table (Method,adminid,ProjectID, ProductID, Quantity) values ('" . $_GET['Method'] . "','" . $_SESSION["adminid"] . "','" . $_GET['ProjectID'] . "', '" . $_GET['ProductID'] . "', '" . $_GET['Quantity'] . "' )");



header("Location: projects.php");


 ?>