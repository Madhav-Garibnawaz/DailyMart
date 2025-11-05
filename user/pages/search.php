<?php
include('connect.php');
include('nav.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Results - DailyMart</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Poppins', sans-serif;
      padding-top: 110px; /* fix navbar overlap */
    }
    .search-header {
      text-align: center;
      margin-bottom: 30px;
    }
    .search-header h3 {
      font-weight: 600;
      color: #198754;
    }
    .product-card {
      border: none;
      border-radius: 20px;
      overflow: hidden;
      background: #fff;
      transition: all 0.3s ease;
    }
    .product-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }
    .product-card img {
      height: 200px;
      object-fit: cover;
      width: 100%;
    }
    .product-info {
      text-align: center;
      padding: 15px;
    }
    .product-info h5 {
      font-size: 1.05rem;
      margin-bottom: 8px;
      font-weight: 600;
    }
    .product-info p {
      color: #777;
      font-size: 0.9rem;
      height: 40px;
      overflow: hidden;
    }
    .price {
      color: #198754;
      font-weight: 600;
      margin-bottom: 10px;
    }
    .no-results {
      text-align: center;
      color: #777;
      margin: 80px 0;
    }
  </style>
</head>

<body>
<div class="container">
<?php
if (isset($_GET['q'])) {
    $search = mysqli_real_escape_string($con, $_GET['q']);
    echo "<div class='search-header'>
            <h3>Search Results for: <span class='text-dark'>" . htmlspecialchars($search) . "</span></h3>
          </div>";

    // ✅ Search both product and category names (case-insensitive)
    $query = "
        SELECT p.*, c.cname 
        FROM product_master p 
        LEFT JOIN category_master c ON p.cid = c.cid
        WHERE p.pname LIKE '%$search%' 
           OR p.pdesc LIKE '%$search%'
           OR c.cname LIKE '%$search%'
    ";

    $result = mysqli_query($con, $query);

    if (!$result) {
        echo "<div class='alert alert-danger text-center'>Query failed: " . mysqli_error($con) . "</div>";
    } elseif (mysqli_num_rows($result) > 0) {
        echo "<div class='row g-4'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='col-md-3 col-sm-6'>
              <div class='product-card'>
                <a href='product.php?x={$row['cid']}'><img src='../../admin1/pages/images/productImg/{$row['photo']}' alt='{$row['pname']}'></a>
                <div class='product-info'>
                  <h5>{$row['pname']}</h5>
                  <p>{$row['pdesc']}</p>
                  <div class='price'>₹ {$row['rate']}</div>
                  <a href='add_to_cart.php?pid={$row['pid']}&pname={$row['pname']}&pdesc={$row['pdesc']}&rate={$row['rate']}&photo={$row['photo']}' 
                     class='btn btn-outline-success btn-sm rounded-pill'>
                    <i class='bi bi-bag-plus me-1'></i> Add to Cart
                  </a>
                </div>
              </div>
            </div>
            ";
        }
        echo "</div>";
    } else {
        echo "<p class='no-results'><i class='bi bi-search'></i> No products found for <strong>" . htmlspecialchars($search) . "</strong></p>";
    }
}
?>
</div>

<?php include('footer.php'); ?>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>
