<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Roles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/design.css" />
    <link id="skin-default" rel="stylesheet" href="../assets/css/themee1e3.css?ver=3.2.4" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <style>
        .form-container {
            max-width: 800px; /* Increased max-width for two columns */
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        .form-group input:focus, .form-group select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-primary:disabled {
            background-color: #007bff;
            opacity: 0.6;
            cursor: not-allowed;
        }
        .alert {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            font-size: 0.9rem;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        /* Added to align the title to the left */
        .nk-block-head-content {
            display: flex;
            justify-content: space-between; /* Pushes title to the left */
            align-items: center;
        }

        .page-title {
            margin-right: auto; /* Ensures title goes to the far left */
        }

        /* Added for two-column layout */
        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -10px;
            margin-left: -10px;
        }

        .form-col {
            flex: 0 0 50%; /* Each column takes up 50% of the width */
            max-width: 50%;
            padding-right: 10px;
            padding-left: 10px;
            box-sizing: border-box; /* Include padding in element's total width and height */
        }
        /*Added media query for screens smaller than 768px*/
        @media (max-width: 768px) {
            .form-col {
                flex: 0 0 100%;
                max-width: 100%;
            }
            .form-container{
                max-width: 400px;
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
                                        <h3 class="nk-block-title page-title">Create Role</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="form-container">
                                    <form id="create-role-form">
                                        <div class="form-row">
                                            <div class="form-col">
                                                <div class="form-group">
                                                    <label for="firstName">First Name</label>
                                                    <input type="text" id="firstName" name="firstName" placeholder="Enter first name" required>
                                                </div>
                                            </div>
                                            <div class="form-col">
                                                <div class="form-group">
                                                    <label for="lastName">Last Name</label>
                                                    <input type="text" id="lastName" name="lastName" placeholder="Enter last name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-col">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" id="email" name="email" placeholder="Enter email" required>
                                                </div>
                                            </div>
                                            <div class="form-col">
                                                <div class="form-group">
                                                    <label for="phone">Phone Number</label>
                                                    <input type="tel" id="phone" name="phone" placeholder="Enter phone number" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-col">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" id="address" name="address" placeholder="Enter address">
                                                </div>
                                            </div>
                                            <div class="form-col">
                                                <div class="form-group">
                                                    <label for="roleName">Role Name</label>
                                                    <input type="text" id="roleName" name="roleName" placeholder="Enter role name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-col">
                                                <div class="form-group">
                                                    <label for="role">Role</label>
                                                    <select id="role" name="role">
                                                        <option value="">Select Role</option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Receptionist">Receptionist</option>
                                                        <option value="Staff">Staff</option>
                                                        <option value="Manager">Manager</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-col">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <input type="text" id="description" name="description" placeholder="Enter role description">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" id="create-role-button">Create Role</button>
                                    </form>
                                    <div id="message" class="alert" style="display: none;"></div>
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
            $('#create-role-form').submit(function(event) {
                event.preventDefault();

                const firstName = $('#firstName').val();
                const lastName = $('#lastName').val();
                const email = $('#email').val();
                const phone = $('#phone').val();
                const address = $('#address').val();
                const roleName = $('#roleName').val();
                const role = $('#role').val();
                const description = $('#description').val();
                const messageContainer = $('#message');
                const createRoleButton = $('#create-role-button');

                createRoleButton.prop('disabled', true);
                messageContainer.hide();

                if (!firstName) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Please enter first name.',
                    });
                    createRoleButton.prop('disabled', false);
                    return;
                }
                if (!lastName) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Please enter last name.',
                    });
                    createRoleButton.prop('disabled', false);
                    return;
                }

                if (!email) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Please enter email.',
                    });
                    createRoleButton.prop('disabled', false);
                    return;
                }
                if (!phone) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Please enter phone number.',
                    });
                    createRoleButton.prop('disabled', false);
                    return;
                }

                if (!roleName) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Please enter a role name.',
                    });
                    createRoleButton.prop('disabled', false);
                    return;
                }

                if (!role) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Please select a role.',
                    });
                    createRoleButton.prop('disabled', false);
                    return;
                }

                // Simulate role creation (in a real application, this would be an AJAX request)
                setTimeout(function() {
                    // In a real application, you would check if the role already exists
                    const roleExists = false; // Assume it doesn't for this example

                    if (roleExists) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Role already exists.',
                        });
                        createRoleButton.prop('disabled', false);
                    } else {
                        // Simulate successful role creation
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: `Role "${role}" created successfully!`,
                        }).then(() => {
                            // In a real application, you might redirect to another page
                            $('#firstName').val('');
                            $('#lastName').val('');
                            $('#email').val('');
                            $('#phone').val('');
                            $('#address').val('');
                            $('#roleName').val('');
                            $('#role').val('');
                            $('#description').val('');
                            createRoleButton.prop('disabled', false);
                        });
                    }
                }, 1000); // Simulate a 1-second delay
            });
        });
    </script>
</body>
</html>
