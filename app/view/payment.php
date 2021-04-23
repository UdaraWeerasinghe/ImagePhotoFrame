<?php include '../../commons/session.php';
$logUser=$_SESSION['user']['user_id']; //get the login user Id
$userRole=$_SESSION["user"]["role_id"]; //get the login user role

if(isset($_GET["alert"])){   ////checking for the sweet alert
        ?>
        <input type="hidden" id="alert" value="<?php echo $_REQUEST["type"]?>">
        <input type="hidden" id="name" value="<?php echo base64_decode($_REQUEST["name"])?>">
        <input type="hidden" id="msg" value="<?php echo base64_decode($_REQUEST["msg"])?>">
    <?php
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <link type="text/css" rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../../fontawesome-pro-5.13.0-web/css/all.css">
        <link type="text/css" rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" type="text/css" href="../../DataTables/datatables.min.css"/>
        <?php 
        include '../model/module-model.php'; //include the module model
        $moduleObj = new Module();      //create Module object
        $moduleResult=$moduleObj->getAllModules($userRole);  //call the funtion load module acording the user privilage
        
        include '../model/payment-model.php';  //include payament model
        $paymentrObj=new Payment();             //crete payment object
        $paymentResult=$paymentrObj->getPayment();  //call the fantion for get all payment details
        
        include '../model/customer-model.php';          //include customer model
        $customerObj=new Customer();                        //create object
        
            
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
                 while ($row=$moduleResult->fetch_assoc()){       ///display all the module
                                  ?>
                <a href="<?php echo $row["module_url"]; ?>" style="text-decoration: none;">
                    <div class="module <?php
                            if($row["module_id"]=='8'){   //set active class for relevalt module
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
                <h3 style="text-align: center; margin-top: 10px;">Payment Management</h3>
                
                <div class="container-fluid" style="margin-top: -20px;"> 
                    <table id="payment_tbl" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Payment Id</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Customer</th>
                                <th>Order</th>
                                <th style="text-align: end">Amount</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($pRow=$paymentResult->fetch_assoc()){    ///display all the payment records
                                ?>
                            <tr>
                                <td><?php echo $pRow["payment_id"] ?></td>
                                <td><?php echo date("Y-m-d",strtotime($pRow["payment_timestamp"])) ?></td>  <!-- get the date from timestamp -->
                                <td><?php echo date("h:m:s a",strtotime($pRow["payment_timestamp"])) ?></td><!-- get the time from timestamp -->
                                <td>
                                    <?php 
                                    $cusResult=$customerObj->getCustomerByOrderId($pRow["order_id"]); //display customer acording to the order id
                                    $cRow=$cusResult->fetch_assoc();
                                    echo $cRow["customer_fName"]." ".$cRow["customer_lName"];
                                            ?>
                                </td>
                                <td><?php echo $pRow["order_id"] ?></td>
                                <td style="text-align: end">
                                    <?php echo number_format($pRow["payment_amount"],2)?>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info" onclick="view('<?php echo $pRow["payment_id"]; ?>')" 
                                            data-toggle="modal" data-target="#viewPaymentModal">
                                        View
                                    </button>
                                    <a class="btn btn-sm btn-primary" href="../view/report-payment-receipt.php?pId=<?php echo base64_encode($pRow["payment_id"]); ?>">
                                        <i class="far fa-download"></i> Receipt</a>
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
  <!--///////////////view payment modal start///////-->
<div class="modal" id="viewPaymentModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Payment Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
          <div class="modal-body" id="viewPaymentBody"></div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
  <!--///////////////view payment modal end///////-->
        
        <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="../../js/sweetalert2.js"></script>
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../DataTables/datatables.min.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script type="text/javascript">
            //data table
          
            $("#payment_tbl").dataTable({
                "order": [[ 1, "desc" ]],
                 dom: 'Bfrtip',
                buttons: [
                   { extend: 'copy', className: 'cusbtn'},
                   { extend: 'excel', className: 'cusbtn'},
                   { extend: 'pdf', className: 'cusbtn' },
                   { extend: 'print', className: 'cusbtn'}
               ]
            });
          
         //load view payment body
          function view(pId){
            var url="../controller/payment-controller.php?status=viewPayment";
            $.post(url, {pId:pId}, function(data) {
                $("#viewPaymentBody").html(data).show();
            });
          }
        </script>
        
    </body>
</html>



