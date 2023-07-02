<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Profile</title>
    <!------------------------ Bootstrap 4 ------------------------>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!------------------------ CSS Link ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/css/adminProfile.css" />

    <!------------------------ ICONS ------------------------>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

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
                Admin Profile
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


        <main class="py-4">
            <div id="app">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <h4 class="pb-2">
                                Profile Information
                            </h4>
                            <span class="text-justify mb-3" style="padding-top:-3px;">Update your account's
                                profile information and email address.<br><br> <span id="note">Note</span>: Super Admin
                                Permission is
                                required!</span>
                        </div>
                        <div class="col-lg-8 text-center pt-1">
                            <div class="card py-4 mb-5 mt-md-3 bg-white rounded "
                                style="box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175)">

                                <form>
                                    <div class="form-group px-3">

                                        <label for="displayName" class="col-12 text-left pl-0">Name</label>
                                        <input type="text" class="col-md-8 form-control" placeholder="Jane Doe">

                                        <label for="email" class="pt-3 col-12 text-left pl-0">Email</label>
                                        <input type="email" class="col-md-8 form-control"
                                            placeholder="name@example.com">

                                    </div>
                                    <div class="form-group row mb-0 mr-4">
                                        <div class="col-md-8 offset-md-4 text-right">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal">Save</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="border-bottom border-grey"></div>
                    <div class="row justify-content-center pt-5">
                        <div class="col-lg-4">
                            <h4 class="pb-2">
                                Update Password</h4>
                            <span class="text-justify" style="padding-top:-3px;">A strong password is: At least 12
                                characters long but 14 or more is better. A combination of uppercase letters,
                                lowercase letters, numbers, and symbols.</span>
                        </div>
                        <div class="col-lg-8 text-center pt-2">
                            <div class="card py-4 mb-5 mt-md-3 bg-white rounded"
                                style="box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175)">

                                <form>
                                    <div class="form-group px-3">

                                        <label for="password" class="col-12 text-left pl-0">New Password</label>
                                        <input type="password" class="col-md-8 form-control" placeholder="Password">

                                        <label for="password" class="pt-3 col-12 text-left pl-0">Confirm
                                            Password</label>
                                        <input type="password" class="col-md-8 form-control" placeholder="Password">

                                    </div>
                                    <div class="form-group row mb-0 mr-4">
                                        <div class="col-md-8 offset-md-4 text-right">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="border-bottom border-grey"></div>
                    <div class="row justify-content-center pt-5">
                        <div class="col-lg-4">
                            <h4 class="pb-2">
                                Delete Account</h4>
                            <span class="text-justify" style="padding-top:-3px;">Permanently delete your
                                account.<br><br> <span id="note">Note</span>: Super Admin Permission is
                                required!</span>
                        </div>
                        <div class="col-lg-8 pt-0">
                            <div class="card py-4 mb-5 mt-md-3 bg-white rounded"
                                style="box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175)">
                                <div class="text-left px-3">
                                    Once your account is deleted, all of its resources and data will be
                                    permanently deleted. Before deleting your account, please download any data
                                    or information that you wish to retain.

                                </div>

                                <form>
                                    <div class="form-group row mb-0 mr-4 pt-4 px-3">
                                        <div class="col-md-8 offset-l-4 text-left">
                                            <button type="button" class="btn btn-danger pl-3" data-toggle="modal"
                                                data-target="#exampleModal">Delete
                                                Account</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Popup for superadmin permission -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Super Admin Permission</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body" style="padding:40px 50px;">
                                <form role="form">
                                    <div class="form-group">
                                        <label for="usrname"><span class="glyphicon glyphicon-user"></span>
                                            Super Admin Username</label>
                                        <input type="text" class="form-control" id="usrname">
                                    </div>
                                    <div class="form-group">
                                        <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>
                                            Super Admin Key</label>
                                        <input type="text" class="form-control" id="psw">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Delete Account</button>
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

<script src="assets/js/admin.js"></script>

</html>