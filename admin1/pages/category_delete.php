<?php
    include("connect.php");
    $id = $_GET["x"];

    $q = mysqli_query($con,"delete from category_master where cid=$id");
    if($q){
        header("location:view.php");
    }else{
        echo "Not Deleted";
    }
?>