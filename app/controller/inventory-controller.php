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
            
            case "addReason":
                $reason=$_POST["reason"];
                $order_id=$_POST["orderId"];
                
                $inventoryObj->rejectOrderStatus($order_id,$reason);
               
                header("Location:../view/order.php");
                break;
            
            case "startProcess":
                
            $order_id=$_REQUEST["oId"];
            $mId=$_POST["mId"];
            
            $x= sizeof($_POST["length"]);
            
            for($i=0; $i<$x; $i++){
                $length=$_POST["length"][$i]/12; //conver to feets 
                $squareInch=$_POST["squareInch"][$i]/12; //conver to feets 
                $mId=$_POST["mId"][$i];
                $qty=$inventoryObj->getMaterialLengthById($mId);
                $row=$qty->fetch_assoc();
                $nQty=$row["qty"]-$length;
                $inventoryObj->updateQty($mId, $nQty);
                
                $gQty=$inventoryObj->getMaterialLengthById('1');
                $gRow=$gQty->fetch_assoc();
                $nqQty=$gRow["qty"]-$squareInch;
                $inventoryObj->updateQty('1', $nqQty);
                
                $bQty=$inventoryObj->getMaterialLengthById('2');
                $bRow=$bQty->fetch_assoc();
                $nbQty=$bRow["qty"]-$squareInch;
                $inventoryObj->updateQty('2', $nbQty);
            }
                $inventoryObj->startProcess($order_id);
                 header("Location:../view/order.php");
                break;
}
