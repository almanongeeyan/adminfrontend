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
    <style>
        .key-metrics {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        .metric-card {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            flex: 1;
            text-align: center;
        }
        .metric-card.bookings {
            background-color: #e9ecef; /* Light gray */
        }
        .metric-card.appointments {
            background-color: #f0f8ff; /* Alice blue */
        }
        .metric-card.revenue {
            background-color: #f5f5dc; /* Beige */
        }
        .metric-value {
            font-size: 1.5rem;
            font-weight: bold;
            color: #364a63;
        }
        .metric-label {
            color: #8094ae;
            font-size: 0.9rem;
            margin-top: 5px;
        }
        .calendar-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            padding: 20px;
            overflow-x: auto; /* Add horizontal scroll */
        }
        .calendar-wrapper {
            display: flex; /* Arrange months in a row */
            gap: 20px;
        }
        .calendar {
            width: auto; /* Adjust width based on content */
            border-collapse: collapse;
            flex-shrink: 0; /* Prevent months from shrinking */
        }
        .calendar th, .calendar td {
            padding: 10px;
            text-align: center;
            border: 1px solid #eee;
            white-space: nowrap; /* Prevent day numbers from wrapping */
            color: #333; /* Default normal color */
            position: relative; /* For booking indicator */
        }
        .calendar th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .calendar td.today {
            background-color: #e7f5ff;
            font-weight: bold;
        }
        .calendar td.past {
            color: #aaa; /* Passive color for past dates */
        }
        .calendar h5.past-month {
            color: #aaa;
        }
        .booked-indicator {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: #007bff; /* Example booking color */
            color: white;
            font-size: 0.7rem;
            padding: 2px 5px;
            border-radius: 3px;
        }
        .booked-indicator.formal {
            background-color: #28a745; /* Different color for formal bookings */
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
                                    <div class="metric-value">
                                        <?php
                                        // Replace with your actual logic to fetch today's bookings count
                                        echo '15';
                                        ?>
                                    </div>
                                    <div class="metric-label">Today's Bookings</div>
                                </div>
                                <div class="metric-card appointments">
                                    <div class="metric-value">
                                        <?php
                                        // Replace with your actual logic to fetch upcoming appointments count
                                        echo '32';
                                        ?>
                                    </div>
                                    <div class="metric-label">Upcoming Appointments</div>
                                </div>
                                <div class="metric-card revenue">
                                    <div class="metric-value">
                                        <?php
                                        // Replace with your actual logic to fetch today's revenue
                                        echo '₱1,250.00';
                                        ?>
                                    </div>
                                    <div class="metric-label">Revenue</div>
                                </div>
                            </div>

                            <div class="calendar-container">
                                <h4>Calendar</h4>
                                <div class="calendar-wrapper">
                                    <?php
                                    // Example booking data (replace with your database fetch)
                                    $bookings = [
                                        '2025-05-15' => ['count' => 2],
                                        '2025-06-05' => ['count' => 1, 'type' => 'formal'],
                                        '2025-06-18' => ['count' => 3],
                                        '2025-07-22' => ['count' => 1, 'type' => 'formal'],
                                        '2025-07-25' => ['count' => 2],
                                    ];

                                    function generateCalendar($year, $bookings) {
                                        $months = [
                                            'January', 'February', 'March', 'April', 'May', 'June',
                                            'July', 'August', 'September', 'October', 'November', 'December'
                                        ];
                                        $currentMonth = date('n');
                                        $currentYear = date('Y');
                                        $today = date('j');

                                        for ($m = 1; $m <= 12; $m++) {
                                            $monthClass = ($year < $currentYear || ($year == $currentYear && $m < $currentMonth)) ? 'past-month' : '';
                                            echo '<div>';
                                            echo '<h5 class="' . $monthClass . '">' . $months[$m - 1] . ' ' . $year . '</h5>';
                                            echo '<table class="calendar">';
                                            echo '<thead><tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr></thead>';
                                            echo '<tbody>';

                                            $firstDayOfMonth = mktime(0, 0, 0, $m, 1, $year);
                                            $daysInMonth = date('t', $firstDayOfMonth);
                                            $date = 1;
                                            $firstDayOfWeek = date('w', $firstDayOfMonth);

                                            echo '<tr>';
                                            for ($i = 0; $i < $firstDayOfWeek; $i++) {
                                                echo '<td></td>';
                                            }
                                            while ($date <= $daysInMonth) {
                                                if ($firstDayOfWeek == 7) {
                                                    echo '</tr><tr>';
                                                    $firstDayOfWeek = 0;
                                                }
                                                $dayClass = '';
                                                if ($year < $currentYear || ($year == $currentYear && $m < $currentMonth) || ($year == $currentYear && $m == $currentMonth && $date < $today)) {
                                                    $dayClass = ' past';
                                                } elseif ($date == $today && $m == $currentMonth && $year == $currentYear) {
                                                    $dayClass = ' today';
                                                }

                                                $currentDateFormatted = sprintf('%04d-%02d-%02d', $year, $m, $date);
                                                $bookingIndicator = '';
                                                if (isset($bookings[$currentDateFormatted])) {
                                                    $bookingIndicator .= '<span class="booked-indicator">';
                                                    if (isset($bookings[$currentDateFormatted]['type']) && $bookings[$currentDateFormatted]['type'] === 'formal') {
                                                        $bookingIndicator .= 'Almost book';
                                                    } else {
                                                        $bookingIndicator .= 'Booked';
                                                    }
                                                    if ($bookings[$currentDateFormatted]['count'] > 1) {
                                                        $bookingIndicator .= ' (' . $bookings[$currentDateFormatted]['count'] . ')';
                                                    }
                                                    $bookingIndicator .= '</span>';
                                                }

                                                echo '<td class="' . ltrim($dayClass) . '">' . $date . $bookingIndicator . '</td>';
                                                $date++;
                                                $firstDayOfWeek++;
                                            }
                                            while ($firstDayOfWeek < 7) {
                                                echo '<td></td>';
                                                $firstDayOfWeek++;
                                            }
                                            echo '</tr>';
                                            echo '</tbody>';
                                            echo '</table>';
                                            echo '</div>';
                                        }
                                    }

                                    generateCalendar(date('Y'), $bookings);
                                    ?>
                                </div>
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
</body>

</html>