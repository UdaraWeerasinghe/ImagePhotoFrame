<?php
include '../model/payment-model.php';   //include payment model
$paymentrObj=new Payment();      //create payment objret        

$status=$_REQUEST["status"];
switch ($status){
    
    case "addTax":
       $paymentrObj->addTax($_POST["texName"],$_POST["texpres"]);
        break;
    case "viewPayment":  ///body of the view payment in payment.php
        $taxResult=$paymentrObj->getTax();
        $tRow=$taxResult->fetch_assoc();
        $taxAmount=$tRow["precentage"];
        $pId=$_POST["pId"];//getayment id from post
        $paymentResult=$paymentrObj->getPaymentByPId($pId);
        $pRow=$paymentResult->fetch_assoc();
        ?>
        <label style="font-weight: bold">Payment Id :&nbsp;</label><?php echo $pId; ?> <br>
        <label style="font-weight: bold">Order Id :&nbsp;</label><?php echo $orderId=$pRow["order_id"]; ?>&nbsp;|&nbsp;
        <label style="font-weight: bold">Date :&nbsp;</label><?php echo date("Y-m-d",strtotime($pRow["payment_timestamp"])); ?>&nbsp;|&nbsp;
        <label style="font-weight: bold">Time :&nbsp;</label><?php echo date("h:m:s a",strtotime($pRow["payment_timestamp"])); ?>
 
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
                            $productResult=$paymentrObj->getproductByorderId($orderId);
                        while ($proRow=$productResult->fetch_assoc()){
                            $no++;
                            $total=$total+$proRow["unit_price"]*$proRow["quantity"];
                            ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $proRow["product_name"]."(".$proRow["width"]."&Prime;"."&#215;".$proRow["height"]."&Prime;".")"; ?></td>
                        <td><?php echo $proRow["quantity"]; ?></td>
                        <td>Rs.<?php echo number_format($proRow["unit_price"]*$proRow["quantity"],2); ?></td>
                    </tr>
                            <?php
                        }
                            ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><hr style="margin: 0px;"></td>
                    </tr>
                     <tr>
                        <td></td>
                        <td><b>Sub Total</b></td>
                        <td></td>
                        <td>Rs.<?php echo number_format($total,2); ?></td>
                    </tr>
                 <tr>
                  
                    <td>tax</td>
                    <td></td>
                    <td style="text-align: right"><?php echo $taxAmount."%"; ?></td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%">
            <thead>
                <tr>
                    <th>Payment Id</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Amount</th>
                </tr>
            </thead>
        
                <?php
                $totalPaid=0;
                $paymentHistory=$paymentrObj->getPaymentByOrderId($orderId);
                while($phRow=$paymentHistory->fetch_assoc()){   
                    $totalPaid=$totalPaid+$phRow["payment_amount"];
                ?>
                <tr>
                    <td></td>
                    <td>total amount</td>
                    <td></td>
                    <td style="text-align: right">Rs.<?php echo number_format($phRow["payment_amount"],2) ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>tax amount</td>
                    <td></td>
                    <td style="text-align: right">Rs.<?php echo number_format(($phRow["payment_amount"]*$taxAmount/100),2) ?></td>
                </tr>
                <tr>
                    <td><?php echo $phRow["payment_id"] ?></td>
                    <td><?php echo date("Y-m-d",strtotime($phRow["payment_timestamp"])) ?></td>
                    <td><?php echo date("h:m:s a",strtotime($phRow["payment_timestamp"])) ?></td>
                    <td style="text-align: right">Rs.<?php echo number_format($phRow["payment_amount"]*($taxAmount+100)/100,2) ?></td>
                </tr>
<!--                <tr>
                    <td></td>
                    <td>tax</td>
                    <td></td>
                    <td style="text-align: right"><?php // echo $taxAmount."%"; ?></td>
                </tr>-->
                <?php
                }?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><hr style="margin: 0"></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2"><b>Total paid amount</b></td>
                    <td style="text-align: right">Rs.<?php echo number_format(($totalPaid*($taxAmount+100)/100),2); ?></td>
                </tr>
                <?php
                if($total>$totalPaid){
                    ?>
                <tr>
                    <td></td>
                    <td colspan="2" style="color: orangered"><b>Outstanding Payment</b></td>
                    <td style="text-align: right; color: orangered">Rs.<?php echo number_format(($total-$totalPaid),2); ?></td>
                </tr>
                <?php
                }
                else if($total<=$totalPaid){
                     ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: right"><label style="background-color: #28a745; font-size: 14px; color: white;padding: 3px; border-radius: 5px;">Payment Completed </label></td>
                </tr>
                <?php 
                }
                ?>
        </table> 
        <?php
        break;
}