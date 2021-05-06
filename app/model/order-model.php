<?php
include_once '../../commons/dbConnection.php';
$dbConnObj= new dbConnection();

class Order{
    public function  getAllOrders(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM order_detail o, customer c WHERE o.customer_id=c.customer_id "
                . "AND o.order_status='1' AND o.order_payment_status!='0'" ;
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
     public function  getAllOrdersCount($start_date,$end_date){
        
        $con=$GLOBALS['con'];
        $sql="SELECT (SELECT COUNT(order_id) FROM order_detail "
                . "WHERE order_status='1') AS new,(SELECT COUNT(order_id) "
                . "FROM order_detail WHERE order_status='2') AS pendding,"
                . "(SELECT COUNT(order_id) FROM order_detail WHERE order_status='3') "
                . "AS waiting,(SELECT COUNT(order_id) FROM order_detail "
                . "WHERE order_status='4') AS onDelivery,(SELECT COUNT(order_id) "
                . "FROM order_detail WHERE order_status='6') AS complite "
                . "FROM order_detail WHERE order_timestamp BETWEEN '$start_date' AND '$end_date' GROUP BY new" ;
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getOrderCountByStatus(){ ///display count in dashbord
        
        $con=$GLOBALS['con'];
        $sql="SELECT (SELECT COUNT(order_id) FROM order_detail WHERE order_status='1' ) AS newOrder, "
                . "(SELECT COUNT(order_id) FROM order_detail WHERE order_status='2' ) AS onProcess, "
                . "(SELECT COUNT(order_id) FROM order_detail WHERE order_status='3' ) AS duePayment, "
                . "(SELECT COUNT(order_id) FROM order_detail WHERE order_notification='1' )AS notiCount "
                . "FROM order_detail o GROUP BY 1";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
     public function  ReadNotification(){ ///hide notification after view
        
        $con=$GLOBALS['con'];
        $sql="UPDATE order_detail SET order_notification='0'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getMaxAndMinPayment(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT (SELECT MAX(payment_amount) FROM payment)AS max,(SELECT MIN(payment_amount) "
                . "FROM payment)AS min FROM payment GROUP BY max";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getAllOnProcessOrders(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM order_detail o, customer c WHERE o.customer_id=c.customer_id AND order_status='2'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getAllCompletedOrders(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM order_detail o, customer c WHERE o.customer_id=c.customer_id AND order_status='3'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getAllOnDeliveryProcessOrders(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM order_detail o, customer c WHERE o.customer_id=c.customer_id AND (order_status='4' OR order_status='5')";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getAllFinishedOrders(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM order_detail o, customer c WHERE o.customer_id=c.customer_id AND order_status='6'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    
    public function  getOrdersById($order_id){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM order_detail o, customer c WHERE o.customer_id=c.customer_id and o.order_id='$order_id'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getOrderByOrderId($orderId){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM order_detail o, order_product op, product p "
                . "WHERE o.order_id = op.order_id AND op.product_id=p.product_id AND o.order_id='$orderId'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
        public function  getOrdersProductDetailsById($order_id){
        
        $con=$GLOBALS['con'];
        $sql="SELECT o.product_id, o.size_id, o.quantity, s.width, s.height, mp.material_id "
                . "FROM order_product o, product p, size s, product_material mp "
                . "WHERE o.product_id=p.product_id AND o.size_id=s.size_id AND o.product_id=mp.product_id AND order_id='$order_id'";
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
    public function  completeProcess($order_id){
        
        $con=$GLOBALS['con'];
        $sql="UPDATE order_detail SET order_status = '3' WHERE order_id='$order_id'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  onDeliveryProcess($order_id){
        
        $con=$GLOBALS['con'];
        $sql="UPDATE order_detail SET order_status = '4' WHERE order_id='$order_id'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }

    
    public function  getOrders($startDate,$endDate){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM order_detail WHERE order_timestamp BETWEEN '$endDate' AND '$startDate'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
}
