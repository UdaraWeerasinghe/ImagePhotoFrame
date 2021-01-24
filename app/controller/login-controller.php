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
    
    window.location="../view/login.php?warning";
  </script>
<?php
        
    }
            
        
        break;
        
    case "logout":
        session_start();
        unset($_SESSION['user']);
        //session_destroy();
        header("Location:../view/login.php");

        break;
    
    case "resetPassword":
        $password= sha1($_POST["password1"]);
        $login_id=$_POST["login_id"];
        $loginObj->resetPassword($login_id, $password);
        header("Location:../view/login.php");
        break;
        
    case "checkEmail":
        $email=$_POST["email"];
        $emailResult=$loginObj->ValidateEmail($email);
        
                if($emailResult->num_rows==1){ 
                    $eRow=$emailResult->fetch_assoc();
                    $login_id= base64_encode($eRow["login_id"]);
                require '../../includes/phpMailer-header.php';

                    $mail->setFrom('imagephotoframs@gmail.com');
                    $mail->addAddress($email);     
                    $mail->addReplyTo('imagephotoframs@gmail.com', 'Information');

                    $mail->isHTML(true);                                  
                    $mail->Subject = 'Here is the subject';
                    $mail->Body    = ''
                            . '<div style="color:black">'
                            . '<p>We heard that you lost your loging password. Sorry about that!</p>'
                            . '<p>But don’t worry! You can use the following link to reset your password:</p>'
                            . '<p>http://localhost/imagePhotoFrame/app/view/resetPassword.php?key='.$login_id.'</p>'
                            . '</div>';
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    echo 'Message has been sent';
                }
                else {
                    
                    $email= base64_encode($email);
                    header("Location:../view/forgot-password.php?warning=$email");
                }
                break;
        
}
