<?php
require_once 'assets/php/connect.php';
session_start();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form 
  $username = $_POST['username'];
  $password = $_POST['password'];

    // Check if the user is an admin
  $sql = "SELECT * FROM account WHERE username = '$username' AND account_type = 'admin'";
  $result = $conn->query($sql);

  // if admin account found
  if ($result->num_rows == 1) {
    // Fetch the admin details
    $row = $result->fetch_assoc();
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;
    $_SESSION["admin_id"] = $admin_id;
    $_SESSION["first_name"] = $first_name;
    $_SESSION["last_name"] = $last_name;
    $_SESSION["gender"] = $row['gender'];
    $_SESSION["reservation_count"] = $reservation_count;
    header("Location: admin.php");
    exit();

  }
  // Login failed
  $error_message = "Invalid username or password";
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign in & Sign up Form</title>
  <!------------------------ CSS Link ------------------------>
  <link rel="stylesheet" href="assets/css/login.css" />
  <!------------------------ Bootstrap 5.3.0 ------------------------>
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
  <main>
    <div class="box">
      <div class="inner-box">
        <div class="forms-wrap">

          <!-- LOGIN FORM -->
          <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" autocomplete="on" class="sign-in-form">
            <div class="logo">
              <img src="assets/img/elib logo.png" alt="easyclass" />
              <h4>SOAR</h4>
            </div>

            <div class="heading">
              <h2>Hello, Admin</h2>
            
            </div>

            <div class="actual-form">
              <div class="input-wrap">
                <input type="text" name="username" class="input-field" autocomplete="off" required />
                <label>Username</label>
              </div>

              <div class="input-wrap">
                <input type="password" name="password" class="input-field" autocomplete="off" required />
                <label>Password</label>
              </div>

              <?php if (isset($error_message)) { ?>
                <p style="color:red">
                  <?php echo $error_message; ?>
                </p>
              <?php } ?>

              <input type="submit" value="Login as Admin" class="sign-btn" />
              <p class="text">
                <a href="#">Forgot Password?</a>
              </p>
            </div>
          </form>
          <!-- END OF LOGIN FORM -->
  <script src="assets/js/login.js"></script>

  <!-- Javascript file -->
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/bootstrap/js/popper.min.js"></script>
</body>
</html>