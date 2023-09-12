<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';

$sql = "SELECT seat_id, seat_number, data_surface, status from seat";
$result = $conn -> query($sql);
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
    <link rel="stylesheet" type="text/css" href="assets/css/seats-info.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/user-list.css" />

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
                <li> <a href="seats-info.php" class="active"><span class="las la-check"></span>
                        <span>Seats Information</span></a>
                </li>
                <li> <a href="reserved.php"><span class="las la-clock"></span>
                        <span>Reserved</span></a>
                </li>
                <li> <a href="user-list.php"><span class="las la-user-friends"></span>
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
                Seats Information
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

            


                        

            <!----- TABLE -------->
            <div class="recent-grid">
                <div class="history">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">

                                <section class="table__header">
                                    <h1>Seats</h1>
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
                                                <th> Seat ID <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Seat Number <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Data Surface <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                                                
                                            </tr>
                                        </thead>
                                        <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td class="studno"><?php echo $row['seat_id']; ?></td>
                                                    <td><?php echo $row['seat_number']; ?></td>
                                                    <td><?php echo $row['data_surface']; ?></td>
                                                    <td><?php echo $row['status']; ?></td>
                                                    
                                                                                                      
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


</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>

<script src="assets/js/seats-info.js"></script>


</html>