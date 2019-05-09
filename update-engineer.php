<?php 
session_start();

include_once('conn.php');

mysqli_query($connection, "update project_engineer_table set ProjectEngrName = '" . $_GET['ProjectEngrName'] . "', ProjectEngrPhoneNum = '" . $_GET['ProjectEngrPhoneNum'] . "', username = '" . $_GET['username'] . "' where ProjectEngrID = '" . $_GET['ProjectEngrID'] . "' ");

header("Location: engineers.php");


 ?>