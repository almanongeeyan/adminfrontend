<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="author" content="Softnio" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers." />
    <link rel="shortcut icon" href="../images/favicon.png" />
    <title>Booking System | Admin</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/design.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link id="skin-default" rel="stylesheet" href="../assets/css/themee1e3.css?ver=3.2.4" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-91615293-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());
        gtag("config", "UA-91615293-4");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <style>
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        .form-grid > div {
            margin-bottom: 10px;
        }
        .form-grid > div:last-child {
            margin-bottom: 0;
        }
        .color-picker {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            align-items: center;
        }
        .color-circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            border: 1px solid #ccc;
        }
        .color-description {
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>
<body class="nk-body ui-rounder has-sidebar ui-light">

<div class="nk-app-root">
    <div class="nk-main">
        <?php
        include 'includes/sidebar.php';
        ?>
        <div class="nk-wrap">
            <div class="nk-header is-light nk-header-fixed is-light">
                <div class="container-xl wide-xl">
                    <div class="nk-header-wrap">
                        <div class="nk-menu-trigger d-xl-none ms-n1 me-3">
                            <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><i class="fa-solid fa-bars"></i></a>
                        </div>
                        <div class="nk-header-brand d-xl-none">
                            <a href="index.php" class="logo-link">
                                <img class="logo-light logo-img" src="../images/sidebar.png" alt="logo" />
                                <img class="logo-dark logo-img" src="../images/sidebar.png" alt="logo-dark" />
                            </a>
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
                                    <h3 class="nk-block-title page-title">Dashboard</h3>
                                </div>
                            </div>
                        </div>

                        <div class="nk-block">
                            <div class="key-metrics">
                                <div class="metric-card bookings">
                                    <i class="bi bi-calendar-event metric-icon"></i>
                                    <div>
                                        <div class="metric-value">15</div>
                                        <div class="metric-label">Today's Bookings</div>
                                    </div>
                                </div>
                                <div class="metric-card appointments">
                                    <i class="bi bi-clock metric-icon"></i>
                                    <div>
                                        <div class="metric-value">32</div>
                                        <div class="metric-label">Upcoming Appointments</div>
                                    </div>
                                </div>
                                <div class="metric-card revenue">
                                    <i class="bi bi-cash-coin metric-icon"></i>
                                    <div>
                                        <div class="metric-value">₱1,250.00</div>
                                        <div class="metric-label">Revenue</div>
                                    </div>
                                </div>
                            </div>

                            <div class="calendar-container">
                                <h4 class="month-title">Calendar</h4>
                                <button class="add-event-button px-4" data-toggle="modal" data-target="#addBookingModal">Add New Booking</button>
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include 'includes/footer.php'; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="addBookingModal" tabindex="-1" role="dialog" aria-labelledby="addBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBookingModalLabel">Add New Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addBookingForm">
                    <div class="form-grid">
                        <div>
                            <label for="add-title">Booking Title</label>
                            <input type="text" class="form-control" id="add-title">
                        </div>
                        <div>
                            <label for="add-customer">Customer Name</label>
                            <select class="form-control" id="add-customer">
                                <option value="Client One">Client One</option>
                                <option value="Client A Corp">Client A Corp</option>
                                <option value="Another Client">Another Client</option>
                                <option value="Mr. Follow Up">Mr. Follow Up</option>
                                <option value="Third Party">Third Party</option>
                                <option value="Tech Solutions Inc.">Tech Solutions Inc.</option>
                                <option value="Individual User">Individual User</option>
                                <option value="Service Pro Client">Service Pro Client</option>
                                <option value="Prime Customer">Prime Customer</option>
                                <option value="Key Account Ltd.">Key Account Ltd.</option>
                                <option value="Regular Patron">Regular Patron</option>
                                <option value="New Inquiry">New Inquiry</option>
                                <option value="Repeat Buyer">Repeat Buyer</option>
                                <option value="Management Team">Management Team</option>
                                <option value="Loyal Customer">Loyal Customer</option>
                                <option value="Internal">Internal</option>
                                <option value="Occasional Visitor">Occasional Visitor</option>
                            </select>
                        </div>
                        <div>
                            <label for="add-start-datetime">Start Date and Time</label>
                            <input type="datetime-local" class="form-control" id="add-start-datetime">
                        </div>
                        <div>
                            <label for="add-end-datetime">End Date and Time</label>
                            <input type="datetime-local" class="form-control" id="add-end-datetime">
                        </div>
                        <div colspan="2">
                            <label for="add-description">Description</label>
                            <textarea class="form-control" id="add-description"></textarea>
                        </div>
                    </div>
                    <div class="color-picker">
                        <label>Color:</label>
                        <div class="color-option">
                            <div class="color-circle bg-danger" data-color="bg-danger" title="Urgent"></div>
                            <span class="color-description">Urgent</span>
                        </div>
                        <div class="color-option">
                            <div class="color-circle bg-warning" data-color="bg-warning" title="Important"></div>
                            <span class="color-description">Important</span>
                        </div>
                        <div class="color-option">
                            <div class="color-circle bg-info" data-color="bg-info" title="Information"></div>
                            <span class="color-description">Information</span>
                        </div>
                        <div class="color-option">
                            <div class="color-circle bg-primary" data-color="bg-primary" title="Normal"></div>
                            <span class="color-description">Normal</span>
                        </div>
                        <div class="color-option">
                            <div class="color-circle bg-success" data-color="bg-success" title="Completed"></div>
                            <span class="color-description">Completed</span>
                        </div>
                        <div class="color-option">
                            <div class="color-circle bg-secondary" data-color="bg-secondary" title="Secondary"></div>
                            <span class="color-description">Secondary</span>
                        </div>
                        <div class="color-option">
                            <div class="color-circle bg-dark" data-color="bg-dark" title="High Priority"></div>
                            <span class="color-description">High Priority</span>
                        </div>
                        <div class="color-option">
                            <div class="color-circle" style="background-color: purple;" data-color="purple-event" title="Meeting"></div>
                            <span class="color-description">Meeting</span>
                        </div>
                    </div>
                    <input type="hidden" id="add-color" value="bg-primary">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveNewBooking">Create Booking</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editBookingModal" tabindex="-1" role="dialog" aria-labelledby="editBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBookingModalLabel">Edit Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editBookingForm">
                    <input type="hidden" id="edit-booking-id">
                    <div class="form-grid">
                        <div>
                            <label for="edit-title">Booking Title</label>
                            <input type="text" class="form-control" id="edit-title">
                        </div>
                        <div>
                            <label for="edit-customer">Customer Name</label>
                            <select class="form-control" id="edit-customer">
                                <option value="Client One">Client One</option>
                                <option value="Client A Corp">Client A Corp</option>
                                <option value="Another Client">Another Client</option>
                                <option value="Mr. Follow Up">Mr. Follow Up</option>
                                <option value="Third Party">Third Party</option>
                                <option value="Tech Solutions Inc.">Tech Solutions Inc.</option>
                                <option value="Individual User">Individual User</option>
                                <option value="Service Pro Client">Service Pro Client</option>
                                <option value="Prime Customer">Prime Customer</option>
                                <option value="Key Account Ltd.">Key Account Ltd.</option>
                                <option value="Regular Patron">Regular Patron</option>
                                <option value="New Inquiry">New Inquiry</option>
                                <option value="Repeat Buyer">Repeat Buyer</option>
                                <option value="Management Team">Management Team</option>
                                <option value="Loyal Customer">Loyal Customer</option>
                                <option value="Internal">Internal</option>
                                <option value="Occasional Visitor">Occasional Visitor</option>
                            </select>
                        </div>
                        <div>
                            <label for="edit-start-datetime">Start Date and Time</label>
                            <input type="datetime-local" class="form-control" id="edit-start-datetime">
                        </div>
                        <div>
                            <label for="edit-end-datetime">End Date and Time</label>
                            <input type="datetime-local" class="form-control" id="edit-end-datetime">
                        </div>
                        <div colspan="2">
                            <label for="edit-description">Description</label>
                            <textarea class="form-control" id="edit-description"></textarea>
                        </div>
                    </div>
                    <div class="color-picker">
                        <label>Color:</label>
                        <div class="color-option">
                            <div class="color-circle bg-danger" data-color="bg-danger" title="Urgent"></div>
                            <span class="color-description">Urgent</span>
                        </div>
                        <div class="color-option">
                            <div class="color-circle bg-warning" data-color="bg-warning" title="Important"></div>
                            <span class="color-description">Important</span>
                        </div>
                        <div class="color-option">
                            <div class="color-circle bg-info" data-color="bg-info" title="Information"></div>
                            <span class="color-description">Information</span>
                        </div>
                        <div class="color-option">
                            <div class="color-circle bg-primary" data-color="bg-primary" title="Normal"></div>
                            <span class="color-description">Normal</span>
                        </div>
                        <div class="color-option">
                            <div class="color-circle bg-success" data-color="bg-success" title="Completed"></div>
                            <span class="color-description">Completed</span>
                        </div>
                        <div class="color-option">
                            <div class="color-circle bg-secondary" data-color="bg-secondary" title="Secondary"></div>
                            <span class="color-description">Secondary</span>
                        </div>
                        <div class="color-option">
                            <div class="color-circle bg-dark" data-color="bg-dark" title="High Priority"></div>
                            <span class="color-description">High Priority</span>
                        </div>
                        <div class="color-option">
                            <div class="color-circle" style="background-color: purple;" data-color="purple-event" title="Meeting"></div>
                            <span class="color-description">Meeting</span>
                        </div>
                    </div>
                    <input type="hidden" id="edit-color">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="deleteBooking">Delete Booking</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="updateBooking">Update Booking</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [], // Initialize with an empty array for events
            eventClick: function(info) {
                const event = info.event;
                document.getElementById('edit-booking-id').value = event.id;
                document.getElementById('edit-title').value = event.title;
                document.getElementById('edit-description').value = event.extendedProps.description || '';
                document.getElementById('edit-start-datetime').value = formatDateTimeLocal(event.start);
                document.getElementById('edit-end-datetime').value = event.end ? formatDateTimeLocal(event.end) : '';
                document.getElementById('edit-customer').value = event.extendedProps.customerName || '';
                document.getElementById('edit-color').value = event.className ? event.className.find(className => className.startsWith('bg-') || className === 'purple-event') : 'bg-primary';

                // Ensure the correct color is visually selected (optional visual feedback)
                document.querySelectorAll('#editBookingModal .color-circle').forEach(circle => {
                    circle.classList.remove('selected-color'); // You might need to add CSS for this
                    if (circle.dataset.color === document.getElementById('edit-color').value) {
                        circle.classList.add('selected-color');
                    }
                    if (circle.style.backgroundColor === 'purple' && document.getElementById('edit-color').value === 'purple-event') {
                        circle.classList.add('selected-color');
                    }
                });

                $('#editBookingModal').modal('show');
            }
        });
        calendar.render();

        // Add event button functionality (opens modal)
        const addEventButton = document.querySelector('.add-event-button');
        addEventButton.addEventListener('click', () => {
            $('#addBookingModal').modal('show');
            // Reset form fields when modal is shown
            document.getElementById('addBookingForm').reset();
            document.getElementById('add-color').value = 'bg-primary'; // Default color
            // Reset color selection (optional visual feedback)
            document.querySelectorAll('#addBookingModal .color-circle').forEach(circle => circle.classList.remove('selected-color'));
            document.querySelector('#addBookingModal .color-circle[data-color="bg-primary"]').classList.add('selected-color');
        });

        // Color selection for add modal
        document.querySelectorAll('#addBookingModal .color-circle').forEach(circle => {
            circle.addEventListener('click', function() {
                document.querySelectorAll('#addBookingModal .color-circle').forEach(c => c.classList.remove('selected-color'));
                this.classList.add('selected-color');
                document.getElementById('add-color').value = this.dataset.color === 'purple-event' ? 'purple-event' : this.dataset.color;
            });
        });

        // Save new booking
        document.getElementById('saveNewBooking').addEventListener('click', () => {
            const title = document.getElementById('add-title').value;
            const description = document.getElementById('add-description').value;
            const start = document.getElementById('add-start-datetime').value;
            const end = document.getElementById('add-end-datetime').value;
            const customerName = document.getElementById('add-customer').value;
            const colorClass = document.getElementById('add-color').value;

            if (title && start && end && customerName) {
                calendar.addEvent({
                    title: title,
                    start: start,
                    end: end,
                    className: [colorClass, 'text-white', 'p-1', 'rounded'],
                    extendedProps: {
                        description: description,
                        customerName: customerName
                    }
                });
                $('#addBookingModal').modal('hide');
                Swal.fire('Created!', 'New booking has been added.', 'success');
                console.log('New booking created:', { title, description, start, end, customerName, colorClass });
                // In a real application, you would send this data to your server.
            } else {
                Swal.fire('Error!', 'Please fill in all required fields.', 'error');
            }
        });

        // Color selection for edit modal
        document.querySelectorAll('#editBookingModal .color-circle').forEach(circle => {
            circle.addEventListener('click', function() {
                document.querySelectorAll('#editBookingModal .color-circle').forEach(c => c.classList.remove('selected-color'));
                this.classList.add('selected-color');
                document.getElementById('edit-color').value = this.dataset.color === 'purple-event' ? 'purple-event' : this.dataset.color;
            });
        });

        // Update booking
        document.getElementById('updateBooking').addEventListener('click', () => {
            const id = document.getElementById('edit-booking-id').value;
            const title = document.getElementById('edit-title').value;
            const description = document.getElementById('edit-description').value;
            const start = document.getElementById('edit-start-datetime').value;
            const end = document.getElementById('edit-end-datetime').value;
            const customerName = document.getElementById('edit-customer').value;
            const colorClass = document.getElementById('edit-color').value;

            const event = calendar.getEventById(id);
            if (event) {
                event.setProp('title', title);
                event.setStart(start);
                event.setEnd(end);
                event.setExtendedProp('description', description);
                event.setExtendedProp('customerName', customerName);
                event.setProp('className', [colorClass, 'text-white', 'p-1', 'rounded']);
                $('#editBookingModal').modal('hide');
                Swal.fire('Updated!', `Booking: ${title} has been updated.`, 'success');
                console.log('Updated Booking:', { id, title, description, start, end, customerName, colorClass });
                // In a real application, you would send the updated data to your server.
            } else {
                Swal.fire('Error!', 'Could not find the event to update.', 'error');
            }
        });

        // Delete booking
        document.getElementById('deleteBooking').addEventListener('click', () => {
            const id = document.getElementById('edit-booking-id').value;
            const event = calendar.getEventById(id);

            if (event) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: `You are about to delete booking: ${event.title}`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.remove();
                        $('#editBookingModal').modal('hide');
                        Swal.fire('Deleted!', `Booking: ${event.title} has been deleted.`, 'success');
                        console.log('Deleted Booking ID:', id);
                        // In a real application, you would send the ID to your server for deletion.
                    }
                });
            } else {
                Swal.fire('Error!', 'Could not find the event to delete.', 'error');
            }
        });

        // Helper function to format datetime for datetime-local input
        function formatDateTimeLocal(date) {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            const hour = String(date.getHours()).padStart(2, '0');
            const minute = String(date.getMinutes()).padStart(2, '0');
            return `${year}-${month}-${day}T${hour}:${minute}`;
        }
    });
</script>

<script src="js/js1.js"></script>
<script src="js/js2.js"></script>
<script src="js/js3.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>