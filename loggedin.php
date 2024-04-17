<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <script src="Script/nav.js"></script>

</head>

<body>
    <header id="home">
        <a href="" class=logo><i class="ri-roadster-fill"></i>Car Rental</a>
        <ul class="nav">
            <li><a href="#home">Home</a></li>
            <li><a href="addtocart.php">Book</a></li>
            <li><a href="">Gallery</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="sign">
            <a href="logout.php"><button>Log Out</button></a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>

    </header>
    <div class="container">
        <div class="container">
            <div class="slideshow-container">

                <div class="mySlides fade show">
                    <img src="images/car1.jpg" style="width:100%">
                    <div class="text">Car 1</div>
                </div>

                <div class="mySlides fade">
                    <img src="images/car2.jpg" style="width:100%">
                    <div class="text">Car 2</div>
                </div>

                <div class="mySlides fade">
                    <img src="images/car3.jpg" style="width:100%">
                    <div class="text">Car 3</div>
                </div>

                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>

            </div>
            <section class="shop" id="shop">
                <h1>Book Now</h1>

                <div class="box-container">
                    <div class="box">
                        <img src="images/car1.jpg" alt="">
                        <div class="content">
                            <h3> <i class="fas fa-map-marker-alt"></i> 2021 Rolls-Royce LE </h3>
                            <p>Rolls-Royce is available in 4 different colours - Graphite Grey, Polar White, Nautic Blue
                                and Obsidian Black.</p>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="price"> 30000.00 <span>37000.00</span> </div>
                            <a class="btn btn-1" href="addtocart.php">Book now</a>
                        </div>
                    </div>

                    <div class="box">
                        <img src="images/car2.jpg" alt="">
                        <div class="content">
                            <h3> <i class="fas fa-map-marker-alt"></i> Mercedes-Benz GLA </h3>
                            <p>Mercedes-Benz GLA car is available in 5 different colors. Neon , Ash Gray ,Space White,
                                Astral Black and Navy Blue</p>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <div class="price"> 10000.00 <span>18000.00</span> </div>
                            <a class="btn btn-1" href="addtocart.php">Book now</a>
                        </div>
                    </div>

                    <div class="box">
                        <img src="images/car3.jpg" alt="">
                        <div class="content">
                            <h3> <i class="fas fa-map-marker-alt"></i> Kia Niro Hybrid </h3>
                            <p>The tiny Niro brings bold styling and shows off a bit of a growth spurt for its second
                                generation.</p>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <div class="price"> 2400.00 <span>2800.00</span> </div>
                            <a class="btn btn-1" href="addtocart.php">Book now</a>
                        </div>
                    </div>

                    <div class="box">
                        <img src="images/car4.jpg" alt="">
                        <div class="content">
                            <h3> <i class="fas fa-map-marker-alt"></i> 2023 BMW Z4 </h3>
                            <p>The Z4 is one of our favorites because it is a serious sports car, and we suspect that is
                                not least the case because of Toyota's input in this joint project, which led both to
                                the Z4 and the Supra.</p>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <div class="price"> 9000.00 <span>12000.00</span> </div>
                            <a class="btn btn-1" href="addtocart.php">Book now</a>
                        </div>
                    </div>

                    <div class="box">
                        <img src="images/car5.jpg" alt="">
                        <div class="content">
                            <h3> <i class="fas fa-map-marker-alt"></i> 2022 Toyota Crown </h3>
                            <p>The 2023 Crown debuts with three trim levels. Powering the XLE and Limited is a 2.5-liter
                                four-cylinder engine paired with three electric motors powered by a new
                                nickel-metal-hydride battery pack.</p>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <div class="price"> 4000.00 <span>8000.00</span> </div>
                            <a class="btn btn-1" href="addtocart.php">Book now</a>
                        </div>
                    </div>

                    <div class="box">
                        <img src="images/car6.jpeg" alt="">
                        <div class="content">
                            <h3> <i class="fas fa-map-marker-alt"></i> Faraday Future FF 91 </h3>
                            <p>Faraday Future's press release also specifies that the rating only applies to the FF 91
                                Futurist, which will represent the top of the model line and could crest $200,000,
                                according to the company. </p>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <div class="price"> 18000.00 <span>20000.00</span> </div>
                            <a class="btn btn-1" href="addtocart.php">Book now</a>
                        </div>
                    </div>
                </div>

            </section>



        </div>

        <footer>
            <p>© 2022 Finestro All rights reserved.</p>
        </footer>
</body>

</html>