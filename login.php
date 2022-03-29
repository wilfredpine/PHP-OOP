<?php

require_once('classes/database.php');

$con = new database();
session_start();

if (!empty($_SESSION['username'])) {
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php'); ?>

<body>
    <main>

        <!-- topbar -->
        <nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="First navbar example">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarsExample01">
                    <ul class="navbar-nav me-auto mb-2">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">Create Account</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12 mt-5">

                    <div class="col-md-4 form-signin">

                        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>



                        <?php
                            if (isset($_POST['login'])) {
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $result = $con->check($username, $password);
                                if ($result) {
                                    if ($result['username'] == $_POST['username'] && $result['password'] == $_POST['password']) {
                                        $_SESSION['username'] = $result['username'];
                                        header('location:index.php');
                                    } else {
                                        echo "error";
                                    }
                                } else {
                                    echo "error";
                                }
                            }
                        ?>


                        <form method="post">

                            <div class="form-group mb-3">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <input type="submit" class="btn btn-success btn-lg" value="Log In" name="login">
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>

    </main>

</body>

</html>