<?php

if (session_id() == '' || !isset($_SESSION)) {
    session_start();
}

include("connection.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$s = " SELECT * from user where email = '$email'";

$result = mysqli_query($conn, $s);

$num = mysqli_num_rows($result);

if ($num == 1) {
    echo " Account has already registered";
} else {
    $reg = "INSERT into user (name, email, password) values ('$name' , '$email' , '$password')";
    mysqli_query($conn, $reg);
    header("location:login.html");
}
