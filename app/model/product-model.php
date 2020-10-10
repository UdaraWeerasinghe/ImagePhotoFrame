<?php
include_once '../../commons/dbConnection.php';
$dbConnObj= new dbConnection();

class Product{
    public function  getAllCategory(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM category";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    
    public function  getAllSubCategory(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM sub_category";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  addCategory($cat_name){
        
        $con=$GLOBALS['con'];
        $sql="INSERT INTO category(cat_name) VALUES('$cat_name')";
        $con->query($sql) or die($con->error); 
        $catId=$con->insert_id;
        return $catId;
    }
     public function  deactivateCategory($cat_id){
        
        $con=$GLOBALS['con'];
        $sql="UPDATE category SET cat_status=0 WHERE cat_id='$cat_id'";
        $con->query($sql) or die($con->error); 
    }
    public function  activateCategory($cat_id){
        
        $con=$GLOBALS['con'];
        $sql="UPDATE category SET cat_status=1 WHERE cat_id='$cat_id'";
        $con->query($sql) or die($con->error); 
    }
   
    public function  getCategory($cat_id){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM category WHERE cat_id='$cat_id'";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    public function  updateCategory($cat_id,$cat_name){
        
        $con=$GLOBALS['con'];
        $sql="UPDATE category SET cat_name='$cat_name' WHERE cat_id='$cat_id'";
        $con->query($sql) or die($con->error); 
    }
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
     public function  addSubCategory($sub_cat_name){
        
        $con=$GLOBALS['con'];
        $sql="INSERT INTO sub_category(sub_cat_name) VALUES('$sub_cat_name')";
        $con->query($sql) or die($con->error);
        $catId=$con->insert_id;
        return $catId;
    }
    public function  addCategorySubCategory($f,$sub_cat_id){
        
        $con=$GLOBALS['con'];
        $sql="INSERT INTO category_sub_category(cat_id,sub_cat_id) VALUES('$f','$sub_cat_id')";
        $con->query($sql) or die($con->error);
        $catId=$con->insert_id;
        return $catId;
    }
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
    
    public function  addDesign($dNanme,$dCode,$material,$frameType,$color,$img1,$img2){
        
        $con=$GLOBALS['con'];
        $sql="INSERT INTO product(product_name,product_code,cat_id,sub_cat_id,product_color,product_img_1,product_img_2) VALUES('$dNanme','$dCode','$material','$frameType','$color','$img1','$img2')";
        $con->query($sql) or die($con->error);
        
    }
  
    public function  getProductCount(){
        
        $con=$GLOBALS['con'];
        $sql="SELECT COUNT(product_id) as pCount FROM product";
        $results = $con->query($sql) or die($con->error);
        $cRow=$results->fetch_assoc();
        return $cRow['pCount'];
    }
      public function  getAllProduct($page,$txt){
        $strat=($page-1)*5;                  //start position
        $con=$GLOBALS['con'];
        if ($txt==""){
          $sql="SELECT * FROM product LIMIT $strat,5";  
        }else {
           $sql="SELECT * FROM product WHERE product_name LIKE '%$txt%' $strat,5";
        }
        $results = $con->query($sql) or die($con->error);
        return $results;
    }  
}
