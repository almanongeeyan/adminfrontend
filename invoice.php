<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoices</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/design.css" />
    <link id="skin-default" rel="stylesheet" href="../assets/css/themee1e3.css?ver=3.2.4" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <style>
        .invoice-table-wrapper {
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-table th, .invoice-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .invoice-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .invoice-table tbody tr:last-child td {
            border-bottom: none;
        }
        .filter-options {
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
        }
        .filter-options label {
            margin-right: 5px;
            font-weight: bold;
            font-size: 0.9rem;
        }
        .filter-options select {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9rem;
            width: 200px;
        }
        .filter-button {
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            white-space: nowrap;
        }
        .filter-button:hover {
            background-color: #0056b3;
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

        /* Styles for the invoice modal */
        .invoice-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            border-bottom: 1px solid #eee;
            padding-bottom: 0.5rem;
        }
        .invoice-modal-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0;
        }
        .invoice-modal-body {
            margin-bottom: 1rem;
        }
        .invoice-modal-footer {
            display: flex;
            justify-content: flex-end;
        }
        .invoice-details-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        .invoice-details-table th,
        .invoice-details-table td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .invoice-details-table th {
            font-weight: bold;
            background-color: #f8f9fa;
        }
        .invoice-total-row {
            font-weight: bold;
            border-top: 2px solid #ddd;
            font-size: 1.1rem;
        }
        .text-right {
            text-align: right;
        }
        .text-left{
            text-align: left;
        }
        .align-right {
            text-align: right;
        }
        .modal-header-title {
            color: #343a40;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .company-info {
            font-size: 1rem;
            color: #495057;
            margin-bottom: 1rem;
        }

        .invoice-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        .bill-to {
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        .customer-name {
            font-weight: bold;
            color: #212529;
        }

        .table-title {
            font-size: 1.1rem;
            font-weight: bold;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
            color: #2c3e50;
        }
        .action-buttons {
            display: flex;
            gap: 5px;
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
                                        <h3 class="nk-block-title page-title">Invoices</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="filter-options">
                                    <label for="branch-filter">Filter by Branch:</label>
                                    <select id="branch-filter">
                                        <option value="">All Branches</option>
                                    </select>
                                    <label for="invoice-status">Invoice Status:</label>
                                    <select id="invoice-status">
                                        <option value="">All Statuses</option>
                                        <option value="pending">Pending</option>
                                        <option value="paid">Paid</option>
                                        <option value="cancelled">Cancelled</option>
                                    </select>
                                    <button class="filter-button" onclick="generateInvoices()">Generate Invoices</button>
                                </div>
                                <div class="invoice-table-wrapper">
                                    <table class="invoice-table">
                                        <thead>
                                            <tr>
                                                <th>Invoice #</th>
                                                <th>Booking ID</th>
                                                <th>Customer Name</th>
                                                <th>Branch</th>
                                                <th>Service</th>
                                                <th>Staff</th>
                                                <th>Invoice Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th colspan="2">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="invoice-table-body">
                                            <tr><td colspan="11" class="text-center">No invoices available. Please select filter and generate invoices.</td></tr>
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
        let invoices = []; // Declare invoices array in the global scope

        $(document).ready(function() {
            // Initialize the branch dropdown
            populateBranchDropdown();
        });

        function populateBranchDropdown() {
            // In a real application, you would fetch branch data from your database
            const branches = [
                { id: 1, name: 'Main Branch' },
                { id: 2, name: 'Downtown Branch' },
                { id: 3, name: 'Uptown Branch' },
            ];

            const branchSelect = document.getElementById('branch-filter');

            branches.forEach(branch => {
                const option = document.createElement('option');
                option.value = branch.id;
                option.textContent = branch.name;
                branchSelect.appendChild(option);
            });
        }

        function generateInvoices() {
            const branchId = document.getElementById('branch-filter').value;
            const invoiceStatus = document.getElementById('invoice-status').value;

            // In a real application, you would fetch booking and invoice data from your database
            // and generate invoices based on the bookings.
            // For this example, we'll assume that each booking generates one invoice.

            const bookings = [
                {
                    booking_id: 1001, customer_name: 'John Doe', branch_id: 1, branch_name: 'Main Branch',
                    service_name: 'Spa Treatment', staff_name: 'Alice Johnson', booking_date: '2024-07-20', amount: 100,
                    status: 'Confirmed'
                },
                {
                    booking_id: 1002, customer_name: 'Jane Smith', branch_id: 1, branch_name: 'Main Branch',
                    service_name: 'Haircut', staff_name: 'Bob Smith', booking_date: '2024-07-20', amount: 50,
                    status: 'Confirmed'
                },
                {
                    booking_id: 1003, customer_name: 'Mary Jones', branch_id: 2, branch_name: 'Downtown Branch',
                    service_name: 'Manicure', staff_name: 'Charlie Brown', booking_date: '2024-07-21', amount: 30,
                    status: 'Pending'
                },
                {
                    booking_id: 1004, customer_name: 'Mike Davis', branch_id: 2, branch_name: 'Downtown Branch',
                    service_name: 'Pedicure', staff_name: 'Charlie Brown', booking_date: '2024-07-21', amount: 40,
                    status: 'Cancelled'
                },
                {
                    booking_id: 1005, customer_name: 'Sarah Williams', branch_id: 3, branch_name: 'Uptown Branch',
                    service_name: 'Facial', staff_name: 'Alice Johnson', booking_date: '2024-07-22', amount: 80,
                    status: 'Confirmed'
                },
            ];

            // Simulate invoice generation (in a real app, this would be done server-side)
            invoices = bookings.map((booking, index) => ({ // Store generated invoices in the global array
                invoice_number: 2001 + index, // Generate a unique invoice number
                booking_id: booking.booking_id,
                customer_name: booking.customer_name,
                branch_name: booking.branch_name,
                service_name: booking.service_name,
                staff_name: booking.staff_name,
                invoice_date: new Date().toISOString().split('T')[0], // Use current date
                amount: booking.amount,
                status: booking.status === 'Cancelled' ? 'Cancelled' : 'Pending', // Set initial status
            }));

            // Apply filters
            let filteredInvoices = invoices;
            if (branchId) {
                filteredInvoices = filteredInvoices.filter(invoice =>
                    bookings.find(b => b.booking_id === invoice.booking_id).branch_id == branchId
                );
            }
            if (invoiceStatus) {
                filteredInvoices = filteredInvoices.filter(invoice => invoice.status === invoiceStatus);
            }

            const invoiceTableBody = document.getElementById('invoice-table-body');
            invoiceTableBody.innerHTML = '';

            if (filteredInvoices.length === 0) {
                invoiceTableBody.innerHTML = '<tr><td colspan="11" class="text-center">No invoices found for the selected criteria.</td></tr>';
                return;
            }

            filteredInvoices.forEach(invoice => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${invoice.invoice_number}</td>
                    <td>${invoice.booking_id}</td>
                    <td>${invoice.customer_name}</td>
                    <td>${invoice.branch_name}</td>
                    <td>${invoice.service_name}</td>
                    <td>${invoice.staff_name}</td>
                    <td>${invoice.invoice_date}</td>
                    <td>$${invoice.amount}</td>
                    <td>${invoice.status}</td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn btn-sm btn-primary" onclick="viewInvoiceDetails(${invoice.invoice_number})">View</button>
                            <button class="btn btn-sm btn-secondary" onclick="printInvoice(${invoice.invoice_number})">Print</button>
                            <button class="btn btn-sm btn-info" onclick="downloadInvoice(${invoice.invoice_number})">Download</button>
                        </div>
                    </td>
                    <td><button class="btn btn-sm ${invoice.status === 'Pending' ? 'btn-warning' : 'btn-success'}" onclick="manualPaymentEntry(${invoice.invoice_number}, '${invoice.status}')">${invoice.status === 'Pending' ? 'Mark Paid' : 'Paid'}</button></td>
                `;
                invoiceTableBody.appendChild(row);
            });
        }

        function viewInvoiceDetails(invoiceNumber) {
            // In a real application, you would fetch the invoice details from the database
            // based on the invoice number.  For this example, we'll use the data we already have.

            // Find the invoice in the generated invoices
            const invoice = invoices.find(inv => inv.invoice_number === invoiceNumber);

            if (!invoice) {
                Swal.fire('Error', 'Invoice not found!', 'error');
                return;
            }

            // Construct the HTML for the modal
            const htmlContent = `
                <div class="invoice-modal-header">
                    <h2 class="invoice-modal-title">Invoice</h2>
                </div>
                <div class="invoice-modal-body">
                    <div class="company-info">
                        Your Company Name<br>
                        Your Company Address<br>
                        Phone: Your Company Phone<br>
                        Email: Your Company Email
                    </div>
                    <div class="invoice-info">
                        <div>
                            <strong>Invoice #:</strong> ${invoice.invoice_number}<br>
                            <strong>Date:</strong> ${invoice.invoice_date}
                        </div>
                        <div class="text-right">
                            <strong>Booking ID:</strong> ${invoice.booking_id}
                        </div>
                    </div>
                    <div class="bill-to">
                        <strong>Bill To:</strong><br>
                        <span class="customer-name">${invoice.customer_name}</span><br>
                    </div>

                    <h3 class="table-title">Invoice Details</h3>
                    <table class="invoice-details-table">
                        <thead>
                            <tr>
                                <th class="text-left">Description</th>
                                <th class="text-right">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left">${invoice.service_name} - ${invoice.staff_name}</td>
                                <td class="text-right">$${invoice.amount}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="invoice-total-row">
                                <th class="text-left">Total Amount:</th>
                                <td class="text-right">$${invoice.amount}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Payment Method:</th>
                                <td class="text-right">(To be implemented)</td>
                            </tr>
                            <tr>
                                <th class="text-left">Payment Status:</th>
                                 <td class="text-right">${invoice.status}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="invoice-modal-footer">
                    <button class="btn btn-secondary swal2-cancel">Close</button>
                    <button class="btn btn-primary swal2-confirm" onclick="printInvoice(${invoice.invoice_number})">Print Invoice</button>
                </div>
            `;

            Swal.fire({
                html: htmlContent,
                showCancelButton: true,
                showConfirmButton: false,
                didOpen: () => {
                    // Manually add event listeners to the buttons within the modal.
                    const closeButton = document.querySelector('.swal2-cancel');
                    const printButton = document.querySelector('.swal2-confirm');


                    if (closeButton) {
                        closeButton.addEventListener('click', () => {
                            Swal.close();
                        });
                    }
                    if (printButton) {
                        printButton.addEventListener('click', () => {
                            printInvoice(invoiceNumber);
                        });
                    }
                }
            });
        }

        function printInvoice(invoiceNumber) {
            //  use  jsPDF or similar library.
            Swal.fire(
                'Print',
                'Printing functionality is not implemented in this example.',
                'info'
            );
            console.log(`Printing invoice ${invoiceNumber}`);
        }

        function downloadInvoice(invoiceNumber) {
            // In a real application, you would generate a PDF or other file format
            // and provide a download link.
            Swal.fire(
                'Download',
                'Downloading functionality is not implemented in this example.',
                'info'
            );
            console.log(`Downloading invoice ${invoiceNumber}`);
        }

        function manualPaymentEntry(invoiceNumber, currentStatus) {
            // In a real application, you would update the invoice status in the database.
            if (currentStatus === 'Pending') {
                Swal.fire({
                    title: 'Mark as Paid?',
                    text: "Are you sure you want to mark this invoice as paid?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, mark as paid!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Update status to 'Paid' in your database here
                        // For this example, we just update the status in the local array:
                        const invoiceIndex = invoices.findIndex(inv => inv.invoice_number === invoiceNumber);
                        if (invoiceIndex !== -1) {
                            invoices[invoiceIndex].status = 'Paid';
                        }
                        generateInvoices(); // Refresh the table to show the updated status

                        Swal.fire(
                            'Paid!',
                            'The invoice has been marked as paid.',
                            'success'
                        );
                    }
                });
            } else {
                Swal.fire({
                    title: 'Mark as Unpaid?',
                    text: "Are you sure you want to mark this invoice as unpaid?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, mark as unpaid!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Update status to 'Paid' in your database here
                        // For this example, we just update the status in the local array:
                        const invoiceIndex = invoices.findIndex(inv => inv.invoice_number === invoiceNumber);
                        if (invoiceIndex !== -1) {
                            invoices[invoiceIndex].status = 'Pending';
                        }
                        generateInvoices(); // Refresh the table to show the updated status

                        Swal.fire(
                            'Unpaid!',
                            'The invoice has been marked as unpaid.',
                            'success'
                        );
                    }
                });
            }
        }
    </script>
</body>
</html>
