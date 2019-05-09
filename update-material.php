<?php 
session_start();

include_once('conn.php');



mysqli_query($connection, "update material_table set ProductID = '" . $_GET['ProductID'] . "', Quantity = '" . $_GET['Quantity'] . "', Method = '" . $_GET['Method'] . "' where MaterialID = '" . $_GET['MaterialID'] . "'");


header("Location: projects.php");


 ?>