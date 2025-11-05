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
            
            $q = mysqli_query($con,"select * from user_master");

            echo "<table class='table table-striped table-hover align-middle text-center'>";            
            // echo "<tr class='table-dark'>";
            echo "<tr class='table-header'>";
            $c=1;
            echo "<th>ID</th>";
            echo "<th>User Name</th>";
            echo "<th>Email</th>";
            echo "<th>Mobile No</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_array($q))
            {
                echo "<tr>";                
                echo "<td>" . $c;
                echo "<td>" .$row['uname'];
                echo "<td>" .$row['email'];
                echo "<td>" .$row['mobile'];
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