<?php
    include("hhh.php");
?>

<style>
    .table-header th {
    background-color: #3A6EA5 !important;
    color: #fff !important;
}
</style>

<div class="container mt-4">
    <div class="table-responsive">
        <?php
            include("connect.php");
            $q = mysqli_query($con,"select * from category_master");

            echo "<table class='table table-striped table-hover align-middle text-center'>";            
            // echo "<tr class='table-dark'>";
            echo "<tr class='table-header'>";
            echo "<th>Category Name</th>";
            echo "<th>Photo</th>";
            echo "<th colspan=2>Action</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_array($q))
            {
                echo "<tr>";                
                echo "<td>" . $row['cname'];
                echo "<td align=center><img src='./images/$row[photo]' height=150 width=150 class='img-fluid rounded'>";
                echo "<td><a href=category_delete.php?x=$row[0] class='btn btn-lg btn-danger'><i class='bi bi-trash'></i> Delete</a>";
                echo "<td><a href=category_update.php?x=$row[0] class='btn btn-lg btn-success'><i class='bi bi-pencil'></i> Edit</a>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </div>
</div>

<?php
    include("fff.php");
?>