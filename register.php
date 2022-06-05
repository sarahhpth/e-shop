<?php

session_start();

$con = mysqli_connect('localhost','root');

mysqli_select_db($con, 'database_pi');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$s = " select * from regist where name = '$name'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1) {
    echo" Username already taken";
}else{
    $reg = "insert into regist(name, email, password) values ('$name' , '$email' , '$password')";
    mysqli_query($con, $reg);
    header("location:login.html");
}

?>