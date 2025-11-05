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
            // $q = mysqli_query($con,"select * from product_master");
            $q=mysqli_query($con,"select c.*,p.* from category_master c,product_master p where c.cid=p.cid");

            echo "<table class='table table-striped table-hover align-middle text-center'>";            
            // echo "<tr class='table-dark'>";
            echo "<tr class='table-header'>";
            $c=1;
            echo "<th>ID</th>";
            echo "<th>Category Name</th>";
            echo "<th>Product Name</th>";
            echo "<th>Photo</th>";
            echo "<th>Description</th>";
            echo "<th>Rate</th>";
            echo "<th>Qty</th>";
            echo "<th>Date</th>";
            echo "<th colspan=2>Action</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_array($q))
            {
                echo "<tr>";
                echo "<td>" . $c;
                echo "<td>" . $row['cname'];
                echo "<td>" . $row['pname'];
                echo "<td align=center><img src='./images/productImg/$row[photo]' height=150 width=150 class='img-fluid rounded'>";
                echo "<td>" . $row['pdesc'];
                echo "<td>" . $row['rate'];
                echo "<td>" . $row['qty'];
                echo "<td>" . $row['pdate'];
                echo "<td><a href=product_delete.php?x=$row[pid] class='btn btn-lg btn-danger'><i class='bi bi-trash'></i> Delete</a>";
                // echo "<td><a href=product_delete.php?x=$row[pid]><button type='submit' value='Delete' class='btn btn-danger'><i class='bi bi-trash'></i> Delete</button></a>";
                echo "<td><a href=product_update.php?x=$row[pid] class='btn btn-lg btn-success'><i class='bi bi-pencil'></i> Edit</a>";
                
                echo "</tr>";
                $c+=1;
            }
            echo "</table>";
        ?>
    </div>
</div>

<?php
    include("fff.php");
?>