<?php
include 'connect.php';
if(isset($_GET['gr'])){
    $gr=$_GET['gr'];

    $sql="delete from admin_student where gr=$gr";
    $result=mysqli_query($conn,$sql);
    if($result){
        // echo "Deleted successfully";
        header('location:admin.php');
    }else{
        die(mysqli_error($conn));
    }
}

?>