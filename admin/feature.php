<?php 
    require('include/db.php');
  require('include/essentials.php');
  adminLogin();
  session_regenerate_id(true);

  if(isset($_POST['add_facility'])){
    $frm_data=filteration($_POST);
    $img_v1=uploadImage($_FILES['Vehicle_img_1'], ABOUT_FOLDER);
    $img_v2=uploadImage($_FILES['Vehicle_img_2'], ABOUT_FOLDER);
    $img_v3=uploadImage($_FILES['Vehicle_img_3'], ABOUT_FOLDER);
    $img_v4=uploadImage($_FILES['Vehicle_img_4'], ABOUT_FOLDER);
    $img_v5=uploadImage($_FILES['Vehicle_img_5'], ABOUT_FOLDER);
    $q="INSERT INTO `features`(`Vehicle_title`, `Vehicle_brand`, `Perdayprice`, `Fuel_type`, `Model_year`, `Seating_capacity`, `Airconditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `Vehicle_img_1`, `Vehicle_img_2`, `Vehicle_img_3`, `Vehicle_img_4`, `Vehicle_img_5`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $values=[$frm_data['Vehicle_title'],$frm_data['Vehicle_brand'],$frm_data['Perdayprice'],$frm_data['Fuel_type'],$frm_data['Model_year'],$frm_data['Seating_capacity'],$frm_data['Airconditioner'],$frm_data['PowerDoorLocks'],$frm_data['AntiLockBrakingSystem'],$frm_data['BrakeAssist'],$frm_data['PowerSteering'],$frm_data['DriverAirbag'],$frm_data['PassengerAirbag'],$frm_data['PowerWindows'],$frm_data['CDPlayer'],$frm_data['CentralLocking'],$frm_data['CrashSensor'],$frm_data['LeatherSeats'],$img_v1,$img_v2,$img_v3,$img_v4,$img_v5];
    
    print_r($values);
    
    $res=insert($q,$values,'ssisiiiiiiiiiiiiiisssss');
    if ($res > 0) {
        echo "Data inserted successfully!";
    } else {
        echo "Failed to insert data.";
    } 
    header('Location: /projects/carrental/admin/feature.php');
  }

  if(isset($_POST['edit_facility'])){
    $frm_data=filteration($_POST);
    $img_v1=uploadImage($_FILES['Vehicle_img_1'], ABOUT_FOLDER);
    $img_v2=uploadImage($_FILES['Vehicle_img_2'], ABOUT_FOLDER);
    $img_v3=uploadImage($_FILES['Vehicle_img_3'], ABOUT_FOLDER);
    $img_v4=uploadImage($_FILES['Vehicle_img_4'], ABOUT_FOLDER);
    $img_v5=uploadImage($_FILES['Vehicle_img_5'], ABOUT_FOLDER);

    $q1="UPDATE `features` SET `Vehicle_title`='[value-2]',`Vehicle_brand`=?,`Perdayprice`=?,`Fuel_type`=?,`Model_year`=?,`Seating_capacity`=?,`Airconditioner`=?,`PowerDoorLocks`=?,`AntiLockBrakingSystem`=?,`BrakeAssist`=?,`PowerSteering`=?,`DriverAirbag`=?,`PassengerAirbag`=?,`PowerWindows`=?,`CDPlayer`=?,`CentralLocking`=?,`CrashSensor`=?,`LeatherSeats`=?,`Vehicle_img_1`=?',`Vehicle_img_2`=?,`Vehicle_img_3`=?,`Vehicle_img_4`=?,`Vehicle_img_5`=? WHERE  `f_id`=?";
    $values=[$frm_data['Vehicle_title'],$frm_data['Vehicle_brand'],$frm_data['Perdayprice'],$frm_data['Fuel_type'],$frm_data['Model_year'],$frm_data['Seating_capacity'],$frm_data['Airconditioner'],$frm_data['PowerDoorLocks'],$frm_data['AntiLockBrakingSystem'],$frm_data['BrakeAssist'],$frm_data['PowerSteering'],$frm_data['DriverAirbag'],$frm_data['PassengerAirbag'],$frm_data['PowerWindows'],$frm_data['CDPlayer'],$frm_data['CentralLocking'],$frm_data['CrashSensor'],$frm_data['LeatherSeats'],$img_v1,$img_v2,$img_v3,$img_v4,$img_v5,$frm_data['f_id']];
    $res=update($q1,$values,'ssisiiiiiiiiiiiiiisssssi');
    if($res !== false) {
      echo "Data updated successfully";
  } else {
      echo "Error updating data: " . mysqli_error($con); // Ensure $con is defined properly
  }
  header('Location: /projects/carrental/admin/feature.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Features</title>
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

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <script src="Script/nav.js"></script>
    <style>
      body{
        position: relative;
      }
    </style>
    
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
          <button><i class="fa-regular fa-pen-to-square"></i> Edit</button>
        </div>
        <div class="nav-options">
          <span><i class="bi bi-grid-1x2"></i><a href="admindashboard.php">Dashboard</a></span>
          <span
            ><i class="bi bi-card-checklist"></i><a href="#">Features</a></span
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
        </div>
        <div class="login-content">
          <a href="logout.php" style="margin-right: 0">Logout</a>
        </div>
      </div>
      <div class="section-setting">
        <div class="section-setting-title">
            <h3>Features</h3>
        </div>
        <div class="section-setting-card">
            <div class="card-title">
                <h5>Features Setting</h5>
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
                            <input type="number" name="Perdayprice" id="Perdayprice" required>
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
                          <div>
                            <input type="checkbox" name="Airconditioner" id="Airconditioner" value="1">
                            <label>Airconditioner</label>
                          </div>
                          <div> 
                            <input type="checkbox" name="PowerDoorLocks" id="PowerDoorLocks" value="1">
                            <label>PowerDoorLocks</label>
                          </div>
                          <div> 
                            <input type="checkbox" name="BrakeAssist" id="BrakeAssist" value="1">
                            <label>Brake Assist</label>
                          </div>
                          <div> 
                            <input type="checkbox" name="PowerSteering" id="PowerSteering" value="1">
                            <label>Power Steering</label>
                          </div>
                        </div>
                        <div class="form-feature">
                          <div>
                            <input type="checkbox" name="DriverAirbag" id="DriverAirbag" value="1">
                            <label>Driver Airbag</label>
                          </div>
                          <div> 
                            <input type="checkbox" name="AntiLockBrakingSystem" id="AntiLockBrakingSystem" value="1">
                            <label>AntiLock Braking System</label>
                          </div>
                          <div> 
                            <input type="checkbox" name="PassengerAirbag" id="PassengerAirbag" value="1">
                            <label>Passenger Airbag</label>
                          </div>
                          <div> 
                            <input type="checkbox" name="PowerWindows" id="PowerWindows" value="1">
                            <label>Power Windows</label>
                          </div>
                        </div>
                        <div class="form-feature">
                          <div>
                            <input type="checkbox" name="CDPlayer" id="CDPlayer" value="1">
                            <label>CD Player	</label>
                          </div>
                          <div> 
                            <input type="checkbox" name="CentralLocking" id="CentralLocking" value="1">
                            <label>Central Locking</label>
                          </div>
                          <div> 
                            <input type="checkbox" name="CrashSensor" id="CrashSensor" value="1">
                            <label>Crash Sensor</label>
                          </div>
                          <div> 
                            <input type="checkbox" name="LeatherSeats" id="LeatherSeats" value="1">
                            <label>Leather Seats</label>
                          </div>
                        </div>
                      </div>
                      <div class="setting-contacts-form-feature">
                        <div class="form-feature">
                          <div class="feature-image">
                            <label>image 1 <span>*</span></label>
                            <input type="file" name="Vehicle_img_1" id="Vehicle_img_1" required>
                          </div>
                          <div class="feature-image">
                            <label>image 2 <span>*</span></label>
                            <input type="file" name="Vehicle_img_2" id="Vehicle_img_2" required>
                          </div>
                          
                        </div>
                        <div class="form-feature">
                          <div class="feature-image">
                            <label>image 3 <span>*</span></label>
                            <input type="file" name="Vehicle_img_3" id="Vehicle_img_3" required>
                          </div>
                          <div class="feature-image">
                            <label>image 4 <span>*</span></label>
                            <input type="file" name="Vehicle_img_4" id="Vehicle_img_4" required>
                          </div>
                          
                        </div>
                        <div class="form-feature">
                          <div class="feature-image">
                            <label>image 5</label>
                            <input type="file" name="Vehicle_img_5" id="Vehicle_img_5">
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


                <!-- edit feature -->
                <div class="popup" id="editpopup" style="width: 800px;">
                  <div class="setting-title">
                    <h2>Edit Features</h2>
                  </div>
                  <div class="setting-form">
                    <form id="features_edit_form" method="post"  enctype="multipart/form-data" action="?"> 
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
                            <input type="number" name="Perdayprice" id="Perdayprice" required>
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
                          <div>
                            <input type="checkbox" name="Airconditioner" id="Airconditioner" value="1">
                            <label>Airconditioner</label>
                          </div>
                          <div> 
                            <input type="checkbox" name="PowerDoorLocks" id="PowerDoorLocks" value="1">
                            <label>PowerDoorLocks</label>
                          </div>
                          <div> 
                            <input type="checkbox" name="BrakeAssist" id="BrakeAssist" value="1">
                            <label>Brake Assist</label>
                          </div>
                          <div> 
                            <input type="checkbox" name="PowerSteering" id="PowerSteering" value="1">
                            <label>Power Steering</label>
                          </div>
                        </div>
                        <div class="form-feature">
                          <div>
                            <input type="checkbox" name="DriverAirbag" id="DriverAirbag" value="1">
                            <label>Driver Airbag</label>
                          </div>
                          <div> 
                            <input type="checkbox" name="AntiLockBrakingSystem" id="AntiLockBrakingSystem" value="1">
                            <label>AntiLock Braking System</label>
                          </div>
                          <div> 
                            <input type="checkbox" name="PassengerAirbag" id="PassengerAirbag" value="1">
                            <label>Passenger Airbag</label>
                          </div>
                          <div> 
                            <input type="checkbox" name="PowerWindows" id="PowerWindows" value="1">
                            <label>Power Windows</label>
                          </div>
                        </div>
                        <div class="form-feature">
                          <div>
                            <input type="checkbox" name="CDPlayer" id="CDPlayer" value="1">
                            <label>CD Player	</label>
                          </div>
                          <div> 
                            <input type="checkbox" name="CentralLocking" id="CentralLocking" value="1">
                            <label>Central Locking</label>
                          </div>
                          <div> 
                            <input type="checkbox" name="CrashSensor" id="CrashSensor" value="1">
                            <label>Crash Sensor</label>
                          </div>
                          <div> 
                            <input type="checkbox" name="LeatherSeats" id="LeatherSeats" value="1">
                            <label>Leather Seats</label>
                          </div>
                        </div>
                      </div>
                      <div class="setting-contacts-form-feature">
                        <div class="form-feature">
                          <div class="feature-image">
                            <label>image 1 <span>*</span></label>
                            <input type="file" name="Vehicle_img_1" id="Vehicle_img_1" required>
                          </div>
                          <div class="feature-image">
                            <label>image 2 <span>*</span></label>
                            <input type="file" name="Vehicle_img_2" id="Vehicle_img_2" required>
                          </div>
                          
                        </div>
                        <div class="form-feature">
                          <div class="feature-image">
                            <label>image 3 <span>*</span></label>
                            <input type="file" name="Vehicle_img_3" id="Vehicle_img_3" required>
                          </div>
                          <div class="feature-image">
                            <label>image 4 <span>*</span></label>
                            <input type="file" name="Vehicle_img_4" id="Vehicle_img_4" required>
                          </div>
                          
                        </div>
                        <div class="form-feature">
                          <div class="feature-image">
                            <label>image 5</label>
                            <input type="file" name="Vehicle_img_5" id="Vehicle_img_5">
                          </div>
                        </div>
                        <input type="hidden" name="f_id">
                      </div>
                      <div class="setting-button">
                        <button type="Reset" onclick="editClosePopup()">Cancel</button>
                        <button type="submit" name="edit_facility">Submit</button>
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
                    $q="SELECT * FROM `features` ORDER BY `f_id` DESC";
                    $data= mysqli_query($con,$q);
                    $i=1;
                    while($row=mysqli_fetch_assoc($data)){
                      echo <<< query
                      <tr>
                        <td>$i</td>
                        <td>$row[Vehicle_title]</td>
                        <td>$row[Vehicle_brand]</td>
                        <td>$row[Perdayprice]</td>
                        <td>$row[Fuel_type]</td>
                        <td>$row[Model_year]</td>
                        <td>
                          <button onclick="editOpenPopup()"><a href='features_facilities.php/?id($row[f_id])'>  <i class='bx bxs-edit'></i></a></button>
                          <button type="submit" onclick="rem_member($row[f_id])"><i class='bx bxs-trash'></i></button>

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

    <script src="script/script.js">
      
    </script>
    
  </body>
</html>
