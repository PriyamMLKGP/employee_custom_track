<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="validate.js?n=1"></script>
</head>
<?php include("config.php");
include("emp_header.php");
$sql = "select * from contacts";
unset($_SESSION['leads']);
?>

<body>
    <a href="employee_table.php">Employee Table</a>
    <p>Filter By Status &ensp;
    <select name="filter_it" id="myinput" onchange="filter(this.value);">
        <option value="2">All</option>
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select></p>
    <button onclick="exportTableToExcel('contact', 'members-data')">Export Table Data To Excel File</button><br>
    <table name="contact_table" id="contact" border="1">
        <tr style="background-color: yellowgreen;">
            <td>ID</td>
            <td>Image</td>
            <td>Name</td>
            <td>UserName</td>
            <td>Phone</td>
            <td>Email</td>
            <td>Address</td>
            <td>Gender</td>
            <td>Status</td>
            <td>Created Time</td>
            <td colspan="3">Action</td>
            <td>Followup Status</td>
        </tr>
        <?php
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr class="data" name="row">
                    <td class="id"><?php echo $row['cnt_id']; ?></td>
                    <td><img width="100" height="100" src="uploads/<?= $row['cnt_image'] ?>">
                    <td><?php echo $row['cnt_name']; ?></td>
                    <td><?php echo $row['cnt_uname']; ?></td>
                    <td><?php echo $row['cnt_phone']; ?></td>
                    <td><?php echo $row['cnt_email']; ?></td>
                    <td><?php echo $row['cnt_address']; ?></td>
                    <td><?php if ($row['cnt_gender'] == 1) {
                            echo "Male";
                        } else {
                            echo "Female";
                        } ?></td>
                    <td><?php if ($row['cnt_status']) {
                            echo "Active";
                        } else {
                            echo "Inactive";
                        } ?></td>
                    <td><?php echo date('s:i:H, d-m-Y ', strtotime($row['cnt_created_at'])); ?></td>
                    <td><button><a href="update.php?a=<?php echo $row['cnt_id']; ?>">Update</a></button></td>
                    <td><button><a href="contact_code.php?delete=<?php echo $row['cnt_id']; ?>">Delete</a></button></td>
                    <td><button><a href="contact_code.php?status=<?php echo $row['cnt_id']; ?>&stat=<?php echo $row['cnt_status']; ?>">
                                <?php if ($row['cnt_status']) {
                                    echo "Deactivate";
                                } else {
                                    echo "Activate";
                                } ?>
                            </a></button></td>
                   <td><button><a href="lead.php?lead=<?php echo $row['cnt_id']; ?>">Followup</a></button></td>
                </tr>
        <?php }
        } ?>
    </table>
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
        //td=tr[i].getElementsByTagName("td")[8];
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

</body>

</html>