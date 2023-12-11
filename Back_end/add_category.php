<!DOCTYPE html>
<html lang="en">

<head>

    <title>Add Category</title>
    <link rel="stylesheet" href="../Css_files/add_category.css">
    <link rel="stylesheet" href="../Css_files/admin_nav_bar.css">

</head>

<body>

    <?php
    if(!isset($_SESSION)){
        session_start();
    }
    include("./admin_nav_bar.php");
    ?>

    <main>
        <section class="field">
            <div class="title">
                <img src="../Images/micaby_supreme_logo.png" alt="Logo" class="logoImg">
                <h1>ADD CATEGORY</h1>
            </div>

            <form action="process_addcategory.php" method="post">
                <fieldset>

                    <p>
                        <label for="cat_name">Category Name</label><br>
                        <input type="text" name="new_catName" id="cat_name">
                        <br>
                    </p>

                    <input type="submit" value="ADD CATEGORY" id="add">
                    <p class="back"><a href="./admin_page.php">Back</a></p>
                </fieldset>
            </form>

        </section>

        <img src="../Images/add-category-back.jpg" alt="img" id="back-img">
    </main>
</body>

</html>