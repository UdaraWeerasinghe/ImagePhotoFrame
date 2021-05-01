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
        <?php include_once '../../commons/dbConnection.php'; 
        
        include '../model/module-model.php'; //get all module using role id in sesson
        $moduleObj = new Module();
        $moduleResult=$moduleObj->getAllModules($userRole);
        
        include '../model/inventory-model.php';  ///get all materil for add supller product
        $inventoryObj= new Inventory();
        $materialResult=$inventoryObj->getAllMaterial();
        
            
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
                <h3 style="text-align: center; margin-top: 10px;">Add Supplier</h3>
                <div class="row" style="margin: 0px;">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link" href="supplier.php">All Suppliers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="add-supplier.php">Add New Suppliers</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="container" style="padding: 40px 20px;">
                    <form id="addSupplier" enctype="multipart/form-data" method="post"
                    action="../controller/supplier-controller.php?status=addSupplier"
                    style="">
                        <input type="hidden" name="cnocheck" id="cnocheck" value="valid">
                        <input type="hidden" name="emailcheck" id="emailcheck" value="valid">
                    <div class="row mb-4">
                        <div class="col-md-2">
                            <label>Name</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="name" name="name" class="form-control"
                                   placeholder="Enter name..">
                            <div class="invalid-tooltip" id="nameTooltip"
                                 style="position: initial;"></div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <label>Contact No</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" id="cno" name="cno" class="form-control"
                                   placeholder="Entercontact number..">
                            <div class="invalid-tooltip" id="cnoTooltip"
                                 style="position: initial;"></div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-2">
                            <label>Email</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="email" name="email" class="form-control"
                                   placeholder="Enter email address..">
                            <div class="invalid-tooltip" id="emailTooltip"
                                 style="position: initial;"></div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <label>Address</label>
                        </div>
                        <div class="col-md-3">
                            <textarea type="address" id="address" name="address" class="form-control"
                                      placeholder="Enter contact number.."></textarea>
                            <div class="invalid-tooltip" id="addressTooltip"
                                 style="position: initial;"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label><b>Select supply materials</b></label>
                            <div id="checkTooltip"
                                style="position: initial;">    
                            </div>
                        </div>
                    </div>
                        <div style="padding: 20px 40px;">
                            <div class="row">

                                   <?php
                                   $Counter=1;
                                    while ($mRow=$materialResult->fetch_assoc()){
                                        if ($Counter%3==0){
                                          ?>
                            </div>
                                <div class="row">
                                <?php
                                        }else{
                                          ?>
                                <div class="col-sm-6">
                                    <input type="checkbox"  name="materialId[]" class="checkbox" value="<?php echo $mRow["material_id"]; ?>">
                                    <label><?php echo $mRow["material_name"]; ?></label>
                                </div>
                                    <?php  
                                        }

                                    }
                                   ?>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-12" style="text-align: right">
                                <input type="submit" value="Add Supplier" class="btn btn-success">
                            </div>
                        </div> 
                </form>
                </div>
            </div>
        </div> 
        
        <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="../../js/sweetalert2.js"></script>
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script type="text/javascript" src="../../js/change-password-validation.js"></script>
        <script type="text/javascript" src="../../js/supplier-validation.js"></script>
        <script type="text/javascript">

        </script>
        
    </body>
</html>


