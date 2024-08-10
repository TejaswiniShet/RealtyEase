<?php
session_start();

if (isset($_POST['logout'])) {
    // Destroy session
    session_destroy();
    // Redirect to the same page
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
?>

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

<header class="header" data-header>
    <div class="container">
        <a href="index.php" class="logo">
            <ion-icon name="home-outline"></ion-icon> RealtyEase
        </a>

        <nav class="navbar container" data-navbar>
            <ul class="navbar-list">
                <li>
                    <a href="index.php" class="navbar-link" data-nav-link>Home</a>
                </li>
                <li>
                    <a href="about.php" class="navbar-link" data-nav-link>About Us</a>
                </li>
                <li>
                    <a href="catalogue.php" class="navbar-link" data-nav-link>Catalogue</a>
                </li>
                <li>
                    <a href="contact.html" class="navbar-link" data-nav-link>Contact Us</a>
                </li>
            </ul>
        </nav>

        <?php
        if(isset($_SESSION['username'])) {
            echo '<a href="'. (isset($_SESSION['username']) ? 'post_property.html' : 'login.php') .'" id="postPropertyBtn" class="btn btn-secondary">Post Property</a>
                  <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
                    <button type="submit" name="logout" class="btn btn-secondary">Logout</button>
                  </form>';
        } else {
            echo '<a href="'. (isset($_SESSION['username']) ? 'post_property.html' : 'login.php') .'" id="postPropertyBtn" class="btn btn-secondary">Post Property</a>
                  <a href="login.php" class="btn btn-secondary">Sign Up</a>';
        }
        ?>
    </div>
</header>
