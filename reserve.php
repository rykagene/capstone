<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/reserve.css">
  <?php include 'assets/php/libraries.php'?>
  <title>Reserve Seat</title>
  <style>
 

#btn-check {
 border: 1px solid #a81c1c !important;

}
.btn-check:checked+.btn, .btn.active {
 background: #a81c1c;
}


#selectSeatForm, #view-3d {
  height: 100vh!important;
}

body::before {
  content: "XS";
  color: red;
  font-size: 2rem;
  font-weight: bold;
  position: fixed;
  top: 0;
  right: 0;
}

model-viewer {
  width: 100%;
  height: 85vh!important;   
}
      

/* This box class is purely used for explaining how the bootstrap grid system works. */
.box {
  background-color: lightblue;
  border: 1px solid blue;
  min-height: 50px;
  font-size: 2rem;
}

@media (min-width: 576px) {
  body::before {
    content: "XS";
  }

}

@media (min-width: 768px) {
  body::before {
    content: "MD";
  }
}

@media (min-width: 992px) {
  body::before {
    content: "LG";
  }
  #dateTimeDiv {
  height: 100vh!important;
}
}

@media (min-width: 1200px) {
  body::before {
    content: "XL";
  }
  #dateTimeDiv {
  height: 100vh!important;
}
}

@media (min-width: 1400px) {
  body::before {
    content: "XXL";
  }
  #dateTimeDiv {
  height: 100vh!important;
}
}

.form-check-input {
  clear: left;
}


.form-switch.form-switch-md {
  margin-bottom: 1rem; /* JUST FOR STYLING PURPOSE */
}

.form-switch.form-switch-md .form-check-input {
  height: 1.5rem;
  width: calc(2rem + 0.75rem);
  border-radius: 3rem;
}
.form-check-input[type="checkbox"]:checked {
    background-color: #a81c1c;
    border: 1px solid #a81c1c;
  }

 




  </style>
</head>


<body>

  
  <!------------------------ HEADER --------------------->

  <?php include 'assets/php/header.php'; ?>

  <!------------------------ END HEADER --------------------->

    <?php
    $count_query = "SELECT COUNT(*) AS reservation_count FROM reservation WHERE user_id = '{$_SESSION['user_id']}' AND date >= CURDATE()";
    $count_result = mysqli_query($conn, $count_query);
    $count_row = mysqli_fetch_assoc($count_result);
    $reservation_count = $count_row['reservation_count'];

    // Retrieve the maximum reservation per day from the settings table
    $settings_query = "SELECT reservePerDay FROM settings WHERE settings_id = '1'";
    $settings_result = mysqli_query($conn, $settings_query);
    $settings_row = mysqli_fetch_assoc($settings_result);
    $reservePerDay = $settings_row['reservePerDay'];

    $_SESSION["reservation_count"] = $reservation_count;

    // Check if the reservation count has reached the limit
    if ($reservation_count >= $reservePerDay) {
        echo "<script>
                  Swal.fire({
                    icon: 'warning',
                    title: 'Reservation Limit Reached',
                    text: 'You have reached the maximum reservation limit for today.',
                    confirmButtonText: 'OK',
                    onClose: function() {
                      window.location.href = 'home.php';
                    }
                  });
              </script>";
    } else {
        echo "<span class='total-reservation'>{$reservation_count} / {$reservePerDay}</span>";
    }
    ?>


  <div class="wrapper">
  <div class="container-fluid">
    <div class="row  bg-light mt-3 mb-3">
      <div class="col-lg-4">
        <!-------------------------DATE & TIME PICKER CARD DIV--------------------->
        <div id="dateTimeDiv"class="card" data-aos="fade-right">
          <div class="card-header bg-light">
            <h5>Date & Time</h5>
          </div>
          <div class="card-body">
            <form id="reserveForm" method="get">
              <div class="">
                <div class="form-group">
                  <!-- <label for="date" class="text-muted">Reserve seat on</label> -->
                  <div class="row d-flex justify-content-center">
                  
                    <input type="text" id="date" class="form-control d-none" min="<?php echo date('Y-m-d') ?>" name="date" required="required" > 
                  </div>
                </div>
                <!-- date picker -->
                <script>
                    flatpickr("#date", {
                      theme: "default",
                      inline: true,
                      dateFormat: "Y-m-d",
                      minDate: "today",
                      defaultDate: "today"
                  
                    });
                </script>
                <!-- end of date picker -->
                

                <div class="form-floating mb-3">
                  <input type="time" class="form-control" id="start_time" name="start_time" required onchange="getEndTime()" min="<?php echo date('H:i'); ?>" value="">
                  <label for="start_time" class="text-muted">From</label>
                </div>

                <div class="form-group">
                    <label for="duration" class="text-muted small m-2">Duration:</label>
                    <div class="btn-group btn-group-toggle w-100" role="group" aria-label="Basic radio toggle button group">
                        <?php
                        $sql = "SELECT * FROM `settings` WHERE `settings_id` = 1";
                        $result = mysqli_query($conn, $sql);

                        // Check if the query was successful and fetch the row of data
                        if ($result && mysqli_num_rows($result) > 0) {
                            $settings = mysqli_fetch_assoc($result);
                            $minDuration = $settings['minDuration'];
                            $maxDuration = $settings['maxDuration'];

                            for ($i = $minDuration; $i <= $maxDuration; $i++) {
                                echo '<input type="radio" class="btn-check" name="options" id="option' . $i . '" value="' . $i . '" autocomplete="off" onclick="getEndTime()">';
                                echo '<label class="btn btn-outline-danger m-2 rounded ml-2 mr-2" id="btn-check" for="option' . $i . '">' . $i . ' hour' . (($i > 1) ? 's' : '') . '</label>';
                            }
                        } else {
                            echo "Error retrieving settings: " . mysqli_error($conn);
                        }

                        // Close the result set
                        mysqli_free_result($result);

                        // Close the database connection
                        mysqli_close($conn);
                        ?>
                    </div>
                </div>



                <div class="form-floating mb-3">
                <input type="time" class="form-control-plaintext" readonly id="end_time" name="end_time" required="required">
                  <label for="end_time" class="text-muted">To:</label>
                </div>
                
                <div class="form-check form-switch form-switch-md">
                 
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="viewOption" checked onchange="handleFormChange()" style="--background-color: #FF0000;">
                  <label class="form-check-label m-1" for="flexSwitchCheckDefault">3D View</label>
                </div>

        
                <!-- <button type="submit" id="newReservationBtn" class="btn btn-lg btn-primary rounded w-100">Check Availability</button> -->
              </div>
            </form>
          </div>
        </div>
        <!-------------------------END OF DATE & TIME PICKER CARD DIV --------------------->
      </div>

       
      <div id="selectSeatForm" class="col mt-1" >
            
              <?php
              
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // $date = $_POST["date"];
                // $start_time = $_POST["start_time"];
                // $end_time = $_POST["end_time"];
                // include "view-3d.php";
                // include "view-2d.php";
              }
              ?>
            
          </div>
        </div>




      <!-------------------------END OF DATE & TIME PICKER--------------------->
    
  
    </div>
  </div>
  </div>

  <!------------------------ FOOTER ------------------------>

  <?php include 'assets/php/footer.php'; ?>
  <!------------------------ FOOTER ------------------------>


  <!-------------------------END OF 3D MODEL VIEW--------------------->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.2/angular.min.js'></script>
  
  <script>

  
  </script>
 
 <script src="assets/js/reserve.js"></script>
 
  <script>
 
  </script>
</body>

</html>