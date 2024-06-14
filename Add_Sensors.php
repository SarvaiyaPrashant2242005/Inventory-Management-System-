<?php include 'Admin_Sidebar.php'; ?>
<?php include 'NAVBAR.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<?php
require_once('Sensor_DB.php');
$componet = '';
$quantities  = '';
$sel_id = -1;
if (isset($_REQUEST['btnEdit'])) {
    $sql = "select * from Sensors where id = " . $_REQUEST['btnEdit'];
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
                <input type="text" name="txtcomponet" placeholder="Enter componet" required value="<?php echo $componet ?>">
                <input type="text" name="txtquantities" placeholder="Enter quantities " required value="<?php echo $quantities  ?>">

                <input type="hidden" name="selid" value="<?php echo $sel_id ?>">
                <input type="submit" value="<?php echo $sel_id == -1 ? 'Add' : 'Update'; ?> " name="btnAdd" class="btn btn-primary">
            </form>
            <?php

            if (isset($_REQUEST['btnAdd'])) {
                $componet = $_REQUEST['txtcomponet'];
                $quantities  = $_REQUEST['txtquantities'];

                if ($_REQUEST['selid'] == -1)
                    $sql = "insert into Sensors  (componet,quantities) values  ('$componet', '$quantities ')";
                else
                    $sql  = "update Sensors set componet = '$componet', quantities='$quantities ' where id = " . $_REQUEST['selid'];
                if (mysqli_query($link, $sql)) {
                    echo " update Successfully !!!";
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    echo "Some problem is there!!!";
                }
            }


            if (isset($_REQUEST['btnDelete'])) {
                $sql  = "DELETE FROM Sensors WHERE id = " . $_REQUEST['selid'];
                if (mysqli_query($link, $sql)) {
                    echo " deleted successfully!";
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
            }
            // code to retrive and display all blogs
            $sql = "select * from Sensors";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo '<br/>';
                    echo '<form method="post">';
                    echo '<table class="table"><thead class="thead-dark">
            <tr>
                <th>Sr. No.</th>
                <th>componet</th>
                <th>quantities</th>
                
                <th>Action</th>
            </tr></thead>
            <tbody>';

                    $sr = 1;
                    while ($row = mysqli_fetch_array($result)) {
            ?>
                        <tr>
                            <td><?php echo $sr;
                                $sr++; ?></td>
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
                }
            }
            ?>
        </div>
    </div>
</div>