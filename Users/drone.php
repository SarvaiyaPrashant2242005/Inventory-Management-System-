<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="mainpage.css">
    <?php include 'NAVBAR.php'; ?>
    <?php include 'USER_SIDEBAR.php'; ?>
        <style>body{
          background-image: url("11.jpg");
          background-size: cover;}
          .table {
    margin-top: 20px;
    background-color: rgba(255, 255, 255, 0.877); /* Updated background color */
    border-radius: 10px;
    overflow: hidden;
    color: #333; /* Ensure text color is readable */
}</style>

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                require_once('drone_DB.php');

                $sql = "SELECT * FROM drone";
                if ($result = mysqli_query($link, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        echo '<br>';
                        echo '<table class="table"><thead class="thead-dark">
                            <tr>
                                <th>Sr. No.</th>
                                <th>Component</th>
                                <th>Quantities</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>';

                        $sr = 1;
                        while ($row = mysqli_fetch_array($result)) {
                ?>
                            <tr>
                                <td><?php  echo $sr++; ?></td>
                                <td><?php echo $row['componet']; ?></td>
                                <td><?php echo $row['quantities']; ?></td>
                                <td>
                                    <button class="btn btn-primary request-btn" data-component="<?php echo urlencode($row['componet']); ?>">Request</button>
                                </td>
                            </tr>
                <?php
                        }
                        echo '</tbody></table>';
                    } else {
                        echo "No components found.";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    var requestButtons = document.querySelectorAll('.request-btn');
    requestButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var component = button.getAttribute('data-component');
            var quantity = prompt('Enter quantity for ' + component + ':');
            if (quantity !== null && quantity.trim() !== '') {
                // Send AJAX request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'request_handler.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Request successful
                            alert(xhr.responseText);
                        } else {
                            // Error handling
                            alert('Error: ' + xhr.statusText);
                        }
                    }
                };
                xhr.send('component_name=' + encodeURIComponent(component) + '&quantity=' + encodeURIComponent(quantity));
            } else {
                // Quantity not entered, handle accordingly
                alert('Please enter a valid quantity.');
            }
        });
    });
});
</script>
</body>
</html>
