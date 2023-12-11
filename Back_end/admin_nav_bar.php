<aside class="sidebar">
    <div class="logo-container">
        <img src="../Images/micaby_supreme_logo.png" alt="Logo" class="logoImg">
        <h3 class="logo">MICABY<br><span>Supreme</span></h3>
        <h1 id="admin"><span>A</span>dmin</h1>
    </div>
    <hr>

    <div class="profile">
        <?php
        if (isset($_SESSION['admin_id'])) {
            echo '
            <p id="user-profile"><img src="../' . $_SESSION['admin_img'] . '"></p>

            <p id="prof-name">Welcome,<br><span>' . $_SESSION['admin_fname'] . ' ' . $_SESSION['admin_sname'] . '</span></p>
            ';
        }
        ?>
    </div>

    <ul>
        <li><a href="./add_category.php">Add Category <img src="../Icons/categories-svgrepo-com.svg" alt="AddCtgr_img"></a></li>
        <li><a href="./add_subcategory.php">Add SubCategory <img src="../Icons/category-new-svgrepo-com.svg" alt="AddSubCtgr_img"></a></li>
        <li><a href="./add_product.php">Add Product <img src="../Icons/clothes-tag-svgrepo-com.svg" alt="AddProd_img"></a></li>
        <li><a href="./view_products.php">View Products<img src="../Icons/clothes-14-svgrepo-com.svg" alt="View Products"></a></li>
        <li><a href="./view_users.php">View Users <img src="../Icons/user-svgrepo-com.svg" alt="View Users"></a></li>
        <li><a href="./view_orders.php">View Orders <img src="../Icons/clothes-tag-svgrepo-com.svg" alt="View Users"></a></li>
    </ul>
    <a href="../logout.php" id="logout-btn"><img src="../Icons/logout-svgrepo-com.svg" alt="Cart" class="logoutImg">Logout</a>
</aside>