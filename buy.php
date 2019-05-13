  <?php
  session_start();
  if($_SESSION['UID'] == "")
  {
    echo"<script>window.location='login.php';</script>";
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Auction so easy - Threedoor</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="cssPa/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="cssPa/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
</head>
<body style="background-color:#d2e1e2;">
<!--นำเข้า nav bar-->
<?php include 'navtab.php';?>

   <div class="container" style="font-family: 'Itim', cursive;">
    <div class="section">
    <!--กลาง-->
<h3>ช่องทางการชำระเงิน</h3>
<table class="bordered">
        <thead bgcolor="#BEBEBE">
          <tr>
              <th></th>
              <th data-field="bank">ธนาคาร</th>
              <th data-field="numberbank">เลขที่บัญชี</th>
              <th data-field="namebank">ชื่อบัญชี</th>
              <th data-field="branch">สาขา</th>
              <th data-field="category">ประเภทบัญชี</th>

          </tr>
        </thead>

         <tbody bgcolor="#FFFFFF" ">
          <tr>
            <td><center><img src="./pic/ktb.png" style="width: 50px;height: 50px;margin-top: 9px; "></center></td>
            <td>กรุงไทย</td>
            <td>xxxxxxxxxxxx</td>
            <td>บริษัท three door</td>
            <td>สาขาเชียงใหม่</td>
            <td>ออมทรัพย์่</td>
          </tr>
          <tr>
            <td><center><img src="./pic/scb.png" style="width: 50px;height: 50px;margin-top: 9px; "></center></td>
            <td>ไทยพาณิชย์</td>
            <td>xxxxxxxxxxxx</td>
            <td>บริษัท three door</td>
            <td>สาขาเชียงใหม่</td>
            <td>ออมทรัพย์่</td>
          </tr>
          <tr>
            <td><center><img src="./pic/kkb.png" style="width: 50px;height: 50px;margin-top: 9px; "></center></td>
            <td>กสิกรไทย</td>
            <td>xxxxxxxxxxxx</td>
            <td>บริษัท three door</td>
            <td>สาขาเชียงใหม่</td>
            <td>ออมทรัพย์่</td>
          </tr>
        </tbody>
        
</table>


  </div>
  </div>

<!--นำเข้า footer-->
<?php include 'footer.php';?>


  <!--  Scripts-->

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
