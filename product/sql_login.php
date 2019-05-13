<?php
    if ($_POST['txtUsername'] && $_POST['txtPassword']) {
        $con = mysqli_connect("127.0.0.1","u328114597_dfk","s2NXIa7wS5zJ","u328114597_three") or die("Error Connect to Database");
        session_start();
        $strSQL = "SELECT * FROM member WHERE username = '".mysqli_real_escape_string($con,$_POST['txtUsername'])."' 
        and password = '".mysqli_real_escape_string($con,$_POST['txtPassword'])."'";
        $objQuery = mysqli_query($con,$strSQL);
        $objResult = mysqli_fetch_array($objQuery);
        if(!$objResult)
        {
            echo '  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
                    <script src="../js/dist/sweetalert.min.js"></script>
                    <link rel="stylesheet" type="text/css" href="../js/dist/sweetalert.css">
                    <script>
                    $( document ).ready(function() {
                        swal({
                      title: "เกิดข้อผิดพลาดในการเข้าสู้ระบบ",
                      text: "โปรคตรวจสอบ Username หรือ Password ของท่าน",
                      type: "warning",
                      showCancelButton: false,
                      confirmButtonColor: "#8CD4F5",
                      confirmButtonText: "OK",
                      closeOnConfirm: false
                    },
                    function(){
                      window.location="login.php";
                    });
                        
                    }); </script>';
            exit();
        }
        else
        {       
            $_SESSION["UID"] = $objResult["username"];
            $_SESSION["ID"] = $objResult["UID"];
            $_SESSION["STATUS"] = $objResult["status"];
            session_write_close();
            header("location:home.php");
        }   
    }
    else
    {
                    echo '  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
                    <script src="../js/dist/sweetalert.min.js"></script>
                    <link rel="stylesheet" type="text/css" href="../js/dist/sweetalert.css">
                    <script>
                    $( document ).ready(function() {
                        swal({
                      title: "เกิดข้อผิดพลาดในการเข้าสู้ระบบ",
                      text: "โปรคกรอก Username และ Password",
                      type: "warning",
                      showCancelButton: false,
                      confirmButtonColor: "#8CD4F5",
                      confirmButtonText: "OK",
                      closeOnConfirm: false
                    },
                    function(){
                      window.location="login.php";
                    });
                        
                    }); </script>';
    }
?>
