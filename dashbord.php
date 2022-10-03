<?php
    session_start();
    if(!isset($_SESSION['email'] )){
        header("location:login.php");
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashbord</title>
   
    
</head>
<body>
<a href="logout.php">Logout</a>


<h2>welcome to dashbord and <?php  echo ('EMAIL IS =>'.$_SESSION['email'].' '.'USERNAME => '.$_SESSION['user'])?></h2>
    <div class="manu">
        <ul>
           <?php if($_SESSION['role']=="user"){ ;?>
            <li><a href="#">insert product</a></li>
            <li><a href="#">view Product</a></li>
            <li><a href="purchas.php">purshas</a></li>  
            <?php }  elseif($_SESSION['role']=="sels") {; ?>         
            <li><a href="#">sales</a></li>
           <?php } ?>
            
        </ul>
    </div>
</body>
</html>