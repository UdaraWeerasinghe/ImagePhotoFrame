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
      public function  getMaxAndMinPayment(){////get min and max amount paid
        
        $con=$GLOBALS['con'];
        $sql="SELECT (SELECT MAX(payment_amount) FROM payment)AS max,(SELECT MIN(payment_amount) "
                . "FROM payment)AS min FROM payment GROUP BY max";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getActiveCustomer($status){ //get active customers
        $con=$GLOBALS['con'];
        $sql="SELECT customer_id,customer_fName,customer_lName,customer_tel,customer_nic FROM customer WHERE customer_status='$status'";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
     public function  getAllLiabilities(){ //get all liabilities
        $con=$GLOBALS['con'];
        $sql="SELECT o.customer_id, c.customer_fName,(SELECT SUM(p.payment_amount) FROM payment p,order_detail od "
                . "WHERE p.payment_type='2' AND p.order_id=od.order_id AND od.customer_id=o.customer_id) AS paidAmount, "
                . "c.customer_lName, c.customer_tel,(SELECT SUM(od.order_sub_total) FROM order_detail od "
                . "WHERE od.customer_id=o.customer_id) AS subTotal FROM order_detail o, customer c "
                . "WHERE o.order_payment_status=2 AND o.customer_id=c.customer_id GROUP BY o.customer_id";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getAllCustomer(){ //get all customer
        $con=$GLOBALS['con'];
        $sql="SELECT customer_id,customer_fName,customer_lName,customer_tel,customer_nic FROM customer";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getMaxMinTotalAmount(){ //get min and max order total
        $con=$GLOBALS['con'];
        $sql="SELECT (SELECT MAX(order_sub_total)) AS max,(SELECT MIN(order_sub_total)) AS min FROM order_detail";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getPaymentByDate($start,$end,$min,$max){ //get payment details on specific time period
        $con=$GLOBALS['con'];
        $sql="SELECT p.payment_id,p.payment_amount,p.payment_type,p.payment_timestamp,p.order_id,"
                . "(SELECT customer_id FROM order_detail WHERE order_id= p.order_id) AS cusId,("
                . "SELECT customer_fName FROM customer WHERE customer_id=cusId) AS fName,"
                . "(SELECT customer_lName FROM customer WHERE customer_id=cusId) AS lName "
                . "FROM payment p WHERE p.payment_timestamp BETWEEN '$start' AND '$end' "
                . "AND p.payment_amount BETWEEN '$min' AND '$max'";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getPaymentByDateAndType($start,$end,$min,$max,$type){ //get payment details on specific time period and the type
        $con=$GLOBALS['con'];
        $sql="SELECT p.payment_id,p.payment_amount,p.payment_type,p.payment_timestamp,p.order_id,"
                . "(SELECT customer_id FROM order_detail WHERE order_id= p.order_id) AS cusId,("
                . "SELECT customer_fName FROM customer WHERE customer_id=cusId) AS fName,"
                . "(SELECT customer_lName FROM customer WHERE customer_id=cusId) AS lName "
                . "FROM payment p WHERE p.payment_timestamp BETWEEN '$start' AND '$end' "
                . "AND p.payment_amount BETWEEN '$min' AND '$max' AND p.payment_type='$type'";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getCustomerByTimeAndAmount($start,$end){ //select order in specific time reriod for reports
//        echo $start;
        $con=$GLOBALS['con'];
        $sql="SELECT od.customer_id,c.customer_fName,c.customer_lName,c.customer_tel,(SELECT SUM(order_sub_total) "
                . "FROM order_detail WHERE customer_id=od.customer_id "
                . "AND order_timestamp BETWEEN '$start' AND '$end') AS totalAmount "
                . "FROM order_detail od, customer c WHERE od.customer_id=c.customer_id GROUP BY od.customer_id";
        $result=$con->query($sql) or die($con->error);
//        echo $sql;
        return $result;
    }
     public function  getSupplier($matId){ //select supplier material wise
        $con=$GLOBALS['con'];
        $sql="SELECT sp.supplier_id,(SELECT supplier_name FROM supplier "
                . "WHERE supplier_id=sp.supplier_id) AS sName,(SELECT supplier_cno "
                . "FROM supplier WHERE supplier_id=sp.supplier_id) AS sCno,(SELECT COUNT(material_id) "
                . "FROM supplier_material WHERE supplier_id=sp.supplier_id) AS qty "
                . "FROM supplier_material sp WHERE sp.material_id='$matId'";
        $result=$con->query($sql) or die($con->error);
        return $result;
    }
    public function  getSupplierAll(){ //select supplier material 
        $con=$GLOBALS['con'];
        $sql="SELECT sp.supplier_id,(SELECT supplier_name FROM supplier "
                . "WHERE supplier_id=sp.supplier_id) AS sName,(SELECT supplier_cno FROM supplier "
                . "WHERE supplier_id=sp.supplier_id) AS sCno,(SELECT COUNT(material_id) "
                . "FROM supplier_material WHERE supplier_id=sp.supplier_id) AS qty "
                . "FROM supplier_material sp GROUP By sp.supplier_id";
        $result=$con->query($sql) or die($con->error);
        return $result;
    }
    public function  getOrdrByTimeAndAmount($start,$end,$minAmount,$maxAmount){ //select order in specific time reriod for reports
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM order_detail o, customer c "
                . "WHERE o.customer_id=c.customer_id "
                . "AND o.order_timestamp BETWEEN '$start' AND '$end' "
                . "AND o.order_sub_total>='$minAmount' "
                . "AND o.order_sub_total<='$maxAmount'";
        $result=$con->query($sql) or die($con->error);
        return $result;
    }
    
    public function  getOrdrByTimeAndAmountAndStatus($start,$end,$minAmount,$maxAmount,$status){ //select order in specific time reriod  and statusfor reports
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM order_detail o, customer c "
                . "WHERE o.customer_id=c.customer_id AND o.order_timestamp "
                . "BETWEEN '$start' AND '$end' AND o.order_sub_total>='$minAmount' "
                . "AND o.order_sub_total<='$maxAmount' AND order_status='$status'";
        $result=$con->query($sql) or die($con->error);
        return $result;
    }
    public function  getOrdrByStatus($status){ //select order in specific time reriod for reports
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM order_detail o, customer c WHERE o.customer_id=c.customer_id AND o.order_timestamp AND o.order_status='$status'";
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
     public function  getMaterils(){       ////////get material for select box in repo
        $con = $GLOBALS['con'];
        $sql = "SELECT material_name, material_id FROM material";
        $results = $con->query($sql)or die($con->error);
        return $results;
    }
    
}