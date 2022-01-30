<!DOCTYPE html>

<head>

</head>

<body>
    <h1 style="color: cadetblue;">Employee Application Form</h1>
    <hr>
    <form action="contact_code.php" enctype="multipart/form-data" name="input" method="POST">

        <label for="emp_id">Employee ID:</label><br>
        <input type="text" name="emp_id" id="id"><br>
        <label for="emp_name">Name:</label><br>
        <input type="text" name="emp_name" id="name"><br>
        <label for="emp_uname">Username:</label><br>
        <input type="text" name="emp_uname" id="uname"><br>
        <label for="emp_password">Password:</label><br>
        <input type="password" name="emp_password" id="password"><br>
        <label for="emp_phone">Phone Number:</label><br>
        <input type="tel" pattern="[0-9]{10}" name="emp_phone" id="phone"><br>
        <label for="emp_email">Email:</label><br>
        <input type="text" name="emp_email" id="email"><br>
        <label for="emp_addhar_number">Aaddhar Number:</label><br>
        <input type="tel" pattern="[0-9]{12}" name="emp_addhar_number" id="addhar_number"><br>
        <label for="emp_pan_number">Pan Number:</label><br>
        <input type="text" name="emp_pan_number" id="pan_number"><br>
        <input type="file" name="emp_picture" id="picture"><br><br>
        <input type="submit" name="emp_new" value="Register">
    </form> <br>
    <a href="employee_login.php" style="color: burlywood;">Employee Login</a><br>
    <a href="index.php" style="color: burlywood;">Customer Form</a>
    <br>
    <?php
    session_start();
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION["success"]);
    }
    ?>
</body>