// JavaScript code to toggle the label text and handle form submission
const toggleSwitch = document.querySelector('.toggle input[type="checkbox"]');
const toggleLabel = document.querySelector('.toggle-label');
const maintenanceForm = document.getElementById('maintenance_form');

toggleSwitch.addEventListener('change', function() {
  if (this.checked) {
    toggleLabel.textContent = 'On';
  } else {
    toggleLabel.textContent = 'Off';
  }
});

maintenanceForm.addEventListener('submit', function(e) {
  e.preventDefault();
  
  const status = toggleSwitch.checked ? 'on' : 'off';
  
  // Make an AJAX request to update the server-side maintenance toggle status
  updateMaintenanceToggleStatus(status);
});

function updateMaintenanceToggleStatus(status) {
  const xhr = new XMLHttpRequest();
  const url = 'editSeat.php'; // Replace with the path to your server-side script
  
  xhr.open('POST', url, true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Handle the response from the server if needed
      console.log(xhr.responseText);
    }
  };
  
  const data = 'maintenance_mode=' + encodeURIComponent(status);
  xhr.send(data);
}