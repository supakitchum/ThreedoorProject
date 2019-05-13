<?php 
   $con = mysqli_connect("127.0.0.1","u328114597_dfk","s2NXIa7wS5zJ","u328114597_three") or die("Error Connect to Database");
  mysqli_query($con,"SET NAMES UTF8");
  $profileSQL = "SELECT * FROM member WHERE UID='".$_SESSION["ID"]."'";
  $profileQuery = mysqli_query($con,$profileSQL); 
  $profileResult = mysqli_fetch_array($profileQuery);
?>
<!-- Dropdown Structure -->
<ul id="dropdown1"  class="dropdown-content" style="overflow-x:hidden;">
  <li>
    <div class="userView" style="background: url('../member/imgDir/bg.jpeg') no-repeat center center fixed;">
      <center>
          <a href="#!user"><img class="circle" src="../member/imgDir/<?php echo $profileResult["Avatar"]; ?>" style="height: 200px; width: 200px;"></a>
          <a><span class="white-text name"><?php echo $profileResult["Fname"]; ?>  <?php echo $profileResult["Lname"]; ?></span></a>
          <a><span class="white-text email"><?php echo $profileResult["email"]; ?></span></a>
      </center>
    </div>
  </li>
  <li style="margin-left: 2%; margin-top: 3%;">
    <button class="waves-effect waves-light btn blue" style="width: 31%; height: 10%;" type="submit" name="Submit"  onclick="location.href='../member/editProfile.php';"><i class="material-icons">account_circle</i></button>
    <button class="waves-effect waves-light btn orange" style="width: 31%; height: 10%;" type="submit" name="Submit" onclick="location.href='../status.php';"><i class="material-icons">shopping_cart</i></button>
    <button class="waves-effect waves-light btn" style="width: 31%; height: 10%;" type="submit" name="Submit" onclick="location.href='../buy.php';"><i class="material-icons">attach_money</i></button>
  </li>
   <?php 
            if (strcmp($_SESSION["STATUS"], "staff") == 0){
              echo '<li style="margin-left: 2%; margin-top: 3%;">';
              echo ' <button class="waves-effect waves-light btn green" style="width: 95.5%; height: 10%;" type="submit" name="Submit" onclick="location.href=';
              echo "'../product/admin_manage.php'";
              echo '"><i class="material-icons">settings</i></button>';
              echo '</li>';
            }
          ?>
    <li style="margin-left: 2%; margin-top: 3%; margin-bottom: 3%;">    
    <button class="waves-effect waves-light btn red" style="width: 95.5%; height: 10%;" type="submit" name="Submit" onclick="location.href='../logout.php';"><i class="material-icons">exit_to_app</i></button>
    </li>

</ul>
<!--ส่วนแถบด้านบน-->

<!-- computer Navbar-->
 <nav class="white " role="navigation">
    <div class="nav-wrapper container" style="color: black;">
      <a id="logo-container" href="../home.php" class="brand-logo"><img src="../pic/logo.png" width="150px" height="55px"></a>
      <ul class="right hide-on-med-and-down" style="font-family: 'Itim', cursive;">
        <li><a class="dropdown-button" data-constrainWidth="false" href="#!" data-activates="dropdown1"><img src="../member/imgDir/<?php echo $profileResult["Avatar"]; ?>" alt="" class="circle left" style="width: 30px;height: 30px; margin-top: 15%; margin-right: 2px;"><?php echo $_SESSION["UID"];?><i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>

<!-- mobile Nav-->
      <ul id="slide-out" class="side-nav" style="font-family: 'Itim', cursive; font-size: 1em;">
        <li><div class="userView" align="center">
        <div class="background">
          <img src="../member/imgDir/bg.jpeg" width="100%" height="100%">
        </div>
          <a><img class="circle" src="../member/imgDir/<?php echo $profileResult["Avatar"]; ?>" style="width: 100px;height: 100px"></a>
          <a><span class="white-text name"><?php echo $profileResult["Fname"]; ?>  <?php echo $profileResult["Lname"]; ?></span></a>
          <a href="#!email"><span class="white-text email"><?php echo $profileResult["email"]; ?></span></a>

        </div></li>
         <li id="new-menu"><a href="../home.php" style="<?php if(basename($_SERVER['PHP_SELF']) == "home.php"){echo "color:rgb(0, 18, 236);";}?>"><i class="material-icons left"">access_alarm</i>สินค้าใกล้หมดเวลา</a></li>
        <li><div class="divider"></div></li>
        <li id="technology-menu"><a href="../product/show.php?type=1" style="<?php if($_GET['type']=="1"){echo "color:rgb(0, 18, 236);";}?>"><i class="material-icons left">tv</i>อุปกรณ์อิเล็กทรอนิกส์</a></li>
        <li><div class="divider"></div></li>
        <li id="game-menu"><a href="../product/show.php?type=2" style="<?php if($_GET['type']=="2"){echo "color:rgb(0, 18, 236);";}?>"><i class="material-icons left">videogame_asset</i>ของเล่น</a></li>
        <li><div class="divider"></div></li>
        <li id="child-menu"><a href="../product/show.php?type=3" style="<?php if($_GET['type']=="3"){echo "color:rgb(0, 18, 236);";}?>"><i class="material-icons left">build</i>อุปกรณ์งานช่าง</a></li>
        <li><div class="divider"></div></li>
        <li id="travel-menu"><a href="../product/show.php?type=4" style="<?php if($_GET['type']=="4"){echo "color:rgb(0, 18, 236);";}?>"><i class="material-icons left">flight</i>การท่องเที่ยวและกีฬา</a></li>
        <li><div class="divider"></div></li>
        <li id="home-menu"><a href="../product/show.php?type=5" style="<?php if($_GET['type']=="5"){echo "color:rgb(0, 18, 236);";}?>"><i class="material-icons left">home</i>บ้านและสวน</a></li>
        <li><div class="divider"></div></li>
        <li style="margin-left: 5%; margin-top: 2%;">
            <button class="waves-effect waves-light btn" style="width: 30%; height: 10%;" type="submit" name="Submit"  onclick="location.href='../member/editProfile.php';"><i class="material-icons">account_circle</i></button>
            <button class="waves-effect waves-light btn orange" style="width: 30%; height: 10%;" type="submit" name="Submit" onclick="location.href='../status.php';"><i class="material-icons">shopping_cart</i></button>
            <button class="waves-effect waves-light btn red" style="width: 30%; height: 10%;" type="submit" name="Submit" onclick="location.href='../logout.php';"><i class="material-icons">exit_to_app</i></button>
          <?php 
            if (strcmp($_SESSION["STATUS"], "staff") == 0){
              echo ' <button class="waves-effect waves-light btn green" style="width: 93%; height: 10%; margin-top: 2%;" type="submit" name="Submit" onclick="location.href=';
              echo "'../product/admin_manage.php'";
              echo '"><i class="material-icons">settings</i></button>';
            }
          ?>
        </li>
        <li><div class="divider"></div></li>
      </ul>
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
<!--จบส่วนแถบด้านบน-->
<?php if(basename($_SERVER['PHP_SELF']) == "buy.php"){ echo "<!--";} ?>
<nav role="navigation" style="background-color:rgba(0, 0, 0, 0.2);">
<div class="nav-wrapper container fixed" style="color: black;">
  <ul class="left hide-on-med-and-down" style="font-family: 'Itim', cursive;">
          <li id="new-menu"><a href="../home.php" style="<?php if(basename($_SERVER['PHP_SELF']) == "home.php"){echo "color:rgb(0, 18, 236);";}?>"><i class="material-icons left"">access_alarm</i>ใกล้หมดเวลา</a></li>
          <li id="technology-menu"><a href="../product/show.php?type=1" style="<?php if($_GET['type']=="1"){echo "color:rgb(0, 18, 236);";}?>"><i class="material-icons left">tv</i>อุปกรณ์อิเล็กทรอนิกส์</a></li>
          <li id="game-menu"><a href="../product/show.php?type=2" style="<?php if($_GET['type']=="2"){echo "color:rgb(0, 18, 236);";}?>"><i class="material-icons left">videogame_asset</i>ของเล่น</a></li>
          <li id="child-menu"><a href="../product/show.php?type=3" style="<?php if($_GET['type']=="3"){echo "color:rgb(0, 18, 236);";}?>"><i class="material-icons left">build</i>อุปกรณ์งานช่าง</a></li>
          <li id="travel-menu"><a href="../product/show.php?type=4" style="<?php if($_GET['type']=="4"){echo "color:rgb(0, 18, 236);";}?>"><i class="material-icons left">flight</i>ท่องเที่ยวและกีฬา</a></li>
          <li id="home-menu"><a href="../product/show.php?type=5" style="<?php if($_GET['type']=="5"){echo "color:rgb(0, 18, 236);";}?>"><i class="material-icons left">home</i>บ้านและสวน</a></li>
  </ul>
</div>
</nav>
<?php if(basename($_SERVER['PHP_SELF']) == "buy.php"){ echo "-->";} ?>
<?php 
  if ($_GET["type"]) {
    echo '<div class="fixed-action-btn horizontal click-to-toggle">
    <a class="btn-floating btn-large sky button-collapse" href="#" data-activates="slide-out">
      <i class="material-icons">menu</i>
    </a>
  </div>';
  }
?>
</body>
