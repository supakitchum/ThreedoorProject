<?php
session_start();
if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../member/imgDir/".$_FILES["filUpload"]["name"]))
    {
    $con = mysqli_connect("127.0.0.1","u328114597_dfk","s2NXIa7wS5zJ","u328114597_three") or die("Error Connect to Database");
    mysqli_query($con,"SET NAMES UTF8");
    $updateSQL = "UPDATE member SET Fname='".$_POST["fname"]."',Lname='".$_POST["lastname"]."',email='".$_POST["email"]."',Phonenumber='".$_POST["phone"]."',address='".$_POST["address"]."',Avatar='".$_FILES["filUpload"]["name"]."' WHERE UID='".$_SESSION["ID"]."'";
    $objQuery = mysqli_query($con,$updateSQL);
        if ($objQuery) {
            echo '  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
                    <script src="../js/dist/sweetalert.min.js"></script>
                    <link rel="stylesheet" type="text/css" href="../js/dist/sweetalert.css">
                    <script>
                    $( document ).ready(function() {
                        swal({
                      title: "Update Completed.",
                      text: "อัพเดทข้อมูลของท่านเรียบร้อย",
                      type: "success",
                      showCancelButton: false,
                      confirmButtonColor: "#8CD4F5",
                      confirmButtonText: "OK",
                      closeOnConfirm: false
                    },
                    function(){
                      window.location="../member/editProfile.php";
                    });
                        
                    }); </script>';
        }
        else{
                    echo '  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
                            <script src="../js/dist/sweetalert.min.js"></script>
                            <link rel="stylesheet" type="text/css" href="../js/dist/sweetalert.css">
                            <script>
                            $( document ).ready(function() {
                                swal({
                              title: "Update Fail.",
                              text: "อัพเดทข้อมูลผิดพลาด โปรดติดต่อผู้ดูแลระบบหรือลองอีกครั้ง",
                              type: "error",
                              showCancelButton: false,
                              confirmButtonColor: "#8CD4F5",
                              confirmButtonText: "OK",
                              closeOnConfirm: false
                            },
                            function(){
                              window.location="../member/editProfile.php";
                            });
                                
                            }); </script>';
                }
}
else{
    $con = mysqli_connect("127.0.0.1","u328114597_dfk","s2NXIa7wS5zJ","u328114597_three") or die("Error Connect to Database");
    mysqli_query($con,"SET NAMES UTF8");
    $updateSQL = "UPDATE member SET Fname='".$_POST["fname"]."',Lname='".$_POST["lastname"]."',email='".$_POST["email"]."',Phonenumber='".$_POST["phone"]."',address='".$_POST["address"]."' WHERE UID='".$_SESSION["ID"]."'";
    $objQuery = mysqli_query($con,$updateSQL);
        if ($objQuery) {
            echo '  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
                    <script src="../js/dist/sweetalert.min.js"></script>
                    <link rel="stylesheet" type="text/css" href="../js/dist/sweetalert.css">
                    <script>
                    $( document ).ready(function() {
                        swal({
                      title: "Update Completed.",
                      text: "อัพเดทข้อมูลของท่านเรียบร้อย",
                      type: "success",
                      showCancelButton: false,
                      confirmButtonColor: "#8CD4F5",
                      confirmButtonText: "OK",
                      closeOnConfirm: false
                    },
                    function(){
                      window.location="../member/editProfile.php";
                    });
                        
                    }); </script>';
        }
        else{
                    echo '  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
                            <script src="../js/dist/sweetalert.min.js"></script>
                            <link rel="stylesheet" type="text/css" href="../js/dist/sweetalert.css">
                            <script>
                            $( document ).ready(function() {
                                swal({
                              title: "Update Fail.",
                              text: "อัพเดทข้อมูลผิดพลาด โปรดติดต่อผู้ดูแลระบบหรือลองอีกครั้ง",
                              type: "error",
                              showCancelButton: false,
                              confirmButtonColor: "#8CD4F5",
                              confirmButtonText: "OK",
                              closeOnConfirm: false
                            },
                            function(){
                              window.location="../member/editProfile.php";
                            });
                                
                            }); </script>';
                }
}
?>