<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Realestate - Choose your dream home</title>
  <!--======== custom css link =========-->
  <link rel="stylesheet" href="style.css">
  <!--========= google font link ========-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
   <!--======== main =========-->
   <main>
        <article class="article">
            <section class="section hero" aria-label="hero">
                <div class="container">
                    <div class="hero-bg">
                        <div class="hero-content">
                            <h1 class="h1 hero-title">
                                We will help you find your <span class="span">Dream</span> home
                            </h1>

                            <p class="hero-text">
                                Buy your dream home today
                            </p>
                        </div>
                    </div>
                     
                    <div class="hero-form-wrapper">
                       
                    <form action="search.php" method="POST" class="hero-form">
    <div class="input-wrapper">
        <label for="buy_or_rent">Select Option:</label><br>
        <select name="buy_or_rent" id="buy_or_rent">
            <option value="sale">Buy</option>
            <option value="rent">Rent</option>
        </select>
        <br><br>
    </div>
    <div class="input-wrapper">
        <label for="location" class="input-label">Search: *</label>
        <input type="text" name="location" id="location" placeholder="Location" required class="input-field">
        <ion-icon name="search-outline"></ion-icon>
    </div>

    <div class="input-wrapper">
        <label for="category" class="input-label">Select Categories</label>
        <select name="category" id="category" class="dropdown-list">
            <option value="flat">Flat</option>
            <option value="house">House</option>
        </select>
    </div>
    <div class="input-wrapper"></div>

    <div class="input-wrapper">
        <label for="min_price" class="input-label">Min Price :</label>
        <input type="number" name="min_price" id="min_price">
        <br><br>
    </div>

    <div class="input-wrapper">
        <label for="max_price" class="input-label">Max Price :</label>
        <input type="number" name="max_price" id="max_price">
        <br><br>
    </div>
    <div class="input-wrapper"> </div>
    <div class="input-wrapper"> </div>

    <button type="submit" class="btn btn-primary">Search now</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST['location'];
    $min_price = $_POST['min_price'];
    $max_price = $_POST['max_price'];

    // Validate location
    if (is_numeric($location)) {
        echo '<div class="error">Search should not be only numeric</div>';
    } else {
        // Proceed with the form submission
        // Your code to handle the form submission goes here
    }
}
?>



                    </div>
                </div>
            </section>
           
            
            <!--=========== PROPERTIES ===========-->
            <!--=========== TESTIMONY ==========-->
            <section class="section wrapper wrapper2 top">
                <div class="container">
                    <div class="text">
                        <div class="heading">
                            <h2>People Said</h2>
                        </div>

                        <div class="para">
                            <p> I recently purchased a house through your website and had a fantastic experience. The user-friendly interface and detailed property information made browsing easy. The virtual tour feature was a game-changer. Transaction was seamless with secure online payment. Overall, thrilled with my new home and highly recommend your services.</p>
                            <div class="box flex">
                                <div class="img">
                                    <img src="images/person.jpg" alt="">
                                </div> <br>
                                <div class="name">
                                    <h5>Mr.XYZ</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--========= CONTACT =========-->
            
            <!--======= FOOTER ========-->
            <footer class="footer">
                <div class="footer-top">
                    <div class="container">
                        <div class="footer-brand">
                            <a href="index.php" class="logo">
                                <ion-icon name="home-outline"></ion-icon> RealtyEase
                            </a>
                            <p class="footer-text">
                                A great platform to buy, sell and rent your properties
                            </p>
                        </div>

                        <ul class="footer-list">
                            <li>
                                <p class="footer-list-title">Company</p>
                            </li>
                            <li>
                                <a href="about.php" class="footer-link">
                                    <ion-icon name="chevron-forward"></ion-icon>
                                    <span class="span">About us</span>
                                </a>
                            </li>
                            <li>
                                <a href="catalogue.php" class="footer-link">
                                    <ion-icon name="chevron-forward"></ion-icon>
                                    <span class="span">Catalogue</span>
                                 </a>
                            </li>
                            
                            <li>
                                <a href="contact.html" class="footer-link">
                                    <ion-icon name="chevron-forward"></ion-icon>
                                    <span class="span">Contact us</span>
                                </a>
                            </li>

                            
                        </ul>

                        <ul class="footer-list">
                            <li>
                                <p class="footer-list-title">More Links</p>
                            </li>
                            <li>
                                <a href="login.php" class="footer-link">
                                    <ion-icon name="chevron-forward"></ion-icon>
                                    <span class="span">Login</span>
                                </a>
                            </li>
                            <li>
                                <a href="register.php" class="footer-link">
                                    <ion-icon name="chevron-forward"></ion-icon>
                                    <span class="span">Register</span>
                                </a>
                            </li>
                            <li>
                                <a href="feedback.html" class="footer-link">
                                    <ion-icon name="chevron-forward"></ion-icon>
                                    <span class="span">Feedback</span>
                                </a>
                            </li>
                        </ul>

                        <ul class="footer-list">
                            <li>
                                <p class="footer-list-title">Contact Details</p>
                            </li>

                            <li class="footer-item">
                                <ion-icon name="location-outline"></ion-icon>
                                <address class="address">
                                    123 Real Estate Street,<br>
                                    Mumbai, Maharashtra, <br>
                                    India
                                    <a href="#" class="address-link">View on Google Maps</a>
                                </address>
                            </li>

                            <li class="footer-item">
                                <ion-icon name="mail-outline"></ion-icon>
                                <a href="mailto:RealtyEase@gmail.com" class="footer-link">RealtyEase@gmail.com</a>
                            </li>

                            <li class="footer-item">
                                <ion-icon name="call-outline"></ion-icon>
                                <a href="tel: 000-111-22233" class="footer-link">000-111-22233</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <p class="copyright">
                            &copy; 2024 RealtyEase. All rights reserved by <a href="index.php" class="copyright-link">RealtyEase</a>
                        </p>

                        <ul class="social-list">
                            <li>
                                <a href="#" class="social-link">
                                    <ion-icon name="logo-facebook"></ion-icon>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="social-link">
                                    <ion-icon name="logo-instagram"></ion-icon>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="social-link">
                                    <ion-icon name="logo-twitter"></ion-icon>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="social-link">
                                    <ion-icon name="logo-linkedin"></ion-icon>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>

            <!--=========== BACK-TO-TOP ==========-->
            <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
                <ion-icon name="arrow-up" aria-hidden="true"></ion-icon>
            </a>
        </article>
   </main>
    
  <!--========= custom js link =========-->
  <script src="main.js" defer></script>

  <!--=========== ionicon link ==========-->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html> 
