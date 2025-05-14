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
            justify-content: space-around; /* Distribute items evenly */
            flex-wrap: wrap; /* Allow items to wrap on smaller screens */
        }
        .metric-card {
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            flex: 1;
            text-align: center;
            min-width: 200px; /* Ensure cards have a minimum width */
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            border: 1px solid #e0e0e0;
        }
        .metric-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .metric-card.bookings {
            background-color: #f0f4c3; /* Light Yellow */
        }
        .metric-card.appointments {
            background-color: #e0f7fa; /* Light Cyan */
        }
        .metric-card.revenue {
            background-color: #fce4ec; /* Light Pink */
        }
        .metric-value {
            font-size: 2.2rem;
            font-weight: bold;
            color: #212121;
            margin-bottom: 10px;
        }
        .metric-label {
            color: #666;
            font-size: 1.1rem;
        }
        .calendar-container {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 25px;
            overflow-x: auto;
        }
        .calendar-wrapper {
            display: flex;
            gap: 30px;
            width: fit-content;
        }
        .calendar {
            width: auto;
            border-collapse: separate; /* Use separate borders for spacing */
            border-spacing: 8px; /* Add spacing between cells */
            flex-shrink: 0;
            background-color: #fff; /* Ensure calendar background is white */
            border-radius: 12px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.05);
        }
        .calendar th, .calendar td {
            padding: 14px;
            text-align: center;
            border: 1px solid #eee;
            white-space: nowrap;
            color: #555;
            font-size: 1.1rem;
            border-radius: 8px; /* Rounded corners for cells */
            transition: background-color 0.2s ease;
        }
        .calendar th {
            background-color: #4CAF50; /* Green Header */
            font-weight: bold;
            color: white;
            border-color: #4CAF50;
        }
        .calendar td {
            background-color: #f8f8f8;
        }
        .calendar td:hover {
            background-color: #f0f0f0;
            cursor: pointer;
        }
        .calendar td.today {
            background-color: #ffe082; /* Light Orange for Today */
            font-weight: bold;
            color: #212121;
        }
        .calendar td.past {
            color: #aaa;
            background-color: #f8f8f8;
        }
        .calendar h5.past-month {
            color: #aaa;
        }
        .booked-indicator {
            position: relative;
            top: 8px;
            display: block;
            background-color: #e65100; /* Deep Orange */
            color: white;
            font-size: 0.8rem;
            padding: 4px 8px;
            border-radius: 12px; /* Fully rounded corners */
            text-align: center;
            margin-top: 4px;
        }
        .booked-indicator.formal {
            background-color: #1a237e; /* Very Dark Blue */
        }

         .month-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c3e50;
            text-align: center;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 2px;
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
                                            echo '<h5 class="month-title ' . $monthClass . '">' . $months[$m - 1] . ' ' . $year . '</h5>';
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
