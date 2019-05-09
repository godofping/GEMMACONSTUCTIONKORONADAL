<?php 
date_default_timezone_set('Asia/Manila');
$connection = mysqli_connect("localhost", "root","vertrigo") or trigger_error(error_msg);
mysqli_select_db($connection,"jemmaconstructioninventorydb");

 ?>