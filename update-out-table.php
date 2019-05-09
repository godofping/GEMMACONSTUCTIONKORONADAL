<?php 
session_start();

include_once('conn.php');



mysqli_query($connection, "update out_table set OutDate = '" . date('Y-m-d') . "', IsApproved = '" . $_GET['IsApproved'] . "', isOpened = 'True',adminid = '" . $_SESSION["adminid"] . "' where OutID = '" . $_GET['OutID'] . "'");


header("Location: projects.php");


 ?>