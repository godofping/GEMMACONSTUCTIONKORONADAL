<?php 
session_start();

include_once('conn.php');



mysqli_query($connection, "update project_table set ProjectStatus = 'Finished' where ProjectID = '" . $_GET['ProjectID'] . "'");


header("Location: projects.php");


 ?>