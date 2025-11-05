<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

<?php
    include('hhh.php');
?>
<style>
    #preview {
        max-width: 100%;
        max-height: 200px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-top: 10px;
        display: none;
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
    .card-header{
        /* background-color: #424d65; */
        background-color: #3A6EA5;
    }
</style>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header text-center">
                        <h4 class="text-white">Add Category</h4>
                    </div>

                    <?php
                        include('connect.php');

                        if(isset($_POST['btnsubmit'])){
                            $name = $_POST['categoryName'];
                            $photo = $_FILES['categoryPhoto']['name'];
                            $dst = './images/' . $photo;

                            $q = mysqli_query($con, "insert into category_master values('','$name','$photo',0)");

                            if ($q){
                                move_uploaded_file($_FILES['categoryPhoto']['tmp_name'], $dst);
                                // header("location:view.php");
                            }else{
                                echo "<br>Inserted";
                            }
                        }
                    ?>
                    <div class="card-body">
                        <form id="categoryForm" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="categoryName" name="categoryName"
                                    placeholder="Enter category name" required />
                            </div>

                            <div class="mb-3">
                                <label for="categoryPhoto" class="form-label">Category Photo</label>
                                <input type="file" class="form-control" id="categoryPhoto" name="categoryPhoto"
                                    accept="image/*" required />
                                <img id="preview" class="img-fluid mt-2" />
                            </div>

                            <div class="d-grid">
                                <!-- <button type="submit" class="btn btn-primary" name="btnsubmit">Submit</button> -->
                                <button type="submit" class="btn btn-custom w-100" name="btnsubmit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript for image preview -->
    <script>
        const photoInput = document.getElementById('categoryPhoto');
        const preview = document.getElementById('preview');

        photoInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            } else {
                preview.style.display = 'none';
            }
        });

        // document.getElementById('categoryForm').addEventListener('submit', function (e) {
        //     e.preventDefault();
        //     alert('Category submitted!');
        //     this.reset();
        //     preview.style.display = 'none';
        // });
    </script>


<?php
    include('fff.php');
?>