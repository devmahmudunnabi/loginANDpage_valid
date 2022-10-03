<?php
 include "database.php" ;

    class register  extends database{
        function registration($data){
           $fName = $data["fName"];
           $uName = $data["uName"];
           $email = $data["email"];
           $password = $data["password"];
           $cpassword = $data["cpassword"];
           $role ="user";
           $status ="0";
           if(empty( $fName)){
            echo'<div class="alert alert-danger">Name field is empty</div>';
           }
           elseif(empty( $uName)){
            echo'<div class="alert alert-danger">User Name field is empty</div>';
           }
           elseif(empty( $email)){
            echo'<div class="alert alert-danger">Email Name field is empty</div>';
           }
           elseif(empty( $password)){
            echo'<div class="alert alert-danger">password Name field is empty</div>';
           }
           elseif(empty( $cpassword)){
            echo'<div class="alert alert-danger">Cpassword Name field is empty</div>';
           }
           elseif($password != $cpassword){
            echo'<div class="alert alert-danger">confarm password</div>';
           }
           else{
            $check =$this->check($uName, $email);
            if($check==TRUE){
                echo'<div class="alert alert-danger">this user already exist</div>';
            }
            else{
                $password=md5($password); 
                $result = $this->con->query("INSERT INTO login(fName,uName,email,password,role,status) VALUES('$fName','$uName','$email','$password','$role','$status')");
                if($result){
                    echo'<div class="alert alert-success">Registation Successfull</div>  ';
                }
                else{
                    echo'<div class="alert alert-danger">Registation  NOT Successfull</div>';
                }
            }
           }
        }
        function check( $uName, $email){
           $result= $this->con->query("SELECT *FROM  login WHERE uName='$uName' OR email='$email' ");
           if($result->num_rows>0){
            return true;
           }
           else{
            return false;
           }
        }
        function login($data){
            $unameoremail = $data["email"];
            $pas = $data["password"];
            $pas = md5($pas);  
            $checkUname = $this->checkUname($unameoremail);
            $checkpass = $this->checkpass($pas);
            if($checkUname == false){
                echo'<div class="alert alert-danger">User name or email not exist</div>';
            }
            elseif($checkpass == false){
                echo'<div class="alert alert-danger">password not exist</div>';
            }
            else{
                $result= $this->con->query("SELECT *FROM  login WHERE (uName='$unameoremail' OR email='$unameoremail') AND password='$pas' AND status='1' ");
                if($result->num_rows>0){
                    $result =$result->fetch_assoc();
                    session_start();
                    $_SESSION['email']=$result["email"];
                    $_SESSION['user']=$result["uName"];            
                    $_SESSION['role']=$result["role"];             
                  
                    header("location:dashbord.php");
                }
                else{ 
                 header("location:login.php");
                }
            }
          
            
         }
         function checkUname($uName){
            $result= $this->con->query("SELECT *FROM  login WHERE uName='$uName' OR email='$uName' ");
           if($result->num_rows>0){
            return true;
           }
           else{
            return false;
           }
         }
         function checkpass($pas){
            $result= $this->con->query("SELECT *FROM  login WHERE password='$pas'");
           if($result->num_rows>0){
            return true;
           }
           else{
            return false;
           }
         }
      
  
}  