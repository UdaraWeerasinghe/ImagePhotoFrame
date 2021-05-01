<?php
include_once '../../commons/dbConnection.php';
$dbConnObj= new dbConnection();

class Log{
    public function addLog($userId,$activity){
        $con=$GLOBALS['con'];
        $sql="INSERT INTO activity_log(user_id,log_activity) VALUES('$userId','$activity')";
        $con->query($sql) or die($con->error);
    }
}