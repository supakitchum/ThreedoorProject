<?php 
	$con = mysqli_connect("127.0.0.1","u328114597_dfk","s2NXIa7wS5zJ","u328114597_three") or die("Error Connect to Database");
		mysqli_query($con,"SET foreign_key_checks = 0");
		$strSQL = "DELETE FROM product WHERE PID='".$_GET["id"]."'";
		$objQuery = mysqli_query($con,$strSQL);
        $strSQL2 = "DELETE FROM bidding WHERE BPID='".$_GET["id"]."'";
        $objQuery2 = mysqli_query($con,$strSQL2);		
		if ($objQuery && $objQuery2) {
		mysqli_query($con,"SET foreign_key_checks = 1");
echo '	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
					<script src="../js/dist/sweetalert.min.js"></script>
					<link rel="stylesheet" type="text/css" href="../js/dist/sweetalert.css">
					<script>
					$( document ).ready(function() {
						swal({
  title: "Delete Completed.",
  text: "Your imaginary file has been deleted.",
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
			mysqli_query($con,"SET foreign_key_checks = 1");
			echo '	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
					<script src="../js/dist/sweetalert.min.js"></script>
					<link rel="stylesheet" type="text/css" href="../js/dist/sweetalert.css">
					<script>
					$( document ).ready(function() {
						swal({
  title: "Delete Fail",
  text: "Your product was not deleted.",
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
?>

<!-- window.location='../product/admin_manage.php'; -->