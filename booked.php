<?php
    require('admin/include/db.php');
    require('admin/include/essentials.php');
    session_start();
    $id = $_SESSION['id'];
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
            <li><a href="#shop">Book</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="sign">
            <a href="logout.php"><button>Log Out</button></a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>

    </header>
    <div class="container">
        <h1 align="center">YOUR CAR HAS BEEN BOOKED</h1>
            <div class="booked-car">
                <?php 
                     $query = mysqli_query($con, "
                     SELECT 
                         car_feature.Vehicle_title, 
                         car_feature.Car_image1, 
                         booking.start_date, 
                         booking.end_date 
                     FROM 
                         car_feature 
                     JOIN 
                         booking 
                     ON 
                         car_feature.f_id = booking.car_id 
                     WHERE 
                         booking.c_id = $id;
                 ");
                 if (!$query) {
                    echo "Error: " . mysqli_error($con);
                    exit();
                }
                    while($row=mysqli_fetch_assoc($query)){
                    
                
                ?>
                <div>
                    <div class="booked-car-img">
                        <img src="images/<?php echo $row['Car_image1'] ?>" alt="car">
                    </div>

                    <div class="booked-content">
                        <div class="booked-content-name">
                            <h3><?php echo $row['Vehicle_title'] ?></h3>
                        </div>
                        <div class="booked-content-date">
                            <div class="booked-content-date-start">
                                <p>Vehcile-start-date</p>
                                <small><?php echo $row['start_date'] ?></small>
                            </div>
                            <div class="booked-content-date-start date-end">
                                <p>Vehcile-end-date</p>
                                <small><?php echo $row['end_date'] ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>

</body>

</html>