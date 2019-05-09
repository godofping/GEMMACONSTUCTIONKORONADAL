<?php 
session_start();

include_once('conn.php');

mysqli_query($connection, "insert into project_engineer_table (ProjectEngrName, ProjectEngrPhoneNum, username, password) values ('" . $_GET['ProjectEngrName'] . "', '" . $_GET['ProjectEngrPhoneNum'] . "', '" . $_GET['username'] . "', '" . md5($_GET['password']) . "')");


header("Location: engineers.php");



 ?>