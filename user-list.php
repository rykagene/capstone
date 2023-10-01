<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';

$sql = "SELECT u.user_id, u.rfid_no, u.first_name, u.last_name, u.account_id, u.course_code, u.yearsec_id, u.age, u.contact_num, a.picture, a.email
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
    
</head>


<body>
    <input type="checkbox" id="nav-toggle">

    <!------------------------ SIDEBAR ------------------------>
    <div class="sidebar">
        <div class="sidebar-brand">
            <img src="assets/img/bulsu logo.png" alt="bulsu logo" class="logo">
            <h2> <span>SOAR Admin</span></h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li> <a href="admin.php"><span class="las la-th-large"></span>
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
                        <img src="assets/img/librarian.jpg" width="40px" height="40px" alt="">
                        <div>
                            <h4>
                                <?php echo $_SESSION["first_name"] . ' ' . $_SESSION["last_name"]; ?>
                            </h4>
                        </div>
                    </div>
                </button>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="adminProfile.php">Profile</a></li>
                    <li><a class="dropdown-item" href="toLogout.php">Logout</a></li>
                    </ul>
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
                                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addModal">Add User</button>
                                    <table id="customers_table">
                                        <thead>
                                            <tr>
                                                <th> User ID <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> RFID No. <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> First Name <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Last Name <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Account ID <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Course Code <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Year <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Age <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Contact No. <span class="icon-arrow">&UpArrow;</span></th>
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
                                                    <td><?php echo $row['first_name']; ?></td>
                                                    <td><?php echo $row['last_name']; ?></td>
                                                    <td><?php echo $row['account_id']; ?></td>
                                                    <td><?php echo $row['course_code']; ?></td>
                                                    <td><?php echo $row['yearsec_id']; ?></td> 
                                                    <td><?php echo $row['age']; ?></td>  
                                                    <td><?php echo $row['contact_num']; ?></td>
                                                    <td>
                                                        <!-- Edit Button  -->
                                                        <button type="button" class="btn btn-warning edit-btn" data-toggle="modal" data-target="#editModal" 
                                                            data-user-id="<?php echo $row['user_id']; ?>"
                                                            data-rfid-no="<?php echo $row['rfid_no']; ?>"
                                                            data-first-name="<?php echo $row['first_name']; ?>"
                                                            data-last-name="<?php echo $row['last_name']; ?>"
                                                            data-email="<?php echo $row['email']; ?>"

                                                            >
                                                            
                                                            <i class="fa-solid fa-pen-to-square fa-sm" style="color: #ffffff;"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewModal"                                                       
                                                            data-user-id="<?php echo $row['user_id']; ?>"
                                                            data-rfid-no="<?php echo $row['rfid_no']; ?>"
                                                            data-first-name="<?php echo $row['first_name']; ?>"
                                                            data-last-name="<?php echo $row['last_name']; ?>"
                                                            data-picture="<?php echo $row['picture']; ?>"
                                                            >
                                                            <i class="fa-regular fa-eye fa-sm"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="">
                                                            <i class="fa-solid fa-trash fa-sm" style="color: #ffffff;"></i>
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


        </main>
    </div>

<!-- Modal for Add User -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>User ID</label>
              <input  type="text" class="form-control" name="user_id" required="required" placeholder="User ID" autocomplete="off" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>RFID No.</label>
              <input type="text" class="form-control" name="rfid_no" required="required" placeholder="RFID No." autocomplete="off" value="<?php  ?>">
            </div>
          </div>
        </div>
        
       
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>First Name</label>
              <input  type="text" class="form-control" name="first_name" required="required" placeholder="First Name" autocomplete="off" >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Last Name</label>
              <input  type="text" class="form-control" name="last_name" required="required" placeholder="Last Name" autocomplete="off">
            </div>
          </div>
        </div>

        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Course Code</label>
              <input id="" type="text" class="form-control" name="course_code" required="required" placeholder="" autocomplete="off" value="<?php ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Year</label>
              <input id="" type="text" class="form-control" name="year" required="required" placeholder="" autocomplete="off" value="<?php  ?>">
            </div>
          </div>
        </div>

        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>
</body>

<!-- Modal for Edit/Update -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>User ID</label>
              <input id="userID-input" type="text" class="form-control" name="user_id" required="required" placeholder="User ID" autocomplete="off" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>RFID No.</label>
              <input id="rfidID-input" type="text" class="form-control" name="rfid_no" required="required" placeholder="RFID No." autocomplete="off" value="<?php  ?>">
            </div>
          </div>
        </div>
        
       
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>First Name</label>
              <input id="firstname-input" type="text" class="form-control" name="first_name" required="required" placeholder="First Name" autocomplete="off" >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Last Name</label>
              <input id="lastname-input" type="text" class="form-control" name="last_name" required="required" placeholder="Last Name" autocomplete="off">
            </div>
          </div>
        </div>

        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Course Code</label>
              <input id="" type="text" class="form-control" name="course_code" required="required" placeholder="" autocomplete="off" value="<?php ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Year</label>
              <input id="" type="text" class="form-control" name="year" required="required" placeholder="" autocomplete="off" value="<?php  ?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Email</label>
              <input id="email" type="text" class="form-control" name="e_mail" required="required" placeholder="" autocomplete="off" >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>None</label>
              <input id="" type="text" class="form-control" name="" required="required" placeholder="" autocomplete="off">
            </div>
          </div>
        </div>






      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>

<!-- Modal for View -->
<!-- Modal for View -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Appointment Informations</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa fa-close"></i></span>
        </button>
      </div>
      <div class="modal-body">
        

            <div class="row g-0">

                <div class="col-md-8 border-right">

                    <div class="status p-3">

                        <table class="table table-borderless">
                          
                          <tbody>
                            <tr>
                           
                              <td>
                                  <div class="d-flex flex-column">

                                    <span class="heading d-block">Hospital</span>
                                    <span class="subheadings">Cairo Hospital</span>
                                      

                                  </div>
                              </td>
                              <td>
                                   <div class="d-flex flex-column">

                                    <span class="heading d-block">Time/Date</span>
                                    <span class="subheadings">5:00PM 3-12-2020</span>
                                      

                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex flex-column">

                                    <span class="heading d-block">Status</span>
                                    <span class="subheadings"><i class="dots"></i> Booked</span>
                                      

                                  </div>
                              </td>
                            </tr>
                            <tr>
                             
                              <td>
                                  <div class="d-flex flex-column">

                                    <span class="heading d-block">Speciality</span>
                                    <span class="subheadings">Dental Clinic</span>
                                      

                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex flex-column">

                                    <span class="heading d-block">Referring Doctor</span>
                                    <span class="subheadings">Dr. Harry Pimn</span>
                                      

                                  </div>
                              </td>
                              <td>
                                  

                              </td>
                            </tr>
                            <tr>
                               <td>
                                   <div class="d-flex flex-column">
                                    <span class="heading d-block">Contact</span>
                                    <span class="subheadings">52, Maria Block, Victoria Road, CA USA</span>
                                  </div>
                               </td>  
                          
                              <td colspan="2">

                                <div class="d-flex flex-column">
                                    <span class="heading d-block">Reason of visiting</span>
                                    <span class="subheadings">Lorem ipsum is placeholder text commonly used in the graphic, print.</span>
                                  </div>
                              </td>
                             
                            </tr>

                            <tr>
                               <td>
                                   <div class="d-flex flex-column">
                                    <span class="heading d-block">Direction</span>
                                    <span class="d-block subheadings">Get direction by using</span>
                                    <span class="d-flex flex-row">
                                        
                                        <img src="https://img.icons8.com/color/100/000000/google-maps.png" class="rounded" width="30" />

                                        <img src="https://img.icons8.com/color/100/000000/pittsburgh-map.png" class="rounded" width="30" />

                                    </span>

                                  </div>
                               </td>  
                          
                              <td colspan="2">

                                <div class="d-flex flex-column">
                                    <span class="heading d-block">Hospital Gallary</span>
                                    <span class="d-flex flex-row gallery">
                                        
                                        <img src="https://i.imgur.com/VfRSLTm.jpg" width="50" class="rounded">
                                        <img src="https://i.imgur.com/jb9Cy5h.jpg" width="50" class="rounded">
                                        <img src="https://i.imgur.com/vBUz4HA.jpg" width="50" class="rounded">

                                    </span>
                                  </div>
                              </td>
                             
                            </tr>
                          </tbody>
                        </table>

                       
                        
                    </div>


                    
                    
                </div>
                <div class="col-md-4">

                    <div class="p-2 text-center">

                        <div class="profile">

                            <img src="https://i.imgur.com/VfRSLTm.jpg" width="100" class="rounded-circle img-thumbnail">

                            <span class="d-block mt-3 font-weight-bold">Dr. Samsung Philip.</span>

                        </div>

                        <div class="about-doctor">

                            <table class="table table-borderless">
                          
                              <tbody>
                                 <tr>
                                    <td>
                                      <div class="d-flex flex-column">

                                        <span class="heading d-block">Education</span>
                                        <span class="subheadings">University of Harward</span>
                                          

                                      </div>
                                    </td>

                                    <td>
                                      <div class="d-flex flex-column">

                                        <span class="heading d-block">Language</span>
                                        <span class="subheadings">Spanish, English</span>
                                          

                                      </div>
                                    </td>
                                  </tr>


                                  <tr>
                                    <td>
                                      <div class="d-flex flex-column">

                                        <span class="heading d-block">Organisation</span>
                                        <span class="subheadings">Accupunture</span>
                                          

                                      </div>
                                    </td>

                                    <td>
                                      <div class="d-flex flex-column">

                                        <span class="heading d-block">Specialist</span>
                                        <span class="subheadings">Accupunture</span>
                                          

                                      </div>
                                    </td>
                                  </tr>
                              </tbody>
                           </table>
                            
                        </div>
                        
                    </div>
                    
                </div>
                


            </div>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->

<div class="container d-flex justify-content-center mt-5">

<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
Appointment Information
</button>

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Appointment Informations</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true"><i class="fa fa-close"></i></span>
</button>
</div>
<div class="modal-body">


    <div class="row g-0">

        <div class="col-md-8 border-right">

            <div class="status p-3">

                <table class="table table-borderless">
                  
                  <tbody>
                    <tr>
                   
                      <td>
                          <div class="d-flex flex-column">

                            <span class="heading d-block">Hospital</span>
                            <span class="subheadings">Cairo Hospital</span>
                              

                          </div>
                      </td>
                      <td>
                           <div class="d-flex flex-column">

                            <span class="heading d-block">Time/Date</span>
                            <span class="subheadings">5:00PM 3-12-2020</span>
                              

                          </div>
                      </td>
                      <td>
                          <div class="d-flex flex-column">

                            <span class="heading d-block">Status</span>
                            <span class="subheadings"><i class="dots"></i> Booked</span>
                              

                          </div>
                      </td>
                    </tr>
                    <tr>
                     
                      <td>
                          <div class="d-flex flex-column">

                            <span class="heading d-block">Speciality</span>
                            <span class="subheadings">Dental Clinic</span>
                              

                          </div>
                      </td>
                      <td>
                          <div class="d-flex flex-column">

                            <span class="heading d-block">Referring Doctor</span>
                            <span class="subheadings">Dr. Harry Pimn</span>
                              

                          </div>
                      </td>
                      <td>
                          

                      </td>
                    </tr>
                    <tr>
                       <td>
                           <div class="d-flex flex-column">
                            <span class="heading d-block">Contact</span>
                            <span class="subheadings">52, Maria Block, Victoria Road, CA USA</span>
                          </div>
                       </td>  
                  
                      <td colspan="2">

                        <div class="d-flex flex-column">
                            <span class="heading d-block">Reason of visiting</span>
                            <span class="subheadings">Lorem ipsum is placeholder text commonly used in the graphic, print.</span>
                          </div>
                      </td>
                     
                    </tr>

                    <tr>
                       <td>
                           <div class="d-flex flex-column">
                            <span class="heading d-block">Direction</span>
                            <span class="d-block subheadings">Get direction by using</span>
                            <span class="d-flex flex-row">
                                
                                <img src="https://img.icons8.com/color/100/000000/google-maps.png" class="rounded" width="30" />

                                <img src="https://img.icons8.com/color/100/000000/pittsburgh-map.png" class="rounded" width="30" />

                            </span>

                          </div>
                       </td>  
                  
                      <td colspan="2">

                        <div class="d-flex flex-column">
                            <span class="heading d-block">Hospital Gallary</span>
                            <span class="d-flex flex-row gallery">
                                
                                <img src="https://i.imgur.com/VfRSLTm.jpg" width="50" class="rounded">
                                <img src="https://i.imgur.com/jb9Cy5h.jpg" width="50" class="rounded">
                                <img src="https://i.imgur.com/vBUz4HA.jpg" width="50" class="rounded">

                            </span>
                          </div>
                      </td>
                     
                    </tr>
                  </tbody>
                </table>

               
                
            </div>


            
            
        </div>
        <div class="col-md-4">

            <div class="p-2 text-center">

                <div class="profile">

                    <img src="https://i.imgur.com/VfRSLTm.jpg" width="100" class="rounded-circle img-thumbnail">

                    <span class="d-block mt-3 font-weight-bold">Dr. Samsung Philip.</span>

                </div>

                <div class="about-doctor">

                    <table class="table table-borderless">
                  
                      <tbody>
                         <tr>
                            <td>
                              <div class="d-flex flex-column">

                                <span class="heading d-block">Education</span>
                                <span class="subheadings">University of Harward</span>
                                  

                              </div>
                            </td>

                            <td>
                              <div class="d-flex flex-column">

                                <span class="heading d-block">Language</span>
                                <span class="subheadings">Spanish, English</span>
                                  

                              </div>
                            </td>
                          </tr>


                          <tr>
                            <td>
                              <div class="d-flex flex-column">

                                <span class="heading d-block">Organisation</span>
                                <span class="subheadings">Accupunture</span>
                                  

                              </div>
                            </td>

                            <td>
                              <div class="d-flex flex-column">

                                <span class="heading d-block">Specialist</span>
                                <span class="subheadings">Accupunture</span>
                                  

                              </div>
                            </td>
                          </tr>
                      </tbody>
                   </table>
                    
                </div>
                
            </div>
            
        </div>
        


    </div>



</div>

</div>
</div>
</div>

</body>

<!-- MDB -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>
    <script src="https://unpkg.com/xlsx-populate/browser/xlsx-populate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-table2excel/dist/jquery.table2excel.min.js"></script>
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

<script>
    $(document).ready(function () {
        // Add a click event handler for the edit button
        $(".edit-btn").click(function () {
            // Get the user_id from the data attribute
            var userId = $(this).data("user-id");
            var rfidNo = $(this).data("rfid-no");
            
            var firstName = $(this).data("first-name");
            var lastName = $(this).data("last-name");
            var email = $(this).data("email");

            // Set the user_id value in the modal's input field
            $("#userID-input").val(userId);
            $("#rfidID-input").val(rfidNo);
            $("#firstname-input").val(firstName);
            $("#lastname-input").val(lastName);
            $("#email").val(email);
        });
    });


    $(document).ready(function () {
    // Add a click event handler for the view button
    $(".view-btn").click(function () {
        // Get data attributes from the clicked button
        var userId = $(this).data("user-id");
        var rfidNo = $(this).data("rfid-no");
        var firstName = $(this).data("first-name");
        var lastName = $(this).data("last-name");
        var picture = $(this).data("picture"); // Get the profile picture URL

        $("#profile-picture").attr("src", picture); // Set the profile picture src attribute
        $("#full_name").text(firstName + " " + lastName); // Set the full name in the h4 element
    });
});


</script>

</script>
<script src="assets/js/history.js"></script>
<script src="assets/js/users.js"></script>
<script src="assets/js/export.js"></script>



</html>