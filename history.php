<?php
// database connection
require "connect.php";

session_start();

// need to login first to proceed in homepage
if (!isset($_SESSION["adminID"]) && !isset($_SESSION["adminpass"])) {
    header('Location: login.php');
    exit();
}
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

    <!------------------------ ICONS ------------------------>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/rowgroup/1.1.2/css/rowGroup.dataTables.min.css">
</head>


<body>

    <input type="checkbox" id="nav-toggle">

    <!------------------------ SIDEBAR ------------------------>
    <div class="sidebar">
        <div class="sidebar-brand">
            <img src="assets/img/bulsu logo.png" alt="bulsu logo" class="logo">
            <h2> <span>E-Lib Admin</span></h2>
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

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here..">
            </div>

            <div class="user-wrapper">
                <img src="assets/img/librarian.jpg" width="40px" height="40px" alt="">
                <div>
                    <h4>Derrick Jones</h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>
        <!------------------------ END OF HEADER ------------------------>


        <main>

            <div class="filter">
                <form action="brw_history.php" method="GET">

                    <div class="row">

                        <div class="date">
                            <label>Date seated </label>
                            <input type="date" name="claimed_date" value="" class="form-control"
                                required="required"></input>
                        </div>

                        <div class="college">
                            <label for="cars">College</label>
                            <select class="form-control">
                                <option style="display:none">Select here</option>
                                <option>CAFA</option>
                                <option>CAL</option>
                                <option>CBA</option>
                                <option>CCJE</option>
                                <option>CHTM</option>
                                <option>CICT</option>
                                <option>CIT</option>
                                <option>CLaw</option>
                                <option>CN</option>
                                <option>COE</option>
                                <option>COED</option>
                                <option>CS</option>
                                <option>CSER</option>
                                <option>CSSP</option>
                                <option>GS</option>
                            </select>
                        </div>

                        <div class="floor" class="form-control">
                            <label for="cars">Floor</label>
                            <select class="form-control">
                                <option style="display:none">Select here</option>
                                <option disabled>1</option>
                                <option disabled>2</option>
                                <option disabled>3</option>
                                <option disabled>4</option>
                                <option disabled>5</option>
                                <option>6</option>
                                <option disabled>7</option>
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
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <td>Student No.</td>
                                <td>College</td>
                                <td>Time-in</td>
                                <td>Time-out</td>
                                <td>Date</td>
                                <td>Seat No.</td>
                                <td>Floor No.</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2020104776</td>
                                <td>CICT</td>
                                <td>10:30AM</td>
                                <td>12:00PM</td>
                                <td>4/17/23</td>
                                <td>42</td>
                                <td>6</td>
                            </tr>

                            <tr>
                                <td>2020104786</td>
                                <td>CHTM</td>
                                <td>10:30AM</td>
                                <td>12:00PM</td>
                                <td>4/7/23</td>
                                <td>42</td>
                                <td>6</td>
                            </tr>

                            <tr>
                                <td>2020105771</td>
                                <td>COE</td>
                                <td>10:30AM</td>
                                <td>12:00PM</td>
                                <td>4/1/23</td>
                                <td>42</td>
                                <td>6</td>
                            </tr>

                            <tr>
                                <td>2020104974</td>
                                <td>CICT</td>
                                <td>10:30AM</td>
                                <td>12:00PM</td>
                                <td>4/2/23</td>
                                <td>42</td>
                                <td>6</td>
                            </tr>

                            <tr>
                                <td>2020104226</td>
                                <td>CLaw</td>
                                <td>10:30AM</td>
                                <td>12:00PM</td>
                                <td>4/6/23</td>
                                <td>42</td>
                                <td>6</td>
                            </tr>

                            <tr>
                                <td>2020104717</td>
                                <td>CIT</td>
                                <td>10:30AM</td>
                                <td>12:00PM</td>
                                <td>4/17/23</td>
                                <td>42</td>
                                <td>6</td>
                            </tr>

                            <tr>
                                <td>2020104724</td>
                                <td>CICT</td>
                                <td>10:30AM</td>
                                <td>12:00PM</td>
                                <td>4/28/23</td>
                                <td>42</td>
                                <td>6</td>
                            </tr>

                            <tr>
                                <td>2020104778</td>
                                <td>CLaw</td>
                                <td>10:30AM</td>
                                <td>12:00PM</td>
                                <td>4/22/23</td>
                                <td>42</td>
                                <td>6</td>
                            </tr>

                            <tr>
                                <td>2020104798</td>
                                <td>COE</td>
                                <td>10:30AM</td>
                                <td>12:00PM</td>
                                <td>4/16/23</td>
                                <td>42</td>
                                <td>6</td>
                            </tr>

                            <tr>
                                <td>2020104732</td>
                                <td>CSSP</td>
                                <td>10:30AM</td>
                                <td>12:00PM</td>
                                <td>4/19/23</td>
                                <td>42</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <td>2020103779</td>
                                <td>CHTM</td>
                                <td>10:30AM</td>
                                <td>12:00PM</td>
                                <td>4/14/23</td>
                                <td>42</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <td>2020102770</td>
                                <td>COE</td>
                                <td>10:30AM</td>
                                <td>12:00PM</td>
                                <td>4/29/23</td>
                                <td>42</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <td>2020109774</td>
                                <td>COE</td>
                                <td>10:30AM</td>
                                <td>12:00PM</td>
                                <td>4/15/23</td>
                                <td>42</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <td>2020103736</td>
                                <td>CIT</td>
                                <td>10:30AM</td>
                                <td>12:00PM</td>
                                <td>4/24/23</td>
                                <td>42</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <td>2020101771</td>
                                <td>COE</td>
                                <td>10:30AM</td>
                                <td>12:00PM</td>
                                <td>4/21/23</td>
                                <td>42</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <td>2020105276</td>
                                <td>CIT</td>
                                <td>10:30AM</td>
                                <td>12:00PM</td>
                                <td>4/10/23</td>
                                <td>42</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <td>2020109777</td>
                                <td>COE</td>
                                <td>10:30AM</td>
                                <td>12:00PM</td>
                                <td>4/17/23</td>
                                <td>42</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <td>2020103779</td>
                                <td>CSSP</td>
                                <td>10:30AM</td>
                                <td>12:00PM</td>
                                <td>4/16/23</td>
                                <td>42</td>
                                <td>6</td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Student No.</th>
                                <th>College</th>
                                <th>Time-in</th>
                                <th>Time-out</th>
                                <th>Date</th>
                                <th>Seat No.</th>
                                <th>Floor No.</th>

                            </tr>
                        </tfoot>
                </div>
                </table>



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




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
    integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
    crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            "ordering": true,
            "order": [[2, 'asc']],
            "columnDefs": [{ "targets": 2, "visible": true, },],
            dom: 'Bfrtip',
            buttons: ['pageLength', { extend: 'copy', exportOptions: { grouped_array_index: [2], } }, { extend: 'csv', exportOptions: { grouped_array_index: [2], } }, { extend: 'excel', exportOptions: { grouped_array_index: [2], } }, { extend: 'print', exportOptions: { grouped_array_index: [2], } }, { extend: 'pdf', exportOptions: { grouped_array_index: [2], } },],
            rowGroup: {
                startRender: null,
                endRender: function (rows, college) {
                    var clgAvg = rows
                        .data()
                        .pluck(5)
                        .reduce(function (a, b) {
                            return a + b.replace(/[^\d]/g, '') * 1;
                        }, 0) / rows.count();
                    salaryAvg = $.fn.dataTable.render.number(',', '.', 0, '$').display(clgAvg);
                    var ageAvg = rows
                        .data()
                        .pluck(3)
                        .reduce(function (a, b) {
                            return a + b * 1;
                        }, 0) / rows.count();
                    return $('<tr/>')
                        .append('<td/>')
                        .append('<td/>')
                        .append('<td/>')
                        .append('<td/>')
                        .append('<td/>')
                        .append('<td/>')
                        .append('<td/>')
                },
                dataSrc: 2
            }

        });
    });
</script>


</html>