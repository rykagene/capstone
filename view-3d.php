<?php
// connect to database
require 'connect.php';

// retrieve all seats
$sql = "SELECT * FROM seats";
$result = mysqli_query($conn, $sql);

// display seats as buttons
echo '<div class="card view-3d"><div class="card-body"><div><model-viewer src="models/6thFloorV2.glb" ar ar-modes="webxr scene-viewer quick-look" camera-controls poster="poster.webp" shadow-intensity="1" environment-image="models/spruit_sunrise_1k_HDR.hdr">';

while ($row = mysqli_fetch_assoc($result)) {
    $seat_number = $row['seat_number'];
    $is_reserved = $row['is_reserved'];
    $seat_id = $row['seat_id'];
    $surface_data = $row['data_surface'];

    if ($is_reserved == 1) {
        // seat is already reserved, display disabled button
        echo "<button class='btn btn-danger Hotspot' slot='hotspot-$seat_id' data-surface='$surface_data' data-visibility-attribute='visible' disabled><div class='HotspotAnnotation'>S$seat_number</div></button>";
    } else if ($is_reserved == 2) {
        // seat is already reserved, display disabled button
        echo "<button class='btn btn-warning Hotspot' slot='hotspot-$seat_id' data-surface='$surface_data' data-visibility-attribute='visible' disabled><div class='HotspotAnnotation'>S$seat_number</div></button>";
    } else {
        // seat is available, display enabled button
        echo "<button class='Hotspot' slot='hotspot-$seat_id' data-surface='$surface_data' data-visibility-attribute='visible' onclick='confirmSubmit($seat_id)'><div class='HotspotAnnotation'>S$seat_number</div></button>";
    }
}

echo '<div class="progress-bar hide" slot="progress-bar"><div class="update-bar"></div></div><button slot="ar-button" id="ar-button"><div class="progress-bar hide" slot="progress-bar"><div class="update-bar"></div></div><button slot="ar-button" id="ar-button"></div></div></div></div>';

// close database connection
mysqli_close($conn);
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmSubmit(seatId) {
        Swal.fire({
            title: 'Confirm Reservation',
            text: 'Are you sure you want to reserve this seat?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // submit form
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = 'schedules.php';

                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'seat_id';
                input.value = seatId;
                form.appendChild(input);

                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>