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
        <link rel="stylesheet" type="text/css" href="../../DataTables-1.10.22/css/dataTables.bootstrap4.css"/>
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
            $maxMinResult=$reportObj->getMaxMinTotalAmount();
            $mnRow=$maxMinResult->fetch_assoc();
            
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
                    <a class="nav-link active" href="customer-report.php">Customer Reports</a>
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
                      <a class="nav-link" href="log-report.php">User Log Reports</a>
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
                                            <p>You are able to generate customer report by shopping period.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6" style="padding: 20px 20px 10px 10px">
                                <a href="report-by-status.php?statusId=2" style="text-decoration: none; color: #000;">
                                    <div class="row reportBtn" style="padding: 10px 10px; border-radius: 10px; box-shadow: 1px 1px 3px #173F5F;">
                                        <div class="col-3">
                                            <i style="color: #173F5F" class="fad fa-file-medical-alt fa-5x"></i>
                                        </div>
                                        <div class="col-9">
                                            <h5 style="color: #029e13">On Going Order's Customer Report </h5>
                                            <p>This report will provide a list of the customers order now process in the shop.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6" style="padding: 10px 40px 10px 20px">
                                <a href="report-customer-status.php?status=1" style="text-decoration: none; color: #000;">
                                    <div class="row reportBtn" style="padding: 10px 10px; border-radius: 10px; box-shadow: 1px 1px 3px #173F5F;">
                                        <div class="col-3">
                                            <i style="color: #173F5F" class="fad fa-file-medical-alt fa-5x"></i>
                                        </div>
                                        <div class="col-9">
                                            <h5 style="color: #029e13">Active Customers Report</h5>
                                            <p>This report will provide a list of all active customers in the site.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6" style="padding: 10px 20px 10px 10px">
                                <a href="report-customer-liability.php" style="text-decoration: none; color: #000;">
                                    <div class="row reportBtn" style="padding: 10px 10px; border-radius: 10px; box-shadow: 1px 1px 3px #173F5F;">
                                        <div class="col-3">
                                            <i style="color: #173F5F" class="fad fa-file-medical-alt fa-5x"></i>
                                        </div>
                                        <div class="col-9">
                                            <h5 style="color: #029e13">Liabilities Report</h5>
                                            <p>This report will provide a list of customers who has not complete their payment.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6" style="padding: 20px 40px 10px 20px">
                                <a href="report-customer-status.php?status=0" style="text-decoration: none; color: #000;">
                                    <div class="row reportBtn" style="padding: 10px 10px; border-radius: 10px; box-shadow: 1px 1px 3px #173F5F;">
                                        <div class="col-3">
                                            <i style="color: #173F5F" class="fad fa-file-medical-alt fa-5x"></i>
                                        </div>
                                        <div class="col-9">
                                            <h5 style="color: #029e13">Banned Customers Report</h5>
                                            <p>This report will provide a list of customers who has been banned from the web site.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6" style="padding: 20px 20px 10px 10px">
                               <a href="report-customer-status.php?status=all&all" style="text-decoration: none; color: #000;">
                                    <div class="row reportBtn" style="padding: 10px 10px; border-radius: 10px; box-shadow: 1px 1px 3px #173F5F;">
                                        <div class="col-3">
                                            <i style="color: #173F5F" class="fad fa-file-medical-alt fa-5x"></i>
                                        </div>
                                        <div class="col-9">
                                            <h5 style="color: #029e13">All Customer Report</h5>
                                            <p>This report will provide a list of all customers.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    
                       <div>
                           
                       </div>
                    </div>
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
          <form id="customReport" method="post" action="../view/reports-custom-customer.php">
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
                        <label>Total Amount</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="number" id="minAmount" name="minAmount" class="form-control" value="<?php echo $mnRow["min"]; ?>">
                            </div>
                            <div class="col-6">
                                <input type="number" id="maxAmount" name="maxAmount" class="form-control" value="<?php echo $mnRow["max"]; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6"></div>
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
<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../DataTables-1.10.22/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../../DataTables-1.10.22/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="../../js/sweetalert2.js"></script>
<script type="text/javascript" src="../../js/user-validation.js"></script>
<script type="text/javascript" src="../../js/change-password-validation.js"></script>
<script type="text/javascript" src="../../js/report-validation.js"></script>
<script src="../../js/jsStyle.js"></script>
<script type="text/javascript">

</script>
        
    </body>
</html>
