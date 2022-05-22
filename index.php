<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/styles.css" />

    <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>

    <title>Omnifood</title>
    <style>
        #logo {
            font-family: 'Rubik', sans-serif;
            font-size: 3rem;
            font-weight: bold;
            text-decoration: none;
            color: #CF711F;
        }
    </style>
</head>

<body>
    <header class="header">
        <a id="logo" href="#">
            <h2>AuctionBits</h2>
        </a>

        <nav class="main-nav">
            <ul class="main-nav-list">
                <li><a class="main-nav-link" href="#">How it works</a></li>
                <li><a class="main-nav-link" href="#">About</a></li>
                <!-- <li><a class="main-nav-link" href="#">Testimonials</a></li> -->
                <li><a class="main-nav-link" href="#">Contact</a></li>
                <li><a class="main-nav-link nav-cta" href="Bidder.php">Explore Now</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="section-hero">
            <div class="hero">
                <div class="hero-text-box">
                    <h1 class="heading-primary">
                        AuctionBits
                    </h1>
                    <p class="hero-description">
                        is an online based bidding system for bidding, selling, shipping and trading antique or precious product. Here users can post their product which they interested in selling.
                    </p>
                    <a href="Bidder.php" class="btn btn--full margin-right-sm">Explore Now</a>
                    <a href="#" class="btn btn--outline">Learn more &darr;</a>
                    <div class="delivered-meals">
                        <div class="delivered-imgs">
                            <img src="img/customers/customer-1.jpg" alt="Customer photo" />
                            <img src="img/customers/customer-2.jpg" alt="Customer photo" />
                            <img src="img/customers/customer-3.jpg" alt="Customer photo" />
                            <img src="img/customers/customer-4.jpg" alt="Customer photo" />
                            <img src="img/customers/customer-5.jpg" alt="Customer photo" />
                            <img src="img/customers/customer-6.jpg" alt="Customer photo" />
                        </div>
                        <p class="delivered-text">
                            <span>250,000+</span> order delivered last year!
                        </p>
                    </div>
                </div>
                <div class="hero-img-box">
                    <img src="img/a.png" class="hero-img" alt="Woman enjoying food, meals in storage container, and food bowls on a table" />
                </div>
            </div>
        </section>

        <section class="section-featured">
            <div class="container">
                <h2 class="heading-featured-in">As featured in</h2>
                <div class="logos">
                    <img src="img/logos/techcrunch.png" alt="Techcrunch logo" />
                    <img src="img/logos/business-insider.png" alt="Business Insider logo" />
                    <img src="img/logos/the-new-york-times.png" alt="The New York Times logo" />
                    <img src="img/logos/forbes.png" alt="Forbes logo" />
                    <img src="img/logos/usa-today.png" alt="USA Today logo" />
                </div>
            </div>
        </section>


    </main>

    <footer class="footer">
        <div class="container grid grid--footer">
            <div class="logo-col">
                <a href="#" class="footer-logo">
                    <!-- <img class="logo" alt="Omnifood logo" src="img/omnifood-logo.png" /> -->
                </a>

                <ul class="social-links">
                    <li>
                        <a class="footer-link" href="#">
                            <ion-icon class="social-icon" name="logo-instagram"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a class="footer-link" href="#">
                            <ion-icon class="social-icon" name="logo-facebook"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a class="footer-link" href="#">
                            <ion-icon class="social-icon" name="logo-twitter"></ion-icon>
                        </a>
                    </li>
                </ul>

                <p class="copyright">
                    Copyright &copy; 2027 by AuctionBits, Inc. All rights reserved.
                </p>
            </div>
            <div class="address-col">
                <p class="footer-heading">Contact us</p>
                <address class="contacts">
                    <p class="address">
                        623 Harrison St., 2nd Floor, San Francisco, CA 94107
                    </p>
                    <p>
                        <a class="footer-link" href="tel:415-201-6370">415-201-6370</a><br />
                        <a class="footer-link" href="mailto:hello@omnifood.com">hello@auctionbits.com</a>
                    </p>
                </address>
            </div>
            <nav class="nav-col">
                <p class="footer-heading">Account</p>
                <ul class="footer-nav">
                    <li><a class="footer-link" href="#">Create account</a></li>
                    <li><a class="footer-link" href="#">Sign in</a></li>
                    <li><a class="footer-link" href="#">iOS app</a></li>
                    <li><a class="footer-link" href="#">Android app</a></li>
                </ul>
            </nav>

            <nav class="nav-col">
                <p class="footer-heading">Company</p>
                <ul class="footer-nav">
                    <li><a class="footer-link" href="#">About Omnifood</a></li>
                    <li><a class="footer-link" href="#">For Business</a></li>
                    <li><a class="footer-link" href="#">Cooking partners</a></li>
                    <li><a class="footer-link" href="#">Careers</a></li>
                </ul>
            </nav>

            <nav class="nav-col">
                <p class="footer-heading">Resources</p>
                <ul class="footer-nav">
                    <li><a class="footer-link" href="#">Recipe directory </a></li>
                    <li><a class="footer-link" href="#">Help center</a></li>
                    <li><a class="footer-link" href="#">Privacy & terms</a></li>
                </ul>
            </nav>
        </div>
    </footer>
</body>

</html>