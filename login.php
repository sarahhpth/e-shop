<?php
session_start();

$conn = mysqli_connect('localhost','root');

mysqli_select_db($conn, 'database_pi');

$name = $_POST["name"];
$password = $_POST["password"];

$query_sql = "SELECT * FROM regist 
                        WHERE name = '$name' AND password = '$password'";

$result = mysqli_query($conn, $query_sql);

if(mysqli_num_rows($result) > 0){
    header("location:index2.html");
}else{
      echo "<h2>Username atau Password Salah!</h2>";
}
?>