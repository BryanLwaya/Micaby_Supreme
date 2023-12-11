<?php

require("connect.php");

// echo "<pre>";
// print_r($_POST);
// echo "<br>";
// print_r($_FILES);

// echo "</pre>";

$first_name = $_POST["user_fname"];
$last_name = $_POST["user_sname"];
$user_mail = $_POST["user_mail"];
$user_contact = $_POST["user_contact"];
$user_password = md5($_POST["user_pass"]);

$user_img = $_FILES['user_img']['name'];
$img_tmpname = $_FILES['user_img']['tmp_name'];
$img_dir = "User_images/". $user_img;

$role = $_POST['user_role'];

if($role=='customer'){
    $sql = "INSERT INTO Customer (Cust_fname, Cust_sname, Cust_email, Cust_contact, Cust_pass,Cust_img) VALUES ('$first_name','$last_name','$user_mail','$user_contact','$user_password','$img_dir')";
} else{
    $sql = "INSERT INTO tbl_admin (admin_fname, admin_sname, admin_email, admin_tel, admin_pass,admin_img) VALUES ('$first_name','$last_name','$user_mail','$user_contact','$user_password','$img_dir')";
}

if(mysqli_query($conn,$sql)){
    move_uploaded_file($img_tmpname,$img_dir);
    // header("location:".$_SERVER['HTTP_REFERER']."");
    header("location: ./login.php");

} else{
    echo "Error: " .$sql ."<br>" .mysqli_error($conn);
}

