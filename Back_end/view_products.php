<?php

require("../connect.php");

$query = "SELECT * FROM tbl_products";
$result = mysqli_query($conn, $query);

// if(mysqli_num_rows($result) > 0){
// while($images = mysqli_fetch_assoc($result)){
//     echo ($images['Product_name'])."<br>";
//     echo "<img src='../{$images['img_dir']}' width='200px' height='200px' object-fit='cover'>"."<br><br><br>";
// }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>View Products</title>
    <link rel="stylesheet" href="../Css_files/view_products.css">

</head>

<body>
    <table>

        <thead>
            <tr id="head">
                <th colspan="10">
                    <h2>PRODUCTS</h2>
                </th>
            </tr>

            <tr class="headers">
                <th>Product No</th>
                <th></th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Updated At</th>
                <th>Is Deleted</th>
                <th colspan="2" style="text-align: center;">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($images = mysqli_fetch_assoc($result)) {

            ?>
                    <tr>
                        <td><?php echo $images['Product_ID'] ?></td>
                        <td><?php echo "<img src='../{$images['img_dir']}' width='100px' height='100px'>"; ?></td>
                        <td><?php echo $images['Product_name'] ?></td>
                        <td><?php echo $images['Product_description'] ?></td>
                        <td><?php echo $images['Unit_price'] ?></td>
                        <td><?php echo $images['available_quantity'] ?></td>
                        <td><?php echo $images['Updated_at'] ?></td>
                        <td><?php if ($images['is_deleted'] == 0) {
                                echo "NO";
                            } else {
                                echo "YES";
                            } ?>
                        </td>
                        <td>
                            <form action="edit_products.php" method="post">
                                <input type="hidden" name="prod_id" id="prod_id" value="<?php echo $images['Product_ID'] ?>">
                                <input type="submit" value="Edit" name="edit" class="button">
                            </form>
                        </td>
                        <td>
                            <form action="edit_products.php" method="post">
                                <input type="hidden" name="prod_id" id="prod_id" value="<?php echo $images['Product_ID'] ?>">
                                <input type="submit" value="Delete" name="delete" class="button">
                            </form>
                        </td>
                    </tr>

            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <a href="./admin_page.php" class="button">Back</a>
</body>

</html>