<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="author" content="Softnio" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers." />
    <link rel="shortcut icon" href="../images/favicon.png" />
    <title>Booking System | Admin | Bookings</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/design.css" />
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
        .booking-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }
        .booking-table th, .booking-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .booking-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .booking-table tbody tr:last-child td {
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
        .action-buttons button.confirm {
            background-color: #28a745;
            color: white;
        }
        .action-buttons button.complete {
            background-color: #007bff;
            color: white;
        }
        .action-buttons button.cancel {
            background-color: #dc3545;
            color: white;
        }
        .action-buttons button.no-show {
            background-color: #6c757d;
            color: white;
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
                                    <h3 class="nk-block-title page-title">Bookings</h3>
                                </div>
                            </div>
                        </div>

                        <div class="nk-block">
                            <table class="booking-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Contact Number</th>
                                        <th>Email</th>
                                        <th>Type of Booking</th>
                                        <th>Date of Booking</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Example booking data (replace with your database fetch)
                                    $bookingsData = [
                                        [
                                            'name' => 'John Doe',
                                            'contact' => '123-456-7890',
                                            'email' => 'john.doe@example.com',
                                            'type' => 'Haircut',
                                            'date' => '2025-05-15',
                                        ],
                                        [
                                            'name' => 'Jane Smith',
                                            'contact' => '987-654-3210',
                                            'email' => 'jane.smith@example.com',
                                            'type' => 'Spa Treatment',
                                            'date' => '2025-05-16',
                                        ],
                                        [
                                            'name' => 'Peter Jones',
                                            'contact' => '555-123-4567',
                                            'email' => 'peter.jones@example.com',
                                            'type' => 'Nail Care',
                                            'date' => '2025-05-18',
                                        ],
                                        // Add more booking data here
                                    ];

                                    foreach ($bookingsData as $booking) {
                                        echo '<tr>';
                                        echo '<td>' . $booking['name'] . '</td>';
                                        echo '<td>' . $booking['contact'] . '</td>';
                                        echo '<td>' . $booking['email'] . '</td>';
                                        echo '<td>' . $booking['type'] . '</td>';
                                        echo '<td>' . $booking['date'] . '</td>';
                                        echo '<td>Pending</td>'; // Static status
                                        echo '<td class="action-buttons">';
                                        echo '<button class="confirm" onclick="updateBookingStatus(\'confirm\', \'' . $booking['name'] . '\')">Confirm</button>';
                                        echo '<button class="complete" onclick="updateBookingStatus(\'complete\', \'' . $booking['name'] . '\')">Complete</button>';
                                        echo '<button class="cancel" onclick="updateBookingStatus(\'cancel\', \'' . $booking['name'] . '\')">Cancel</button>';
                                        echo '<button class="no-show" onclick="updateBookingStatus(\'no-show\', \'' . $booking['name'] . '\')">No Show</button>';
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

            <?php include 'includes/footer.php'; ?>
        </div>
    </div>
</div>

<script src="js/js1.js"></script>
<script src="js/js2.js"></script>
<script src="js/js3.js"></script>
<script>
    function updateBookingStatus(status, bookingName) {
        Swal.fire({
            title: 'Update Booking Status',
            text: `Are you sure you want to mark the booking for "${bookingName}" as ${status}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: `Yes, mark as ${status}!`
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Updated!',
                    `Booking for "${bookingName}" has been marked as ${status}.`,
                    'success'
                );
                // In a real application, you would make an AJAX call here
                // to update the booking status in your database.
                console.log(`Booking for ${bookingName} updated to: ${status}`);
            }
        });
    }
</script>
</body>

</html>