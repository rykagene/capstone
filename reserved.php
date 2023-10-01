<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';

$sql = "SELECT reservation_id, date, start_time, end_time, user_id, seat_id from reservation";
$result = $conn -> query($sql);
?>


<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservation</title>
    <!------------------------ Bootstrap 4 ------------------------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!------------------------ CSS Link ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/css/reserved.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/user-list.css" />

    <!------------------------ ICONS -------------------------->
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
                <li> <a href="reserved.php" class="active"><span class="las la-clock"></span>
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
                Reserved
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

                        <div class="floor" class="form-control">
                            <label for="cars">User Type</label>
                            <select class="form-control">
                                <option style="display:none">Select here</option>
                                <option>Student</option>
                                <option>Faculty</option>
                                <option>Alumni</option>
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
                                    <h1>Reservation</h1>
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
                                                <th> Reservation ID <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Date <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Start Time <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> End Time <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> User ID <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Seat ID <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Action </th>
                                                
                                            </tr>
                                        </thead>
                                        <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td class="studno"><?php echo $row['reservation_id']; ?></td>
                                                    <td><?php echo $row['date']; ?></td>
                                                    <td><?php echo $row['start_time']; ?></td>
                                                    <td><?php echo $row['end_time']; ?></td>
                                                    <td><?php echo $row['user_id']; ?></td>
                                                    <td><?php echo $row['seat_id']; ?></td>
                                                    <td>
                                                        <!-- Edit Button  -->
                                                        <button type="button" class="btn btn-warning edit-btn" data-toggle="modal" data-target="#editModal">         
                                                            <i class="fa-solid fa-pen-to-square fa-sm" style="color: #ffffff;"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewModal">
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


</body>
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
        const search = document.querySelector('.input-group input'),
    table_rows = document.querySelectorAll('tbody tr'),
    table_headings = document.querySelectorAll('thead th');

// 1. Searching for specific data of HTML table
search.addEventListener('input', searchTable);

function searchTable() {
    table_rows.forEach((row, i) => {
        let table_data = row.textContent.toLowerCase(),
            search_data = search.value.toLowerCase();

        row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
        row.style.setProperty('--delay', i / 25 + 's');
    })

    document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
        visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
    });
}

// 2. Sorting | Ordering data of HTML table

table_headings.forEach((head, i) => {
    let sort_asc = true;
    head.onclick = () => {
        table_headings.forEach(head => head.classList.remove('active'));
        head.classList.add('active');

        document.querySelectorAll('td').forEach(td => td.classList.remove('active'));
        table_rows.forEach(row => {
            row.querySelectorAll('td')[i].classList.add('active');
        })

        head.classList.toggle('asc', sort_asc);
        sort_asc = head.classList.contains('asc') ? false : true;

        sortTable(i, sort_asc);
    }
})


function sortTable(column, sort_asc) {
    [...table_rows].sort((a, b) => {
        let first_row = a.querySelectorAll('td')[column].textContent.toLowerCase(),
            second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();

        return sort_asc ? (first_row < second_row ? 1 : -1) : (first_row < second_row ? -1 : 1);
    })
        .map(sorted_row => document.querySelector('tbody').appendChild(sorted_row));
}

// 3. Converting HTML table to PDF

const pdf_btn = document.querySelector('#toPDF');
const customers_table = document.querySelector('#customers_table');

const toPDF = function (customers_table) {
    const html_code = `
    <link rel="stylesheet" href="assets/css/users.css" />
    
    <table id="customers_table">${customers_table.innerHTML}</table>
    `;

    const new_window = window.open();
    new_window.document.write(html_code);

    setTimeout(() => {
        new_window.print();
        new_window.close();
    }, 400);
}

pdf_btn.onclick = () => {
    toPDF(customers_table);
}

// 4. Converting HTML table to JSON

const json_btn = document.querySelector('#toJSON');

const toJSON = function (table) {
    let table_data = [],
        t_head = [],

        t_headings = table.querySelectorAll('th'),
        t_rows = table.querySelectorAll('tbody tr');

    for (let t_heading of t_headings) {
        let actual_head = t_heading.textContent.trim().split(' ');

        t_head.push(actual_head.splice(0, actual_head.length - 1).join(' ').toLowerCase());
    }

    t_rows.forEach(row => {
        const row_object = {},
            t_cells = row.querySelectorAll('td');

        t_cells.forEach((t_cell, cell_index) => {
            const img = t_cell.querySelector('img');
            if (img) {
                row_object['customer image'] = decodeURIComponent(img.src);
            }
            row_object[t_head[cell_index]] = t_cell.textContent.trim();
        })
        table_data.push(row_object);
    })

    return JSON.stringify(table_data, null, 4);
}

json_btn.onclick = () => {
    const json = toJSON(customers_table);
    downloadFile(json, 'json')
}





        const csv_btn = document.querySelector('#toCSV');
const excel_btn = document.querySelector('#toEXCEL');

const toCSV = function(table) {
  const t_heads = table.querySelectorAll('th');
  const headings = [...t_heads].map(head => {
    let actual_head = head.textContent.trim().split(' ');
    return actual_head.splice(0, actual_head.length - 1).join(' ').toLowerCase();
  }).join(',') + ',image name';

  const tbody_rows = table.querySelectorAll('tbody tr');
  const table_data = [...tbody_rows].map(row => {
    const cells = row.querySelectorAll('td');
    const data_without_img = [...cells].map(cell => cell.textContent.replace(/,/g, ".").trim()).join(',');
    return data_without_img;
  }).join('\n');

  return headings + '\n' + table_data;
};

const toExcel = function(table) {
  const excelRows = [];
  
  const t_heads = table.querySelectorAll('th');
  const headings = [...t_heads].map(head => {
    let actual_head = head.textContent.trim().split(' ');
    return actual_head.splice(0, actual_head.length - 1).join(' ').toLowerCase();
  });
  excelRows.push(headings);
  
  const tbody_rows = table.querySelectorAll('tbody tr');
  [...tbody_rows].forEach(row => {
    const cells = row.querySelectorAll('td');
    const rowData = [...cells].map(cell => cell.textContent.trim());
    excelRows.push(rowData);
  });
  
  const workbook = XLSX.utils.book_new();
  const worksheet = XLSX.utils.aoa_to_sheet(excelRows);
  XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet 1');
  
  const excelFile = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });
  return excelFile;
};

csv_btn.onclick = () => {
  const csv = toCSV(customers_table);
  downloadFile(csv, 'csv', 'customer_orders.csv');
};

excel_btn.onclick = () => {
  const excel = toExcel(customers_table);
  downloadFile(excel, 'excel', 'customer_orders.xlsx');
};

const downloadFile = function(data, fileType, fileName = '') {
  const blob = new Blob([data], { type: fileType });
  const url = URL.createObjectURL(blob);
  
  const a = document.createElement('a');
  a.href = url;
  a.download = fileName;
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);
  URL.revokeObjectURL(url);
};

    </script>



<script src="assets/js/reserved.js"></script>



</html>