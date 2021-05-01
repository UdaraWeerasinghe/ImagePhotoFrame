<?php
include '../model/order-model.php'; ////include orderb model
$orderObj=new Order();
include '../model/log-model.php'; ////include log model
$logObj= new Log();

$status=$_REQUEST["status"];
switch ($status){
    
    case "viewOrderModale":  //lod body of the modal
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
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=0;
                                $total=0;
                    while ($oRow=$orderResult->fetch_assoc()){
                        $sizeResult=$orderObj->getSizeByPId($oRow["size_id"]);
                        $sRow=$sizeResult->fetch_assoc();
                            $no++;
                            $total=$total+$oRow["unit_price"]*$oRow["quantity"];
                                 
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $oRow["product_name"]."(".$sRow['width']."&Prime;"."&#215;".$sRow['height']."&Prime;".")";?></td>
                                    <td style="text-align: center"><?php echo $oRow["quantity"]; ?></td>
                                    <td><?php echo "Rs.".number_format($oRow["unit_price"]*$oRow["quantity"],2)?></td>
                                </tr>
                    <?php } ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><hr style="margin: 0px;"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-weight: bold;">Sub Total</td>
                                    <td></td>
                                    <td style="font-weight: bold;"><?php echo "Rs.".number_format($total,2); ?></td>
                                </tr>
                                <?php
                    if($tRow["order_payment_status"]=='1'){
                        ?>
                                </tbody>
                        </table>
                    
                            <?php
                    }else if($tRow["order_payment_status"]=='2'){
                        ?>
                                <tr>
                                    <td></td>
                                    <td style="font-weight: bold">Outstanding Amount</td>
                                    <td></td>
                                    <td style="font-weight: bold; color: orangered"><?php echo "Rs.".number_format($total/2,2); ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                        </table>
                                <?php
                    }else if($tRow["order_payment_status"]=='0'){
                        ?>
                                <tr>
                                    <td></td>
                                    <td style="font-weight: bold">Outstanding Amount</td>
                                    <td></td>
                                    <td style="font-weight: bold; color: orangered"><?php echo "Rs.".number_format($total,2); ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                    }?>
                        <div class="modal-footer">
                            <?php
                            if(isset($_REQUEST["onProcess"])){
                                ?>
                            <a type="button" class="btn btn-sm btn-warning" href="../controller/order-controller.php?status=completed&oId=<?php echo base64_encode($orderId); ?>">Completed</a>
                                <?php
                            }else if(isset($_REQUEST["completed"])){
                                ?>
                            <a type="button" class="btn btn-sm btn-warning" href="../controller/order-controller.php?status=startDeliveryProcess&oId=<?php echo base64_encode($orderId); ?>">Start Delivery</a>
                                <?php
                            }else if(isset ($_REQUEST["onDelivery"])){
                                ?> 
                            <!--/on delivery move to the delivery  anage menagemnt/-->
                            <!--<a type="button" class="btn btn-sm btn-warning" href="../controller/order-controller.php?status=handOver&oId=<?php echo base64_encode($order_row["order_id"]); ?>">Delivery Complete</a>-->
                                <?php
                            }else if(isset ($_REQUEST["fineshedOrder"])){
                                ?>
                           
                                <?php
                            }
                            else {
                               ?>
                            <form method="post" action="../controller/inventory-controller.php?status=startProcess&oId=<?php echo base64_encode($orderId); ?>">
                                <?php
                            $orderProduct=$orderObj->getOrdersProductDetailsById($orderId);
                            while($opRow=$orderProduct->fetch_assoc()){
                                ?>
                                    <input type="hidden" name="mId[]" value="<?php echo $opRow["material_id"]; ?>">
                                        <?php 
                                        $length=($opRow['width']+$opRow['height']+1)*$opRow['quantity'];    ///calculate lenth of frame
                                        $squareInch=($opRow['width']*$opRow['height']+1)*$opRow['quantity']  //calculate squreinchers
                                        ?>
                                    <input type="hidden" name="length[]" value="<?php echo $length; ?>">
                                    <input type="hidden" name="squareInch[]" value="<?php echo $squareInch; ?>">
                            <?php } ?>
                                <input type="submit" class="btn btn-sm btn-warning" value="Start Process">
                            </form>
                            <?php
                            }
                            ?>
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button> 
                        </div>
                        <?php
                    break;
                    
                    case "completed":
                        $order_id= base64_decode($_REQUEST["oId"]);
                        $orderObj->completeProcess($order_id);
                        
                        session_start();
                        $userId=$_SESSION["user"]["user_id"];
                        $activity="Set order completed"." ".base64_decode($_REQUEST["oId"]);
                        $logObj->addLog($userId, $activity); //add log
                        
                         header("Location:../view/on-process.php?alert=completed");
                        break;
                    case "startDeliveryProcess":
                        $order_id= base64_decode($_REQUEST["oId"]);
                        $orderObj->onDeliveryProcess($order_id);
                        
                        session_start();
                        $userId=$_SESSION["user"]["user_id"];
                        $activity="Start order delivery"." ".base64_decode($_REQUEST["oId"]);
                        $logObj->addLog($userId, $activity); //add log
                        
                         header("Location:../view/completed.php?alert=startDeliveryProcess");
                        break;

}
