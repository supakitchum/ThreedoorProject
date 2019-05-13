<?php
$con = mysqli_connect("localhost","root","","threedoor","member");
$data=json_decode(file_get_contents("php://input"));
if (count($data)>0) {
    $fname=mysqli_real_escape_string($con,$data->fName);
    $lname=mysqli_real_escape_string($con,$data->lName);
    $uid=mysqli_real_escape_string($con,$data->username);
    $pwd=mysqli_real_escape_string($con,$data->password);
        if ($_POST['password'] == $_POST['repass']) {

            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',username))
            {
               echo"<script>alert('กรุณาอย่าใช้อักษรพิเศษใน Username');window.location='signup.php';</script>";
            }
            elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', lName) {
                echo"<script>alert('กรุณาอย่าใช้อักษรพิเศษใน FIRSTNAME');window.location='signup.php';</script>";
            }
            elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', fName) {
                echo"<script>alert('กรุณาอย่าใช้อักษรพิเศษใน LASTNAME');window.location='signup.php';</script>";
            }
            elseif(username == NULL || password == NULL){
                echo"<script>alert('กรุณาป้อนชื่อและนามสกุล');window.location='signup.php';</script>";
            }
            else{    
                $query="insert into tbuser(username,password,fname,lname) values('$uid','$pwd','$fname','$lname')";
                echo"<script>alert('Success!!');window.location='login.php';</script>"; 
                mysql_close();
            }
        }
        else
        {
            echo"<script>alert('Check your confrim password');window.location='signup.php';</script>";
            exit();

        }
    if (mysqli_query($con,$query)) {
        echo "Data Inserted";
    } else{
        echo "Error";
    }
}
?>