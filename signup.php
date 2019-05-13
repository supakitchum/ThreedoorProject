<?php
  session_start();
  if($_SESSION['UID'])
  {
    header("location:home.php");
  }
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- style by myself -->
    <link type="text/css" rel="stylesheet" href="./css/style.css"  media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="./css/stylelogin.css">
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="./css/materialize.min.css"  media="screen,projection"/>
     <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<body class="login">
     <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="./js/materialize.min.js"></script>
    <div id="section">
        <center><img src="./pic/logo.png" width="70%" height="125px"></center><br>
        <form name="form1" method="post" action="./sql_reg.php">
        <div class="col">
        <div class="input-field col s6">
            <input placeholder=" " id="username" name="username" type="text" required="required" pattern= "[A-Za-z0-9]{1,}" title= "กรอกได้เฉพาะ a-z,A-Z และ 0-9" class="validate" style="color: black">
            <label for="username">USERNAME</label>
            <div class="input-field col s6">
            <input placeholder=" " id="password" name="password" type="password" required="required" pattern= "[a-zA-Z0-9]{1,}" title= "กรอกได้เฉพาะ a-z,A-Z และ 0-9" class="validate" style="color: black">
             <label for="password">PASSWORD</label>
            </div>
            <div class="input-field col s6">
            <input placeholder=" " id="repass" name="repass" type="password" required="required" class="validate" style="color: black">
            <label for="repass">CONFIRM PASSWORD</label>
            </div>
            <div class="input-field col s6">
            <input placeholder=" " id="surname" name="surname" type="text" required="required" pattern= "[a-zA-Zก-ฮะ-์0-9]{1,}" title= "กรุณาอย่าใส่อักษรพิเศษ" class="validate" style="color: black">
            <label for="surname">FIRST NAME</label>
            </div>
            <div class="input-field col s6">
            <input placeholder=" " id="lastname" name="lastname" type="text" required="required" pattern= "[a-zA-Zก-ฮะ-์0-9]{1,}" title= "กรุณาอย่าใส่อักษรพิเศษ" class="validate" style="color: black">
            <label for="lastname">LAST NAME</label>
            </div>
            <div class="input-field col s6">
            <input placeholder=" " id="phone" name="phone" type="text" required="required" minlength="9" maxlength="10" pattern= "[0-9]{1,}" title= "กรุณากรอกจำนวนเงินเป็นตัวเลข 1-9 จำนวน 9-10 หลัก" class="validate" style="color: black">
            <label for="lastname">Phone</label>
            </div>
            <div class="input-field col s6">
            <input placeholder=" " id="email" name="email" type="email" class="validate" style="color: black">
            <label for="lastname">E-mail</label>
            </div>
            <div class="input-field col s6">
            <input placeholder=" " id="address" name="address" type="text" required="required"  class="validate" style="color: black">
            <label for="lastname">Address</label>
            </div>
        </div>
        </div>
        <div class="button">
         <button style="width: 100%;" type="submit" name="Submit" value="Submit" class="waves-effect waves-light btn">Submit</button><br><center>Already have an account? <a href="./login.php">Log in</a></center>
        </div>
        </form>
    </div>
</body>