<?php

require 'connect.php';

$reservation_id = $_POST['reservation_id'];

// Delete the reservation from the database
$sql = "DELETE FROM reservations WHERE reservation_id = '$reservation_id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Reservation has been canceled successfully
    echo "Reservation canceled successfully!";
} else {
    // There was an error canceling the reservation
    echo "Error canceling reservation: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>
