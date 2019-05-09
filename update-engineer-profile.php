<?php 
session_start();

include_once('conn.php');


$result = mysqli_query($connection,"select * from project_engineer_table where ProjectEngrID = '" . $_SESSION["ProjectEngrID"] . "'");


$result = mysqli_fetch_assoc($result);


if(isset($_GET['changepass']))
{
	if(md5($_GET['oldpassword']) == $result['password'] and $_GET['newpassword'] == $_GET['confirmnewpassword'])
	{

		mysqli_query($connection, "update project_engineer_table set password = '" . md5($_GET['newpassword']) . "' where ProjectEngrID = '" . $_SESSION['ProjectEngrID'] . "'");

		header("Location: engineer-profile.php?s=2");


	}
	else
	{
		header("Location: engineer-profile.php?s=1");
	}

}

if(!isset($_GET['changepass']))
{

mysqli_query($connection, "update project_engineer_table set ProjectEngrName = '" . $_GET['ProjectEngrName'] . "',ProjectEngrPhoneNum = '" . $_GET['ProjectEngrPhoneNum'] . "' where ProjectEngrID = '" . $_SESSION['ProjectEngrID'] . "'");



header("Location: engineer-profile.php");
}

 ?>