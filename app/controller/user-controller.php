<?php
include '../model/user-model.php';  //include user model
$userObj=new User();

include '../model/log-model.php';   ///include log model
$logObj= new Log();

$status=$_REQUEST["status"];
switch ($status){
    
    case "activateUser":
        $user_id=$_REQUEST["userId"];
        $userObj->activateUser($user_id);
        
        session_start();
        $userId=$_SESSION["user"]["user_id"];
        $activity="Deactivate user"." ".$user_id;
        $logObj->addLog($userId, $activity); //add log
                
        ?>
<script> window.location="../view/user.php";</script>
<?php
        break;
    
    case "deactivateUser":
        $user_id=$_REQUEST["userId"];
        $userObj->deactivateUser($user_id);
        
        session_start();
        $userId=$_SESSION["user"]["user_id"];
        $activity="Activate user"." ".$user_id;
        $logObj->addLog($userId, $activity); //add log
      
        ?>
<script> window.location="../view/user.php";</script>
<?php
        break;
  
    case "addUser":
//        print_r($_POST);
        $fName=$_POST["fname"];
        $lName=$_POST["lname"];
        $email=strtolower($_POST["email"]);
        $cn=$_POST["cno"];
        $dob=$_POST["dob"];
        $nic=$_POST["nic"];
        $uRole=$_POST["uRole"];
        $gender=$_POST["gender"];
        $address=$_POST["address"];
      
        
        try{
            
            $isValidEmail=$userObj->checkEmail($email);
            $isValidCno=$userObj->checkCno($cn);
            $isValidNic=$userObj->checkNic($nic);
            
            if($isValidEmail==false){
                throw new Exception("email");
            }
            if($isValidCno==false){
                throw new Exception("tel");
            }
            if($isValidNic==false){
                throw new Exception("nic");
            }
           
            if($_FILES["user_img"]["name"]!="")
                {
                    $user_img=$_FILES["user_img"]["name"];
                    $user_img="".time()."_".$user_img;
                    /// obtain temporary location
                   $tmp= $_FILES["user_img"]["tmp_name"];
                   $destination="../../images/user_image/$user_img";
                   move_uploaded_file($tmp, $destination); 
                }
                else{
                    
                    $user_img="defaultImage.jpg";
                    
                }
                
                $idResult=$userObj->getUserInserId();
                $nor=$idResult->num_rows;
                if($nor==0){
                    $newid = "U00001";
                }
                else{
                    $idRow=$idResult->fetch_assoc();
                    $lid=$idRow["user_id"];
                    $num=substr($lid, 1);
                    $num++;
                    $newid = "U".str_pad($num,5,"0",STR_PAD_LEFT);
                    
                   $isAdded=$userObj->addUser($newid,$fName, $lName, $email, $cn, $dob, $nic, $uRole, $gender, $user_img,1,$address);
                
                if($isAdded=="true"){
                    $password= sha1($nic);
                    $userObj->addLogin($email, $password, $newid);
                }
               
                }
                
                session_start();
                $userId=$_SESSION["user"]["user_id"];
                $activity="Add user"." ".$newid;
                $logObj->addLog($userId, $activity); //add log
                print 'success';
               
                        
        } catch (Exception $exptn) {
            $msg=$exptn->getMessage();
            print $msg;
            
        }
        
        break;
        case "updateUser":
            
            
          try{
            $user_id=$_POST["userId"];
            $fName=$_POST["fName"];
            $lName=$_POST["lName"];
            $email=$_POST["email"];
            $cn=$_POST["cn"];
            $dob=$_POST["dob"];
            $nic=$_POST["nic"];
            $uRole=$_POST["uRole"];
            $gender=$_POST["gender"];
            $address=$_POST["address"];
            
            $isValidEmail=$userObj->checkEmailUpdate($email,$user_id);
            $isValidCno=$userObj->checkCnoUpdate($cn,$user_id);
            $isValidNic=$userObj->checknicUpdate($nic,$user_id);
            
            if($isValidEmail==false){
                throw new Exception("email");
            }
            if($isValidCno==false){
                throw new Exception("tel");
            }
            if($isValidNic==false){
                throw new Exception("nic");
            }
  
        
        if($_FILES["user_img"]["name"]!="")
                {
                    $user_img=$_FILES["user_img"]["name"];
                    $user_img="".time()."_".$user_img;
                    /// obtain temporary location
                   $tmp= $_FILES["user_img"]["tmp_name"];
                   $destination="../../images/user_image/$user_img";
                   move_uploaded_file($tmp, $destination); 
                }
                else{
                    $user_img="";
                }
                $result=$userObj->updateUser($user_id, $fName, $lName, $email, $cn, $dob, $nic, $uRole, $gender, $user_img,$address);
                echo "success";
          } 
          catch (Exception $exptn) {
            $msg=$exptn->getMessage();
            print $msg;
            
        }
        session_start();
        $userId=$_SESSION["user"]["user_id"];
        $activity="Udate user"." ".$user_id;
        $logObj->addLog($userId, $activity); //add log
        
    break;
    
    case "validateUserProfileEmail": //update user profile  email validate
        $userId=$_POST["userId"];
        $email=$_POST["email"];
        $isValidEmail=$userObj->validateEmail($userId, $email);
        if($isValidEmail){
            echo 'notExist';
        }else{
            echo 'exist';
        }
        break;
        
        case "validateUserProfileCno": //update user profile  cnovalidate
        $userId=$_POST["userId"];
        $cno=$_POST["cno"];
        $isValidCno=$userObj->validateCno($userId, $cno);
        if($isValidCno){
            echo 'notExist';
        }else{
            echo 'exist';
        }
        break;
        
        case "validateUserProfileNic": //update user profile  nic validate
        $userId=$_POST["userId"];
        $nic=$_POST["nic"];
        $isValidNic=$userObj->validateNic($userId, $nic);
        if($isValidNic){
            echo 'notExist';
        }else{
            echo 'exist';
        }
        break;
        
        case "validatePassword": //change password password match
        $userId=$_POST["userId"];
        $oldPass= sha1($_POST["oldPass"]);
        $isValidpass=$userObj->validatePass($userId, $oldPass);
        if(!$isValidpass){
            echo 'notExist';
        }else{
            echo 'exist';
        }
        break;
    
    case "changePassword":
        $userId=$_POST["userId"];
        $newPass=sha1($_POST["newPass"]);
        $userObj->changePass($userId, $newPass);
        session_start();
        $uId=$_SESSION["user"]["user_id"];
        unset($_SESSION['user']);
        
        $activity="Change password"." ".$userId;
        $logObj->addLog($uId, $activity); //add log
        $msg= base64_encode("Your password has been successfully Updated");
        header("Location:../view/login.php?alert&type=success&msg=$msg");
        break;
    
    case "updateProfile": //update user profile
        $userid = $_POST["userId"];
        $fName = $_POST["fname"];
        $lName = $_POST["lname"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        $dob = $_POST["dob"];
        $nic = $_POST["nic"];
        $cno = $_POST["cno"];
        $address = $_POST["address"];
        
        if($_FILES["img"]["name"]!="")
                {
                    $user_img=$_FILES["img"]["name"];
                    $user_img="".time()."_".$user_img;
                    /// obtain temporary location
                   $tmp= $_FILES["img"]["tmp_name"];
                   $destination="../../images/user_image/$user_img";
                   move_uploaded_file($tmp, $destination);  //move image
                }else{
                    $user_img="";
                }   
        $userObj->updateUserProfile($userid, $fName, $lName, $email, $cno, $dob, $nic, $gender, $address, $user_img);
        
        session_start();
        $userId=$_SESSION["user"]["user_id"];
        $activity="Update profile"." ".$userid;
        $logObj->addLog($userId, $activity); //add log
        $msg= base64_encode("Your account has been successfuly updated");
        header("Location:../view/profile.php?alert&type=success&msg=$msg");
  
        break;
    
}
