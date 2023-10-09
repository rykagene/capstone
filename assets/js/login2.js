const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");
const bullets = document.querySelectorAll(".bullets span");
const images = document.querySelectorAll(".image");

inputs.forEach((inp) => {
  inp.addEventListener("focus", () => {
    inp.classList.add("active");
  });
  inp.addEventListener("blur", () => {
    if (inp.value != "") return;
    inp.classList.remove("active");
  });
});

toggle_btn.forEach((btn) => {
  btn.addEventListener("click", () => {
    main.classList.toggle("sign-up-mode");
  });
});

function moveSlider() {
  let index = this.dataset.value;

  let currentImage = document.querySelector(`.img-${index}`);
  images.forEach((img) => img.classList.remove("show"));
  currentImage.classList.add("show");

  const textSlider = document.querySelector(".text-group");
  textSlider.style.transform = `translateY(${-(index - 1) * 2.2}rem)`;

  bullets.forEach((bull) => bull.classList.remove("active"));
  this.classList.add("active");
}

bullets.forEach((bullet) => {
  bullet.addEventListener("click", moveSlider);
});


// Function to validate existence user_id on db
function checkUserIdAvailability() {
	var user_id = $('#user_id').val();
	$.ajax({
		url: 'assets/php/check_user_id.php',
		type: 'POST',
		data: {
			user_id: user_id
		},
		success: function(response) {
			if (response == 'exists') {
				$('#user_id').addClass('is-invalid');
				console.log(user_id + ' exists');
			} else {
				$('#user_id').removeClass('is-invalid');
				console.log(user_id + ' is valid');
			}
		}
	});
}
// Function to validate password fields
function validatePasswords() {
	var password = $('#new_password').val();
	var confirm_password = $('#confirm_password').val();
	if (password !== confirm_password) {
		$('#confirm_password').addClass('is-invalid');
		$('#password_error').show();
		console.log('Passwords do not match');
	} else {
		$('#confirm_password').removeClass('is-invalid');
		$('#password_error').hide();
		console.log('Passwords match');
	}
}

$('#user_id').on('change', checkUserIdAvailability);
$('#new_password, #confirm_password').on('change', validatePasswords);