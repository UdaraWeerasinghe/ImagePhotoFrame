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
    public function  getAllOrder(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM order_detail od, customer c WHERE od.customer_id=c.customer_id";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getInvoice(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM order_detail o, customer c WHERE o.order_id='OR00002' AND o.customer_id=c.customer_id";
        $result=$con->query($sql) or die($con->error);
        return $result;
    }
    public function  getProductsByOrder($orderId){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM order_product WHERE order_id='$orderId'";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
     public function  getProductsByProductId($productId){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM product WHERE product_id='$productId'";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getSizeNPriceById($productId,$sizeId){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM product_price pp, size s, product p WHERE pp.product_id='$productId' AND pp.size_id='$sizeId' AND s.size_id='$sizeId' AND p.product_id='$productId'";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    
    ////////////////////new reports////////////////////
    public function  getOrdrByTime($start,$end){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM order_detail o, customer c WHERE o.customer_id=c.customer_id AND o.order_timestamp BETWEEN '$start' AND '$end'";
        $result=$con->query($sql) or die($con->error);
        return $result;
    }
    
    public function  getCustomerById($customerId){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM customer WHERE customer_id='$customerId'";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    
    
}