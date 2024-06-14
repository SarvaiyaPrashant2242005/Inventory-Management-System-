<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'Admin_Sidebar.php'; ?>
<?php include 'NAVBAR.php'; ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .main-content {
            padding: 20px;
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .user-table th, .user-table td {
            border: 1px solid #dee2e6;
            padding: 8px;
        }

        .user-table th {
            background-color: #343a40;
            color: #ffffff;
        }

        .user-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .user-table tr:hover {
            background-color: #ddd;
        }

        .remove-button {
            background-color: #dc3545;
            color: #ffffff;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        .remove-button:hover {
            background-color: #c82333;
        }
        .main-content {
    padding: 20px;
    margin-left: 200px; /* Width of the sidebar */
}

@media (max-width: 768px) {
    .main-content {
        margin-left: 0; /* Reset margin for smaller screens */
    }
}

    </style>
    
</head>
<body>

    <div class="content-container">
        <div class="main-content">
            <?php
            // Database connection
            $host = "localhost";
            $user = "root";
            $password = "";
            $database_name = "login";

            $data = mysqli_connect($host, $user, $password, $database_name);
            if ($data === false) {
                die("Connection error: " . mysqli_connect_error());
            }

            // Check if the remove user button is clicked
            if (isset($_POST['remove_user'])) {
                $username_to_remove = $_POST['username_to_remove'];

                // Execute DELETE query to remove the user
                $sql_delete = "DELETE FROM login WHERE Username = '$username_to_remove'";
                if (mysqli_query($data, $sql_delete)) {
                    echo "<script>alert('User $username_to_remove removed successfully.');</script>";
                } else {
                    echo "Error removing user: " . mysqli_error($data);
                }
            }

            // Query to retrieve user information with Usertype as 'user'
            $sql = "SELECT * FROM login WHERE Usertype = 'user'";
            $result = mysqli_query($data, $sql);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                echo "<table class='user-table'>";
                echo "<tr><th>Username</th><th>Email</th><th>Department</th><th>Contact</th><th>Action</th></tr>";
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["Username"] . "</td>";
                    echo "<td>" . $row["Email"] . "</td>";
                    echo "<td>" . $row["Department"] . "</td>";
                    echo "<td>" . $row['Phone_No'] . "</td>";
                    echo "<td>";
                    echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' onsubmit='return confirm(\"Are you sure you want to remove this user?\")'>";
                    echo "<input type='hidden' name='username_to_remove' value='" . $row["Username"] . "'>";
                    echo "<input type='submit' name='remove_user' value='Remove' class='remove-button'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No users found.";
            }

            mysqli_close($data);
            ?>
        </div>
    </div>
</body>
</html>
