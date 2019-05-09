<?php 
session_start();

include_once('conn.php');

mysqli_query($connection, "insert into out_table (MaterialID,OutQuantity, ProjectID, ProductID, IsApproved, RequestDate) values ('" . $_GET['MaterialID'] . "','" . $_GET['OutQuantity'] . "', '" . $_GET['ProjectID'] . "','" . $_GET['ProductID'] . "', 'Pending','" . date('Y-m-d') . "') ");






header("Location: engineer-home.php");


 ?>