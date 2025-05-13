<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="author" content="Softnio" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers." />
    <link rel="shortcut icon" href="../images/favicon.png" />
    <title>Booking System | Admin | Staff Commission Rate</title>
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
        .rate-table-wrapper {
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }
        .rate-table {
            width: 100%;
            border-collapse: collapse;
        }
        .rate-table th, .rate-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .rate-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .rate-table tbody tr:last-child td {
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
        .action-buttons button.enable {
            background-color: #28a745;
            color: white;
        }
        .action-buttons button.disable {
            background-color: #dc3545;
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
                                        <h3 class="nk-block-title page-title">Staff Commission Rates</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="rate-table-wrapper">
                                    <table class="rate-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Position</th>
                                                <th>Commission Rate</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="rate-table-body">
                                            <?php
                                            // Example staff data (replace with your database fetch)
                                            $staffMembers = [
                                                [
                                                    'id' => 1,
                                                    'name' => 'Alice Wonderland',
                                                    'email' => 'alice@example.com',
                                                    'position' => 'Senior Stylist',
                                                    'commission_enabled' => true,
                                                    'commission_rate' => 0.10, // 10%
                                                ],
                                                [
                                                    'id' => 2,
                                                    'name' => 'Bob The Builder',
                                                    'email' => 'bob@example.com',
                                                    'position' => 'Massage Therapist',
                                                    'commission_enabled' => false,
                                                    'commission_rate' => 0.05, // 5%
                                                ],
                                                [
                                                    'id' => 3,
                                                    'name' => 'Charlie Chaplin',
                                                    'email' => 'charlie@example.com',
                                                    'position' => 'Nail Technician',
                                                    'commission_enabled' => true,
                                                    'commission_rate' => 0.08, //8%
                                                ],
                                            ];

                                            foreach ($staffMembers as $staff) {
                                                echo '<tr id="staff-' . $staff['id'] . '">';
                                                echo '<td>' . htmlspecialchars($staff['name'], ENT_QUOTES) . '</td>';
                                                echo '<td>' . htmlspecialchars($staff['email'], ENT_QUOTES) . '</td>';
                                                echo '<td>' . htmlspecialchars($staff['position'], ENT_QUOTES) . '</td>';
                                                echo '<td>' . ($staff['commission_enabled'] ? htmlspecialchars($staff['commission_rate'] * 100, ENT_QUOTES) . '%' : 'Disabled') . '</td>';
                                                echo '<td class="action-buttons">';
                                                if ($staff['commission_enabled']) {
                                                    echo '<button class="disable" onclick="disableCommission(' . $staff['id'] . ', \'' . htmlspecialchars($staff['name'], ENT_QUOTES) . '\')">Disable</button>';
                                                } else {
                                                    echo '<button class="enable" onclick="enableCommission(' . $staff['id'] . ', \'' . htmlspecialchars($staff['name'], ENT_QUOTES) . '\')">Enable</button>';
                                                }
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
        function enableCommission(id, name) {
            Swal.fire({
                title: 'Enable Commission',
                text: `Are you sure you want to enable commission for ${name}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, enable it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Commission Enabled!',
                        `Commission has been enabled for ${name}.`,
                        'success'
                    );
                    // In a real application, you would make an AJAX call here
                    // to update the staff member's commission status in the database.
                    console.log('Enable Commission for Staff ID:', id);
                    // For demonstration, let's update the table row (without AJAX)
                    const rowToUpdate = document.getElementById(`staff-${id}`);
                    if (rowToUpdate) {
                        // Find the 4th cell (index 3) which displays the commission status
                        const commissionCell = rowToUpdate.cells[3];
                        // Assuming the default enabled rate is 10% for this example
                        commissionCell.textContent = '10%';

                        // Find the last cell, the actions cell, and update the button to "Disable"
                        const actionsCell = rowToUpdate.cells[4];
                        actionsCell.innerHTML = `<button class="disable" onclick="disableCommission(${id}, '${name}')">Disable</button>`;
                    }
                }
            });
        }

        function disableCommission(id, name) {
            Swal.fire({
                title: 'Disable Commission',
                text: `Are you sure you want to disable commission for ${name}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, disable it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Commission Disabled!',
                        `Commission has been disabled for ${name}.`,
                        'success'
                    );
                    // In a real application, you would make an AJAX call here
                    // to update the staff member's commission status in the database.
                    console.log('Disable Commission for Staff ID:', id);
                    // For demonstration, let's update the table row (without AJAX)
                    const rowToUpdate = document.getElementById(`staff-${id}`);
                    if (rowToUpdate) {
                        // Find the 4th cell (index 3) which displays the commission status
                        const commissionCell = rowToUpdate.cells[3];
                        commissionCell.textContent = 'Disabled';

                        // Find the last cell, the actions cell, and update the button to "Enable"
                        const actionsCell = rowToUpdate.cells[4];
                        actionsCell.innerHTML = `<button class="enable" onclick="enableCommission(${id}, '${name}')">Enable</button>`;
                    }
                }
            });
        }
    </script>
</body>
</html>