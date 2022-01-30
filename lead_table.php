<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>
<?php include("config.php");
$contact = $_SESSION["contact"];
$sql = "select * from contact_followup where cnf_cnt_id='$contact'";
?>

<body>
    <h2>Followup Record</h2>
    <table name="contact_table" border="1">
        <tr style="background-color: yellowgreen;" align="center">
            <td>Edited by Emp_ID</td>
            <td>Edited at</td>
            <td>Followup Status</td>
            <td>Reconnect On</td>
            <td>Transferred to Employee</td>
            <td>Details</td>
            <td>Status</td>

        </tr>
        <?php
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr class="data">
                    <td class="id"><?php echo $row['cnf_created_by']; ?></td>
                    <td><?php echo date('s:i:H, d-m-Y ', strtotime($row['cnf_created_at'])); ?></td>
                    <td>
                        <?php
                        if ($row['cnf_followup_status'] == 0) {
                            echo "Responded";
                        } else if ($row['cnf_followup_status'] == 1) {
                            echo "Not Responded";
                        } else if ($row['cnf_followup_status'] == 2) {
                            echo "Contact Closed";
                        } else if ($row['cnf_followup_status'] == 3) {
                            echo "Call Transferred";
                        } else if ($row['cnf_followup_status'] == 4) {
                            echo "Ride Booked";
                        } else if ($row['cnf_followup_status'] == 5) {
                            echo "Ride Completed";
                        } else if ($row['cnf_followup_status'] == 6) {
                            echo "Ride Complain/Refund";
                        } else if ($row['cnf_followup_status'] == 7) {
                            echo "Driver Complain";
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo date('d-m-Y ', strtotime($row['cnf_next_followup_date'])); ?>
                    </td>
                    <td>
                        <?php
                        if ($row['cnf_followup_transfer'] == 0) {
                            echo "None";
                        } else {
                            echo $row['cnf_followup_transfer'];
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $row['cnf_details']; ?>
                    </td>
                    <td>
                        <?php
                        if ($row['cnf_status'] == 0) {
                            echo "Inactive";
                        } else if ($row['cnf_status'] == 1) {
                            echo "Active";
                        }
                        ?>
                    </td>

                </tr>
        <?php }
        } ?>
    </table>
</body>

</html>