<?php
  session_start();
  if(!$_SESSION['UID'])
  {
    echo"<script>window.location='../login.php';</script>";
    exit();
  }
  $con = mysqli_connect("127.0.0.1","u328114597_dfk","s2NXIa7wS5zJ","u328114597_three") or die("Error Connect to Database");
  mysqli_query($con,"SET NAMES UTF8");
  $strSQL = "SELECT * FROM product WHERE PID = '".mysqli_real_escape_string($con,$_GET['id'])."' ";
  $objQuery = mysqli_query($con,$strSQL);
  $objResult = mysqli_fetch_array($objQuery);
  $name = $objResult["Name"];
  $detail = $objResult["Detail"];
  $imgName = $objResult["Photo"];
  $exp_date = strtotime($objResult["EDate"]);
  $strSQL = "SELECT bidding.BUID,bidding.BPrice, member.username,bidding.BTD FROM bidding left join member on bidding.BUID=member.UID WHERE BPID = '".mysqli_real_escape_string($con,$_GET['id'])."'";
  $strSQL .= "ORDER BY BPrice DESC, BTD ASC";
  $objQuery = mysqli_query($con,$strSQL);
  $objResult = mysqli_fetch_array($objQuery);
  $price = $objResult["BPrice"];
  $Uname = $objResult["username"];
  $nowTimeSQL = "SELECT NOW()";
  $nowTimeQuery = mysqli_query($con,$nowTimeSQL);
  $nowTimeResult = mysqli_fetch_array($nowTimeQuery);
  $nowTime = strtotime($nowTimeResult["NOW()"]);
  $timeDifference = ($exp_date - $nowTime)-25465;
  if ($timeDifference > 0) {
    $end = 0;
  }else{
    $end = 1;
  }
  if (!$price) {
    $price = 0;
  }

?>

<!DOCTYPE html>
<html>
<head>
<META HTTP-EQUIV='Refresh' CONTENT = '5;URL=#'>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Product - Threedoor</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../cssPa/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../cssPa/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/style.css">
  <?php include 'test3.php';?>
</head>
<body style="background-color:#d2e1e2;">

<!--นำเข้า nav bar-->
<?php include '../navtab.php';?>


   <div class="container" style="font-family: 'Itim', cursive; font-size: 1.3em;">
    <div class="section">
<!--ส่วนกลาง-->
      <div class="row">
        <div class="col s12">
          <div class="card-panel" align="center">
            <font color="black"><h4><?php echo "$name";?></h4></font>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top: -100px;">
        <div class="col s12 m4">
            <div class="card-panel hoverable" align="center" style="height: 655px">
              <img src="../product/imgDir/<?php echo $imgName;?>" width="80%" height="300px"><br><br>
              <font size="4.5em">สิ้นสุดเวลาการประมูลใน</font><br>
              <span style="color: red; size: 20px;" id="showRemain"></span>
              <br><br>
            </div>
        </div>

        <div class="col s12 m8 card-panel hoverable" align="center">
          <br>
          <div class="col s12 m6">ราคาประมูล ณ ปัจจุบัน : <br> <font color="blue"><h4>
          <?php 
            echo "$price";
          ?> 
            THB</h4></font>
          <br>
          <font color="red">winner is : </font><font color="green"><?php echo $Uname; ?></font>
        </div>

        <div class="col s12 m6">ใส่ราคาประมูลของคุณ<br>
          <form method="post" action="bidding.php?id=<?php echo $_GET['id']; ?>">
          <input type="number" name="price" style="width: 100%;" pattern= "[0-9]{1,}" title= "กรุณากรอกจำนวนเงินเป็นตัวเลข 1-9" max="<?php if (!$price) {echo "10";} else{echo $price*2;} ?>" min="<?php if (!$price) {echo "10";} else{echo $price+10;} ?>" value = "<?php echo $price+10; ?>"><br><button class="btn waves-effect waves-light <?php if ($end==1) {
            echo "disabled";
          } ?>" type="submit" name="action" style="width: 100%;">ประมูล</button><br><br>
          </form>
        </div>
        <div class="row">
        <div class="col s12" align="left">
          <?php 
          $listSQL = "SELECT Avatar,BPrice,username,BTD+INTERVAL 7 HOUR +INTERVAL 3 MINUTE +INTERVAL 58 SECOND FROM bidding,member WHERE BUID=UID AND BPID = '".mysqli_real_escape_string($con,$_GET['id'])."'
                      ORDER BY BPrice DESC
                      LIMIT 3";
          $listQuery = mysqli_query($con,$listSQL);
          $i = 0;
          $order;
          while ($listResult = mysqli_fetch_array($listQuery)) {
            $i++;
            switch ($i) {
              case 1:
                $order = "one";
                break;
              case 2:
                $order = "two";
                break;
              case 3:
                $order = 3;
                break;
            }
        ?>
        <ul class="collection" style="font-family: 'Itim', cursive; font-size: 0.8em;">
          <li class="collection-item avatar">
            <img src="../member/imgDir/<?php echo $listResult["Avatar"]; ?>" alt="" class="circle">
            <span class="title"><h5><?php echo $listResult["username"]; ?></h5></span>
            <p>ราคา : <?php echo $listResult["BPrice"]; ?> THB<br>
               วันที่ : <?php echo $listResult["BTD+INTERVAL 7 HOUR +INTERVAL 3 MINUTE +INTERVAL 58 SECOND"]; ?>
            </p>
            <a href="#!" class="secondary-content"><i class="material-icons">looks_<?php echo $order; ?></i></a>
          </li>
        </ul>
        <?php
            }  
        ?>
        <?php if (row) {
          # code...
        } ?>

        </div>
        </div>
        </div>
      </div>
      <div class="row" style="margin-top: -100px;">
        <div class="col s12">
          <div class="col s12 card-panel hoverable" style="padding-bottom: 3%; padding-left: 3%;">    
            <span>
            <font color="blue"><h4>รายละเอียดสินค้า :</h4></font>
            <div style="size: 0.6em;"><?php echo nl2br("$detail");?></div>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>

<!--นำเข้า footer-->
<?php include '../footer.php';?>

<!--Time Scripts-->
<!--
<script language="JavaScript">
    sec=5;
    min = 0;
    function tplus() {
        sec-=1;
        if (sec < 10) {
          
        }
        else
        {
          
        }
        if (sec==0) {
          if (min>0) {
            min-=1;
            sec=60
          }
          else
          {
            
            window.location="../product/auction.php?id=<?php echo $_GET["id"];?>";
          }
        }
        if (sec>0) {setTimeout("tplus()",1000);}
    }
    setTimeout("tplus()",1000);
</script>
-->
  <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>

  </body>
</html>
