<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" /> -->
<?php
    include("hhh.php");
?>

<?php
    include("connect.php");
    $id = $_GET["x"];
    $q = mysqli_query($con, "select * from category_master where cid=$id");
    $row = mysqli_fetch_array($q);

    if (isset($_POST['btnupdate'])) {
        $name = $_POST['categoryName'];
        $photo = $_FILES['categoryPhoto']['name'];
        $dst = './images/' . $photo;

        $q = mysqli_query($con, "update category_master set cname='$name', photo='$photo' where cid=$id");

        if ($q) {
            move_uploaded_file($_FILES['categoryPhoto']['tmp_name'], $dst);
            // header("location:view.php");
            echo "<script>window.location.href='view.php'</script>";
        } else {
            echo "<br>Not Updated";
        }
    }
?>
<style>
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
        background-color: #345B85;
        color: white;
    }
    .card-header{
        /* background-color: #424d65; */
        /* background-color: #0d6efd; */
        background-color: #3A6EA5;
    }
</style>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header text-center">
                    <h4 class="text-white">Update Category</h4>
                </div>
                <div class="card-body">
                    <form id="categoryForm" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter category name" value="<?php echo $row['cname'];?>"
                                required />
                        </div>

                        <div class="mb-3">
                            <label for="categoryPhoto" class="form-label">Category Photo</label>
                            <input type="file" class="form-control" id="categoryPhoto" name="categoryPhoto" accept="image/*" required />
                            <img id="preview" class="img-fluid mt-2" />
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-custom" name="btnupdate">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
    include('fff.php');
?>