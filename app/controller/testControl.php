//    case "addCategory":
//        $cat_name=$_POST["cat_name"];
//        
//        $idResult=$productObj->getCatInserId();
//                $nor=$idResult->num_rows;
//                if($nor==0){
//                    $newid = "CAT00001";
//                }
//                else{
//                    $idRow=$idResult->fetch_assoc();
//                    $lid=$idRow["cat_id"];
//                    $num=substr($lid, 3);
//                    $num++;
//                    $newid = "CAT".str_pad($num,5,"0",STR_PAD_LEFT);
//                    
//                   $isAdded=$productObj->addCategory($newid,$cat_name);
//                
//                if($isAdded=="true"){
//                    
//                    $subCategory=$_POST['sub_cat_id'];
//       
//                foreach ($subCategory as $f) {
//                         $productObj->addCategorySubCategory($newid,$f);
//                        }
//        header("Location:../view/category.php?alert=materialAdd");
//                    }
//                }
//
//    break;

//    case "deactivateCategory":
//        $cat_id=$_REQUEST["cat_id"];
//        $productObj->deactivateCategory($cat_id);
//        header("Location:../view/category.php?alert=deactivated");
//        break;
//    
//    case "activateCategory":
//        $cat_id=$_REQUEST["cat_id"];
//        $productObj->activateCategory($cat_id);
//        header("Location:../view/category.php?alert=activated");
//        break;
    
    
//    case "edit_category":
//        $cat_id=$_POST["cat_id"];
//        $catResult=$productObj->getCategory($cat_id);
//        $catRow=$catResult->fetch_assoc();
//        ?>
<!--        <div class="row">
            <div class="col-md-4">
                <label>Material Name</label>
            </div>
            <div class="col-md-8">
                <input type="hidden" name="cat_id" value="//<?php // echo $cat_id; ?>">
                <input name="cat_name" type="text" value="//<?php // echo $catRow['cat_name'] ?>" class="form-control">
            </div>
        </div>-->
        <?php
//        break;
    
//    case "updateCategory":
//        $cat_id=$_POST["cat_id"];
//        $cat_name=$_POST["cat_name"];
//        $productObj->updateCategory($cat_id,$cat_name);
//        header("Location:../view/category.php?alert=update");
//         
//        break;