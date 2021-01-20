<?php
include_once '../../commons/dbConnection.php';
$dbConnObj= new dbConnection();

class Product{
//    public function  getAllCategory(){
//        
//        $con=$GLOBALS['con'];
//        $sql="SELECT * FROM category";
//        $results = $con->query($sql) or die($con->error);
//        return $results;
//    }
    
    public function  getAllSubCategory(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM sub_category";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
//    public function  getCatInserId(){
//        
//        $con=$GLOBALS['con'];
//        $sql="SELECT cat_id FROM category ORDER BY cat_id DESC LIMIT 1";
//        $results = $con->query($sql);
//        return $results;
//    }
//    public function  addCategory($newid,$cat_name){
//        
//        $con=$GLOBALS['con'];
//        $sql="INSERT INTO category(cat_id,cat_name) VALUES('$newid','$cat_name')";
//        $con->query($sql) or die($con->error); 
//        $isAdded="true";
//        return $isAdded;
//    }
//     public function  deactivateCategory($cat_id){
//        
//        $con=$GLOBALS['con'];
//        $sql="UPDATE category SET cat_status=0 WHERE cat_id='$cat_id'";
//        $con->query($sql) or die($con->error); 
//    }
//    public function  activateCategory($cat_id){
//        
//        $con=$GLOBALS['con'];
//        $sql="UPDATE category SET cat_status=1 WHERE cat_id='$cat_id'";
//        $con->query($sql) or die($con->error); 
//    }
   
//    public function  getCategory($cat_id){
//        
//        $con=$GLOBALS['con'];
//        $sql="SELECT * FROM category WHERE cat_id='$cat_id'";
//        $results = $con->query($sql) or die($con->error);
//        return $results;
//    }
//    public function  updateCategory($cat_id,$cat_name){
//        
//        $con=$GLOBALS['con'];
//        $sql="UPDATE category SET cat_name='$cat_name' WHERE cat_id='$cat_id'";
//        $con->query($sql) or die($con->error); 
//    }
    public function  deactivateSubCategory($sub_cat_id){
        
        $con=$GLOBALS['con'];
        $sql="UPDATE sub_category SET sub_cat_status=0 WHERE sub_cat_id='$sub_cat_id'";
        $con->query($sql) or die($con->error); 
    }
    public function  activateSubCategory($sub_cat_id){
        
        $con=$GLOBALS['con'];
        $sql="UPDATE sub_category SET sub_cat_status=1 WHERE sub_cat_id='$sub_cat_id'";
        $con->query($sql) or die($con->error); 
    }
    public function  getDesignInserId(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT sub_cat_id FROM sub_category ORDER BY sub_cat_id DESC LIMIT 1";
        $results = $con->query($sql);
        return $results;
    }
     public function  addSubCategory($newid,$sub_cat_name){
        
        $con=$GLOBALS['con'];
        $sql="INSERT INTO sub_category(sub_cat_id,sub_cat_name) VALUES('$newid','$sub_cat_name')";
        $con->query($sql) or die($con->error);
        $isAdded="true";
        return $isAdded;
    }
//    public function  addCategorySubCategory($f,$sub_cat_id){
//        
//        $con=$GLOBALS['con'];
//        $sql="INSERT INTO category_sub_category(cat_id,sub_cat_id) VALUES('$f','$sub_cat_id')";
//        $con->query($sql) or die($con->error);
//        $catId=$con->insert_id;
//        return $catId;
//    }
    public function  getAllSize(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM size";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  addSubCategorySize($sub_cat_id,$s){
        
        $con=$GLOBALS['con'];
        $sql="INSERT INTO sub_category_size(sub_cat_id,size_id) VALUES('$sub_cat_id','$s')";
        $con->query($sql) or die($con->error);
        
    }
    public function  getProductInserId(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT product_id FROM product ORDER BY product_id DESC LIMIT 1";
        $results = $con->query($sql);
        return $results;
    }
    
    public function  addDesign($newid,$dNanme,$dCode,$material,$frameType,$color,$img1,$img2){
        
        $con=$GLOBALS['con'];
        $sql="INSERT INTO product(product_id,product_name,product_code,material_id,sub_cat_id,product_color,product_img_1,product_img_2) VALUES('$newid','$dNanme','$dCode','$material','$frameType','$color','$img1','$img2')";
        $con->query($sql) or die($con->error);
        $isAdded="true";
        return $isAdded;
        
    }
    function setMaterialProduct($proId,$mId){
        $con = $GLOBALS["con"];
        $sql = "INSERT INTO product_material(product_id,material_id) VALUES('$proId','$mId')";
        $con->query($sql)or die($con->error);
    }
    function addPrice($size_id,$price,$proId){
        $con = $GLOBALS["con"];
        $sql = "INSERT INTO product_price(size_id,product_price,product_id) VALUES('$size_id','$price','$proId')";
        $con->query($sql)or die($con->error);
    }
  
    public function  getProductCount(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT COUNT(product_id) as pCount FROM product";
        $results = $con->query($sql) or die($con->error);
        $cRow=$results->fetch_assoc();
        return $cRow['pCount'];
    }
      public function  getAllProduct(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM product";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }  
     public function  getSizeByType($subCatId){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM sub_category_size sc, size s WHERE sc.size_id=s.size_id and sc.sub_cat_id='$subCatId'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  geProductById($pId){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM product WHERE product_id='$pId'";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    } 
    public function  getSubCategoryById($sub_cat_id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM sub_category WHERE sub_cat_id='$sub_cat_id'";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    } 
    public function  getCategoryById($cat_id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM category WHERE cat_id='$cat_id'";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getStripById($pId){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM product_material pm, material m WHERE pm.material_id=m.material_id AND pm.product_id='$pId'";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getSizeBySubCatId($sub_cat_id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM sub_category_size WHERE sub_cat_id='$sub_cat_id'";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getPrice($pId,$size_id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM product_price WHERE product_id='$pId' AND size_id='$size_id'";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  getSizeById($size_id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM size WHERE size_id='$size_id'";  
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
}
