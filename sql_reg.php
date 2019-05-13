<?php
    session_start();
    $con = mysqli_connect("127.0.0.1","u328114597_dfk","s2NXIa7wS5zJ","u328114597_three");
    mysqli_query($con,"SET NAMES UTF8");
    $strSQL = "SELECT * FROM member WHERE username = '".trim($_POST['username'])."'";
    $objQuery = mysqli_query($con,$strSQL);
    $objResult = mysqli_fetch_array($objQuery);
    if ($objResult) {
        echo"<script>alert('Username unavailable.');window.location='signup.php';</script>";
        exit();

    }
    else
    {
                if ($_POST['password'] == $_POST['repass']) {

                $strSQL = "INSERT INTO member(username,password,Fname,Lname,Phonenumber,email,address,status,Avatar) VALUES ('".$_POST["username"]."','".$_POST["password"]."','".$_POST["surname"]."','".$_POST["lastname"]."','".$_POST["phone"]."','".$_POST["email"]."','".$_POST["address"]."','user','guest.jpg')";

                $objQuery = mysqli_query($con,$strSQL);
                if ($objQuery) {
                    echo"<script>alert('success');window.location='login.php';</script>";
                }
                else{
                    echo "fail";
                }
                mysqli_close($con);
    }
    else
    {
        echo"<script>alert('Check your confrim password');window.location='signup.php';</script>";
        exit();

    }
    }
?>

