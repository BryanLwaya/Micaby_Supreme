<?php

if(!isset($_SESSION)){
    session_start();
}

require("../connect.php");

$sql1 = "SELECT * FROM tbl_categories";
$all_ctgr = mysqli_query($conn,$sql1);

$sql2 = "SELECT * FROM tbl_subcategories";
$all_SubCtgr = mysqli_query($conn,$sql2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Add Product</title>
    <link rel="stylesheet" href="../Css_files/add_product.css">
    <link rel="stylesheet" href="../Css_files/admin_nav_bar.css">

</head>
<body>
    
    <section class="outline">
    <div class="title">
        <img src="../Images/logo.png" alt="Logo" class="logoImg">
        <h1>ADD PRODUCT</h1>
    </div>
<hr>

    <form action="process_addproduct.php" method="post" enctype="multipart/form-data">
        <p id="key">Key: <span class="required">*</span>Required</p>

        <p>
        <label for="prod_name">Product Name<span class="required">*</span></label><br>
        <input type="text" name="new_prodName" id="prod_name" required>
        <br>
        </p>

        <p>
        <label for="prod_desc">Product Description<span class="required">*</span></label><br>
        <textarea name="new_prodDescription" id="prod_desc" required>Description</textarea>
        <br>
        </p>        

        <p>
        <label for="prod_img">Product Image<span class="required">*</span></label><br>
        <input type="file" name="new_prodImg" id="prod_img" class="p_image" required>
        <br>
        </p>

        <div class="details1">
        <p>
        <label for="price">Unit Price<span class="required">*</span></label><br>
        <input type="number" name="unit_price" id="price" required>
        <br>
        </p>

        <p>
        <label for="qty">Quantity<span class="required">*</span></label><br>
        <input type="number" name="add_qty" id="qty" required>
        <br>
        </p>
        
        </div>
        
        <div class="selects">

            <p>
            <label for="category">Category<span class="required">*</span></label><br>
            <select name="category_id" id="category" required>
            <option value="">- Select -</option>
                <?php
                    while($category = mysqli_fetch_assoc($all_ctgr)):;
                ?>
                <option value="<?php echo $category["Category_ID"];
                ?>">
                    <?php
                        echo $category["Category_name"];
                    ?>
                </option>
                <?php
                    endwhile;
                ?>
            </select>
            </p>

            <p>
            <label for="subcategory">Sub-Category<span class="required">*</span></label><br>
            <select name="subcategory_id" id="subcategory" required>
                <option value="">- Select -</option>
            <?php
                    while($subcategory = mysqli_fetch_assoc($all_SubCtgr)):;
                ?>
                <option value="<?php echo $subcategory["SubCategory_ID"];
                ?>">
                    <?php
                        echo $subcategory["SubCategory_name"];
                    ?>
                </option>
                <?php
                    endwhile;
                ?>
            </select>
            <br>
            </p>     

        </div>

        <div class="dates">
            <p>
                <label for="created_at">Created at<span class="required">*</span></label><br>
                <input type="datetime-local" name="date_added" id="created_at" required>
                <br>
            </p>

            <p>
                <label for="updated_at">Updated at<span class="required">*</span></label><br>
                <input type="datetime-local" name="date_updated" id="updated_at" required>
                <br>
            </p>
        </div>

        <p>
        <label for="added_by">Added By<span class="required">*</span></label><br>
        <input type="text" name="admin_id" id="added_by" required>
        <br>
        </p>

        <input type="submit" value="ADD PRODUCT" class="button">
        <p><a href="./admin_page.php">Back</a></p>
    </form>
    </section>

</body>
</html>