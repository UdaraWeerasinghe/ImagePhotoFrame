<?php
include_once '../../commons/dbConnection.php';
$dbConnObj= new dbConnection();

class Inventory{
    public function  getAllMaterial(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM  material";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getMaterialInserId(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT material_id FROM material ORDER BY material_id DESC LIMIT 1";
        $results = $con->query($sql);
        return $results;
    }
    public function  addMaterial($newid,$mName,$mType){
        
        $con=$GLOBALS['con'];
        $sql="INSERT INTO  material(material_id,material_name,material_type) VALUES('$newid','$mName','$mType')";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getMaterialById($mId){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM  material WHERE material_id='$mId'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    
    public function  addMaterialQty($mId,$qty){
        $con=$GLOBALS['con'];
        $sql="UPDATE material SET qty = '$qty' WHERE material_id='$mId'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  materialRequestHide($mId){
        $con=$GLOBALS['con'];
        $sql="UPDATE material SET order_request = '0' WHERE material_id='$mId'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
     public function  materialRequestShow($mId){
        $con=$GLOBALS['con'];
        $sql="UPDATE material SET order_request = '1' WHERE material_id='$mId'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
     public function  getMaterialBytype($mType){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM  material WHERE material_type='$mType'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
  
    public function  startProcess($order_id){
        
        $con=$GLOBALS['con'];
        $sql="UPDATE order_detail SET order_status = '2' WHERE order_id='$order_id'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getMaterialLengthById($mId){
        
        $con=$GLOBALS['con'];
        $sql="SELECT qty FROM  material WHERE material_id='$mId'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  updateQty($mId,$nQty){
        
        $con=$GLOBALS['con'];
        $sql="UPDATE material SET qty = '$nQty' WHERE material_id='$mId'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getCustomerByOId($order_id){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM  order_detail o, customer c WHERE o.customer_id=c.customer_id AND o.order_id='$order_id'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getLowOfStock(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT COUNT(material_id)AS OutStock, (SELECT COUNT(material_id) "
                . "FROM material WHERE qty<150) AS lowStock FROM material WHERE qty<50";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
     public function  getOutofmaterial(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT material_id, material_name FROM material WHERE qty<50";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getSuppliersBymat($matId){ ///get suppliers for sellect
        
        $con=$GLOBALS['con'];
        $sql="SELECT m.supplier_id,s.supplier_email, s.supplier_name "
                . "FROM supplier_material m, supplier s "
                . "WHERE m.material_id='$matId' AND m.supplier_id=s.supplier_id";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getSupplier($supId){ ///get suppliers email
        
        $con=$GLOBALS['con'];
        $sql="SELECT supplier_email FROM supplier  WHERE supplier_id='$supId'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    }

