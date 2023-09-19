<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.0.1/model-viewer.min.js"></script>
    <title>Reserve3D</title>
    <!------------------------ Bootstrap 5.3.0 ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
    <!------------------------ CSS Link ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/css/timer.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
</head>

<body>

    <div class="wrapper">

        <!-- Sticky header -->
        <?php include 'assets/php/header.php'; ?>
        <!-- Sticky header -->

        <!------------------------ TIMER START ------------------------>
        <div class="container" id="container">
            <div class="form-container sign-in-container">
                <form action="#">
                <?php
$ongoing_query = "SELECT occupy.*, seat.seat_number, reservation.start_time, reservation.end_time 
                FROM occupy 
                INNER JOIN reservation ON occupy.reservation_id = reservation.reservation_id 
                INNER JOIN seat ON reservation.seat_id = seat.seat_id
                WHERE reservation.user_id = '{$_SESSION['user_id']}' 
                AND reservation.date = CURDATE() 
                AND occupy.isDone = 0";

$ongoing_result = mysqli_query($conn, $ongoing_query);


if (mysqli_num_rows($ongoing_result) > 0) {
    $row = mysqli_fetch_assoc($ongoing_result);
    $seat_number = $row['seat_number'];
    $start_time = date('h:i A', strtotime($row['start_time'])); // Convert start time to AM/PM format
    $end_time = date('h:i A', strtotime($row['end_time'])); // Convert end time to AM/PM format
    $reservation_id = $row['reservation_id'];

    $end_timestamp = strtotime($row['end_time']);
    $current_timestamp = time();
    $remaining_time = max(0, $end_timestamp - $current_timestamp); // Remaining time in seconds

    // Calculate the remaining time in seconds
    $end_timestamp = strtotime($row['end_time']);
    $current_timestamp = time();
    $remaining_seconds = max(0, $end_timestamp - $current_timestamp); // Remaining time in seconds

    $remaining_hours = floor($remaining_seconds / 3600); // Calculate remaining hours
    $remaining_minutes = floor(($remaining_seconds % 3600) / 60); // Calculate remaining minutes
    $remaining_seconds %= 60; // Calculate remaining seconds

    echo "<h1>Seat {$seat_number}</h1>";
    echo "<span>6th Floor</span>";
    echo "<h5>{$start_time} - {$end_time}</h5>";
    echo "<i>Please don't forget your ID when done</i><br>";
    // echo "<h7>Time Left:  ";

    // if ($remaining_hours > 0) {
    //     echo "{$remaining_hours} hr";
    //     if ($remaining_minutes > 0) {
    //         echo " {$remaining_minutes} min";
    //         if ($remaining_seconds > 0) {
    //             echo " {$remaining_seconds} sec";
    //         }
    //     } else {
    //         if ($remaining_seconds > 0) {
    //             echo "{$remaining_seconds} seconds";
    //         }
    //     }
    // } else {
    //     if ($remaining_minutes > 0) {
    //         echo "{$remaining_minutes} minutes";
    //         if ($remaining_seconds > 0) {
    //             echo " and {$remaining_seconds} seconds";
    //         }
    //     } else {
    //         echo "{$remaining_seconds} seconds";
    //     }
    // }
    // echo "</h7>";
    echo "<a href='#' class='btn btn-outline-danger btn-sm' onclick='markReservationAsDone({$row['reservation_id']}); return false;'>Mark as Done</a>";
    
} else {
    echo "<h1>No ongoing reservations for this user.</h1>";
    $remaining_time = 0; // No ongoing reservations
}

mysqli_free_result($ongoing_result);
?>

                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Time Left:</h1>
                        <div id="app"></div>

                        <script>
        // Start the timer if there is remaining time
        if (TIME_LIMIT > 0) {
            document.getElementById("app").innerHTML = `
                <div class="base-timer">
                    <!-- Rest of the timer HTML remains the same -->
                </div>
            `;
            startTimer();
        }
    </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------JAVASCRIPT-------->

    <script>
              function markReservationAsDone(reservationId) {
    Swal.fire({
        title: 'Occupying Done?',
        text: 'This button will serve as act of removing RFID card on the reader will automatically submit this form',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'green',
        cancelButtonColor: '#d3d3d3',
        confirmButtonText: 'Mark this seat as available'
    }).then((result) => {
        if (result.isConfirmed) {
            // Send AJAX request to update seat status and move reservation to history
            // mark as done button
            $.ajax({
                url: `toAddHistory.php?reservation_id=${reservationId}`,  
                type: 'GET',
                success: function (response) {
                    window.location.href = `survey.php`;
                    
                },
                error: function (xhr, textStatus, errorThrown) {
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while marking the reservation as done.',
                        icon: 'error',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }
    });
}
    </script>

 <script>
    const FULL_DASH_ARRAY = 283;
    const WARNING_THRESHOLD = 10;
    const ALERT_THRESHOLD = 5;

    const COLOR_CODES = {
        info: {
            color: "green"
        },
        warning: {
            color: "orange",
            threshold: WARNING_THRESHOLD
        },
        alert: {
            color: "red",
            threshold: ALERT_THRESHOLD
        }
    };
    const TIME_LIMIT = <?php echo $remaining_time; ?>;

    let timePassed = 0;
    let timeLeft = TIME_LIMIT;
    let timerInterval = null;
    let remainingPathColor = COLOR_CODES.info.color;

    document.getElementById("app").innerHTML = `
        <div class="base-timer">
            <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <g class="base-timer__circle">
                    <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
                    <path
                        id="base-timer-path-remaining"
                        stroke-dasharray="283"
                        class="base-timer__path-remaining ${remainingPathColor}"
                        d="
                        M 50, 50
                        m -45, 0
                        a 45,45 0 1,0 90,0
                        a 45,45 0 1,0 -90,0
                        "
                    ></path>
                </g>
            </svg>
            <span id="base-timer-label" class="base-timer__label">${formatTime(timeLeft)}</span>
        </div>
    `;

    startTimer();

    function onTimesUp() {
        clearInterval(timerInterval);
    }

    function startTimer() {
        timerInterval = setInterval(() => {
            timePassed = timePassed += 1;
            timeLeft = TIME_LIMIT - timePassed;
            document.getElementById("base-timer-label").innerHTML = formatTime(timeLeft);
            setCircleDasharray();
            setRemainingPathColor(timeLeft);

            if (timeLeft === 0) {
                onTimesUp();
                $.ajax({
                url: `toAddHistory.php?reservation_id=<?php echo $reservation_id;?>`,  
                type: 'GET',
                success: function (response) {
                    window.location.href = `survey.php`;
                    
                },
                error: function (xhr, textStatus, errorThrown) {
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while marking the reservation as done.',
                        icon: 'error',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    });
                }
            });
                window.location.href = "survey.php";
            }
        }, 1000);
    }

    function formatTime(time) {
        const minutes = Math.floor(time / 60);
        const seconds = time % 60;
        return `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    }

    function setRemainingPathColor(timeLeft) {
        const { alert, warning, info } = COLOR_CODES;
        if (timeLeft <= alert.threshold) {
            document.getElementById("base-timer-path-remaining").classList.remove(warning.color);
            document.getElementById("base-timer-path-remaining").classList.add(alert.color);
        } else if (timeLeft <= warning.threshold) {
            document.getElementById("base-timer-path-remaining").classList.remove(info.color);
            document.getElementById("base-timer-path-remaining").classList.add(warning.color);
        }
    }

    function calculateTimeFraction() {
        const rawTimeFraction = timeLeft / TIME_LIMIT;
        return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
    }

    function setCircleDasharray() {
        const circleDasharray = `${(calculateTimeFraction() * FULL_DASH_ARRAY).toFixed(0)} 283`;
        document.getElementById("base-timer-path-remaining").setAttribute("stroke-dasharray", circleDasharray);
    }
</script>

</body>

</html>
