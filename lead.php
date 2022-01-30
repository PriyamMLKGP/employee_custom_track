<!DOCTYPE html>
<html>
<head>
</head>
<?php
include('config.php');
include('emp_header.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_GET['lead'])){
$a=$_GET['lead'];
$_SESSION["leads"]=$a;
$result=mysqli_query($conn,"select cnt_id,cnt_name from contacts where cnt_id=$a");
$row=mysqli_fetch_assoc($result);}
else{
    $a=$_SESSION["leads"];
    $result=mysqli_query($conn,"select cnt_id,cnt_name from contacts where cnt_id=$a");
    $row=mysqli_fetch_assoc($result);
}
$emp=$_SESSION["emp_uname"];
$_SESSION["contact"]=$row['cnt_id'];
$query=mysqli_query($conn,"select * from employee where emp_uname='$emp'");
$res=mysqli_fetch_assoc($query);
?>
<body>
    <h1 style="color: peru;">Customer ID -<?php echo $row['cnt_id']; ?> <br> Name = <?php echo $row['cnt_name']; ?> </h1>
    <hr><p></p>
    <h3>New Followup</h3>
    <form action="contact_code.php" name="followup"  method="POST">
    <input type="text" name="cnf_cnt_id" value="<?php echo $row['cnt_id']; ?>" hidden id="id1">
    <input type="text" name="cnf_created_by" value="<?php echo $emp; ?>" hidden id="created_by">

    <label for="cnf_followup_status">Contact Status</label><br>
    <select name="cnf_followup_status" id="followup_status">
        <option value="0")>Responded</option>
        <option value="1")>Not Responded</option>
        <option value="2")>Contact Closed</option>
        <option value="3")>Call Transferred</option>
        <option value="4")>Ride Booked</option>
        <option value="5")>Ride completed</option>
        <option value="6")>Ride Complain/Refund</option>
        <option value="7")>Driver Complain</option>
    </select><br>

    <label for="cnf_next_followup_date">Next contact Schedule</label><br>
    <input type="date" name="cnf_next_followup_date" id="next_followup_date"><br>
    
    <label for="cnf_followup_transfer">Contact Transfered To</label><br>
    <select name="cnf_followup_transfer" id="followup_transfer">
    <option value="0")>None</option>
    <?php
        $query="select * from employee where emp_status=1";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result)){
    ?>    
        <option value="<?php echo $row['emp_cnt_id']; ?>")><?php echo $row['emp_uname']; ?></option>
 
    <?php } ?> 
 </select><br> 
    <label for="cnf_details">Details</label><br>
    <textarea name="cnf_details" rows="3" cols="20"></textarea><br>
    
    <input type="submit" name="lead" value="Add Followup">
    </form> 
    <?php
    if(isset($_SESSION["add_followup"])){
        echo $_SESSION["add_followup"];
    }
    unset($_SESSION['add_followup']);
    ?>
    <br>
    <a href="success.php?">Back To Contacts</a>
<hr><hr>
<?php include('lead_table.php'); ?>

</body></html>