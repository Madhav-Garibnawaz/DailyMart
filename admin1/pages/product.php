<?php
    include('connect.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php
      include('hhh.php');
    ?>
    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
        }
        .card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
        }
        .card-header {
            padding: 15px;
            font-size: 1.3rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            background-color: #3A6EA5;
        }
        .form-label {
            font-weight: 500;
            margin-bottom: 5px;
        }
        .form-control, .form-select {
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            transition: all 0.3s ease-in-out;
        }
        .form-control:focus, .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 6px rgba(13, 110, 253, 0.3);
        }
       
        .btn-custom {
            /* background-color: #FFb800; */
            /* background-color: #0d6efd; */
            background-color: #3A6EA5;
            color: white;
            border: none;
            padding: 10px;
            font-weight: 500;
            border-radius: 8px;
            transition: background-color 0.3s ease-in-out;
        }
        .btn-custom:hover {
            /* background-color: #084298; */
            background-color: #345B85;
            color: white;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-sm">
                <div class="card-header text-white text-center">
                    Add New Product
                </div>
                <?php
                    
                
                    if(isset($_POST['btnsubmit']))
                    {
                        $pname = $_POST['pname'];
                        $rate = $_POST['rate'];
                        $qty = $_POST['qty'];
                        $desc = $_POST['pdesc'];
                        $cid = $_POST['txtcategory'];
                        $photo = $_FILES['productPhoto']['name'];
                        $dst = './images/productImg/' . $photo;
                        $date=date('d/m/Y');

                        $q = mysqli_query($con, "insert into product_master values('', $cid, '$pname', '$desc', $qty, $rate, CURDATE(), '$photo', 0)");

                        if($q){
                            move_uploaded_file($_FILES['productPhoto']['tmp_name'], $dst);
                        }else{
                            echo "<br>Not Inserted";
                        }
                    }
                ?>
                <div class="card-body p-4">
                   
                    <form method="post" enctype="multipart/form-data">
                        
                        <!-- Category -->
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select id="ddlcategory" class="form-select" name="txtcategory">
                                <option value="">Select category</option>
                                <?php 
                                    $q = mysqli_query($con, "select * from category_master");
                                    while($row = mysqli_fetch_array($q))
                                    {
                                        echo "<option value=$row[cid]>$row[cname]</option>";
                                    }
                                ?>                                
                            </select>                            
                        </div>

                        <!-- Product Name -->
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="pname" placeholder="Enter product name" required>
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <label class="form-label">Price (₹)</label>
                            <input type="number" class="form-control" name="rate" placeholder="Enter price" required>
                        </div>

                        <!-- Quantity -->
                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="qty" placeholder="Enter quantity" required>
                        </div>

                        <!-- Date
                        <div class="mb-3">
                            <label class="form-label">Product Date</label>
                            <input type="date" class="form-control" required>
                        </div> -->

                        <!-- Description -->
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3" name="pdesc" placeholder="Enter product description"></textarea>
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label class="form-label">Product Image</label>
                            <input type="file" class="form-control" name="productPhoto" accept="image/*" required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-custom w-100" name="btnsubmit">Add Product</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>


<?php
    include('fff.php');
?>