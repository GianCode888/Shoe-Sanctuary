<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log in</title>
  </head>
  <body>

<h2>Log In</h2>
<form method = "login_process.php" action = "POST">
<div>
<input type = "text" id = "username" name = "username" placeholder = "Username" required> <br>
</div>

<div>
  <input type = "password" id = "password" name = "password" placeholder = "Password" required>
</div>
</form>
  </body>
</html>
