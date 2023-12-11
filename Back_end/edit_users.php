<?php

require("../connect.php");


$cust_id;
$first_name;
$last_name;
$user_mail;
$user_contact;

if (isset($_POST['edit'])) {
    $c_id = $_POST['cust_id'];

    $sql1 = "SELECT * FROM customer WHERE Customer_ID=$c_id";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1) == 1) {
        $row1 = mysqli_fetch_assoc($result1);

        $cust_id = $row1["Customer_ID"];
        $first_name = $row1["Cust_fname"];
        $last_name = $row1["Cust_sname"];
        $user_mail = $row1["Cust_email"];
        $user_contact = $row1["Cust_contact"];
    }
}

if (isset($_POST['update'])) {
    $cust_id = $_POST['user_id'];
    $Cust_fname = $_POST["new_prodName"];
    $Cust_sname = $_POST["new_prodDescription"];
    $Cust_email = $_POST["unit_price"];
    $Cust_contact = $_POST["add_qty"];

    $update_qr = "UPDATE customer SET Cust_fname='$Cust_fname',Cust_sname='$Cust_sname',Cust_email='$Cust_email',Cust_contact='$Cust_contact' WHERE Customer_ID=$cust_id";
    mysqli_query($conn, $update_qr);
    mysqli_error($conn);

    header("location: ./view_users.php");
}

// if (isset($_POST['delete'])) {
//     $prod_id = $_POST['prod_id'];

//     $del_sql = "DELETE FROM tbl_products WHERE Product_ID=$prod_id";
//     mysqli_query($conn, $del_sql);
//     header("location:./view_products.php");
// }


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>Edit Products</title>
    <link rel="stylesheet" href="../Css_files/add_product.css">

</head>

<body>

    <section class="outline">
        <div class="title">
            <img src="../Images/logo.png" alt="Logo" class="logoImg">
            <h1>EDIT USERS</h1>
        </div>
        <hr>

        <form action="edit_users.php" method="post" enctype="multipart/form-data">
            <p id="key">Key: <span class="required">*</span>Required</p>

            <input type="hidden" name="user_id" id="user_id" value="<?php echo $cust_id; ?>">

            <p>
                <label for="prod_name">First Name<span class="required">*</span></label><br>
                <input type="text" name="new_prodName" id="prod_name" value="<?php echo $first_name ?>" required>
                <br>
            </p>

            <p>
                <label for="prod_desc">Second Name<span class="required">*</span></label><br>
                <textarea name="new_prodDescription" id="prod_desc" required><?php echo $last_name ?></textarea>
                <br>
            </p>


            <div class="details1">
                <p>
                    <label for="price">Email<span class="required">*</span></label><br>
                    <input type="text" name="unit_price" id="price" value="<?php echo $user_mail ?>" required>
                    <br>
                </p>

                <p>
                    <label for="qty">Contact<span class="required">*</span></label><br>
                    <input type="tel" name="add_qty" id="qty" value="<?php echo $user_contact ?>" required>
                    <br>
                </p>

            </div>


            <input type="submit" value="UPDATE PRODUCT" name="update" class="button">
            <p><a href="admin_page.php">Back</a></p>
        </form>
    </section>

</body>

</html>