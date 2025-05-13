<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Booking History</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/design.css" />
    <link id="skin-default" rel="stylesheet" href="../assets/css/themee1e3.css?ver=3.2.4" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <style>
        .history-table-wrapper {
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }

        .history-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }

        .history-table th,
        .history-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .history-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .history-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .history-table tbody tr:last-child td {
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

        .action-buttons button.view {
            background-color: #007bff;
            color: white;
        }

        .action-buttons button.view:hover {
            background-color: #0056b3;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #0056b3;
            border-color: #004080;
        }

        .btn-primary:focus,
        .btn-primary.focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
        }

        .btn-primary.disabled,
        .btn-primary:disabled {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:active,
        .btn-primary.active {
            color: #fff;
            background-color: #0056b3;
            border-color: #004080;
        }

        .search-container {
            margin-bottom: 20px;
            display: flex;
            justify-content: flex-end;
        }

        .search-input {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
            width: 200px;
            font-size: 0.9rem;
        }

        .search-button {
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .search-button:hover {
            background-color: #0056b3;
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
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><i
                                        class="fa-solid fa-bars"></i></a>
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
                                        <h3 class="nk-block-title page-title">Customer Booking History</h3>
                                    </div>
                                    <div class="nk-block-head-content">
                                        </div>
                                </div>
                                <div class="search-container">
                                    <input type="text" id="search-input" class="search-input"
                                        placeholder="Search by Customer Name...">
                                    <button class="search-button" onclick="searchHistory()">Search</button>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="history-table-wrapper">
                                    <table class="history-table">
                                        <thead>
                                            <tr>
                                                <th>Booking ID</th>
                                                <th>Customer Name</th>
                                                <th>Type of Booking</th>
                                                <th>Booking Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="history-table-body">
                                            <?php
                                            // Example history data (replace with your database fetch)
                                            $history_data = [
                                                [
                                                    'id' => 101,
                                                    'customer_name' => 'Alice Smith',
                                                    'type_of_booking' => 'Online',
                                                    'booking_date' => '2024-07-15',
                                                    'amount' => '$75.00',
                                                    'status' => 'Confirmed',
                                                ],
                                                [
                                                    'id' => 102,
                                                    'customer_name' => 'Bob Johnson',
                                                    'type_of_booking' => 'Walk-in',
                                                    'booking_date' => '2024-07-22',
                                                    'amount' => '$120.00',
                                                    'status' => 'Pending',
                                                ],
                                            ];

                                            foreach ($history_data as $history) {
                                                echo '<tr id="history-' . $history['id'] . '">';
                                                echo '<td>' . htmlspecialchars($history['id'], ENT_QUOTES) . '</td>';
                                                echo '<td>' . htmlspecialchars($history['customer_name'], ENT_QUOTES) . '</td>';
                                                echo '<td>' . htmlspecialchars($history['type_of_booking'], ENT_QUOTES) . '</td>';
                                                echo '<td>' . htmlspecialchars($history['booking_date'], ENT_QUOTES) . '</td>';
                                                echo '<td>' . htmlspecialchars($history['amount'], ENT_QUOTES) . '</td>';
                                                echo '<td>' . htmlspecialchars($history['status'], ENT_QUOTES) . '</td>';
                                                echo '<td class="action-buttons">';
                                                echo '<button class="view" onclick="viewHistory(' . $history['id'] . ')"><i class="fa-solid fa-eye"></i> View</button>';
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
        function viewHistory(id) {
            // In a real application, you would fetch the history data by ID here
            // and pre-populate the SweetAlert form with the existing data.
            // For demonstration, we'll use placeholder data.
            const historyData = {
                id: id,
                customer_name: 'John Doe',
                contact_number: '123-456-7890',
                email: 'john.doe@example.com',
                type_of_booking: 'Online',
                booking_date: '2024-07-28',
                amount: '$100',
                status: 'Confirmed',
            };

            Swal.fire({
                title: 'Booking Details',
                html: `<table style="width:100%; border-collapse:collapse;">
                            <tr><td style="padding:8px; font-weight:bold;">Booking ID:</td><td style="padding:8px;">${historyData.id}</td></tr>
                            <tr><td style="padding:8px; font-weight:bold;">Customer Name:</td><td style="padding:8px;">${historyData.customer_name}</td></tr>
                            <tr><td style="padding:8px; font-weight:bold;">Contact Number:</td><td style="padding:8px;">${historyData.contact_number}</td></tr>
                            <tr><td style="padding:8px; font-weight:bold;">Email:</td><td style="padding:8px;">${historyData.email}</td></tr>
                            <tr><td style="padding:8px; font-weight:bold;">Type of Booking:</td><td style="padding:8px;">${historyData.type_of_booking}</td></tr>
                            <tr><td style="padding:8px; font-weight:bold;">Booking Date:</td><td style="padding:8px;">${historyData.booking_date}</td></tr>
                            <tr><td style="padding:8px; font-weight:bold;">Amount:</td><td style="padding:8px;">${historyData.amount}</td></tr>
                            <tr><td style="padding:8px; font-weight:bold;">Status:</td><td style="padding:8px;">${historyData.status}</td></tr>
                        </table>`,
                showCloseButton: true,
                showConfirmButton: false,
                focusConfirm: false,
            });
        }

        function searchHistory() {
            const searchTerm = document.getElementById('search-input').value.toLowerCase();
            const tableRows = document.getElementById('history-table-body').getElementsByTagName('tr');

            for (let i = 0; i < tableRows.length; i++) {
                const customerNameCell = tableRows[i].getElementsByTagName('td')[1]; // Index 1 for Customer Name
                if (customerNameCell) {
                    const customerName = customerNameCell.textContent.toLowerCase();
                    if (customerName.includes(searchTerm)) {
                        tableRows[i].style.display = ''; // Show the row
                    } else {
                        tableRows[i].style.display = 'none'; // Hide the row
                    }
                }
            }
        }
    </script>
</body>
</html>
