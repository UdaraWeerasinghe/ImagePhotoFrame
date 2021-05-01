<?php
include '../model/order-model.php';
include '../model/inventory-model.php';


$orderObj=new Order();
    $orderResult=$orderObj->getOrderCountByStatus();  //count in dashbord top row
    $countRow=$orderResult->fetch_assoc();
$inventoryObj=new Inventory();
    $lowStock=$inventoryObj->getLowOfStock(); ///get low sock
    $low=$lowStock->fetch_assoc();

$status=$_REQUEST["status"];
switch ($status){
    
    case "refreshOrder":
        
        ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div style="padding: 10px">
                                <a href="#" id="newOrderNoti" style="text-decoration: none;">
                                    <div class="row " style="border: #173F5F solid 2px; border-radius: 10px; padding: 20px 5px;">
                                        <div class="col-4">
                                            <div style="text">
                                                <i class="fad fa-cart-arrow-down fa-4x" style="color: #173F5F"></i>
                                            </div>
                                        </div>
                                        <div class="col-8" style="padding-left: 30px;color: black">
                                            <div>
                                                New Orders
                                            </div>
                                            <div id="newOrderCount">
                                                <?php echo $countRow["newOrder"]; ?>
                                            </div>
                                            <?php
                                            if($countRow["notiCount"]>'0'){
                                                ?>
                                            <span class="badge badge-danger" style="position: absolute; border-radius: 10px; 
                                                  top: -8px; right: 5px; font-size: 15px;">
                                                      <?php echo $countRow["notiCount"]; ?>
                                            </span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div style="padding: 10px">
                                <a href="on-process.php" style="text-decoration: none;">
                                    <div class="row " style="border: #173F5F solid 2px; border-radius: 10px; padding: 20px 5px;">
                                        <div class="col-4">
                                            <div style="text">
                                                <i class="fal fa-tools fa-4x" style="color: #173F5F"></i>
                                            </div>
                                        </div>
                                        <div class="col-8" style="padding-left: 30px;color: black">
                                            <div>
                                                On Process
                                            </div>
                                            <div  id="onProcess">
                                                <?php 
                                                echo $countRow["onProcess"]; ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div style="padding: 10px">
                                <a href="completed.php" style="text-decoration: none;">
                                    <div class="row" style="border: #173F5F solid 2px; border-radius: 10px; padding: 20px 5px;">
                                        <div class="col-4">
                                            <div style="text">
                                                <i class="fas fa-money-check-edit-alt fa-4x" style="color: #173F5F"></i>
                                            </div>
                                        </div>
                                        <div class="col-8" style="padding-left: 30px;color: black">
                                            <div>
                                                Due Payment
                                            </div>
                                            <div>
                                                <?php echo $countRow["duePayment"]; ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div style="padding: 10px">
                                <div class="row " style="border: #173F5F solid 2px; border-radius: 10px; padding: 20px 5px;">
                                    <div class="col-4">
                                        <div style="text">
                                            <i class="fas fa-inventory fa-4x" style="color: #173F5F"></i>
                                        </div>
                                    </div>
                                    <div class="col-8" style="padding-left: 30px; color: orangered">
                                        <div>
                                            Out of Stock
                                        </div>
                                        <div>
                                            <?php echo $low["lowStock"]; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<script>
$("#newOrderNoti").click(function () {
    console.log("click");
            var url = "../controller/dashbordCount-refresh.php?status=newOrderNotiRead";
            $.post(url,{}, function (data){ 
                console.log(data);
                window.location.href ="../view/order.php";
            });
   });
</script>
       <?php
        break;
    
    case "newOrderNotiRead":
        $orderResult=$orderObj->ReadNotification();
            break;
}