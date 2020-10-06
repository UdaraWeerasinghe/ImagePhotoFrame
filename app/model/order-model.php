<?php
include_once '../../commons/dbConnection.php';
$dbConnObj= new dbConnection();

class Order{
    public function  getAllOrders(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM customer_order INNER JOIN customer  ON customer.customer_id=customer_order.customer_id INNER JOIN order_status ON customer_order.order_status=order_status.status_id";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
}
