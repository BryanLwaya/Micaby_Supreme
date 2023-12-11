<?php

require("./connect.php");

$pay_type=$_POST['user_pay'];
$order_id=$_POST['order_id'];

$sql="UPDATE tbl_order SET payment_type=$pay_type, order_status=3, Date_purchased=now() WHERE order_id=$order_id";
if(mysqli_query($conn,$sql)){
    echo "Order Successful";
    header("location: ./history_user.php");
} else {
echo mysqli_error($conn);
}
