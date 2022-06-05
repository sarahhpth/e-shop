<?php
if (session_id() == '' || !isset($_SESSION)) {
    session_start();
}

include("connection.php");

$email = $_POST["email"];
$password = $_POST["password"];

$query_sql = "SELECT * FROM user 
                        WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $query_sql);
$obj = $result->fetch_object();

if (mysqli_num_rows($result) > 0) {
    print_r($obj);

    $_SESSION['email'] = $email;
    $_SESSION['id'] = $obj->id;

    header("location:index2.php");
} else {
    header("location: login.html");
}
