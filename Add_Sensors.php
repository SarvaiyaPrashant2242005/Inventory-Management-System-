<?php
require_once('Sensor_DB.php');

$componet = '';
$quantities = '';       
$sel_id = -1;

if (isset($_REQUEST['btnEdit'])) {
    $sql = "SELECT * FROM Sensors WHERE id = " . $_REQUEST['btnEdit'];
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $sel_id = $_REQUEST['btnEdit'];
            while ($row = mysqli_fetch_array($result)) {
                $componet = $row['componet'];
                $quantities = $row['quantities'];
                
            }
        }
    }
}

if (isset($_REQUEST['btnDelete'])) {
    $delete_id = $_REQUEST['btnDelete'];
    $sql = "DELETE FROM Sensors WHERE id = $delete_id";
    if (mysqli_query($link, $sql)) {
        echo "Blog entry deleted successfully!";
    } else {
        echo "Error deleting blog entry: " . mysqli_error($link);
    }
}

// Check if form is submitted
if (isset($_POST['btnSave'])) {
    // Loop through the submitted quantities and update the database
    foreach ($_POST['quantities'] as $componentId => $quantity) {
        // Validate input to prevent SQL injection
        $componentId = mysqli_real_escape_string($link, $componentId);
        $quantity = mysqli_real_escape_string($link, $quantity);
        
        // Update the quantities in the database
        $sql = "UPDATE Sensors SET quantities = '$quantity' WHERE id = $componentId";
        if (!mysqli_query($link, $sql)) {
            echo "Error updating quantity for component with ID $componentId: " . mysqli_error($link);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_Microcontroller</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="">
                <input type="text" name="txtcomponet" placeholder="Enter componet name" required value="<?php echo $componet ?>">
                <input type="text" name="txtquantities" placeholder="Enter quantities " required value="<?php echo $quantities ?>">
                <input type="hidden" name="selid" value="<?php echo $sel_id ?>">
                <input type="submit" value="<?php echo $sel_id == -1 ? 'Add' : 'Update'; ?> " name="btnAdd" class="btn btn-primary">
            </form>

            <?php

            if (isset($_REQUEST['btnAdd'])) {
                $componet = $_REQUEST['txtcomponet'];
                $quantities = $_REQUEST['txtquantities'];
                
                if ($sel_id == -1) {
                    $sql = "INSERT INTO Sensors (componet, quantities) VALUES ('$componet', '$quantities')";
                } else {
                    $sql  = "UPDATE Sensors SET componet = '$componet', quantities = '$quantities' WHERE id = $sel_id";
                }

                if (mysqli_query($link, $sql)) {
                    echo "Blog ";
                    echo $sel_id == -1 ? "added" : "updated";
                    echo " successfully!";
                } else {
                    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
                }
            }

            $sql = "SELECT * FROM Sensors";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo '<br>';
                    echo '<form method="post" action="">';
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
                                <form method="post">
                                    <button class="btn btn-warning" type="submit" name="btnEdit" value="<?php echo $row['id']; ?>">
                                        <span><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                    </button>
                                    <button class="btn btn-danger" type="submit" name="btnDelete" value="<?php echo $row['id']; ?>">
                                        <span><i class="fa fa-trash" aria-hidden="true"></i></span>
                                    </button>
                                    <!-- Add checkbox here -->
                                    <input type="checkbox" name="checkbox[]" value="<?php echo $row['id']; ?>">
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    echo '</tbody></table>';
                    // Add Next button here
                    echo '<button type="button" id="btnNext" class="btn btn-primary">Next</button>';
                    // Add quantity input fields here
                    echo '<div id="quantityInput"></div>';
                    echo '<button type="submit" name="btnSave" id="btnSave" class="btn btn-primary" style="display:none;">Save</button>';
                    echo '</form>';
                } else {
                    echo "No blogs found.";
                }
            }

            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Script to show quantity input fields when Next button is clicked
    document.addEventListener('DOMContentLoaded', function() {
        const btnNext = document.getElementById('btnNext');
        const btnSave = document.getElementById('btnSave');
        const quantityInput = document.getElementById('quantityInput');
        btnNext.addEventListener('click', function() {
            const checkboxes = document.querySelectorAll('input[name="checkbox[]"]:checked');
            if (checkboxes.length === 0) {
                alert('Please select at least one component.');
            } else {
                quantityInput.innerHTML = ''; // Clear previous input fields
                checkboxes.forEach((checkbox) => {
                    const componentId = checkbox.value;
                    const label = document.createElement('label');
                    label.textContent = 'Enter quantity for component ' + componentId + ': ';
                    const input = document.createElement('input');
                    input.type = 'text';
                    input.name = 'quantities[' + componentId + ']'; // Use component ID as input name
                    input.required = true;
                    quantityInput.appendChild(label);
                    quantityInput.appendChild(input);
                    quantityInput.appendChild(document.createElement('br'));
                });
                btnSave.style.display = 'block'; // Show the Save button
            }
        });

        btnSave.addEventListener('click', function() {
            // Submit the form when Save button is clicked
            document.querySelector('form').submit();
        });
    });
</script>

</body>
</html>
