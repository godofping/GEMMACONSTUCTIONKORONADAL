<?php 
session_start();

include_once('conn.php');

mysqli_query($connection, "insert into in_table (adminid,InID,InQuantity, inDate,ProductID,BodegeroName) values ('" . $_SESSION["adminid"] . "','" . $_GET['InID'] . "','" . $_GET['InQuantity'] . "', '" . $_GET['inDate'] . "', '" . $_GET['ProductID'] . "', '" . $_GET['BodegeroName'] . "')");



header("Location: inventory.php");


 ?>