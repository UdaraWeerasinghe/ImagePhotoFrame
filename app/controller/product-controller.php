<?php
include '../model/product-model.php';
$productObj=new Product();

$orderObj=new Order();
include '../model/log-model.php';   ///include log model
$logObj= new Log();

$status=$_REQUEST["status"];
switch ($status){
    
        case "addSubCategory":
            $sub_cat_name=$_POST["sub_cat_name"];
            $idResult=$productObj->getDesignInserId();
            $nor=$idResult->num_rows;
                if($nor==0){
                    $newid = "DES00001";
                }
                else{
                    $idRow=$idResult->fetch_assoc();
                    $lid=$idRow["sub_cat_id"];
                    $num=substr($lid, 3);
                    $num++;
                    $newid = "DES".str_pad($num,5,"0",STR_PAD_LEFT);
                    
                    $isAdded=$productObj->addSubCategory($newid,$sub_cat_name);
                    
                    if($isAdded=="true"){
                    $size=$_POST['sub_cat_size'];
                    
                    foreach ($size as $s) {
                 $productObj->addSubCategorySize($newid,$s);
                }
                session_start();
                $userId=$_SESSION["user"]["user_id"];
                $activity="Add sub category"." ".$newid;
                $logObj->addLog($userId, $activity); //add log
                
                header("Location:../view/category.php?alert=subCatAdded");
                }
                    
                }
 

    break;
    
    case "deactivateSubCategory":
        $sub_cat_id=$_REQUEST["sub_cat_id"];
        $productObj->deactivateSubCategory($sub_cat_id);
        
        session_start();
        $userId=$_SESSION["user"]["user_id"];
        $activity="Deactivate sub category"." ".$sub_cat_id;
        $logObj->addLog($userId, $activity); //add log
        
        header("Location:../view/category.php?alert=deactivated");
        break;
    
    case "activateSubCategory":
        $sub_cat_id=$_REQUEST["sub_cat_id"];
        $productObj->activateSubCategory($sub_cat_id);
        
        session_start();
        $userId=$_SESSION["user"]["user_id"];
        $activity="Activate sub category"." ".$sub_cat_id;
        $logObj->addLog($userId, $activity); //add log
        
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
                $idResult=$productObj->getProductInserId();
                $nor=$idResult->num_rows;
                if($nor==0){
                    $newid = "PR00001";
                }
                else{
                    $idRow=$idResult->fetch_assoc();
                    $lid=$idRow["product_id"];
                    $num=substr($lid, 2);
                    $num++;
                    $newid = "PR".str_pad($num,5,"0",STR_PAD_LEFT);
                    
                    $isAdded=$productObj->addDesign($newid,$dNanme, $dCode, $material, $frameType, $color, $img1, $img2);
                
                    if($isAdded=="true"){
                        
                        $productObj->setMaterialProduct($newid, $mId);
                         
                        
                if (isset($_POST['sizeId'])){
                    $numberlegth= sizeof($_POST['sizeId']);
                    $numberlegth;
                    for($i=0; $i<$numberlegth; $i++){
                        $size_id=$_POST['sizeId'][$i];
                        $price=$_POST[$size_id];
//                        echo $size_id;
//                         echo $price;
                      $productObj->addPrice($size_id, $price, $newid);
                    }
                }
                    }
                }
        session_start();
        $userId=$_SESSION["user"]["user_id"];
        $activity="Add new design"." ".$newid;
        $logObj->addLog($userId, $activity); //add log
                header("Location:../view/product.php?alert=designAdded");
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