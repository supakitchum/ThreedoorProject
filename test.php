<?php
$servername = "127.0.0.1";
$username = "u328114597_dfk";
$password = "s2NXIa7wS5zJ";
$dbname = "u328114597_three";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT username, password FROM test";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "username: " . $row["username"]. " - password: " . $row["password"]. " ";
    }
} else {
    echo "0 results";
}
$conn->close();
?>