<?php
// Include database connection
require_once('Microcontrollars_DB.php');

// Fetch data from the microcontroller table
$sqlMicro = "SELECT * FROM microcontrollars";
$resultMicro = mysqli_query($link, $sqlMicro);

// Initialize arrays to store microcontroller labels and quantities
$microcontroller_labels = [];
$microcontroller_quantities = [];

// Check if there are any rows in the result
if (mysqli_num_rows($resultMicro) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($resultMicro)) {
        // Push microcontroller name and quantity to arrays
        $microcontroller_labels[] = "Microcontroller: " . $row["componet"]; // Add prefix to label
        $microcontroller_quantities[] = $row["quantities"];
    }
}

// Fetch data from the drone table
$sqlDrone = "SELECT * FROM drone";
$resultDrone = mysqli_query($link, $sqlDrone);

// Initialize arrays to store drone labels and quantities
$drone_labels = [];
$drone_quantities = [];

// Check if there are any rows in the result
if (mysqli_num_rows($resultDrone) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($resultDrone)) {
        // Push drone name and quantity to arrays
        $drone_labels[] = "Drone: " . $row["componet"]; // Add prefix to label
        $drone_quantities[] = $row["quantities"];
    }
}

// Fetch data from the request table
$sqlRequest = "SELECT status, COUNT(*) AS count FROM request GROUP BY status";
$resultRequest = mysqli_query($link, $sqlRequest);

// Initialize arrays to store request statuses and quantities
$request_statuses = [];
$request_quantities = [];

// Check if there are any rows in the result
if (mysqli_num_rows($resultRequest) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($resultRequest)) {
        // Push request status and quantity to arrays
        $request_statuses[] = $row["status"];
        $request_quantities[] = $row["count"];
    }
}

// Close database connection
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
    <?php include 'Admin_Sidebar.php'; ?>

    <?php include 'NAVBAR.php'; ?>
    
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Adjust main content styles */
        .main-content {
            padding: 20px;
            width: calc(100% - 200px); /* Take up remaining width */
            animation: fadeIn 1s ease-in-out;
        }

        /* Wrap main content in a container */
        .content-container {
            margin-left: 200px; /* Width of the sidebar */
            display: flex; /* Use flexbox to arrange items in a row */
            flex-wrap: wrap; /* Allow items to wrap to the next line if needed */
            justify-content: space-between; /* Distribute items evenly along the main axis */
        }

        /* Style for chart container */
        .chart-container {
            flex: 1; /* Distribute available space evenly among chart containers */
            margin-right: 20px; /* Add some space between charts */
            max-width: calc(33.33% - 20px); /* Maximum width for each chart */
            animation: zoomIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.5);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
        
<div class="main-content">
    <div class="content-container">
        <!-- Chart.js microcontroller pie chart container -->
        <div class="chart-container">
            <h5>Microcontrollars</h5>
            <canvas id="microcontrollerChart"></canvas>
        </div>
        <!-- Chart.js drone pie chart container -->
        <div class="chart-container">
            <h5>Drones</h5>
            <canvas id="droneChart"></canvas>
        </div>
        <!-- Chart.js request status pie chart container -->
        <div class="chart-container">
            <h5>Requests</h5>
            <canvas id="requestChart"></canvas>
        </div>
    </div>
</div>

<script>
    // JavaScript code to create microcontroller pie chart using Chart.js
    var ctxMicro = document.getElementById('microcontrollerChart').getContext('2d');
    var microcontrollerChart = new Chart(ctxMicro, {
        type: 'pie',
        data: {
            datasets: [{
                label: 'Microcontroller Quantities',
                data: <?php echo json_encode($microcontroller_quantities); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // JavaScript code to create drone pie chart using Chart.js
    var ctxDrone = document.getElementById('droneChart').getContext('2d');
    var droneChart = new Chart(ctxDrone, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($drone_labels); ?>,
            datasets: [{
                label: 'Drone Quantities',
                data: <?php echo json_encode($drone_quantities); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
    // JavaScript code to create request status pie chart using Chart.js
    var ctxRequest = document.getElementById('requestChart').getContext('2d');
    var requestChart = new Chart(ctxRequest, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($request_statuses); ?>,
            datasets: [{
                label: 'Request Statuses',
                data: <?php echo json_encode($request_quantities); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>