<?php include '../../commons/session.php';
if(isset($_REQUEST["oId"])){
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <link type="text/css" rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
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
                        <div class="col-8">
                            <span style="font-weight: bold;">Product Name</span>
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
                        
                        ?>
                    <div class="row">
                        <div class="col-8">
                            <span><?php echo $opRow["product_name"]; ?></span>
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
                            <span><a class="btn btn-danger">Reject</a></span>
                            <span><a class="btn btn-warning">Start Process</a></span>
                        </div>
                    </div>
            </div>
         
        </div> 
        

        <script type="text/javascript" src="../../js/user-validation.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script>
        
        </script>
        <script type="text/javascript">

        </script>
        
    </body>
</html>
   <?php             
            }


