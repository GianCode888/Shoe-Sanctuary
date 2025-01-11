<?php 
include_once 'databaseconnection.php';

// Start session to display error messages
session_start();
if (isset($_SESSION['error_message'])) {
    echo "<p style='color: red;'>" . $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Styles/sign_up.css">
    <title>Sign up</title>
  </head>

  <body>
    <!-- Sign-up Form -->
    <form action="process_signup.php" method="POST">
      <h1>Sign up</h1>

      <!-- Account Information Section -->
      <p>Account Information</p>

      <!-- Username Input -->
      <div>
          <label for="username">Username</label>
          <input type="text" id="username" name="username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" required maxlength="50" />
      </div>

      <!-- Full Name Input -->
      <div>
          <label for="fullname">Full Name</label>
          <input type="text" id="fullname" name="fullname" value="<?php echo isset($_SESSION['fullname']) ? $_SESSION['fullname'] : ''; ?>" required maxlength="50" />
      </div>

      <!-- Password Input -->
      <div>
          <label for="password">Password</label>
          <input type="password" id="password" name="password" value="" required />
      </div>

      <!-- Confirm Password Input -->
      <div>
          <label for="confirmpassword">Confirm Password</label>
          <input type="password" id="confirmpassword" name="confirmpassword" value="" required />
      </div>

      <!-- Email Input -->
      <div>
          <label for="email">Email</label>
          <input type="email" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required maxlength="50" />
      </div>

      <!-- Contact Number Input -->
      <div>
          <label for="contact_number">Contact Number</label>
          <input type="text" id="contact_number" name="contact_number" value="<?php echo isset($_SESSION['contact_number']) ? $_SESSION['contact_number'] : ''; ?>" required maxlength="11" pattern="\d{11}" />
      </div>

      <!-- Socials Input (Optional) -->
      <div>
          <label for="socials">Socials</label>
          <input type="text" id="socials" name="socials" placeholder="Optional" value="<?php echo isset($_SESSION['socials']) ? $_SESSION['socials'] : ''; ?>" maxlength="50" />
      </div>

      <!-- Date of Birth Input -->
      <div>
          <label for="dob">Date of Birth</label>
          <input type="date" id="dob" name="dob" value="<?php echo isset($_SESSION['dob']) ? $_SESSION['dob'] : ''; ?>" required />
      </div>

      <!-- Location Details Section -->
      <p>Fill Up Location Details</p>

      <!-- City Input -->
      <div>
          <label for="city">City</label>
          <input type="text" id="city" name="city" value="<?php echo isset($_SESSION['city']) ? $_SESSION['city'] : ''; ?>" required maxlength="50" />
      </div>

      <!-- Province Input -->
      <div>
          <label for="province">Province</label>
          <input type="text" id="province" name="province" value="<?php echo isset($_SESSION['province']) ? $_SESSION['province'] : ''; ?>" required maxlength="50" />
      </div>

      <!-- Postal Code/Zip Code Input -->
      <div>
          <label for="postal_code">Postal Code/Zip Code</label>
          <input type="text" id="postal_code" name="postal_code" value="<?php echo isset($_SESSION['postal_code']) ? $_SESSION['postal_code'] : ''; ?>" required maxlength="50" />
      </div>

      <!-- Street Address Input -->
      <div>
          <label for="street_address">Street Address</label>
          <input type="text" id="street_address" name="street_address" value="<?php echo isset($_SESSION['street_address']) ? $_SESSION['street_address'] : ''; ?>" required maxlength="50" />
      </div>

      <!-- Description Input -->
      <div>
          <label for="description">Description</label>
          <input type="text" id="description" name="description" value="<?php echo isset($_SESSION['description']) ? $_SESSION['description'] : ''; ?>" required maxlength="50" />
      </div>

      <!-- Submit Button -->
      <button type="submit">Sign Up</button>

      <!-- Link to Login Page -->
      <p>Already have an account? <a href="log_in.php">Log in</a></p>
    </form>
  </body>
</html>
