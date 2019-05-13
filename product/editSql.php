<?php
  $con = mysqli_connect("127.0.0.1","u328114597_dfk","s2NXIa7wS5zJ","u328114597_three") or die("Error Connect to Database");
  mysqli_query($con,"SET NAMES UTF8");
  $strSQL = "SELECT * FROM product  left join product_type on product.TNo=product_type.TID where PID = '".mysqli_real_escape_string($con,$_GET['pid'])."'";
  $objQuery = mysqli_query($con,$strSQL);
  $objResult = mysqli_fetch_array($objQuery);
  $name = $objResult["Name"];
  $detail = $objResult["Detail"];
  $imgName = $objResult["Photo"];
  $PID = $objResult["PID"];
  $type = $objResult["NType"];
  $brand = $objResult["Brand"];
  $cost = $objResult["Cost"];
  $date = $objResult["EDate"];
  $date = date("Y-m-d\TH:i:s", strtotime($date));
  $typeNo = $objResult["TNo"]
?>

  <br>
        <div class="container" style="width: 50%">
 <div class="row">
    <form class="col s12" name="form1" method="post" action="./update.php?id=<?php echo "$PID"; ?>" enctype="multipart/form-data">
    <div class="row">
        <div class="input-field col s12">
    <center><img src="../product/imgDir/<?php echo "$imgName"; ?>" style="width: 50%;height: 400px;"></center>
    <div class="file-field input-field">
      <div class="btn">
        <span>File</span>
        <input type="file" name="filUpload" id="filUpload">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="เพิ่มรูปภาพ">
      </div>
    </div>
        </div>
    </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="nameproduct" type="text" class="validate" name="nameproduct" value="<?php echo $name; ?>">
          <label for="nameproduct">ชื่อสินค้า</label>
        </div>
        <div class="input-field col s3">
          <input id="brand" type="text" class="validate" name="brand" value="<?php echo $brand; ?>">
          <label for="brand">Brand</label>
        </div>
        <div class="input-field col s3">
          <input id="cost" name="cost" type="number" class="validate" min="1" value="<?php echo $cost; ?>">
          <label for="cost">ราคาต้นทุน</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
        <label>วัน/เดือน/ปี เวลา ที่สิ้นสุดการประมูล</label><br>
        <?php 
          $nowdate = date("Y/m/d");
        ?>
        <input value="<?php echo "$date"; ?>" type="datetime-local" class="datepicker" id="dateproduct" name="dateproduct" min="<?php echo '$nowdate'?>">
        </div>
        <div class="input-field col s6">
        <br>
  <select class="browser-default" id="select_type" name="select_type" value="<?php echo $typeNo; ?>">
    <option value="<?php echo "$typeNo" ;?>"> <?php echo $type; ?> (ค่าปัจจุบัน)</option>
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
          <textarea id="icon_prefix2" class="materialize-textarea" name="detail"><?php echo $detail; ?></textarea>
          <label for="icon_prefix2">ข้อมูลสินค้า</label>
        </div>
      </div>
  </div>
<div class="row"><button class="btn waves-effect waves-light" type="submit" name="Submit">Sent</button></div>
</form>
        </div>