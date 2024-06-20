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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <script src="Script/nav.js"></script>
</head>

<body>
    <header id="home">
        <a href="" class=logo><i class="ri-roadster-fill"></i>Car Rental</a>
        <ul class="nav">
            <li><a href="loggedin.php">Home</a></li>
            <li><a href="loggedin.php#shop">Book</a></li>
            <li><a href="gallery.php">Gallery</a></li>
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
                <?php 
                    $query=mysqli_query($con,"SELECT * FROM `car_feature`");
                        while($row=mysqli_fetch_assoc($query)){
                            if ($row['Quantity'] > 0) { // Check if quantity is greater than 0
                                echo <<< query
                                <div class="box">
                                    <div class="img-box">
                                        <img src="images/{$row['Car_image1']}" alt="">

                                    </div>
                                    <div class="content">
                                        <h3> $row[Vehicle_title]  </h3>
                                        <div class="features">
                                            <p>Feature</p>
                                            <ul>
                                                <li><i class='bx bx-gas-pump' ></i>$row[Fuel_type]</li>
                                                <li><i class='bx bx-tachometer' ></i>$row[Top_speed]</li>
                                                <li><i class='bx bxs-car-battery'></i> $row[Transmission]</li>
                                            </ul>
                                        </div>
                                        
                                        <div class="price">Rs $row[Price] Per Day</div>
                                        <a class="btn btn-1" href="addtocart.php?f_id=$row[f_id]" name="addtocart">Book now</a>
                                    </div>
                                </div>
                            query;
                        }
                    }
                ?>

            </section>



        </div>

        <footer>
            <p>© 2022 Finestro All rights reserved.</p>
        </footer>
</body>

</html>