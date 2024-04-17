<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Car Rental Booking System</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <h1>Car Rental Booking System</h1>
    <form action="booking.php" method="post">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required /><br />
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required /><br />
      <label for="car_type">Car Type:</label>
      <select id="car_type" name="car_type" required>
        <option value="SUV">SUV</option>
        <option value="Sedan">Sedan</option>
        <option value="Hatchback">Hatchback</option></select
      ><br />
      <label for="pickup_date">Pickup Date:</label>
      <input
        type="date"
        id="pickup_date"
        name="pickup_date"
        min="<?php echo date('Y-m-d'); ?>"
        required
      /><br />
      <input type="submit" value="Book Now" />
    </form>
  </body>
</html>
