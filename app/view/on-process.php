<?php include '../../commons/session.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       
        <link type="text/css" rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../../fontawesome-pro-5.13.0-web/css/all.css">
        <link type="text/css" rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" type="text/css" href="../../DataTables-1.10.22/css/dataTables.bootstrap4.css"/>
        <?php include_once '../../commons/dbConnection.php'; 
        
        include '../model/module-model.php';
            $moduleObj = new Module();
            $moduleResult=$moduleObj->getAllModules();
            
            include '../model/order-model.php';
            $orderObj=new Order();
            $allOrder=$orderObj->getAllOnProcessOrders();
            
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
            <div class="dashbord-body" id="dashbord-body" style="flex: 70%; height: 800px; padding: 10px;">
                <h3 style="text-align: center; margin-top: 10px;">Order Management</h3>
<!--                <div style="padding: 10px;">
                    <div class="row">
                        <div class="col-12"style="background-color: #f5f6f8;padding: 5px;">
                            <a href="dashboard.php">Dashboard </a>/<a> Order Management</a>
                        </div>
                    </div>
                </div>-->
                <ul class="nav nav-tabs" style="margin-bottom: 10px;">
                  <li class="nav-item">
                      <a class="nav-link" href="order.php">New Ordes</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" href="on-process.php">On Process</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#deactive-users">Waiting For Payment</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#add-user">On delivery</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#ad">Completed</a>
                  </li>
                </ul>
                
                <div class="container-fluid">
                    <table class="table table-hover" id="order_tbl">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Customer Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                 while ($order_row=$allOrder->fetch_assoc()){
                                  ?>
                            <tr>
                                <td>
                                    <?php echo $order_row["order_id"] ?>
                                </td>
                                <td><?php echo $order_row["customer_fName"]." ".$order_row["customer_lName"]; ?></td>
                                <td>
                                    <?php 
                                    $timestamp = strtotime($order_row["order_timestamp"]);
                               echo date('d-m-Y', $timestamp);
                                ?>
                                </td>
                                <td>
                                    <?php 
                                    
                               echo date('G:i:s', $timestamp);
                                ?>
                                </td>
                                <td>
                                    <a href="view-order.php?oId=<?php echo $order_row["order_id"] ?>" class="btn btn-sm btn-info">View</a>
                                    <!--<a class="btn btn-sm btn-warning">Start Process</a>-->
                                    <!--<a class="btn btn-sm btn-danger" id="reject" onclick="load_data(<?php // echo $order_row["order_id"]; ?>)">Reject</a>-->
                                </td>
                            </tr>
                 <?php } ?>
                        </tbody>
                    </table>
                </div>
                
               
            </div>
         
        </div> 
        
        <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../DataTables-1.10.22/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../../DataTables-1.10.22/js/dataTables.bootstrap4.js"></script>
        <script type="text/javascript" src="../../js/sweetalert2.js"></script>
        <script type="text/javascript" src="../../js/user-validation.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script type="text/javascript">
        
        </script>
        <script type="text/javascript">
            $(function(){
             $("#order_tbl").dataTable({
                 "order": [[ 2, "desc" ]]
             });
           });
           
        </script>
        
    </body>
</html>

