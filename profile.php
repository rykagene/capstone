<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';
require 'assets/php/validateReservation.php';




$query123 = "SELECT occupy.*, seat.seat_number, reservation.start_time, reservation.end_time 
          FROM occupy 
          INNER JOIN reservation ON occupy.reservation_id = reservation.reservation_id 
          INNER JOIN seat ON reservation.seat_id = seat.seat_id
          WHERE reservation.user_id = '{$_SESSION['user_id']}' 
          AND reservation.date = CURDATE() 
          AND occupy.isDone = 0";

$result123 = mysqli_query($conn, $query123);

if (mysqli_num_rows($result123) == 1) {
    // If the query returns exactly one result, require the specified file
    require 'assets/php/occupancy_timer.php';
}

// Rest of your code here
?>






<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>My Profile</title>

    <!------------------------ Bootstrap 5.3.0 ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/popper.min.js"></script>
    <!------------------------ CSS Link ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/css/profile.css" />
    <!------------------------ ICONS ------------------------>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

        <script>
    // Function to trigger the PHP script
    function triggerValidation() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'assets/php/validateReservation.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    console.log('Checked expired validation');
                } else {
                    console.log('Error in checking expired validation');
                }
            }
        };
        xhr.send();
    }

    // Call the function immediately
    triggerValidation();

    // Set up a recurring timer to call the function every 5 seconds (5000 milliseconds)
    setInterval(triggerValidation, 5000);
</script>


</head>
<style>
    .nav-pills .nav-link {
        outline: none !important;
        border: none !important;
    }

    .nav-pills .nav-link.active {
        
        background-color: #a81c1c ;
    }
</style>


<body>


    <div class="wrapper">

       
      
  <!------------------------ HEADER --------------------->

  <header class="header-outer">
    <div class="header-inner responsive-wrapper">
      <div class="header-logo">
        <img src="assets/img/elib logo.png" class="icon">
      </div>
      <nav class="header-navigation">
        <a href="home.php">HOME</a>
        <a href="home.php#aboutus">ABOUT US</a>
        <a href="reserve.php">RESERVE SEAT</a>
        <a id="hidden" href="occupy.php">OCCUPY SEAT</a>

        <a class="active" id="hidden" href="profile.php">ACCOUNT</a>
        <a id="hidden" href="toLogout.php">LOGOUT</a>
        <!-- <a id="show" href="login.php" >LOGIN</a> -->
      </nav>
    </div>
  </header>

  <!------------------------ END HEADER --------------------->



        <div class="my-proflie">
            <div class="app-wrapper">

            <?php
            // Retrieve the username from the session
            $username = $_SESSION["username"];

            // Retrieve the user details from the database
$sql = "SELECT *
FROM ACCOUNT
INNER JOIN USERS ON ACCOUNT.account_id = USERS.account_id
WHERE ACCOUNT.username = '$username'";


            $result = $conn->query($sql);

            // Check if a matching record is found
            if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
           
            

            // Populate the HTML template with the fetched data
            echo '
            <aside class="profile">
                
                <div class="details">
                <div class="profile-pic">
                    <label class="-label" for="file">
                    <span>Change Image</span>
                    </label>
                    <input id="file" type="file" onchange="loadFile(event)" />
                    <img src="' . $row["picture"] . '" id="output" width="200" />
                </div>
                <h4>' . $row["first_name"] . ' ' . $row["last_name"] . '</h4>
                <p>' . $row["user_id"] . '</p>
                <div class="profile-info">
                    <h5><span>RFID No:</span> ' . $row["rfid_no"] . '</h5>
                    <h5><span>Contact No:</span> ' . $row["contact_number"] . '</h5>
                    <h5><span>Username:</span> ' . $row["username"]. '</h5>
                    <h5><span>Email:</span> ' . $row["email"] . '</h5>
                    <h5><span>Age:</span> ' . $row["age"] . '</h5>
                    <h5><span>Gender:</span> ' . $row["gender"] .  '</h5>
                    <h5><span>Course:</span> ' . $row["course_code"] . '</h5>
                    
              
                </div>
                <div class="edit-info">
                    <a href="update_profile.php" class="btn btn-danger"><span class="las la-user-edit"></span>Edit </a>
                </div>
                </div>
            </aside>
            ';
            } else {
            // Handle the case when no matching record is found
            echo "You are not regular student. Either alumni or faculty";
            }

            // Close the database connection
            // $conn->close();
            ?>


                <!--
                <content class="reservations-wrapper">

                    <h2>
                        Reservation History &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                        <span class="total-reservation">6</span>

                    </h2>
                    <div class="reservations">
                        <h3>PC12 6th floor</h3>
                        <p>
                            <ion-icon name="time-outline"></ion-icon>
                            10:30 am - 11:30 am <br>
                            <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                        </p><br><br>
                        <h3>PC12 6th floor</h3>
                        <p>
                            <ion-icon name="time-outline"></ion-icon>
                            10:30 am - 11:30 am <br>
                            <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                        </p><br><br>
                        <h3>PC12 6th floor</h3>
                        <p>
                            <ion-icon name="time-outline"></ion-icon>
                            10:30 am - 11:30 am <br>
                            <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                        </p><br><br>
                        <h3>PC12 6th floor</h3>
                        <p>
                            <ion-icon name="time-outline"></ion-icon>
                            10:30 am - 11:30 am <br>
                            <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                        </p><br><br>
                        <h3>PC12 6th floor</h3>
                        <p>
                            <ion-icon name="time-outline"></ion-icon>
                            10:30 am - 11:30 am <br>
                            <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                        </p><br><br>
                        <h3>PC12 6th floor</h3>
                        <p>
                            <ion-icon name="time-outline"></ion-icon>
                            10:30 am - 11:30 am <br>
                            <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                        </p><br><br>
                    </div>

                </content>
-->

                <!-- <content class="reservations-wrapper">

                    <h2>
                        Pending Reservation &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                        <span class="total-reservation"> 2/3</span>
                    </h2>
                    <div class="reservations">
                        <h3>PC12 6th floor</h3>
                        <p>
                            <ion-icon name="time-outline"></ion-icon>
                            10:30 am - 11:30 am <br>
                            <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                        </p><br><br>
                        <h3>PC12 6th floor</h3>
                        <p>
                            <ion-icon name="time-outline"></ion-icon>
                            10:30 am - 11:30 am <br>
                            <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                        </p><br><br>



                        <h2>
                            Reservation History &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                            <span class="total-reservation">6</span>

                        </h2>
                        <div class="reservations">
                            <h3>PC12 6th floor</h3>
                            <p>
                                <ion-icon name="time-outline"></ion-icon>
                                10:30 am - 11:30 am <br>
                                <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                            </p><br><br>
                            <h3>PC12 6th floor</h3>
                            <p>
                                <ion-icon name="time-outline"></ion-icon>
                                10:30 am - 11:30 am <br>
                                <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                            </p><br><br>
                            <h3>PC12 6th floor</h3>
                            <p>
                                <ion-icon name="time-outline"></ion-icon>
                                10:30 am - 11:30 am <br>
                                <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                            </p><br><br>
                            <h3>PC12 6th floor</h3>
                            <p>
                                <ion-icon name="time-outline"></ion-icon>
                                10:30 am - 11:30 am <br>
                                <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                            </p><br><br>
                            <h3>PC12 6th floor</h3>
                            <p>
                                <ion-icon name="time-outline"></ion-icon>
                                10:30 am - 11:30 am <br>
                                <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                            </p><br><br>
                            <h3>PC12 6th floor</h3>
                            <p>
                                <ion-icon name="time-outline"></ion-icon>
                                10:30 am - 11:30 am <br>
                                <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                            </p><br><br>

                        </div>
                    </div>


                </content> -->

                <div class="container mt-2">
    <ul class="nav nav-pills  nav-justified m-3" id="reservationTabs" role="tablist">
        <li class="nav-item " role="presentation">
            <a class="nav-link active rounded-3" id="myReservation-tab" data-bs-toggle="pill" href="#myReservation" role="tab" aria-controls="myReservation" aria-selected="true">My Reservation</a>
        </li>

        <!-- <li class="nav-item" role="presentation">
            <a class="nav-link  rounded-3" id="ongoing-tab" data-bs-toggle="pill" href="#ongoing" role="tab" aria-controls="ongoing" aria-selected="false">Occupying</a>
        </li> -->
      
        <li class="nav-item" role="presentation">
            <a class="nav-link  rounded-3" id="history-tab" data-bs-toggle="pill" href="#history" role="tab" aria-controls="history" aria-selected="false">History</a>
        </li>
    </ul>

    <div class="tab-content" id="reservationTabsContent">
         <!-- My Reservation Tab -->
        <div class="tab-pane fade show active" id="myReservation" role="tabpanel" aria-labelledby="myReservation-tab">
            <?php include_once("profile_tab1.php");?>
        </div>
       
       <!-- Ongoing Tab -->
        <!-- <div class="tab-pane fade" id="ongoing" role="tabpanel" aria-labelledby="ongoing-tab">
           
        </div> -->
        
        <!-- History Tab -->
        <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">          
            <?php include_once("profile_tab3.php"); ?>
        </div>
    </div>
</div>






<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(reservationId) {
        Swal.fire({
            title: 'Cancel reservation?',
            text: 'You will not be able to recover this reservation!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#a81c1c",
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            cancelButtonColor: '#d3d3d3',
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, proceed with the deletion via AJAX
                $.ajax({
                    url: `toCancelReservation.php?reservation_id=${reservationId}`,
                    type: 'GET',
                    success: function(response) {
                        if (response === "Success") {
                            // Deletion was successful, show success message
                            Swal.fire({
                                title: 'Success!',
                                text: 'The reservation has been deleted.',
                                icon: 'success',
                                confirmButtonColor: "#3085d6",
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Redirect to profile.php or perform other actions
                                    window.location.href = 'profile.php';
                                }
                            });
                        } else if (response === "Ongoing reservation") {
                            // Reservation is still ongoing; show an error message
                            Swal.fire({
                                title: 'Error',
                                text: 'You cannot delete a reservation that is currently ongoing.',
                                icon: 'error',
                                confirmButtonColor: "#a81c1c",
                                confirmButtonText: 'OK'
                            });
                        } else {
                            // Handle other error cases here
                            Swal.fire({
                                title: 'Error',
                                text: response,
                                icon: 'error',
                                confirmButtonColor: "#a81c1c",
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        // Handle AJAX errors here
                        Swal.fire({
                            title: 'Error',
                            text: 'An error occurred while deleting the reservation.',
                            icon: 'error',
                            confirmButtonColor: "#a81c1c",
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
    }
</script>






            </div>

        </div>
              

        <!------------------------ FOOTER ------------------------>
       <?php include 'assets/php/footer.php';?>
        <!------------------------ FOOTER ------------------------>
    </div>

</body>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/popper.min.js"></script>



</html>