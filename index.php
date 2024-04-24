
<?php
    require('admin/include/db.php');
    require('admin/include/essentials.php');
?>


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
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <script src="Script/nav.js"></script>

</head>

<body>
    <header id="home">
        <a href="" class=logo><i class="ri-roadster-fill"></i>Car Rental</a>
        <ul class="nav">
        <li><a href="#home">Home</a></li>
            <li><a href="#shop">Booking</a></li>
            <li><a href="">Gallery</a></li>
            <li><a href="">Contact</a></li>
        </ul>
        <div class="sign">
            <div class="sign-1"><i class="ri-user-fill"></i></div>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>

    </header>
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
        <div class="form-container">
            <div class="bx bx-x" id="cross"></div>
            <form class="form " id="login" method="post" action="login.php">
                <div class="shape"></div>
                <div class="shape"></div>
                <h3>Login Here</h3>

                <label for="username">Username</label>
                <input type="text" placeholder="Usename" id="username-1" name="username">

                <label for="password">Password</label>
                <input type="password" placeholder="Password" id="password-1" name="password">
                <input type="submit" class="button-1" name="submit">
                <p for="Register" class="r-1">Donot have an account? <span class="register">Register Now</span>
                </p>
            </form>
            <form class="form form-1 hide" id="signup" method="post" action="signup.php" name="signup">
    <div class="shape"></div>
    <div class="shape"></div>
    <h3>SignUp</h3>
    <label for="username">Username:</label>
    <input type="text" placeholder="Username" id="username" name="username" required>
    <label for="email">Email:</label>
    <input type="email" placeholder="Email" id="email" name="email" class="email" oninput="validateEmail()" required>
    <p id="error" style="font-size:16px;"></p>
    <label for="password">Password:</label>
    <input type="password" placeholder="Password" id="password" name="password" oninput="validatePassword()" required>
    <p id="password-error" style="font-size:16px;"></p>
    <input type="submit" class="button-1" id="submitBtn" name="submit" disabled>
    <p for="Register" class="r-2">Already have an account? <span class="register">Login</span></p>
</form>

        </div>
        <section class="shop" id="shop">
            <h1>Booking Open</h1>

            <div class="box-container">
            <?php 
                    $query=mysqli_query($con,"SELECT * FROM `car_feature` WHERE `f_id`");
                        while($row=mysqli_fetch_assoc($query)){
                            if ($row['Quantity'] > 0) { // Check if quantity is greater than 0
                                echo <<< query
                                <div class="box">
                                    <div class="img-box">
                                        <img src="images/{$row['Car_image1']}" alt="">

                                    </div>
                                    <div class="content">
                                        <h3>  $row[Vehicle_title]  </h3>
                                        <div class="features">
                                            <p>Feature</p>
                                            <ul>
                                                <li><i class='bx bx-gas-pump' ></i>$row[Fuel_type]</li>
                                                <li><i class='bx bx-tachometer' ></i>$row[Top_speed]</li>
                                                <li><i class='bx bxs-car-battery'></i> $row[Transmission]</li>
                                            </ul>
                                        </div>
                                        
                                        <div class="price">Rs $row[Price] Per Day</div>
                                        <a class="btn btn-1" >Book now</a>
                                    </div>
                                </div>
                            query;
                        }
                    }
            ?>
            </div>

        </section>
    </div>

    <footer>
        <p>© 2024 All rights reserved.</p>
    </footer>
</body>

</html>