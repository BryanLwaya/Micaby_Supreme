<?php
require("connect.php");
if (!isset($_SESSION)) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Products</title>
    <link rel="stylesheet" href="Css_files/main-header.css">
    <link rel="stylesheet" href="Css_files/products_page.css">

</head>

<body>

    <!-- Navigation Bar -->
    <?php include_once("main-header.php"); ?>

    <!-- Products -->
    <article>
        <img src="./Images/productPage_back.png" alt="" id="prod-page-img">
        <h2 class="feat-title">PRODUCTS</h2>

        <section class="categories">

            <?php
            $category_sql = "SELECT * FROM tbl_categories";
            $result1 = mysqli_query($conn, $category_sql);

            if (mysqli_num_rows($result1) > 0) {
                while ($row = mysqli_fetch_assoc($result1)) {
                    $cat_id = $row['Category_ID'];

            ?>

                    <div class="categories-title" id="<?php echo $row['Category_name'] ?>">
                        <h2><?php echo $row['Category_name'] ?></h2>
                        <p>Try our various <?php echo $row['Category_name'] ?> Clothing</p>
                    </div>

                    <div class="category-items">
                        <?php
                        $group_sql = "SELECT * FROM tbl_products INNER JOIN tbl_categories ON tbl_products.category_id=tbl_categories.category_id WHERE tbl_products.category_id=$cat_id";

                        $group_rs = mysqli_query($conn, $group_sql);
                        if (mysqli_num_rows($group_rs) > 0) {
                            while ($row2 = mysqli_fetch_assoc($group_rs)) {
                        ?>
                                <div class="cat-content">
                                    <p><?php echo '<img src="' . $row2['img_dir'] . '" width="180px" height="180px">'; ?></p>
                                    <p style="font-weight: bold;"><?php echo $row2['Product_name']; ?></p>
                                    <p style="font-weight: bold;">Ksh.<?php echo $row2['Unit_price']; ?></p>
                                    <p> ★ ★ ★ ★ ★ </p>

                                    <div class="cat-btns">
                                        <?php
                                        if (isset($_SESSION['Customer_ID'])) {
                                        ?>
                                            <form action="add_cart.php">
                                                <input type="hidden" name="prod_id" id="prod_id" value="<?php echo $row2['Product_ID'] ?>">
                                                <input type="submit" value="Add to Cart" class="button">
                                            </form>
                                        
                                        <!-- <input type="submit" value="View" class="button"> -->
                                        <?php 
                                        } else {
                                            echo '<a href="./login.php" class="button">Add to Cart</a>';
                                        }                                        
                                        ?>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>

            <?php
                }
            }

            ?>

        </section>
    </article>


</body>

</html>