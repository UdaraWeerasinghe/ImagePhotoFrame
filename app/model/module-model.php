<?php
include_once '../../commons/dbConnection.php';
$dbConnObj= new dbConnection();

class Module{
    public function  getAllModules(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM module";
        $results = $con->query($sql);
        return $results;
    }
}

