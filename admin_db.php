<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "class2";
    
    $link = mysqli_connect($host, $username, $password, $database);
    
    if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    $sql = "CREATE TABLE IF NOT EXISTS admin_route (
    
        route INT(2) NOT NULL PRIMARY KEY,
        driver VARCHAR(50) NOT NULL
        -- pickup VARCHAR(50) NOT NULL
    )";
    
    if (mysqli_query($link, $sql)) {
        echo "Table created successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    
    if(isset($_POST['save'])){
        $route = $_POST['route'];
        $driver = $_POST['driver'];
        
        $insert_sql = "INSERT INTO admin_route (route, driver) VALUES ('$route', '$driver' )";
        
        if(mysqli_query($link, $insert_sql)){
            echo "Record inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $insert_sql. " . mysqli_error($link);
        }
    }
    
    // if(isset($_POST['update'])){
    //     $number = $_POST['number'];
    //     $name = $_POST['name'];
    //     $birthdate = $_POST['birthdate'];
    //     $contact = $_POST['contact'];
    //     $email = $_POST['email'];
        
    //     $update_sql = "UPDATE employee2 SET name='$name', birth_date='$birthdate', email='$email'  WHERE number='$number'";
        
    //     if(mysqli_query($link, $update_sql)){
    //         echo "Record updated successfully.";
    //     } else{
    //         echo "ERROR: Could not able to execute $update_sql. " . mysqli_error($link);
    //     }
    // }
    
    // if(isset($_POST['delete'])){
    //     $id = $_POST['delete'];
        
    //     $delete_sql = "DELETE FROM employee2 WHERE number='$number'";
        
    //     if(mysqli_query($link, $delete_sql)){
    //         echo "Record deleted successfully.";
    //     } else{
    //         echo "ERROR: Could not able to execute $delete_sql. " . mysqli_error($link);
    //     }
    // }
    
    // $select_sql = "SELECT * FROM employee2";
    // $result = mysqli_query($link, $select_sql);
    ?>
    
    <?php
    mysqli_close($link);
?>