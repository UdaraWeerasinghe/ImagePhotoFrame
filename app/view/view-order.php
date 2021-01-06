<?php include '../../commons/session.php';
if(isset($_REQUEST["oId"])){
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../../fontawesome-pro-5.13.0-web/css/all.css">
        <link type="text/css" rel="stylesheet" href="../../css/style.css">

        <?php include_once '../../commons/dbConnection.php'; 
        
        include '../model/module-model.php';
            $moduleObj = new Module();
            $moduleResult=$moduleObj->getAllModules();
            
            include '../model/order-model.php';
            $orderObj=new Order();
            $allOrder=$orderObj->getAllOrders();
           
            $order_id=$_REQUEST["oId"];
            $orderResult=$orderObj->getOrdersById($order_id);
            $orderProduct=$orderObj->getOrdersProductById($order_id);
        ?>
    </head>
    <body>
        
        <?php include 'dashboard-header.php'; ?>
        
        <div style="flex-wrap: wrap; display: flex;">
            <div id="sidemenu" class="sidemenu">
                <a href="dashboard.php" style="text-decoration: none;">
                    <div class="module module">
                        <i class="fas fa-tachometer-alt-fast">&nbsp;&nbsp;</i>
                         <span class="module-name">Dashboard</span>
                    </div>
                </a>
                <?php
                 while ($row=$moduleResult->fetch_assoc()){
                                  ?>
                <a href="<?php echo $row["module_url"]; ?>" style="text-decoration: none;">
                    <div class="module <?php
                            if($row["module_id"]=='2'){
                                echo 'module-active';
                            }
                            ?>">
                        <i class="<?php echo $row["module_class"]; ?> ">&nbsp;&nbsp;</i>
                         <span class="module-name"> <?php echo $row["module_name"];?> </span>
                    </div>
                </a>

                 <?php }?>
            </div>
            <div class="dashbord-body" style="flex: 70%; height: 800px; padding: 10px;">
                <h3 style="text-align: center; margin-top: 10px;">Order Info</h3>
<!--                <div style="padding: 10px;">
                    <div class="row">
                        <div class="col-12"style="background-color: #f5f6f8;padding: 5px;">
                            <a href="dashboard.php">Dashboard </a>/<a href="order.php"> Order Management </a>/<a> Order Info</a>
                        </div>
                    </div>
                </div>-->
                <div class="container-fluid">
                
                    <form method="post" action="../controller/inventory-controller.php?status=startProcess&oId=<?php echo $order_id; ?>">
                        <div class="card" style="padding: 10px;">
                            <?php
                            $orderRow=$orderResult->fetch_assoc()
                            ?>
                            <div class="row">
                                <div class="col-sm-4">
                                    <span style="font-weight: bold">Customer Name</span><br>
                                    <span><?php echo $orderRow["customer_fName"]." ".$orderRow["customer_lName"] ?></span>
                                </div>
                                <div class="col-sm-4 mb-4">
                                    <span style="font-weight: bold">Date</span><br>
                                    <span>10/12/2020</span>
                                </div>
                                <div class="col-sm-4"></div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <span style="font-weight: bold;">Product Name</span>
                                </div>
                                <div class="col-2">
                                    <span style="font-weight: bold;">Size</span>
                                </div>
                                <div class="col-2" style="text-align: right">
                                    <span style="font-weight: bold;">Qty</span>
                                </div>
                                <div class="col-2" style="text-align: right">
                                    <span style="font-weight: bold;">Amount</span>
                                </div>
                            </div>
                            <?php
                            $subTotal=0;
                            while($opRow=$orderProduct->fetch_assoc()){
                                $pId=$opRow["product_id"];
                                $mResult=$orderObj->getMaterialById($pId);
                                $mRow=$mResult->fetch_assoc();
                                ?>
                            <div class="row">
                                <div class="col-6">
                                    <span><?php echo $opRow["product_name"]; ?></span>
                                    <input type="hidden" name="mId[]" value="<?php echo $mRow["material_id"]; ?>">
                                </div>
                                <div class="col-2 mb-4">
                                    <span>
                                        <?php 
                                        $sizeId=$opRow["size_id"]; 
                                        $sizeResult=$orderObj->getSizeByPId($sizeId);
                                        $sRow=$sizeResult->fetch_assoc();
                                        $length=$sRow['width']*$sRow['height'];
                                        echo $sRow['width']."&Prime;"."&#215;".$sRow['height']."&Prime;";
                                        ?>
                                    </span>
                                    <input type="hidden" name="length[]" value="<?php echo $length; ?>">
                                </div>
                                <div class="col-2 mb-4" style="text-align: right">
                                    <span><?php echo $opRow["quantity"]; ?></span>
                                </div>
                                <div class="col-2" style="text-align: right">
                                    <span><?php echo number_format($amount=$opRow["unit_price"]*$opRow["quantity"],2); ?></span>
                                </div>
                            </div>
                            <?php
                            $subTotal=$subTotal+$amount;
                            }
                            ?>
                            <hr>
                            <div class="row">
                                <div class="col-10" style=" text-align: center">
                                    <span style="font-weight: bold;">Sub Total</span>
                                </div>

                                <div class="col-2" style="text-align: right">
                                    <span style=""><?php echo number_format($subTotal,2); ?></span>
                                </div>
                            </div>

                        </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-8" style=" text-align: center">
                                    <span style="font-weight: bold;"></span>
                                </div>

                                <div class="col-4" style="text-align: right">
                                    <span><a class="btn btn-danger" id="reject">Reject</a></span>
                                    <span><input type="submit" class="btn btn-warning" value="Start Process"></span>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
         
        </div> 
        <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../js/sweetalert2.js"></script>
        <script type="text/javascript" src="../../js/user-validation.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script>
        
        </script>
        <script type="text/javascript">
            $("#reject").click(function(){
                
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Reject it!'
                  
                }).then((result) => {
                  if (result.isConfirmed) {
                      (async () => {
                          
                          Swal.fire({
                            title: '<strong>Reason</strong>',
                            html:
                              '<form method="post" action="../controller/inventory-controller.php?status=addReason">Why you are going to reject the order' +
                              '<br><br><input name="reason" type="text" class="form-control" required>' +
                              '<input type="hidden" name="orderId" value="<?php echo $order_id ?>">' +
                              '<br><button class="btn btn-success">Submit</button></form>',
                              
                            showCloseButton: false,
                            showCancelButton: false,
                            showConfirmButton: false,
                            focusConfirm: false
                          });
    })();
           
                  }
                });
            });
        </script>
        
    </body>
</html>
   <?php             
            }


