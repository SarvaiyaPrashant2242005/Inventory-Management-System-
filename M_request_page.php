<?php include 'Admin_Sidebar.php'; ?>
<?php include 'NAVBAR.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"> <!-- Add your custom CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome for icons -->
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

        .btn-approve,
        .btn-reject,
        .btn-return {
            padding: 0.2em 0.5em;
            font-size: 0.9em;
        }
    </style>
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
                        // Assuming you have a database connection established already
                        require_once('Microcontrollars_DB.php');

                        // Check if form is submitted
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST['request_id']) && isset($_POST['status'])) {
                                // Update status in the database
                                $request_id = $_POST['request_id'];
                                $status = $_POST['status'];
                                $sql = "UPDATE request SET status = '$status' WHERE id = $request_id";
                                if (mysqli_query($link, $sql)) {
                                    // Successfully updated
                                } else {
                                    echo "Error updating status: " . mysqli_error($link);
                                }
                            }
                        }

                        // Select all data from the request table ordered by request_date in descending order
                        $sql = "SELECT * FROM request ORDER BY request_date DESC";
                        $result = mysqli_query($link, $sql);

                        // Check if there are any rows in the result
                        if (mysqli_num_rows($result) > 0) {
                            // Output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row["account_holder_name"] . "</td>";
                                echo "<td>" . $row["component_name"] . "</td>";
                                echo "<td>" . $row["quantity"] . "</td>";
                                echo "<td>" . $row["request_date"] . "</td>";
                                echo "<td>";
                                if ($row['status'] == 'Approved') {
                                    echo "<span class='status status-approved'><i class='fas fa-check-circle'></i> Approved</span>";
                                    echo "<form method='post' style='display:inline;'>";
                                    echo "<input type='hidden' name='request_id' value='" . $row['id'] . "'>";
                                    echo "<button type='submit' name='status' value='Returned' class='btn btn-info btn-return'><i class='fas fa-undo'></i> Return</button>";
                                    echo "</form>";
                                } elseif ($row['status'] == 'Rejected') {
                                    echo "<span class='status status-rejected'><i class='fas fa-times-circle'></i> Rejected</span>";
                                } elseif ($row['status'] == 'Returned') {
                                    echo "<span class='status status-returned'><i class='fas fa-undo'></i> Returned</span>";
                                } else {
                                    echo "<form method='post'>";
                                    echo "<input type='hidden' name='request_id' value='" . $row['id'] . "'>";
                                    echo "<button type='submit' name='status' value='Approved' class='btn btn-success btn-approve'><i class='fas fa-check'></i> Approve</button>";
                                    echo "<button type='submit' name='status' value='Rejected' class='btn btn-danger btn-reject'><i class='fas fa-times'></i> Reject</button>";
                                    echo "</form>";
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
