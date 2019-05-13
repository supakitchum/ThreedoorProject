<?php

$pid = $_GET['id'];
  session_start();
  if($_SESSION['UID'] == "")
  {
    echo"<script>window.location='../login.php';</script>";
    exit();
  }
  if (!$_POST["price"]) {
    echo"<script>window.location='../home.php';</script>";
  }
  else
  {
  $servername = "127.0.0.1";
  $username = "u328114597_dfk";
  $password = "s2NXIa7wS5zJ";
  $dbname = "u328114597_three";
  $con = mysqli_connect($servername,$username,$password,$dbname);
  $nowTimeSQL = "SELECT EDate FROM product WHERE PID='".mysqli_real_escape_string($con,$_GET['id'])."'";
  $nowTimeQuery = mysqli_query($con,$nowTimeSQL);
  $nowTimeResult = mysqli_fetch_array($nowTimeQuery);
  $exp_date = strtotime($nowTimeResult["EDate"]);
  $nowTimeSQL = "SELECT NOW()";
  $nowTimeQuery = mysqli_query($con,$nowTimeSQL);
  $nowTimeResult = mysqli_fetch_array($nowTimeQuery);
  $nowTime = strtotime($nowTimeResult["NOW()"]);
  $timeDifference = ($exp_date - $nowTime)-25470;
  $checkSQL = "SELECT BPrice FROM bidding WHERE BPrice = '".$_POST["price"]."' AND BPID = '".$_GET['id']."'";
  $checkQuery = mysqli_query($con,$checkSQL);
  $checkResult = mysqli_fetch_array($checkQuery);
  if (!$checkResult) 
  {
         if ($timeDifference < 0) {
        $upTimeSQL = "UPDATE product SET EDate=EDate+INTERVAL 30 SECOND WHERE PID='".$_GET['id']."'";
        $upTimeQuery = mysqli_query($con,$upTimeSQL);
    }
    else
    {
      echo '  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
                      <script src="../js/dist/sweetalert.min.js"></script>
                      <link rel="stylesheet" type="text/css" href="../js/dist/sweetalert.css">
                      <script>
                      $( document ).ready(function() {
                          swal({
                        title: "เกิดข้อผิดพลาด",
                        text: "หมดเวลาในการประมูลแล้ว โปรดรอโอกาศหน้า",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonColor: "#8CD4F5",
                        confirmButtonText: "OK",
                        closeOnConfirm: false
                      },
                        function(){
                          window.location="auction.php?id=';
                      echo $_GET["id"];
                      echo '";
                        });
                          
                        }); </script>';
    }

    $strSQL = "INSERT INTO bidding(BUID,BPID,BPrice) VALUES ('".mysqli_real_escape_string($con,$_SESSION['ID'])."','".mysqli_real_escape_string($con,$_GET['id'])."','".$_POST["price"]."')";
    $objQuery = mysqli_query($con,$strSQL);
    if ($objQuery) {
          echo '  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
            <script src="../js/dist/sweetalert.min.js"></script>
            <link rel="stylesheet" type="text/css" href="../js/dist/sweetalert.css">
            <script>
            $( document ).ready(function() {
              swal({
              title: "เสนอราคาสำเร็จ !!",
              text: "ขอให้คุณโชคดีกับการประมูลในครั้งนี้",
              type: "success",
              showCancelButton: false,
              confirmButtonColor: "#8CD4F5",
              confirmButtonText: "OK",
              closeOnConfirm: false
            },
            function(){
              window.location="auction.php?id=';
          echo $_GET["id"];
          echo '";
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
              title: "เกิดข้อผิดพลาด !!",
              text: "เกิดข้อผิดพลาดในการเสนอราคา โปรดติดต่อผู้ดูแล",
              type: "warning",
              showCancelButton: false,
              confirmButtonColor: "#8CD4F5",
              confirmButtonText: "OK",
              closeOnConfirm: false
            },
            function(){
              window.location="auction.php?id=';
          echo $_GET["id"];
          echo '";
            });
              
            }); </script>';
      
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
              title: "โปรดเสนอราคาใหม่ !!",
              text: "ราคาที่ท่านเสนอมีผู้อื่นเสนอแล้ว",
              type: "warning",
              showCancelButton: false,
              confirmButtonColor: "#8CD4F5",
              confirmButtonText: "OK",
              closeOnConfirm: false
            },
            function(){
              window.location="auction.php?id=';
          echo $_GET["id"];
          echo '";
            });
              
            }); </script>';
  }
}

?>