<?php include '../../commons/session.php';
$userRole=$_SESSION["user"]["role_id"];?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <link type="text/css" rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../../fontawesome-pro-5.13.0-web/css/all.css">
        <link type="text/css" rel="stylesheet" href="../../css/style.css">

        <?php 
        include_once '../../commons/dbConnection.php'; 
        
            include '../model/module-model.php';
            $moduleObj = new Module();
            $moduleResult=$moduleObj->getAllModules($userRole);  
            
            include '../model/product-model.php';
            $productObj=new Product();
            $sub_category=$productObj->getAllSubCategory();//all type
            
            if(isset($_GET["alert"])){
                ?>
    <input type="hidden" id="alert" value="<?php echo $_REQUEST["alert"]; ?>">
        <?php
            }
        ?>
    </head>
    <body>
        
        <?php include 'dashboard-header.php'; ?>
        
        <div style="flex-wrap: wrap; display: flex;">
            <div id="sidemenu" class="sidemenu">
                <a href="dashboard.php" style="text-decoration: none;">
                    <div class="module module">
                        <i class="fas fa-tachometer-alt-fast">&nbsp;&nbsp;</i>
                         <span class="module-name">Dashboard</span>
                    </div>
                </a>
                <?php
                 while ($row=$moduleResult->fetch_assoc()){
                                  ?>
                <a href="<?php echo $row["module_url"]; ?>" style="text-decoration: none;">
                    <div class="module <?php
                            if($row["module_id"]=='7'){
                                echo 'module-active';
                            }
                            ?>">
                        <i class="<?php echo $row["module_class"]; ?> ">&nbsp;&nbsp;</i>
                         <span class="module-name"> <?php echo $row["module_name"];?> </span>
                    </div>
                </a>

                 <?php }?>
            </div>
            <div class="dashbord-body" id="dashbord-body" style="flex: 70%; height: 800px; padding: 10px;">
                <div class="row container-fluid">
                    <div class="col-sm-2">
                        <button class="btn" onclick="history.go(-1);"><i style="color: #173F5F;" class="fad fa-arrow-alt-circle-left fa-2x"></i></button>
                    </div>
                    <div class="col-sm-8">
                        <h3 style="text-align: center; margin-bottom: 20px;">Product Management</h3>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <div class="row" style="margin: 0px;">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs">
                          <li class="nav-item">
                              <a class="nav-link" href="product.php">Available Design</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="add-design.php">Add New Design</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link  active" href="category.php">Manage Category</a>
                          </li>
                        </ul>
                    </div>
                </div>
                <div class="container-fluid" style="padding-top: 20px;">
                            <div style="padding: 20px 20px 0px 20px;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Frame Types</h4>
                                    </div>
                                    <div class="col-md-6" style="text-align: end">
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addSubCategory">Add Frame Types</button>
                                    </div>
                                </div>
                            
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>Name</th>
                                            <th>Availability</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        while ($subCatRow=$sub_category->fetch_assoc()){
                                            $sub_cat_id=$subCatRow['sub_cat_id'];
                                        ?>
                                        <tr>
                                           
                                            <td><?php echo $subCatRow['sub_cat_name']; ?></td>
                                            <td>
                                                <?php
                                                if ($subCatRow['sub_cat_status']==1){
                                                    echo 'Available';
                                                } else {
                                                    echo 'Not Available';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info"><i class="far fa-print-search" style="margin: 4px"></i></a>
                                                <?php 
                                                if ($subCatRow['sub_cat_status']==1){
                                                    ?>
                                                        <a href="../controller/product-controller.php?status=deactivateSubCategory&sub_cat_id=<?php echo $sub_cat_id; ?>" class="btn btn-sm btn-danger">Deactivate</a>
                                                        <?php
                                                } else {
                                                    ?>
                                                        <a href="../controller/product-controller.php?status=activateSubCategory&sub_cat_id=<?php echo $sub_cat_id; ?>"  class="btn btn-sm btn-success">Activate</a>
                                                        <?php
                                                }
                                                ?>
                                                
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                </div>
            </div> 
            
            <!--///////////////add sub category modal start/////////////////--> 
            <div class="modal fade" id="addSubCategory">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <form enctype="multipart/form-data" method="post" style="padding-top: 10px;" action="../controller/product-controller.php?status=addSubCategory">
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Add Frame Type</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Frame Type</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="sub_cat_name" type="text" class="form-control" placeholder="Enter Frame Type..." required>
                                    </div>
                                </div>
                            <div class="row"><div class="col-12">&nbsp;</div></div>
                            <div class="row"><div class="col-12">&nbsp;</div></div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Select Sizes</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                        <?php
                                        $Counter=0;
                                        $sizeResult=$productObj->getAllSize();
                                        while ($sRow=$sizeResult->fetch_assoc()){ 
                                            $Counter++;
                                            ?>
                                            <div class="col-md-3">
                                                <input name="sub_cat_size[]" type="checkbox" value="<?php echo $sRow['size_id']; ?>">&nbsp;&nbsp;<label><?php echo $sRow['width']."&Prime;"."&#215;".$sRow['height']."&Prime;"; ?></label>
                                            </div>
                                        <?php
                                        if ($Counter % 4 == 0){
                                            ?>
                                        </div> <div class="row">
                                                <?php
                                        }
                                        
                                        } ?>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger"><i class="fad fa-sync-alt"></i>&nbsp;Clear</button>
                            <button type="submit" class="btn btn-success"><i class="fal fa-save"></i>&nbsp;Save</button>
                        </div>
                    </form> 
                  </div>
                </div>
            </div>
            <!--///////////////add sub category modal end/////////////////-->
        <script type="text/javascript" src="../../js/sweetalert2.js"></script>
        <script src="../../js/product-validation.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script>

$( document ).ready(function() {
    var x = $("#alert").val();

    
    if (x=="subCatAdded"){
    Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'New subcategory Added',
  showConfirmButton: false,
  timer: 1500
});
    }
    if (x=="activated"){
    Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Successfully Activated',
  showConfirmButton: false,
  timer: 1500
});
    }
     if (x=="deactivated"){
    Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Successfully Deactivated',
  showConfirmButton: false,
  timer: 1500
});
    }
});
</script>
    </body>
</html>


