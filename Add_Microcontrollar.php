<?php include 'Admin_Sidebar.php'; ?>
<?php include 'NAVBAR.php'; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"> <!-- Add Animate.css -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<?php
require_once('Microcontrollars_DB.php');
$componet = '';
$quantities  = '';
$sel_id = -1;
if (isset($_REQUEST['btnEdit'])) {
    $sql = "select * from microcontrollars where id = " . $_REQUEST['btnEdit'];
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $sel_id = $_REQUEST['btnEdit'];
            while ($row = mysqli_fetch_array($result)) {
                $componet = $row['componet'];
                $quantities  = $row['quantities'];   
            }
        }
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="">
                <input type="text" name="txtcomponet" placeholder="Enter component" required value="<?php echo $componet ?>" class="animate__animated animate__fadeIn">
                <input type="text" name="txtquantities" placeholder="Enter quantities " required value="<?php echo $quantities ?>" class="animate__animated animate__fadeIn">
               
                <input type="hidden" name="selid" value="<?php echo $sel_id ?>">
                <input type="submit" value="<?php echo $sel_id == -1 ? 'Add' : 'Update'; ?> " name="btnAdd" class="btn btn-primary animate__animated animate__fadeIn">

            </form>
            <?php

            if (isset($_REQUEST['btnAdd'])) {
                $componet = $_REQUEST['txtcomponet'];
                $quantities  = $_REQUEST['txtquantities'];
               
                if ($_REQUEST['selid'] == -1)
                    $sql = "insert into microcontrollars  (componet,quantities) values  ('$componet', '$quantities')";
                else
                    $sql  = "update microcontrollars set componet = '$componet', quantities='$quantities' where id = " . $_REQUEST['selid'];
                if (mysqli_query($link, $sql)) {
                    echo '<div class="alert alert-success animate__animated animate__fadeIn" role="alert">Added Successfully !!!</div>';
                } else {
                    echo '<div class="alert alert-danger animate__animated animate__fadeIn" role="alert">ERROR: Could not able to execute $sql. ' . mysqli_error($link) . '</div>';
                }
            }


            if (isset($_REQUEST['btnDelete'])) {
                $sql  = "DELETE FROM microcontrollars WHERE id = " . $_REQUEST['selid'];
                if (mysqli_query($link, $sql)) {
                    echo '<div class="alert alert-success animate__animated animate__fadeIn" role="alert">Deleted successfully!</div>';
                } else {
                    echo '<div class="alert alert-danger animate__animated animate__fadeIn" role="alert">ERROR: Could not able to execute $sql. ' . mysqli_error($link) . '</div>';
                }
            }

            // Code to retrieve and display all blogs
            $sql = "select * from microcontrollars";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo '<br/>';
                    echo '<form method="post">';
                    echo '<table class="table animate__animated animate__fadeIn"><thead class="thead-dark">
            <tr>
                <th>Sr. No.</th>
                <th>Component</th>
                <th>Quantities</th>
                <th>Action</th>
            </tr></thead>
            <tbody>';

                    $sr = 1;
                    while ($row = mysqli_fetch_array($result)) {
            ?>
                        <tr>
                            <td><?php echo $sr; $sr++; ?></td>
                            <td><?php echo $row['componet']; ?></td>
                            <td><?php echo $row['quantities']; ?></td>
                            <td>
                                <button class="btn btn-warning" type="submit" name="btnEdit" value="<?php echo $row['id']; ?>">
                                    <span><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                </button>
                                <button class="btn btn-danger" type="submit" name="btnDelete" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="selid" value="<?php echo $row['id']; ?>">
                                    <span><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                </button>
                            </td>
                        </tr>
                    <?php
                    } ?>
                    </tbody>
                    </table>
                    </form>
            <?php
                } else {
                    echo '<div class="alert alert-info animate__animated animate__fadeIn" role="alert">No records found.</div>';
                }
            }
            ?>
        </div>
    </div>
</div>
