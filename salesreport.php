<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Reports</title>
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
            align-items: center;
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
                                        <h3 class="nk-block-title page-title">Sales Reports</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="filter-options">
                                    <label for="report-type">Report Type:</label>
                                    <select id="report-type">
                                        <option value="daily">Daily</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly">Monthly</option>
                                    </select>
                                    <label for="branch-filter">Filter by Branch:</label>
                                    <select id="branch-filter">
                                        <option value="">All Branches</option>
                                    </select>
                                    <button class="filter-button" onclick="generateReport()">Generate Report</button>
                                </div>
                                <div class="report-table-wrapper">
                                    <table class="report-table">
                                        <thead>
                                            <tr>
                                                <th>Report Period</th>
                                                <th>Branch</th>
                                                <th>Total Sales</th>
                                                <th>Number of Bookings</th>
                                            </tr>
                                        </thead>
                                        <tbody id="report-table-body">
                                            <tr><td colspan="4" class="text-center">No data available. Please select filter and generate report.</td></tr>
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
            // Initialize the branch dropdown
            populateBranchDropdown();
        });

        function populateBranchDropdown() {
            // In a real application, you would fetch branch data from your database
            const branches = [
                { id: 1, name: 'Main Branch' },
                { id: 2, name: 'Downtown Branch' },
                { id: 3, name: 'Uptown Branch' },
            ];

            const branchSelect = document.getElementById('branch-filter');

            branches.forEach(branch => {
                const option = document.createElement('option');
                option.value = branch.id;
                option.textContent = branch.name;
                branchSelect.appendChild(option);
            });
        }

        function generateReport() {
            const reportType = document.getElementById('report-type').value;
            const branchId = document.getElementById('branch-filter').value;

            // In a real application, you would fetch the sales data from your database
            // based on the selected report type and branch.
            let salesData = [];

            if (reportType === 'daily') {
                salesData = [
                    { report_period: '2024-07-20', branch_id: 1, branch_name: 'Main Branch', total_sales: 500, num_bookings: 20 },
                    { report_period: '2024-07-21', branch_id: 1, branch_name: 'Main Branch', total_sales: 600, num_bookings: 25 },
                    { report_period: '2024-07-20', branch_id: 2, branch_name: 'Downtown Branch', total_sales: 300, num_bookings: 15 },
                    { report_period: '2024-07-21', branch_id: 2, branch_name: 'Downtown Branch', total_sales: 400, num_bookings: 18 },
                ];
            } else if (reportType === 'weekly') {
                salesData = [
                    { report_period: '2024-07-14 - 2024-07-20', branch_id: 1, branch_name: 'Main Branch', total_sales: 3500, num_bookings: 120 },
                    { report_period: '2024-07-21 - 2024-07-27', branch_id: 1, branch_name: 'Main Branch', total_sales: 4000, num_bookings: 150 },
                    { report_period: '2024-07-14 - 2024-07-20', branch_id: 2, branch_name: 'Downtown Branch', total_sales: 2000, num_bookings: 80 },
                    { report_period: '2024-07-21 - 2024-07-27', branch_id: 2, branch_name: 'Downtown Branch', total_sales: 2500, num_bookings: 100 },
                ];
            } else if (reportType === 'monthly') {
                salesData = [
                    { report_period: '2024-07', branch_id: 1, branch_name: 'Main Branch', total_sales: 15000, num_bookings: 500 },
                    { report_period: '2024-08', branch_id: 1, branch_name: 'Main Branch', total_sales: 18000, num_bookings: 600 },
                    { report_period: '2024-07', branch_id: 2, branch_name: 'Downtown Branch', total_sales: 10000, num_bookings: 350 },
                    { report_period: '2024-08', branch_id: 2, branch_name: 'Downtown Branch', total_sales: 12000, num_bookings: 400 },
                ];
            }

            let filteredSalesData = salesData;

            if (branchId) {
                filteredSalesData = filteredSalesData.filter(sale => sale.branch_id == branchId);
            }

            const reportTableBody = document.getElementById('report-table-body');
            reportTableBody.innerHTML = '';

            if (filteredSalesData.length === 0) {
                reportTableBody.innerHTML = '<tr><td colspan="4" class="text-center">No sales data found for the selected criteria.</td></tr>';
                return;
            }

            filteredSalesData.forEach(sale => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${sale.report_period}</td>
                    <td>${sale.branch_name}</td>
                    <td>$${sale.total_sales}</td>
                    <td>${sale.num_bookings}</td>
                `;
                reportTableBody.appendChild(row);
            });
        }
    </script>
</body>
</html>
