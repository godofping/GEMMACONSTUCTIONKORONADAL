<?php 
session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);


include_once('conn.php');


$res = mysqli_query($connection, "select * from admin_table where username = '" . $username . "' and password = '" . $password . "' ");

$result = mysqli_fetch_assoc($res);

?>

<?php

if(mysqli_num_rows($res) > 0)
{
	$_SESSION['adminid'] = $result['adminid'];
	header("Location: admin-home.php");
}
else
{
	$res = mysqli_query($connection, "select * from project_engineer_table where username = '" . $username . "' and password = '" . $password . "' ");

$result = mysqli_fetch_assoc($res);
	
	if(mysqli_num_rows($res) > 0)
	{
		$_SESSION['ProjectEngrID'] = $result['ProjectEngrID'];
		header("Location: engineer-home.php");
	}
		else
		{
			header("Location: index.php?s=1");
		}

}

 ?>


                       
                    