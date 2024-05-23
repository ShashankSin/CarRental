<?php 

require('include/db.php');
  require('include/essentials.php');
  adminLogin();
  session_regenerate_id(true);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin.css" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!-- Option 1: Include in HTML -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <link
      rel="stylesheet"
      href="path/to/font-awesome/css/font-awesome.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Wix+Madefor+Text:ital,wght@0,400..800;1,400..800&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- nav-banner starts -->
    <nav>
      <div class="nav-banner">
        <div class="nav-logo">
          <span style="font-weight: 800">Dashboard </span>
        </div>
        <div class="profile-content">
          <img src="images/Profilepic.jpg" alt="profile-pic" />
          <span>Shashank Singh</span>
          <button>Edit</button>
        </div>
        <div class="nav-options">
          <span><i class="bi bi-grid-1x2"></i><a href="#">Dashboard</a></span>
          <span
            ><i class="bi bi-card-checklist"></i><a href="feature.php">Features</a></span
          >
          <span
            ><i class="bi bi-calendar4-week"></i><a href="#">Schedule</a></span
          >
          <span><i class="bi bi-sliders"></i><a href="settings.php">Setting</a></span>
        </div>
        <!-- <div class="nav-mode">
          <button>
            <span></span>
          </button>
        </div> -->
      </div>
    </nav>
    <!-- nav-banner ends -->

    <!-- header starts -->
    <header>
      <div class="hospital-content">
        <div class="hospital-search">
          <input type="text" class="search" placeholder="Search" /><i
            class="bi bi-search"
          ></i>
        </div>
        <div class="login-content">
          <a href="logout.php" style="margin-right: 0">Logout</a>
        </div>
      </div>
      <div class="content--table">
      <div class="section-setting">
        <div class="section-setting-title">
            <h3>Admin Dashboard</h3>
        </div>
        <div class="section-setting-card">
            <div class="card-title">
                <h5>Car Bookings</h5>
                <button onclick="openPopup()"><i class="bi bi-pencil-square"></i> <span>Add</span></button>

                <!-- add feature -->
                <div class="popup" id="popup" style="width: 800px;">
                  <div class="setting-title">
                    <h2>Add Features</h2>
                  </div>
                  <div class="setting-form">
                    <form id="features_s_form" method="post"  enctype="multipart/form-data" action="?"> 
                      <div class="setting-contacts-form">
                        <div class="setting-form-left-side">
                          <div class="setting-form-site-title">
                            <label>Vehicle Title</label>
                            <input type="text" name="Vehicle_title" id="Vehicle_title" required>
                          </div>
                          <div class="setting-form-site-title">
                            <label>Vehicle Brand</label>
                            <input type="text" name="Vehicle_brand" id="Vehicle_brand" required>
                          </div>
                          <div class="setting-form-site-title">
                            <label>Per Day Price</label>
                            <input type="number" name="Price" id="Price" required>
                          </div>
                        </div>
                        <div class="setting-form-right-side">
                          <div class="setting-form-site-title">
                            <label>Fuel Type</label>
                            <input type="text" name="Fuel_type" id="Fuel_type" required>
                          </div>  
                          <div class="setting-form-site-title">
                            <label>Model Year</label>
                            <input type="number" name="Model_year" id="Model_year" required>
                          </div>
                          <div class="setting-form-site-title">
                            <label>Seating Capacity</label>
                            <input type="number " name="Seating_capacity" id="Seating_capacity" required>
                          </div>
                        </div>
                      </div>
                      <div class="setting-contacts-form-feature">
                        <div class="form-feature">
                          <div class="setting-form-site-title">
                            <label>Engine Unit(cc)</label>
                            <input type="number " name="Engine" id="Engine" required>
                          </div>
                          <div class="setting-form-site-title">
                            <label>Torque Unit(Nm)</label>
                            <input type="number " name="Torque" id="Torque" required>
                          </div>
                          <div class="setting-form-site-title">
                            <label>Top Speed Unit(kmph)</label>
                            <input type="number " name="Top_speed" id="Top_speed" required>
                          </div>
                        </div>
                        <div class="form-feature">
                          <div class="setting-form-site-title">
                            <label>Power Unit(bhp)</label>
                            <input type="number " name="Power" id="Power" required>
                          </div>
                          <div class="setting-form-site-title">
                            <label>Transmission</label>
                            <input type="text" name="Transmission" id="Transmission" required>
                          </div>
                          <div class="setting-form-site-title">
                            <label>Drive Type Unit(WD)</label>
                            <input type="number " name="Drive_type" id="Drive_type" required>
                          </div>
                        </div>
                        <div class="form-feature">
                          <div class="setting-form-site-title">
                            <label>Quantity</label>
                            <input type="number " name="Quantity" id="Quantity" required>
                          </div>
                          
                        </div>
                        
                      </div>
                      <div class="setting-contacts-form-feature">
                        <div class="form-feature">
                          <div class="feature-image">
                            <label>Image 1 <span>*</span></label>
                            <input type="file" name="Car_image1" id="Vehicle_img_1" required>
                          </div>
                          <div class="feature-image">
                            <label>Image 2 <span>*</span></label>
                            <input type="file" name="Car_image2" id="Car_image2" required>
                          </div>
                          
                        </div>
                        <div class="form-feature">
                          <div class="feature-image">
                            <label>Image 3 <span>*</span></label>
                            <input type="file" name="Car_image3" id="Car_image3" required>
                          </div>
                          <div class="feature-image">
                            <label>Image 4 <span>*</span></label>
                            <input type="file" name="Car_image4" id="Car_image4" required>
                          </div>
                          
                        </div>
                      </div>
                      <div class="setting-button">
                        <button type="Reset" onclick="closePopup()" onclick="contacts_inp(contacts_data)">Cancel</button>
                        <button type="submit" name="add_facility">Submit</button>
                      </div>
                    </form>
                    
                  </div>
                 
                </div>


            </div>
            
            <div class="card-content">
              <table cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Vehicle Title</th>
                    <th>Brand</th>
                    <th>Price Per day</th>
                    <th>Fule Type</th>
                    <th>Model Year</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $q="SELECT * FROM `car_feature` ORDER BY `f_id`";
                    $data= mysqli_query($con,$q);
                    $i=1;
                    while($row=mysqli_fetch_assoc($data)){
                      echo <<< query
                      <tr>
                        <td>$i</td>
                        <td>$row[Vehicle_title]</td>
                        <td>$row[Vehicle_brand]</td>
                        <td>$row[Price]</td>
                        <td>$row[Fuel_type]</td>
                        <td>$row[Model_year]</td>
                        <td>
                          <button name="edit_facility"><a href='feature_update.php?f_id=($row[f_id])'>  <i class='bx bxs-edit'></i></a></button>
                          <button type="submit" name="delid"><a href='delete.php?f_id
                          =($row[f_id])'> <i class='bx bxs-trash'></i></a></button>

                        </td>
                      </tr>

                      query;
                      $i++;

                    }
                  
                  ?>
                </tbody>
              </table>
            </div>
        </div>
      </div>
      </div>
    </header>
    <!-- header ends -->

    <!-- script starts -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
