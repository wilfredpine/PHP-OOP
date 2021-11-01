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
                                <a class="nav-link" href="add-student.php">Add Students</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Student List</a>
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

                            <h1 class="h3 mb-3 fw-normal">Students List</h1>
                            <hr>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Number</td>
                                        <td>FirstName</td>
                                        <td>MiddleName</td>
                                        <td>LastName</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                        $data=$con->view();
                                        $counter=1;
                                        foreach($data as $rows)
                                        {
                                    ?>

                                    <tr>
                                        <td><?php echo $counter++;?></td>
                                        <td><?php echo $rows['fname'];?></td>
                                        <td><?php echo $rows['mname'];?></td>
                                        <td><?php echo $rows['lname'];?></td>
                                        <td>
                                            <a href="update.php?id=<?php echo $rows['id'] ?>" class="btn btn-success btn-sm">Update </a>
                                            <a href="index.php?id=<?php echo $rows['id']?>" class="btn btn-danger btn-sm">Delete </a>
                                        </td>
                                    </tr>

                                    <?php 
                                        }
                                    ?>
                                
                                </tbody>
                            </table>

                        </div>
                        
                    </div>
                </div>
            </div>

        </main>

        <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
    
<?php 
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        if($con->delete($id))
        {
            header('location:index.php');
        }
    }
?>

