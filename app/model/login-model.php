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
}

