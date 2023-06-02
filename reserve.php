<?php
session_start();
require 'connect.php';
if (!isset($_SESSION["student_id"]) && !isset($_SESSION["password"])) {
  header('Location: login.php');
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $date = $_POST["date"];
  $start_time = $_POST["start_time"];
  $end_time = $_POST["end_time"];

  $date_time = new DateTime($date);
  $date_in_words = $date_time->format('F j, Y');


  if (!empty($date) && !empty($start_time) && !empty($end_time)) {
    // Show the selectSeatForm div
    echo '<script>document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("selectSeatForm").style.display = "block";
               
                $("#newReservationForm").hide();

            });</script>';
  }
  // $seat_id = trim($_REQUEST['seat_id']);
  // if(!empty($seat_id)) {
  //     echo  $seat_id . $date . $start_time . $end_time;

  // }
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/reserve.css">
  <title>Library Seat Reservation</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  <!-- Include Bootstrap CSS and JS files -->
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Include SweetAlert2 CSS and JS files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

  <!-- SweetAlert2 CSS Bootstrap 4 Themes -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css" rel="stylesheet"> -->

  <!-- Flatpickr Date picker css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


  <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.0.1/model-viewer.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <style>
    /* Small devices (tablets, 768px and up) */
    @media (min-width: 768px) {
      model-viewer {
        width: 100%;
        height: 400px;
        margin: 0, auto;
      }
    }

    /* Medium devices (desktops, 992px and up) */
    @media (min-width: 992px) {
      model-viewer {
        width: 100%;
        height: 600px;
        margin: 0, auto;
      }
    }

    /* Large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {
      model-viewer {
        width: 100%;
        height: 800px;
        margin: 0, auto;
      }
    }
  </style>
</head>

<body>
  <div class="wrapper">

    <!-- Sticky header -->
    <header class="header-outer">
      <div class="header-inner responsive-wrapper">
        <div class="header-logo">
          <img src="assets/img/elib logo.png" class="icon">
        </div>
        <nav class="header-navigation">
          <a href="home.php">HOME</a>
          <a href="reserve.php" class="active">RESERVE A SEAT</a>
          <a href="home.php#aboutus">ABOUT US</a>
          <a href="profile.php">ACCOUNT</a>
          <a href="toLogout.php">LOGOUT</a>
        </nav>
      </div>
    </header>
    <!-- Sticky header -->


   

    <!-------------------------DATE & TIME PICKER--------------------->
    <div class="container-fluid">
      <div class="row mt-3">
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">

              <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                <div class="col-sm">
                  <div class="form-group">
                    <!-- <label for="date">Select Date</label> -->
                    <div class="row d-flex justify-content-center">
                      <input type="text" id="date" class="form-control" min="<?php echo date('Y-m-d') ?>" name="date"
                        required="required " hidden>
                    </div>
                  </div>
                  <script>
                    flatpickr("#date", {
                      theme: "default",
                      inline: true,
                      dateFormat: "Y-m-d",
                    });
                  </script>
                  <style>
                    .flatpickr-calendar,
                    .flatpickr-innerContainer,
                    .flatpickr-rContainer,
                    .dayContainer,
                    .flatpickr-days {
                      box-shadow: none;
                      border: none;
                      outline: none;

                    }

                    .flatpickr-day.selected,
                    .flatpickr-day.startRange,
                    .flatpickr-day.endRange,
                    .flatpickr-day.selected.inRange,
                    .flatpickr-day.startRange.inRange,
                    .flatpickr-day.endRange.inRange,
                    .flatpickr-day.selected:focus,
                    .flatpickr-day.startRange:focus,
                    .flatpickr-day.endRange:focus,
                    .flatpickr-day.selected:hover,
                    .flatpickr-day.startRange:hover,
                    .flatpickr-day.endRange:hover,
                    .flatpickr-day.selected.prevMonthDay,
                    .flatpickr-day.startRange.prevMonthDay,
                    .flatpickr-day.endRange.prevMonthDay,
                    .flatpickr-day.selected.nextMonthDay,
                    .flatpickr-day.startRange.nextMonthDay,
                    .flatpickr-day.endRange.nextMonthDay {
                      background: #a81c1c;
                      -webkit-box-shadow: none;
                      box-shadow: none;
                      color: #fff;
                      border-color: #a81c1c;
                    }
                  </style>
                  <div class="form-group">
                    <label for="start_time">Starts at:</label>
                    <select class="form-control" id="start_time" name="start_time" required onchange="getEndTime()">
                      <option value="">Select a time</option>
                      <option value="10:00:00">10:00 AM</option>
                      <option value="11:00:00">11:00 AM</option>
                      <option value="12:00:00">12:00 PM</option>
                      <option value="13:00:00">1:00 PM</option>
                      <option value="14:00:00">2:00 PM</option>
                      <option value="15:00:00">3:00 PM</option>
                      <option value="16:00:00">4:00 PM</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="duration">Duration:</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn-group-toggle-hour btn btn-sm rounded btn-outline-secondary ml-2 mr-2">
                        <input type="radio" name="options" id="option1" value="1" autocomplete="off"
                          onclick="getEndTime()">1 hour
                      </label>
                      <label class="btn btn-sm rounded btn-outline-secondary ml-2 mr-2">
                        <input type="radio" name="options" id="option2" value="2" autocomplete="off"
                          onclick="getEndTime()"> 2 hours
                      </label>
                      <label class="btn btn-sm rounded btn-outline-secondary ml-2 mr-2">
                        <input type="radio" name="options" id="option3" value="3" autocomplete="off"
                          onclick="getEndTime()"> 3 hours
                      </label>
                      <label class="btn btn-sm rounded btn-outline-secondary ml-2 mr-2">
                        <input type="radio" name="options" id="option4" value="4" autocomplete="off"
                          onclick="getEndTime()"> 4 hours
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="end_time">Ends at:</label>
                    <input type="time" class="form-control-plaintext readonly " readonly max="17:00" id="end_time"
                      name="end_time" required="required">
                  </div>
                </div>
                <div class="">
                  <div class="">
                    <button id="newReservationBtn" class="btn btn-lg btn-primary rounded w-100">Check
                      Availability</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-------------------------END OF DATE & TIME PICKER--------------------->

        <!-------------------------3D MODEL VIEW--------------------->
        <div class="col-sm-9">

          <div id="selectSeatForm">
            <div class="card view-3d">
              <?php
              if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $date = $_POST["date"];
                $start_time = $_POST["start_time"];
                $end_time = $_POST["end_time"];

                include "view-3d.php";
              }

              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!------------------------ FOOTER ------------------------>
  <footer>
    <div class="container">
      <div class="footer-top">
        <div class="row">
          <div class="col-md-6 col-lg-3 about-footer">
            <h3>Bulacan State University
              E-Library </h3>
            <ul>
              <li><a href="tel:(010) 919 7800"><i class="fas fa-phone fa-flip-horizontal"></i>
                  919 7800</a></li>
              <li><i class="fas fa-map-marker-alt"></i>
                Guinhawa,
                <br />City of Malolos,
                <br />Bulacan
              </li>
              <li><i class="fas fa-at"></i>
                officeofthepresident@bulsu.edu.ph
              </li>
            </ul>
          </div>
          <div class="col-md-6 col-lg-2 page-more-info">
            <div class="footer-title">
              <h4>Page links</h4>
            </div>
            <ul>
              <li><a href="home.php">Home</a></li>
              <li><a href="home.php#aboutus">About Us</a></li>
              <li><a href="reserve.php">Reserve seat</a></li>
              <li><a href="profile.php">Your Account</a></li>
            </ul>
          </div>

          <div class="col-md-6 col-lg-3 page-more-info">
            <div class="footer-title">
              <h4>More Info</h4>
            </div>
            <ul>
              <li><a href="survey.php">Rate our service</a></li>
              <li><a href="https://www.bulsu.edu.ph/">Official Website</a></li>
              <li><a href="https://myportal.bulsu.edu.ph/">BulSU Portal</a></li>
              <li><a href="https://www.bulsu.edu.ph/library/">Library Service</a></li>
            </ul>
          </div>
          <div class="col-md-6 col-lg-4 open-hours">
            <div class="footer-title">
              <h4>Open hours</h4>
              <ul class="footer-social">
                <li><a href="https://www.facebook.com/BulSUaklatan" target="_blank"><i
                      class="fab fa-facebook-f"></i></a></li>
                <li><a href="" target="_blank"><i class="fab fa-instagram"></i></a></li>
                <li><a href="" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>

              </ul>
            </div>
            <table class="table-hours">
              <tbody>
                <tr>
                  <td><i class="far fa-clock"></i>Monday-Thursday </td>
                  <td>10:00am - 7:00pm</td>
                </tr>
                <tr>
                  <td><i class="far fa-clock"></i>Friday</td>
                  <td>10:00am - 7:30pm</td>
                </tr>
                <tr>
                  <td><i class="far fa-clock"></i>Saturday</td>
                  <td>10:30am - 7:30pm</td>
                </tr>
                <tr>
                  <td><i class="far fa-clock"></i>Sunday</td>
                  <td>10:30am - 7:00pm</td>
                </tr>
              </tbody>
            </table>
            <hr>
            <div class="footer-logo">
              <table>
                <tbody>
                  <tr>
                    <td><img src="assets/img/elib logo.png"></td>
                    <td><img src="assets/img/bulsu logo.png"></td>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="footer-bottom">
        <div class="row">
          <div class="col-sm-4">
            <a href="">Privacy policy</a>
          </div>
          <div class="col-sm-8">
            <p>© 2017 Bulacan State University</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!------------------------ FOOTER ------------------------>
  <!-------------------------END OF 3D MODEL VIEW--------------------->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.2/angular.min.js'></script>
  <script src="reserve.js"></script>
  <script>
    // 	/* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
    // function openNav() {
    //     document.getElementById("mySidebar").style.width = "250px";
    //     document.getElementById("main").style.marginLeft = "250px";
    //   }

    //   /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
    //   function closeNav() {
    //     document.getElementById("mySidebar").style.width = "0";
    //     document.getElementById("main").style.marginLeft = "0";
    //   }



    function confirmSubmit() {

      Swal.fire({
        title: 'Reserve now?',
        html:
          'Date <b><?php echo $date_in_words; ?></b> on ' +
          '<b><?php echo date('h:i A', strtotime($start_time)) ?></b> to' +
          '<b><?php echo date('h:i A', strtotime($end_time)) ?></b>?',
        icon: 'question',
        confirmButtonText: 'Reserve',
        showCancelButton: true,
        cancelButtonColor: 'lightgray',
        confirmButtonColor: '#a81c1c'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Seat Reserved!',
            'You successfully reserved a seat.',
            'success'
          )
        }
      }).then(function () {

      })

    }


    function getEndTime() {
      const startTime = new Date(`2000-01-01T${document.getElementById("start_time").value}`);
      let duration = 0;
      const options = document.getElementsByName("options");
      for (let i = 0; i < options.length; i++) {
        if (options[i].checked) {
          duration = parseInt(options[i].value);
          break;
        }
      }
      const endTime = new Date(startTime.getTime() + duration * 60 * 60 * 1000);
      const endHour = endTime.getHours();
      const endMinute = endTime.getMinutes();
      const formattedEndHour = endHour < 10 ? `0${endHour}` : endHour;
      const formattedEndMinute = endMinute < 10 ? `0${endMinute}` : endMinute;
      document.getElementById("end_time").value = `${formattedEndHour}:${formattedEndMinute}`;
    }


    // confirmation box for reservation
    function successReservedMessage() {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Reserve Now'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Success!',
            'You have reserved a seat!',
            'success'
          )
        }
      })
    }

  </script>
</body>

</html>