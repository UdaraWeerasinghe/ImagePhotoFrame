<?php
include_once '../../commons/dbConnection.php';
$dbConnObj= new dbConnection();

class Customer{
    public function  getAllCustomer(){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM customer";
        $results = $con->query($sql)or die($con->error);
        return $results; 
    }
    public function  getAllCustomerById($customerId){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM customer WHERE customer_id='$customerId'";
        $results = $con->query($sql)or die($con->error);
        return $results; 
    }
    public function  getOrderByCusId($customerId){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM order_detail WHERE customer_id='$customerId'";
        $results = $con->query($sql)or die($con->error);
        return $results; 
    }
    public function  blockCustomer($customerId){
        $con = $GLOBALS['con'];
        $sql = "UPDATE customer SET customer_status='0' WHERE customer_id='$customerId'";
        $results = $con->query($sql)or die($con->error);
        return $results; 
    }
    public function  unBlockCustomer($customerId){
        $con = $GLOBALS['con'];
        $sql = "UPDATE customer SET customer_status='1' WHERE customer_id='$customerId'";
        $results = $con->query($sql)or die($con->error);
        return $results; 
    }
    public function  getCustomerByOrderId($oderId){
        $con = $GLOBALS['con'];
        $sql = "SELECT c.customer_fName, c.customer_lName From customer c, order_detail o, payment p "
                . "WHERE p.order_id='$oderId' AND p.order_id=o.order_id "
                . "AND o.customer_id=c.customer_id GROUP BY c.customer_id";
        $results = $con->query($sql)or die($con->error);
        return $results; 
    }
}