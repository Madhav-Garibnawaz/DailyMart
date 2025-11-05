<?php
    include("connect.php");
    $id = $_GET["x"];

    $q = mysqli_query($con,"delete from product_master where pid=$id");
    if($q){
        header("location:product_view.php");
    }else{
        echo "Not Deleted";
    }
?>