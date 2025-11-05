<?php
include('connect.php');
session_start();

// Check if user is logged in
if (!isset($_SESSION['uid'])) {
    header('location:login.php');
    exit;
}

$uid = $_SESSION['uid'];
$pid = $_GET['pid'];
$pname = $_GET['pname'];
$pdesc = $_GET['pdesc'];
$rate = $_GET['rate'];
$photo = $_GET['photo'];

// ✅ Step 1: Check if the product already exists for this user in cart
$check = mysqli_query($con, "SELECT * FROM order_master WHERE uid=$uid AND pid=$pid");

if (mysqli_num_rows($check) > 0) {
    // ✅ Step 2: Product already exists → update quantity
    $update = mysqli_query($con, "UPDATE order_master SET qty = qty + 1 WHERE uid=$uid AND pid=$pid");
    $q = $update; // for showing success alert
} else {
    // ✅ Step 3: Product not in cart → insert new record with qty = 1
    $insert = mysqli_query($con, "INSERT INTO order_master (uid, pid, pname, pdesc, rate, photo, qty) 
                                  VALUES ($uid, $pid, '$pname', '$pdesc', $rate, '$photo', 1)");
    $q = $insert;
}
?>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<script>
    <?php if ($q) { ?>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: 'Item added to cart',
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true
        }).then(() => {
            window.location.href = 'product.php';
        });
    <?php } else { ?>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: 'Product not added to cart',
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true
        }).then(() => {
            window.location.href = 'product.php';
        });
    <?php } ?>
</script>
</body>
</html>
