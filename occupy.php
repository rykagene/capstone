<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seat Occupy Demo</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- SweetAlert2 CSS and JS files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">

    <!------------------------ CSS Link ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/css/edit_profile.css" />



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

  <!------------------------ HEADER --------------------->

  <?php include 'assets/php/header.php'; ?>

  <!------------------------ END HEADER --------------------->


       
<div class="container">
    <br>
    <h1><b>Seat Occupy Demo (testing page)</b></h1>
    <p> This is a demo of sitting in the real seat on e-lib. </p><br>
    
    <h3><i>Note: You must reserve at least (1) one seat before occupying it.</i></h3><br>
    
    <h3>Direction: <br>1. Choose the seat that you reserved. <br> 2. Check the console for log <br> 3. Refresh the page to see changes <br> 4. View your occupying seat on the <b>Account > Occupying Tab</b> <br> 5. Click the "Mark as Done" if you are done in occupying the seat.</</h3><br>
    
    <div class="row">
        <?php
        // Retrieve initial seat status from the database and generate buttons
        $sql = "SELECT * FROM seat";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $seat_number = $row['seat_number'];
            $seat_id = $row['seat_id'];
            $status = $row['status'];

            if ($status == 1) {
                echo "<button id='$seat_id' class='btn btn-dark ml-2 btn-lg disabled'>$seat_number</button>";
            } else {
                echo "<button id='$seat_id' onclick='occupySeat($seat_id)' class='btn btn-success ml-2 btn-lg'>$seat_number</button>";
            }
        }
        ?>
    </div>

<script>
    function occupySeat(seat_id) {
        // Make an AJAX request to occupyProcess.php
        $.ajax({
            type: "POST",
            url: "occupyProcess.php",
            data: { seat_id: seat_id }, // Send the seat ID as data
            success: function (response) {
                // Handle the response from occupyProcess.php here if needed
                console.log(response);
                
            },
            error: function (xhr, status, error) {
                // Handle errors here if needed
                console.error(xhr.responseText);
                
            }
        });
    }
</script>

  

</div>





</body>
</html>
