<?php
  session_start();
  if($_SESSION['UID'])
  {
    header("location:home.php");
  }
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8" />
    <!-- style by myself -->
     <link rel="stylesheet" type="text/css" href="./css/style.css">
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="./css/materialize.min.css"  media="screen,projection"/>
     <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
     <link rel="stylesheet" type="text/css" href="./css/stylelogin.css">
<body class="Login">
     <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="./js/materialize.min.js"></script>
        <!-- Grey navigation panel -->
    <div id="section">
        <!-- Teal page content  -->

                <div class="row">
                    <center><img src="./pic/logo.png" width="70%" height="125px"></center>
                </div>
        <form name="form1" method="post" action="./sql_login.php">
                <div class="row">
                    <div class="input-field" style="width:100%;float:left;">
                        <input type='text' name='txtUsername' required="required" id='txtUsername' class="validate" style="color: black">
                        <label for="username">Username</label>
                    </div>
                </div>
                <div class="row"> 
                    <div class="input-field" style="width:100%;float:left;">
                        <input type='password' name='txtPassword' required="required" id='txtPassword' class="validate" maxlength="20" style="color: black">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="button">
                    <button style ="width: 100%;" class="btn waves-effect waves-light" type="submit" name="Submit">Submit</button><br>
                    <center>Don't have an account? <a href="./signup.php">Sign Up</a></center>
                </div>
                </form>
    </div>
</body>

