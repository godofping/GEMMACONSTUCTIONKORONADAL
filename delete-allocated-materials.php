<?php 
session_start();

include_once('conn.php');



mysqli_query($connection, "delete from  material_table where MaterialID = '" . $_GET['MaterialID'] . "' ");



header("Location: projects.php");


 ?>