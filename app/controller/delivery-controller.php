<?php
include '../model/delivery-model.php'; //include delivery model
$deliveryObj=new Delivery();
include '../model/order-model.php';     ///include order model
$orderObj=new Order();
include '../model/log-model.php';   ///include log model
$logObj= new Log();

$status=$_REQUEST["status"];
switch ($status){
    
    case "startDelivery":
      
        $deliveryObj->startDelivery(base64_decode($_REQUEST["orderId"]));
        session_start();
        $userId=$_SESSION["user"]["user_id"];
        $activity="Start delivery"." ".base64_decode($_REQUEST["orderId"]);
        $logObj->addLog($userId, $activity); //add log
        
        $msg= base64_encode("Started Order delivery");
        header("Location:../view/delivery.php?alert&type=success&name=&msg=$msg");
        break;
    
    case "handover":
      
        $deliveryObj->handover(base64_decode($_REQUEST["orderId"]));
        $msg= base64_encode("Successfully handover");
        
        session_start();
        $userId=$_SESSION["user"]["user_id"];
        $activity="Handover order"." ".base64_decode($_REQUEST["orderId"]);
        $logObj->addLog($userId, $activity); //add log
        
        header("Location:../view/on-delivery.php?alert&type=success&name=&msg=$msg");
        break;
    case "CustomerMail":
        $email=$_POST["email"];
        $name=$_POST["name"];
      ?>
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <label>Email Address</label>
        <input class="form-control mb-4" type="text" name="email" value="<?php echo $email ?>" readonly="readonly">
        <div>
            <label>Subject</label>
            <input class="form-control mb-4" type="text" id="subject" name="subject" placeholder="Enter the subject of Email...">
            <div class="invalid-tooltip" id="subjectTooltip" style="position: relative; top: -10px"></div>
        </div>
        <label>Body</label>
        <textarea class="form-control" name="body" id="body" style="height: 150px;">Dear <?php echo $name; ?>,</textarea>
          <div class="invalid-tooltip" id="bodyTooltip" style="position: relative;"></div>
          <?php
        break;
    
    case "sendCustomerMail":
        session_start();
        $userId=$_SESSION["user"]["user_id"];
        $activity="Sent email to"." ".$_POST["email"];
        $logObj->addLog($userId, $activity); //add log
        
        $email=$_POST["email"];
        $subject=$_POST["subject"];
        $body=$_POST["body"];
        
        require '../../includes/phpMailer-header.php';

        $mail->setFrom('imagephotoframs@gmail.com');
        $mail->addAddress($email);     
        $mail->addReplyTo('imagephotoframs@gmail.com', 'Information');


        $mail->isHTML(FALSE);                                  
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = $body;
        
        $name= base64_encode($_REQUEST["name"]);
        $msg= base64_encode("Successfully Sent");
        
        if ($mail->Send()) { 
            header("Location:../view/delivery.php?alert&type=success&name=$name&msg=$msg"); 
            }
            else{
                echo $mail->ErrorInfo;
            }
        break;
        
     case "viewOrderModale":
                    $orderId=$_POST["orderId"];
                    $oResult=$orderObj->getOrdersById($orderId);
                    $tRow=$oResult->fetch_assoc();
                    $orderResult=$orderObj->getOrderByOrderId($orderId);
                    ?>
                    <label style="font-weight: bold">Order Id :&nbsp;</label><?php echo $orderId ?> &nbsp;|&nbsp;
                    <?php $timestamp = strtotime($tRow["order_timestamp"]); ?>
                    <label style="font-weight: bold">Date :&nbsp;</label><?php echo date('d-m-Y', $timestamp); ?>&nbsp;|&nbsp;
                    <label style="font-weight: bold">Time :&nbsp;</label><?php echo date('h:i:sa', $timestamp); ?>
                    <label style="font-weight: bold">Customer Name :&nbsp;</label><?php echo $tRow["customer_fName"]." ".$tRow["customer_lName"]; ?><br>
                        <?php
                    if($tRow["order_payment_status"]=='1'){
                        ?>
                    <label style="font-weight: bold">Payment Status :&nbsp;</label> 
                    <label style="background-color: #28a745; font-size: 14px; color: white;padding: 3px; border-radius: 5px;">Completed </label>  
                     <?php
                    }else if($tRow["order_payment_status"]=='2'){
                        ?>
                    <label style="font-weight: bold">Payment Status :&nbsp;</label> 
                    <label style="background-color: #ffc107; font-size: 14px; padding: 3px; border-radius: 5px;">Not Completed </label>  
                        <?php
                    }else if($tRow["order_payment_status"]=='0'){
                        ?>
                    <label style="font-weight: bold">Payment Status :&nbsp;</label> 
                    <label style="background-color: #dc3545; font-size: 14px; color: white; padding: 3px; border-radius: 5px;">Not Paid </label>  
                        <?php
                    }
                    ?>
                    <table class="table table-borderless table-sm table-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=0;
                                $totalQty=0;
                    while ($oRow=$orderResult->fetch_assoc()){
                        $sizeResult=$orderObj->getSizeByPId($oRow["size_id"]);
                        $sRow=$sizeResult->fetch_assoc();
                            $no++;
                            $totalQty=$totalQty+$oRow["quantity"];
                                 
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $oRow["product_name"]."(".$sRow['width']."&Prime;"."&#215;".$sRow['height']."&Prime;".")";?></td>
                                    <td style="text-align: center"><?php echo $oRow["quantity"]; ?></td>
                                </tr>
                    <?php } ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><hr style="margin: 0px;"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-weight: bold;">Total quantity</td>
                                    <td style="font-weight: bold;"><?php echo $totalQty; ?></td>
                                </tr>
                                </tbody>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button> 
                        </div>
                        <?php
                    break;
}
