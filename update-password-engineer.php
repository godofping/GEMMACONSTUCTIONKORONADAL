<?php 
session_start();

include_once('conn.php');

mysqli_query($connection, "update project_engineer_table set password = '" . md5($_GET['password']) . "' where ProjectEngrID = '" . $_GET['ProjectEngrID'] . "' ");

header("Location: engineers.php");


 ?>