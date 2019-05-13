<?php
$con = mysqli_connect("127.0.0.1","u328114597_dfk","s2NXIa7wS5zJ","u328114597_three") or die("Error Connect to Database");
if (trim($_GET['username'] == '-all')) {
    $query = "select * from member";
}
else
{
    $query = "select * from member where username = '".mysqli_real_escape_string($con,$_GET['username'])."'";
}
$outp="";
$result=mysqli_query($con,$query);
if (mysqli_num_rows($result)>0) {
    while ($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp !="") {$outp .= ",";}
            $outp .= '{"fname":"' . $rs["Fname"] . '",';
            $outp .= '"id":"' . $rs["UID"] . '",';
            $outp .= '"lname":"' . $rs["Lname"] . '",';
            $outp .= '"username":"' . $rs["username"] . '",';
            $outp .= '"status":"' . $rs["status"] . '"}';
        }
        $outp = '{"records":['.$outp.']}';
        echo($outp);
    }
?>