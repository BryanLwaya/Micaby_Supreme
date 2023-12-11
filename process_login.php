<?php

require("connect.php");

if (!isset($_SESSION)) {
    session_start();
}

$email = $_POST['user_mail'];
$pass = md5($_POST['user_pass']);

$sql_cust = "SELECT * FROM customer WHERE Cust_email='$email' AND Cust_pass='$pass' LIMIT 1";
$result1 = mysqli_query($conn, $sql_cust);

if (mysqli_num_rows($result1) == 1) {
    $row = mysqli_fetch_assoc($result1);

    $_SESSION['Cust_fname'] = $row['Cust_fname'];
    $_SESSION['Customer_ID'] = $row['Customer_ID'];
    $_SESSION['Cust_img'] = $row['Cust_img'];

    header("location: ./index.php");


} else {
    $sql_admin = "SELECT * FROM tbl_admin WHERE admin_email='$email' AND admin_pass='$pass' LIMIT 1";
    $result2 = mysqli_query($conn, $sql_admin);

    if (mysqli_num_rows($result2) == 1) {
        $row = mysqli_fetch_assoc($result2);

        $_SESSION['admin_fname'] = $row['admin_fname'];
        $_SESSION['admin_sname'] = $row['admin_sname'];
        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['admin_img'] = $row['admin_img'];

        header("location: ./Back_end/admin_page.php");
    }
}
