<?php
$con = mysqli_connect("127.0.0.1","u328114597_dfk","s2NXIa7wS5zJ","u328114597_three") or die("Error Connect to Database");
mysqli_query($con,"SET NAMES UTF8");
$query = "SELECT * FROM `product`
ORDER BY `product`.`PID` ASC";
$outp="";
$result=mysqli_query($con,$query);
if (mysqli_num_rows($result)>0) {
    while ($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp !="") {$outp .= ",";}
            $outp .= '{"Pname":"' . $rs["Name"] . '",';
            $outp .= '"Pid":"' . $rs["PID"] . '",';
            $outp .= '"imgDir":"' . $rs["Photo"] .  '"}';
        }
        $outp = '{"records":['.$outp.']}';
        echo($outp);
    }
?>