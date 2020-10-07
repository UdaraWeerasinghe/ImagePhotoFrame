<?php
include '../model/product-model.php';
$productObj=new Product();

$status=$_REQUEST["status"];
switch ($status){
    
    case "addCategory":
        $cat_name=$_POST["cat_name"];
        $catId=$productObj->addCategory($cat_name);
        $msg="Successfully added category"." ".$cat_name;
        $class="alert-success";
        $subCategory=$_POST['sub_cat_name'];
       
        foreach ($subCategory as $f) {
                 $productObj->addCategorySubCategory($catId,$f);
        }
    ?>
    ?>
        <script> window.location="../view/category.php?category=category & msg=<?php echo $msg;?> & class=<?php echo $class; ?>";</script>
   <?php
    break;

    case "deactivateCategory":
        $cat_id=$_REQUEST["cat_id"];
        $productObj->deactivateCategory($cat_id);
        $msg="Category Deactiveted";
        $class="alert-danger";
         ?>
        <script> window.location="../view/category.php?category=category & msg=<?php echo $msg;?> & class=<?php echo $class; ?>";</script>
   <?php
        break;
    
    case "activateCategory":
        $cat_id=$_REQUEST["cat_id"];
        $productObj->activateCategory($cat_id);
        $msg="Category activeted";
        $class="alert-success";
         ?>
        <script> window.location="../view/category.php?category=category & msg=<?php echo $msg;?> & class=<?php echo $class; ?>";</script>
   <?php
        break;
    
    
    case "edit_category":
        $cat_id=$_POST["cat_id"];
        $catResult=$productObj->getCategory($cat_id);
        $catRow=$catResult->fetch_assoc();
        ?>
        <div class="row">
            <div class="col-md-4">
                <label>Category Name</label>
            </div>
            <div class="col-md-8">
                <input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>">
                <input name="cat_name" type="text" value="<?php echo $catRow['cat_name'] ?>" class="form-control">
            </div>
        </div>
        <?php
        
        break;
    
    case "updateCategory":
        $cat_id=$_POST["cat_id"];
        $cat_name=$_POST["cat_name"];
        $productObj->updateCategory($cat_id,$cat_name);
        $msg="Successfully updated to"." ".$cat_name;
        $class="alert-success";
         ?>
        <script> window.location="../view/category.php?category=category & msg=<?php echo $msg;?> & class=<?php echo $class; ?>";</script>
   <?php
        break;
    
        case "addSubCategory":
        $sub_cat_name=$_POST["sub_cat_name"];
        $subCatId=$productObj->addSubCategory($sub_cat_name);
        $msg="Successfully added sub category"." ".$sub_cat_name;
        $class="alert-success";
        $category=$_POST['cat_name'];
        $size=$_POST['sub_cat_size'];
        foreach ($category as $f) {
                 $productObj->addCategorySubCategory($f,$subCatId);
        }
        foreach ($size as $s) {
                 $productObj->addSubCategorySize($subCatId,$s);
        }
    ?>
        <script> window.location="../view/category.php?sub_cat=category & msg=<?php echo $msg;?> & class=<?php echo $class; ?>";</script>
   <?php
    break;
    
    case "deactivateSubCategory":
        $sub_cat_id=$_REQUEST["sub_cat_id"];
        $productObj->deactivateSubCategory($sub_cat_id);
        $msg="Category Deactiveted";
        $class="alert-danger";
         ?>
        <script> window.location="../view/category.php?sub_cat=category & msg=<?php echo $msg;?> & class=<?php echo $class; ?>";</script>
   <?php
        break;
    
    case "activateSubCategory":
        $sub_cat_id=$_REQUEST["sub_cat_id"];
        $productObj->activateSubCategory($sub_cat_id);
        $msg="Category activeted";
        $class="alert-success";
         ?>
        <script> window.location="../view/category.php?sub_cat=category & msg=<?php echo $msg;?> & class=<?php echo $class; ?>";</script>
   <?php
        break;
    
    
}