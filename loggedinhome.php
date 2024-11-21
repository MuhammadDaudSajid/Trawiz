<?php
session_start();  // Start the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravWiz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header>
    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="#" class="logo"><span>TravWiz</span></a>

    <nav class="navbar">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#products">Places</a>
        <a href="#review">Review</a>

        <?php
            // Check if the user is logged in
            if (isset($_SESSION['usersuid'])) {
                echo "<a href='profile.php'>Hello, " . $_SESSION['usersuid'] . "!</a>";
                echo '<a href="logout.php">Logout</a>';  // Point the logout link to logout.php
            } else {
                echo '<a href="login.php">Login</a>';  // Show login link if not logged in
            }
        ?>
    </nav>

    <div class="icons">
        <span data-tooltip="Favourites" data-flow="top"> <a href="#" class="fas fa-heart"></a></span>
        <span data-tooltip="Cart" data-flow="top"> <a href="#" class="fas fa-shopping-cart"></a></span>
        <span data-tooltip="Profile" data-flow="top"> <a href="#" class="fas fa-user"></a></span>
    </div>

</header>

<section class="home" id="home">

    <div class="content">
        <h3></h3>
        <span> Incredible Pakistan: </span>
        <p>Where Every Place is a Story, Every Journey an Adventure.</p>
        <a href="#products" class="btn">Travel Now</a>
    </div>

</section>


<section class="about" id="about">

    <h1 class="heading"> <span> about </span> us </h1>

    <div class="row">

        <div class="video-container">
            <video src="../images/about-vid.mp4" loop autoplay muted></video>
            <h3>Best Places</h3>
        </div>

        <div class="content">
            <h3>why choose us?</h3>
<p> What truly sets us apart is our unwavering commitment to your satisfaction. Our 24/7 customer support is always ready to assist you, and we offer competitive prices and exclusive deals to save you money while you explore the world. Choose our travel website, and you're not just a traveler; you're part of a community that values your journey and strives to make it enjoyable and hassle-free. Join us today for unforgettable adventures, where your travel needs take center stage.</p>
            <a href="#review" class="btn">learn more</a>
        </div>

    </div>

</section> 

<section class="icons-container">

    <div class="icons">
        <img src="../images/icon-1.png" alt="">
        <div class="info">
            <h3>free booking</h3>
            <span>on all orders</span>
        </div>
    </div>

    <div class="icons">
        <img src="../images/icon-2.png" alt="">
        <div class="info">
            <h3>10 days returns</h3>
            <span>moneyback guarantee</span>
        </div>
    </div>

    <div class="icons">
        <img src="../images/icon-3.png" alt="">
        <div class="info">
            <h3>offer & gifts</h3>
            <span>on all orders</span>
        </div>
    </div>

    <div class="icons">
        <img src="../images/icon-4.png" alt="">
        <div class="info">
            <h3>secure paymens</h3>
            <span>protected by Sadapay</span>
        </div>
    </div>

</section>



<section class="products" id="products">

    <h1 class="heading"> Popular <span>Places</span> </h1>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="../images/islamabad.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="../cities.php" class="cart-btn">Visit Us</a>
                    <a href="../cities.php" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Islamabad</h3>
                <div class="price">Rs 35000</div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="../images/lahore.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="../cities.php" class="cart-btn">Visit Us</a>
                    <a href="../cities.php" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Lahore</h3>
                <div class="price">Rs 40000</div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="../images/jhelum.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="../cities.php" class="cart-btn">Visit Us</a>
                    <a href="../cities.php" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Jhelum</h3>
                <div class="price">Rs 50000</div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="../images/karachi.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="../cities.php" class="cart-btn">Visit Us</a>
                    <a href="../cities.php" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Karachi</h3>
                <div class="price">Rs 30000</div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="../images/gilgit.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="../cities.php" class="cart-btn">Visit Us</a>
                    <a href="../cities.php" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Gilgit</h3>
                <div class="price">Rs 21000</div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="../images/sukkur.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="../cities.php" class="cart-btn">Visit Us</a>
                    <a href="../cities.php" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Sukkur</h3>
                <div class="price">Rs 15000</div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="../images/peshawar.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="../cities.php" class="cart-btn">Visit Us</a>
                    <a href="../cities.php" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Peshawar</h3>
                <div class="price">Rs 55000 </div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="../images/hydrabad.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="../cities.php" class="cart-btn">Visit Us</a>
                    <a href="../cities.php" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Hydrabad</h3>
                <div class="price">Rs 15000</div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="../images/daska.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="../cities.php" class="cart-btn">Visit Us</a>
                    <a href="../cities.php" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Daska</h3>
                <div class="price">Rs 15000</div>
            </div>
        </div>

    </div>

</section>



<section class="review" id="review">

<h1 class="heading"> customer's <span>review</span> </h1>

<div class="box-container">

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>Booking my dream trip to the serene backwaters of Lahore was a breeze with TravWize – seamless and stress-free! </p>
        <div class="user">
            <img src="../images/pic-1.jpg" alt="atharva pfp">
            <div class="user-info">
                <h3>ElonMusk</h3>
                <span>Daska</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>Thanks to TravWiz, I explored the majestic beauty of Islamabad with ease, and the deals were unbeatable!</p>
        <div class="user">
            <img src="../images/pic-2.png" alt="Yash pfp">
            <div class="user-info">
                <h3>Pretty</h3>
                <span>Lahore</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>Made my adventure to the mesmerizing Muree mountains unforgettable, with expert guidance and fantastic itineraries</p>
        <div class="user">
            <img src="../images/pic-3.jpg" alt="Tejas pfp">
            <div class="user-info">
                <h3>Pushpa</h3>
                <span>Hydrabad</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>

</div>

</section>


<section class="contact" id="contact">

    <h1 class="heading"> <span> contact </span> us </h1>

    <div class="row">

        <form action="">
            <input type="text" placeholder="name" class="box">
            <input type="email" placeholder="email" class="box">
            <input type="number" placeholder="number" class="box">
            <textarea name="" class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" class="btn">
        </form>

        <div class="image">
            <img src="../images/contact-img.svg" alt="">
        </div>

    </div>

</section>


<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="#">Home</a>
            <a href="#">About </a>
            <a href="#">Places</a>
            <a href="#">Review</a>
            <a href="#">Contact Us</a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#">My account</a>
            <a href="#">My List</a>
            <a href="#">My favorite</a>
        </div>

        <div class="box">
            <h3>Popular Travel Locations</h3>
            <a href="#">Islamabad</a>
            <a href="#">Lahore</a>
            <a href="#">Daska</a>
            <a href="#">Jhelum</a>
        </div>




    </div>

    <div class="credit">&copy;2024 TravWiz</div>

</section>



</body>
</html>