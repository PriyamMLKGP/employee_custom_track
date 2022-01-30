<!DOCTYPE html>
<head>
<script type="text/javascript" src="validate.js?n=1"></script>
</head>
<?php
include('config.php');
$a=$_GET['a'];
$result=mysqli_query($conn,"select * from contacts where cnt_id=$a");
$row=mysqli_fetch_assoc($result);
?>
<body>
    <h1 style="color:purple;">Update Data Form</h1>
    <h3 style="color: rebeccapurple;">Customer ID- <?php echo $a; ?></h3>
    <hr color="blue">
    <form action="contact_code.php" enctype="multipart/form-data" onsubmit="return validate()" name="input"  method="POST">
    <label for="name">Name:</label><br>
    <input type="text" name="cnt_name" value="<?php echo $row['cnt_name']; ?>" id="name"><br>
    <input type="number" name="cnt_id" value="<?php echo $a; ?>" hidden id="id">
    <label for="uname">Username:</label><br>
    <input type="text" name="cnt_uname" value="<?php echo $row['cnt_uname'] ?>" id="uname"><br>
    <label for="phone">Phone Number:</label><br>
    <input type="tel" value="<?php echo $row['cnt_phone'] ?>" pattern="[0-9]{10}" name="cnt_phone" id="phone"><br>
    <label for="Email">Email:</label><br>
    <input type="text" value="<?php echo $row['cnt_email'] ?>" name="cnt_email" id="email"><br>
    <label for="address">Address:</label><br>
    <textarea name="cnt_address" rows="3" cols="20"><?php echo $row['cnt_address'] ?></textarea><br>
    <label for="gender">Gender:</label><br>
    <select name="cnt_gender" id="gender">
        <option value="" <?php if($row['cnt_gender']==""){echo "selected";} ?>>None</option>
        <option value="1" <?php if($row['cnt_gender']=="1"){echo "selected";} ?>>Male</option>
        <option value="2" <?php if($row['cnt_gender']=="2"){echo "selected";} ?>>Female</option>
    </select><br>
    <input type="file" name="cnt_image" id="image"><br><br>
    <input type="submit" name="update" value="Update">
    </form> 
</body>