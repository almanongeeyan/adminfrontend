<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Staff & Services to Branch</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/design.css" />
    <link id="skin-default" rel="stylesheet" href="../assets/css/themee1e3.css?ver=3.2.4" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <style>
        .assignment-table-wrapper {
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }
        .assignment-table {
            width: 100%;
            border-collapse: collapse;
        }
        .assignment-table th, .assignment-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .assignment-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .assignment-table tbody tr:last-child td {
            border-bottom: none;
        }
        .action-buttons {
            display: flex;
            align-items: center;
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
        .add-assignment-button {
            margin-left: auto;
        }
        #service-multiselect, #staff-multiselect {
            width: 100%;
            margin: 0.5em 0;
        }
        .select2-container {
            width: 100% !important;
        }
        .select2-selection {
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            height: auto;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            min-height: 2.5rem;
        }
        .select2-selection__rendered {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            flex: 1 1 auto;
        }
        .select2-selection__choice {
            background-color: #007bff;
            color: #fff;
            padding: 0.2rem 0.6rem;
            margin: 0.2rem;
            border-radius: 0.2rem;
            display: inline-flex;
            align-items: center;
            cursor: pointer;
        }
        .select2-selection__choice__remove {
            margin-left: 0.3rem;
            font-size: 1rem;
            line-height: 1;
        }
        .select2-selection__choice__remove:hover {
            color: #fff;
            opacity: 0.7;
        }
        .select2-selection__search {
            position: relative;
            margin: 0.2rem;
            flex: 1 1 auto;
            padding: 0;
        }
        .select2-search__field {
            border: none;
            padding: 0;
            font-size: 1rem;
            line-height: 1.5;
            outline: none;
            width: 100%;
        }
        .select2-dropdown {
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            margin-top: 0.25rem;
            position: absolute;
            z-index: 1000;
            width: 100%;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            overflow: auto;
            max-height: 200px;
        }
        .select2-results__options {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .select2-results__option {
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            cursor: pointer;
            white-space: nowrap;
        }
        .select2-results__option:hover, .select2-results__option.select2-focused {
            background-color: #007bff;
            color: #fff;
        }
        .select2-results__option.select2-disabled {
            color: #6c757d;
            cursor: not-allowed;
        }
        .select2-search, .select2-focus-box {
            display: none;
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
                                        <h3 class="nk-block-title page-title">Assign Staff & Services to Branch</h3>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <button class="btn btn-primary add-assignment-button" onclick="addAssignment()">Add Assignment</button>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="assignment-table-wrapper">
                                    <table class="assignment-table">
                                        <thead>
                                            <tr>
                                                <th>Branch</th>
                                                <th>Staff</th>
                                                <th>Services</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="assignment-table-body">
                                            <?php
                                            // Example assignment data (replace with your database fetch)
                                            $assignments = [
                                                                [
                                                                'id' => 1,
                                                                'branch_id' => 1,
                                                                'branch_name' => 'Main Branch',
                                                                'staff_ids' => [101, 102],
                                                                'staff_names' => ['Alice Johnson', 'Bob Smith'],
                                                                'service_ids' => [1, 2, 3],
                                                                'service_names' => ['Spa Treatment', 'Haircut', 'Manicure'],
                                                                ],
                                                                [
                                                                'id' => 2,
                                                                'branch_id' => 2,
                                                                'branch_name' => 'Downtown Branch',
                                                                'staff_ids' => [201],
                                                                'staff_names' => ['Charlie Brown'],
                                                                'service_ids' => [2, 4],
                                                                'service_names' => ['Haircut', 'Pedicure'],
                                                                ],
                                            ];

                                            foreach ($assignments as $assignment) {
                                                echo '<tr id="assignment-' . $assignment['id'] . '">';
                                                echo '<td>' . htmlspecialchars($assignment['branch_name'], ENT_QUOTES) . '</td>';
                                                echo '<td>' . implode(', ', array_map(function($name) { return htmlspecialchars($name, ENT_QUOTES); }, $assignment['staff_names'])) . '</td>';
                                                echo '<td>' . implode(', ', array_map(function($name) { return htmlspecialchars($name, ENT_QUOTES); }, $assignment['service_names'])) . '</td>';
                                                echo '<td class="action-buttons">';
                                                echo '<button class="edit" onclick="editAssignment(' . $assignment['id'] . ')"><i class="bi bi-pencil-square"></i></button>';
                                                echo '<button class="delete" onclick="deleteAssignment(' . $assignment['id'] . ', \'' . htmlspecialchars($assignment['branch_name'], ENT_QUOTES) . '\')"><i class="bi bi-trash3"></i></button>';
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

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="js/js1.js"></script>
    <script src="js/js2.js"></script>
    <script src="js/js3.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2 for staff and services dropdowns in the add/edit modals
            $('#staff-multiselect').select2({
                dropdownParent: $('#add-edit-modal') //  Important:  specify the parent container
            });
            $('#service-multiselect').select2({
                dropdownParent: $('#add-edit-modal') // Important: specify the parent container.
            });
        });

        function addAssignment() {
            // Fetch branches, staff, and services data (replace with your actual data fetching logic)
            const branches = [
                { id: 1, name: 'Main Branch' },
                { id: 2, name: 'Downtown Branch' },
                { id: 3, name: 'Uptown Branch' },
            ];
            const staff = [
                { id: 101, name: 'Alice Johnson' },
                { id: 102, name: 'Bob Smith' },
                { id: 201, name: 'Charlie Brown' },
                { id: 202, name: 'Diana Miller' },
            ];
            const services = [
                { id: 1, name: 'Spa Treatment' },
                { id: 2, name: 'Haircut' },
                { id: 3, name: 'Manicure' },
                { id: 4, name: 'Pedicure' },
                { id: 5, name: 'Facial' },
            ];

            // Generate select options for SweetAlert
            let branchOptions = '<select id="branch-select" class="swal2-select">';
            branches.forEach((branch) => {
                branchOptions += `<option value="${branch.id}">${branch.name}</option>`;
            });
            branchOptions += '</select>';

            let staffOptions = '<select id="staff-multiselect" multiple="multiple">';
            staff.forEach((staffMember) => {
                staffOptions += `<option value="${staffMember.id}">${staffMember.name}</option>`;
            });
            staffOptions += '</select>';

            let serviceOptions = '<select id="service-multiselect" multiple="multiple">';
            services.forEach((service) => {
                serviceOptions += `<option value="${service.id}">${service.name}</option>`;
            });
            serviceOptions += '</select>';

            Swal.fire({
                title: 'Add Assignment',
                html: branchOptions + staffOptions + serviceOptions,
                preConfirm: () => {
                    return {
                        branchId: document.getElementById('branch-select').value,
                        staffIds: $('#staff-multiselect').val(),
                        serviceIds: $('#service-multiselect').val(),
                    };
                },
                showCancelButton: true,
                confirmButtonText: 'Add',
                cancelButtonText: 'Cancel',
                didOpen: () => {
                    // Initialize Select2 inside the didOpen function
                    $('#staff-multiselect').select2({
                         dropdownParent: $('.swal2-container') // Correct dropdownParent
                    });
                    $('#service-multiselect').select2({
                         dropdownParent: $('.swal2-container') // Correct dropdownParent
                    });
                },
                onDestroy: () => {
                    // Destroy Select2
                    $('#staff-multiselect').select2('destroy');
                    $('#service-multiselect').select2('destroy');
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const assignmentData = result.value;
                    if (assignmentData.branchId && assignmentData.staffIds && assignmentData.serviceIds) {
                         const selectedBranchName = branches.find(b => b.id == assignmentData.branchId).name;
                        const selectedStaffNames = staff.filter(s => assignmentData.staffIds.includes(parseInt(s.id))).map(s => s.name);
                        const selectedServiceNames = services.filter(s => assignmentData.serviceIds.includes(parseInt(s.id))).map(s => s.name);
                        // In a real application, you would make an AJAX call here
                        // to add the assignment to the database.
                        console.log('Assignment Data:', assignmentData);

                        Swal.fire(
                            'Assignment Added!',
                            'The assignment has been added successfully.',
                            'success'
                        );

                        // For demonstration, let's add the new assignment to the table (without AJAX)
                        const newAssignmentRow = document.createElement('tr');
                        newAssignmentRow.innerHTML = `
                            <td>${selectedBranchName}</td>
                            <td>${selectedStaffNames.join(', ')}</td>
                            <td>${selectedServiceNames.join(', ')}</td>
                            <td class="action-buttons">
                                <button class="edit"><i class="bi bi-pencil-square"></i></button>
                                <button class="delete"><i class="bi bi-trash3"></i></button>
                            </td>
                        `;
                        document.getElementById('assignment-table-body').appendChild(newAssignmentRow);

                        // Get the newly added row
                        const newRow = document.getElementById('assignment-table-body').lastElementChild;

                        // Find the edit and delete buttons within the new row.
                        const editButton = newRow.querySelector('.edit');
                        const deleteButton = newRow.querySelector('.delete');

                        // Attach the event listeners.
                        editButton.addEventListener('click', () => {
                            const rowId =  newRow.rowIndex;
                            editAssignment(rowId);
                        });
                        deleteButton.addEventListener('click', () => {
                            const rowId = newRow.rowIndex;
                            deleteAssignment(rowId, selectedBranchName);
                        });

                    } else {
                        Swal.fire(
                            'Error',
                            'Please select a branch, staff, and service.',
                            'error'
                        );
                    }
                }
            });
        }

        function editAssignment(id) {
            const rowToEdit = document.getElementById(`assignment-${id}`);
             if (!rowToEdit) {
                Swal.fire('Error', 'Assignment to edit not found!', 'error');
                return;
            }

            // Fetch branches, staff, and services data (replace with your actual data fetching logic)
            const branches = [
                { id: 1, name: 'Main Branch' },
                { id: 2, name: 'Downtown Branch' },
                { id: 3, name: 'Uptown Branch' },
            ];
            const staff = [
                { id: 101, name: 'Alice Johnson' },
                { id: 102, name: 'Bob Smith' },
                { id: 201, name: 'Charlie Brown' },
                { id: 202, name: 'Diana Miller' },
            ];
            const services = [
                 { id: 1, name: 'Spa Treatment' },
                { id: 2, name: 'Haircut' },
                { id: 3, name: 'Manicure' },
                { id: 4, name: 'Pedicure' },
                { id: 5, name: 'Facial' },
            ];

            const branchName = rowToEdit.cells[0].textContent;
            const staffNames = rowToEdit.cells[1].textContent.split(', ').map(name => name.trim());
            const serviceNames = rowToEdit.cells[2].textContent.split(', ').map(name => name.trim());

            const selectedBranchId = branches.find(b => b.name === branchName).id;
            const selectedStaffIds = staff.filter(s => staffNames.includes(s.name)).map(s => s.id);
            const selectedServiceIds = services.filter(s => serviceNames.includes(s.name)).map(s => s.id);


            // Generate select options for SweetAlert
            let branchOptions = '<select id="branch-select" class="swal2-select">';
            branches.forEach((branch) => {
                branchOptions += `<option value="${branch.id}" ${branch.id === selectedBranchId ? 'selected' : ''}>${branch.name}</option>`;
            });
            branchOptions += '</select>';

             let staffOptions = '<select id="staff-multiselect" multiple="multiple">';
            staff.forEach((staffMember) => {
                const isSelected = selectedStaffIds.includes(staffMember.id);
                staffOptions += `<option value="${staffMember.id}" ${isSelected ? 'selected' : ''}>${staffMember.name}</option>`;
            });
            staffOptions += '</select>';

            let serviceOptions = '<select id="service-multiselect" multiple="multiple">';
            services.forEach((service) => {
                const isSelected = selectedServiceIds.includes(service.id);
                serviceOptions += `<option value="${service.id}" ${isSelected ? 'selected' : ''}>${service.name}</option>`;
            });
            serviceOptions += '</select>';

            Swal.fire({
                title: 'Edit Assignment',
                html: branchOptions + staffOptions + serviceOptions,
                preConfirm: () => {
                    return {
                        branchId: document.getElementById('branch-select').value,
                        staffIds: $('#staff-multiselect').val(),
                        serviceIds: $('#service-multiselect').val(),
                    };
                },
                showCancelButton: true,
                confirmButtonText: 'Save',
                cancelButtonText: 'Cancel',
                 didOpen: () => {
                    // Initialize Select2 inside the didOpen function
                    $('#staff-multiselect').select2({
                         dropdownParent: $('.swal2-container') // Correct dropdownParent
                    });
                    $('#service-multiselect').select2({
                         dropdownParent: $('.swal2-container') // Correct dropdownParent
                    });
                },
                onDestroy: () => {
                    // Destroy Select2
                    $('#staff-multiselect').select2('destroy');
                    $('#service-multiselect').select2('destroy');
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const updatedAssignmentData = result.value;
                    if (updatedAssignmentData.branchId && updatedAssignmentData.staffIds && updatedAssignmentData.serviceIds) {
                        const updatedBranchName = branches.find(b => b.id == updatedAssignmentData.branchId).name;
                        const updatedStaffNames = staff.filter(s => updatedAssignmentData.staffIds.includes(parseInt(s.id))).map(s => s.name);
                        const updatedServiceNames = services.filter(s => updatedAssignmentData.serviceIds.includes(parseInt(s.id))).map(s => s.name);
                        // In a real application, you would make an AJAX call here
                        // to update the assignment in the database.
                        console.log('Updated Assignment Data:', updatedAssignmentData);

                        Swal.fire(
                            'Assignment Updated!',
                            'The assignment details have been updated.',
                            'success'
                        );

                        // Update the table row
                        rowToEdit.cells[0].textContent = updatedBranchName;
                        rowToEdit.cells[1].textContent = updatedStaffNames.join(', ');
                        rowToEdit.cells[2].textContent = updatedServiceNames.join(', ');
                    } else {
                        Swal.fire(
                            'Error',
                            'Please select a branch, staff, and service.',
                            'error'
                        );
                    }
                }
            });
        }

        function deleteAssignment(id, branchName) {
             Swal.fire({
                title: 'Delete Assignment',
                text: `Are you sure you want to delete the assignment for ${branchName}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // In a real application, you would make an AJAX call here
                    // to delete the assignment from the database.
                    console.log('Delete Assignment ID:', id);

                    Swal.fire(
                        'Assignment Deleted!',
                        `The assignment for ${branchName} has been deleted.`,
                        'success'
                    );

                    // For demonstration, let's remove the table row (without AJAX)
                    const rowToDelete = document.getElementById(`assignment-${id}`);
                    if (rowToDelete) {
                         rowToDelete.remove();
                    }
                }
            });
        }
    </script>
</body>
</html>
