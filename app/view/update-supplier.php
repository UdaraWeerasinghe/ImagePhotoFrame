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
        $supResult=$supplierObj->getSupplierById(base64_decode($_REQUEST["supId"]));
        $sRow=$supResult->fetch_assoc();
        
        include '../model/inventory-model.php';  
        $inventoryObj= new Inventory();
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
                <h3 style="text-align: center; margin: 10px">Supplier Details</h3>
                <hr>
                <div class="container" style="padding: 30px;"> 
                    <form id="updateSupplier" action="../controller/supplier-controller.php?status=updateSupplier" method="post">
                        <input type="hidden" name="cnocheck" id="cnocheck" value="valid">
                        <input type="hidden" name="emailcheck" id="emailcheck" value="valid">
                        <div class="row mb-4">
                            <div class="col-sm-2">
                                <lable><b>Name</b></lable>
                                <input type="hidden" name="supId" id="supId" value="<?php echo $sRow["supplier_id"]?>">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" id="name" name="name" class="form-control"
                                       value="<?php echo $sRow["supplier_name"] ?>">
                                <div class="invalid-tooltip" id="nameTooltip"
                                     style="position: initial;"></div>
                            </div>
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-2">
                                <lable><b>Contact No</b></lable>
                            </div>
                            <div class="col-sm-3">
                                <input type="number" id="cnoUpdate" name="cnoUpdate" class="form-control"
                                       value="<?php echo $sRow["supplier_cno"] ?>">
                                <div class="invalid-tooltip" id="cnoTooltipUpdate"
                                     style="position: initial;"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <lable><b>Email</b></lable>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" id="emailUpdate" name="emailUpdate" class="form-control"
                                       value="<?php echo $sRow["supplier_email"] ?>">
                                <div class="invalid-tooltip" id="emailTooltipUpdate"
                                     style="position: initial;"></div>
                            </div>
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-2">
                                <lable><b>Address</b></lable>
                            </div>
                            <div class="col-sm-3">
                                <textarea type="address" id="address" name="address" class="form-control"
                                          style="text-align: initial">
                                         <?php echo $sRow["supplier_address"] ?></textarea>
                                <div class="invalid-tooltip" id="addressTooltip"
                                     style="position: initial;"></div>
                            </div>
                        </div>
                        <h5>Supply Materials</h5>
                        <div style="padding: 20px 40px;">

                                <div class="row">

                                       <?php
                                       $Counter=1;
                                       $materialResult=$supplierObj->getSupplierMaterial($sRow["supplier_id"]);
                                        while ($mRow=$materialResult->fetch_assoc()){
                                            if ($Counter%3==0){
                                              ?>
                                </div>
                                    <div class="row">
                                    <?php
                                            }else{
                                              ?>
                                    <div class="col-sm-6">
                                        <input type="checkbox"  name="materialId[]" class="checkbox" checked="checked" value="<?php echo $mRow["material_id"]; ?>">
                                        <label><?php echo $mRow["material_name"]; ?></label>
                                    </div>
                                        <?php  
                                            }

                                        }
                                       ?>
                                </div>
                            
                                     <div class="row">
                                       <?php
                                       $C=1;
                                       $materialResultNotSelect=$supplierObj->getMaterialsNotSelect($sRow["supplier_id"]);///get material not selected
                                        while ($mRow=$materialResultNotSelect->fetch_assoc()){
                                            $mResult=$inventoryObj->getMaterialById($mRow["material_id"]);  //get material names
                                            $mtRow=$mResult->fetch_assoc();
                                            if ($C%3==0){
                                              ?>
                                </div>
                                    <div class="row">
                                    <?php
                                            }else{
                                              ?>
                                    <div class="col-sm-6">
                                        <input type="checkbox"  name="materialId[]" class="checkbox" value="<?php echo $mRow["material_id"]; ?>">
                                        <label><?php echo $mtRow["material_name"] ?></label>
                                    </div>
                                        <?php  
                                            }

                                        }
                                       ?>
                                </div>
                            </div> 
                        <div class="row">
                            <div class="col-12" style="text-align: right">
                                <button type="submit" class="btn btn-warning">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
        <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="../../js/sweetalert2.js"></script>
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../DataTables/datatables.min.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script type="text/javascript" src="../../js/change-password-validation.js"></script>
        <script type="text/javascript" src="../../js/supplier-validation.js"></script>

    </body>
</html>


