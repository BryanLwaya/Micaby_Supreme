<?php

require("connect.php");

ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);

if (!isset($_SESSION)) {
    session_start();
}

$searchId = $_SESSION['Customer_ID'];


if (isset($_POST['back'])) {
    $order_id=$_POST['order_id'];
    $sql = "UPDATE tbl_order SET order_status=1 where Customer_ID=$searchId and order_id=$order_id";
    mysqli_query($conn, $sql);
    echo mysqli_error($conn);
}

$sql = "SELECT * FROM tbl_orderdetails INNER JOIN tbl_products ON tbl_orderdetails.product_id=tbl_products.product_id INNER JOIN tbl_order ON tbl_orderdetails.order_id=tbl_order.order_id WHERE order_status=1 AND Customer_ID=$searchId";
$result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Cart</title>
    <link rel="stylesheet" href="Css_files/main-header.css">
    <link rel="stylesheet" href="Css_files/cart.css">
    <link rel="stylesheet" href="Css_files/view_products.css">
</head>

<body>
    <?php
    include_once("main-header.php");
    ?>
    <section class="content">
        <table class="cart-tbl">

            <thead>
                <tr id="head">
                    <th colspan="8">
                        <h2>MY CART</h2>
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
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php
                $customer_id = $_SESSION['Customer_ID'];
                $counter = 0;
                $total = 0;

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                        $counter2 = $counter++;
                        $order_id = $row['order_id'];
                        $cart_image = $row['img_dir'];
                        $cart_name = $row['Product_name'];
                        $cart_description = $row['Product_description'];
                        $cart_price = $row['Unit_price'];
                        $quantity = $row['order_quantity'];
                        $sub_total = $quantity * $cart_price;
                        $total = $total + $sub_total;
                        $details_id = $row['orderdetails_id'];
                ?>
                        <tr>
                            <td id='cart-number' class='caption'><?php echo $counter ?></td>
                            <td><?php echo "<img src='$cart_image' width='100px' height='100px'>"; ?></td>
                            <td><?php echo $cart_name ?></td>
                            <td><?php echo $cart_description ?></td>
                            <td>Ksh. <?php echo $cart_price ?></td>
                            <td>
                                <div class="update-qty">
                                    <form action="process_cart.php" method="post">
                                        <input type='hidden' value='<?php echo $details_id ?>' name='details_id'>
                                        <input type='text' name='quantity' class='' value='<?php echo $quantity ?>'>
                                        <button type='submit'>Update</button>
                                    </form>
                                </div>
                            </td>
                            <td>Ksh. <?php echo $sub_total ?></td>
                            <td>
                                <div class="update-qty">
                                    <form action='process_cart.php' method='post'>
                                        <input type='hidden' value='<?php echo $details_id ?>' name='details_id'>
                                        <button type='submit' name='delete' class='warning-btn'>Remove</button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <div class="stats">
            <?php
            echo "<p class='cart-total'>Total Price: <span><small>Ksh. </small>$total</span></p>";
            ?>
            <form action="./checkout_cart.php" method="post">
                <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
                <input type="submit" class='primary-btn' id='checkout-btn' name='checkout' value="Proceed to checkout">

            </form>
            <div class="btns">
                <a href="./history_user.php" id='hist-btn'><button class='primary-btn'>View Purchase History</button></a>
                <a href="./products_page.php" id='shop-btn'><button class='primary-btn'>Continue Shopping ➜</button></a>
            </div>
        </div>

    </section>
</body>

</html>