<?php
include '../model/inventory-model.php';
$inventoryObj=new Inventory();

$status=$_REQUEST["status"];
switch ($status){
    
    case "addMaterial":
        $mName= $_POST["mName"];
        $mType= $_POST["mType"];
            
        $inventoryObj->addMaterial($mName, $mType);
        header("Location:../view/inventory.php");
            break;
        
    case "loadQty":
        $mId=$_POST["material_id"];
        ?>
        <div class="row">
            <div class="col-md-4">
                <label>Strip Feets</label>
            </div>
            <div class="col-md-8">
                <input type="hidden" name="mId" value="<?php echo $mId; ?>">
                <input name="mQty" type="number" class="form-control" min="0" onkeypress="return isNumberKey(event)">
            </div>
        </div>
        <?php
        break;
    
        case "addQty":
            $mId=$_POST["mId"];
            $qty=$_POST["mQty"];
            $mResult=$inventoryObj->getMaterialById($mId);
            $mRow=$mResult->fetch_assoc();
            $qty=$mRow["qty"]+$qty;
            $inventoryObj->addMaterialQty($mId,$qty);
            break;
        
        case "getStrip":
            $mType=$_POST["sType"];
            $stripResult=$inventoryObj->getMaterialBytype($mType);
            
                while ($sRow=$stripResult->fetch_assoc()){
                    ?>
                <option value="<?php echo $sRow['material_id'] ?>"><?php echo $sRow['material_name'] ?></option>
                
                <?php
                 } 
            break;
}
