<?php
include_once '../../commons/dbConnection.php';
$dbConnObj= new dbConnection();

class User{
    public function  getAllUserWithRole(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM user u, role r WHERE u.role_id=r.role_id";
        $results = $con->query($sql);
        return $results;
    }
    
    public function activateUser($user_id){
        $con=$GLOBALS["con"];
        $sql="UPDATE user SET user_status='0' WHERE user_id='$user_id'";
        $result=$con->query($sql); 
    }
    public function deactivateUser($user_id){
        $con=$GLOBALS["con"];
        $sql="UPDATE user SET user_status='1' WHERE user_id='$user_id'";
        $result=$con->query($sql); 
    }
    public function  getAllRole(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM role";
        $results = $con->query($sql);
        return $results;
    }
     public function  checkEmail($email){
        
        $con=$GLOBALS['con'];
        $sql="SELECT 1 FROM user WHERE user_email='$email'";
        $results = $con->query($sql);
        if($results->num_rows>0)
         {
            return false;
         }
         else
          {
             return true;
          }
    }
    
    public function  checkCno($cn){
        
        $con=$GLOBALS['con'];
        $sql="SELECT 1 FROM user WHERE user_cno='$cn'";
        $results = $con->query($sql);
        if($results->num_rows>0)
         {
            return false;
         }
         else
          {
             return true;
          }
    }
    public function  getUserInserId(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT user_id FROM user ORDER BY user_id DESC LIMIT 1";
        $results = $con->query($sql);
        return $results;
    }
    public function  addUser($newid,$fName,$lName,$email,$cn,$dob,$nic,$uRole,$gender,$user_img,$status){
        $con=$GLOBALS['con'];
        $sql="INSERT INTO user(user_id,user_fname,user_lname,user_email,user_cno,user_gender,
            user_dob,user_nic,role_id,user_image,user_status)
            VALUES('$newid','$fName','$lName','$email','$cn','$gender','$dob','$nic','$uRole','$user_img','$status')";
        $con->query($sql) or die($con->error);
        $isAdded="true";
        return $isAdded;
    }
    
    public function addLogin($login_username,$login_password,$user_id){
        $con=$GLOBALS['con'];
        $sql="INSERT INTO login(login_username,login_password,user_id) VALUES('$login_username','$login_password','$user_id')";
        $con->query($sql) or die($con->error);
    }
    
    public function  viewUser($userId){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM user u, role r WHERE u.role_id=r.role_id AND u.user_id='$userId'";
        $results = $con->query($sql);
        return $results;
    }
    public function updateUser($user_id,$fName,$lName,$email,$cn,$dob,$nic,$uRole,$gender,$user_img){
        $con=$GLOBALS["con"];
        $sql="UPDATE user SET user_fname='$fName', user_lname='$lName', user_email='$email', user_cno='$cn', user_gender='$gender', user_dob='$dob', user_nic='$nic', role_id='$uRole', user_image='$user_img' WHERE user_id='$user_id'";
        $con->query($sql)or die($con->error); 
    }
    
    
    
}

