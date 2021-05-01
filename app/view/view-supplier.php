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
        
        include '../model/module-model.php';
        $moduleObj = new Module();
        $moduleResult=$moduleObj->getAllModules($userRole);
        
        include '../model/supplier-model.php';
        $supplierObj= new Supplier();
        $supResult=$supplierObj->getSupplierById(base64_decode($_REQUEST["sup_id"]));
        $sRow=$supResult->fetch_assoc();
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
                    <div class="row mb-4">
                        <div class="col-sm-2">
                            <lable><b>Name</b></lable>
                        </div>
                        <div class="col-sm-3">
                            <label><?php echo $sRow["supplier_name"] ?></label>
                        </div>
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-2">
                            <lable><b>Contact No</b></lable>
                        </div>
                        <div class="col-sm-3">
                            <label><?php echo $sRow["supplier_cno"] ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <lable><b>Email</b></lable>
                        </div>
                        <div class="col-sm-3">
                            <label><?php echo $sRow["supplier_email"] ?></label>
                        </div>
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-2">
                            <lable><b>Address</b></lable>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-control-plaintext">
                                <?php echo $sRow["supplier_address"] ?>
                            </label>
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
                            <a class="btn btn-warning" href="update-supplier.php?supId=<?php echo $_REQUEST["sup_id"] ?>">Update</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="../../js/sweetalert2.js"></script>
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script type="text/javascript" src="../../js/change-password-validation.js"></script>
        <script>
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
        var splitUrl = url.split('&alert')[0];
        var newSplitUrl = splitUrl.split('localhost')[1];
        console.log(url);
        console.log(newSplitUrl);
        window.history.pushState({}, document.title, "" + newSplitUrl);
        //sweetAlert trime

        </script>

        
    </body>
</html>


