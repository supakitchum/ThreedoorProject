<?php
  session_start();
  if($_SESSION['UID'] == "")
  {
    echo"<script>window.location='../login.php';</script>";
    exit();
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Profile Editer - Threedoor</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../cssPa/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../cssPa/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<body style="background-color:#d2e1e2;">
<?php include '../navtab.php';?>
 <?php
  $con = mysqli_connect("127.0.0.1","u328114597_dfk","s2NXIa7wS5zJ","u328114597_three") or die("Error Connect to Database");
  mysqli_query($con,"SET NAMES UTF8");
  $strSQL = "SELECT * FROM member WHERE UID ='".mysqli_real_escape_string($con,$_SESSION["ID"])."'";
  $objQuery = mysqli_query($con,$strSQL);
  $objResult = mysqli_fetch_array($objQuery);
?>

  <br>
        <div class="container">
            <div class="card-panel hoverable">
 <div class="row">
    <form class="col s12" name="form1" method="post" action="update.php" enctype="multipart/form-data">
    <div class="row">
    <div class="col s12  m6">
    <!-- รูปสมาชิก -->
        <div class="input-field col s12">
    <center><img  id="blah" alt="your image" src="../member/imgDir/<?php echo $objResult["Avatar"]; ?>" style="width: 90%; height: 270px;"></center>
    <div class="file-field input-field">
      <div class="waves-effect waves-light btn">
        <span>File</span>
        <input type="file" name="filUpload" id="filUpload" onchange="readURL(this);" >
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="เพื่มรูปภาพ">
      </div>
    </div>
    </div>
    </div>

    <div class="col s12 m6">
    <br>
        <div class="input-field col s6">
          <input placeholder=" " id="fname" name="fname" type="text" required="required" pattern= "[a-zA-Zก-ฮะ-์]{1,}" title= "กรุณาอย่าใส่อักษรพิเศษ" class="validate" style="color: black" value="<?php echo $profileResult["Fname"]; ?>">
            <label for="fname">First Name:</label>
        </div>
        <div class="input-field col s6">
            <input placeholder=" " id="lastname" name="lastname" type="text" required="required" pattern= "[a-zA-Zก-ฮะ-์]{1,}" title= "กรุณาอย่าใส่อักษรพิเศษ" class="validate" style="color: black" value="<?php echo $profileResult["Lname"]; ?>">
          <label for="lastname">Last Name :</label>
        </div>
    </div>
    <div class="col s12 m6">
        <div class="input-field col s6">
          <input placeholder=" " id="email" name="email" type="email" required="required" class="validate" style="color: black" value="<?php echo $profileResult["email"]; ?>">
          <label for="email">E-mail :</label>
        </div>
        <div class="input-field col s6">
          <input placeholder=" " id="phone" name="phone" type="text" required="required" minlength="10" maxlength="10" pattern= "[0-9]{1,}" title= "กรุณากรอกจำนวนเงินเป็นตัวเลข 1-9 จำนวน 10 ตัว" class="validate" style="color: black" value="<?php echo $profileResult["Phonenumber"]; ?>">
          <label for="phone">Phone number :</label>
        </div>
    </div>
    <div class="col s12 m6">
        <div class="input-field col s12">
          <textarea id="address" name="address" class="materialize-textarea"><?php echo $profileResult["address"]; ?></textarea>
          <label for="address">Address :</label>
        </div>
        <button style="width: 100%;" type="submit" name="Submit" value="Submit" class="waves-effect waves-light btn">Submit</button>
        <br>
        <label ><center>เปลี่ยนรหัสผ่าน? คลิก</center></label>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
<?php include '../footer.php';?>
</body>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
</html>