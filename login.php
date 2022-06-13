<?php
// if (session_id() == '' || !isset($_SESSION)) {
//     session_start();
// }

include("connection.php");

$email = $_POST["email"];
$password = $_POST["password"];

$query_sql = "SELECT * FROM user 
                        WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $query_sql);
$obj = $result->fetch_object();
// obj = selected user

if (mysqli_num_rows($result) > 0) {
    //print_r($obj);
    $token = "<script>document.write(localStorage.getItem('token'));</script>";
    // buat Session
    session_start();
    $_SESSION["user"] = $obj;
    $_SESSION['email'] = $email;
    $_SESSION['id'] = $obj->id;

    header("location:index2.php");
} else {
    echo "kok disini";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="register.html" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log In</h2>
                        <form action="login.php" method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="email" placeholder="Email" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" />
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="submit" class="form-submit" />
                            </div>

                            <a href="index.html">Back</a>

                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>




    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/login.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->



</html>