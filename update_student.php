<?php
include_once 'connect.php';
if (count($_POST) > 0) {
    mysqli_query($conn, "UPDATE admin_student SET gr='" . $_POST['gr'] . "', name='" . $_POST['name'] . "', password='" . $_POST['password'] . "', shift='" . $_POST['shift'] . "', route='" . $_POST['route'] . "' WHERE gr='" . $_POST['gr'] . "'");
    $message = "Record Modified Successfully";
    header('location: admin.php'); 
    exit(); 
}

$result = mysqli_query($conn, "SELECT * FROM admin_student WHERE gr='" . $_GET['gr'] . "'");
$row = mysqli_fetch_array($result);

?>

<html>
    <head>
    <title>Update Student Data</title>
    <link rel="stylesheet" type="text/css" href="update.css">
    </head>
<body>
    <form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">

</div>
<div class="update_driver">

<div class="title">
      Update Student
      
    </div>
    <div>
        <label>GR No.</label> 
        <input type="hidden" name="gr" class="txtField" value="<?php echo $row['gr']; ?>">
        <input type="text" name="gr"  value="<?php echo $row['gr']; ?>">
    </div>
    <div>
        <label>Name</label> 
        <input type="text" name="name" class="txtField" value="<?php echo $row['name']; ?>">
    </div>
    <div>
        <label>Password</label>
        <input type="text" name="password" class="txtField" value="<?php echo $row['password']; ?>">
    </div>
    <div>
        <label>Shift</label>
        <input type="text" name="shift" class="txtField" value="<?php echo $row['shift']; ?>">
    </div>
    <div>
        <label>Route</label>
        <input type="text" name="route" class="txtField" value="<?php echo $row['route']; ?>">
    </div>
    <div>
        <input type="submit" name="submit" value="Update" class="button">
        <button><a href="admin.php" style="text-decoration: none; color:black;">Cancel</a></button>
    </div>
</div>

</form>
</body>
</html>