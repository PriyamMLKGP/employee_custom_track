<!DOCTYPE html>

<head>

</head>
<?php
?>

<body>
    <h1 style="color: rebeccapurple;">Employee Login Page</h1>
    <hr>
    <form action="contact_code.php" name="emp_login" method="POST">
        <label for="emp_uname">Username</label><br>
        <input type="text" name="emp_uname" id="uname"><br>
        <label for="pass">Password:</label><br>
        <input type="password" name="emp_password" id="pass"><br>
        <input type="submit" name="login" value="Submit">
    </form><br>
    <a href="new_employee.php" style="color: burlywood;">Employee Application Form </a><br>
    <a href="index.php" style="color: burlywood;">Customer Form</a>
    <p style="color: red;">
        <?php
        session_start();
        if (isset($_SESSION["error"]))
            echo $_SESSION["error"];
        unset($_SESSION["error"]);
        ?>
    </p>
</body>