<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Page</title>
</head>
<body>

<?php
// Retrieve the component name from the query parameter
$componentName = isset($_GET['component']) ? $_GET['component'] : 'Unknown';

// Display the component name
echo "<h1>Requested Component: $componentName</h1>";
?>

</body>
</html>
