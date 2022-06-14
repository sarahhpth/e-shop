<?php
if (session_id() == '' || !isset($_SESSION)) {
    session_start();
}

include("connection.php");
$id_barang = $_GET['id_barang'];
$sql = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
$result = $conn->query($sql);
$product = mysqli_fetch_assoc($result);

$nama_barang = $product['nama_barang'];
$gambar = $product['gambar'];
$harga = $product['harga'];
$quantity = $_POST['quantity'];
$total_harga = $harga * $quantity;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>E-SHOP - Checkout</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    <!-- Favicon  -->
    <link rel="icon" href="images/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="css/cartstyle.css">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">

    <!--
Tooplate 2114 Pixie
https://www.tooplate.com/view/2114-pixie
-->
</head>

<body>

    <!-- Pre Header -->
    <div id="pre-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span>Belanja mudah dan menyenangkan dengan E-Shop</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="assets/images/image2.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.html">Profile</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="topup.html">Top_Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transfer.html">Transfer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="history.html">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <!-- ****** Checkout Area Start ****** -->
    <div class="checkout-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h1>Check Out</h1>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="checkout_details_area mt-50 clearfix">
                        <?php
                        // $id_barang = $_GET['id_barang'];
                        // $sql = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
                        // $result = $conn->query($sql);
                        // $product = mysqli_fetch_assoc($result);

                        // $nama_barang = $product['nama_barang'];
                        // $gambar = $product['gambar'];
                        // $harga = $product['harga'];
                        // $quantity = $_POST['quantity'];
                        // $total_harga = $harga * $quantity;

                        $sql2 = "INSERT INTO transaksi (nama_barang, harga, quantity, total_harga) values('$nama_barang', '$harga', '$quantity', '$total_harga')";
                        $result2 = $conn->query($sql2);

                        ?>
                        <img src="<?= $gambar ?>">

                    </div>
                </div>

                <div class="col-12 col-md-8">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p><?= $nama_barang ?></p>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li><span>Price</span> <span>Rp<?= $harga ?></span></li>
                            <li><span>Quantity</span> <span><?= $quantity ?></span></li>
                            <li><span>Total</span> <span>Rp<?= $total_harga ?></span></li>
                        </ul>


                        <div id="accordion" role="tablist" class="mb-4">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <form action="/action_page.php">

                                        <div class="cart-page-heading">
                                            <p>Choose a payment method:
                                            <p>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="a" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    A
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="b">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    B
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="c">
                                                <label class="form-check-label" for="exampleRadios3">
                                                    C
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="d">
                                                <label class="form-check-label" for="exampleRadios4">
                                                    D
                                                </label>
                                            </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <a href="#" class="btn karl-checkout-btn">Place Order</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ****** Checkout Area End ****** -->



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>


    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t) { //declaring the array outside of the
            if (!cleared[t.id]) { // function makes it static and global
                cleared[t.id] = 1; // you could use true and false, but that's more typing
                t.value = ''; // with more chance of typos
                t.style.color = '#fff';
            }
        }
    </script>


</body>

</html>