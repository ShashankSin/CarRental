
<?php
  session_start();
    require('admin/include/db.php');
    require('admin/include/essentials.php');
    $_SESSION['cid']=$_GET['f_id'];
    
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
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Book</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="sign">
            <a href="logout.php"><button>Log Out</button></a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>

</header>

<?php 
$f_id = isset($_GET['f_id']) ? $_GET['f_id'] : null;
$query=mysqli_query($con,"SELECT * FROM `car_feature` WHERE `f_id`=$f_id");
while($row=mysqli_fetch_assoc($query)){
  

?>



    <div class="container">
      <div class="car-details">
        <div class="car-image">
          <img src="images/car1.jpg" alt="car" />
        </div>
        <div class="car-description">
          <h1><?php echo $row['Vehicle_title']?></h1>
          <span><h2>Rs. <?php echo $row['Price']?> Per Day</h2></span>
          <article>
            <h3>Key Features</h3>
            <div class="car-feature">
              <div class="FeatureOne">
                <div class="features">
                  <span><i class="fa-solid fa-engine"></i> Engine</span>
                  <span><?php echo $row['Engine']?> cc</span>
                </div>
                <div class="features">
                  <span><i class="fa-solid fa-engine"></i> Torque</span>
                  <span><?php echo $row['Torque']?> Nm</span>
                </div>
                <div class="features">
                  <span><i class="fa-solid fa-engine"></i> Top Speed</span>
                  <span><?php echo $row['Top_speed']?> kmph</span>
                </div>
              </div>
              <div class="FeatureTwo">
                <div class="features">
                  <span><i class="fa-solid fa-engine"></i> Power</span>
                  <span><?php echo $row['Power']?> bhp</span>
                </div>
                <div class="features">
                  <span><i class="fa-solid fa-engine"></i> Transmission</span>
                  <span><?php echo $row['Transmission']?></span>
                </div>
                <div class="features">
                  <span><i class="fa-solid fa-engine"></i> Drive Type</span>
                  <span><?php echo $row['Drive_type']?> WD</span>
                </div>
              </div>
            </div>
          </article>
          <div class="booking-box">
          <form action="confirm_booking.php" method="post">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" min="<?php echo date('Y-m-d'); ?>" required><br>
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" min="<?php echo date('Y-m-d'); ?>" required><br>
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
        <div class="track-records">
          <h1>Rolls-Roycs Phantom Car Latest Update</h1>
          <p>
            <b> 23 February 2018:</b> Rolls-Royce has revealed the prices of the
            eighth-generation of the Phantom in India. The CBU unit is priced at
            Rs 9.5 crores for the standard wheelbase and extends to Rs 11.5
            crores for the extended wheelbase version with personalisation
            options. 2018 Rolls-Royce Phantom is the most expensive car on sale
            in India currently. Underneath the car is an all-aluminium
            spaceframe chassis which is loosely related to that of its
            predecessor. Rolls-Royce says that it is lighter in weight and 30
            per cent stiffer than before, traits that make the new Phantom more
            efficient. The British luxury carmaker has also confirmed that the
            platform will underpin its first-ever SUV, the Cullinan, and the
            next generation models of the Wraith, Dawn and the Ghost.
            Rolls-Royce says that none of its cars, in the future, will have a
            monocoque construction either. It is powered by a twin-turbo
            6.75-litre V12 engine that produces 571PS of power and 900Nm of
            torque. The engine is turned to deliver all of its torque at revs as
            low as 1,700. The eight-speed auto does its job well and although
            the Phantom VIII weighs over 2.6-tonnes, it can hit 100kmph in 5.4
            seconds and clock a top speed of 250kmph. The list of creature
            comforts is endless. Touted as the car with the world's quietest
            cabin, its fitted with a 130kg sound insulation system and double
            laminated glass windows to cut all the unnecessary and harsh road
            noises. It includes alertness assistant, a 4-camera system with
            panoramic view, all-round visibility with helicopter view, night
            vision and vision assist and active cruise control. The list
            continues with collision and pedestrian warning, cross-traffic
            warning, lane departure and lane change warning, 7x3 high-resolution
            heads-up display and a WiFi hotspot.
            <b>Witness the magnificence in pictures:</b>
            <a href="#"
              >Eighth-Gen Rolls-Royce Phantom: The Pinnacle Of Luxury In
              Pictures</a
            >
          </p>
          <span>Read more...</span>
        </div>
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
            <div class="popular-car">
              <div class="popular-car-image">
                <img src="images/car1.jpg" alt="car1" />
              </div>
              <div class="popular-car-details">
                <h3>Rolls Royce</h3>
                <span>Rs. 10,000 - Rs. 20,000</span>
              </div>
            </div>
            <div class="popular-car">
              <div class="popular-car-image">
                <img src="images/car1.jpg" alt="car1" />
              </div>
              <div class="popular-car-details">
                <h3>Rolls Royce</h3>
                <span>Rs. 10,000 - Rs. 20,000</span>
              </div>
            </div>
            <div class="popular-car">
              <div class="popular-car-image">
                <img src="images/car1.jpg" alt="car1" />
              </div>
              <div class="popular-car-details">
                <h3>Rolls Royce</h3>
                <span>Rs. 10,000 - Rs. 20,000</span>
              </div>
            </div>
          </div>
        </div>
        <div class="car-updates car-margin">
          <div class="Trending">
            <h1>Trending Cars</h1>
            <span>Popular</span>
            <span style="padding: 1rem">Hot</span>
          </div>

          <div class="popular-car-tier">
            <div class="popular-car">
              <div class="popular-car-image">
                <img src="images/car2.jpg" alt="car1" />
              </div>
              <div class="popular-car-details">
                <h3>Rolls Royce</h3>
                <span>Rs. 10,000 - Rs. 20,000</span>
              </div>
            </div>
            <div class="popular-car">
              <div class="popular-car-image">
                <img src="images/car3.jpg" alt="car1" />
              </div>
              <div class="popular-car-details">
                <h3>Rolls Royce</h3>
                <span>Rs. 10,000 - Rs. 20,000</span>
              </div>
            </div>
            <div class="popular-car">
              <div class="popular-car-image">
                <img src="images/car4.jpg" alt="car1" />
              </div>
              <div class="popular-car-details">
                <h3>Rolls Royce</h3>
                <span>Rs. 10,000 - Rs. 20,000</span>
              </div>
            </div>
          </div>
        </div>
      </aside>
    </section>
    
    <?php include('include/footer.php')?>
    <script>
      // JavaScript to disable past dates in start date and end date input fields
      document.addEventListener('DOMContentLoaded', function() {
        var startDateInput = document.getElementById('start_date');
        var endDateInput = document.getElementById('end_date');
        
        // Disable past dates in start date input field
        var today = new Date().toISOString().split('T')[0];
        startDateInput.setAttribute('min', today);

        // Disable dates before start date in end date input field
        startDateInput.addEventListener('change', function() {
          endDateInput.setAttribute('min', this.value);
        });
      });
    </script>
</body>
</html>

