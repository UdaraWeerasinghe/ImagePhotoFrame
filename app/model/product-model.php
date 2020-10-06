<?php
include_once '../../commons/dbConnection.php';
$dbConnObj= new dbConnection();

class Product{
    public function  getAllCategory(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM category";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    
    public function  getAllSubCategory(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM sub_category";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
}
