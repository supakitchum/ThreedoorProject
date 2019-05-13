<?php 
$con = mysqli_connect("127.0.0.1","u328114597_dfk","s2NXIa7wS5zJ","u328114597_three") or die("Error Connect to Database");
$strSQL = "SELECT EDate,PID FROM product WHERE PID = '".mysqli_real_escape_string($con,$_GET['id'])."' ";
$objQuery = mysqli_query($con,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
$date = $objResult["EDate"];
$pid = $objResult["PID"];
$exp_date = strtotime($date);
?>
<script type="text/javascript">
function countDown(){
    var timeA = new Date(); // วันเวลาปัจจุบัน
    var timeB = <?php echo $exp_date; ?>*1000; // วันเวลาสิ้นสุด รูปแบบ เดือน/วัน/ปี ชั่วโมง:นาที:วินาที
    timeB = timeB - 3600000;
    var pid = <?php echo $pid ?>;
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
        var showPart=document.getElementById('showRemain');
        if (minute<=9) { minute="0"+minute; }
        if (second<=9) { second="0"+second; }
        if (hour < 0) {
                    showPart=document.getElementById('showRemain'); showPart.innerHTML="หมดเวลา เมื่อ <?php echo "<br>$date"; ?>"; return;}
        if (hour <= 9) {
            showPart.innerHTML= "0" + hour +":"+minute+":"+second;
        }
        else{
            showPart.innerHTML= hour +":"+minute+":"+second;
        }
            if(wan==0 && hour==0 && minute==0 && second==0){
                clearInterval(iCountDown); // ยกเลิกการนับถอยหลังเมื่อครบ
                showPart=document.getElementById('showRemain');
                showPart.innerHTML="รอประมวลผลประมาณ 5 วินาที หากมีผู้ประมูลในระยะเวลานี้ เวลาประมูลจะเพื่มขึ้น 30 วินาที";
            }
    }
    else{
        showPart=document.getElementById('showRemain');
        showPart.innerHTML="หมดเวลา เมื่อ <?php echo $date; ?>";

    }
}
// การเรียกใช้
var iCountDown=setInterval("countDown()",500); 
</script>