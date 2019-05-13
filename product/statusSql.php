<?php 
  session_start();
  if(strcmp($_SESSION['STATUS'],"staff") == 0)
  {
  $con = mysqli_connect("127.0.0.1","u328114597_dfk","s2NXIa7wS5zJ","u328114597_three") or die("Error Connect to Database");
	if (strcmp($_GET['status'],"staff") == 0) {
 		$query = "UPDATE member SET status='staff' WHERE UID='".mysqli_real_escape_string($con,$_GET['uid'])."';";
 	}
 	else if (strcmp($_GET['status'],"user") == 0) {
 		$query = "UPDATE member SET status='user' WHERE UID='".mysqli_real_escape_string($con,$_GET['uid'])."';";
 	}

    $objQuery = mysqli_query($con,$query);
    if ($objQuery) {
		echo"<script>alert('success');window.location='admin_manage.php';</script>";
    }
	else{
		echo "fail";
	}
	mysqli_close($con);
  }
  else
  {
  	echo"<script>alert('Staff only.');window.location='../home.php';</script>";
    exit();
  }

?>