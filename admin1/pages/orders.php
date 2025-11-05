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
            
            $q = mysqli_query($con,"select * from order_master");

            echo "<table class='table table-striped table-hover align-middle text-center'>";            
            // echo "<tr class='table-dark'>";
            echo "<tr class='table-header'>";
            echo "<th>Order ID</th>";
            echo "<th>User ID</th>";
            echo "<th>Product ID</th>";
            echo "<th>Product Name</th>";
            echo "<th>Description</th>";
            echo "<th>Rate</th>";
            echo "<th>Photo</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_array($q))
            {
                echo "<tr>";                
                echo "<td>" .$row['oid']. "</td>";
                echo "<td>" .$row['uid']. "</td>";
                echo "<td>" .$row['pid']. "</td>";
                echo "<td>" .$row['pname']. "</td>";
                echo "<td>" .$row['pdesc']. "</td>";
                echo "<td>" .$row['rate']. "</td>";
                // echo "<td><img src='uploads/".$row['photo']."' width='60' height='60'></td>";
                echo "<td align=center><img src='./images/productImg/$row[photo]' height=150 width=150 class='img-fluid rounded'>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </div>
</div>

<?php
    include("fff.php");
?>
