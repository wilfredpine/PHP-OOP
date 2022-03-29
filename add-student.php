<?php

require_once('classes/database.php');
$con = new database();
session_start();
if (empty($_SESSION['username'])) {
    header('location:login.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php'); ?>

<body>
    <main>

        <?php include('includes/navbar.php'); ?>

        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12 mt-5">

                    <div class="col-md-4 form-signin">

                        <h1 class="h3 mb-3 fw-normal">Add Student</h1>
                        <hr><br>


                        <?php
                            if (isset($_POST['save'])) {
                                $fname = $_POST['fname'];
                                $mname = $_POST['mname'];
                                $lname = $_POST['lname'];
                                if ($con->save($fname, $mname, $lname)) {
                                    header('location:index.php');
                                } else {
                                    echo "error";
                                }
                            }

                        ?>

                        <form method="post">
                            <div class="form-group mb-3">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="fname" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Middle Name</label>
                                <input type="text" class="form-control" name="mname" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="lname" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="submit" class="btn btn-success btn-lg" name="save" value="Save">
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>

    </main>


</body>

</html>