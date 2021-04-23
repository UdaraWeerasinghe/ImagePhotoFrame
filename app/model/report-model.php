<?php
include_once '../../commons/dbConnection.php';
$dbConnObj= new dbConnection();

class Report{
    public function  getRoleByroleId($rid){       ////////
        $con = $GLOBALS['con'];
        $sql = "SELECT role_name FROM role WHERE role_id='$rid'";
        $results = $con->query($sql)or die($con->error);
        $r=$results->fetch_assoc();
        $role_name=$r["role_name"];
        return $role_name;
    }
    public function  getOrdrByTime($start,$end){ //select order in specific time reriod for reports
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM order_detail o, customer c WHERE o.customer_id=c.customer_id AND o.order_timestamp BETWEEN '$start' AND '$end'";
        $result=$con->query($sql) or die($con->error);
        return $result;
    }
    public function  getCustomerById($customerId){ //get customer using customer id
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM customer WHERE customer_id='$customerId'";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getCustomerByPId($pId){ //get customer using Payment ID for payment receipt
        $con=$GLOBALS['con'];
        $sql="SELECT p.order_id,p.payment_timestamp,p.payment_amount,o.customer_id,"
                . "o.order_sub_total, c.customer_fName, c.customer_lName, "
                . "c.customer_address, c.customer_tel,c.customer_email,"
                . "c.customer_zip_code FROM payment p, order_detail o, "
                . "customer c WHERE p.payment_id='$pId' "
                . "AND p.order_id=o.order_id AND o.customer_id=c.customer_id";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getproductByorderId($orderId){   ////////////get product details by order id
        $con = $GLOBALS['con'];
        $sql = "SELECT o.*, p.product_name, s.width, s.height "
                . "FROM order_product o, product p ,size s "
                . "WHERE o.order_id='$orderId' AND o.product_id=p.product_id "
                . "AND o.size_id=s.size_id";
        $results = $con->query($sql)or die($con->error);
        return $results;
    }
    public function  getPaymentByOrderId($orderId){       ////////
        $con = $GLOBALS['con'];
        $sql = "SELECT payment_amount, payment_id, payment_timestamp "
                . "FROM payment WHERE order_id='$orderId'";
        $results = $con->query($sql)or die($con->error);
        return $results;
    }
    
}