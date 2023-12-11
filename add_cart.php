<?php

require("connect.php");

if(!isset($_SESSION))
{
    session_start();
}

function addProduct($prodId,$orderID){
    global $conn;

    $sql_search = "SELECT * FROM tbl_products WHERE Product_id=$prodId";
    $search_rs = mysqli_query($conn,$sql_search);

    if(mysqli_num_rows($search_rs)>0){
        $row = mysqli_fetch_assoc($search_rs);
        $prod_price = $row['Unit_price'];
        $quantity = 1;
        $subtotal = $prod_price*$quantity;
    }

    $sql_product = "INSERT INTO tbl_orderdetails(order_id,product_id,product_price,order_quantity,orderdetails_total,created_at,updated_at,is_deleted) values($orderID,$prodId,$prod_price,$quantity,$subtotal,now(),now(),0)";
    $result_prod = mysqli_query($conn,$sql_product);
    echo mysqli_error($conn);

    return $result_prod;
}

function addCart($id){
    global $conn;

    $user_id = $_SESSION['Customer_ID'];
    $sql_order = "SELECT * FROM tbl_order WHERE Customer_ID=$user_id AND order_status=1";
    $result_order = mysqli_query($conn,$sql_order);
    echo mysqli_error($conn);

    if(mysqli_num_rows($result_order)>0){
        $data = mysqli_fetch_assoc($result_order);        
        addProduct($id,$data['order_id']);
        header("location:".$_SERVER['HTTP_REFERER']."");

    } else {        
        $sql = "INSERT INTO tbl_order(Customer_ID,order_amount,order_status,created_at,updated_at,is_deleted) VALUES ($user_id,1,1,now(),now(),0)";
        mysqli_query($conn,$sql);
        
        $order_id = mysqli_insert_id($conn);
        addProduct($id,$order_id);
        header("location:".$_SERVER['HTTP_REFERER']."");
    }
}
if(isset($_GET['prod_id'])){
    $product_id = $_GET['prod_id'];
    addCart($product_id);
}
?>