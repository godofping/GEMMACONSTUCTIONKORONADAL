<?php 
session_start();

include_once('conn.php');

mysqli_query($connection, "insert into project_table (adminid,ProjectName, StationLimit,ProjectEngrID) values ('" . $_SESSION["adminid"] . "','" . $_GET['projectname'] . "', '" . $_GET['stationlimit'] . "', '" . $_GET['projectengineer'] . "')");



header("Location: projects.php");


 ?>