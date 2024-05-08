<?php
include 'connect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin1.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>
    <style>
    .sidenav {
    height: 100%;
    width: 250px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color:#3e8e41;
    overflow-x: hidden;
    padding-top: 60px;
  }
  img{
    margin-left: 95px;
    margin-top: -30px;
    margin-bottom: 10px;
    
  }
  .sidenav button {
    padding: 16px;
    text-decoration: none;
    font-size: 27px;
    color: white;
    display: block;
    border: none;
    background: none;
    width: 100%;
    /*text-align: center;*/
    margin-left: -5px;
    cursor: pointer;
    transition: 0.3s;
    font-weight: 700;
  }
  
  .sidenav button:hover {
    background-color:green;
  }
  
  .sidenav button:focus {
    outline: none;
  }
  #rt{
    margin-left: 350px;
  }
  #ip input, h2{
    width: 500px;
    margin-left: 250px;
    
}
#ip #add{
    display: inline;
    margin-left: 250px;
}
#ip #remove, #submit{
    position: relative;
    margin-left: 10px;
}
</style>

</head>
<body>
<div id="mySidenav" class="sidenav">
  
  <a href="index.html"><img src="file1.png" alt=""></a>
  <button id="driver">Drivers</button>

  <button id="student">Students</button>
  <button><a href="admin.php" style="text-decoration: none; color:white; ">Admin</a></button>
  <button><a href="logbook.php" style="text-decoration: none; color:white; ">Logbook</a></button>
  <button><a href="admin.html" style="text-decoration: none; color: white; position:relative; bottom:0px;">Logout</a></button>


</div>
<div id="table">
<h3 style="margin-left:40px; margin-bottom:20px;font-weight: 700;color: #3e8e41; ">Logbook</h3>
<!-- <form action="logbook.php" method="post">

<div id="input-fields">
              

              <input type="text" id="ip" name="val" class="form-control mb-3" style="width: 300px;display:inline;margin-left:40px;" placeholder="Search">
              <button type="submit" id="submit" class="btn btn-success"><a href="logbook_search.php">Search</a></button>
        
              </div>
</form> -->
<table class="table" style="margin-left:40px;">
  <thead>
    <tr>
    
      <th scope="col">Date</th>
      <th scope="col">Route</th>
      <th scope="col">Start-Time</th>
      <th scope="col">End-Time</th>
      <th scope="col">KM. Reading at Start</th>
      <th scope="col">KM. Reading at End</th>
      <th scope="col">Fuel Level at Start</th>
      <th scope="col">Fuel Level at End</th>
    </tr>
  </thead>
  <tbody>
    
    <?php
    // $sql = "select * from trip_start";
    // $sql1 = "select * from trip_end ";
    // $res = mysqli_query($conn,$sql1);
    // $result = mysqli_query($conn,$sql);
    // if($result && $res){
    //     while($row=mysqli_fetch_assoc($result)){
        $sql = "SELECT ts.date_start, ts.route, ts.time_start, te.time_end, ts.km_start, te.km_end, ts.fuel_start, te.fuel_end 
            FROM trip_start ts 
            INNER JOIN trip_end te ON ts.route = te.route";
    $result = mysqli_query($conn, $sql);
    if($result && mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            // $row1=mysqli_fetch_assoc($res); 
            $date_start = $row['date_start'];
            $route = $row['route'];
            $time_start = $row['time_start'];
            $time_end = $row['time_end'];
            $km_start = $row['km_start'];
            $km_end = $row['km_end'];
            $fuel_start = $row['fuel_start'];
            $fuel_end = $row['fuel_end'];
            echo'<tr>
            <th scope="row">'.$date_start.'</th>
            <td>'.$route.'</td>
            <td>'.$time_start.'</td>
            <td>'.$time_end.'</td>
            <td>'.$km_start.'</td>
            <td>'.$km_end.'</td>
            <td>'.$fuel_start.'</td>
            <td>'.$fuel_end.'</td>

            
            
          </tr>';
        }
        
    }
    
    ?>


    
  </tbody>
</table>
</div>
</body>
</html>