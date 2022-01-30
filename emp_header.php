<!DOCTYPE html>
<html>
<head></head>
<?php
include("config.php");
session_start();
$emp=$_SESSION['emp_uname'];
?>
<body>
    <h1>
        Employee Username: <?php echo $emp; ?>
        <span style="float: right;"><button><a href="contact_code.php?logout=$emp">logout</a></button></span>      
</h1>
   
</body>
</html>