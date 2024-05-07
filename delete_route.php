<?php
include 'connect.php';
if(isset($_GET['route'])){
    $route=$_GET['route'];

    $sql="delete from admin_route where route=$route";
    $result=mysqli_query($conn,$sql);
    if($result){
        // echo "Deleted successfully";
        header('location:route.php');
    }else{
        die(mysqli_error($conn));
    }
}

?>