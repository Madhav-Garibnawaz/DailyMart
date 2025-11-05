<?php
include('connect.php');
include('nav.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Categories - DailyMart</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    /* Sticky Navbar */
    .navbar.fixed-top {
      position: fixed !important;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1030 !important;
      background-color: #fff !important;
    }

    body {
      padding-top: 100px !important;
      background-color: #f8f9fa;
      font-family: 'Poppins', sans-serif;
    }

    /* Banner Section */
    .page-header {
      position: relative;
      background: url('images/banner.jpg') center/cover no-repeat;
      height: 320px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      text-align: center;
      border-radius: 0;
    }

    .page-header::before {
      content: "";
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0, 0, 0, 0.4);
    }

    .page-header h1, .page-header p {
      position: relative;
      z-index: 2;
    }

    .page-header h1 {
      font-size: 3rem;
      font-weight: 700;
    }

    .page-header p {
      font-size: 1.2rem;
      color: #f0f0f0;
    }

    /* Category Cards */
    .category-card {
      border: none;
      border-radius: 20px;
      background: #fff;
      transition: all 0.3s ease;
    }

    .category-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .category-card img {
      border-radius: 15px;
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .category-name {
      font-size: 1.1rem;
      font-weight: 600;
      color: #333;
      margin-top: 10px;
      text-align: center;
    }

    /* Back to Top Button */
    .back-to-top {
      position: fixed;
      bottom: 25px;
      right: 25px;
      display: none;
      z-index: 999;
      background-color: #198754;
      color: white;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .back-to-top:hover {
      background-color: #157347;
      color: #fff;
    }
  </style>
</head>

<body>

  <!-- Banner -->
  <div class="page-header">
    <div>
      <h1>All Categories</h1>
      <p>Explore our full range of fresh and quality products</p>
    </div>
  </div>

  <!-- Categories Grid -->
  <div class="container my-5">
    <div class="row g-4">
      <?php
      $q = mysqli_query($con, "SELECT * FROM category_master");
      while ($row = mysqli_fetch_array($q)) {
      ?>
        <div class="col-md-3 col-sm-6">
          <div class="card category-card shadow-sm">
            <a href="product.php?x=<?php echo $row[0]; ?>" class="text-decoration-none">
              <img src="../../admin1/pages/images/<?php echo $row['photo']; ?>" alt="<?php echo $row['cname']; ?>">
              <div class="card-body text-center">
                <p class="category-name"><?php echo $row['cname']; ?></p>
              </div>
            </a>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>

  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
    <i class="bi bi-arrow-up"></i>
  </a>

  

  <!-- Footer -->
  <?php include('footer.php'); ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Back to Top Script -->
  <script>
    const backToTop = document.querySelector('.back-to-top');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 300) {
        backToTop.style.display = 'block';
      } else {
        backToTop.style.display = 'none';
      }
    });
  </script>
</body>
</html>
