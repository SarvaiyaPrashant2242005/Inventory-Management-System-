<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Component List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            require_once('DB.php');

            $sql = "SELECT * FROM my_project";
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
                            <td><?php echo $sr++; ?></td>
                            <td><?php echo $row['componet']; ?></td>
                            <td><?php echo $row['quantities']; ?></td>
                            <td>
                                <a href="request_page.php?component=<?php echo urlencode($row['componet']); ?>" class="btn btn-primary">Request</a>
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

</body>
</html>