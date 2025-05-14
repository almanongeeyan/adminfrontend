<!DOCTYPE html>
<html lang="zxx" class="js">
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
        .key-metrics {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .metric-card {
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            flex: 1;
            text-align: center;
            min-width: 200px;
            border: 1px solid #ddd;
            transition: 0.3s ease-in-out;
        }
        .metric-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .bookings { background: #f0f4c3; }
        .appointments { background: #e0f7fa; }
        .revenue { background: #fce4ec; }
        .metric-value {
            font-size: 2rem;
            font-weight: bold;
            color: #212121;
        }
        .metric-label {
            color: #555;
            font-size: 1.1rem;
        }
        .calendar-container {
            background: #fff;
            margin-bottom: 20px; /* Adjust margin to separate from metrics */
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* In case event titles are long */
        }
        .month-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }
        #calendar {
            max-width: 100%;
            margin: 0 auto;
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
                                    <div class="metric-value">15</div>
                                    <div class="metric-label">Today's Bookings</div>
                                </div>
                                <div class="metric-card appointments">
                                    <div class="metric-value">32</div>
                                    <div class="metric-label">Upcoming Appointments</div>
                                </div>
                                <div class="metric-card revenue">
                                    <div class="metric-value">₱1,250.00</div>
                                    <div class="metric-label">Revenue</div>
                                </div>
                            </div>

                            <div class="calendar-container">
                                <h4 class="month-title">Calendar</h4>
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
            events: [
                { id: '1', title: 'Formal Booking #1', start: '2025-01-15', className: 'bg-primary text-white p-1 rounded', extendedProps: { description: 'Details for Formal Booking 1', customer: 'Client One', eventStarts: '2025-01-15', eventEnds: '2025-01-15' } },
                { id: '2', title: 'Meeting with Client A', start: '2025-01-20', className: 'bg-info text-white p-1 rounded', extendedProps: { description: 'Discuss project Alpha', customer: 'Client A Corp', eventStarts: '2025-01-20', eventEnds: '2025-01-20' } },
                { id: '3', title: 'Formal Booking #2', start: '2025-02-10', className: 'bg-primary text-white p-1 rounded', extendedProps: { description: 'Details for Formal Booking 2', customer: 'Another Client', eventStarts: '2025-02-10', eventEnds: '2025-02-10' } },
                { id: '4', title: 'Follow-up Appointment', start: '2025-02-22', className: 'bg-success text-white p-1 rounded', extendedProps: { description: 'Follow up on service B', customer: 'Mr. Follow Up', eventStarts: '2025-02-22', eventEnds: '2025-02-22' } },
                { id: '5', title: 'Formal Booking #3', start: '2025-03-05', className: 'bg-primary text-white p-1 rounded', extendedProps: { description: 'Details for Formal Booking 3', customer: 'Third Party', eventStarts: '2025-03-05', eventEnds: '2025-03-05' } },
                { id: '6', title: 'Project Discussion', start: '2025-03-18', className: 'bg-warning text-dark p-1 rounded', extendedProps: { description: 'Final project review', customer: 'Tech Solutions Inc.', eventStarts: '2025-03-18', eventEnds: '2025-03-18' } },
                { id: '7', title: 'Formal Booking #4', start: '2025-04-02', className: 'bg-primary text-white p-1 rounded', extendedProps: { description: 'Details for Formal Booking 4', customer: 'Individual User', eventStarts: '2025-04-02', eventEnds: '2025-04-02' } },
                { id: '8', title: 'Service Appointment', start: '2025-04-12', className: 'bg-danger text-white p-1 rounded', extendedProps: { description: 'Maintenance service call', customer: 'Service Pro Client', eventStarts: '2025-04-12', eventEnds: '2025-04-12' } },
                { id: '9', title: 'Formal Booking #5', start: '2025-05-08', className: 'bg-primary text-white p-1 rounded', extendedProps: { description: 'Details for Formal Booking 5', customer: 'Prime Customer', eventStarts: '2025-05-08', eventEnds: '2025-05-08' } },
                { id: '10', title: 'Client Review', start: '2025-05-19', className: 'bg-info text-white p-1 rounded', extendedProps: { description: 'Review of Q2 performance', customer: 'Key Account Ltd.', eventStarts: '2025-05-19', eventEnds: '2025-05-19' } },
                { id: '11', title: 'Formal Booking #6', start: '2025-06-03', className: 'bg-primary text-white p-1 rounded', extendedProps: { description: 'Details for Formal Booking 6', customer: 'Regular Patron', eventStarts: '2025-06-03', eventEnds: '2025-06-03' } },
                { id: '12', title: 'Consultation Session', start: '2025-06-14', className: 'bg-success text-white p-1 rounded', extendedProps: { description: 'Initial consultation', customer: 'New Inquiry', eventStarts: '2025-06-14', eventEnds: '2025-06-14' } },
                { id: '13', title: 'Formal Booking #7', start: '2025-07-01', className: 'bg-primary text-white p-1 rounded', extendedProps: { description: 'Details for Formal Booking 7', customer: 'Repeat Buyer', eventStarts: '2025-07-01', eventEnds: '2025-07-01' } },
                { id: '14', title: 'Planning Meeting', start: '2025-07-11', className: 'bg-warning text-dark p-1 rounded', extendedProps: { description: 'Strategic planning session', customer: 'Management Team', eventStarts: '2025-07-11', eventEnds: '2025-07-11' } },
                { id: '15', title: 'Formal Booking #8', start: '2025-08-06', className: 'bg-primary text-white p-1 rounded', extendedProps: { description: 'Details for Formal Booking 8', customer: 'Loyal Customer', eventStarts: '2025-08-06', eventEnds: '2025-08-06' } },
                { id: '16', title: 'System Maintenance', start: '2025-08-16', className: 'bg-danger text-white p-1 rounded', extendedProps: { description: 'Scheduled system downtime', customer: 'Internal', eventStarts: '2025-08-16', eventEnds: '2025-08-16' } },
                { id: '17', title: 'Formal Booking #9', start: '2025-09-04', className: 'bg-primary text-white p-1 rounded', extendedProps: { description: 'Details for Formal Booking 9', customer: 'Occasional Visitor', eventStarts: '2025-09-04', eventEnds: '2025-09-04' } }
            ],
            eventClick: function(info) {
                Swal.fire({
                    title: info.event.title,
                    html: `
                        <div>
                            <strong>Booking Information:</strong>
                            <p>Description: ${info.event.extendedProps.description || 'No description'}</p>
                            <p>Customer: ${info.event.extendedProps.customer || 'N/A'}</p>
                            <p>Start Time: ${new Date(info.event.extendedProps.eventStarts).toLocaleDateString()}</p>
                            <p>End Time: ${new Date(info.event.extendedProps.eventEnds).toLocaleDateString()}</p>
                        </div>
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Edit Booking',
                    cancelButtonText: 'Delete Booking',
                    focusConfirm: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Handle Edit Booking action - Show the edit modal (another SweetAlert)
                        Swal.fire({
                            title: 'Edit Event',
                            html: `
                                <label for="edit-title">Event Title</label>
                                <input id="edit-title" class="swal2-input" value="${info.event.title}">
                                <label for="edit-start-date">Event Starts</label>
                                <input type="date" id="edit-start-date" class="swal2-input" value="${info.event.extendedProps.eventStarts}">
                                <label for="edit-end-date">Event Ends</label>
                                <input type="date" id="edit-end-date" class="swal2-input" value="${info.event.extendedProps.eventEnds}">
                                <label for="edit-description">Event Description</label>
                                <textarea id="edit-description" class="swal2-textarea">${info.event.extendedProps.description || ''}</textarea>
                                `,
                            showCancelButton: true,
                            confirmButtonText: 'Update Event',
                            cancelButtonText: 'Discard',
                            preConfirm: () => {
                                return {
                                    title: document.getElementById('edit-title').value,
                                    startDate: document.getElementById('edit-start-date').value,
                                    endDate: document.getElementById('edit-end-date').value,
                                    description: document.getElementById('edit-description').value
                                    // Get other edited values here
                                };
                            }
                        }).then((editResult) => {
                            if (editResult.isConfirmed) {
                                const updatedEventData = editResult.value;
                                // Update the event on the calendar (visual update only for this example)
                                info.event.setProp('title', updatedEventData.title);
                                info.event.setStart(updatedEventData.startDate);
                                info.event.setEnd(updatedEventData.endDate);
                                info.event.setExtendedProp('description', updatedEventData.description);
                                info.event.setExtendedProp('eventStarts', updatedEventData.startDate);
                                info.event.setExtendedProp('eventEnds', updatedEventData.endDate);

                                Swal.fire('Updated!', `Booking ID: ${info.event.id} has been updated.`, 'success');
                                // In a real application, you would make an AJAX call to update the booking in the database.
                                console.log('Updated Booking ID:', info.event.id, updatedEventData);
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // Handle Delete Booking action
                        Swal.fire(
                            'Deleted!',
                            `Booking ID: ${info.event.id} has been deleted.`,
                            'success'
                        );
                        // In a real application, you would make an AJAX call to delete the booking from the database.
                        console.log('Delete Booking ID:', info.event.id);
                        info.event.remove(); // Remove the event from the calendar view
                    }
                });
            }
        });
        calendar.render();
    });
</script>

<script src="js/js1.js"></script>
<script src="js/js2.js"></script>
<script src="js/js3.js"></script>
</body>
</html>