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
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-radius: 12px;
            overflow: hidden;
            background-color: #fff;
        }
        .service-table {
            width: 100%;
            border-collapse: collapse;
        }
        .service-table th, .service-table td {
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .service-table th {
            background-color: #f7f7f7;
            font-weight: 600;
            color: #333;
        }
        .service-table tbody tr:last-child td {
            border-bottom: none;
        }
        .action-buttons {
            display: flex;
            align-items: center;
        }
        .action-buttons button {
            padding: 10px 16px;
            margin-right: 8px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        .action-buttons button.edit {
            background-color: #007bff;
            color: white;
            box-shadow: 0 2px 4px rgba(0, 123, 255, 0.2);
        }
        .action-buttons button.delete {
            background-color: #dc3545;
            color: white;
            box-shadow: 0 2px 4px rgba(220, 53, 69, 0.2);
        }
        .action-buttons button.edit:hover {
            background-color: #0056b3;
            box-shadow: 0 3px 6px rgba(0, 86, 179, 0.3);
        }
        .action-buttons button.delete:hover {
            background-color: #c82333;
            box-shadow: 0 3px 6px rgba(200, 35, 51, 0.3);
        }
        .swal2-input, .swal2-select {
            margin: 0.5em 0;
            width: 100%;
            padding: 0.8em;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            box-sizing: border-box;
        }
        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 1rem;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 123, 255, 0.2);
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            box-shadow: 0 3px 6px rgba(0, 86, 179, 0.3);
        }
        .btn-primary:focus, .btn-primary.focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
        }
        .btn-primary.disabled, .btn-primary:disabled {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            opacity: 0.7;
            cursor: not-allowed;
            box-shadow: none;
        }
        .btn-primary:active, .btn-primary.active {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .service-header {
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }
        .search-container {
            display: flex;
            align-items: center;
        }
        .search-input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-right: 10px;
            width: 200px; /* Set a fixed, normal width here */
            font-size: 1rem;
            box-sizing: border-box;
        }
        .add-service-button {
            flex-shrink: 0;
        }
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .service-header {
                flex-direction: column;
                align-items: stretch;
            }
            .search-container {
                width: 100%;
                margin-bottom: 10px;
            }
            .search-input {
                margin-right: 0;
            }
            .add-service-button {
                width: 100%;
            }
            .action-buttons {
                flex-direction: column;
                align-items: stretch;
            }
            .action-buttons button {
                margin-right: 0;
                margin-bottom: 5px;
            }
            .service-table th, .service-table td {
                padding: 12px;
                font-size: 0.9rem;
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
                                        <h3 class="nk-block-title page-title">Service Directories</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="service-header">
                                    <div class="search-container">
                                        <input type="text" id="search-input" class="search-input"
                                               placeholder="Search by Service Name">
                                    </div>
                                    <button class="btn btn-primary add-service-button" onclick="addService()">Add Service</button>
                                </div>
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
                                                [
                                                    'id' => 3,
                                                    'name' => 'Manicure',
                                                    'description' => 'Classic manicure service',
                                                ],
                                                [
                                                    'id' => 4,
                                                    'name' => 'Pedicure',
                                                    'description' => 'Soothing pedicure service',
                                                ],
                                                [
                                                    'id' => 5,
                                                    'name' => 'Facial',
                                                    'description' => 'Deep cleansing facial',
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
        const searchInput = document.getElementById('search-input');
        const serviceTableBody = document.getElementById('service-table-body');
        const tableRows = serviceTableBody.getElementsByTagName('tr');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            for (let i = 0; i < tableRows.length; i++) {
                const serviceNameCell = tableRows[i].getElementsByTagName('td')[0]; // Index 0 for Name
                if (serviceNameCell) {
                    const serviceName = serviceNameCell.textContent.toLowerCase();
                    tableRows[i].style.display = serviceName.includes(searchTerm) ? '' : 'none';
                }
            }
        });

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
                        console.log('Service Data:', serviceData);
                        Swal.fire(
                            'Service Added!',
                            'The service has been added successfully.',
                            'success'
                        );
                        const newServiceRow = document.createElement('tr');
                        newServiceRow.innerHTML = `
                            <td>${serviceData.name}</td>
                            <td>${serviceData.description}</td>
                            <td class="action-buttons">
                                <button class="edit" onclick="editService(${Date.now()})"><i class="bi bi-pencil-square"></i></button>
                                <button class="delete" onclick="deleteService(${Date.now()}, '${serviceData.name}')"><i class="bi bi-trash3"></i></button>
                            </td>
                        `;
                        newServiceRow.id = `service-${Date.now()}`; // Assign a unique ID
                        serviceTableBody.appendChild(newServiceRow);
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

            const name = rowToEdit.cells[0].textContent;
            const description = rowToEdit.cells[1].textContent;

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
                        console.log('Updated Service Data:', updatedServiceData);
                        Swal.fire(
                            'Service Updated!',
                            'The service details have been updated.',
                            'success'
                        );
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
                    console.log('Delete Service ID:', id);
                    Swal.fire(
                        'Service Deleted!',
                        `The service ${name} has been deleted.`,
                        'success'
                    );
                    const rowToDelete = document.getElementById(`service-${id}`);
                    if (rowToDelete) {
                        rowToDelete.remove();
                    }
                }
            });
        }
    </script>
</body>
</html>