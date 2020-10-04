<?php
include '../model/login-model.php';
$loginObj=new login();

$status=$_REQUEST["status"];
switch ($status){
    
    case "login":
            $uname=$_POST["uName"];
            $password=$_POST["password"];
            $password= sha1($password);
            
            $result=$loginObj->loginValidation($uname, $password);
            
            $user_details=$result->fetch_assoc();
            
            session_start();
            $_SESSION['user']=$user_details;
            
    if($result->num_rows==1){
        header("Location:../view/dashboard.php");
    }
 else {
        ?> 
<script>
    alert("Username and the password does not match!");
    window.location="../view/login.php";
  </script>
<?php
        
    }
            
        
        break;
        
        case "logout":
            session_start();
            session_destroy();
            header("Location:../view/login.php");
            
            break;
}
