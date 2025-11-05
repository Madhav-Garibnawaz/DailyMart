<?php
    include("connect.php");
    session_start();
    // $uid=$_SESSION['uid'];
    $pid = $_GET['pid']; 

    // $q = mysqli_query($con,"delete from order_master where uid=$uid and pid=$pid");
    $q = mysqli_query($con,"delete from order_master where pid=$pid");
    if($q){
        header("location:cart.php");
    }else{
        echo "Not Deleted";
    }
?>