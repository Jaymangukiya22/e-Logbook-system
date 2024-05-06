<?php
$login = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connect.php';
    $gr = $_POST['gr'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin_student WHERE gr='$gr' AND password='$password'";
    
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    // if ($res) {
    //     while ($row1 = mysqli_fetch_assoc($res)) {
    //         echo "driv_rt: " . $row1['driv_rt'];
    //         header("Location: student.php?error=you did it");
    //     }
    // } else {
        
    //     header("Location: student.php?error=Error");
    // }
    if($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['gr'] = $gr;
        $row = mysqli_fetch_assoc($result);
        $_SESSION['name'] = $row['name'];
        $_SESSION['shift'] = $row['shift'];
        $_SESSION['route'] = $row['route'];
        header("Location: student_data.php?success=Login successful...");
        exit();
    }
    else{
        header("Location: student.php?error=Invalid credentials");
        exit();
    }
}
?>
 




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Student</title>
    <link rel="stylesheet" href="student.css">
</head>
<body>
    <header>
        <img class="logo" src="" alt="">
        <nav>
          <ul>
            <li><a href="index.html" class="home">Home</a></li>
            <li><a href="about.html" class="about">About</a></li>
            <li><a href="about.html" class="about">Contact</a></li>
          </ul>
        </nav>
        <div class="dropdown">
          <button class="dropbtn">Login</button>
          <div class="dropdown-content">
          <a href="admin.html">Admin</a>
          <a href="student.html">Student</a>
          <a href="driver.html">Driver</a>
          </div>
        </div>
      </header>  
      <div class="center">
        <h1>Login-Student</h1>
        <form method="post" method="student.php">
            <div class="textfield">
                <input type="number" name="gr" required>
                <label >GR No.</label>
            </div>
            <div class="textfield">    
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="pass">
                Forgot Password?
            </div> 
            <input type="submit" value="Login"><br/><br/>
           
        </form>
    </div>    
    
    
</body>
</html>