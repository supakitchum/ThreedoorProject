<?php
	if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../product/imgDir/".$_FILES["filUpload"]["name"]))
	{
		//*** Insert Record ***//
		$con = mysqli_connect("127.0.0.1","u328114597_dfk","s2NXIa7wS5zJ","u328114597_three") or die("Error Connect to Database");
		mysqli_query($con,"SET NAMES UTF8");
		$strSQL = "UPDATE product ";
		$strSQL .="SET Photo ='".$_FILES["filUpload"]["name"]."',Cost = '".$_POST["cost"]."',Detail = '".$_POST["detail"]."',Name = '".$_POST["nameproduct"]."',TNo = '".$_POST["select_type"]."',Brand = '".$_POST["brand"]."',EDate = '".$_POST["dateproduct"]."' where PID='".$_GET["id"]."'";
		$objQuery = mysqli_query($con,$strSQL);		
				if ($objQuery) {
			echo '	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
					<script src="../js/dist/sweetalert.min.js"></script>
					<link rel="stylesheet" type="text/css" href="../js/dist/sweetalert.css">
					<script>
					$( document ).ready(function() {
						swal({
					  title: "Update Completed.",
					  text: "Your product has been update.",
					  type: "success",
					  showCancelButton: false,
					  confirmButtonColor: "#8CD4F5",
					  confirmButtonText: "OK",
					  closeOnConfirm: false
					},
					function(){
					  window.location="../product/admin_manage.php#test3";
					});
						
					}); </script>';
		}
		else{
			echo '	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
					<script src="../js/dist/sweetalert.min.js"></script>
					<link rel="stylesheet" type="text/css" href="../js/dist/sweetalert.css">
					<script>
					$( document ).ready(function() {
						swal({
					  title: "Upload Fail.",
					  text: "Your product has not upload.",
					  type: "error",
					  showCancelButton: false,
					  confirmButtonColor: "#8CD4F5",
					  confirmButtonText: "OK",
					  closeOnConfirm: false
					},
					function(){
					  window.location="../product/admin_manage.php#test3";
					});
						
					}); </script>';
		}	
	}
	else{
		$con = mysqli_connect("127.0.0.1","u328114597_dfk","s2NXIa7wS5zJ","u328114597_three") or die("Error Connect to Database");
		mysqli_query($con,"SET NAMES UTF8");
		$strSQL = "UPDATE product ";
		$strSQL .="SET Cost = '".$_POST["cost"]."',Detail = '".$_POST["detail"]."',Name = '".$_POST["nameproduct"]."',TNo = '".$_POST["select_type"]."',Brand = '".$_POST["brand"]."',EDate = '".$_POST["dateproduct"]."' where PID='".$_GET["id"]."'";
		$objQuery = mysqli_query($con,$strSQL);	
		if ($objQuery) {
			echo '	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
					<script src="../js/dist/sweetalert.min.js"></script>
					<link rel="stylesheet" type="text/css" href="../js/dist/sweetalert.css">
					<script>
					$( document ).ready(function() {
						swal({
					  title: "Update Completed.",
					  text: "Your product has been update.",
					  type: "success",
					  showCancelButton: false,
					  confirmButtonColor: "#8CD4F5",
					  confirmButtonText: "OK",
					  closeOnConfirm: false
					},
					function(){
					  window.location="../product/admin_manage.php#test3";
					});
						
					}); </script>';
		}
		else{
			echo '	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
					<script src="../js/dist/sweetalert.min.js"></script>
					<link rel="stylesheet" type="text/css" href="../js/dist/sweetalert.css">
					<script>
					$( document ).ready(function() {
						swal({
					  title: "Upload Fail.",
					  text: "Your product has not upload.",
					  type: "error",
					  showCancelButton: false,
					  confirmButtonColor: "#8CD4F5",
					  confirmButtonText: "OK",
					  closeOnConfirm: false
					},
					function(){
					  window.location="../product/admin_manage.php#test3";
					});
						
					}); </script>';
		}	

	}
?>