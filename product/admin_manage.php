<?php
  session_start();
  if(strcmp($_SESSION['STATUS'],"user") == 0)
  {
    echo"<script>window.location='../home.php';</script>";
    exit();
  }
?>

<html>
  <head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <title>Admin</title>
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
<body>
 <nav class="nav-extended" style="background-color: #26a69a;">
    <div class="nav-wrapper container">
      <a id="logo-container" href="../home.php" class="brand-logo"><img src="../pic/logo.png" width="150px" height="55px"></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down" style="font-family: 'Itim', cursive;">
        <li><a href="../status.php"><i class="material-icons">closed_caption</i></a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
      </ul>
    </div>
    <div class="nav-content container">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a class = "active" href="#test1">แก้ไขสถานะ User</a></li>
        <li class="tab"><a href="#test2">เพิ่มสินค้า</a></li>
        <li class="tab"><a href="#test3">แก้ไขสินค้า</a></li>
        <li class="tab"><a href="#edit">Editer</a></li>
      </ul>
    </div>
  </nav>
  <div id="test1" class="col s12">
<div class="container">
    <div ng-app="myApp" ng-controller="userController" ng-init="displayData()">
    <br>
    <br>
    <div class="row">
        <div class="input-field col s6"><i class="material-icons prefix">account_circle</i>
      <input  type="text" name="username" ng-model="username" class="validate" required="required">
      <label for="username">Username (ดูทั้งหมดพิม -all)</label><br><button class="btn waves-effect waves-light" type="submit" style="width: 100%;" ng-click="displayData()">ค้นหา</button><br><br>
      </div>

    </div>
    <br>
    <table class="bordered">
        <tr>
        <th>ID</th>
        <th>Username</th>
        <th>FristName</th>
        <th>LastName</th>
        <th>Status</th>
        <th></th>
        </tr>

        <tr ng-repeat="x in names">
            <td>{{x.id}}</td>
            <td>{{x.username}}</td>
            <td>{{x.fname}}</td>
            <td>{{x.lname}}</td>
            <td>{{x.status}}</td>
            <td>
            <a class="btn waves-effect waves-light" href="statusSql.php?status=staff&uid={{x.id}}">STAFF</a>&nbsp;<a class="btn waves-effect waves-light" href="statusSql.php?status=user&uid={{x.id}}">USER</a>
            </td>
        </tr>
    </table>
    </div>
    </div>

  </div>
  <div id="test2" class="col s12">
  <br>
        <div class="container" style="width: 50%">
 <div class="row">
    <form class="col s12" name="form1" method="post" action="./upload.php" enctype="multipart/form-data">
        <center><img  id="blah" alt="your image" src="../product/imgDir/<?php echo $objResult["Avatar"]; ?>" style="width: 50%;height: 400px;"></center>
    <div class="row">
        <div class="input-field col s12">
    <div class="file-field input-field">
      <div class="btn">
        <span>File</span>
        <input type="file" name="filUpload" id="filUpload" onchange="readURL(this);">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" required="required" placeholder="เพื่มรูปภาพ" required="required">
      </div>
    </div>
        </div>
    </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="nameproduct" type="text" class="validate" required="required" name="nameproduct" pattern= "[a-zA-Zก-ฮะ-์0-9 ]{1,}" title= "กรุณาอย่าใส่อักษรพิเศษ">
          <label for="nameproduct">ชื่อสินค้า</label>
        </div>
        <div class="input-field col s3">
          <input id="brand" type="text" class="validate" name="brand" required="required" pattern= "[a-zA-Zก-ฮะ-์0-9]{1,}" title= "กรุณาอย่าใส่อักษรพิเศษ">
          <label for="brand">Brand</label>
        </div>
        <div class="input-field col s3">
          <input id="cost" name="cost" type="number" class="validate" min="1" required="required">
          <label for="cost">ราคาต้นทุน</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
        <label>วัน/เดือน/ปี เวลา ที่สิ้นสุดการประมูล</label><br>
        <input type="datetime-local" class="datepicker" required="required" id="dateproduct" name="dateproduct" min="2017-04-20T00:00:00">
        </div>
        <div class="input-field col s6">
        <br>
  <select class="browser-default" id="select_type" name="select_type">
    <option value="" disabled selected>เลือกประเภทสินค้า</option>
    <option value="1">อุปกรณ์อิเล็กทรอนิกส์</option>
    <option value="2">ของเล่น</option>
    <option value="3">อุปกรณ์งานช่าง</option>
    <option value="4">การท่องเที่ยวและกีฬา</option>
    <option value="5">บ้านและสวน</option>
  </select>
        </div>
      </div>
      <div class="row">
                <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <textarea id="icon_prefix2" class="materialize-textarea" name="detail" cols="50" rows="5"></textarea>
          <label for="icon_prefix2">ข้อมูลสินค้า</label>
        </div>
      </div>
  </div>
<div class="row"><button class="btn waves-effect waves-light" type="submit" name="Submit">Sent</button></div>
</form>
        </div>
  </div>

<div id="test3" class="col s12">
<iframe src="editPanel.php" scrolling="auto" style="width: 100%; height: 70%; margin: 0;"></iframe>
</div>

<div id="edit" class="col s12">
<?php include 'editSql.php'; ?>
</div>

<!--Upload File End-->
</body>
<script src ="sqlSignup.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
</html>