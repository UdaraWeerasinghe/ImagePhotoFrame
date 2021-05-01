<?php include '../../commons/session.php';
$logUser=$_SESSION['user']['user_id'];
$userRole=$_SESSION["user"]["role_id"];
$customer_id= base64_decode($_REQUEST["customer_id"]);
?>
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
        $moduleResult=$moduleObj->getAllModules($userRole);
        
        include '../model/customer-model.php';
        $costomerObj=new Customer();
        $customerResult=$costomerObj->getAllCustomerById($customer_id);
        $orderResult=$costomerObj->getOrderByCusId($customer_id);
        
            
        ?>
    </head>
    <body>
        
        <?php include 'dashboard-header.php'; ?>
        
        <div class="container-fluid m-0 p-0" style="width: 100%;">
            <div id="sidemenu" class="sidemenu">
                <a href="dashboard.php" style="text-decoration: none;">
                    <div class="module">
                        <i class="fas fa-tachometer-alt-fast">&nbsp;&nbsp;</i>
                         <span class="module-name">Dashboard</span>
                    </div>
                </a>
                <?php
                 while ($row=$moduleResult->fetch_assoc()){
                                  ?>
                <a href="<?php echo $row["module_url"]; ?>" style="text-decoration: none;">
                    <div class="module <?php
                            if($row["module_id"]=='3'){
                                echo 'module-active';
                            }
                            ?>">
                        <i class="<?php echo $row["module_class"]; ?> ">&nbsp;&nbsp;</i>
                         <span class="module-name"> <?php echo $row["module_name"];?> </span>
                    </div>
                </a>

                 <?php }?>
            </div>
            <div class="dashbord-body" id="dashbord-body">
                <h3 style="text-align: center; margin-top: 10px;">Customer Details</h3>
                <hr>
                <div class="container-fluid" style="margin-top: 20px;"> 
                    <?php
                    $cRow=$customerResult->fetch_assoc();
                    ?>
                    <div class="row mb-4">
                        <div class="col-md-2">
                            <label style="font-weight: bold">First Name</label>
                        </div>
                        <div class="col-md-3">
                            <label><?php echo $cRow["customer_fName"]?></label>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <label style="font-weight: bold">Last Name</label>
                        </div>
                        <div class="col-md-3">
                            <label><?php echo $cRow["customer_fName"]?></label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-2">
                            <label style="font-weight: bold">Contact Number</label>
                        </div>
                        <div class="col-md-3">
                            <label><?php echo $cRow["customer_tel"]?></label>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <label style="font-weight: bold">Email</label>
                        </div>
                        <div class="col-md-3">
                            <label><?php echo $cRow["customer_email"]?></label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-2">
                            <label style="font-weight: bold">NIC</label>
                        </div>
                        <div class="col-md-3">
                            <label><?php echo $cRow["customer_nic"]?></label>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <label style="font-weight: bold">Gender</label>
                        </div>
                        <div class="col-md-3">
                            <label><?php echo $cRow["customer_gender"]?></label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-2">
                            <label style="font-weight: bold">Customer Address</label>
                        </div>
                        <div class="col-md-3">
                            <label><?php echo $cRow["customer_address"]?></label>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <label style="font-weight: bold">Customer Image</label>
                        </div>
                        <div class="col-md-3">
                            <label><?php echo $cRow["customer_img"]?></label>
                        </div>
                    </div>
                </div>
                <hr>
                <h3 align="center">Order History</h3>
                <div class="container-fluid">
                <table class="table table-hover" id="ordHis_tbl">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Date</th>
                            <th style="text-align: right">Amout</th>
                            <th style="text-align: center">Payment Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($oRow=$orderResult->fetch_assoc()){
                        ?>
                        <tr>
                            <td>
                                <?php echo $oRow["order_id"] ?>
                            </td>
                            <td>
                                <?php echo date('d-m-Y',strtotime($oRow["order_timestamp"])) ?>
                            </td>
                            <td style="text-align: right">
                                <?php echo number_format($oRow["order_sub_total"],2) ?>
                            </td>
                            <td style="text-align: center">
                                <?php 
                                if($oRow["order_payment_status"]==1){
                                    ?>
                                <label style="background-color: #28a745; font-size: 14px; color: white; padding: 3px; border-radius: 5px;">Paid </label>
                                    <?php
                                }
                                else if($oRow["order_payment_status"]==2){
                                    ?>
                                    <label style="background-color: #ffc107; font-size: 14px; color: white; padding: 3px; border-radius: 5px;">Not Paid</label>
                                    <?php
                                }else{
                                     ?>
                                <label style="background-color: #dc3545; font-size: 14px; color: white; padding: 3px; border-radius: 5px;">Not Paid</label>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm">View</a>
                               <?php 
                               if($oRow["order_payment_status"]==2 || $oRow["order_payment_status"]==0){
                               ?>
                                <a class="btn btn-warning btn-sm">Remind payment</a>
                               <?php } ?> 
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
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
        <script type="text/javascript" src="../../js/change-password-validation.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script type="text/javascript">
        $(function(){
            $("#ordHis_tbl").dataTable({
                "order": [[ 0, "desc" ]]
            });
          });
          
        </script>
    </body>
</html>


