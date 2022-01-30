<?php
include('config.php');
if(isset($_POST['submit'])){
 $name=$_POST['cnt_name'];
 $uname=$_POST['cnt_uname'];
 $phone=$_POST['cnt_phone'];
 $email=$_POST['cnt_email'];
 $address=$_POST['cnt_address'];
 $gender=$_POST['cnt_gender'];
 $image_name=$_FILES['cnt_image']['name'];
 $tmp_name=$_FILES['cnt_image']['tmp_name'];
 $error=$_FILES['cnt_image']['error'];
 if($error <> 0){
    echo "Unknown error"; 
    exit;
 }
 else{
    $img_ex=pathinfo($image_name,PATHINFO_EXTENSION);
    $img_ex=strtolower($img_ex);
    $allowed=array("jpg","jpeg","png");
    if(in_array($img_ex,$allowed)){
        $new_image=uniqid("IMG",true).'.'.$img_ex;
        $img_upload_path='uploads/'.$new_image;
        move_uploaded_file($tmp_name,$img_upload_path);
    }
 }

$query="INSERT INTO contacts (`cnt_name`,`cnt_image`,`cnt_uname`,`cnt_phone`,`cnt_email`,`cnt_address`,`cnt_gender`)
 VALUES ('$name','$new_image','$uname','$phone','$email','$address','$gender')";
if(mysqli_query($conn,$query)){
    session_start();
    $_SESSION['success']="Registration Complete, we will get back to you soon";
   header('Location: index.php');
}
else{
    session_start();
    $_SESSION['success']="Submisstion Error";
    header('Location: index.php');
}}

if(isset($_POST['emp_new'])){
 $id=$_POST['emp_id'];
 $name=$_POST['emp_name'];
 $uname=$_POST['emp_uname'];
 $password=base64_encode($_POST['emp_password']);
 $phone=$_POST['emp_phone'];
 $email=$_POST['emp_email'];
 $addhar=$_POST['emp_addhar_number'];
 $pan=$_POST['emp_pan_number'];
 $image_name=$_FILES['emp_picture']['name'];
 $tmp_name=$_FILES['emp_picture']['tmp_name'];
 $error=$_FILES['emp_picture']['error'];
 if($error <> 0){
    echo "Unknown error"; 
    exit;
 }
 else{
    $img_ex=pathinfo($image_name,PATHINFO_EXTENSION);
    $img_ex=strtolower($img_ex);
    $allowed=array("jpg","jpeg","png");
    if(in_array($img_ex,$allowed)){
        $new_image=uniqid("IMG",true).'.'.$img_ex;
        $img_upload_path='uploads/'.$new_image;
        move_uploaded_file($tmp_name,$img_upload_path);
    }
 }

$query="INSERT INTO `employee`(`emp_cnt_id`, `emp_name`, `emp_uname`, `emp_password`, `emp_phone`, 
`emp_email`, `emp_addhar_number`, `emp_pan_number`, `emp_picture`) VALUES ('$id','$name','$uname','$password','$phone','$email','$addhar','$pan','$new_image')";
if(mysqli_query($conn,$query)){
    session_start();
    mysqli_query($conn,"INSERT INTO employee_log (`log_emp_id`,`log_event`) VALUES ('$id','8')");
    $_SESSION['success']="Employee Registration Complete";
   header('Location: new_employee.php');
}
else{
    session_start();
    $_SESSION['success']="contact Saved successfully";
}

}
if(isset($_POST['update'])){
 $name=$_POST['cnt_name'];
 $uname=$_POST['cnt_uname'];
 $phone=$_POST['cnt_phone'];
 $email=$_POST['cnt_email'];
 $address=$_POST['cnt_address'];
 $gender=$_POST['cnt_gender'];
 $id=$_POST['cnt_id'];
 if($_FILES['cnt_image']['name']){
 $image_name=$_FILES['cnt_image']['name'];
 $tmp_name=$_FILES['cnt_image']['tmp_name'];
 $error=$_FILES['cnt_image']['error'];
 if($error <> 0){
    echo "Unknown error"; 
    exit;
 }
 else{
    $img_ex=pathinfo($image_name,PATHINFO_EXTENSION);
    $img_ex=strtolower($img_ex);
    $allowed=array("jpg","jpeg","png");
    if(in_array($img_ex,$allowed)){
        $new_image=uniqid("IMG",true).'.'.$img_ex;
        $img_upload_path='uploads/'.$new_image;
        move_uploaded_file($tmp_name,$img_upload_path);
    }
 }}
 else{
     $query=mysqli_query($conn,"select cnt_image from contacts where cnt_id='$id'");
     $result=mysqli_fetch_assoc($query);
     $new_image=$result['cnt_image'];
 }
 session_start();
 $emp_id=$_SESSION['emp_id'];
$query="UPDATE contacts SET cnt_name='$name',cnt_image='$new_image',cnt_uname='$uname',cnt_phone='$phone',cnt_email='$email',cnt_address='$address',cnt_gender='$gender' WHERE cnt_id='$id'";
if(mysqli_query($conn,$query)){
    mysqli_query($conn,"INSERT INTO employee_log (`log_emp_id`,`log_event`,`log_edited_cnt_id`) VALUES ('$emp_id','2','$id')");
   header('Location: success.php');
}
else{
    echo "error";
}
}
if(isset($_GET['delete'])){ 
$id=$_GET['delete'];
mysqli_query($conn,"DELETE FROM contact_followup WHERE cnf_cnt_id='$id'");
$query="DELETE FROM contacts WHERE cnt_id='$id'";
session_start();
$emp_id=$_SESSION['emp_id'];
if(mysqli_query($conn,$query)){
    mysqli_query($conn,"INSERT INTO employee_log (`log_emp_id`,`log_event`,`log_edited_cnt_id`) VALUES ('$emp_id','5','$id')");
   header('Location: success.php');
}
else{
    echo "error";
}
}

if(isset($_GET['status'])){
 $id=$_GET['status'];
 $status=$_GET['stat'];
 session_start();
 $emp_id=$_SESSION['emp_id'];
 if($status){
     $status=0;
     mysqli_query($conn,"INSERT INTO employee_log (`log_emp_id`,`log_event`,`log_edited_cnt_id`) VALUES ('$emp_id','4','$id')");
 }
 else{$status=1;
    mysqli_query($conn,"INSERT INTO employee_log (`log_emp_id`,`log_event`,`log_edited_cnt_id`) VALUES ('$emp_id','3','$id')");
}
$query="UPDATE contacts SET cnt_status='$status' WHERE cnt_id='$id'";
if(mysqli_query($conn,$query)){
   header('Location: success.php');
}
else{
    echo "error";
}
}

if(isset($_POST['login'])){
 $uname=$_POST['emp_uname'];
 $password=base64_encode($_POST['emp_password']);
 $query="select * from employee where emp_uname='$uname' and emp_password='$password' and emp_status=1";
 $result=mysqli_query($conn,$query);
 $result=mysqli_fetch_assoc($result);
 if($result){
    session_start();
    $_SESSION['emp_uname']=$uname;
    $_SESSION['emp_id']=$result['emp_cnt_id'];
    $emp_id=$_SESSION['emp_id'];
    mysqli_query($conn,"INSERT INTO employee_log (`log_emp_id`,`log_event`) VALUES ('$emp_id','1')");
    header('Location: success.php');
 }
else{
    session_start();
    $_SESSION["error"]="Invalid username or Password";
    header('Location: employee_login.php');
    
}
}

if(isset($_POST['lead'])){
 $emp_id=$_POST['cnf_created_by'];
 $cnt_id=$_POST['cnf_cnt_id'];
 $followup_status=$_POST['cnf_followup_status'];
 $next_followup_date=$_POST['cnf_next_followup_date'];
 $followup_transfer=$_POST['cnf_followup_transfer'];
 $details=$_POST['cnf_details'];
$query="INSERT INTO `contact_followup`(`cnf_cnt_id`, `cnf_followup_status`, `cnf_next_followup_date`,
 `cnf_followup_transfer`, `cnf_details`, `cnf_created_by`) VALUES ('$cnt_id','$followup_status','$next_followup_date','$followup_transfer','$details','$emp_id')";
if(mysqli_query($conn,$query)){
   session_start();
   mysqli_query($conn,"INSERT INTO employee_log (`log_emp_id`,`log_event`,`log_edited_cnt_id`) VALUES ('$emp_id','6','$cnt_id')");
   $_SESSION['add_followup']="Followup Added Successfully";
   header('Location: lead.php');
}
else{
    echo "error";
}
}
if(isset($_GET['logout'])){
   session_start();
   $emp_id=$_SESSION['emp_id'];
   mysqli_query($conn,"INSERT INTO employee_log (`log_emp_id`,`log_event`) VALUES ('$emp_id','7')");
   session_unset();
   session_destroy();
   header('Location: employee_login.php');
}
