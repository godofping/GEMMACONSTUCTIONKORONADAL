<?php 
session_start();

include_once('conn.php');

mysqli_query($connection, "delete from project_table where ProjectID = '" . $_GET['ProjectID'] . "'");

echo "delete from project_table where ProjectID = '" . $_GET['ProjectID'] . "'";

header("Location: projects.php");


 ?>