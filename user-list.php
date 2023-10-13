<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';

$sql = "SELECT u.user_id, u.rfid_no, u.first_name, u.last_name, u.account_id, u.course_code, u.yearsec_id, u.age, u.contact_number, a.picture, a.email,  a.account_type
        FROM users u
        JOIN account a ON u.account_id = a.account_id";

$result = $conn->query($sql);



?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <!------------------------ Bootstrap 4 ------------------------>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!------------------------ CSS Link ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/css/user-list.css" />
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>



    <!------------------------ ICONS ------------------------>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>


<body>

    <?php if ($_SESSION['isSuperAdmin'] === 'no') {
        echo '<style type="text/css">
       .sidebar-menu #hidden{
           display: none;
       }
      </style>';
    }
    ; ?>

    <input type="checkbox" id="nav-toggle">

    <!------------------------ SIDEBAR ------------------------>
    <div class="sidebar">
        <div class="sidebar-brand">
            <img src="assets/img/bulsu logo.png" alt="bulsu logo" class="logo">
            <h2> <span>SOAR Admin</span></h2>
        </div>

        <div class="sidebar-menu" id="tabButton">
            <ul>
                <li> <a href="admin.php" data-tabName="dashboard" id="tabButtons"><span class="las la-th-large"></span>
                        <span>Dashboard</span></a>
                </li>
                <li> <a href="seats-info.php"><span class="las la-check"></span>
                        <span>Seats Information</span></a>
                </li>
                <li> <a href="reserved.php"><span class="las la-clock"></span>
                        <span>Reserved</span></a>
                </li>
                <li> <a href="user-list.php" class="active"><span class="las la-user-friends"></span>
                        <span>User List</span></a>
                </li>
                <li> <a href="history.php"><span class="las la-history"></span>
                        <span>History</span></a>
                </li>
                <li> <a href="analytics.php"><span class="las la-chart-bar"></span>
                        <span>Analytics</span></a>
                </li>
                <li> <a href="settings.php"><span class="las la-cog"></span>
                        <span>Settings</span></a>
                </li>
                <li id="hidden" class="manage" data-toggle="modal" data-target="#exampleModal"> <a
                        href="manageAdmin.php"><span class="las la-users-cog"></span>
                        <span>Manage Accounts</span></a>
                </li>
                <li class="logout"> <a href="toLogout.php">
                        <span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!------------------------ END OF SIDEBAR ------------------------>

    <div class="main-content">

        <!------------------------ HEADER ------------------------>
        <header>

            <h2>
                <label for="nav-toggle">
                    <span class="la la-bars"></span>
                </label>
                User List
            </h2>

            <div class="dropdown">
                <button class="dropdown-toggle" class="btn btn-secondary dropdown-toggle" type="button"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <div class="user-wrapper">
                        <img src="<?php if ($_SESSION['gender'] == "Male") {
                            echo "https://cdn-icons-png.flaticon.com/512/2552/2552801.png";
                        } elseif ($_SESSION['gender'] == "Female") {
                            echo "https://cdn-icons-png.flaticon.com/512/206/206864.png";
                        } ?>" alt="Admin" class="rounded-circle p-1 bg-secondary" width="45">
                        <div id="user_admin">
                            <h4>
                                <?php echo $_SESSION["username"]; ?>
                            </h4>
                        </div>
                    </div>
                </button>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="adminProfile.php">Profile</a></li>
                    <li><a class="dropdown-item" href="toLogout.php">Logout</a></li>
                </div>
            </div>
        </header>
        <!------------------------ END OF HEADER ------------------------>
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

            
            ?>

        <main>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="table-tab" data-toggle="tab" href="#table-content" role="tab" aria-controls="table-content" aria-selected="true">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="archive-tab" data-toggle="tab" href="#archive-content" role="tab" aria-controls="archive-content" aria-selected="false">Archived</a>
                </li>
            </ul>

            <!-- Tab content -->
            <div class="tab-content" id="myTabsContent">
                <!-- Table Tab Content -->
                <div class="recent-grid">
                <div class="history">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">

                                <section class="table__header">
                                    <h1>Users</h1>
                                    <div class="input-group">
                                        <input type="search" placeholder="Search Data...">
                                        <div class="search-icon">
                                            <img src="assets/img/search.png" alt="Search">
                                        </div>
                                    </div>
                                    
                                    <div class="export__file">
                                        <label for="export-file" class="export__file-btn" title="Export File">
                                            <img src="assets/img/export1.png" alt="Export" class="export_ic">
                                        </label>
                                        <input type="checkbox" id="export-file">
                                        <div class="export__file-options">
                                            <label>Export As &nbsp; &#10140;</label>
                                            <label for="export-file" id="toPDF">PDF <img src="assets/img/pdf.png"
                                                    alt=""></label>
                                            <label for="export-file" id="toJSON">JSON <img src="assets/img/json.png"
                                                    alt=""></label>
                                            <label for="export-file" id="toCSV">CSV <img src="assets/img/csv.png"
                                                    alt=""></label>
                                            <label for="export-file" id="toEXCEL">EXCEL <img src="assets/img/excel.png"
                                                    alt=""></label>
                                        </div>
                                    </div>
                                </section>
                                
                                
                                <section class="table__body">
                                
                                    <table id="customers_table">
                                        <thead>
                                            <tr>
                                                <th> User ID <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> RFID No. <span class="icon-arrow">&UpArrow;</span></th>
                                                <th></th>
                                                <th> First Name <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Last Name <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Course Code <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Year <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> User Type <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Action </th>
                                                
                                            </tr>
                                        </thead>
                                        <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td class="studno"><?php echo $row['user_id']; ?></td>
                                                    <td><?php echo $row['rfid_no']; ?></td>
                                                    <td><img src="<?php echo $row['picture']; ?>" alt=""></td>
                                                    <td><?php echo $row['first_name']; ?></td>
                                                    <td><?php echo $row['last_name']; ?></td>
                                                    <td><?php echo $row['course_code']; ?></td>
                                                    <td><?php echo $row['yearsec_id']; ?></td>  
                                                    <td><p class="user-type <?php echo strtolower($row['account_type']); ?>"><?php echo $row['account_type']; ?></p></td>
  
                                                     
                                                    <td>
                                                    <button type="button" class="btn btn-light btn-rounded btn-icon view_user"
                                                            data-toggle="modal" data-target="#modalView"
                                                            data-userid="<?php echo $row['user_id']; ?>"                                                           
                                                            data-firstname="<?php echo $row['first_name']; ?>"
                                                            data-lastname="<?php echo $row['last_name']; ?>"
                                                            data-picture="<?php echo $row['picture']; ?>"
                                                            data-email="<?php echo $row['email']; ?> "
                                                            data-rfidno="<?php echo $row['rfid_no']; ?> "
                                                            data-course="<?php echo $row['course_code']; ?> "
                                                            data-contactno="<?php echo $row['contact_number']; ?> "
                                                            data-age="<?php echo $row['age']; ?> "
                                                            
                                                            >
    
                                                        <i class="bi bi-eye-fill text-primary" style="font-size: 1.4em;"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-light btn-rounded btn-icon">
                                                      <i class="bi bi-pencil-square text-warning" style="font-size: 1.3em;"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-light btn-rounded btn-icon">
                                                      <i class="bi bi-trash-fill text-danger" style="font-size: 1.3em;"></i>
                                                    </button>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='7'>No users found.</td></tr>";
                                        }
                                        ?>
                                    </table>
                                    
                                </section>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
                







            </div>
                </div>

                <!-- Archive Tab Content -->
                <div class="tab-pane fade" id="archive-content" role="tabpanel" aria-labelledby="archive-tab">
                    <!-- archive content here -->
                </div>
            </div>


























            


        </main>
    </div>
    

<!-- Modal for View -->
<!--- modal view--->
<div class="modal fade" id="modalView" data-backdrop="true" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="text-right"> <i class="bi bi-x-lg close" data-dismiss="modal"></i></div>
               
                <div class="px-4 py-5">
                    <img src="" id="user-picture" alt="user picture" class="rounded-circle p-1 bg-secondary mb-3" width="10" style="width: 100px; height: 100px;">
                    
                    <h5 class="text-uppercase" id="name_view"></h5>

                <h6 class="mt-2 theme-color mb-5" id="userID_view"></h6>

                <span class="font-weight-bold theme-color">User Information</span>
                <div class="mb-3">
                    <hr class="new1">
                </div>

                

                <div class="d-flex justify-content-between">
                    <small id="rfid_view">RFID No.:  </small>
                    <small id="contact_view"></small>
                </div>
                

                <div class="d-flex justify-content-between">
                    <small id="course_view">Course: </small>
                    <small >Year and Section: </small>
                </div>

                <div class="d-flex justify-content-between">
                    <small id="">College</small>
                    <small id="age_view">Age: </small>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <small id="email_view"></small>
                    <small > </small>
                </div>
                
                

                
                
                                   
                </div>

            </div>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

<script src="assets/js/history.js"></script>
<script src="assets/js/users.js"></script>
<script src="assets/js/export.js"></script>
<script>
$(document).ready(function() {
    
    $('.view_user').click(function() {
        // Get the data attributes from the clicked button
        var userId = $(this).data('userid');
        var email = $(this).data('email');
        var firstName = $(this).data('firstname');
        var lastName = $(this).data('lastname');
        var rfidNo = $(this).data('rfidno');
        var contactNo = $(this).data('contactno');
        var courseCode = $(this).data('course');
        var pictureUrl = $(this).data('picture'); 
        var age = $(this).data('age');
        
        

        // Set the retrieved values in the modal
        $('#userID_view').text("User ID: " + userId);
        $('#email_view').text("Email:     " + email);
        $('#name_view').text(firstName + " " +  lastName);
        $('#user-picture').attr('src', pictureUrl);
        $('#rfid_view').text("RFID Number:     " + rfidNo);
        $('#course_view').text("Course:     " + courseCode);
        $('#contact_view').text("Contact No.:     " + rfidNo);
        $('#age_view').text("Age:     " + age);
        $('#seat_view').text(seatId);
        
    });
});

</script>



</html>