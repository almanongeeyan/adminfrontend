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
        .controls-container {
            display: flex;
            gap: 15px;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            width: 300px;
            box-sizing: border-box;
        }
        .table-container {
            margin-top: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-radius: 12px;
            overflow: hidden;
            background-color: #fff;
        }
        .permission-table {
            width: 100%;
            border-collapse: collapse;
        }
        .permission-table th, .permission-table td {
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .permission-table th {
            background-color: #f7f7f7;
            font-weight: 600;
            color: #333;
        }
        .permission-table tbody tr:last-child td {
            border-bottom: none;
        }
        .action-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
            white-space: nowrap;
            transition: background-color 0.3s ease;
        }
        .action-button:hover {
            background-color: #0056b3;
        }
        .select-role-dropdown {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 0.9rem;
            width: 180px;
            box-sizing: border-box;
        }
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .controls-container {
                flex-direction: column;
                align-items: stretch;
            }
            .search-input {
                width: 100%;
            }
            .permission-table th, .permission-table td {
                padding: 10px;
                font-size: 0.85rem;
            }
            .select-role-dropdown {
                width: 100%;
            }
            .action-button {
                width: 100%;
                margin-top: 5px;
            }
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
                                <div class="controls-container">
                                    <input type="text" id="search-input" class="search-input" placeholder="Search by name, email, or role">
                                </div>
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
                                            <tr><td colspan="7" class="text-center">Loading users...</td></tr>
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
            loadUsers();

            $('#search-input').on('input', function() {
                const searchTerm = $(this).val().toLowerCase();
                filterUsers(searchTerm);
            });
        });

        let allUsers = []; // Store all fetched users

        function loadUsers() {
            // Simulate fetching user data from a database
            const users = [
                { id: 1, firstName: 'John', lastName: 'Doe', email: 'john.doe@example.com', phone: '123-456-7890', address: '123 Main St', role: 'Receptionist' },
                { id: 2, firstName: 'Jane', lastName: 'Smith', email: 'jane.smith@example.com', phone: '987-654-3210', address: '456 Oak Ave', role: 'Staff' },
                { id: 3, firstName: 'Mike', lastName: 'Johnson', email: 'mike.johnson@example.com', phone: '555-123-4567', address: '789 Pine Ln', role: 'Manager' },
                { id: 4, firstName: 'Anna', lastName: 'Williams', email: 'anna.williams@example.com', phone: '111-222-3333', address: '10 Downing St', role: 'Admin' },
                { id: 5, firstName: 'Peter', lastName: 'Jones', email: 'peter.jones@example.com', phone: '444-555-6666', address: '7 Park Ave', role: 'Receptionist' },
            ];
            allUsers = users;
            populateUserTable(users);
        }

        function populateUserTable(users) {
            const userTableBody = document.getElementById('user-table-body');
            userTableBody.innerHTML = '';

            if (users.length === 0) {
                userTableBody.innerHTML = '<tr><td colspan="7" class="text-center">No users found.</td></tr>';
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
                    <td>
                        <select class="select-role-dropdown" data-user-id="${user.id}">
                            <option value="">Select Role</option>
                            <option value="Admin" ${user.role === 'Admin' ? 'selected' : ''}>Admin</option>
                            <option value="Receptionist" ${user.role === 'Receptionist' ? 'selected' : ''}>Receptionist</option>
                            <option value="Staff" ${user.role === 'Staff' ? 'selected' : ''}>Staff</option>
                            <option value="Manager" ${user.role === 'Manager' ? 'selected' : ''}>Manager</option>
                        </select>
                        <button class="action-button" onclick="updateRole(${user.id})">Update</button>
                    </td>
                `;
                userTableBody.appendChild(row);
            });
        }

        function filterUsers(searchTerm) {
            const filteredUsers = allUsers.filter(user => {
                const searchString = `${user.firstName} ${user.lastName} ${user.email} ${user.role}`.toLowerCase();
                return searchString.includes(searchTerm);
            });
            populateUserTable(filteredUsers);
        }

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
                    // Simulate updating the role in the 'allUsers' array
                    const userIndex = allUsers.findIndex(user => user.id === userId);
                    if (userIndex !== -1) {
                        allUsers[userIndex].role = newRole;
                    }

                    Swal.fire(
                        'Updated!',
                        'User role has been updated.',
                        'success'
                    );
                    // Update the table cell directly (optional, as filtering will also reflect changes)
                    const roleCell = roleDropdown.parentElement.parentElement.querySelector('td:nth-child(6)');
                    roleCell.textContent = newRole;
                }
            });
        }
    </script>
</body>
</html>