<div class="reservations-wrapper">
        <h2>Ongoing Reservations</h2>

        <?php
        // Fetch ongoing reservations from the occupy table
        $ongoing_query = "SELECT * FROM occupy 
                          INNER JOIN reservation ON occupy.reservation_id = reservation.reservation_id
                          INNER JOIN seat ON reservation.seat_id = seat.seat_id
                          WHERE reservation.user_id = '{$_SESSION['user_id']}' AND reservation.date = CURDATE()";
        $ongoing_result = mysqli_query($conn, $ongoing_query);

        if (mysqli_num_rows($ongoing_result) > 0) {
            while ($row = mysqli_fetch_assoc($ongoing_result)) {
                $seat_number = $row['seat_number'];
                $start_time = date('h:i A', strtotime($row['start_time'])); // Convert start time to AM/PM format
                $end_time = date('h:i A', strtotime($row['end_time'])); // Convert end time to AM/PM format

                // Display ongoing reservation information
                echo "<div class='row'><div class='col-6'>";
                echo "<h3>Seat {$seat_number}</h3>";
                echo "<p><ion-icon name='time-outline'></ion-icon> {$start_time} - {$end_time}</p></div>";

                // Add View Details button
                echo "<div class='col'>";
                echo "<a href='#' class='btn btn-outline-danger btn-sm' onclick='markReservationAsDone({$row['reservation_id']}); return false;'>Mark as Done</a>";
                echo "</div>";
                

                echo "</div>";
              
            }
        } else {
            echo "<p>No ongoing reservations.</p>";
        }
        ?>    
</div>

<script>
    function markReservationAsDone(reservationId) {
    Swal.fire({
        title: 'Occupying Done?',
        text: 'Are you sure you make the seat available?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'green',
        cancelButtonColor: '#d3d3d3',
        confirmButtonText: 'Mark seat available'
    }).then((result) => {
        if (result.isConfirmed) {
            // Send AJAX request to update seat status and move reservation to history
            $.ajax({
                url: `toAddHistory.php?reservation_id=${reservationId}`,  // Update the URL to include .php extension
                type: 'GET',
                success: function (response) {
                    if (response === "Success") {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Reservation has been marked as done.',
                            icon: 'success',
                            confirmButtonColor: 'red',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Reload the page or perform other actions
                                location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: 'An error occurred while marking the reservation as done.',
                            icon: 'error',
                            confirmButtonColor: '#d333',
                            confirmButtonText: 'OK'
                        });
                    }
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

    