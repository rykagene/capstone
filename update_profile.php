<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Profile</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!------------------------ CSS Link ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/css/edit_profile.css" />
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	

    <!------------------------ ICONS ------------------------>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
<!------------------------ HEADER --------------------->

<?php include 'assets/php/header.php'; ?>

<!------------------------ END HEADER --------------------->
	
						<?php
            // Retrieve the username from the session
            $username = $_SESSION["username"];
			

            // Retrieve the user details from the database
            $sql = "SELECT * FROM ACCOUNT 
                    INNER JOIN USERS ON ACCOUNT.account_id = USERS.account_id   
                    INNER JOIN COURSE ON USERS.course_code = COURSE.course_code
                    INNER JOIN YEARSEC ON USERS.yearsec_id = YEARSEC.yearsec_id
                    INNER JOIN COLLEGE ON COURSE.college_code = COLLEGE.college_code
                    WHERE ACCOUNT.username = '$username'";

            $result = $conn->query($sql);

            // Check if a matching record is found
            if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $email = $row["email"];
            $year = $row["year_level"];
            

            // Populate the HTML template with the fetched data
            
            } else {
            // Handle the case when no matching record is found
            echo "You are not regular student. Either alumni or faculty";
            }

            // Close the database connection
            // $conn->close();
            ?>
			<section class="py-5 my-5">
		<div class="container">
			<h1 class="mb-5">Update Profile</h1>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<div class="img-circle text-center mb-3">
							<img src="<?php echo $row['picture']; ?>" alt="Profile Image" class="shadow">
							<?php
							echo '
            					<h4>' . $row["username"] . '</h4> 
            					';
            				?> 
						</div>		
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" id="security-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i> 
							My Information
						</a>				
						<a class="nav-link"  data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
							<i class="fa fa-user text-center mr-1"></i> 
							Account
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i> 
							Password
						</a>
						
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<h3 class="mb-4">Edit Information</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>First Name</label>
								  	<input id="firstname-input" type="text" class="form-control" name="first_name" required="required" placeholder="First Name" autocomplete="off" value="<?php echo $row["first_name"]; ?>" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Last Name</label>
								  	<input id="lastname-input" type="text" class="form-control" name="last_name" required="required" placeholder="Last Name" autocomplete="off" value="<?php echo $row["last_name"]; ?>">
								</div>
							</div>
						
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Gender</label>
									<select class="form-control" aria-label="Default select example">					  
										<option selected>Select Gender</option>
  										<option value="1">Male</option>
  										<option value="2">Female</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Phone number</label>
								  	<input type="text" class="form-control" value="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Birthdate</label>
									<input type="date" class="form-control" id="dateReleased" name="dateReleased" value=""  required="required" placeholder="Date Released">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Age</label>
								  	<input type="text" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>College</label>
									  <?php
                        // Function to fetch colleges from the database
                        function getColleges($conn)
                        {
                            $colleges = array();

                            $sql = "SELECT * FROM COLLEGE";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            $colleges[$row['college_code']] = $row['college_name'];
                                }
                            }

                            return $colleges;
                        }
                        ?>
								  
							<select class="form-control" id="floatingSelect" name="college_code" aria-label="Floating label select example" disabled>
								<?php
                                // Fetch colleges from the database using the function
                                $colleges = getColleges($conn);

                                // Loop through the colleges and generate options
                                foreach ($colleges as $college_code => $college_name) {
                                    echo '<option value="' . $college_code . '">' . $college_name . '</option>';
                                }
                                ?>
                            </select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Course</label>
									<!-- Get Course -->
									<?php
                        			// Function to fetch colleges from the database
                        			function getCourses($conn)
                        			{
                            			$courses = array();

                           			 	$sql = "SELECT * FROM COURSE";
                            			$result = $conn->query($sql);

                            			if ($result->num_rows > 0) {
                            			while ($row = $result->fetch_assoc()) {
                            			$courses[$row['course_code']] = $row['course_name'];
                                		}
                            			}

                            			return $courses;
                        			}
                        			?>
									<select class="form-control" id="floatingSelect1" name="course_code" aria-label="Floating label select example" disabled>
                                <?php
                                // Fetch colleges from the database using the function
                                $courses = getCourses($conn);

                                // Loop through the colleges and generate options
                                foreach ($courses as $course_code => $course_name) {
                                    echo '<option value="' . $course_code . '">' . $course_name . '</option>';
                                }
                                ?>
                            </select>							
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-danger" id="updateInfo">Update</button> 
							<button class="btn btn-light">Cancel</button>
						</div>
					</div>
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<h3 class="mb-4">Change Password</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Old password</label>
								  	<input type="password" class="form-control" id="old-password-input" name="old_password">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>New password</label>
								  	<input type="password" class="form-control" id="new-password-input" name="new_password">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Confirm new password</label>
								  	<input type="password" class="form-control" id="confirm-password-input" name="confirm_password">
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-danger" id="updatePass">Update</button>
							<button class="btn btn-light">Cancel</button>
						</div>
					</div>
					<div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
						<h3 class="mb-4">Account Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Username</label>
								  	<input type="text" class="form-control" disabled value="<?php echo $row["username"]; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Email</label>
								  	<input type="text" class="form-control" id="email-input" value="<?php echo $row["email"]; ?>">
								</div>
							</div>						
							<form id="profile-picture-form" enctype="multipart/form-data">
							<div class="col-md-12">
								<div class="form-group">
								  	<label>Profile Picture</label>									
									<div class="input-group mb-3">
  										<label class="input-group-text" for="inputGroupFile01">Upload</label>
  										<input type="file" class="form-control" id="inputGroupFile01" name="profile_picture">
									</div>
								
								</div>
							</div>
							
						</div>
						<div>
							<button class="btn btn-danger" id="updateAcc">Update</button>
							<button class="btn btn-light">Cancel</button>
							</form>	
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
	</section>
	<!------------------------ FOOTER ------------------------>
	<?php include 'assets/php/footer.php';?>
    <!------------------------ FOOTER ------------------------>


	
	

	

</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
	<script>

		
// Function to show Swal alerts based on response status
document.getElementById('updateInfo').addEventListener('click', function() {
  // Disable the button to prevent multiple clicks
  this.disabled = true;

  Swal.fire({
    title: 'Do you want to save the changes?',
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: 'Save',
    denyButtonText: `Don't save`,
  }).then((result) => {
    if (result.isConfirmed) {
      const newFirstName = document.getElementById('firstname-input').value;
      const newLastName = document.getElementById('lastname-input').value;

      if (newFirstName.trim() === '' || newLastName.trim() === '') {
        Swal.fire('Input Error', 'Please fill all the input fields first.', 'error');
        this.disabled = false; // Re-enable the button
        return;
      }

      $.ajax({
        url: 'toUpdateInfo.php',
        method: 'POST',
        dataType: 'json',
        data: {
          first_name: newFirstName,
          last_name: newLastName
        },
        success: function(response) {
          if (response.status === 'success') {
            Swal.fire('Success!', 'Changes saved successfully.', 'success');
          } else {
            Swal.fire('Error!', 'Failed to save changes.', 'error');
          }
        },
        complete: function() {
          // Re-enable the button after the request is complete
          document.getElementById('updateInfo').disabled = false;
        }
      });
    } else if (result.isDenied) {
      Swal.fire('Changes are not saved', '', 'info');
    }
  });
});





//Update Account

document.getElementById('updateAcc').addEventListener('click', function() {
    // Get the value of the email input field
    var email = document.getElementById('email-input').value;

    // Check if the email field is empty
    if (email.trim() === '') {
        Swal.fire('Input Error', 'Please fill the email field first.', 'error');
        return;
    }

    // Create a FormData object to include the email value
    var formData = new FormData(document.getElementById('profile-picture-form'));
    formData.append('email', email);

    // Perform the AJAX request to update the account information
    $.ajax({
        url: 'toUpdateAcc.php', // Change the PHP endpoint to handle updates
        method: 'POST',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.status === 'success') {
                Swal.fire('Saved!', '', 'success');
                // Optionally, update the profile picture in the DOM
            } else {
                Swal.fire('Error!', 'Failed to save changes.', 'error');
            }
        },
        error: function() {
            Swal.fire('Error!', 'Failed to save changes.', 'error');
        }
    });
});



//Update Password
document.getElementById('updatePass').addEventListener('click', function() {
        // ...

        var oldPassword = document.getElementById('old-password-input').value;
        var newPassword = document.getElementById('new-password-input').value;
        var confirmPassword = document.getElementById('confirm-password-input').value;

        if (oldPassword.trim() === '' || newPassword.trim() === '' || confirmPassword.trim() === '') {
            Swal.fire('Input Error', 'Please fill all the password fields.', 'error');
            return;
        }

        if (newPassword !== confirmPassword) {
            Swal.fire('Password Mismatch', 'New passwords do not match.', 'error');
            return;
        }

        $.ajax({
            url: 'toUpdatePass.php', // Change the PHP endpoint to handle password update
            method: 'POST',
            dataType: 'json',
            data: {
                old_password: oldPassword,
                new_password: newPassword,
            },
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire('Success!', 'Password changed successfully.', 'success');
                    // Clear the input fields
        			document.getElementById('old-password-input').value = '';
        			document.getElementById('new-password-input').value = '';
        			document.getElementById('confirm-password-input').value = '';
                } else if (response.status === 'invalid_password') {
                    Swal.fire('Error!', 'Invalid old password.', 'error');
                } else {
                    Swal.fire('Error!', 'Failed to change password.', 'error');
                }
            },
            error: function() {
                Swal.fire('Error!', 'Failed to change password.', 'error');
            }
        });
    });

    // ...




</script>