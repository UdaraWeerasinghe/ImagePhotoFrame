<?php
include '../model/inventory-model.php';
$inventoryObj=new Inventory();

$status=$_REQUEST["status"];
switch ($status){
    
    case "addMaterial":
        $mName= $_POST["mName"];
        $mType= $_POST["mType"];
        $idResult=$inventoryObj->getMaterialInserId();
                $nor=$idResult->num_rows;
                if($nor==0){
                    $newid = "MAT00001";
                }
                else{
                    $idRow=$idResult->fetch_assoc();
                    $lid=$idRow["material_id"];
                    $num=substr($lid, 3);
                    $num++;
                    $newid = "MAT".str_pad($num,5,"0",STR_PAD_LEFT);
                    
                    $inventoryObj->addMaterial($newid,$mName, $mType);
                }
            
        header("Location:../view/inventory.php?alert=materialAdded");
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
//                
            $order_id= base64_decode($_REQUEST["oId"]);
            $mId=$_POST["mId"];
            
            $x= sizeof($_POST["length"]);
            
            for($i=0; $i<$x; $i++){
                $length=$_POST["length"][$i]/12; //conver to feets 
                $squareInch=$_POST["squareInch"][$i]/12; //conver to feets 
                $mId=$_POST["mId"][$i];
                $qty=$inventoryObj->getMaterialLengthById($mId);
                $row=$qty->fetch_assoc();
                echo $nQty=$row["qty"]-$length;
                $inventoryObj->updateQty($mId, $nQty);
                
                $gQty=$inventoryObj->getMaterialLengthById('MAT00001');
                $gRow=$gQty->fetch_assoc();
                $gRow["qty"];
                $nqQty=$gRow["qty"]-$squareInch;
                $inventoryObj->updateQty('MAT00001', $nqQty);
                
                $bQty=$inventoryObj->getMaterialLengthById('MAT00002');
                $bRow=$bQty->fetch_assoc();
                $nbQty=$bRow["qty"]-$squareInch;
                $inventoryObj->updateQty('MAT00002', $nbQty);
            }
                $inventoryObj->startProcess($order_id);
                
                $customerResult=$inventoryObj->getCustomerByOId($order_id);
                $cRow=$customerResult->fetch_assoc();
                $customerName=$cRow["customer_fName"]." ".$cRow["customer_lName"];
                
    require '../../includes/phpMailer-header.php';

    $mail->setFrom('imagephotoframs@gmail.com');
    $mail->addAddress('udaraw1997@gmail.com');     
    $mail->addReplyTo('imagephotoframs@gmail.com', 'Information');


    $mail->isHTML(true);                                  
    $mail->Subject = 'Order';
    $mail->Body    = ''
            . '<div style="width:100%; background-color: #c7cfb7; padding: 0 10% 0 10%">'
            . '<div style="width:80%; background-color: white;">'
            . '<div style="width:100%; height:60px; display: flex;">'
            . '<div style="width: 50%; height:50px;"><img width="180px" height="50px" src="cid:icon"></div>'
            . '<div style="width: 50%; height:50px; text-align: right; margin-top:30px; margin-right:10px;">'
            . '<a href="http://localhost/imagePhotoFrameWeb/app/view/order.php" style="text-decoration:none;">My order | &nbsp;</a>'
            . '<a href="http://localhost/imagePhotoFrameWeb/app/view/profile.php" style="text-decoration:none;">My account | &nbsp;</a>'
            . '<a href="http://localhost/imagePhotoFrameWeb/app/view/contact.php" style="text-decoration:none;">Contact us</a>'
            . '</div>'
            . '</div>'
            . '<div style="width:100%; position: fixed; top: 100px; padding: 10px 0px 10px 0px; background-color: #09015f; text-align: center; color: white; font-style: italic;">'
            . '<h1 style="margin: 0">THANKS FOR</h1>'
            . '<h4 style="margin: 0">Choosing To Shop At Image Photo Frames</h4>'
            . '</div>'
            . '<div style="padding: 0 15px; color: black">'
            . '<p style="font-weight:bold;">Dear '.$customerName.',</p>'
            . '</div>'
            . '<div style="padding: 0 40px; color: black">'
            . '<p>Thank you for shopping with us.Your order number is '.$order_id.'.</p>'
            . '</div>'
            . '</div>'
            . '</div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->AddEmbeddedImage('../../images/system/icon.jpg', 'icon');
    
    if ($mail->Send()) { 
        header("Location:../view/order.php?alert=success");           
}else{
    echo $mail->ErrorInfo;
}
                
                 
                break;
                
}
