<!-- Category Start -->
 
<div class="container-fluid bg-light py-6 mb-5">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Our Categories</h1>
            <p>Browse our wide range of categories to explore fresh and quality products.</p>
        </div>

        <!-- Carousel -->
        <div class="owl-carousel category-carousel wow fadeInUp" data-wow-delay="0.1s">
            <?php
                include('connect.php');
                $q = mysqli_query($con,"select * from category_master");
                while($row=mysqli_fetch_array($q)) {
            ?>
            <!-- Category Item -->
            <div class="category-item text-center bg-white p-4 rounded shadow-sm">
                <div class="position-relative mb-3">
                    <!-- Circle Image -->
                    <img class="img-fluid rounded-circle mx-auto d-block" 
                         style="width:150px; height:150px; object-fit:cover;" 
                         src="../../admin1/pages/images/<?php echo $row['photo'];?>" 
                         alt="<?php echo $row['cname'];?>">
                </div>
                <h5 class="mb-0">
                    <a href="product.php?x=<?php echo $row[0];?>" class="text-dark">
                        <?php echo $row['cname'];?>
                    </a>
                </h5>
            </div>
            <?php } ?>
        </div>

        <!-- Browse More -->
        <div class="col-12 text-center mt-5 wow fadeInUp" data-wow-delay="0.1s">
            <a class="btn btn-primary rounded-pill py-3 px-5" href="categories.php">Browse More Categories</a>
        </div>
    </div>
</div>
<!-- Category End -->
