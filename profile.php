<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';

?>


<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>My Profile</title>

    <!------------------------ Bootstrap 5.3.0 ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
    <!------------------------ CSS Link ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/css/profile.css" />
    <!------------------------ ICONS ------------------------>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body>

    <div class="wrapper">

       
      
  <!------------------------ HEADER --------------------->

  <?php include 'assets/php/header.php'; ?>

  <!------------------------ END HEADER --------------------->



        <div class="my-proflie">
            <div class="app-wrapper">

            <?php
            // Retrieve the username from the session
            $username = $_SESSION["username"];

            // Retrieve the user details from the database
            $sql = "SELECT * FROM ACCOUNT 
                    INNER JOIN USERS ON ACCOUNT.account_id = USERS.account_id
                    INNER JOIN COURSE ON USERS.course_code = COURSE.course_code
                    INNER JOIN YEARSEC ON USERS.yearsec_id = YEARSEC.yearsec_id
                    INNER JOIN COLLEGE ON COURSE.college_code = COLLEGE.college_code
                    WHERE ACCOUNT.username = '$username'";

            $result = $conn->query($sql);

            // Check if a matching record is found
            if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $email = $row["email"];
            $year = $row["year_level"];
            

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
                    <h5><span>RFID No:</span> ' . $row["rfid_no"] = NULL ? $row["rfid_no"] : "Have not yet. <a href=''> Register RFID</a>". '</h5>
                    <h5><span>Username:</span> ' . $row["username"]. '</h5>
                    <h5><span>Email:</span> ' . $email . '</h5>
                    <h5><span>Age:</span> ' . '</h5>
                    <h5><span>Gender:</span> ' .  '</h5>
                    <h5><span>College:</span> ' . $row["college_name"] . '</h5>
                    <h5><span>Course:</span> ' . $row["course_name"] . '</h5>
                    <h5><span>Year & Section:</span> ' . $year . ' ' . $row["section"] . '-G' . $row["section_group"] . '</h5>
                </div>
                <div class="edit-info">
                    <button type="submit" class="buttons"><span class="las la-user-edit"></span>Edit</button>
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


                <content class="reservations-wrapper">
    <h2>
        My Reservation &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        <?php
        $count_query = "SELECT COUNT(*) AS reservation_count FROM reservation WHERE user_id = '{$_SESSION['user_id']}' AND date >= CURDATE()";
        $count_result = mysqli_query($conn, $count_query);
        $count_row = mysqli_fetch_assoc($count_result);
        $reservation_count = $count_row['reservation_count'];
        echo "<span class='total-reservation'>{$reservation_count}/3</span>";
        ?>
    </h2>
    <div class="reservations">
        <?php

        
        $query = "SELECT * FROM reservation WHERE user_id = '{$_SESSION['user_id']}' AND date >= CURDATE() ORDER BY date ASC LIMIT 3";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $seat_id = $row['seat_id'];
                $date = date('F j, Y', strtotime($row['date'])); // Convert date to desired format
                $start_time = date('h:i A', strtotime($row['start_time'])); // Convert start time to AM/PM format
                $end_time = date('h:i A', strtotime($row['end_time'])); // Convert end time to AM/PM format

                // Retrieve additional information related to the reservation, such as seat details
                $seat_query = "SELECT * FROM seat WHERE seat_id = '$seat_id'";
                $seat_result = mysqli_query($conn, $seat_query);
                $seat_row = mysqli_fetch_assoc($seat_result);
                $seat_number = $seat_row['seat_number'];

                // Display the pending reservation information
                echo "<div class='row'><div class='col-8'>";
                echo "<h3>Seat {$seat_number}</h3>";
                echo "<p><ion-icon name='time-outline'></ion-icon> {$start_time} - {$end_time}<br>";
                echo "<ion-icon name='calendar-outline'></ion-icon> {$date}</p></div>";

                // Add View Details button

                echo "<div class='col'><a href='receipt.php?reservation_id={$row['reservation_id']}' class='btn btn-sm'>View Details</a></div>";

                echo "</div>";
                echo "<br><br>";
            }
        } else {
            // No pending reservations found
            echo "No  reservations yet. <a href='reserve.php'> Reserve seat </a>";
        }
        ?>
    </div>
</content>



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