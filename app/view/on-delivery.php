<?php include '../../commons/session.php';
$logUser=$_SESSION['user']['user_id'];
$userRole=$_SESSION["user"]["role_id"];

if(isset($_GET["alert"])){
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
        <?php include_once '../../commons/dbConnection.php'; 
        
        include '../model/module-model.php';
        $moduleObj = new Module();
        $moduleResult=$moduleObj->getAllModules($userRole);
        
        include '../model/delivery-model.php';
        $deliveryObj=new Delivery();
        $deliveryResult=$deliveryObj->getOnDelivery();
        
            
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
                            if($row["module_id"]=='4'){
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
                <h3 style="text-align: center; margin-top: 10px;">Delivery Management</h3>
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                      <a class="nav-link" href="delivery.php">Ready for Delivery</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#">On Delivery</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="completed-delivery.php">Completed Delivery</a>
                  </li>
                </ul>
                
                <div class="container-fluid"> 
                    <table id="customer_tbl" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Contact Number</th>
                                <th>Qty</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($dRow=$deliveryResult->fetch_assoc()){
                                ?>
                            <tr>
                                <td><?php echo $dRow["customer_fName"]." ".$dRow["customer_lName"] ?></td>
                                <td style="width: 20%"><?php echo $dRow["customer_address"]?></td>
                                <td><?php echo $dRow["customer_tel"]?></td>
                                <td><?php echo $dRow["qty"]?></td>
                                <td>
                                    <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#view" onclick="viewOrder('<?php echo $dRow["order_id"];?>')" >View</a>
                                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sendMail" onclick="sendMail('<?php echo $dRow["customer_email"] ?>','<?php echo $dRow["customer_fName"];?>')">
                                        Send Email
                                    </a>
                                    <button class="btn btn-warning btn-sm" 
                                            onclick="handover('<?php echo base64_encode($dRow["order_id"]);?>','<?php echo $dRow["customer_fName"]." ".$dRow["customer_lName"]?>')">
                                        Handover
                                    </button>
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
        
        <!--///////////////email modal///////-->
<div class="modal" id="sendMail">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Send Email</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form method="post" action="../controller/customer-controller.php?status=sendCustomerMail">
          <div class="modal-body" id="customerMailBody">
          
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Send">
      </div>

    </div>
  </div>
</div>
        
<div class="modal fade" id="view">       <!-- view modal -->
   <div class="modal-dialog ">
     <div class="modal-content">

       <!-- Modal Header -->
       <div class="modal-header">
         <h4 class="modal-title">Order Details</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
       <!-- Modal body -->
       <div class="modal-body" id="viewBody">
       </div>
     </div>
   </div>
</div>
        <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../DataTables/datatables.min.js"></script>
        <script type="text/javascript" src="../../js/sweetalert2.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script type="text/javascript" src="../../js/change-password-validation.js"></script>
        <script type="text/javascript" src="../../js/send-email-validation.js"></script>
        <script type="text/javascript">
//            dataTable for customer tbl
            
            $("#customer_tbl").dataTable({
                dom: 'Bfrtip',
         buttons: [
            { extend: 'copy', className: 'cusbtn'},
            { extend: 'excel', className: 'cusbtn'},
            { extend: 'pdf', className: 'cusbtn' },
            { extend: 'print', className: 'cusbtn'}
        ]
            });
         
          //pass email & name to custome controler and load modal body
          function sendMail(email,name){
            var url="../controller/customer-controller.php?status=CustomerMail";
            $.post(url, {email:email, name:name}, function(data) {
                $("#customerMailBody").html(data).show();
            });
        }
              function viewOrder(orderId){  //load contend for view modal
            var url="../controller/delivery-controller.php?status=viewOrderModale&orderId="+orderId;
            $.post(url, {orderId:orderId}, function(data) {
                $("#viewBody").html(data).show();
            });
        } 
            
            ///sweet alert for comfirm unblock user
            function handover(orderId,name){
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You want to Handover "+name+"'s order",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Sure'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location = '../controller/delivery-controller.php?status=handover&orderId=' + orderId;
                  }
                });
            }
            
            //sweet alert for operations
            $(document).ready(function() {
                var alert = $("#alert").val();
                var name = $("#name").val();
                var msg = $("#msg").val();
                if(alert=="success"){
                  Swal.fire({
                position: 'center',
                icon: alert,
                title: 'Successfull!',
                text: name+' '+msg,
                showConfirmButton: false,
                timer: 2000
              });   
            } 
        });
        //sweetAlert trime
        var url = window.location.href;
        var splitUrl = url.split('?')[0];
        var newSplitUrl = splitUrl.split('localhost')[1];
        window.history.pushState({}, document.title, "" + newSplitUrl);
        //sweetAlert trime

        </script>
        
    </body>
</html>


