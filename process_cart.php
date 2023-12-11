<?php
require("connect.php");

if (isset($_POST['quantity'])) {
    $details_id = $_POST['details_id'];
    $quantity = $_POST['quantity'];

    $sql2 = "UPDATE tbl_orderdetails SET order_quantity='$quantity', updated_at=now(), orderdetails_total=tbl_orderdetails.product_price*order_quantity WHERE orderdetails_id=$details_id";
    
    mysqli_query($conn, $sql2);
    echo mysqli_error($conn);
    header("location:./cart.php");
}
if (isset($_POST['delete'])) {
    $details_id = $_POST['details_id'];
    mysqli_query($conn, "DELETE FROM tbl_orderdetails WHERE orderdetails_id=$details_id");
    header("location:./cart.php");
}

?>