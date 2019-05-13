<?php
  session_start();
  if($_SESSION['UID'] == "")
  {
    echo"<script>window.location='../login.php';</script>";
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
  <link href="/cssPa/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="/cssPa/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
</head>
<body style="background-color:#d2e1e2;">
<!--นำเข้า nav bar-->
<?php include 'navtab.php';?>
   <div class="container" style="font-family: 'Itim', cursive;">
    <div class="section">
<!--ส่วนกลาง-->

      <div class="row">
      <?php 
 $con = mysqli_connect("127.0.0.1","u328114597_dfk","s2NXIa7wS5zJ","u328114597_three") or die("Error Connect to Database");
  mysqli_query($con,"SET NAMES UTF8");
  $strSQL = "SELECT PID,Photo,MAX(BPrice),EDate
FROM product
LEFT JOIN bidding ON product.PID=bidding.BPID
WHERE EDate > NOW()+ INTERVAL 7 HOUR +INTERVAL 4 MINUTE
GROUP BY PID
ORDER BY EDate ASC
LIMIT 16";
  $objQuery = mysqli_query($con,$strSQL);
  $row = mysqli_num_rows($objQuery);
        while($objResult = mysqli_fetch_array($objQuery)){
          if (!$objResult["MAX(BPrice)"]) {
            $objResult["MAX(BPrice)"] = 0;
          }
      ?>

        <div class="col s12 m3">
            <div class="card">
            <div class="card-image">
            <center><img src="../product/imgDir/<?php echo $objResult["Photo"]; ?>" width="80%" height="200px"> 
              <div class="row">
              <div class="col s6" id="showRemain<?php echo $objResult["PID"]; ?>" style="color:red;">00:00:00</div>
              <div class="col s6" >
              <?php 
                  $str = $objResult["MAX(BPrice)"];
                  if (strlen($str) > 6) {
                    $cutstr = substr($str,0,4);
                    echo $cutstr;
                    echo "..."; // 123456
                  }
                  else
                  {
                    echo $str;
                  }
              ?>
              <font color="green">THB</font></div>
              </div> 
            <div class="card-action">
            <a class="waves-effect waves-light btn" href="/product/auction.php?id=<?php echo $objResult["PID"];?>"><i class="small material-icons left">gavel</i> ประมูล</a>
            </div>
            </center></div>
            </div>

            <?php 
              $date = $objResult["EDate"];
              $pid = $objResult["PID"];
              $exp_date = strtotime($date);
            ?>
            <script type="text/javascript">
function countDown<?php echo $pid; ?>(){
    var number = <?php echo $pid; ?>;
    var timeA = new Date(); // วันเวลาปัจจุบัน
    var timeB = <?php echo $exp_date; ?>*1000; // วันเวลาสิ้นสุด รูปแบบ เดือน/วัน/ปี ชั่วโมง:นาที:วินาที
    timeB = timeB - 3600000;
    var timeDifference = timeB-timeA;
    if(timeDifference>=0){
        timeDifference=timeDifference/1000;
        timeDifference=Math.floor(timeDifference);
        var wan=Math.floor(timeDifference/86400);
        var l_wan=timeDifference%86400;
        var hour= (Math.floor(l_wan/3600))-6;
        var l_hour=l_wan%3600;
        var minute=Math.floor(l_hour/60);
        var second=l_hour%60;
        var showPart=document.getElementById('showRemain' + number);
        if (minute<=9) { minute="0"+minute; }
        if (second<=9) { second="0"+second; }
        if (hour < 0) {
                    showPart=document.getElementById('showRemain' + number); showPart.innerHTML="หมดเวลา";   return;}
        if (hour <= 9) {
            showPart.innerHTML= "0" + hour +":"+minute+":"+second;
        }
        else{
            showPart.innerHTML= hour +":"+minute+":"+second;
        }
            if(wan==0 && hour==0 && minute==0 && second==0){
                clearInterval(iCountDown); // ยกเลิกการนับถอยหลังเมื่อครบ
                showPart=document.getElementById('showRemain' + number);
                showPart.innerHTML="หมดเวลา";
            }
    }
    else{
        showPart=document.getElementById('showRemain' + number);
        showPart.innerHTML="หมดเวลา";
    }
}
// การเรียกใช้
var iCountDown=setInterval("countDown<?php echo $pid;?>()",1);
</script>
        </div>
        <?php } ?>
      </div>

<!--จบส่วนกลาง-->
  </div>
  </div>
<!--นำเข้า footer-->
<?php include 'footer.php';?>


    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="/js/materialize.js"></script>
  <script src="/js/init.js"></script>
  </body>
</html>
