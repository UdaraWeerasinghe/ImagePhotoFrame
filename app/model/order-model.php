<?php
include_once '../../commons/dbConnection.php';
$dbConnObj= new dbConnection();

class Order{
    public function  getAllOrders(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM order_detail o, customer c WHERE o.customer_id=c.customer_id AND order_status='1'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getAllOnProcessOrders(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM order_detail o, customer c WHERE o.customer_id=c.customer_id AND order_status='2'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getOrdersById($order_id){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM order_detail o, customer c WHERE o.customer_id=c.customer_id and o.order_id='$order_id'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
        public function  getOrdersProductById($order_id){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM order_product o, product p WHERE o.product_id=p.product_id AND order_id='$order_id'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
     public function  getMaterialById($pId){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM product_material WHERE product_id='$pId'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getSizeByPId($sizeId){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM size WHERE size_id='$sizeId'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
}
