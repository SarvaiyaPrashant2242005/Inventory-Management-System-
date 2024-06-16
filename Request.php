<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
    <?php include 'NAVBAR.php'; ?>
    <?php include 'USER_SIDEBAR.php'; ?>
    <style>
        body{
            background-image: url("11.jpg");
            background-size: cover;
        }
        h1{
            text-align: center;
        }
        .main-content {
            padding-left: 50px; /* Width of the sidebar + additional padding */
            padding-top: 5px; /* Optional: Add padding on top */
        }

        /* Container for main content */
        .content-container {
            margin-left: 200px; /* Width of the sidebar */
        }

        /* Custom styles for status icons */
        .status {
            font-size: 1.2em;
            padding: 0.3em 0.5em;
            border-radius: 5px;
        }

        .status-approved {
            color: green;
        }

        .status-rejected {
            color: red;
        }

        .status-returned {
            color: blue;
        }
    </style>
    <?php
    // Start session
    // session_start();

    // Check if user is logged in
    if (!isset($_SESSION['username'])) {
        // Redirect to login page
        header("Location: login_page.php");
        exit();
    }

    // Include database connection
    require_once('Microcontrollars_DB.php');

    // Retrieve the username of the logged-in user
    $username = $_SESSION['username'];

    ?>
</head>
<body>
    <div class="main-content">
        <div class='content-container'>
            <div class="container mt-5">
                <h1>Requested Components</h1>
                <br>
                <br>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Component</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Status</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Select data from the request table for the logged-in user
                        $sql = "SELECT * FROM request WHERE account_holder_name = '$username'";
                        $result = mysqli_query($link, $sql);

                        // Check if there are any rows in the result
                        if (mysqli_num_rows($result) > 0) {
                            // Output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row["account_holder_name"] . "</td>";
                                echo "<td>" . $row["component_name"] . "</td>";
                                echo "<td>" . $row["quantity"] . "</td>";
                                echo "<td>" . $row['request_date'] . "</td>";
                                echo "<td>";
                                if ($row['status'] == 'Approved') {
                                    echo "<span class='status status-approved'><i class='fas fa-check-circle'></i> Approved</span>";
                                } elseif ($row['status'] == 'Rejected') {
                                    echo "<span class='status status-rejected'><i class='fas fa-times-circle'></i> Rejected</span>";
                                } elseif ($row['status'] == 'Returned') {
                                    echo "<span class='status status-returned'><i class='fas fa-undo'></i> Returned</span>";
                                } else {
                                    echo "<span class='status'>Pending</span>";
                                }
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No requests found</td></tr>";
                        }

                        // Close database connection
                        mysqli_close($link);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
