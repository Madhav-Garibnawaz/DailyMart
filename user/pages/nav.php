<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

<style>
 .user-dropdown {
  position: relative;
  display: inline-block;
}

.user-dropdown-content {
  display: none;
  position: absolute;
  top: 120%; /* directly below the icon */
  left: 50%; /* center relative to icon */
  transform: translateX(-50%);
  min-width: 200px;
  background-color: #fff;
  box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
  border-radius: 6px;
  padding: 12px 0;
  z-index: 1050;
  border: 1px solid #e9ecef;
}

/* Show on hover */
.user-dropdown:hover .user-dropdown-content {
  display: block;
}

/* Show on click toggle */
.user-dropdown.show .user-dropdown-content {
  display: block;
}

.user-info {
  padding: 8px 16px;
  border-bottom: 1px solid #e9ecef;
  text-align: center;
}

.user-uname {
  color: #6c757d;
  font-size: 14px;
  margin: 0;
}
.user-email {
  color: #6c757d;
  font-size: 14px;
  margin: 0;
}

.logout-link {
  display: block;
  padding: 8px 16px;
  color: #dc3545;
  font-size: 14px;
  text-decoration: none;
  text-align: center;
}

.logout-link:hover {
  background-color: #f8f9fa;
}

.login-link {
  display: block;
  padding: 8px 16px;
  color: #28a745; /* green */
  font-size: 14px;
  text-decoration: none;
  text-align: center;
}

.login-link:hover {
  background-color: #f8f9fa;
}


.search-box {
  opacity: 0;
  transform: translateY(-10px);
}
.search-box.show {
  display: flex !important;
  opacity: 1;
  transform: translateY(0);
}
.search-box input::placeholder {
  color: #999;
}

</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const userDropdown = document.querySelector(".user-dropdown");
  const userIcon = userDropdown.querySelector("a");

  // Toggle on click
  userIcon.addEventListener("click", function(e) {
    e.preventDefault();
    userDropdown.classList.toggle("show");
  });

  // Close dropdown when clicking outside
  document.addEventListener("click", function(e) {
    if (!userDropdown.contains(e.target)) {
      userDropdown.classList.remove("show");
    }
  });


  // Toggle search box
  // const searchIcon = document.querySelector(".fa-search").parentElement;
  // const searchBox = document.getElementById("searchBox");

  // searchIcon.addEventListener("click", function(e) {
  //   e.preventDefault();
  //   searchBox.style.display = (searchBox.style.display === "none" || searchBox.style.display === "") ? "block" : "none";
  // });

  // // Close search box when clicking outside
  // document.addEventListener("click", function(e) {
  //   if (!searchBox.contains(e.target) && !searchIcon.contains(e.target)) {
  //     searchBox.style.display = "none";
  //   }
  // });

  // Professional search box toggle
const searchIcon = document.querySelector(".fa-search").parentElement;
const searchBox = document.getElementById("searchBox");

searchIcon.addEventListener("click", function(e) {
  e.preventDefault();
  searchBox.classList.toggle("show");
});

document.addEventListener("click", function(e) {
  if (!searchBox.contains(e.target) && !searchIcon.contains(e.target)) {
    searchBox.classList.remove("show");
  }
});


});
</script>

 <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>45 MG Road, Surat, Gujarat, India</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>hello@dailymart.com</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Follow us:</small>
                <a class="text-body ms-3" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-twitter"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.php" class="navbar-brand ms-4 ms-lg-0">
                <!-- <h1 class="fw-bold text-primary m-0">F<span class="text-secondary">oo</span>dy</h1> -->
                <h1 class="fw-bold text-primary m-0">Dai<span class="text-secondary">ly</span>Ma<span class="text-secondary">rt</span></h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="product.php" class="nav-item nav-link">Products</a>
                    <a href="about.php" class="nav-item nav-link">About Us</a>
                    <!-- <a href="blog.php" class="nav-item nav-link">Blog Grid</a> -->
                    <!-- <a href="features.php" class="nav-item nav-link">Our Features</a> -->
                    <!-- <a href="testimonial.php" class="nav-item nav-link">Testimonial</a> -->
                    <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                </div>

                <div class="d-none d-lg-flex ms-2">
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-search text-body"></small>
                    </a>
                    
                    <!-- Hidden search box -->
                    <!-- <div id="searchBox" class="position-absolute end-0 top-100 mt-2 me-4 bg-white p-2 rounded shadow" style="display:none; width:250px; z-index:999;">
                      <form action="search.php" method="get" class="d-flex">
                        <input type="text" name="q" class="form-control me-2" placeholder="Search products..." required>
                        <button type="submit" class="btn btn-primary btn-sm">Go</button>
                      </form>
                    </div> -->


                    <!-- Modern Search Box -->
                    <div id="searchBox" class="search-box shadow-lg rounded-pill p-2 bg-white d-flex align-items-center position-absolute end-0 top-100 mt-2 me-4" style="display:none; width:280px; z-index:999; transition: all 0.3s ease;">
                      <form action="search.php" method="get" class="d-flex flex-grow-1 align-items-center">
                        <input type="text" name="q" class="form-control border-0 bg-transparent ps-3" placeholder="Search products..." required style="box-shadow:none; outline:none;">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill px-3">Search</button>
                      </form>
                    </div>


                    <!-- <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-user text-body"></small>
                    </a> -->
                    <!-- User Dropdown -->
                    <div class="user-dropdown ms-3">
                        <a class="btn-sm-square bg-white rounded-circle" href="#">
                            <small class="fa fa-user text-body"></small>
                        </a>
                        <!-- <div class="user-dropdown-content">
                            <div class="user-info">
                            <?php    
                            if(!isset($_SESSION['uname']) && !isset($_SESSION['email']))
                            {
                                  echo "Login";
                            }
                              else{
                                echo "<p class=user-uname>$_SESSION[uname]</p>";
                                echo "<p class=user-email>$_SESSION[email]</p>";
                              }
                            ?>
                            </div>
                            <a href="logout.php" class="logout-link">
                            <i class="fa fa-sign-out-alt me-2"></i>Logout
                            </a>
                        </div> -->

                        <div class="user-dropdown-content">
                          <div class="user-info">
                          <?php    
                          if(!isset($_SESSION['uname']) && !isset($_SESSION['email'])) {
                              // Guest user
                              echo "<p class='user-uname'>Welcome!</p>";
                              echo "<p class='user-email'>Please log in</p>";
                          } else {
                              // Logged-in user
                              echo "<p class='user-uname'>$_SESSION[uname]</p>";
                              echo "<p class='user-email'>$_SESSION[email]</p>";
                          }
                          ?>
                          </div>

                          <?php
                          if(isset($_SESSION['uname']) && isset($_SESSION['email'])) {
                              // Logged-in: show Logout
                              echo '<a href="logout.php" class="logout-link"><i class="fa fa-sign-out-alt me-2"></i>Logout</a>';
                          } else {
                              // Guest: show Login
                              echo '<a href="login.php" class="login-link"><i class="fa fa-sign-in-alt me-2"></i>Login</a>';
                          }
                          ?>
                      </div>

                    </div>
                    <!-- End User Dropdown -->
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="cart.php">
                        <small class="fa fa-shopping-bag text-body"></small>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->