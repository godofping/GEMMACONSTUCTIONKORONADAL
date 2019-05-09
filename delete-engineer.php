<?php 
session_start();

include_once('conn.php');

mysqli_query($connection, "delete from project_engineer_table where ProjectEngrID = '" . $_GET['ProjectEngrID'] . "' ");

header("Location: engineers.php");


 ?>