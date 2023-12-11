<?php

require("connect.php");

ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);

if (!isset($_SESSION)) {
    session_start();
}

$searchId = $_SESSION['Customer_ID'];

$sql = "SELECT * FROM tbl_orderdetails INNER JOIN tbl_products ON tbl_orderdetails.product_id=tbl_products.product_id INNER JOIN tbl_order ON tbl_orderdetails.order_id=tbl_order.order_id WHERE order_status=3 AND Customer_ID=$searchId";

$result = mysqli_query($conn, $sql);

$user_name = $_SESSION['Cust_fname'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Purchase History</title>
    <link rel="stylesheet" href="Css_files/main-header.css">
    <link rel="stylesheet" href="Css_files/history_user.css">
    <link rel="stylesheet" href="Css_files/view_products.css">
</head>

<body>
    <?php
    include_once("main-header.php");
    ?>

    <div class="contents">
        <table class="cart-tbl">
            <h3><?php echo $user_name; ?>'s Purchase History</h3>
            <hr>
            <thead>
                <tr class="headers">
                    <th></th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
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
                            <td><?php echo "<img src='$cart_image' width='100px' height='100px'>"; ?></td>
                            <td><?php echo $cart_name ?></td>
                            <td><?php echo $cart_description ?></td>
                            <td>Ksh. <?php echo $cart_price ?></td>
                            <td><?php echo $quantity ?> </td>
                            <td>Ksh. <?php echo $sub_total ?></td>
                            <td><?php echo $date ?></td>

                        </tr>

                <?php
                    }
                }
                ?>
            </tbody>
        </table>

        <div class="stats">
            <?php
            echo "<p class='cart-total'>Total Spent: <span><small>Ksh. </small>$total</span></p>";
            ?>
            <a href="./products_page.php" id='shop-btn'><button class='primary-btn'>Continue Shopping ➜</button></a>

        </div>

    </div>
    <!-- <a href="#"><button class='primary-btn' id='checkout-btn'>Proceed to checkout</button></a> -->
</body>

</html>