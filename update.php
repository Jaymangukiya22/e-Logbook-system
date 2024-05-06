<?php
include_once 'connect.php';
if (count($_POST) > 0) {
    mysqli_query($conn, "UPDATE admin_driver SET id='" . $_POST['id'] . "', name='" . $_POST['name'] . "', phone='" . $_POST['phone'] . "', route='" . $_POST['route'] . "' WHERE id='" . $_POST['id'] . "'");
    $message = "Record Modified Successfully";
    header('location: admin.php'); 
    exit(); 
}

$result = mysqli_query($conn, "SELECT * FROM admin_driver WHERE id='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);

?>

<html>
    <head>
    <title>Update Driver Data</title>
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
      Update Driver
      
    </div>
    <div>
        <label>ID</label> 
        <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
        <input type="text" name="id"  value="<?php echo $row['id']; ?>">
    </div>
    <div>
        <label>Name</label> 
        <input type="text" name="name" class="txtField" value="<?php echo $row['name']; ?>">
    </div>
    <div>
        <label>Phone</label>
        <input type="text" name="phone" class="txtField" value="<?php echo $row['phone']; ?>">
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