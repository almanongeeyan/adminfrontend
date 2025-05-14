<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch Directories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/design.css" />
    <link id="skin-default" rel="stylesheet" href="../assets/css/themee1e3.css?ver=3.2.4" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <style>
        .branch-table-wrapper {
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }
        .branch-table {
            width: 100%;
            border-collapse: collapse;
        }
        .branch-table th, .branch-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .branch-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .branch-table tbody tr:last-child td {
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
        .branch-header {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .search-container {
            display: flex;
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
        .add-branch-button {
            /* Removed margin-left: auto; */
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
                                        <h3 class="nk-block-title page-title">Branch Directories</h3>
                                    </div>
                                    <div class="nk-block-head-content">
                                        </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="branch-header">
                                    <div class="search-container">
                                        <input type="text" id="search-input" class="search-input"
                                            placeholder="Search by Branch Name">
                                        <button class="search-button" onclick="searchBranches()">Search</button>
                                    </div>
                                    <button class="btn btn-primary add-branch-button" onclick="addBranch()">Add Branch</button>
                                </div>
                                <div class="branch-table-wrapper">
                                    <table class="branch-table">
                                        <thead>
                                            <tr>
                                                <th>Branch Name</th>
                                                <th>Address</th>
                                                <th>Contact Number</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="branch-table-body">
                                            <?php
                                            // Example branch data (replace with your database fetch)
                                            $branches = [
                                                [
                                                    'id' => 1,
                                                    'name' => 'Main Branch',
                                                    'address' => '123 Main St, Cityville',
                                                    'contact_number' => '123-456-7890',
                                                ],
                                                [
                                                    'id' => 2,
                                                    'name' => 'Downtown Branch',
                                                    'address' => '456 Downtown Ave, Townsville',
                                                    'contact_number' => '987-654-3210',
                                                ],
                                            ];

                                            foreach ($branches as $branch) {
                                                echo '<tr id="branch-' . $branch['id'] . '">';
                                                echo '<td>' . htmlspecialchars($branch['name'], ENT_QUOTES) . '</td>';
                                                echo '<td>' . htmlspecialchars($branch['address'], ENT_QUOTES) . '</td>';
                                                echo '<td>' . htmlspecialchars($branch['contact_number'], ENT_QUOTES) . '</td>';
                                                echo '<td class="action-buttons">';
                                                echo '<button class="edit" onclick="editBranch(' . $branch['id'] . ')"><i class="bi bi-pencil-square"></i></button>';
                                                echo '<button class="delete" onclick="deleteBranch(' . $branch['id'] . ', \'' . htmlspecialchars($branch['name'], ENT_QUOTES) . '\')"><i class="bi bi-trash3"></i></button>';
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
        function addBranch() {
            Swal.fire({
                title: 'Add Branch',
                html: `<input id="name" class="swal2-input" placeholder="Branch Name">
                       <input id="address" class="swal2-input" placeholder="Address">
                       <input id="contact_number" class="swal2-input" placeholder="Contact Number">`,
                preConfirm: () => {
                    return {
                        name: document.getElementById('name').value,
                        address: document.getElementById('address').value,
                        contact_number: document.getElementById('contact_number').value,
                    };
                },
                showCancelButton: true,
                confirmButtonText: 'Add',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    const branchData = result.value;
                    if (branchData.name && branchData.address && branchData.contact_number) {
                        console.log('Branch Data:', branchData);
                        Swal.fire(
                            'Branch Added!',
                            'The branch has been added successfully.',
                            'success'
                        );
                        const newBranchRow = document.createElement('tr');
                        newBranchRow.innerHTML = `
                            <td>${branchData.name}</td>
                            <td>${branchData.address}</td>
                            <td>${branchData.contact_number}</td>
                            <td class="action-buttons">
                                <button class="edit" onclick="editBranch(${Date.now()})"><i class="bi bi-pencil-square"></i></button>
                                <button class="delete" onclick="deleteBranch(${Date.now()}, '${branchData.name}')"><i class="bi bi-trash3"></i></button>
                            </td>
                        `;
                        newBranchRow.id = `branch-${Date.now()}`; // Assign a unique ID
                        document.getElementById('branch-table-body').appendChild(newBranchRow);
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

        function editBranch(id) {
            const rowToEdit = document.getElementById(`branch-${id}`);
            if (!rowToEdit) {
                Swal.fire('Error', 'Branch to edit not found!', 'error');
                return;
            }

            const name = rowToEdit.cells[0].textContent;
            const address = rowToEdit.cells[1].textContent;
            const contactNumber = rowToEdit.cells[2].textContent;

            Swal.fire({
                title: 'Edit Branch',
                html: `<input id="name" class="swal2-input" placeholder="Branch Name" value="${name}">
                       <input id="address" class="swal2-input" placeholder="Address" value="${address}">
                       <input id="contact_number" class="swal2-input" placeholder="Contact Number" value="${contactNumber}">`,
                preConfirm: () => {
                    return {
                        name: document.getElementById('name').value,
                        address: document.getElementById('address').value,
                        contact_number: document.getElementById('contact_number').value,
                    };
                },
                showCancelButton: true,
                confirmButtonText: 'Save',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    const updatedBranchData = result.value;
                    if (updatedBranchData.name && updatedBranchData.address && updatedBranchData.contact_number) {
                        console.log('Updated Branch Data:', updatedBranchData);
                        Swal.fire(
                            'Branch Updated!',
                            'The branch details have been updated.',
                            'success'
                        );
                        rowToEdit.cells[0].textContent = updatedBranchData.name;
                        rowToEdit.cells[1].textContent = updatedBranchData.address;
                        rowToEdit.cells[2].textContent = updatedBranchData.contact_number;
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

        function deleteBranch(id, name) {
            Swal.fire({
                title: 'Delete Branch',
                text: `Are you sure you want to delete ${name}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('Delete Branch ID:', id);
                    Swal.fire(
                        'Branch Deleted!',
                        `The branch ${name} has been deleted.`,
                        'success'
                    );
                    const rowToDelete = document.getElementById(`branch-${id}`);
                    if (rowToDelete) {
                        rowToDelete.remove();
                    }
                }
            });
        }

        function searchBranches() {
            const searchTerm = document.getElementById('search-input').value.toLowerCase();
            const tableRows = document.getElementById('branch-table-body').getElementsByTagName('tr');

            for (let i = 0; i < tableRows.length; i++) {
                const branchNameCell = tableRows[i].getElementsByTagName('td')[0]; // Index 0 for Branch Name
                const branchAddressCell = tableRows[i].getElementsByTagName('td')[1]; // Index 1 for Address
                const branchContactCell = tableRows[i].getElementsByTagName('td')[2]; // Index 2 for Contact Number

                const nameMatch = branchNameCell && branchNameCell.textContent.toLowerCase().includes(searchTerm);
                const addressMatch = branchAddressCell && branchAddressCell.textContent.toLowerCase().includes(searchTerm);
                const contactMatch = branchContactCell && branchContactCell.textContent.toLowerCase().includes(searchTerm);

                if (nameMatch || addressMatch || contactMatch) {
                    tableRows[i].style.display = ''; // Show the row if any column matches
                } else {
                    tableRows[i].style.display = 'none'; // Hide the row if no column matches
                }
            }
        }
    </script>
</body>
</html>