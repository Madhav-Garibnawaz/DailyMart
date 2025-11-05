<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<?php
    include("hhh.php");
?>


  <style>
    body {
      background-color: #f8f9fa;
    }
    .dashboard-card {
      border-radius: 20px;
      padding: 30px;
      text-align: center;
      box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
      transition: transform 0.2s ease-in-out;
    }
    .dashboard-card:hover {
      transform: translateY(-5px);
      cursor: pointer;
    }
    .dashboard-card h5 {
      font-weight: 600;
      color: #495057;
    }
    .dashboard-card .count {
      font-size: 2.2rem;
      font-weight: 700;
      margin-top: 10px;
    }
    .categories { background: #e7f1ff; color: #0d6efd; }
    .products   { background: #e9fce7; color: #198754; }
    .users      { background: #f3e8ff; color: #6f42c1; }
    .orders     { background: #ffe8e8; color: #dc3545; }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="row g-4">
      
    <?php
        include('connect.php');

        // Categories
        $cat = mysqli_query($con, "select count(*) as total from category_master");
        $cat_row = mysqli_fetch_assoc($cat);
        $total_categories = $cat_row['total'];

        // Products
        $prod = mysqli_query($con, "select count(*) as total from product_master");
        $prod_row = mysqli_fetch_assoc($prod);
        $total_products = $prod_row['total'];

        // Users
        $user = mysqli_query($con, "select count(*) as total from user_master");
        $user_row = mysqli_fetch_assoc($user);
        $total_users = $user_row['total'];

        // Orders
        $order = mysqli_query($con, "select count(*) as total from order_master");
        $order_row = mysqli_fetch_assoc($order);
        $total_orders = $order_row['total'];

    ?>

      <!-- Categories -->
      <div class="col-md-3 col-sm-6">
        <div class="dashboard-card categories" onclick="window.location.href='view.php'">
          <h5>Total Categories</h5>
          <div class="count"><?php echo $total_categories; ?></div>
        </div>
      </div>

      <!-- <div class="col-md-3 col-sm-6">
        <a href="view.php" style="text-decoration: none; color: inherit;">
          <div class="dashboard-card categories">
            <h5>Total Categories</h5>
            <div class="count"><?php echo $total_categories; ?></div>
          </div>
        </a>
      </div> -->

      <!-- <div class="col-md-3 col-sm-6">
        <div class="dashboard-card categories" onclick="window.location.href='view.php'" style="cursor: pointer;">
          <h5>Total Categories</h5>
          <div class="count"><?php echo $total_categories; ?></div>
        </div>
      </div> -->


      <!-- Products -->
      <div class="col-md-3 col-sm-6">
        <div class="dashboard-card products" onclick="window.location.href='product_view.php'">
          <h5>Total Products</h5>
          <div class="count"><?php echo $total_products; ?></div>
        </div>
      </div>

      <!-- Users -->
      <div class="col-md-3 col-sm-6">
        <div class="dashboard-card users" onclick="window.location.href='users.php'">
          <h5>Total Users</h5>
          <div class="count"><?php echo $total_users; ?></div>
        </div>
      </div>

      <!-- Orders -->
      <div class="col-md-3 col-sm-6">
        <div class="dashboard-card orders" onclick="window.location.href='orders.php'">
          <h5>Total Orders</h5>
          <div class="count"><?php echo $total_orders; ?></div>
        </div>
      </div>

    </div>
  </div>
</body>
</html>

<?php
    include("fff.php");
?>