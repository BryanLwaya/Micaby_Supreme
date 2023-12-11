<?php

if (!isset($_SESSION)) {
    session_start();
}

require("../connect.php");

$sql = "SELECT * FROM tbl_categories";
$all_ctgr = mysqli_query($conn, $sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>Add SubCategory</title>
    <link rel="stylesheet" href="../Css_files/add_subCategory.css">
    <link rel="stylesheet" href="../Css_files/admin_nav_bar.css">

</head>

<body>

    <?php include_once("./admin_nav_bar.php"); ?>

    <section class="field">
        <div class="title">
            <img src="../Images/logo.png" alt="Logo" class="logoImg">
            <h1>ADD SUB-CATEGORY</h1>
        </div>

        <form action="process_add_subcategory.php" method="post">
            <fieldset>

                <label for="subCat_name">SubCategory Name</label><br>
                <input type="text" name="new_subCatName" id="subCat_name">
                <br>

                <label for="category">Category</label><br>
                <select name="category_id" id="category">
                    <!-- <option value="">- Select -</option> -->
                    <?php
                    while ($category = mysqli_fetch_assoc($all_ctgr)) :;
                    ?>
                        <option value="<?php echo $category["Category_ID"]; ?>">
                            <?php
                            echo $category["Category_name"];
                            ?>
                        </option>
                    <?php
                    endwhile;
                    ?>
                </select>

                <input type="submit" value="ADD SUB CATEGORY" id="add">
                <p><a href="./admin_page.php">Back</a></p>
            </fieldset>
        </form>
    </section>

    <img src="../Images/add-subcategory-back.jpg" alt="img" id="back-img">
</body>

</html>