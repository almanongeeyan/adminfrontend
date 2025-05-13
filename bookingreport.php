<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Reports</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/design.css" />
    <link id="skin-default" rel="stylesheet" href="../assets/css/themee1e3.css?ver=3.2.4" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <style>
        .report-table-wrapper {
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }
        .report-table {
            width: 100%;
            border-collapse: collapse;
        }
        .report-table th, .report-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .report-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .report-table tbody tr:last-child td {
            border-bottom: none;
        }
        .filter-options {
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center; /* Vertically align items */
        }

        .filter-options label {
            margin-right: 5px;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .filter-options select {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9rem;
            width: 200px;
        }

        .filter-button {
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            white-space: nowrap;
        }

        .filter-button:hover {
            background-color: #0056b3;
        }

        .swal2-input, .swal2-select {
            margin: 0.5em 0;
            width: 100%;
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
        .btn-primary:focus, .btn-primary.focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
        }
        .btn-primary.disabled, .btn-primary:disabled {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:active, .btn-primary.active {
            color: #fff;
            background-color: #0056b3;
            border-color: #004080;
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
                                        <h3 class="nk-block-title page-title">Booking Reports</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="filter-options">
                                    <label for="branch-filter">Filter by Branch:</label>
                                    <select id="branch-filter">
                                        <option value="">All Branches</option>
                                    </select>
                                    <label for="service-filter">Filter by Service:</label>
                                    <select id="service-filter">
                                        <option value="">All Services</option>
                                    </select>
                                    <label for="staff-filter">Filter by Staff:</label>
                                    <select id="staff-filter">
                                        <option value="">All Staff</option>
                                    </select>
                                    <button class="filter-button" onclick="generateReport()">Generate Report</button>
                                </div>
                                <div class="report-table-wrapper">
                                    <table class="report-table">
                                        <thead>
                                            <tr>
                                                <th>Booking ID</th>
                                                <th>Branch</th>
                                                <th>Service</th>
                                                <th>Staff</th>
                                                <th>Customer Name</th>
                                                <th>Booking Date</th>
                                                <th>Booking Time</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="report-table-body">
                                            <tr><td colspan="8" class="text-center">No data available. Please select filter and generate report.</td></tr>
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
       $(document).ready(function() {
            // Initialize the branch, service, and staff dropdowns
            populateDropdowns();
        });

        function populateDropdowns() {
            // In a real application, you would fetch this data from your database
            const branches = [
                { id: 1, name: 'Main Branch' },
                { id: 2, name: 'Downtown Branch' },
                { id: 3, name: 'Uptown Branch' },
            ];
            const services = [
                { id: 1, name: 'Spa Treatment' },
                { id: 2, name: 'Haircut' },
                { id: 3, name: 'Manicure' },
                { id: 4, name: 'Pedicure' },
                { id: 5, name: 'Facial' },
            ];
            const staff = [
                { id: 101, name: 'Alice Johnson' },
                { id: 102, name: 'Bob Smith' },
                { id: 201, name: 'Charlie Brown' },
                { id: 202, name: 'Diana Miller' },
            ];

            const branchSelect = document.getElementById('branch-filter');
            const serviceSelect = document.getElementById('service-filter');
            const staffSelect = document.getElementById('staff-filter');

            branches.forEach(branch => {
                const option = document.createElement('option');
                option.value = branch.id;
                option.textContent = branch.name;
                branchSelect.appendChild(option);
            });

            services.forEach(service => {
                const option = document.createElement('option');
                option.value = service.id;
                option.textContent = service.name;
                serviceSelect.appendChild(option);
            });

            staff.forEach(staffMember => {
                const option = document.createElement('option');
                option.value = staffMember.id;
                option.textContent = staffMember.name;
                staffSelect.appendChild(option);
            });
        }

        function generateReport() {
            const branchId = document.getElementById('branch-filter').value;
            const serviceId = document.getElementById('service-filter').value;
            const staffId = document.getElementById('staff-filter').value;

            // In a real application, you would fetch the booking data from your database
            // based on the selected filter criteria.
            const bookings = [
                  {
                    id: 1001,
                    branch_id: 1,
                    branch_name: 'Main Branch',
                    service_id: 1,
                    service_name: 'Spa Treatment',
                    staff_id: 101,
                    staff_name: 'Alice Johnson',
                    customer_name: 'John Doe',
                    booking_date: '2024-07-20',
                    booking_time: '10:00 AM',
                    status: 'Confirmed',
                },
                {
                    id: 1002,
                    branch_id: 1,
                    branch_name: 'Main Branch',
                    service_id: 2,
                    service_name: 'Haircut',
                    staff_id: 102,
                    staff_name: 'Bob Smith',
                    customer_name: 'Jane Smith',
                    booking_date: '2024-07-20',
                    booking_time: '02:00 PM',
                    status: 'Confirmed',
                },
                {
                    id: 1003,
                    branch_id: 2,
                    branch_name: 'Downtown Branch',
                    service_id: 3,
                    service_name: 'Manicure',
                    staff_id: 201,
                    staff_name: 'Charlie Brown',
                    customer_name: 'Mary Jones',
                    booking_date: '2024-07-21',
                    booking_time: '11:00 AM',
                    status: 'Pending',
                },
                {
                    id: 1004,
                    branch_id: 2,
                    branch_name: 'Downtown Branch',
                    service_id: 4,
                    service_name: 'Pedicure',
                    staff_id: 201,
                    staff_name: 'Charlie Brown',
                    customer_name: 'Mike Davis',
                    booking_date: '2024-07-21',
                    booking_time: '03:00 PM',
                    status: 'Confirmed',
                },
                {
                    id: 1005,
                    branch_id: 3,
                    branch_name: 'Uptown Branch',
                    service_id: 1,
                    service_name: 'Spa Treatment',
                    staff_id: 101,
                    staff_name: 'Alice Johnson',
                    customer_name: 'Sarah Williams',
                    booking_date: '2024-07-22',
                    booking_time: '09:00 AM',
                    status: 'Cancelled',
                },
            ];

            let filteredBookings = bookings;

            if (branchId) {
                filteredBookings = filteredBookings.filter(booking => booking.branch_id == branchId);
            }
            if (serviceId) {
                filteredBookings = filteredBookings.filter(booking => booking.service_id == serviceId);
            }
            if (staffId) {
                filteredBookings = filteredBookings.filter(booking => booking.staff_id == staffId);
            }

            const reportTableBody = document.getElementById('report-table-body');
            reportTableBody.innerHTML = ''; // Clear the table body

            if (filteredBookings.length === 0) {
                reportTableBody.innerHTML = '<tr><td colspan="8" class="text-center">No bookings found for the selected criteria.</td></tr>';
                return;
            }

            filteredBookings.forEach(booking => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${booking.id}</td>
                    <td>${booking.branch_name}</td>
                    <td>${booking.service_name}</td>
                    <td>${booking.staff_name}</td>
                    <td>${booking.customer_name}</td>
                    <td>${booking.booking_date}</td>
                    <td>${booking.booking_time}</td>
                    <td>${booking.status}</td>
                `;
                reportTableBody.appendChild(row);
            });
        }
    </script>
</body>
</html>
