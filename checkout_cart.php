<?php

require("connect.php");

ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);

if (!isset($_SESSION)) {
    session_start();
    $user_id = $_SESSION['Customer_ID'];
}



$sql_user = "SELECT * FROM customer WHERE Customer_ID=$user_id";
$rs_user = mysqli_query($conn, $sql_user);
echo mysqli_error($conn);

$row = mysqli_fetch_assoc($rs_user);
$firstname = $row['Cust_fname'];
$lastname = $row['Cust_sname'];
$email = $row['Cust_email'];

if (isset($_POST['checkout'])) {
    $search_orderId = $_POST['order_id'];
    $sql = "UPDATE tbl_order SET order_status=2 where customer_ID=$user_id and order_id=$search_orderId";
    mysqli_query($conn, $sql);
    echo mysqli_error($conn);
}

$sql1 = "SELECT * FROM tbl_orderdetails INNER JOIN tbl_products ON tbl_orderdetails.Product_ID=tbl_products.Product_ID INNER JOIN tbl_order ON tbl_orderdetails.order_id=tbl_order.order_id WHERE Customer_ID=$user_id AND order_status=2";
$result1 = mysqli_query($conn, $sql1);

$total = 0;
$total_prod = 0;
$order_id;

if (mysqli_num_rows($result1) > 0) {
    while ($row = mysqli_fetch_assoc($result1)) {
        $order_id = $row['order_id'];
        $cart_price = $row['product_price'];
        $quantity = $row['order_quantity'];
        $total_prod += $quantity;
        $sub_total = $quantity * $cart_price;
        $total = $total + $sub_total;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>CheckOut</title>
    <link rel="stylesheet" href="./Css_files/checkout.css">
    <link rel="stylesheet" href="./Css_files/main-header.css">

</head>

<body>
    <?php include("./main-header.php"); ?>

    <form action="process_checkout.php" method="post">

        <div class="form_layout">
            <div class="title">
                <img src="Images/logo.png" alt="Logo" class="logoImg">
                <h1>CHECKOUT</h1>
            </div>
            <hr>
            <section class="outline">
                <h1 class="title">Shipping Details</h1>
                <hr width="220px"><br>
                <div class="items">
                    <p class="fname">
                        <label for="fname">First name</label><br>
                        <input type="text" name="user_fname" id="fname" value="<?php echo $firstname; ?>">
                    </p>

                    <p class="sname">
                        <label for="sname">Surname</label><br>
                        <input type="text" name="user_sname" id="sname" value="<?php echo $lastname; ?>">
                    </p>
                </div>

                <!-- <div class="user-info"> -->
                <div class="items">
                    <p class="email">
                        <label for="mail">Email Address</label><br>
                        <input type="email" name="user_mail" id="mail" value="<?php echo $email; ?>">
                    </p>

                    <p class="zip">
                        <label for="zip">Zip Code</label><br>
                        <input type="number" name="user_zip" id="zip">
                    </p>
                </div>

                <div class="items">
                    <p class="Postal Code">
                        <label for="Postal Code">Postal Code</label><br>
                        <input type="number" name="user_postal" id="Postal Code" value="<?php $email; ?>">
                    </p>

                    <p class="Postal Address">
                        <label for="Postal Address">Postal Address</label><br>
                        <input type="number" name="user_post_address" id="Postal Address">
                    </p>
                </div>

                <div class="items">
                    <p class="city">
                        <label for="city">City</label><br>
                        <input type="text" name="user_city" id="city" value="<?php $email; ?>">
                    </p>

                    <p class="Home Address">
                        <label for="Home Address">Home Address</label><br>
                        <input type="text" name="user_home_address" id="Home Address">
                    </p>
                </div>

                <!-- </div> -->
                <fieldset>
                    <legend>
                        <h4><?php echo $firstname; ?>'s Order</h4>
                    </legend>
                    <table>
                        </tr>
                        <tr>
                            <td>Number of products:</td>
                            <td><?php echo $total_prod; ?></td>
                        </tr>
                        <tr>
                            <td>Total Price:</td>
                            <td><?php echo $total; ?></td>
                        </tr>
                    </table>

                </fieldset>



                <h1 class="title">Payment Details</h1>
                <hr width="220px"><br>
                <p class="payment">
                    <label for="payment">Choose your preferred method of Payment:</label><br>

                    <input type="radio" name="user_pay" id="M-Pesa" value="101" checked>
                    <label for="M-Pesa">M-Pesa</label><br>

                    <input type="radio" name="user_pay" id="Visa Card" value="102">
                    <label for="Visa Card">Visa Card</label><br>

                    <input type="radio" name="user_pay" id="MasterCard" value="103">
                    <label for="MasterCard">MasterCard</label><br>

                    <input type="radio" name="user_pay" id="Pay Pal" value="104">
                    <label for="Pay Pal">Pay Pal</label><br>
                </p>

                <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
                <input id="button" type="submit" name="checkout" value="COMPLETE CHECKOUT">
            </section>
            
    </form>

    <form action="./cart.php" method="post">
        <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
        <input type="submit" id="button" value="Back" name="back" width="auto">
    </form>

</body>

</html>