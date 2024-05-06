<?php
include 'connect.php';
if(isset($_POST['add'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $route = $_POST['route'];
    $sql = "insert into admin_driver (id, name, phone, route) values('$id','$name','$phone','$route')";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "Driver added successfully";
    }else{
        die(mysqli_error($conn));
    }
}

if(isset($_POST['st_add'])){
    $gr = $_POST['gr'];
    $name = $_POST['name'];
    $password = $_POST['pass'];
    $shift = $_POST['shift'];
    $route = $_POST['route'];
    $sql = "insert into admin_student (gr, name, password,shift, route) values('$gr','$name','$password','$shift','$route')";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "Student added successfully";
    }else{
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="admin1.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div id="main">
  <a href="index.html">HOME</a>
    <h1>ADMIN PAGE</h1>
    
    <p class="demo"></p>
    
  </div>

<div id="mySidenav" class="sidenav">

  <button id="driver">Drivers</button>

  <button id="student">Students</button>
  <button id="add_rt" onclick="clk()">Routes</button>
  <button>Database</button>
</div>
<div class="background" id="background">
  <h1></h1>
</div>

<div id="drivers">
  <form action="admin.php" method="post">
    <div class="title">
      Add Driver
      
    </div>
    <div class="formgroup">
      <label>ID</label>
      <input type="number" id="driver_ID" class="formcontrol" name="id" autocomplete="off">
  </div>
    <div class="formgroup">
      <label>Name</label>
      <input type="text" id="driver_name" class="formcontrol" name="name" autocomplete="off">
  </div>

  <div class="formgroup">
      <label>Phone</label>
      <input type="text" id="driver_phone" class="formcontrol" name="phone" autocomplete="off">
  </div>
  <div class="formgroup">
    <label>Route</label>
    <input type="number" id="driver_route" class="formcontrol" name="route" autocomplete="off">
</div>
<div class="button">
  <button type="submit" id="driver_submit" name="add">Add</button>
  <button id="driver_cancel" onclick="cancel()">Cancel</button>
</div>
  </form>
</div>



<div id="students">
  <form action="admin.php" method="post">
    <div class="title">
      Add Student
      
    </div>
    <div class="formgroup">
      <label>GR No.</label>
      <input type="number" id="student_GR" class="formcontrol" name="gr" autocomplete="off">
  </div>
    <div class="formgroup">
      <label>Name</label>
      <input type="text" id="student_name" class="formcontrol" name="name" autocomplete="off">
  </div>
  <div class="formgroup">
      <label>Password</label>
      <input type="password" id="student_pass" class="formcontrol" name="pass" autocomplete="off">
  </div>
  <div class="formgroup">
      <label>Shift</label>
      <input type="text" id="student_shift" class="formcontrol" name="shift" autocomplete="off">
  </div>
  <div class="formgroup">
    <label>Route</label>
    <input type="number" id="student_route" class="formcontrol" name="route" autocomplete="off">
</div>
<div class="button">
  <button type="submit" id="student_submit" name="st_add">Add</button>
  <button id="student_cancel" onclick="cancel()">Cancel</button>
</div>
  </form>
</div>

<div id="table">
<h3 style="margin-left:40px; margin-bottom:20px;">Driver Details</h3>
<table class="table" style="margin-left:40px;">
  <thead>
    <tr>
    
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Route</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "select * from admin_driver";
    $result = mysqli_query($conn,$sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $name = $row['name'];
            $phone = $row['phone'];
            $route = $row['route'];
            echo'<tr>
            <th scope="row">'.$id.'</th>
            <td>'.$name.'</td>
            <td>'.$phone.'</td>
            <td>'.$route.'</td>
            <td>
            <a class="btn btn-danger text-light" href="delete.php?id=' . $id . '">Delete</a>
            <a class="btn btn-primary text-light update-btn" href="update.php?id=' . $id . '">Update</a>
           

            </td>
            
          </tr>';
        }
        
    }
    
    ?>
    
  </tbody>
</table>
</div>

<div id="table">
<h3 style="margin-left:40px; margin-bottom:20px;">Student Details</h3>
<table class="table" style="margin-left:40px;">
  <thead>
    <tr>
    
      <th scope="col">GR No.</th>
      <th scope="col">Name</th>
      <th scope="col">Password</th>
      <th scope="col">Shift</th>
      <th scope="col">Route</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "select * from admin_student";
    $result = mysqli_query($conn,$sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $gr = $row['gr'];
            $name = $row['name'];
            $password = $row['password'];
            $shift = $row['shift'];
            $route = $row['route'];
            echo'<tr>
            <th scope="row">'.$gr.'</th>
            <td>'.$name.'</td>
            <td>'.$password.'</td>
            <td>'.$shift.'</td>
            <td>'.$route.'</td>
            <td>
            <a class="btn btn-danger text-light" href="delete_student.php?gr=' . $gr . '">Delete</a>
            <a class="btn btn-primary text-light update-btn" href="update_student.php?gr=' . $gr . '">Update</a>
           

            </td>
            
          </tr>';
        }
        
    }
    
    ?>
    
  </tbody>
</table>
</div>

<script 
src="admin1.js">
            // <button style="background-color:red;"><a class="text-light" href="delete.php?id='.$id.'">Delete</a></button>
            // <a class="btn btn-primary text-light update-btn" href="update.php?id=' . $id . '">Update</a>
            // <a class="btn btn-primary text-light" id="update" href="update.php?id=' . $id . '">Update</a>
</script>
   
</body>
</html> 
