<?php
require("connect.php");
if(!isset($_SESSION))
{
    session_start();
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>HomePage</title>
    <link rel="stylesheet" href="Css_files/style.css">
    <link rel="stylesheet" href="Css_files/main-header.css">

</head>

<body>
    <!-- Above the Fold -->
    <div class="abovefold">
    
        <!-- Navigation Bar -->
        <?php include("./main-header.php");?>

        <!-- Background Image -->
        <img src="Images/backgroundImg.jpg" alt="backImg" class="backImg">


        <!-- Headlines and CTA -->
        <div class="main-headline">

            <h1 id="headline">TAILORED FOR<br>YOU!</h1>

            <p>Modifying your wardrobe to a masterpiece.<br>
                We offer you new Trendy clothes designed for all your<br>
                likes and preferences.
            </p>
<?php 
 if (isset($_SESSION['Customer_ID'])) {
    ?>
            <a href="products_page.php">GET STARTED<img id="arrow" src="Icons/right-arrow-svgrepo-com.svg" alt="arrow"></a>
<?php
 } else {
    echo '<a href="./login.php">GET STARTED<img id="arrow" src="Icons/right-arrow-svgrepo-com.svg" alt="arrow"></a>';
 }
?>
        </div>

    </div>
    <!-- BENEFIT LIST -->

    <section class="benefit-list" id="about">
        <div class="benefit-images">
            <img src="Images/benefit-img1.jpg" alt="img1" id="img1">
            <img src="Images/benefit-img2.jpg" alt="img2" id="img2">
        </div>

        <div class="benefit-text">
            <div class="qlty">
                <h3>QUALITY STYLES
                    <hr>
                </h3>
                <p>Offering great quality with class</p><br>
            </div>
            <div class="trd">
                <h3>TRENDING
                    <hr>
                </h3>
                <p>We'll always keep you up to date<br>with the trends</p><br>
            </div>
            <div class="price">
                <h3>AFFORDABLE PRICING<hr></h3>
                <p>You can count on us when it comes to<br>
                    clothes that can fit in your budget.
                </p><br>
            </div>

            <a href="#" class="button">LEARN MORE</a>
        </div>
    </section>

    
    <section class="cust-reviews">
        <h3 class="review-title">Customer reviews</h3>

        <div class="review-box">
            <div class="user">
                <img src="Images/customer1-image.jpg" alt="User Image">
                <h5>Customer 1</h5>
            </div>

            <div class="comment">
                <h4 class="subject">EXCELLENT SERVICE</h4>

                <img src="Images/quotation-icon-33758.jpg" alt="Quote-img" width="9%">

                <p>I have bought multiple times from Micaby Supreme and I am beyond impressed. The quality of service
                    and the product quality are excellent. And I only made my purchase from the comfort of my home.
                    <br>
                    <br>
                    I completely recommend this site for anyone looking for great quality with excellent services.
                </p>

            </div>

            <!-- <img id="arr1" src="Images/arrow-icon-1178.png" alt="arrow">
            <img id="arr2" src="Images/arrow-icon-1178.png" alt="arrow">
            To be used for arrows -->
        </div>
    </section>

    <section class="trusted-by">
        <h3>WE ARE TRUSTED BY</h3>

        <div class="trustees">
            <img src="Images/jumia.png" alt="Jumia">
            <img id="l-v" src="Images/louis-vitton.png" alt="louis-vitton">
        </div>

    </section>

    <section class="specials">
        <div class="title">
            <h2 class="sp-title1">This<br>Week's</h2>
            <h2 class="sp-title2">Specials</h2>
        </div>

        <div class="sp-items">
            <div class="sp-images1">
                <img src="Images/navy-blue-bow-tie.jpg" alt="Navy Blue Bow-tie">
                <p><big>WAS</big> <span>KSH.<del>400</del></span> <big>NOW</big> <span>KSH.320</span></p>

            </div>

            <div class="sp-images2">
                <img src="Images/blazzer1.jpg" alt="Pacific Blue Blazer">

                <p><big>WAS</big> <span> KSH.<del>3,500</del></span> <big>NOW</big> <span>KSH.2,800</span></p>
            </div>

            <!-- <div class="discount-icons">
                <img id="disc-1" src="Images/20pcnt-off.png" alt="20% off">
                <img id="disc-2" src="Images/20pcnt-off.png" alt="20% off">
            </div> -->

        </div>
    </section>


    <footer id="other-info">
        <section class="col1">
            <div class="contacts">
                <h4 class="contacts-head">CONTACTS</h4>
                <p>Tell 1: 0711224578</p>
                <p>Tell 2: 0700001698</p>
                <br>
                <p>Email: <span>info@m_supreme.com</span></p>
                <br><br>
            </div>

            <div class="social-media">
                <h4 class="media-head">SOCIAL MEDIA</h4>

                <div class="facebook">
                    <img src="Icons/facebook-svgrepo-com.svg" alt="Facebook">
                    <p>Micaby Supreme Official</p>
                </div>

                <div class="instagram">
                    <img src="Icons/instagram-svgrepo-com.svg" alt="IG">
                    <p>msupreme_official</p>
                </div>

                <div class="twitter">
                    <img src="Icons/twitter-svgrepo-com.svg" alt="Twitter">

                    <p>@micabysupreme_ent</p>
                </div>
            </div>

            <p id="copyright">Copyright 2022 &copy; Micaby Supreme Enterprise, All Rights Reserved</p>
        </section>

        <section class="col2">
            <div class="products">
                <h4 class="products-head">PRODUCTS</h4>
                <p>Official Wear</p>
                <p>Casual Wear</p>
                <p>OutDoor Clothes</p>
                <p>Sports Wear</p>
                <p>African Wear</p>
                <p>Winter Collection - Coats<br>and Jackets</p>
                <br><br>
            </div>

            <div class="policy">
                <h4 class="policy-head">POLICY</h4>
                <p>Terms and Conditions</p>
                <p>Privacy Policy</p>
                <br><br>

            </div>
        </section>

        <div class="news">
            <h4 class="news-head">Subscribe to our NewsLetter</h4>
            <p>Always be up to date with our latest news and updates</p>
            <br>
            <input type="email" name="subscriber-email" placeholder="Enter Email">
            <a id="button" href="#">SUBMIT</a>
        </div>

    </footer>




</body>

</html>