<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Directories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/design.css" />
    <link id="skin-default" rel="stylesheet" href="../assets/css/themee1e3.css?ver=3.2.4" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <style>
        .service-table-wrapper {
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }
        .service-table {
            width: 100%;
            border-collapse: collapse;
        }
        .service-table th, .service-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .service-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .service-table tbody tr:last-child td {
            border-bottom: none;
        }
        .action-buttons {
            display: flex; /* Use flexbox for button layout */
            /* Removed: flex-direction: column;  */
            align-items: flex-start; /* Align items to the start (top in row direction) */
        }

        .action-buttons button {
            padding: 10px 16px;
            margin-right: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            /* Removed: margin-bottom: 5px; */ /* Remove bottom margin */
        }

        .action-buttons button.edit {
            background-color: #007bff;
            color: white;
        }
        .action-buttons button.delete {
            background-color: #dc3545;
            color: white;
        }
        .action-buttons button.edit:hover {
            background-color: #0056b3;
        }
        .action-buttons button.delete:hover {
            background-color: #c82333;
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
        .search-container {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
        .add-service-button {
            margin-left: auto;
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
                                        <h3 class="nk-block-title page-title">Service Directories</h3>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <button class="btn btn-primary add-service-button" onclick="addService()">Add Service</button>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="service-table-wrapper">
                                    <table class="service-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="service-table-body">
                                            <?php
                                            // Example service data (replace with your database fetch)
                                            $services = [
                                                [
                                                    'id' => 1,
                                                    'name' => 'Spa Treatment',
                                                    'description' => 'Relaxing spa treatment',
                                                ],
                                                [
                                                    'id' => 2,
                                                    'name' => 'Haircut',
                                                    'description' => 'Professional haircut service',
                                                ],
                                            ];

                                            foreach ($services as $service) {
                                                echo '<tr id="service-' . $service['id'] . '">';
                                                echo '<td>' . htmlspecialchars($service['name'], ENT_QUOTES) . '</td>';
                                                echo '<td>' . htmlspecialchars($service['description'], ENT_QUOTES) . '</td>';
                                                echo '<td class="action-buttons">';
                                                echo '<button class="edit" onclick="editService(' . $service['id'] . ')"><i class="bi bi-pencil-square"></i></button>';
                                                echo '<button class="delete" onclick="deleteService(' . $service['id'] . ', \'' . htmlspecialchars($service['name'], ENT_QUOTES) . '\')"><i class="bi bi-trash3"></i></button>';
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
        function addService() {
            Swal.fire({
                title: 'Add Service',
                html: `<input id="name" class="swal2-input" placeholder="Service Name">
                       <input id="description" class="swal2-input" placeholder="Description">`,
                preConfirm: () => {
                    return {
                        name: document.getElementById('name').value,
                        description: document.getElementById('description').value,
                    };
                },
                showCancelButton: true,
                confirmButtonText: 'Add',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    const serviceData = result.value;
                    if (serviceData.name && serviceData.description) {
                        // In a real application, you would make an AJAX call here
                        // to add the service to the database.
                        console.log('Service Data:', serviceData);

                        Swal.fire(
                            'Service Added!',
                            'The service has been added successfully.',
                            'success'
                        );

                        // For demonstration, let's add the new service to the table (without AJAX)
                        const newServiceRow = document.createElement('tr');
                        newServiceRow.innerHTML = `
                            <td>${serviceData.name}</td>
                            <td>${serviceData.description}</td>
                            <td class="action-buttons">
                                <button class="edit"><i class="bi bi-pencil-square"></i></button>
                                <button class="delete"><i class="bi bi-trash3"></i></button>
                            </td>
                        `;
                        document.getElementById('service-table-body').appendChild(newServiceRow);
                         // Get the newly added row
                        const newRow = document.getElementById('service-table-body').lastElementChild;

                        // Find the edit and delete buttons within the new row.
                        const editButton = newRow.querySelector('.edit');
                        const deleteButton = newRow.querySelector('.delete');

                        // Attach the event listeners.  Pass the new row's ID (or a generated ID)
                        editButton.addEventListener('click', () => {
                            const rowId =  newRow.rowIndex;
                            editService(rowId);
                        });
                        deleteButton.addEventListener('click', () => {
                            const rowId = newRow.rowIndex;
                            const serviceName = serviceData.name;
                            deleteService(rowId, serviceName);
                        });

                    } else {
                        Swal.fire(
                            'Error',
                            'Please fill in all the fields.',
                            'error'
                        );
                    }
                }
            });
        }

        function editService(id) {
            const rowToEdit = document.getElementById(`service-${id}`);
            if (!rowToEdit) {
                Swal.fire('Error', 'Service to edit not found!', 'error');
                return;
            }

            const name = rowToEdit.cells[0].textContent;  // get the name from the table
            const description = rowToEdit.cells[1].textContent; // and description

            Swal.fire({
                title: 'Edit Service',
                html: `<input id="name" class="swal2-input" placeholder="Service Name" value="${name}">
                       <input id="description" class="swal2-input" placeholder="Description" value="${description}">`,
                preConfirm: () => {
                    return {
                        name: document.getElementById('name').value,
                        description: document.getElementById('description').value,
                    };
                },
                showCancelButton: true,
                confirmButtonText: 'Save',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    const updatedServiceData = result.value;
                    if (updatedServiceData.name && updatedServiceData.description) {
                        // In a real application, you would make an AJAX call here
                        // to update the service data in the database.
                        console.log('Updated Service Data:', updatedServiceData);

                        Swal.fire(
                            'Service Updated!',
                            'The service details have been updated.',
                            'success'
                        );

                        // Update the table row
                        rowToEdit.cells[0].textContent = updatedServiceData.name;
                        rowToEdit.cells[1].textContent = updatedServiceData.description;
                    } else {
                        Swal.fire(
                            'Error',
                            'Please fill in all the fields.',
                            'error'
                        );
                    }
                }
            });
        }

        function deleteService(id, name) {
             Swal.fire({
                title: 'Delete Service',
                text: `Are you sure you want to delete ${name}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // In a real application, you would make an AJAX call here
                    // to delete the service from the database.
                    console.log('Delete Service ID:', id);

                    Swal.fire(
                        'Service Deleted!',
                        `The service ${name} has been deleted.`,
                        'success'
                    );

                    // For demonstration, let's remove the table row (without AJAX)
                    const rowToDelete = document.getElementById(`service-${id}`);
                    if (rowToDelete) {
                         rowToDelete.remove();
                    }
                }
            });
        }

        function searchServices() {
            const searchTerm = document.getElementById('search-input').value.toLowerCase();
            const tableRows = document.getElementById('service-table-body').getElementsByTagName('tr');

            for (let i = 0; i < tableRows.length; i++) {
                const serviceNameCell = tableRows[i].getElementsByTagName('td')[0]; // Index 0 for Name
                if (serviceNameCell) {
                    const serviceName = serviceNameCell.textContent.toLowerCase();
                    if (serviceName.includes(searchTerm)) {
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
