
// Initialize the animation on scroll
AOS.init();


// get the form
var myForm = document.getElementById("reserveForm");
myForm.addEventListener("submit", function(event) {
  event.preventDefault();
  submitForm();
  });



// calculate the end time
function getEndTime() {
  const startTime = new Date(`2000-01-01T${document.getElementById("start_time").value}`);
  let duration = 0;
  const options = document.getElementsByName("options");
  for (let i = 0; i < options.length; i++) {
    if (options[i].checked) {
      duration = parseInt(options[i].value);
      break;
    }
  }
  const endTime = new Date(startTime.getTime() + duration * 60 * 60 * 1000);
  const endHour = endTime.getHours();
  const endMinute = endTime.getMinutes();
  const formattedEndHour = endHour < 10 ? `0${endHour}` : endHour;
  const formattedEndMinute = endMinute < 10 ? `0${endMinute}` : endMinute;
  document.getElementById("end_time").value = `${formattedEndHour}:${formattedEndMinute}`;
}

// Set the value of start_time to current time.
var currentTime = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: false });
document.getElementById("start_time").value = currentTime;
document.getElementById("end_time").min = currentTime;

// Function to submit the form asynchronously
function submitForm() {
	var formData = new FormData(myForm);
	var request = new XMLHttpRequest();
	var switchCheckbox = document.getElementById("flexSwitchCheckDefault");
	var url = switchCheckbox.checked ? "view-3d.php" : "view-2d.php"; // Check the switch state

	request.open("GET", url + "?" + new URLSearchParams(formData).toString());
	request.addEventListener("load", function(event) {
		if (request.status === 200) {
			document.getElementById("selectSeatForm").innerHTML = request.responseText;
			// Additional actions specific to the view can be performed here
		} else {
			console.log("An error occurred: " + request.status);
		}
	});
	request.send();
}


// Function to handle changes and trigger form submission
function handleFormChange() {
	if ($("#date").val() && $("#start_time").val() && $('input[name="options"]:checked').val() && $('input[name="viewOption"]').val()) {
		getEndTime();
		submitForm();
	}
}



// Event listener for date change
document.getElementById("date").addEventListener("change", handleFormChange);

// Event listener for start time change
document.getElementById("start_time").addEventListener("change", handleFormChange);

// Event listener for duration change
var options = document.getElementsByName("options");
for (var i = 0; i < options.length; i++) {
	options[i].addEventListener("change", handleFormChange);
}


//function when clicking the seat button
function reserveSeat(seat_id) {

	// Display SweetAlert to confirm seat reservation
	Swal.fire({
		title: 'Confirm Reservation',
		html: 'Seat No.: ' + seat_id + '<br>Date: ' + $('#date').val() + '<br>Time: ' + $('#start_time').val() + ' - ' + $('#end_time').val() + '',
		icon: 'question',
		showCancelButton: true,
		confirmButtonText: 'Confirm',
		confirmButtonColor: '#a81c1c',
		cancelButtonText: 'Cancel',
	}).then((result) => {
		if (result.isConfirmed) {


			// Insert reservation into the database
			var reservationData = {
				seat_id: seat_id,
				student_id: '<?php echo $_SESSION["student_id"]; ?>', // Retrieve the student ID from the session
				date: $('#date').val(),
				start_time: $('#start_time').val(),
				end_time: $('#end_time').val(),
			};

			console.log(reservationData);

			$.ajax({
				url: 'toReserve.php',
				method: 'GET',
				data: reservationData,
				success: function(response) {
					if (response === 'success') {
						console.log('Reservation inserted into the database');
						// Show success alert
						Swal.fire({
							title: 'Reserved Successfully!!',
							text: 'Seat ' + seat_id + ' has been reserved.',
							icon: 'success',
							confirmButtonText: 'View Receipt',
							confirmButtonColor: '#a81c1c',
						});
					} else if (response === 'error') {
						console.log('The selected seat is already reserved for the selected date and time range');
						// Show error alert
						Swal.fire({
							title: 'Error',
							text: 'The selected seat is already reserved for the selected date and time range. Please choose another seat or time.',
							icon: 'error',
							confirmButtonColor: '#a81c1c',
						}).then(() => {
							getEndTime();
							submitForm();
						});
					} else {
						console.log('An error occurred during the reservation process');
						// Show error alert
						Swal.fire({
							title: 'Error',
							text: 'An error occurred during the reservation process.',
							icon: 'error',
							confirmButtonColor: '#a81c1c',
						}).then(() => {
							getEndTime();
							submitForm();
						});
					}
				},

			});
		}

	});
}


