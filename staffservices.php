<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Service Assignment</title>
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
        .staff-service-table {
            width: 100%;
            border-collapse: collapse;
        }
        .staff-service-table th, .staff-service-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .staff-service-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .staff-service-table tbody tr:last-child td {
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
        .select-service-dropdown {
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
                                        <h3 class="nk-block-title page-title">Staff Service Assignment</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="table-container">
                                    <table class="staff-service-table">
                                        <thead>
                                            <tr>
                                                <th>Staff Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Assigned Services</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="staff-table-body">
                                            <tr><td colspan="5" class="text-center">No staff available.</td></tr>
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
            // Simulate fetching staff data from a database
            const staffMembers = [
                { id: 1, name: 'Alice Johnson', email: 'alice.johnson@example.com', phone: '123-456-7890', services: ['Haircut'] },
                { id: 2, name: 'Bob Smith', email: 'bob.smith@example.com', phone: '987-654-3210', services: ['Manicure', 'Pedicure'] },
                { id: 3, name: 'Charlie Brown', email: 'charlie.brown@example.com', phone: '555-123-4567', services: [] },
            ];

            // Simulate fetching all available services
            const allServices = ['Haircut', 'Manicure', 'Pedicure', 'Facial', 'Spa Treatment', 'Styling'];

            const staffTableBody = document.getElementById('staff-table-body');
            staffTableBody.innerHTML = '';

            if (staffMembers.length === 0) {
                staffTableBody.innerHTML = '<tr><td colspan="5" class="text-center">No staff available.</td></tr>';
                return;
            }

            staffMembers.forEach(staff => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${staff.name}</td>
                    <td>${staff.email}</td>
                    <td>${staff.phone}</td>
                    <td>${staff.services.join(', ') || 'No services assigned'}</td>
                    <td><select class="select-service-dropdown" data-staff-id="${staff.id}">
                        <option value="">Select Service</option>
                        ${allServices.map(service => `<option value="${service}">${service}</option>`).join('')}
                    </select>
                    <button class="action-button" onclick="updateServices(${staff.id})">Update</button></td>
                `;
                staffTableBody.appendChild(row);

                //set the default value of the dropdown.
                const serviceDropdown = row.querySelector('.select-service-dropdown');
                serviceDropdown.value = ''; // Initialize dropdown to be empty
            });
        });

        function updateServices(staffId) {
            const serviceDropdown = document.querySelector(`.select-service-dropdown[data-staff-id="${staffId}"]`);
            const selectedService = serviceDropdown.value;

            if (!selectedService) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Please select a service.',
                });
                return;
            }

            // In a real application, you would send an AJAX request to update the staff's services in the database
            // For this example, we'll just simulate a successful update

            Swal.fire({
                title: 'Are you sure?',
                text: `Do you want to assign "${selectedService}" to this staff member?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, assign it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Simulate updating the services
                    // In a real application, you would update the database
                    Swal.fire(
                        'Assigned!',
                        'Service has been assigned to staff.',
                        'success'
                    );

                    // Update the table cell directly (simplified for this example)
                    const serviceCell = serviceDropdown.parentElement.parentElement.querySelector('td:nth-child(4)'); //gets the services cell
                    const currentServices = serviceCell.textContent === 'No services assigned' ? [] : serviceCell.textContent.split(', ').map(s => s.trim());  //get current services

                    if (!currentServices.includes(selectedService)) {
                         currentServices.push(selectedService);
                         serviceCell.textContent = currentServices.join(', ');
                    }
                    serviceDropdown.value = ''; // Reset the dropdown after update

                }
            });
        }
    </script>
</body>
</html>
