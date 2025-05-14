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
            max-width: 900px;
            margin: 30px auto;
            padding: 30px;
            background-color: #fff; /* White background */
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); /* More pronounced shadow */
            border: 1px solid #eee;
        }
        .form-title {
            color: #333;
            margin-bottom: 30px; /* Increased bottom margin */
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px; /* Space between icon and text */
        }
        .form-title i {
            font-size: 1.8rem; /* Larger icon */
            color: #007bff; /* Primary color for icon */
        }
        .form-group {
            margin-bottom: 25px; /* Increased bottom margin */
        }
        .form-group label {
            display: block;
            margin-bottom: 10px; /* Increased bottom margin */
            font-weight: 600;
            color: #555;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 14px; /* Increased padding */
            border: 1px solid #ccc;
            border-radius: 8px; /* More rounded input fields */
            font-size: 1rem;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
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
            padding: 14px 28px; /* Increased padding for button */
            border-radius: 8px; /* Rounded button */
            cursor: pointer;
            font-size: 1.1rem;
            width: 100%;
            transition: background-color 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 123, 255, 0.2); /* Subtle button shadow */
        }
        .btn-primary:hover {
            background-color: #0056b3;
            box-shadow: 0 3px 6px rgba(0, 86, 179, 0.3); /* Slightly more pronounced hover shadow */
        }
        .btn-primary:disabled {
            background-color: #007bff;
            opacity: 0.7;
            cursor: not-allowed;
            box-shadow: none;
        }
        .alert {
            margin-top: 25px; /* Increased top margin */
            padding: 18px; /* Increased padding for alert */
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500; /* Slightly bolder alert text */
        }
        .alert-danger {
            background-color: #fdecea;
            color: #a94442;
            border: 1px solid #e74c3c;
        }
        .alert-success {
            background-color: #e6ffe9;
            color: #3c763d;
            border: 1px solid #2ecc71;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .form-col {
            flex: 0 0 50%;
            max-width: 50%;
            padding-right: 15px;
            padding-left: 15px;
            box-sizing: border-box;
        }

        @media (max-width: 768px) {
            .form-col {
                flex: 0 0 100%;
                max-width: 100%;
            }
            .form-container {
                margin-top: 20px;
                padding: 25px;
            }
            .form-title {
                font-size: 1.5rem; /* Adjust title size on smaller screens */
                gap: 8px;
            }
            .form-title i {
                font-size: 1.5rem;
            }
        }

        /* Interactive placeholder effect */
        .form-group input::placeholder, .form-group select::placeholder {
            color: #aaa;
            opacity: 1;
        }

        .form-group input:-ms-input-placeholder, .form-group select:-ms-input-placeholder {
            color: #aaa;
        }

        .form-group input::-ms-input-placeholder, .form-group select::-ms-input-placeholder {
            color: #aaa;
        }

        .form-group input:focus::placeholder, .form-group select:focus::placeholder {
            color: transparent;
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
                                    <h2 class="form-title"><i class="bi bi-person-plus-fill"></i> Enter Role Details</h2>
                                    <form id="create-role-form">
                                        <div class="form-row">
                                            <div class="form-col">
                                                <div class="form-group">
                                                    <label for="firstName">First Name</label>
                                                    <input type="text" id="firstName" name="firstName" placeholder="Your first name" required>
                                                </div>
                                            </div>
                                            <div class="form-col">
                                                <div class="form-group">
                                                    <label for="lastName">Last Name</label>
                                                    <input type="text" id="lastName" name="lastName" placeholder="Your last name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-col">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" id="email" name="email" placeholder="Your email address" required>
                                                </div>
                                            </div>
                                            <div class="form-col">
                                                <div class="form-group">
                                                    <label for="phone">Phone Number</label>
                                                    <input type="tel" id="phone" name="phone" placeholder="Your phone number" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-col">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" id="address" name="address" placeholder="Your current address">
                                                </div>
                                            </div>
                                            <div class="form-col">
                                                <div class="form-group">
                                                    <label for="roleName">Role Name</label>
                                                    <input type="text" id="roleName" name="roleName" placeholder="Name of the role" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-col">
                                                <div class="form-group">
                                                    <label for="role">Role</label>
                                                    <select id="role" name="role">
                                                        <option value="" disabled selected>Select a role</option>
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
                                                    <input type="text" id="description" name="description" placeholder="Brief description of the role">
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
                        title: 'Oops...',
                        text: 'Please enter first name.',
                    });
                    createRoleButton.prop('disabled', false);
                    return;
                }
                if (!lastName) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please enter last name.',
                    });
                    createRoleButton.prop('disabled', false);
                    return;
                }

                if (!email) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please enter email.',
                    });
                    createRoleButton.prop('disabled', false);
                    return;
                }
                if (!phone) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please enter phone number.',
                    });
                    createRoleButton.prop('disabled', false);
                    return;
                }

                if (!roleName) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please enter a role name.',
                    });
                    createRoleButton.prop('disabled', false);
                    return;
                }

                if (!role) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
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
                            title: 'Success!',
                            text: `Role "${role}" created successfully!`,
                            showConfirmButton: false,
                            timer: 1500
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