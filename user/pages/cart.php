<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  if(!isset($_SESSION['uid'])){
    header("Location: login.php");
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Cart - Grocery Mart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"> -->
  <link href="css/style.css" rel="stylesheet">
  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      background-color: #f8f9fa;
      /* padding-top: 20px; */
      /* font-family: Arial, 'Poppins', sans-serif;; */
      font-family: Arial;
    }
    /* .cart-page .navbar {
        background-color: #fff !important;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .cart-page .top-bar {
        display: none;
    } */
    .cart-item {
      border-radius: 12px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.08);
      background: #fff;
      padding: 15px;
      margin-bottom: 15px;
    }
    .cart-summary {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.08);
      padding: 20px;
    }
    /* .qty-input {
      width: 70px;
      text-align: center;
    } */
    .qty-input {
      /* width: 70px;   force fixed width */
      max-width: 200px;
      text-align: center;
      display: inline-block;
    }
    .btn-checkout {
      border-radius: 30px;
      font-size: 16px;
    }
    .rounded {
        height: 200px;
        width: 200px;
    }
    /* .cart-page .top-bar.scrolled {
      height: 0;
      opacity: 0;
      overflow: hidden;
    } */

    /* Initial state: transparent navbar */
    .cart-page .fixed-top {
        background-color: transparent;
        transition: background-color 0.3s, box-shadow 0.3s;
    }

    /* Scrolled state */
    .cart-page .fixed-top.scrolled {
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    /* Top-bar transition */
    .cart-page .top-bar {
        height: 45px;
        transition: height 0.3s, opacity 0.3s;
    }

    /* Hide top-bar when scrolled */
    .cart-page .top-bar.scrolled {
        height: 0;
        opacity: 0;
        overflow: hidden;
    }
  </style>
</head>
<body class="cart-page">
  <?php include('nav.php'); ?>
  <!-- <br> -->
  <div style="height:20px"></div>
  <div class="container py-5 mt-5">
    <!-- <h2 class="mb-4 text-center">🛒 Your Shopping Cart</h2> -->
    <h2 class="mb-4 text-center">Your Grocery Basket</h2>

    <div class="row">
      <!-- Cart Items -->
      <div class="col-lg-8">
       <?php
        include('connect.php');        
          $uid=$_SESSION['uid'];
          $q = mysqli_query($con,"select * from order_master where uid=$uid");
          $qu = isset($_GET['qty']) ? $_GET['qty'] : 1;
        while($row = mysqli_fetch_array($q))
        {
       ?>
        <!-- Example Cart Item -->
        <div class="cart-item d-flex align-items-center">
          <img src="../../admin1/pages/images/productImg/<?php echo $row['photo'];?>" alt='' class="rounded me-3" alt="product">                                     
          <div class="flex-grow-1">
            <h6 class="mb-1"><?php echo $row['pname'];?></h6>
            <small class="text-muted"><?php echo $row['pdesc'];?></small>
            <div class="d-flex align-items-center mt-2">
              <span class="me-3">₹<span class="price"><?php echo $row['rate'];?></span></span>
              <!-- <input type="number" name="qty" class="form-control form-control-sm qty-input" value="1" min="1"> -->
               <input type="number" name="qty" class="form-control form-control-sm qty-input" value="<?php echo $row['qty']; ?>" min="1">
              <!-- <span class="ms-3">= ₹<span class="item-total"><?php $qu * $row['rate'];?></span></span> -->
               <!-- <span class="ms-3">= ₹<span class="item-total"><?php echo $qu * $row['rate']; ?></span></span> -->
                <span class="ms-3">= ₹<span class="item-total"><?php echo $row['qty'] * $row['rate']; ?></span></span>
            </div>
          </div>

          <!-- <button class="btn btn-sm btn-outline-danger ms-3 remove-btn" onclick="window.location.href='cart_prod_delete.php'">
            <i class="bi bi-trash" href='cart_prod_delete.php'></i>
          </button> -->
          
          <!-- <a href="cart_prod_delete.php?pid=" 
            class="btn btn-sm btn-outline-danger ms-3"
            onclick="return confirm('Remove this product from cart?');">
            <i class="bi bi-trash"></i>
          </a> -->

          <a href="cart_prod_delete.php?pid=<?php echo $row['pid']; ?>" 
            class="btn btn-sm btn-outline-danger ms-3"
            onclick="return confirmAlert(this.href)">
            <i class="bi bi-trash"></i>
          </a>

        </div>
        <?php
          }
        ?>
      </div>

      <!-- Cart Summary -->
      <div class="col-lg-4">
        <div class="cart-summary">
          <h5 class="mb-3">Cart Summary</h5>
          <div class="d-flex justify-content-between mb-2">
            <span>Subtotal</span>
            <span>₹<span id="subtotal"></span></span>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span>Delivery</span>
            <span>₹<span id="delivery">40</span></span>
          </div>
          <div class="d-flex justify-content-between mb-3">
            <strong>Total</strong>
            <strong>₹<span id="grandtotal"></span></strong>
          </div>
          <form method="post">
            <button class="btn btn-success w-100 btn-checkout" name="btncheckout" >Proceed to Checkout</button>
          </form>
        </div>
        
        <!-- Browse More Products button -->
        <div class="mt-3 text-center">
            <a href="product.php" class="btn btn-outline-primary w-100">
                ← Browse More Products
            </a>
        </div>

      </div>
    </div>
  </div>

  <script>
    function updateTotals() {
      let subtotal = 0;
      document.querySelectorAll(".cart-item").forEach(item => {
        const price = parseFloat(item.querySelector(".price").innerText);
        const qty = parseInt(item.querySelector(".qty-input").value);
        const itemTotal = price * qty;
        item.querySelector(".item-total").innerText = itemTotal;
        subtotal += itemTotal;
      });
      document.getElementById("subtotal").innerText = subtotal;
      const delivery = parseFloat(document.getElementById("delivery").innerText);
      document.getElementById("grandtotal").innerText = subtotal + delivery;
    }

    // Quantity change
    document.querySelectorAll(".qty-input").forEach(input => {
      input.addEventListener("input", updateTotals);
    });

    // Remove item
    document.querySelectorAll(".remove-btn").forEach(btn => {
      btn.addEventListener("click", function() {
        this.closest(".cart-item").remove();
        updateTotals();
      });
    });

    // Initial calc
    updateTotals();
  </script>
  <script src="js/main.js"></script>
  <script>
    document.addEventListener('scroll', function() {
      const navbar = document.querySelector('.fixed-top');
      const topBar = document.querySelector('.top-bar');
      if(window.scrollY > 50){
          navbar.classList.add('scrolled');
          topBar.classList.add('scrolled');
      } else {
          navbar.classList.remove('scrolled');
          topBar.classList.remove('scrolled');
      }
    });
  </script>
   <?php
    // SweetAlert2 on Checkout
    if(isset($_POST['btncheckout'])){
        echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Your order has been placed successfully.',
                icon: 'success',
                confirmButtonText: 'Continue Shopping'
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = 'product.php';
                }
            });
        </script>";
    }
  ?>

    <script>
      function confirmAlert(url) {
        Swal.fire({
          title: 'Are you sure?',
          text: "You want to remove this item from cart?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, remove it!',
          cancelButtonText: 'No, keep it'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = url;
          }
        });
        return false; // prevent normal link
      }
    </script>
</body>
</html>
