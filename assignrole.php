<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Custom Permissions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/design.css" />
    <link id="skin-default" rel="stylesheet" href="../assets/css/themee1e3.css?ver=3.2.4" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <style>
        .table-container {
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }
        .permission-table {
            width: 100%;
            border-collapse: collapse;
        }
        .permission-table th, .permission-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .permission-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .permission-table tbody tr:last-child td {
            border-bottom: none;
        }
        .action-button {
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            white-space: nowrap;
        }
        .action-button:hover {
            background-color: #0056b3;
        }
        .select-role-dropdown {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9rem;
            width: 200px;
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
                                        <h3 class="nk-block-title page-title">Assign Custom Permissions</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="table-container">
                                    <table class="permission-table">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Address</th>
                                                <th>Role</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="user-table-body">
                                            <tr><td colspan="7" class="text-center">No users available.</td></tr>
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
            // Simulate fetching user data from a database
            const users = [
                { id: 1, firstName: 'John', lastName: 'Doe', email: 'john.doe@example.com', phone: '123-456-7890', address: '123 Main St', role: 'Receptionist' },
                { id: 2, firstName: 'Jane', lastName: 'Smith', email: 'jane.smith@example.com', phone: '987-654-3210', address: '456 Oak Ave', role: 'Staff' },
                { id: 3, firstName: 'Mike', lastName: 'Johnson', email: 'mike.johnson@example.com', phone: '555-123-4567', address: '789 Pine Ln', role: 'Manager' },
            ];

            const userTableBody = document.getElementById('user-table-body');
            userTableBody.innerHTML = '';

            if (users.length === 0) {
                userTableBody.innerHTML = '<tr><td colspan="7" class="text-center">No users available.</td></tr>';
                return;
            }

            users.forEach(user => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${user.firstName}</td>
                    <td>${user.lastName}</td>
                    <td>${user.email}</td>
                    <td>${user.phone}</td>
                    <td>${user.address}</td>
                    <td>${user.role}</td>
                    <td><select class="select-role-dropdown" data-user-id="${user.id}">
                        <option value="">Select Role</option>
                        <option value="Admin">Admin</option>
                        <option value="Receptionist">Receptionist</option>
                        <option value="Staff">Staff</option>
                        <option value="Manager">Manager</option>
                    </select>
                    <button class="action-button" onclick="updateRole(${user.id})">Update</button></td>
                `;
                userTableBody.appendChild(row);
                //set the default value of the dropdown.
                const roleDropdown = row.querySelector('.select-role-dropdown');
                roleDropdown.value = user.role;
            });
        });

        function updateRole(userId) {
            const roleDropdown = document.querySelector(`.select-role-dropdown[data-user-id="${userId}"]`);
            const newRole = roleDropdown.value;

            if (!newRole) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Please select a role.',
                });
                return;
            }

            // In a real application, you would send an AJAX request to update the user's role in the database
            // For this example, we'll just simulate a successful update

            Swal.fire({
                title: 'Are you sure?',
                text: `Do you want to update the role to ${newRole}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Simulate updating the role
                    // In a real application, you would update the database
                    Swal.fire(
                        'Updated!',
                        'User role has been updated.',
                        'success'
                    );
                    // Update the table cell directly
                    const roleCell = roleDropdown.parentElement.parentElement.querySelector('td:nth-child(6)'); //gets the role cell
                    roleCell.textContent = newRole;

                }
            });
        }
    </script>
</body>
</html>
