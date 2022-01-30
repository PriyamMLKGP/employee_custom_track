<!DOCTYPE html>
<html>

<head><link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="validate.js?n=1"></script>
</head>

<body onload="generate()">
    <h1 style="color: cadetblue;">Customer Registration Form</h1>
    <hr>
    <div class="forms">
    <form action="contact_code.php" enctype="multipart/form-data" onsubmit="return validate()" name="input" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" name="cnt_name" id="name"><br>
        <label for="uname">Username:</label><br>
        <input type="text" name="cnt_uname" id="uname"><br>
        <label for="phone">Phone Number:</label><br>
        <input type="tel" pattern="[0-9]{10}" name="cnt_phone" id="phone"><br>
        <label for="Email">Email:</label><br>
        <input type="text" name="cnt_email" id="email"><br>
        <label for="address">Address:</label><br>
        <textarea name="cnt_address" rows="3" cols="20"></textarea><br>
        <label for="gender">Gender:</label><br>
        <select name="cnt_gender" id="gender">
            <option value="">None</option>
            <option value="1">Male</option>
            <option value="2">Female</option>
        </select><br>
        <input type="file" name="cnt_image" id="image"><br>
        <br>
        <div class="capbox">
            <div id="CaptchaDiv" style="background-image: url('x.jpg');background-size: 150px;background-repeat: no-repeat;"></div>
            <div class="capbox-inner">
                Enter captcha:<br>
                <button><a href="javascript:generate()">reload</a></button>
                <input type="hidden" id="txtCaptcha">
                <input type="text" name="CaptchaInput" id="CaptchaInput" size="15"><br>
            </div>
        </div>
        <br>
        <input type="submit" name="submit" value="Submit">
    </form> <br>
    <a href="employee_login.php" style="color: burlywood;">Employee Login</a><br>
    <a href="new_employee.php" style="color: burlywood;">Employee Registration</a>
</div>
    <br>
    <?php
    session_start();
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION["success"]);
    }
    ?>

</body>

</html>