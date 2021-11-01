<?php 

    require_once('functions/db.php');
    $con=new database();
    session_start();
    if(empty($_SESSION['username']))
    {
        header('location:login.php');
    }
  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap5/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="bootstrap5/navbar.css" rel="stylesheet">
    </head>
    <body>
        <main>

            <nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="First navbar example">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarsExample01">
                        <ul class="navbar-nav me-auto mb-2">
                            <li class="nav-item">
                                <a class="nav-link active" href="add-student.php">Add Students</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php">Student List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        
            <div class="container">
                <div class="row mb-3">
                    <div class="col-md-12 text-center mt-5">

                        <div class="form-signin">

                            <h1 class="h3 mb-3 fw-normal">Add Student</h1>
                            <hr><br>

                            <form method="post">
                                <div class="form-floating mb-3">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="fname" required>
                                </div>
                                <div class="form-floating mb-3">
                                    <label>Middle Name</label>
                                    <input type="text" class="form-control" name="mname" required>
                                </div>
                                <div class="form-floating mb-3">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="lname" required>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="submit" class="btn btn-success btn-lg" name="save" value="Save">
                                </div>
                            </form>

                            
                        </div>
                        
                    </div>
                </div>
            </div>

        </main>

        <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>

    </body>
</html>

<?php 
    if(isset($_POST['save']))
    {
        $fname=$_POST['fname'];
        $mname=$_POST['mname'];
        $lname=$_POST['lname'];
        if($con->save($fname,$mname,$lname))
        {
            header('location:index.php');
        }else{
            echo "error";
        }

    }

?>