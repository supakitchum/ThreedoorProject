<?php
  session_start();
  if($_SESSION['UID'] == "")
  {
    echo"<script>window.location='login.php';</script>";
    exit();
  }
$con = mysqli_connect("127.0.0.1","u328114597_dfk","s2NXIa7wS5zJ","u328114597_three") or die("Error Connect to Database");
mysqli_query($con,"SET NAMES UTF8");
$strSQL = "SELECT UID,TNo,BPID,product.Name,MAX(BPrice)
FROM product
INNER JOIN (bidding JOIN member ON BUID=UID) ON PID=BPID
WHERE UID= '".$_SESSION["ID"]."'
GROUP BY BPID ASC";
$objQuery = mysqli_query($con,$strSQL);
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

   <div class="container" style="font-family: 'Itim', cursive;  <?php
    if(stristr($_SERVER['HTTP_USER_AGENT'], "Mobile")){ // if mobile browser
      echo "font-size: 0.8em; width: 100%;";
    }
    ?>">
    <!--กลาง-->
<?php     if(stristr($_SERVER['HTTP_USER_AGENT'], "Mobile")){ // if mobile browser
      echo "<center><h5>การประมูลของฉัน</h5></center>";
      echo '<div class="section">';
    }
      else{
        echo "<h3>การประมูลของฉัน</h3>";
        echo '<div class="section">';
      }
?>
<table class="bordered">

        <thead bgcolor="#BEBEBE">
          <tr>
              <th data-field="id" style="text-align: center; width: 20%;">รหัสสินค้า</th>
              <th data-field="name" style="text-align: center; width: 30%">ชื่อสินค้า</th>
              <th data-field="priceMax" style="text-align: center; width: 15%;">ราคาปัจจุบัน&nbsp;(บาท)</th>
              <th data-field="price" style="text-align: center; width: 15%;">ราคาของคุณ&nbsp;(บาท)</th>
              <th data-field="status" style="text-align: center; width: 20%;">สถานะ</th>
          </tr>
        </thead>

        <tbody bgcolor="#FFFFFF">
        <?php while($objResult = mysqli_fetch_array($objQuery)){
            $syntaxSQL = "CREATE VIEW win_pid";
            $syntaxSQL .= $objResult["BPID"];
            $syntaxSQL .= " AS SELECT * FROM bidding WHERE BPID=";
            $syntaxSQL .= $objResult["BPID"];
            $syntaxSQL .= " ORDER BY BPrice DESC LIMIT 5";

            $winQuery = mysqli_query($con,$syntaxSQL);
            $syntaxSQL = "SELECT * FROM win_pid";
            $syntaxSQL .= $objResult["BPID"];
            $syntaxSQL .= " LIMIT 1";
            $winQuery = mysqli_query($con,$syntaxSQL);
            $winResult = mysqli_fetch_array($winQuery);

            $nowTimeSQL = "SELECT NOW()";
            $nowTimeQuery = mysqli_query($con,$nowTimeSQL);
            $nowTimeResult = mysqli_fetch_array($nowTimeQuery);
            $nowTime = strtotime($nowTimeResult["NOW()"]);

            $expSQL = "SELECT EDate FROM product WHERE PID=";
            $expSQL .= $objResult["BPID"];
            $expQuery = mysqli_query($con,$expSQL);
            $expResult = mysqli_fetch_array($expQuery);
            $exp_date = strtotime($expResult["EDate"]);
            $timeDifference = ($exp_date - $nowTime)-25435;
        ?>

          <tr>
            <td style="text-align: center; width: 20%;">
            <?php 
              if ($objResult["BPID"] > 9) {
                echo "0";echo $objResult["TNo"];
                echo $objResult["BPID"];
              }
              else
              {
                echo "0";echo $objResult["TNo"];
                echo "0";echo $objResult["BPID"]; 
              }
            ?>
            </td>
            <td style="text-align: center; width: 30%;">
              <a href="../product/auction.php?id=<?php echo $objResult["BPID"]; ?>"><?php echo $objResult["Name"];?></a></td>
            <td style="text-align: center; width: 15%;"><?php echo $winResult["BPrice"]; ?></td>
            <td style="text-align: center; width: 15%;"><?php echo $objResult["MAX(BPrice)"]; ?></td>
            <td style="text-align: center; width: 20%;">
            <?php 
            if ($timeDifference > 0) {
              echo '<i class="material-icons orange circle left" style="color: white;">warning</i>';
              echo '<font color="orange">ยังไม่จบการประมูล</font>';
            }
            elseif ($winResult["BUID"] == $_SESSION["ID"]) {
              echo '<i class="material-icons green circle left" style="color: white;">check</i>';
              echo '<font color="green">ชนะ</font>';
            }else{
              echo '<i class="material-icons red circle left" style="color: white;">close</i>';
              echo '<font color="red">แพ้</font>';
            } 
            ?></td>
          </tr>
          <?php }?> 
        </tbody>
        
</table>
<br>
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
