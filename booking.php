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
        .booking-management-header {
            display: flex;
            justify-content: flex-start; /* Align items to the left */
            align-items: center;
            margin-bottom: 20px;
        }
        .booking-search {
            display: flex;
            align-items: center;
            margin-right: 15px; /* Add some spacing between search and potential buttons */
        }
        .booking-search input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
            width: 300px; /* Adjust width as needed for "normal" size */
        }
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
                            <div class="booking-management-header">
                                <div class="booking-search">
                                    <input type="text" id="searchInput" placeholder="Search bookings...">
                                </div>
                                <div>
                                    </div>
                            </div>
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
                                <tbody id="bookingsTableBody">
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
                                        [
                                            'name' => 'Anna Williams',
                                            'contact' => '111-222-3333',
                                            'email' => 'anna.williams@example.com',
                                            'type' => 'Haircut',
                                            'date' => '2025-05-20',
                                        ],
                                        [
                                            'name' => 'David Brown',
                                            'contact' => '444-555-6666',
                                            'email' => 'david.brown@example.com',
                                            'type' => 'Massage',
                                            'date' => '2025-05-22',
                                        ],
                                        // Add more booking data here
                                    ];

                                    foreach ($bookingsData as $booking) {
                                        echo '<tr class="booking-row">';
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
                // You might want to reload the table or update the row visually here
            }
        });
    }

    const searchInput = document.getElementById('searchInput');
    const bookingsTableBody = document.getElementById('bookingsTableBody');
    const tableRows = bookingsTableBody.querySelectorAll('tr.booking-row');

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        tableRows.forEach(row => {
            const name = row.cells[0].textContent.toLowerCase();
            const contact = row.cells[1].textContent.toLowerCase();
            const email = row.cells[2].textContent.toLowerCase();
            const type = row.cells[3].textContent.toLowerCase();
            const date = row.cells[4].textContent.toLowerCase();

            if (
                name.includes(searchTerm) ||
                contact.includes(searchTerm) ||
                email.includes(searchTerm) ||
                type.includes(searchTerm) ||
                date.includes(searchTerm)
            ) {
                row.style.display = ''; // Show the row
            } else {
                row.style.display = 'none'; // Hide the row
            }
        });
    });

    // Optional: Add event listener for Enter key in the search input (for those who prefer pressing Enter)
    searchInput.addEventListener('keyup', function(event) {
        if (event.key === 'Enter') {
            // You can optionally trigger some visual feedback or action here if needed
            // since the filtering happens automatically on input.
            console.log('Search triggered by Enter key');
        }
    });
</script>
</body>

</html>