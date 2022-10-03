<?php
    include "classes/registration.php"; 
    $obj =  new register;
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <!-- <div class="alert alert-success">Registation Successfull</div> -->
                
            <?php
                if(isset($_POST["submit"])){
                    $obj->registration($_POST);
                } 
            ?>

                <form method="POST">
                    <div class="form-group mt-3">
                        <label for="fName"> Fast name</label>
                        <input class="form-control" type="text" name="fName" placeholder ="Fast name" >
                    </div>
                    <div class="form-group mt-3">
                        <label > User name</label>
                        <input class="form-control" type="text" name="uName" id="uName" placeholder ="User name" >
                    </div>
                    <div class="form-group mt-3">
                        <label > Email address</label>
                        <input class="form-control" type="text" name="email" id="email" placeholder ="Enter your Email" >
                    </div>
                    <div class="form-group mt-3">
                        <label> password</label>
                         <input class="form-control" type="password" name="password" id="password" placeholder ="Enter your password" >
                    </div>
                    <div class="form-group mt-3">
                        <label for="cpassword">Confirm password</label>
                        <input class="form-control" type="password" name="cpassword" id="cpassword" placeholder ="Confirm password" >
                    </div>
                    <input class="form-control btn btn-success mt-3" type="submit" name="submit" value="register">
                    <label for="" class="mt-3 ">login this page? <a href="login.php" class="ps-3 h5">Login</a></label>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>