<?php 
session_start();

include_once('conn.php');

mysqli_query($connection, "delete from out_table where OutID = '" . $_GET['OutID'] . "'");
echo "delete from out_table where OutID = '" . $_GET['OutID'] . "'";
header("Location: projects.php");


 ?>