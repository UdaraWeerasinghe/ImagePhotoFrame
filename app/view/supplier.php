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
        
        include '../model/supplier-model.php';
        $supplierObj= new Supplier();
        $supResult=$supplierObj->getSupplier();
         
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
                            if($row["module_id"]=='5'){
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
                <h3 style="text-align: center; margin-top: 10px;">Supplier Management</h3>
                <div class="row" style="margin: 0px;">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="supplier.php">All Suppliers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="add-supplier.php">Add New Suppliers</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="container" style="margin-top: -25px;"> 
                    <table id="customer_tbl" class="table table-hover" style="margin-top: 0px;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Contact Number</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($sRow=$supResult->fetch_assoc()){
                                ?>
                            <tr>
                                <td><?php echo $sRow["supplier_name"]?></td>
                                <td><?php echo $sRow["supplier_cno"]?></td>
                                <td><?php echo $sRow["supplier_email"]?></td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="view-supplier.php?sup_id=<?php echo base64_encode($sRow["supplier_id"])?>">View</a>
                                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sendMail" onclick="sendMail('<?php echo $sRow["supplier_email"] ?>','<?php echo $sRow["supplier_name"];?>')">
                                        Send Email
                                    </a>
                                    <?php
                                    if($sRow["supplier_status"]=="1"){
                                        ?>
                                    <button class="btn btn-danger btn-sm" 
                                            onclick="deactivate('<?php echo $sRow["supplier_id"];?>','<?php echo $sRow["supplier_name"];?>','<?php echo $sRow["supplier_email"];?>')">
                                        Deactivate
                                    </button>
                                    <?php
                                    }else{
                                        ?>
                                    <button class="btn btn-success btn-sm" 
                                            onclick="activate('<?php echo $sRow["supplier_id"];?>','<?php echo $sRow["supplier_name"];?>','<?php echo $sRow["supplier_email"];?>')">
                                        Activate
                                    </button>
                                    <?php
                                    }
                                ?>
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
      <form id="mailSend" method="post" action="../controller/supplier-controller.php?status=sendMail">
          <div class="modal-body" id="mailBody">
          
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Send">
      </div>

    </div>
  </div>
</div>
        <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="../../js/sweetalert2.js"></script>
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../DataTables/datatables.min.js"></script>
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
            var url="../controller/supplier-controller.php?status=supplierMail";
            $.post(url, {email:email, name:name}, function(data) {
                $("#mailBody").html(data).show();
            });
        }
          ///sweet alert for comfirm block user
            function deactivate(supId,name,email){
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You want to deactivate "+ name,
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, block '+name
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location = '../controller/supplier-controller.php?status=devactivateSupplier&supId=' + supId +'&name='+ name +'&email='+ email;
                  }
                });
            }
            
            ///sweet alert for comfirm unblock user
            function activate(supId,name,email){
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You want to activate "+name,
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, unblock '+name
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location = '../controller/supplier-controller.php?status=activateSupplier&supId=' + supId +'&name='+ name +'&email='+ email;
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
                text: msg+' '+name,
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


