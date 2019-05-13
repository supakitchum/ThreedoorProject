<?php 
session_start(); 
if (!isset($_SESSION['timeend'])){ 
    unset($_SESSION['timeend']);
    $endtime = time() + 90; 
    $_SESSION['timeend'] = $endtime; 
} 

($_SESSION['timeend'] - time()) < 0 ? $EndTime = 0 :  $EndTime = $_SESSION['timeend'] - time();

if($EndTime <= 0) { 
    unset($_SESSION['timeend']);
//session_destroy(); 
} 

?> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
แกเหลือเวลา <span id="timer" style="color:red;"><?php echo $EndTime?></span> วินาที นะเฟร้ย


<script type="text/javascript"> 
var pastTime = <?php echo $EndTime;?>; 
var min = Math.floor(pastTime / 60);
var sec = pastTime % 60;

function mycountdown(){ 
      if(pastTime > 0) { 
            pastTime -= 1; 
            min = Math.floor(pastTime / 60);
            sec = pastTime % 60
            document.getElementById('timer').innerHTML = min + ":" + sec; 
      } 
if(pastTime < 1) { 
            window.location = "#" 
      } 
} 
    if(pastTime >0){
        setInterval(mycountdown,1000); 
    }
</script>
