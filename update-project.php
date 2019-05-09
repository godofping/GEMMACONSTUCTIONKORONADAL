<?php 
session_start();

include_once('conn.php');

mysqli_query($connection, "update project_table set ProjectName = '" . $_GET['projectname'] . "', StationLimit = '" . $_GET['stationlimit'] . "', ProjectEngrID = '" . $_GET['projectengineer'] . "' where ProjectID = '" . $_GET['ProjectID'] . "' ");



header("Location: projects.php");


 ?>