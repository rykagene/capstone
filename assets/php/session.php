<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php 
// if the user was not logged in
if (!isset($_SESSION["user_id"]) && !isset($_SESSION["password"]) && !isset($_SESSION["first_name"]) 
&& !isset($_SESSION["last_name"]) &&!isset($_SESSION["reservation_count"])) {
//   echo '<style type="text/css">
//       .wrapper .hidden{
//           display: none;
//       }
//       </style>'; // reserve and account button is hidden if the user was not logged in
      header('Location: login.php');
      exit();

} else {
//   echo '<style type="text/css">
//       .wrapper .show{
//           display: none;
//       }
//       </style>'; // login button is hidden if the user was logged in
}

$query = "SELECT * FROM reservation WHERE date >= CURDATE() and end_time <= curtime() and isDOne = 0";
$result = mysqli_query($conn, $query);
      

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $reservation_id = $row['reservation_id'];
      $date = date('F j, Y', strtotime($row['date'])); // Convert date to desired format
      $start_time = date('h:i A', strtotime($row['start_time'])); // Convert start time to AM/PM format
      $end_time = date('h:i A', strtotime($row['end_time'])); // Convert end time to AM/PM forma
      $seat_id = $row['seat_id'];
      $isDone = $row['isDone'];

      ?>
      <script>
              $.ajax({
                url: `toAddHistory.php?reservation_id=<?php echo $reservation_id;?>`,  
                type: 'GET',
                success: function (response) {
                  console.log('some reservation is completed');
                   
                },
                error: function (xhr, textStatus, errorThrown) {
                  console.log('error');
                }
            });
            console.log('error');
            
      </script>

      <?php

    
    }
}
?>