<?php
session_start();
require('admin/include/db.php');
require('admin/include/essentials.php');
$_SESSION['fid']=$_GET['f_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
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

<?php 
$f_id = isset($_GET['f_id']) ? $_GET['f_id'] : null;
$query = mysqli_query($con, "SELECT * FROM `car_feature` WHERE `f_id`=$f_id");
while ($row = mysqli_fetch_assoc($query)) {
  $_SESSION['car']= $row['Vehicle_title'];
?>

<div class="container">
    <div class="car-details">
        <div class="car-image">
            <img src="images/<?php echo $row['Car_image1'] ?>" alt="car" />
        </div>
        <div class="car-description">
            <h1><?php echo $row['Vehicle_title'] ?></h1>
            <span><h2>Rs. <?php echo $row['Price'] ?> Per Day</h2></span>
            <article>
                <h3>Key Features</h3>
                <div class="car-feature">
                    <div class="FeatureOne">
                        <div class="features">
                            <span><i class="fa-solid fa-engine"></i> Engine</span>
                            <span><?php echo $row['Engine'] ?> cc</span>
                        </div>
                        <div class="features">
                            <span><i class="fa-solid fa-engine"></i> Torque</span>
                            <span><?php echo $row['Torque'] ?> Nm</span>
                        </div>
                        <div class="features">
                            <span><i class="fa-solid fa-engine"></i> Top Speed</span>
                            <span><?php echo $row['Top_speed'] ?> kmph</span>
                        </div>
                    </div>
                    <div class="FeatureTwo">
                        <div class="features">
                            <span><i class="fa-solid fa-engine"></i> Power</span>
                            <span><?php echo $row['Power'] ?> bhp</span>
                        </div>
                        <div class="features">
                            <span><i class="fa-solid fa-engine"></i> Transmission</span>
                            <span><?php echo $row['Transmission'] ?></span>
                        </div>
                        <div class="features">
                            <span><i class="fa-solid fa-engine"></i> Drive Type</span>
                            <span><?php echo $row['Drive_type'] ?> WD</span>
                        </div>
                    </div>
                </div>
            </article>
            <div class="booking-box">
                <form action="initiate_payment.php" method="post">
                    <div class="date">
                      <div class="start-date">
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" min="<?php echo date('Y-m-d'); ?>" required><br>
                      </div>
                      <div class="start-date">
                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" name="end_date" min="<?php echo date('Y-m-d'); ?>" required><br>
                      </div>
                    </div>
                    <input type="hidden" id="car_id" name="car_id" value="<?php echo $_GET['f_id']; ?>">
                    <input type="submit" value="Book Now" class="btn">
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
} 
?>


<section class="car-track-records">
      <article>
        <div class="track-records car-margin">
          <h1>Review About Car</h1>
          <form action="#" method="post">
            <input type="text" />
            <input type="submit" value=" Add comment" />
          </form>
        </div>
      </article>
      <aside>
        <div class="car-updates">
          <div class="Trending">
            <h1>Trending Rolls-Royce Cars</h1>
            <span>Popular</span>
          </div>

          <div class="popular-car-tier">
          <?php 
            $f_id = isset($_GET['f_id']) ? $_GET['f_id'] : null;
            $query=mysqli_query($con,"SELECT * FROM `car_feature`");
            while($row=mysqli_fetch_assoc($query)){
              
            ?>
            <div class="popular-car">
              <div class="popular-car-image">
                <img src="images/<?php echo $row['Car_image2'] ?>" alt="car1" />
              </div>
              <div class="popular-car-details">
                <h3><?php echo $row['Vehicle_title']?></h3>
                <span
                  >Rs.
                  <?php echo $row['Price'] ?></span
                >
              </div>
            </div>
            <?php
        }
        ?>
          </div>
        </div>
      </aside>
    </section>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var startDateInput = document.getElementById('start_date');
    var endDateInput = document.getElementById('end_date');
    
    var today = new Date().toISOString().split('T')[0];
    startDateInput.setAttribute('min', today);

    startDateInput.addEventListener('change', function() {
        endDateInput.setAttribute('min', this.value);
    });
});
</script>
</body>
</html>
