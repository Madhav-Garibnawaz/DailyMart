<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Foody - Organic Food Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <?php
        include("nav.php");
    ?>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <?php
        include("carousel.php");
    ?>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="img/about.jpg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-5 mb-4">Best Organic Fruits And Vegetables</h1>
                    <p class="mb-4">We bring you farm-fresh fruits and vegetables directly from trusted local farmers, ensuring every bite is natural and full of nutrition</p>
                    <p><i class="fa fa-check text-primary me-3"></i>100% Organic & Pesticide-Free</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Handpicked Daily for Freshness</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Delivered Straight to Your Doorstep</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="about.php">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Category Start -->
    <div class="container-fluid bg-light my-5 py-6">
        <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Our Categories</h1>
                    <p>Browse our wide range of categories to explore fresh and quality products.</p>
                </div>
            </div>
        </div>

        <!-- Scroll Wrapper with Arrows -->
        <div class="position-relative">
            <!-- Left Arrow -->
            <button class="scroll-btn left btn btn-light shadow rounded-circle" 
                    style="position:absolute; left:-20px; top:40%; z-index:10;">
                &#10094;
            </button>

            <!-- Horizontal scroll container -->
            <div id="categoryScroll" 
                 class="d-flex pb-3" 
                 style="gap: 25px; scroll-behavior: smooth; overflow-x: auto; overflow-y: hidden; scrollbar-width: none; -ms-overflow-style: none;">
                <?php
                    include('connect.php');
                    $q=mysqli_query($con,"select * from category_master");
                    while($row=mysqli_fetch_array($q))
                    {
                ?>
                <!-- Category Circle -->
                <div class="flex-shrink-0 text-center wow fadeInUp" data-wow-delay="0.1s" style="width: 180px;">
                    <a href="product.php?x=<?php echo $row[0];?>" class="text-decoration-none text-dark">
                        <div class="bg-white rounded-circle shadow-sm p-3">
                            <img class="img-fluid rounded-circle" 
                                src="../../admin1/pages/images/<?php echo $row['photo'];?>" 
                                alt="<?php echo $row['cname'];?>" 
                                style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <h6 class="mt-3"><?php echo $row['cname'];?></h6>
                    </a>
                </div>
                <?php
                    }
                ?>
            </div>

            <!-- Right Arrow -->
            <button class="scroll-btn right btn btn-light shadow rounded-circle" 
                    style="position:absolute; right:-20px; top:40%; z-index:10;">
                &#10095;
            </button>
        </div>

        <!-- Browse More -->
        <div class="col-12 text-center mt-5 wow fadeInUp" data-wow-delay="0.1s">
            <a class="btn btn-primary rounded-pill py-3 px-5" href="categories.php">Browse More Categories</a>
        </div>
        </div>
    </div>

<!-- Hide scrollbar with CSS -->
<<style>
#categoryScroll::-webkit-scrollbar {
    display: none; /* Chrome, Safari, Opera */
}

/* Zoom-in effect */
#categoryScroll img {
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}
#categoryScroll img:hover {
    transform: scale(1.1);   /* Zoom in */
    box-shadow: 0 8px 20px rgba(0,0,0,0.2); /* Optional shadow */
}
</style>

<script>
    const scrollContainer = document.getElementById('categoryScroll');
    const leftBtn = document.querySelector('.scroll-btn.left');
    const rightBtn = document.querySelector('.scroll-btn.right');

    // Faster & smoother scrolling
    leftBtn.addEventListener('click', () => {
        scrollContainer.scrollBy({ left: -350, behavior: 'smooth' });
    });

    rightBtn.addEventListener('click', () => {
        scrollContainer.scrollBy({ left: 350, behavior: 'smooth' });
    });
</script>
<!-- Category End -->

    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Our Products</h1>
                        <p>Browse our wide range of fresh, organic, and everyday essentials for your family.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill" href="#tab-1">Vegetable</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-2">Fruits </a>
                        </li>
                        <li class="nav-item me-0">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-3">Fresh</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <?php
                            include('connect.php');
                            $q = mysqli_query($con, "select * from ( select p.*, row_number() over (partition by cid order by pid asc) as rn from product_master p ) t where rn <= 2");
                            while($row = mysqli_fetch_array($q))
                            {
                        ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="../../admin1/pages/images/productImg/<?php echo $row['photo'];?>" alt="">
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href=""><?php echo $row['pname'];?></a>
                                    <p><?php echo $row['pdesc'];?></p>
                                    <span class="text-primary me-1">₹<?php echo $row['rate'];?></span>
                                    <!-- <span class="text-body text-decoration-line-through">70</span> -->
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <!-- <a class="text-body" href="addtocart.php"><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a> -->
                                        <?php    
                                        echo "<a class='text-body' href='add_to_cart.php?pid=$row[0] & pname=$row[2] & pdesc=$row[3] & rate=$row[5] & photo=$row[7]'><i class='fa fa-shopping-bag text-primary me-2'></i>Add to cart</a>";
                                        ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>                        
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="product.php">Browse More Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product End -->


    <!-- Firm Visit Start -->
    <div class="container-fluid bg-primary bg-icon mt-5 py-6">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-md-7 wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-5 text-white mb-3">Visit Our Firm</h1>
                    <p class="text-white mb-0">Experience the freshness at its source! Walk through our lush green farms, see how your food is grown, and enjoy a day filled with nature, learning, and healthy living.</p>
                </div>
                <div class="col-md-5 text-md-end wow fadeIn" data-wow-delay="0.5s">
                    <a class="btn btn-lg btn-secondary rounded-pill py-3 px-5" href="">Visit Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Firm Visit End -->


    <!-- Testimonial Start -->
    <div class="container-fluid bg-light bg-icon py-6 mb-5">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Customer Review</h1>
                <p>What our happy customers are saying about their experience with us.</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">The best place for daily groceries. Clean, quick, and reliable service.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" alt="">
                        <div class="ms-3">  
                            <h5 class="mb-1">Anjali Mehta</h5>
                            <span>Homemaker</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Always fresh and delivered on time. I can trust the quality every time.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Ramesh Patel</h5>
                            <span>Businessman</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">I love how everything is neatly packed and so fresh. Highly recommend!</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Arjun Desai</h5>
                            <span>Engineer</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Shopping here is easy and stress-free. Great products at great prices.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="img/testimonial-4.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Priya Shah</h5>
                            <span>Teacher</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Blog Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Latest Blog</h1>
                <p>Discover new recipes, healthy eating habits, and behind-the-scenes stories from our kitchen to yours.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid" src="img/blog-1.jpg" alt="">
                    <div class="bg-light p-4">
                        <a class="d-block h5 lh-base mb-4" href="">How to cultivate organic fruits and vegetables in own farm</a>
                        <div class="text-muted border-top pt-4">
                            <small class="me-3"><i class="fa fa-user text-primary me-2"></i>By Rohan Sharma</small>
                            <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>05 Sep, 2025</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid" src="img/blog-2.jpg" alt="">
                    <div class="bg-light p-4">
                        <a class="d-block h5 lh-base mb-4" href="">Top 10 benefits of eating seasonal organic vegetables</a>
                        <div class="text-muted border-top pt-4">
                            <small class="me-3"><i class="fa fa-user text-primary me-2"></i>By Ananya Verma</small>
                            <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>28 Aug, 2025</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <img class="img-fluid" src="img/blog-3.jpg" alt="">
                    <div class="bg-light p-4">
                        <a class="d-block h5 lh-base mb-4" href="">Why organic farming is the future of India’s agriculture</a>
                        <div class="text-muted border-top pt-4">
                            <small class="me-3"><i class="fa fa-user text-primary me-2"></i>By Arjun Mehta</small>
                            <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>20 Aug, 2025</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- Footer Start -->
    <?php
        include("footer.php");
    ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    
</body>

</html>