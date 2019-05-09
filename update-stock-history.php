<?php 
session_start();

include_once('conn.php');

mysqli_query($connection, "update in_table set InQuantity = '" . $_GET['InQuantity'] . "', inDate = '" . $_GET['inDate'] . "' where InID = '" . $_GET['InID'] . "' ");



header("Location: inventory.php");


 ?>