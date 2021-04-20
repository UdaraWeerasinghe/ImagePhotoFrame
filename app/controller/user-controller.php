<?php
include '../model/user-model.php';
$userObj=new User();

$status=$_REQUEST["status"];
switch ($status){
    
    case "activateUser":
        $user_id=$_REQUEST["userId"];
        $userObj->activateUser($user_id);
     
  
        ?>
<script> window.location="../view/user.php";</script>
<?php
        break;
    
    case "deactivateUser":
        $user_id=$_REQUEST["userId"];
        $userObj->deactivateUser($user_id);
        
      
        ?>
<script> window.location="../view/user.php";</script>
<?php
        break;
  
    case "addUser":
        $fName=$_POST["fName"];
        $lName=$_POST["lName"];
        $email=strtolower($_POST["email"]);
        $cn=$_POST["cn"];
        $dob=$_POST["dob"];
        $nic=$_POST["nic"];
        $uRole=$_POST["uRole"];
        $gender=$_POST["gender"];

        
        try{
            
            $isValidEmail=$userObj->checkEmail($email);
            $isValidCno=$userObj->checkCno($cn);
            $isValidNic=$userObj->checkNic($nic);
            
            if($isValidEmail==false){
                throw new Exception("Email");
            }
            if($isValidCno==false){
                throw new Exception("Contact");
            }
            if($isValidNic==false){
                throw new Exception("NIC");
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
                    
//                   $isAdded=$userObj->addUser($newid,$fName, $lName, $email, $cn, $dob, $nic, $uRole, $gender, $user_img,1);
//                
//                if($isAdded=="true"){
//                    $password= sha1($nic);
////                    $userObj->addLogin($email, $password, $newid);
//                }
                
                $class=" alert alert-success";
                $class= base64_encode($class);
                $msg="Successfully Add";
                $msg= base64_encode($msg);
                
                header("Location:../view/user.php?msg=$msg&class=$class");
                }
               
                        
        } catch (Exception $exptn) {
            $msg=$exptn->getMessage();
            $msg= base64_encode($msg);
            
            $fName= base64_encode($fName);
            $lName= base64_encode($lName);
            $email= base64_encode($email);
            $cn= base64_encode($cn);
            $dob= base64_encode($dob);
            $nic= base64_encode($nic);
            $uRole= base64_encode($uRole);
            $gender= base64_encode($gender);
            
            header("Location:../view/add-user.php?msg=$msg&fName=$fName&"
                    . "lName=$lName&email=$email&cn=$cn&dob=$dob&nic=$nic&"
                    . "uRole=$uRole&gender=$gender");
           
        }
        
        break;
  
    case "updateUser":
        $user_id=$_POST["userId"];
        $fName=$_POST["fName"];
        $lName=$_POST["lName"];
        $email=$_POST["email"];
        $cn=$_POST["cn"];
        $dob=$_POST["dob"];
        $nic=$_POST["nic"];
        $uRole=$_POST["uRole"];
        $gender=$_POST["gender"];
        
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
                $userObj->updateUser($user_id, $fName, $lName, $email, $cn, $dob, $nic, $uRole, $gender, $user_img);
                ?>
<script> window.location="../view/view-user.php?userId=<?php echo $user_id; ?>";</script>
<?php
    break;
}
