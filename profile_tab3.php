<!-- History Tab -->
<div class="reservations-wrapper">
        <h2>Reservation History</h2>

        <?php
        // Fetch reservation history from the history table
        $history_query = "SELECT * FROM history 
                          INNER JOIN seat ON history.seat_id = seat.seat_id
                          WHERE history.user_id = '{$_SESSION['user_id']}'";
        $history_result = mysqli_query($conn, $history_query);

        if (mysqli_num_rows($history_result) > 0) {
            while ($row = mysqli_fetch_assoc($history_result)) {
                $seat_number = $row['seat_number'];
                $start_time = date('h:i A', strtotime($row['start_time'])); // Convert start time to AM/PM format
                $end_time = date('h:i A', strtotime($row['end_time'])); // Convert end time to AM/PM format
                $date = date('F j, Y', strtotime($row['date'])); // Convert date to desired format

                // Display reservation history information
                echo "<div class='row'><div class='col-6'>";
                echo "<h3>Seat {$seat_number}</h3>";
                echo "<p><ion-icon name='time-outline'></ion-icon> {$start_time} - {$end_time}<br>";
                echo "<ion-icon name='calendar-outline'></ion-icon> {$date}</p></div>";
                echo "</div>";
            }
        } else {
            echo "<p>No reservation history.</p>";
        }
        ?>
    </div>
