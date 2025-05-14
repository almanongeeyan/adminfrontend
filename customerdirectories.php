<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8 />
    <meta name="author" content="Softnio" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers." />
    <link rel="shortcut icon" href="../images/favicon.png" />
    <title>Booking System | Admin | Customer Directories</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <style>
        .customer-management-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .customer-search {
            display: flex;
            align-items: center;
        }
        .customer-search input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
            width: 250px; /* Set a normal width */
        }
        .customer-search button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            font-size: 0.9rem;
        }
        .customer-search button:hover {
            background-color: #0056b3;
        }
        .customer-table-wrapper {
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }
        .customer-table {
            width: 100%;
            border-collapse: collapse;
        }
        .customer-table th, .customer-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .customer-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .customer-table tbody tr:last-child td {
            border-bottom: none;
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
        .swal2-datepicker {
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
                                        <h3 class="nk-block-title page-title">Customer Directories</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="customer-management-header">
                                    <div class="customer-search">
                                        <input type="text" id="searchInput" placeholder="Search customers...">
                                        </div>
                                    <div class="">
                                        <button class="btn btn-primary" onclick="addCustomer()">Add Customer</button>
                                    </div>
                                </div>
                                <div class="customer-table-wrapper">
                                    <table class="customer-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Contact Number</th>
                                                <th>Email</th>
                                                <th>Type of Booking</th>
                                                <th>Date of Booking</th>
                                                <th>Payment</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="customer-table-body">
                                            <?php
                                            // Example customer data (replace with your database fetch)
                                            $customers = [
                                                [
                                                    'id' => 1,
                                                    'name' => 'John Doe',
                                                    'contact_number' => '123-456-7890',
                                                    'email' => 'john.doe@example.com',
                                                    'type_of_booking' => 'Online',
                                                    'date_of_booking' => '2024-07-28',
                                                    'payment' => '$100',
                                                ],
                                                [
                                                    'id' => 2,
                                                    'name' => 'Jane Smith',
                                                    'contact_number' => '987-654-3210',
                                                    'email' => 'jane.smith@example.com',
                                                    'type_of_booking' => 'Walk-in',
                                                    'date_of_booking' => '2024-07-29',
                                                    'payment' => '$50',
                                                ],
                                                [
                                                    'id' => 3,
                                                    'name' => 'Peter Jones',
                                                    'contact_number' => '555-111-2222',
                                                    'email' => 'peter.jones@example.com',
                                                    'type_of_booking' => 'Online',
                                                    'date_of_booking' => '2024-07-30',
                                                    'payment' => '$75',
                                                ],
                                                [
                                                    'id' => 4,
                                                    'name' => 'Alice Brown',
                                                    'contact_number' => '333-444-5555',
                                                    'email' => 'alice.brown@example.com',
                                                    'type_of_booking' => 'Walk-in',
                                                    'date_of_booking' => '2024-08-01',
                                                    'payment' => '$60',
                                                ],
                                            ];

                                            foreach ($customers as $customer) {
                                                echo '<tr id="customer-' . $customer['id'] . '" class="customer-row">';
                                                echo '<td>' . htmlspecialchars($customer['name'], ENT_QUOTES) . '</td>';
                                                echo '<td>' . htmlspecialchars($customer['contact_number'], ENT_QUOTES) . '</td>';
                                                echo '<td>' . htmlspecialchars($customer['email'], ENT_QUOTES) . '</td>';
                                                echo '<td>' . htmlspecialchars($customer['type_of_booking'], ENT_QUOTES) . '</td>';
                                                echo '<td>' . htmlspecialchars($customer['date_of_booking'], ENT_QUOTES) . '</td>';
                                                echo '<td>' . htmlspecialchars($customer['payment'], ENT_QUOTES) . '</td>';
                                                echo '<td class="action-buttons">';
                                                echo '<button class="edit" onclick="editCustomer(' . $customer['id'] . ')">Edit</button>';
                                                echo '<button class="delete" onclick="deleteCustomer(' . $customer['id'] . ', \'' . htmlspecialchars($customer['name'], ENT_QUOTES) . '\')">Delete</button>';
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
        function addCustomer() {
            Swal.fire({
                title: 'Add Customer',
                html: `<input id="name" class="swal2-input" placeholder="Name">
                       <input id="contact_number" class="swal2-input" placeholder="Contact Number">
                       <input id="email" class="swal2-input" placeholder="Email">
                       <select id="type_of_booking" class="swal2-select">
                           <option value="">Select Booking Type</option>
                           <option value="Online">Online</option>
                           <option value="Walk-in">Walk-in</option>
                       </select>
                       <input id="date_of_booking" class="swal2-datepicker" placeholder="Date of Booking" readonly>
                       <input id="payment" class="swal2-input" placeholder="Payment">`,
                preConfirm: () => {
                    return {
                        name: document.getElementById('name').value,
                        contact_number: document.getElementById('contact_number').value,
                        email: document.getElementById('email').value,
                        type_of_booking: document.getElementById('type_of_booking').value,
                        date_of_booking: document.getElementById('date_of_booking').value,
                        payment: document.getElementById('payment').value,
                    };
                },
                didOpen: () => {
                    $('#date_of_booking').datepicker({
                        format: 'yyyy-mm-dd',
                        autoclose: true,
                        todayHighlight: true,
                    });
                },
                showCancelButton: true,
                confirmButtonText: 'Add',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    const customerData = result.value;
                    if (customerData.name && customerData.contact_number && customerData.email && customerData.type_of_booking && customerData.date_of_booking && customerData.payment) {
                        console.log('Customer Data:', customerData);
                        Swal.fire(
                            'Customer Added!',
                            'The customer has been added successfully.',
                            'success'
                        );
                        const newCustomerRow = document.createElement('tr');
                        newCustomerRow.innerHTML = `
                            <td>${customerData.name}</td>
                            <td>${customerData.contact_number}</td>
                            <td>${customerData.email}</td>
                            <td>${customerData.type_of_booking}</td>
                            <td>${customerData.date_of_booking}</td>
                            <td>${customerData.payment}</td>
                            <td class="action-buttons">
                                <button class="edit" onclick="editCustomer(0)">Edit</button>
                                <button class="delete" onclick="deleteCustomer(0, '${customerData.name}')">Delete</button>
                            </td>
                        `;
                        document.getElementById('customer-table-body').appendChild(newCustomerRow);
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

        function editCustomer(id) {
            const customerData = {
                name: 'John Doe',
                contact_number: '123-456-7890',
                email: 'john.doe@example.com',
                type_of_booking: 'Online',
                date_of_booking: '2024-07-28',
                payment: '$100',
            };

            Swal.fire({
                title: 'Edit Customer',
                html: `<input id="name" class="swal2-input" placeholder="Name" value="${customerData.name}">
                       <input id="contact_number" class="swal2-input" placeholder="Contact Number" value="${customerData.contact_number}">
                       <input id="email" class="swal2-input" placeholder="Email" value="${customerData.email}">
                       <select id="type_of_booking" class="swal2-select">
                           <option value="">Select Booking Type</option>
                           <option value="Online" ${customerData.type_of_booking === 'Online' ? 'selected' : ''}>Online</option>
                           <option value="Walk-in" ${customerData.type_of_booking === 'Walk-in' ? 'selected' : ''}>Walk-in</option>
                       </select>
                       <input id="date_of_booking_edit" class="swal2-datepicker" placeholder="Date of Booking" value="${customerData.date_of_booking}" readonly>
                       <input id="payment" class="swal2-input" placeholder="Payment" value="${customerData.payment}">`,
                preConfirm: () => {
                    return{
                        name: document.getElementById('name').value,
                        contact_number: document.getElementById('contact_number').value,
                        email: document.getElementById('email').value,
                        type_of_booking: document.getElementById('type_of_booking').value,
                        date_of_booking: document.getElementById('date_of_booking_edit').value,
                        payment: document.getElementById('payment').value,
                    };
                },
                didOpen: () => {
                    $('#date_of_booking_edit').datepicker({
                        format: 'yyyy-mm-dd',
                        autoclose: true,
                        todayHighlight: true,
                    });
                },
                showCancelButton: true,
                confirmButtonText: 'Save',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    const updatedCustomerData = result.value;
                    if (updatedCustomerData.name && updatedCustomerData.contact_number && updatedCustomerData.email && updatedCustomerData.type_of_booking && updatedCustomerData.date_of_booking && updatedCustomerData.payment) {
                        console.log('Updated Customer Data:', updatedCustomerData);
                        Swal.fire(
                            'Customer Updated!',
                            'The customer details have been updated.',
                            'success'
                        );
                        const rowToUpdate = document.getElementById(`customer-${id}`);
                        if (rowToUpdate) {
                            rowToUpdate.innerHTML = `
                                <td>${updatedCustomerData.name}</td>
                                <td>${updatedCustomerData.contact_number}</td>
                                <td>${updatedCustomerData.email}</td>
                                <td>${updatedCustomerData.type_of_booking}</td>
                                <td>${updatedCustomerData.date_of_booking}</td>
                                <td>${updatedCustomerData.payment}</td>
                                <td class="action-buttons">
                                    <button class="edit" onclick="editCustomer(${id})">Edit</button>
                                    <button class="delete" onclick="deleteCustomer(${id}, '${updatedCustomerData.name}')">Delete</button>
                                </td>
                            `;
                        }
                        $('#date_of_booking_edit').datepicker('destroy');
                    } else {
                        Swal.fire(
                            'Error',
                            'Please fill in all the fields.',
                            'error'
                        );
                        $('#date_of_booking_edit').datepicker('destroy');
                    }
                } else {
                    $('#date_of_booking_edit').datepicker('destroy');
                }
            });
        }

        function deleteCustomer(id, name) {
            Swal.fire({
                title: 'Delete Customer',
                text: `Are you sure you want to delete ${name}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('Delete Customer ID:', id);
                    Swal.fire(
                        'Customer Deleted!',
                        `The customer ${name} has been deleted.`,
                        'success'
                    );
                    const rowToDelete = document.getElementById(`customer-${id}`);
                    if (rowToDelete) {
                        rowToDelete.remove();
                    }
                }
            });
        }

        const searchInput = document.getElementById('searchInput');
        const customerTableBody = document.getElementById('customer-table-body');
        const tableRows = customerTableBody.getElementsByTagName('tr');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            for (let i = 0; i < tableRows.length; i++) {
                const nameCell = tableRows[i].getElementsByTagName('td')[0];
                const contactCell = tableRows[i].getElementsByTagName('td')[1];
                const emailCell = tableRows[i].getElementsByTagName('td')[2];
                const typeCell = tableRows[i].getElementsByTagName('td')[3];
                const dateCell = tableRows[i].getElementsByTagName('td')[4];
                const paymentCell = tableRows[i].getElementsByTagName('td')[5];

                const name = nameCell ? nameCell.textContent.toLowerCase() : '';
                const contact = contactCell ? contactCell.textContent.toLowerCase() : '';
                const email = emailCell ? emailCell.textContent.toLowerCase() : '';
                const type = typeCell ? typeCell.textContent.toLowerCase() : '';
                const date = dateCell ? dateCell.textContent.toLowerCase() : '';
                const payment = paymentCell ? paymentCell.textContent.toLowerCase() : '';

                if (
                    name.includes(searchTerm) ||
                    contact.includes(searchTerm) ||
                    email.includes(searchTerm) ||
                    type.includes(searchTerm) ||
                    date.includes(searchTerm) ||
                    payment.includes(searchTerm)
                ) {
                    tableRows[i].style.display = '';
                } else {
                    tableRows[i].style.display = 'none';
                }
            }
        });
    </script>
</body>
</html>