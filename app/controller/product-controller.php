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
        $subCategory=$_POST['sub_cat_id'];
       
        foreach ($subCategory as $f) {
                 $productObj->addCategorySubCategory($catId,$f);
        }
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
                <label>Material Name</label>
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
        
    
    case "addDesign":
        $dNanme=$_POST["dNanme"];
        $dCode=$_POST["dCode"];
        $material=$_POST["material"];
        $frameType=$_POST["frameType"];
        $color=$_POST["color"];
        if($_FILES["img1"]["name"]!="")
                {
                    $img1=$_FILES["img1"]["name"];
                    $img1="".time()."_".$img1;
                    /// obtain temporary location
                   $tmp= $_FILES["img1"]["tmp_name"];
                   $destination="../../images/design_image/$img1";
                   move_uploaded_file($tmp, $destination); 
                }
        if($_FILES["img2"]["name"]!="")
                {
                    $img2=$_FILES["img2"]["name"];
                    $img2="".time()."_".$img2;
                    /// obtain temporary location
                   $tmp= $_FILES["img2"]["tmp_name"];
                   $destination="../../images/design_image/$img2";
                   move_uploaded_file($tmp, $destination); 
                }       
        $productObj->addDesign($dNanme, $dCode, $material, $frameType, $color, $img1, $img2);
        $msg="Successfully add design"." ".$dNanme;
        $class="alert-success";
         ?>
        <script> window.location="../view/product.php?msg=<?php echo $msg;?> & class=<?php echo $class; ?>";</script>
   <?php
        break;
        
        
        case "paginate":
            $page=$_POST['page'];
            $txt=$_POST["txt"];
            
            include_once '../model/product-model.php';
            $productObj=new Product();
            $productResult=$productObj->getAllProduct($page,$txt);
            
            
            ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                           
                            <th>Product Name</th>
                            <th>Color</th>
                            <th>Availability</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($prow=$productResult->fetch_assoc()) {
                            ?>
                        <tr>
                            <td><img width="30px" height="30px" src="../../images/design_image/<?php echo $prow['product_img_1']; ?>">&nbsp;&nbsp;<?php echo $prow['product_name']; ?></td>
                            <td><?php echo $prow['product_color']; ?></td>
                            <td>
                                <?php
                                if($prow['product_status']==1){
                                    echo 'Available';
                                } else {
                                    echo 'Not Available';
                                }
                                ?>
                            </td>
                            <th>
                                <a class="btn btn-info"><i class="far fa-print-search" style="margin: 4px"></i></a>
                                <?php
                                if($prow['product_status']==1){
                                    ?>
                                    <a class="btn btn-success">Activate</a>
                                <?php
                                } else {
                                    ?>
                                    <a class="btn btn-danger">Deactivate</a>
                                    <?php
                                }
                                ?>
                            </th>
                        </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                
                <div class="row">
                    <div class="col-12">
                        <ul class="pagination">
                            <?php
                            $ecount=$productObj->getProductCount();
                            $numOfPage=$ecount/5;
                            $ceilpages= ceil($numOfPage);
                            for($x=1; $x<=$ceilpages; $x++){
                                ?>
                            <li class="page-item <?php if($x==$page){echo 'active';} ?>">
                                <a class="page-link" href="#" onclick="navigatopage(<?php echo $x; ?>)"><?php echo $x; ?></a>
                            </li>
                            <?php
                            }
                            ?>
                            
                        </ul>
                    </div>
                </div>
        <?php
        break;
}