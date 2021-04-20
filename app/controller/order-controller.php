<?php
include '../model/order-model.php';
$orderObj=new Order();

$status=$_REQUEST["status"];
switch ($status){
    
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
                            <a type="button" class="btn btn-sm btn-warning" href="../controller/order-controller.php?status=startDelivery&oId=<?php echo base64_encode($orderId); ?>">Start Delivery</a>
                                <?php
                            }else if(isset ($_REQUEST["onDelivery"])){
                                ?>
                            <a type="button" class="btn btn-sm btn-warning" href="../controller/order-controller.php?status=handOver&oId=<?php echo base64_encode($order_row["order_id"]); ?>">Delivery Complete</a>
                                <?php
                            }else if(isset ($_REQUEST["fineshedOrder"])){
                                ?>
                           
                                <?php
                            }
                            else {
                               ?>
                            <form method="post" action="../controller/inventory-controller.php?status=startProcess&oId=<?php echo base64_encode($orderId); ?>">
                                <?php
                            $orderProduct=$orderObj->getOrdersProductById($orderId);
                            while($opRow=$orderProduct->fetch_assoc()){
                                $pId=$opRow["product_id"];
                                $mResult=$orderObj->getMaterialById($pId);
                                $mRow=$mResult->fetch_assoc();
                                ?>
                                    <input type="hidden" name="mId[]" value="<?php echo $mRow["material_id"]; ?>">
                                        <?php 
                                        $sizeId=$opRow["size_id"]; 
                                        $sizeResult=$orderObj->getSizeByPId($sizeId);
                                        $sRow=$sizeResult->fetch_assoc();
                                        $length=$sRow['width']+$sRow['height']+1;
                                        $squareInch=$sRow['width']*$sRow['height']+1;
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
                         header("Location:../view/on-process.php?alert=completed");
                        break;
                    case "startDelivery":
                        $order_id= base64_decode($_REQUEST["oId"]);
                        $orderObj->onDelivery($order_id);
                         header("Location:../view/completed.php?alert=startDelivery");
                        break;
                    
                    case "handOver":
                        $order_id= base64_decode($_REQUEST["oId"]);
                        $orderObj->handOver($order_id);
                         header("Location:../view/on-delivery.php?alert=startDelivery");
                        break;
}
