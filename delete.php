<?php
include 'connect.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sql="delete from admin_driver where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        // echo "Deleted successfully";
        header('location:admin.php');
    }else{
        die(mysqli_error($conn));
    }
}

?>