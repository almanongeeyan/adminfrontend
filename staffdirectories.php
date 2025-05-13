<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="author" content="Softnio" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers." />
    <link rel="shortcut icon" href="../images/favicon.png" />
    <title>Booking System | Admin | Staff Directory</title>

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
        .staff-table-wrapper {
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }
        .staff-table {
            width: 100%;
            border-collapse: collapse;
        }
        .staff-table th, .staff-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .staff-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .staff-table tbody tr:last-child td {
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
        .action-buttons button.edit {
            background-color: #007bff;
            color: white;
        }
        .action-buttons button.delete {
            background-color: #dc3545;
            color: white;
        }
        .add-staff-button {
            margin-bottom: 15px;
        }
        .add-staff-button button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #28a745;
            color: white;
            cursor: pointer;
            font-size: 1rem;
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
                                    <h3 class="nk-block-title page-title">Staff Directory</h3>
                                </div>
                            </div>
                        </div>

                        <div class="nk-block">
                            <div class="add-staff-button">
                                <button onclick="openAddStaffModal()">Add New Staff</button>
                            </div>

                            <div class="staff-table-wrapper">
                                <table class="staff-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact Number</th>
                                            <th>Position</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="staff-table-body">
                                        <?php
                                        // Example staff data (replace with your database fetch)
                                        $staffMembers = [
                                            [
                                                'id' => 1,
                                                'name' => 'Alice Wonderland',
                                                'email' => 'alice@example.com',
                                                'contact' => '09123456789',
                                                'position' => 'Senior Stylist'
                                            ],
                                            [
                                                'id' => 2,
                                                'name' => 'Bob The Builder',
                                                'email' => 'bob@example.com',
                                                'contact' => '09987654321',
                                                'position' => 'Massage Therapist'
                                            ],
                                            [
                                                'id' => 3,
                                                'name' => 'Charlie Chaplin',
                                                'email' => 'charlie@example.com',
                                                'contact' => '09555555555',
                                                'position' => 'Nail Technician'
                                            ],
                                            // Add more staff data here
                                        ];

                                        foreach ($staffMembers as $staff) {
                                            echo '<tr id="staff-' . $staff['id'] . '">';
                                            echo '<td>' . htmlspecialchars($staff['name'], ENT_QUOTES) . '</td>';
                                            echo '<td>' . htmlspecialchars($staff['email'], ENT_QUOTES) . '</td>';
                                            echo '<td>' . htmlspecialchars($staff['contact'], ENT_QUOTES) . '</td>';
                                            echo '<td>' . htmlspecialchars($staff['position'], ENT_QUOTES) . '</td>';
                                            echo '<td class="action-buttons">';
                                            echo '<button class="edit" onclick="openEditStaffModal(' . $staff['id'] . ', \'' . htmlspecialchars($staff['name'], ENT_QUOTES) . '\', \'' . htmlspecialchars($staff['email'], ENT_QUOTES) . '\', \'' . htmlspecialchars($staff['contact'], ENT_QUOTES) . '\', \'' . htmlspecialchars($staff['position'], ENT_QUOTES) . '\')">Edit</button>';
                                            echo '<button class="delete" onclick="deleteStaff(' . $staff['id'] . ', \'' . htmlspecialchars($staff['name'], ENT_QUOTES) . '\')">Delete</button>';
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
    function openAddStaffModal() {
        Swal.fire({
            title: 'Add New Staff',
            html:
                '<input id="swal-input-name" class="swal2-input" placeholder="Name">' +
                '<input id="swal-input-email" class="swal2-input" placeholder="Email">' +
                '<input id="swal-input-contact" class="swal2-input" placeholder="Contact Number">' +
                '<input id="swal-input-position" class="swal2-input" placeholder="Position">',
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'Add Staff',
            preConfirm: () => {
                const name = Swal.getPopup().querySelector('#swal-input-name').value;
                const email = Swal.getPopup().querySelector('#swal-input-email').value;
                const contact = Swal.getPopup().querySelector('#swal-input-contact').value;
                const position = Swal.getPopup().querySelector('#swal-input-position').value;
                if (!name || !email || !contact || !position) {
                    Swal.showValidationMessage(`Please fill in all fields`);
                }
                return { name: name, email: email, contact: contact, position: position };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Staff Added!',
                    `Staff member ${result.value.name} has been added.`,
                    'success'
                );
                // In a real application, you would make an AJAX call here
                // to add the staff member to your database and update the table.
                console.log('New Staff Data:', result.value);
                // For demonstration, let's add a new row to the table (without AJAX)
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${result.value.name}</td>
                    <td>${result.value.email}</td>
                    <td>${result.value.contact}</td>
                    <td>${result.value.position}</td>
                    <td class="action-buttons">
                        <button class="edit" onclick="openEditStaffModal(99, '${result.value.name.replace(/'/g, "&#39;")}', '${result.value.email.replace(/'/g, "&#39;")}', '${result.value.contact.replace(/'/g, "&#39;")}', '${result.value.position.replace(/'/g, "&#39;")}')">Edit</button>
                        <button class="delete" onclick="deleteStaff(99, '${result.value.name.replace(/'/g, "&#39;")}')">Delete</button>
                    </td>
                `;
                document.getElementById('staff-table-body').appendChild(newRow);
            }
        });
    }

    function openEditStaffModal(id, name, email, contact, position) {
        Swal.fire({
            title: 'Edit Staff Member',
            html:
                `<input id="swal-input-id" class="swal2-input" value="${id}" type="hidden">` +
                `<input id="swal-input-name" class="swal2-input" placeholder="Name" value="${name}">` +
                `<input id="swal-input-email" class="swal2-input" placeholder="Email" value="${email}">` +
                `<input id="swal-input-contact" class="swal2-input" placeholder="Contact Number" value="${contact}">` +
                `<input id="swal-input-position" class="swal2-input" placeholder="Position" value="${position}">`,
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'Save Changes',
            preConfirm: () => {
                const staffId = Swal.getPopup().querySelector('#swal-input-id').value;
                const newName = Swal.getPopup().querySelector('#swal-input-name').value;
                const newEmail = Swal.getPopup().querySelector('#swal-input-email').value;
                const newContact = Swal.getPopup().querySelector('#swal-input-contact').value;
                const newPosition = Swal.getPopup().querySelector('#swal-input-position').value;
                if (!newName || !newEmail || !newContact || !newPosition) {
                    Swal.showValidationMessage(`Please fill in all fields`);
                }
                return { id: staffId, name: newName, email: newEmail, contact: newContact, position: newPosition };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Changes Saved!',
                    `Information for ${result.value.name} has been updated.`,
                    'success'
                );
                // In a real application, you would make an AJAX call here
                // to update the staff member in your database and update the table row.
                console.log('Updated Staff Data:', result.value);
                // For demonstration, let's update the table row (without AJAX)
                const rowToUpdate = document.getElementById(`staff-${result.value.id}`);
                if (rowToUpdate) {
                    rowToUpdate.innerHTML = `
                        <td>${result.value.name}</td>
                        <td>${result.value.email}</td>
                        <td>${result.value.contact}</td>
                        <td>${result.value.position}</td>
                        <td class="action-buttons">
                            <button class="edit" onclick="openEditStaffModal(${result.value.id}, '${result.value.name.replace(/'/g, "&#39;")}', '${result.value.email.replace(/'/g, "&#39;")}', '${result.value.contact.replace(/'/g, "&#39;")}', '${result.value.position.replace(/'/g, "&#39;")}')">Edit</button>
                            <button class="delete" onclick="deleteStaff(${result.value.id}, '${result.value.name.replace(/'/g, "&#39;")}')">Delete</button>
                        </td>
                    `;
                }
            }
        });
    }

    function deleteStaff(id, name) {
        Swal.fire({
            title: 'Delete Staff Member',
            text: `Are you sure you want to delete ${name}? This action cannot be undone.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete them!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    `${name} has been removed from the directory.`,
                    'success'
                );
                // In a real application, you would make an AJAX call here
                // to delete the staff member from your database and remove the table row.
                console.log('Staff ID to delete:', id);
                // For demonstration, let's remove the table row (without AJAX)
                const rowToDelete = document.getElementById(`staff-${id}`);
                if (rowToDelete) {
                    rowToDelete.remove();
                }
            }
        });
    }
</script>
</body>

</html>