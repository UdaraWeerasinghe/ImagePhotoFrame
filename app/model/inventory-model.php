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
     public function  getMaterialBytype($mType){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM  material WHERE material_type='$mType'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  rejectOrderStatus($order_id,$reason){
        $con=$GLOBALS['con'];
        $sql="UPDATE order_detail SET order_status = '0', reject_reason='$reason' WHERE order_id='$order_id'";
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
//    public function  getGlassCount(){
//        
//        $con=$GLOBALS['con'];
//        $sql="SELECT SUM(qty) AS qty FROM  material WHERE material_type='3'";
//        $result = $con->query($sql) or die($con->error);
//        $row=$result->fetch_assoc();
//        $glassQty=$row["qty"];
//        return $glassQty;
//    }
//    public function  getHardBoardCount(){
//        
//        $con=$GLOBALS['con'];
//        $sql="SELECT SUM(qty) AS qty FROM  material WHERE material_type='4'";
//        $result = $con->query($sql) or die($con->error);
//        $row=$result->fetch_assoc();
//        $hardBoardQty=$row["qty"];
//        return $hardBoardQty;
//    }
    
    }

