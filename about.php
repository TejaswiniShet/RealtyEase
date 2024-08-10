<?php include 'header.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <title> About us </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <section class="section about" id="about" aria-level="about">
            <div class="container">
                <div class="about-banner img-holder" style="--width: 600; --height: 700;">
                    <img src="images/main.jpg" width="600px" height="700px" loading="lazy" alt="" class="img-cover">
                </div>

                <div class="about-content">
                    <h3>Welcome to RealtyEase, your trusted partner in real estate. With years of experience, we offer personalized service, local expertise, and integrity in every transaction.</h3>
                    <p class="section-text">
                        When you choose us, you're opting for a dedicated team with extensive expertise, offering personalized service tailored to your needs. With our deep local knowledge, we provide valuable insights into the market and communities. Above all, integrity is at the core of our values, ensuring transparent and trustworthy interactions, always prioritizing your best interests.
                        
                    </p>
                </div>
            </div>
        </section>

        <!--========== SECTION ==========-->
        <section class="section service" id="service" aria-label="service">
            <div class="container">
                <h2 class="section-title">How It Works</h2>
                <p class="section-text">A great platform to buy, sell and rent your properties</p>
                <ul class="service-list">
                    <li>
                        <div class="service-card">
                            <div class="card-icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </div>
                            <h3 class="h3 card-title">Effortless Property Search</h3>
                            <p class="card-text">
                                Navigate through listings tailored to your specific criteria, whether it's location, budget, or property type. With just a few clicks, you can uncover a myriad of options that align with your preferences, saving you time and effort in the process.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div class="service-card">
                            <div class="card-icon">
                                <ion-icon name="briefcase-outline"></ion-icon>
                            </div>
                            <h3 class="h3 card-title">Direct Communication</h3>
                            <p class="card-text">
                            Whether you have questions about a listing or are ready to negotiate terms, our platform empowers you to connect directly with property details instantly. By bypassing traditional communication barriers, you can expedite the process and make informed decisions efficiently.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div class="service-card">
                            <div class="card-icon">
                                <ion-icon name="key-outline"></ion-icon>
                            </div>
                            <h3 class="h3 card-title">Close The Deal</h3>
                            <p class="card-text">
                                Ready to seal the deal? Let's make it happen. Trust us to finalize the details and get you one step closer to your property dreams.
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <script src="main.js" defer></script>

        <!--=========== ionicon link ==========-->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
