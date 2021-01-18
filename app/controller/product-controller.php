<?php
include '../model/product-model.php';
$productObj=new Product();

$status=$_REQUEST["status"];
switch ($status){
    
    case "addCategory":
        $cat_name=$_POST["cat_name"];
        
        $idResult=$productObj->getCatInserId();
                $nor=$idResult->num_rows;
                if($nor==0){
                    $newid = "CAT00001";
                }
                else{
                    $idRow=$idResult->fetch_assoc();
                    $lid=$idRow["cat_id"];
                    $num=substr($lid, 3);
                    $num++;
                    $newid = "CAT".str_pad($num,5,"0",STR_PAD_LEFT);
                    
                   $isAdded=$productObj->addCategory($newid,$cat_name);
                
                if($isAdded=="true"){
                    
                    $subCategory=$_POST['sub_cat_id'];
       
                foreach ($subCategory as $f) {
                         $productObj->addCategorySubCategory($newid,$f);
                        }
        header("Location:../view/category.php?alert=materialAdd");
                    }
                }

    break;

    case "deactivateCategory":
        $cat_id=$_REQUEST["cat_id"];
        $productObj->deactivateCategory($cat_id);
        header("Location:../view/category.php?alert=deactivated");
        break;
    
    case "activateCategory":
        $cat_id=$_REQUEST["cat_id"];
        $productObj->activateCategory($cat_id);
        header("Location:../view/category.php?alert=activated");
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
        header("Location:../view/category.php?alert=update");
         
        break;
    
        case "addSubCategory":
        $sub_cat_name=$_POST["sub_cat_name"];
        $subCatId=$productObj->addSubCategory($sub_cat_name);
        $category=$_POST['cat_name'];
        $size=$_POST['sub_cat_size'];
        foreach ($category as $f) {
                 $productObj->addCategorySubCategory($f,$subCatId);
        }
        foreach ($size as $s) {
                 $productObj->addSubCategorySize($subCatId,$s);
        }
        header("Location:../view/category.php?alert=subCatAdded");

    break;
    
    case "deactivateSubCategory":
        $sub_cat_id=$_REQUEST["sub_cat_id"];
        $productObj->deactivateSubCategory($sub_cat_id);
        header("Location:../view/category.php?alert=deactivated");
        break;
    
    case "activateSubCategory":
        $sub_cat_id=$_REQUEST["sub_cat_id"];
        $productObj->activateSubCategory($sub_cat_id);
        header("Location:../view/category.php?alert=activated");
         
        break;
    
    case "addDesign":
        $dNanme=$_POST["dNanme"];
        $dCode=$_POST["dCode"];
        $material=$_POST["material"];
        $frameType=$_POST["frameType"];
        $color=$_POST["color"];
        $mId=$_POST["fStrip"];
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
        $proId=$productObj->addDesign($dNanme, $dCode, $material, $frameType, $color, $img1, $img2);
        $productObj->setMaterialProduct($proId, $mId);
        $msg="Successfully add design"." ".$dNanme;
        $class="alert-success";
        
        if ($proId>0) {
                if (isset($_POST['sizeId'])){
                    $numberlegth= sizeof($_POST['sizeId']);
                    $numberlegth;
                    for($i=0; $i<$numberlegth; $i++){
                        $size_id=$_POST['sizeId'][$i];
                        $price=$_POST[$size_id];
//                        echo $size_id;
//                         echo $price;
                      $productObj->addPrice($size_id, $price, $proId);
                    }
                }
            }
        
         ?>
        <script> window.location="../view/product.php?msg=<?php echo $msg;?> & class=<?php echo $class; ?>";</script>
   <?php
        break;
        
    case "getType":
        $subCatId=$_POST['sub_cat_id'];
        $productResult=$productObj->getSizeByType($subCatId);
        ?>
        <div class="row mb-3" style="font-weight: bolder">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-3">Size</div>
                    <div class="col-md-9">Price</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-3">Size</div>
                    <div class="col-md-9">Price</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-3">Size</div>
                    <div class="col-md-9">Price</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-3">Size</div>
                    <div class="col-md-9">Price</div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <?php
            $count=0;
        while ($tRow=$productResult->fetch_assoc()){
            $count++; 
        ?>
            <div class="col-md-3">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <?php echo $tRow['width']."&Prime;"."&#215;".$tRow['height']."&Prime;"; ?>
                    </div>
                    <div class="col-md-7">
                        
                        <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Rs.</span>
                                </div>
                            <input type="number" min="0" onkeypress="return isNumberKey(event)" name="<?php echo $tRow['size_id']; ?>" class="form-control" required>
                            <input name="sizeId[]" value="<?php echo $tRow['size_id']; ?>" hidden>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <?php if ($count % 4 == 0){
                ?>
        </div>   
        <div class="row">
        <?php
        }
        }
        ?>
        </div>
        <?php
        
        break;
}