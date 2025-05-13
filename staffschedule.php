<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="author" content="Softnio" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers." />
    <link rel="shortcut icon" href="../images/favicon.png" />
    <title>Booking System | Admin | Staff Schedule</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/design.css" />
    <link id="skin-default" rel="stylesheet" href="../assets/css/themee1e3.css?ver=3.2.4" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-91615293-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());
        gtag("config", "UA-91615293-4");
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <style>
        .schedule-table-wrapper {
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }
        .schedule-table {
            width: 100%;
            border-collapse: collapse;
        }
        .schedule-table th, .schedule-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .schedule-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .schedule-table tbody tr:last-child td {
            border-bottom: none;
        }
        .action-buttons button {
            padding: 8px 12px;
            margin-right: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
        }
        .action-buttons button.availability {
            background-color: #28a745;
            color: white;
        }
        .action-buttons button.breaks {
            background-color: #17a2b8;
            color: white;
        }
        .action-buttons button.shifts {
            background-color: #007bff;
            color: white;
        }
        .swal2-input {
            margin: 0.5em 0;
        }
    </style>
</head>
<body class="nk-body ui-rounder has-sidebar ui-light">
    <div class="nk-app-root">
        <div class="nk-main">
            <?php include 'includes/sidebar.php'; ?>
            <div class="nk-wrap">
                <div class="nk-header is-light nk-header-fixed is-light">
                    <div class="container-xl wide-xl">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1 me-3">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><i class="fa-solid fa-bars"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-xl">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">Staff Schedule</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="schedule-table-wrapper">
                                    <table class="schedule-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Position</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="schedule-table-body">
                                            <?php
                                            // Example staff data (replace with your database fetch)
                                            $staffMembers = [
                                                [
                                                    'id' => 1,
                                                    'name' => 'Alice Wonderland',
                                                    'email' => 'alice@example.com',
                                                    'position' => 'Senior Stylist'
                                                ],
                                                [
                                                    'id' => 2,
                                                    'name' => 'Bob The Builder',
                                                    'email' => 'bob@example.com',
                                                    'position' => 'Massage Therapist'
                                                ],
                                                [
                                                    'id' => 3,
                                                    'name' => 'Charlie Chaplin',
                                                    'email' => 'charlie@example.com',
                                                    'position' => 'Nail Technician'
                                                ],
                                            ];

                                            foreach ($staffMembers as $staff) {
                                                echo '<tr id="staff-' . $staff['id'] . '">';
                                                echo '<td>' . htmlspecialchars($staff['name'], ENT_QUOTES) . '</td>';
                                                echo '<td>' . htmlspecialchars($staff['email'], ENT_QUOTES) . '</td>';
                                                echo '<td>' . htmlspecialchars($staff['position'], ENT_QUOTES) . '</td>';
                                                echo '<td class="action-buttons">';
                                                echo '<button class="availability" onclick="showAvailabilityModal(' . $staff['id'] . ', \'' . htmlspecialchars($staff['name'], ENT_QUOTES) . '\')">Availability</button>';
                                                echo '<button class="breaks" onclick="showBreaksModal(' . $staff['id'] . ', \'' . htmlspecialchars($staff['name'], ENT_QUOTES) . '\')">Breaks</button>';
                                                echo '<button class="shifts" onclick="showShiftsModal(' . $staff['id'] . ', \'' . htmlspecialchars($staff['name'], ENT_QUOTES) . '\')">Shifts</button>';
                                                echo '</td>';
                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include 'includes/footer.php'; ?>
            </div>
        </div>
    </div>

    <script src="js/js1.js"></script>
    <script src="js/js2.js"></script>
    <script src="js/js3.js"></script>
    <script>
        function showAvailabilityModal(id, name) {
            Swal.fire({
                title: 'Set Availability for ' + name,
                html:
                    '<input id="swal-input-days" class="swal2-input" placeholder="Days (e.g., Mon, Tue, Wed)">' +
                    '<input id="swal-input-times" class="swal2-input" placeholder="Times (e.g., 9am-5pm)">',
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: 'Save Availability',
                preConfirm: () => {
                    const days = Swal.getPopup().querySelector('#swal-input-days').value;
                    const times = Swal.getPopup().querySelector('#swal-input-times').value;
                    if (!days || !times) {
                        Swal.showValidationMessage(`Please fill in all fields`);
                    }
                    return { days: days, times: times };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Availability Set!',
                        `Availability for ${name} has been set to ${result.value.days} at ${result.value.times}.`,
                        'success'
                    );
                    console.log('Availability Data:', { id: id, name: name, days: result.value.days, times: result.value.times });
                    // In a real application, send this data to the server to update the database
                }
            });
        }

        function showBreaksModal(id, name) {
            Swal.fire({
                title: 'Set Breaks for ' + name,
                html:
                    '<input id="swal-input-break-start" class="swal2-input" placeholder="Start Time (e.g., 1pm)">' +
                    '<input id="swal-input-break-end" class="swal2-input" placeholder="End Time (e.g., 2pm)">' +
                    '<input id="swal-input-break-duration" class="swal2-input" placeholder="Duration (e.g., 1 hour)">',
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: 'Save Breaks',
                preConfirm: () => {
                    const start = Swal.getPopup().querySelector('#swal-input-break-start').value;
                    const end = Swal.getPopup().querySelector('#swal-input-break-end').value;
                    const duration = Swal.getPopup().querySelector('#swal-input-break-duration').value;
                    if (!start || !end || !duration) {
                        Swal.showValidationMessage(`Please fill in all fields`);
                    }
                    return { start: start, end: end, duration: duration };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Breaks Set!',
                        `Breaks for ${name} have been set from ${result.value.start} to ${result.value.end} (Duration: ${result.value.duration}).`,
                        'success'
                    );
                    console.log('Breaks Data:', { id: id, name: name, start: result.value.start, end: result.value.end, duration: result.value.duration });
                    // In a real application, send this data to the server to update the database
                }
            });
        }

        function showShiftsModal(id, name) {
            Swal.fire({
                title: 'Set Shifts for ' + name,
                html:
                    '<input id="swal-input-shift-date" class="swal2-input" placeholder="Date (e.g., 2024-07-29)">' +
                    '<input id="swal-input-shift-start" class="swal2-input" placeholder="Start Time (e.g., 9am)">' +
                    '<input id="swal-input-shift-end" class="swal2-input" placeholder="End Time (e.g., 5pm)">',
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: 'Save Shifts',
                preConfirm: () => {
                    const date = Swal.getPopup().querySelector('#swal-input-shift-date').value;
                    const start = Swal.getPopup().querySelector('#swal-input-shift-start').value;
                    const end = Swal.getPopup().querySelector('#swal-input-shift-end').value;
                    if (!date || !start || !end) {
                        Swal.showValidationMessage(`Please fill in all fields`);
                    }
                    return { date: date, start: start, end: end };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Shifts Set!',
                        `Shift for ${name} has been set for ${result.value.date} from ${result.value.start} to ${result.value.end}.`,
                        'success'
                    );
                    console.log('Shifts Data:', { id: id, name: name, date: result.value.date, start: result.value.start, end: result.value.end });
                    // In a real application, send this data to the server to update the database
                }
            });
        }
    </script>
</body>
</html>
