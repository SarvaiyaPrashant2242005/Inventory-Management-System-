<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
</head>
<body>
    <h2>Add User</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        
        <label for="usertype">User Type:</label>
        <select name="usertype">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select><br><br>
        
        <input type="submit" name="add_user" value="Add User">
    </form>
</body>
</html>

<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database_name = "user";

    $data = mysqli_connect($host, $user, $password, $database_name);
    if ($data === false) {
        die("Connection error");
    }

    // Check if form is submitted for adding a user
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_user'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $usertype = $_POST['usertype']; // Assuming you have a select dropdown for user type

        // Use prepared statement to prevent SQL injection
        $sql = "INSERT INTO login (Username, Password, Usertype) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($data, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $username, $password, $usertype);
        
        // Execute the statement
        if(mysqli_stmt_execute($stmt)) {
            echo "User added successfully.";
        } else {
            echo "Error adding user: " . mysqli_error($data);
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($data);
?>
