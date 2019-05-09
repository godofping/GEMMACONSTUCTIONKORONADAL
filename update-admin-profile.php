<?php 
session_start();

include_once('conn.php');


$result = mysqli_query($connection,"select * from admin_table where adminid = '" . $_SESSION["adminid"] . "'");


$result = mysqli_fetch_assoc($result);


if(isset($_GET['changepass']))
{
	if(md5($_GET['oldpassword']) == $result['password'] and $_GET['newpassword'] == $_GET['confirmnewpassword'])
	{

		mysqli_query($connection, "update admin_table set password = '" . md5($_GET['newpassword']) . "' where adminid = '" . $_SESSION['adminid'] . "'");

		header("Location: profile.php?s=2");


	}
	else
	{
		header("Location: profile.php?s=1");
	}

}

if(!isset($_GET['changepass']))
{

mysqli_query($connection, "update admin_table set fullname = '" . $_GET['fullname'] . "' where adminid = '" . $_SESSION['adminid'] . "'");



header("Location: profile.php");
}

 ?>