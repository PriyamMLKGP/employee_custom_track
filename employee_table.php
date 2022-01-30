<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>
<?php include("config.php");
include("emp_header.php");
$sql = "select * from employee";
unset($_SESSION['leads']);
?>

<body>
    <a href="success.php"><button>Back</button></a>
    <hr><br>
    <p>Filter By Status &ensp;
    <select name="filter_it" id="myinput" onchange="filter(this.value);">
        <option value="2">All</option>
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select></p>
    <table name="contact_table" id="contact" border="1">
        <tr style="background-color: yellowgreen;">
            <td>ID</td>
            <td>Image</td>
            <td>Name</td>
            <td>UserName</td>
            <td>Phone</td>
            <td>Email</td>
            <td>Aaddhar Number</td>
            <td>Pan Number</td>
            <td>Status</td>
            <td>Created Time</td>
        </tr>
        <?php
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr class="data">
                    <td class="id"><?php echo $row['emp_id']; ?></td>
                    <td><img width="100" height="100" src="uploads/<?= $row['emp_picture'] ?>">
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['emp_uname']; ?></td>
                    <td><?php echo $row['emp_phone']; ?></td>
                    <td><?php echo $row['emp_email']; ?></td>
                    <td><?php echo $row['emp_addhar_number']; ?></td>
                    <td><?php echo $row['emp_pan_number']; ?></td>
                    <td><?php if ($row['emp_status']) {
                            echo "Active";
                        } else {
                            echo "Inactive";
                        } ?></td>
                    <td><?php echo date('s:i:H, d-m-Y ', strtotime($row['emp_created_date'])); ?></td>

                </tr>
        <?php }
        } ?>
    </table>
</body>
<script>
    function filter(p1){
        var td,table,i,tr,input;
        if(p1==0){
            p1="Inactive";
        }
        if(p1==1){
            p1="Active";
        } 
        table=document.getElementById("contact");
        tr=table.getElementsByTagName("tr");
        for(i=1;i<tr.length;i++){
        td=tr[i].getElementsByTagName("td")[8];
        if(p1==2){
            tr[i].style.display="";
        }
        else if(p1==td.innerText){
            tr[i].style.display="";
        }
        else{
            tr[i].style.display="none";
        }//window.alert(typeof(td.innerText));
        } 
           
    }
</script>
</html>