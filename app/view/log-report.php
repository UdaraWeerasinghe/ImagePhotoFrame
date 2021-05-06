<?php include '../../commons/session.php';
$logUser=$_SESSION['user']['user_id'];
$userRole=$_SESSION["user"]["role_id"];
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
            
            include '../model/user-model.php';
            $userObj = new User();
            $userResult=$userObj->getAllUserWithRole();
            $roleResult=$userObj->getAllRole();
            
            include '../model/report-model.php';
            $reportObj=new Report();
            $logResult=$reportObj->getLogDetails();
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
                            if($row["module_id"]=='9'){
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
                <h3 style="text-align: center; margin-top: 10px;">Report Management</h3>
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                      <a class="nav-link" href="report.php">Order Reports</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="customer-report.php">Customer Reports</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="supplier-report.php">Supplier Reports</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="payment-report.php">Payment Reports</a>
                  </li>
                  <?php
                  if($userRole=="1"){
                      ?>
                  <li class="nav-item">
                      <a class="nav-link active" href="log-report.php">User Log Reports</a>
                  </li>
                  <?php
                  }
                  ?>
                </ul>
                
                <div class="tab-content"> 

                    <div class="container-fluid">
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-6" style="padding: 20px 40px 10px 20px">
                                <a href="#" id="custome_repo" style="text-decoration: none; color: #000;" data-toggle="modal" data-target="#custome_repo-modal">
                                    <div class="row reportBtn" style="padding: 10px 10px; border-radius: 10px; box-shadow: 1px 1px 3px #173F5F;">
                                        <div class="col-3">
                                            <i style="color: #173F5F" class="fad fa-file-medical-alt fa-5x"></i>
                                        </div>
                                        <div class="col-9" style="overflow: hidden">
                                            <h5 style="color: #029e13">Custom Report</h5>
                                            <p>You are able to generate supplier supply material wise.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6" style="padding: 20px 20px 10px 10px">
                            </div>
                        </div>
                       <div>
                           
                       </div>
                    </div>
                </div>
                
                <div class="container">
                    <table id="log_table" class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User Id</th>
                                <th>User name</th>
                                <th>User role</th>
                                <th>Operation</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($lRow=$logResult->fetch_assoc()){
                                ?>
                            <tr>
                                <td><?php echo $lRow["log_id"] ?></td>
                                <td><?php echo $lRow["user_id"] ?></td>
                                <td><?php echo $lRow["user_fname"]." ".$lRow["user_lname"] ?></td>
                                <td><?php echo $lRow["role_name"] ?></td>
                                <td><?php echo $lRow["log_activity"] ?></td>
                                <td><?php echo $lRow["timestamp"] ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
         
        </div> 
        
        <!--/////////////////////////custom report user////////////-->
<div class="modal" id="custome_repo-modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Generate custom report </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div>
          <form id="customReport" method="post" action="../view/reports-custom-supplier.">
      <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6 mb-4">
                        <label>Starting Date</label>
                        <input type="date" name="starting_date"  id="starting_date" class="form-control">
                        <div class="invalid-tooltip" id="starting_dateTooltip" style="position: relative; top: 0px;"></div>
                    </div>
                    <div class="col-sm-6">
                        <label>Ending Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control">
                        <div class="invalid-tooltip" id="end_dateTooltip"  style="position: relative; top: 0px;"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label>Amount Paid</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="number" id="minAmount" name="minAmount" class="form-control" value="<?php echo $mnRow["min"]; ?>">
                            </div>
                            <div class="col-6">
                                <input type="number" id="maxAmount" name="maxAmount" class="form-control" value="<?php echo $mnRow["max"]; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <lable>Payment Type</lable><br>
                        <lable><input type="radio" name="paymentType" value="3" checked>&nbsp;Any</lable>
                        <lable><input type="radio" name="paymentType" value="1">&nbsp;Full</lable>
                        <lable><input type="radio" name="paymentType" value="2">&nbsp;Half</lable>
                    </div>
            </div>
               <!-- Modal footer -->
               <div class="row">
                   <div class="col-12" style="text-align: right; padding-right: 30px;">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" value="Genarate">
                   </div>
            </div>
      </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
<script type="text/javascript" src="../../js/sweetalert2.js"></script>
<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../DataTables/datatables.min.js"></script>
<script type="text/javascript" src="../../js/user-validation.js"></script>
<script type="text/javascript" src="../../js/change-password-validation.js"></script>
<script type="text/javascript" src="../../js/report-validation.js"></script>
<script src="../../js/jsStyle.js"></script>
<script type="text/javascript">
$("#log_table").dataTable({
                 "order": [[ 5, "desc" ]],
                 dom: 'Bfrtip',
         buttons: [
            { extend: 'copy', className: 'cusbtn'},
            { extend: 'excel', className: 'cusbtn'},
            { extend: 'pdf', className: 'cusbtn' },
            { extend: 'print', className: 'cusbtn'}
        ]
             });
</script>
        
    </body>
</html>
