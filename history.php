<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';
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
    <link rel="stylesheet" type="text/css" href="assets/css/history.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />

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
                <li> <a href="user-list.php"><span class="las la-user-friends"></span>
                        <span>User List</span></a>
                </li>
                <li> <a href="history.php" class="active"><span class="las la-history"></span>
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
                History
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

        <main>
            <div class="filter">
                <form action="brw_history.php" method="GET">

                    <div class="row">

                        <div class="college">
                            <label for="cars">College</label>
                            <select class="form-control">
                                <option style="display:none">Select here</option>
                                <option>College of Architecture and Fine Arts (CAFA)</option>
                                <option>College of Arts and Letters (CAL)</option>
                                <option>College of Business Administration (CBA)</option>
                                <option>College of Criminal Justice Education (CCJE)</option>
                                <option>College of Hospitaity and Tourism Management (CHTM)</option>
                                <option>College of Information and Communications Technology (CICT)</option>
                                <option>College of Industrial Technology (CIT)</option>
                                <option>College of Law (CLaw)</option>
                                <option>College of Nursing (CN)</option>
                                <option>College of Engineering (COE)</option>
                                <option>College of Education (COED)</option>
                                <option>College of Science (CS)</option>
                                <option>College of Exercise and Recreation (CSER)</option>
                                <option>College of Social Sciences and Philosophy (CSSP)</option>
                                <option>Graduate School (GS)</option>
                            </select>
                        </div>

                        <div class="course">
                            <label for="cars">Course</label>
                            <select class="form-control">
                                <option style="display:none">Select here</option>
                                <optgroup label="CAFA">
                                    <option>Bachelor of Science in Architecture</option>
                                    <option>Bachelor of Landscape Architecture</option>
                                    <option>Bachelor of Fine Arts Major in Visual Communication</option>
                                <optgroup label="CAL">
                                    <option>Bachelor of Arts in Broadcasting</option>
                                    <option>Bachelor of Arts in Journalism</option>
                                    <option>Bachelor of Performing Arts (Theater Track)</option>
                                    <option>Batsilyer ng Sining sa Malikhaing Pagsulat</option>
                                <optgroup label="CBA">
                                    <option>Bachelor of Science in Business Administration Major in Business Economics
                                    </option>
                                    <option>Bachelor of Science in Business Administration Major in Financial Management
                                    </option>
                                    <option>Bachelor of Science in Business Administration Major in Marketing Management
                                    </option>
                                    <option>Bachelor of Science in Entrepreneurship</option>
                                    <option>Bachelor of Science in Accountancy</option>
                                <optgroup label="CCJE">
                                    <option>Bachelor of Arts in Legal Management</option>
                                    <option>Bachelor of Science in Criminology</option>
                                <optgroup label="CHTM">
                                    <option>Bachelor of Science in Hospitality Management</option>
                                    <option>Bachelor of Science in Tourism Management</option>
                                <optgroup label="CICT">
                                    <option>Bachelor of Science in Information Technology</option>
                                    <option>Bachelor of Library and Information Science</option>
                                    <option>Bachelor of Science in Information System</option>
                                <optgroup label="CIT">
                                    <option>Bachelor of Industrial Technology with specialization in Automotive</option>
                                    <option>Bachelor of Industrial Technology with specialization in Computer</option>
                                    <option>Bachelor of Industrial Technology with specialization in Drafting</option>
                                    <option>Bachelor of Industrial Technology with specialization in Electrical</option>
                                    <option>Bachelor of Industrial Technology with specialization in Electronics &
                                        Communication Technology</option>
                                    <option>Bachelor of Industrial Technology with specialization in Electronics
                                        Technology</option>
                                    <option>Bachelor of Industrial Technology with specialization in Food Processing
                                        Technology</option>
                                    <option>Bachelor of Industrial Technology with specialization in Mechanical</option>
                                    <option>Bachelor of Industrial Technology with specialization in Heating,
                                        Ventilation, Air Conditioning and Refrigeration Technology (HVACR)</option>
                                    <option>Bachelor of Industrial Technology with specialization in Mechatronics
                                        Technology</option>
                                    <option>Bachelor of Industrial Technology with specialization in Welding Technology
                                    </option>
                                <optgroup label="CLaw">
                                    <option>Bachelor of Laws</option>
                                    <option>Juris Doctor</option>
                                <optgroup label="CN">
                                    <option>Bachelor of Science in Nursing</option>
                                <optgroup label="COE">
                                    <option>Bachelor of Science in Civil Engineering</option>
                                    <option>Bachelor of Science in Computer Engineering</option>
                                    <option>Bachelor of Science in Electrical Engineering</option>
                                    <option>Bachelor of Science in Electronics Engineering</option>
                                    <option>Bachelor of Science in Industrial Engineering</option>
                                    <option>Bachelor of Science in Manufacturing Engineering</option>
                                    <option>Bachelor of Science in Mechanical Engineering</option>
                                    <option>Bachelor of Science in Mechatronics Engineering</option>
                                <optgroup label="COED">
                                    <option>Bachelor of Elementary Education</option>
                                    <option>Bachelor of Early Childhood Education</option>
                                    <option>Bachelor of Secondary Education Major in English minor in Mandarin</option>
                                    <option>Bachelor of Secondary Education Major in English minor in Mandarin</option>
                                    <option>Bachelor of Secondary Education Major in Sciences</option>
                                    <option>Bachelor of Secondary Education Major in Mathematics</option>
                                    <option>Bachelor of Secondary Education Major in Social Studies</option>
                                    <option>Bachelor of Secondary Education Major in Values Education</option>
                                    <option>Bachelor of Physical Education</option>
                                    <option>Bachelor of Technology and Livelihood Education Major in Industrial Arts
                                    </option>
                                    <option>Bachelor of Technology and Livelihood Education Major in Information and
                                        Communication Technology</option>
                                    <option>Bachelor of Technology and Livelihood Education Major in Home Economics
                                    </option>
                                <optgroup label="CS">
                                    <option>Bachelor of Science in Biology</option>
                                    <option>Bachelor of Science in Environmental Science</option>
                                    <option>Bachelor of Science in Food Technology</option>
                                    <option>Bachelor of Science in Math with Specialization in Computer Science</option>
                                    <option>Bachelor of Science in Math with Specialization in Applied Statistics
                                    </option>
                                    <option>Bachelor of Science in Math with Specialization in Business Applications
                                    </option>
                                <optgroup label="CSER">
                                    <option>Bachelor of Science in Exercise and Sports Sciences with specialization in
                                        Fitness and Sports Coaching</option>
                                    <option>Bachelor of Science in Exercise and Sports Sciences with specialization in
                                        Fitness and Sports Management</option>
                                    <option>Certificate of Physical Education</option>
                                <optgroup label="CSSP">
                                    <option>Bachelor of Public Administration</option>
                                    <option>Bachelor of Science in Social Work</option>
                                    <option>Bachelor of Science in Psychology</option>
                                <optgroup label="GS">
                                    <option>Doctor of Education</option>
                                    <option>Doctor of Philosophy</option>
                                    <option>Doctor of Public Administration</option>
                                    <option>Master in Physical Education</option>
                                    <option>Master in Business Administration</option>
                                    <option>Master in Public Administration</option>
                                    <option>Master of Arts in Education</option>
                                    <option>Master of Engineering Program</option>
                                    <option>Master of Industrial Technology Management</option>
                                    <option>Master of Science in Civil Engineering</option>
                                    <option>Master of Science in Computer Engineering</option>
                                    <option>Master of Science in Electronics and Communications Engineering</option>
                                    <option>Master of Information Technology</option>
                                    <option>Master of Manufacturing Engineering</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="buttons">Filter</button>
                        </div>

                    </div>
                </form>
            </div>

            <div class="recent-grid">
                <div class="history">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">

                                <section class="table__header">
                                    <h1>History</h1>
                                    <div class="input-group">
                                        <input type="search" placeholder="Search Data...">

                                    </div>
                                    <div class="export__file">
                                        <label for="export-file" class="export__file-btn" title="Export File"></label>
                                        <input type="checkbox" id="export-file">
                                        <div class="export__file-options">
                                            <label>Export As &nbsp; &#10140;</label>
                                            <label for="export-file" id="toPDF">PDF <img src="images/pdf.png"
                                                    alt=""></label>
                                            <label for="export-file" id="toJSON">JSON <img src="images/json.png"
                                                    alt=""></label>
                                            <label for="export-file" id="toCSV">CSV <img src="images/csv.png"
                                                    alt=""></label>
                                            <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png"
                                                    alt=""></label>
                                        </div>
                                    </div>
                                </section>
                                <section class="table__body">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th> Student No. <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> College <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Date <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Time-in <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Time-out <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Table No. <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Seat No. <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="studno">2020104276</td>
                                                <td>COE</td>
                                                <td>4/24/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>4</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="studno">2020104776</td>
                                                <td>CICT</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="studno">2020104786</td>
                                                <td>CHTM</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>4/7/23</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="studno">2020105771</td>
                                                <td>CICT</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="studno">2020104974</td>
                                                <td>CICT</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="studno">2020104226</td>
                                                <td>CLaw</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="studno">2020104717</td>
                                                <td>CIT</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="studno">2020104724</td>
                                                <td>CICT</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="studno">2020104778</td>
                                                <td>CLaw</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="studno">2020104798</td>
                                                <td>COE</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="studno">2020104732</td>
                                                <td>CSSP</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="studno">2020103779</td>
                                                <td>CHTM</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="studno">2020102770</td>
                                                <td>COE</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="studno">2020109774</td>
                                                <td>COE</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="studno">2020103736</td>
                                                <td>CIT</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="studno">2020101771</td>
                                                <td>COE</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="studno">2020105276</td>
                                                <td>CIT</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="studno">2020109777</td>
                                                <td>COE</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="studno">2020103779</td>
                                                <td>CSSP</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </section>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </main>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>

<script src="assets/js/history.js"></script>

</html>