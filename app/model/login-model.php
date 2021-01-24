<?php
include_once '../../commons/dbConnection.php';
$dbConnObj= new dbConnection();

class login{
    public function  loginValidation($uname, $password){
        
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM user u , login l WHERE u.user_id=l.user_id AND l.login_username='$uname' AND l.login_password='$password'";
        $results = $con->query($sql)or die($con->error);
        return $results; 
    }
    public function  ValidateEmail($email){
        
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM login WHERE login_username='$email'";
        $results = $con->query($sql)or die($con->error);
        return $results; 
    }
    public function  resetPassword($login_id,$password){
        
        $con = $GLOBALS['con'];
        $sql = "UPDATE login SET login_password='$password' WHERE login_id='$login_id'";
        $results = $con->query($sql)or die($con->error);
        return $results; 
    }
}

