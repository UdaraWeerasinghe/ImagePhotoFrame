<?php
include_once '../../commons/dbConnection.php';
$dbConnObj= new dbConnection();

class Payment{
    public function  getPayment(){ /////get all payment details
        $con = $GLOBALS['con'];
        $sql = "SELECT payment_id, payment_timestamp, order_id, payment_amount "
                . "FROM payment ORDER BY payment_timestamp DESC";
        $results = $con->query($sql)or die($con->error);
        return $results; 
    }
    public function  getPaymentByPId($pId){ /////get payment details acording to the payment Id
        $con = $GLOBALS['con'];
        $sql = "SELECT payment_id, payment_timestamp, order_id, payment_amount, "
                . "payment_type FROM payment WHERE payment_id='$pId'";
        $results = $con->query($sql)or die($con->error);
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
    
     public function  addTax($name,$precentage){       ////////
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO tax(name,precentage) VALUES('$name','$precentage')";
        $results = $con->query($sql)or die($con->error);
        return $results;
    }
    public function  getTax(){       ////////
        $con = $GLOBALS['con'];
        $sql = "SELECT precentage FROM tax ORDER BY id DESC LIMIT 1";
        $results = $con->query($sql)or die($con->error);
        return $results;
    }
}