<?php 
session_start();

include_once('conn.php');

mysqli_query($connection, "delete from in_table where InID = '" . $_GET['InID'] . "' ");



header("Location: inventory.php");


 ?>