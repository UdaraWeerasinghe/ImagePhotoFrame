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
        <link rel="stylesheet" type="text/css" href="../../DataTables-1.10.22/css/dataTables.bootstrap4.css"/>
        <?php include_once '../../commons/dbConnection.php'; 
        
        include '../model/module-model.php';
        $moduleObj = new Module();
        $moduleResult=$moduleObj->getAllModules($userRole);
        
        include '../model/customer-model.php';
        $costomerObj=new Customer();
        $customerResult=$costomerObj->getAllCustomer();
        
            
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
                <h3 style="text-align: center; margin-top: 10px;">Customer Management</h3>
                
                <div class="container-fluid" style="margin-top: 20px;"> 
                    <table id="customer_tbl" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Contact Number</th>
                                <th>Order Count</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($cRow=$customerResult->fetch_assoc()){
                                ?>
                            <tr>
                                <td><?php echo $cRow["customer_fName"]." ".$cRow["customer_lName"] ?></td>
                                <td><?php echo $cRow["customer_tel"]?></td>
                                <td><?php echo "432"?></td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="view-customer.php?customer_id=<?php echo base64_encode($cRow["customer_id"])?>">View</a>
                                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sendMail" onclick="sendMail('<?php echo $cRow["customer_email"] ?>','<?php echo $cRow["customer_fName"];?>')">
                                        Send Email
                                    </a>
                                    <?php
                                    if($cRow["customer_status"]=="1"){
                                        ?>
                                    <button class="btn btn-danger btn-sm" 
                                            onclick="block('<?php echo $cRow["customer_id"];?>','<?php echo $cRow["customer_fName"];?>','<?php echo $cRow["customer_email"];?>')">
                                        Block
                                    </button>
                                    <?php
                                    }else{
                                        ?>
                                    <button class="btn btn-success btn-sm" 
                                            onclick="unBlock('<?php echo $cRow["customer_id"];?>','<?php echo $cRow["customer_fName"];?>','<?php echo $cRow["customer_email"];?>')">
                                        Unblock
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
        <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../DataTables-1.10.22/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../../DataTables-1.10.22/js/dataTables.bootstrap4.js"></script>
        <script type="text/javascript" src="../../js/sweetalert2.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script type="text/javascript">
            $(function(){
            $("#customer_tbl").dataTable();
          });
          
          function sendMail(email,name){
            var url="../controller/customer-controller.php?status=CustomerMail";
            $.post(url, {email:email, name:name}, function(data) {
                $("#customerMailBody").html(data).show();
            });
        }
          
            function block(customerId,name,email){
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You want to block "+ name,
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, block '+name
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location = '../controller/customer-controller.php?status=blockCustomer&customerId=' + customerId +'&name='+ name +'&email='+ email;
                  }
                });
            }
            
            function unBlock(customerId,name,email){
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You want to unblock "+name,
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, unblock '+name
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location = '../controller/customer-controller.php?status=unBlockCustomer&customerId=' + customerId +'&name='+ name +'&email='+ email;
                  }
                });
            }
            
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


