<?php
include_once '../../commons/dbConnection.php';
$dbConnObj= new dbConnection();

class Delivery{
    public function  getReadyForDelivery(){
        $con=$GLOBALS['con'];
        $sql="SELECT c.customer_id, c.customer_fName, c.customer_lName,"
                . "c.customer_tel,c.customer_email, c.customer_address, "
                . "c.customer_status, o.order_id, (SELECT SUM(quantity) "
                . "FROM order_product WHERE order_id=o.order_id) AS qty "
                . "FROM order_detail o, customer c WHERE order_status='4' "
                . "AND o.customer_id=c.customer_id";
        $results = $con->query($sql);
        return $results;
    }
    public function  startDelivery($order_id){
        
        $con=$GLOBALS['con'];
        $sql="UPDATE order_detail SET order_status = '5' WHERE order_id='$order_id'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  handover($order_id){
        
        $con=$GLOBALS['con'];
        $sql="UPDATE order_detail SET order_status = '6' WHERE order_id='$order_id'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
     public function  getOnDelivery(){
        $con=$GLOBALS['con'];
        $sql="SELECT c.customer_id, c.customer_fName, c.customer_lName,"
                . "c.customer_tel,c.customer_email, c.customer_address, "
                . "c.customer_status, o.order_id, (SELECT SUM(quantity) "
                . "FROM order_product WHERE order_id=o.order_id) AS qty "
                . "FROM order_detail o, customer c WHERE order_status='5' "
                . "AND o.customer_id=c.customer_id";
        $results = $con->query($sql);
        return $results;
    }
     public function  getComptetedDelivery(){
        $con=$GLOBALS['con'];
        $sql="SELECT c.customer_id, c.customer_fName, c.customer_lName,"
                . "c.customer_tel,c.customer_email, c.customer_address, "
                . "c.customer_status, o.order_id, (SELECT SUM(quantity) "
                . "FROM order_product WHERE order_id=o.order_id) AS qty "
                . "FROM order_detail o, customer c WHERE order_status='6' "
                . "AND o.customer_id=c.customer_id";
        $results = $con->query($sql);
        return $results;
    }
}