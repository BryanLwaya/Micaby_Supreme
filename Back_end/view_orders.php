<?php

require("../connect.php");

ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);

if (!isset($_SESSION)) {
    session_start();
}


$sql = "SELECT * FROM tbl_orderdetails INNER JOIN tbl_products ON tbl_orderdetails.product_id=tbl_products.product_id INNER JOIN tbl_order ON tbl_orderdetails.order_id=tbl_order.order_id INNER JOIN customer ON tbl_order.Customer_ID=customer.Customer_ID WHERE order_status=3";

$result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>View Orders</title>
    <link rel="stylesheet" href="../Css_files/view_users.css">
    <link rel="stylesheet" href="../Css_files/history_user.css">

</head>

<body>
    

    <div class="contents">
        <table class="cart-tbl">
            
            <thead>
            <tr class="head">
                <th colspan="9">
                    <h2>ALL ORDERS</h2>
                </th>
            </tr>
                <tr class="headers">
                    <th></th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Customer Name</th>
                    <th>Date Purchased</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $counter = 0;
                $total = 0;

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                        $counter++;

                        $fname = $row['Cust_fname'];
                        $sname = $row['Cust_sname'];
                        $cart_image = $row['img_dir'];
                        $cart_name = $row['Product_name'];
                        $cart_description = $row['Product_description'];
                        $cart_price = $row['Unit_price'];
                        $quantity = $row['order_quantity'];
                        $sub_total = $quantity * $cart_price;
                        $total = $total + $sub_total;
                        $date = $row['Date_purchased'];
                        $details_id = $row['orderdetails_id'];
                ?>
                        <tr>
                            <td id='cart-number' class='caption'><?php echo $counter ?></td>
                            <td><?php echo "<img src='../$cart_image' width='100px' height='100px'>"; ?></td>
                            <td><?php echo $cart_name; ?></td>
                            <td><?php echo $cart_description; ?></td>
                            <td>Ksh. <?php echo $cart_price; ?></td>
                            <td><?php echo $quantity; ?> </td>
                            <td>Ksh. <?php echo $sub_total; ?></td>
                            <td><?php echo $fname . " " . $sname; ?></td>
                            <td><?php echo $date?></td>

                        </tr>

                <?php
                    }
                }
                ?>
            </tbody>
        </table>

        <div class="stats">
            <?php
            echo "<p class='cart-total'>Total Amount Paid: <span><small>Ksh. </small>$total</span></p>";
            ?>
            <a href="./admin_page.php" id='shop-btn'><button class='primary-btn'>Back</button></a>

        </div>

    </div>
    <!-- <a href="#"><button class='primary-btn' id='checkout-btn'>Proceed to checkout</button></a> -->
</body>

</html>