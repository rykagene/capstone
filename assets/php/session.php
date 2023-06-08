
    <!-- validation if the user is logged in -->
<?php 
// if the user was not logged in
if (!isset($_SESSION["user_id"]) && !isset($_SESSION["password"]) && !isset($_SESSION["first_name"]) && !isset($_SESSION["last_name"])) {
  echo '<style type="text/css">
      .wrapper .hidden{
          display: none;
      }
      </style>'; // reserve and account button is hidden if the user was not logged in
      header('Location: login.php');
      exit();

} else {
  echo '<style type="text/css">
      .wrapper .show{
          display: none;
      }
      </style>'; // login button is hidden if the user was logged in
}
?>