<header>
<?php
if(!isset($_SESSION)){
    session_start();
}

?>
    <div class="logo-container">
        <img src="Images/micaby_supreme_logo.png" alt="Logo" class="logoImg">
        <h2 class="logo">MICABY<br><span>Supreme</span></h2>
    </div>
    <nav>
        <ul class="navlinks">
            <li><a href="index.php">Home</a></li>
            <li><a href="products_page.php">Products</a></li>
            <li><a href="index.php#about">About Us</a></li>
            <li><a href="index.php#other-info">Contact Us</a></li>
        </ul>
    </nav>
    <div class="nav-button-icon">
        <input type="search" name="searchresult" placeholder="Search" class="search">
        <?php
        if (isset($_SESSION['Customer_ID'])) {
            echo '<a id="user-profile"><img src="' . $_SESSION['Cust_img'] . '"><br><span>Welcome</span>, ' . $_SESSION['Cust_fname'] . '</a>';
        } else {
        echo '
            <a href="registration.php" id="reg-btn">Sign Up</a>
            <a href="login.php" class="button">LOGIN</a>';
        }

        if (isset($_SESSION['Customer_ID'])) {
        ?>
        <a href="./cart.php" id="head-btn"><img src="./Icons/grocery-trolley-svgrepo-com.svg" alt="Cart" class="cartImg"><br>Cart</a>

        <?php
        }else{
            echo '<a href="./login.php" id="head-btn"><img src="./Icons/grocery-trolley-svgrepo-com.svg" alt="Cart" class="cartImg"><br>Cart</a>';
        }

        if (isset($_SESSION['Customer_ID'])) {
            echo '
        <a href="./logout.php" id="head-btn"><img src="./Icons/logout-svgrepo-com.svg" alt="logout" class="logoutImg"><br>Logout</a>';
        }
        ?>
    </div>

</header>