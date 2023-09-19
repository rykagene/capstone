<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';

// Set the server's time zone to Asia/Manila
date_default_timezone_set('Asia/Manila');

if (isset($_POST['seat_id'])) {
    $seat_id = $_POST['seat_id'];
    $user_id = $_SESSION['user_id'];
    $current_date = date('Y-m-d');  // Current date
    $current_time = date('H:i:s');  // Current time

    // Check if the user has a reservation for the specified time and seat
    $query = "SELECT reservation_id, date, start_time, end_time FROM reservation WHERE user_id = $user_id AND isDone = 0 AND seat_id = $seat_id ";

    $reservation_result = mysqli_query($conn, $query);

    if ($reservation_result && mysqli_num_rows($reservation_result) > 0) {
        $reservation = mysqli_fetch_assoc($reservation_result);

        $reservation_id = $reservation['reservation_id'];
        $date = $reservation['date'];
        $start_time = $reservation['start_time'];
        $end_time = $reservation['end_time'];

        $start_timestamp = strtotime($date . ' ' . $start_time);
        $end_timestamp = strtotime($date . ' ' . $end_time);
        $current_timestamp = strtotime($current_date . ' ' . $current_time);

        if ($current_timestamp >= $start_timestamp && $current_timestamp <= $end_timestamp) {
           


            // Insert data into the occupy table
            $occupy_query = "INSERT INTO occupy (reservation_id, date, start_time, end_time, user_id, seat_id) VALUES ($reservation_id, '$date', '$start_time', '$end_time', $user_id, $seat_id)";
            $occupy_result = mysqli_query($conn, $occupy_query);

            if ($occupy_result) {
                // Update the status of the seat in the seat table
                $update_seat_query = "UPDATE seat SET status = 1 WHERE seat_id = $seat_id";
                $update_seat_query_result = mysqli_query($conn, $update_seat_query);

                if ($update_seat_query_result) {
                    $response['success'] = true;
                    echo "seat status set to 1 success";
                    echo "Seat $seat_id occupied successfully. You are $user_id. Occupied on $current_date from $current_time until $end_time You only have $remaining_time minute/s";
                } else {
                    $response['success'] = false;
                    echo "seat status still 0 ";
                    $response['error'] = "Error updating seat status: " . mysqli_error($conn);
                }
            } else {
                echo "Error inserting data into the occupy table";
                $response['success'] = false;
                $response['error'] = "Error inserting data into the occupy table: " . mysqli_error($conn);
            }
        }
        else {
            // Calculate the waiting time in minutes
            // $start_timestamp = strtotime($start_time);
            // $end_timestamp = strtotime($end_time);
            // $current_timestamp = strtotime($current_time);
            // $waiting_time = round(($start_timestamp - $current_timestamp) / 60); // in minutes

            // echo "Hi, $user_id. Occupancy not successful. Please wait for $waiting_time minute/s until your reservation starts.";
            echo "Hi, $user_id. Occupancy not successful. Please check your reservation time on this seat";
        }
    } else {
        echo "Hi, $user_id. Occupancy not successful because you don't have any reservation for this seat.";
    }
} else {
    echo "Invalid request.";
}
?>
