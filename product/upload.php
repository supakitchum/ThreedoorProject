<?php
	$f_type=$_FILES['filUpload']['type'];
	if ($f_type== "image/gif" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type== "image/PNG" OR $f_type== "image/GIF")
	{
		if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../product/imgDir/".$_FILES["filUpload"]["name"]))
		{
		//*** Insert Record ***//
		$con = mysqli_connect("127.0.0.1","u328114597_dfk","s2NXIa7wS5zJ","u328114597_three") or die("Error Connect to Database");
		mysqli_query($con,"SET NAMES UTF8");
		$strSQL = "INSERT INTO product ";
		$strSQL .="(Photo,Cost,Detail,Name,TNo,Brand,EDate) VALUES ('".$_FILES["filUpload"]["name"]."','".$_POST["cost"]."','".$_POST["detail"]."'
		,'".$_POST["nameproduct"]."','".$_POST["select_type"]."','".$_POST["brand"]."','".$_POST["dateproduct"]."')";
		$objQuery = mysqli_query($con,$strSQL);		
		if ($objQuery) {
			echo '	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
					<script src="../js/dist/sweetalert.min.js"></script>
					<link rel="stylesheet" type="text/css" href="../js/dist/sweetalert.css">
					<script>
					$( document ).ready(function() {
						swal({
					  title: "Upload Completed.",
					  text: "Your product has been upload.",
					  type: "success",
					  showCancelButton: false,
					  confirmButtonColor: "#8CD4F5",
					  confirmButtonText: "OK",
					  closeOnConfirm: false
					},
					function(){
					  window.location="../product/admin_manage.php#test2";
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
					  window.location="../product/admin_manage.php#test2";
					});
						
					}); </script>';
		}
		}
	}
	else{
		echo '	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
					<script src="../js/dist/sweetalert.min.js"></script>
					<link rel="stylesheet" type="text/css" href="../js/dist/sweetalert.css">
					<script>
					$( document ).ready(function() {
						swal({
					  title: "นามสกุลไฟล์ไม่ถูกต้อง",
					  text: "โปรดใส่แต่รูปภาพ",
					  type: "error",
					  showCancelButton: false,
					  confirmButtonColor: "#8CD4F5",
					  confirmButtonText: "OK",
					  closeOnConfirm: false
					},
					function(){
					  window.location="../product/admin_manage.php#test2";
					});
						
					}); </script>';
	}
?>