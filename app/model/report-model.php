<?php
include_once '../../commons/dbConnection.php';
$dbConnObj= new dbConnection();

class Report{
    public function  getAllProduct(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM product p, category c, sub_category sc WHERE p.cat_id=c.cat_id AND p.sub_cat_id=sc.sub_cat_id";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    
    public function  getAllUser(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM user u, role r WHERE u.role_id=r.role_id ORDER BY u.user_id";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    
}