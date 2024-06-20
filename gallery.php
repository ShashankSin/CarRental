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
        <a href="" class="logo"><i class="ri-roadster-fill"></i>Car Rental</a>
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
        <section class="gallery" id="gallery">
            <h1>Gallery</h1>
            <div class="gallery-container">
                <?php 
                    $query = mysqli_query($con, "SELECT Car_image1 FROM car_feature");
                    while($row = mysqli_fetch_assoc($query)) {
                        echo '<div class="gallery-item"><img src="images/' . $row['Car_image1'] . '" alt="Gallery Image"></div>';
                    }
                ?>
            </div>
        </section>
    </div>
</body>
</html>