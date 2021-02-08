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
        $email=$_POST["email"];
        $cn=$_POST["cn"];
        $dob=$_POST["dob"];
        $nic=$_POST["nic"];
        $uRole=$_POST["uRole"];
        $gender=$_POST["gender"];

        
        try{
            if($gender==""){
                throw new Exception("Gender can not be empty!");
            }
            
            $isValidEmail=$userObj->checkEmail($email);
            $isValidCno=$userObj->checkCno($cn);
            $isValidNic=$userObj->checkNic($nic);
            
            if($isValidEmail===false){
                throw new Exception("Email address is alredy registered!");
            }
            if($isValidCno===false){
                throw new Exception("Contact number is alredy registered!");
            }
            if($isValidNic===false){
                throw new Exception("NIC number is alredy registered!");
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
                    
                   $isAdded=$userObj->addUser($newid,$fName, $lName, $email, $cn, $dob, $nic, $uRole, $gender, $user_img,1);
                
                if($isAdded=="true"){
                    $password= sha1($nic);
                    $userObj->addLogin($email, $password, $newid);
                }
                
                $class=" alert alert-success";
                $class= base64_encode($class);
                $msg="Successfully Add";
                $msg= base64_encode($msg);
                            ?>
<script> window.location="../view/user.php?msg=<?php echo $msg;?> & class=<?php echo $class; ?>";</script>
<?php
                }
               
                        
        } catch (Exception $ex) {
            $msg=$ex->getMessage();
            $msg= base64_encode($msg);
            ?>
<!--<script> window.location="../view/add-user.php?msg=<?php echo $msg; ?>";</script>-->

<?php
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
