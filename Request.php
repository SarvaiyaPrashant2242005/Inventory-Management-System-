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
        h1{
            justify-content: center;
        }
        .main-content {
            padding-left: 50px; /* Width of the sidebar + additional padding */
            padding-top: 5px; /* Optional: Add padding on top */
        }

        /* Container for main content */
        .content-container {
            margin-left: 200px; /* Width of the sidebar */
        }
    </style>
    <?php
    // Start session

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
                                echo "<td>" . $row['request_date']."</td>";
                                echo "<td>" . ($row["status"] ?? 'Pending') . "</td>"; // Display status, default to "Pending"
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No requests found</td></tr>";
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
