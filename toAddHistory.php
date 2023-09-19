<?php
// session_start();
// require 'assets/php/connect.php';

// // Set the server's time zone to Asia/Manila
// date_default_timezone_set('Asia/Manila');

// if (isset($_GET['reservation_id'])) {
//     $reservation_id = $_GET['reservation_id'];
//     $current_time = date('H:i:s');
    

//     // Update the seat status to 0 (available)
//     $update_seat_query = "UPDATE seat SET status = 0 WHERE seat_id IN (SELECT seat_id FROM reservation WHERE reservation_id = $reservation_id)";
//     if (mysqli_query($conn, $update_seat_query)) {
//         // Move the reservation to history
//         $move_to_history_query = "INSERT INTO history (reservation_id, seat_id, user_id, date, start_time, end_time) 
//                                  SELECT reservation_id, seat_id, user_id, date, start_time, '$current_time' FROM reservation 
//                                  WHERE reservation_id = $reservation_id";

//         if (mysqli_query($conn, $move_to_history_query)) {
//             // Reservation successfully moved to history

//             // Now, delete the corresponding entry from the occupy table
//             $delete_occupy_query = "DELETE FROM occupy WHERE reservation_id = $reservation_id";
//             if (mysqli_query($conn, $delete_occupy_query)) {
//                 // Update the isDone column in the reservation table to 1
//                 $update_reservation_query = "UPDATE reservation SET isDone = 1 WHERE reservation_id = $reservation_id";
//                 if (mysqli_query($conn, $update_reservation_query)) {
//                     echo "Success";
//                 } else {
//                     echo "Error updating isDone column in reservation table: " . mysqli_error($conn);
//                 }
//             } else {
//                 echo "Error deleting entry from occupy table: " . mysqli_error($conn);
//             }
//         } else {
//             echo "Error moving reservation to history: " . mysqli_error($conn);
//         }
//     } else {
//         echo "Error updating seat status: " . mysqli_error($conn);
//     }
// } else {
//     echo "Invalid reservation ID";
// }
session_start();
require 'assets/php/connect.php';

// Set the server's time zone to Asia/Manila
date_default_timezone_set('Asia/Manila');

if (isset($_GET['reservation_id'])) {
    $reservation_id = $_GET['reservation_id'];

    // Get the current time
    $current_time = date('H:i:s');

    // Update the seat status to 0 (available)
    $update_seat_query = "UPDATE seat SET status = 0 WHERE seat_id IN (SELECT seat_id FROM reservation WHERE reservation_id = $reservation_id)";
    if (mysqli_query($conn, $update_seat_query)) {
        // Calculate spent time
        $get_spent_time_query = "SELECT SEC_TO_TIME(TIMESTAMPDIFF(SECOND, start_time, end_time)) AS spent_time FROM reservation WHERE reservation_id = $reservation_id";

        $spent_time_result = mysqli_query($conn, $get_spent_time_query);

        if ($spent_time_result) {
            $row = mysqli_fetch_assoc($spent_time_result);

            // spent time still cannot calculate diko alam kung bakit
            // spent time still cannot calculate diko alam kung bakit 
            // spent time still cannot calculate diko alam kung bakit 
            // spent time still cannot calculate diko alam kung bakit 
            // spent time still cannot calculate diko alam kung bakit 
            // spent time still cannot calculate diko alam kung bakit 
            $spent_time = $row['spent_time'];

            

            // Move the reservation to history and insert the spent time
            $move_to_history_query = "INSERT INTO history (reservation_id, seat_id, user_id, date, start_time, end_time, time_spent) 
                                 SELECT reservation_id, seat_id, user_id, date, start_time, '$current_time', '$spent_time' FROM reservation 
                                 WHERE reservation_id = $reservation_id";

           

            if (mysqli_query($conn, $move_to_history_query)) {
                // Reservation successfully moved to history

                // Now, delete the corresponding entry from the occupy table
                $update_occupy_query = "UPDATE occupy SET isDone = 1 WHERE reservation_id = $reservation_id";

                if (mysqli_query($conn, $update_occupy_query)) {
                    // Update the isDone column in the reservation table to 1
                    $update_reservation_query = "UPDATE reservation SET isDone = 1 WHERE reservation_id = $reservation_id";
                    if (mysqli_query($conn, $update_reservation_query)) {
                        echo "Success";
                    } else {
                        echo "Error updating isDone column in reservation table: " . mysqli_error($conn);
                    }
                } else {
                    echo "Errorupdating isDone column in occupy table: " . mysqli_error($conn);
                }
            } else {
                echo "Error moving reservation to history: " . mysqli_error($conn);
            }
        } else {
            echo "Error calculating spent time: " . mysqli_error($conn);
        }
    } else {
        echo "Error updating seat status: " . mysqli_error($conn);
    }
} else {
    echo "Invalid reservation ID";
}

?>
