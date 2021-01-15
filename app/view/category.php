<?php include '../../commons/session.php'; ?>
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
            $moduleResult=$moduleObj->getAllModules();  
            
            include '../model/product-model.php';
            $productObj=new Product();
            $category=$productObj->getAllCategory();//all matirials
            $sub_category=$productObj->getAllSubCategory();//all type
            
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
                <div class="container" style="padding-top: 20px;">
                    
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card" style="padding: 20px 20px 0px 20px;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Material Types</h4>
                                    </div>
                                    <div class="col-md-6" style="text-align: end">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#addCategory">Add Material Types</button>
                                    </div>
                                </div>
                                 <?php
                                        if(isset($_GET["category"])){
                                            $msg=$_REQUEST["msg"];
                                            $class=$_REQUEST["class"];
                                    ?>
                                <div class="row" id="alertMsg" style="padding: 20px 20px 0px 20px;">
                                    <div class="col-12 alert <?php echo $class; ?>" style="text-align: center">
                                        <?php echo $msg; ?>
                                    </div>
                                </div>
                                        <?php } ?>
                                
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Availability</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($catRow=$category->fetch_assoc()){ 
                                            $cat_id=$catRow['cat_id'];
                                            ?>
                                        
                                        <tr>
                                         
                                            <td><?php echo $catRow['cat_name']; ?></td>
                                            <td>
                                                <?php
                                                if($catRow['cat_status']==1){
                                                    echo 'Available';
                                                } else {
                                                    echo 'Not Available';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a data-toggle="modal" data-target="#updateCategory" class="btn btn-warning" onclick="load_data(<?php echo $catRow['cat_id']; ?>)"><i class="fas fa-pencil" style="margin: 4px"></i></a>
                                                <?php
                                                if($catRow['cat_status']==1){
                                                    ?>
                                                <a href="../controller/product-controller.php?status=deactivateCategory&cat_id=<?php echo $cat_id; ?>" class="btn btn-danger">Deactivate</a>
                                                <?php
                                                } else {
                                                    ?>
                                                <a href="../controller/product-controller.php?status=activateCategory&cat_id=<?php echo $cat_id; ?>" class="btn btn-success">Activate</a>
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
                        
                        
                        <div class="col-xl-6">
                            <div class="card" style="padding: 20px 20px 0px 20px;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Frame Types</h4>
                                    </div>
                                    <div class="col-md-6" style="text-align: end">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#addSubCategory">Add Frame Types</button>
                                    </div>
                                </div>
                             <?php
                                        if(isset($_GET["sub_cat"])){
                                            $msg=$_REQUEST["msg"];
                                            $class=$_REQUEST["class"];
                                    ?>
                                <div class="row" id="alertMsg" style="padding: 20px 20px 0px 20px;">
                                    <div class="col-12 alert <?php echo $class; ?>" style="text-align: center">
                                        <?php echo $msg; ?>
                                    </div>
                                </div>
                                        <?php } ?>
                                
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
                                                <a class="btn btn-info"><i class="far fa-print-search" style="margin: 4px"></i></a>
                                                <?php 
                                                if ($subCatRow['sub_cat_status']==1){
                                                    ?>
                                                        <a href="../controller/product-controller.php?status=deactivateSubCategory&sub_cat_id=<?php echo $sub_cat_id; ?>" class="btn btn-danger">Deactivate</a>
                                                        <?php
                                                } else {
                                                    ?>
                                                        <a href="../controller/product-controller.php?status=activateSubCategory&sub_cat_id=<?php echo $sub_cat_id; ?>"  class="btn btn-success">Activate</a>
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
                </div>
            </div> 
            <!--///////////////add category modal start/////////////////--> 
            <div class="modal fade" id="addCategory">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <form id="addCategort" enctype="multipart/form-data" method="post" style="padding-top: 10px;" action="../controller/product-controller.php?status=addCategory">
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Add Material</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="row" style="padding: 10px;"><div style="text-align: center" class="col-md-12" id="vAlert"></div></div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Material Name</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input name="cat_name" id="cat_name" type="text" class="form-control" placeholder="Enter Material..." required>
                                    </div>
                                </div>
                            <div class="row"><div class="col-12">&nbsp;</div></div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Select Frame Type</label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row">
                                        <?php
                                        $Counter=0;
                                        $sub_category=$productObj->getAllSubCategory();
                                        while ($catRow=$sub_category->fetch_assoc()){ 
                                            $Counter++;
                                            ?>
                                            <div class="col-md-6">
                                                <input name="sub_cat_id[]" id="sub_cat_id" type="checkbox" value="<?php echo $catRow['sub_cat_id']; ?>">&nbsp;<label><?php echo $catRow['sub_cat_name']; ?></label>
                                            </div>
                                        <?php
                                        if ($Counter % 2 == 0){
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
            <!--///////////////add category modal end/////////////////--> 
            <!--///////////////update category modal start/////////////////--> 
            <div class="modal fade" id="updateCategory">
                <div class="modal-dialog ">
                  <div class="modal-content">
                      <form enctype="multipart/form-data" method="post" style="padding-top: 10px;" action="../controller/product-controller.php?status=updateCategory">
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Update Material</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body" id="modalBody">
                                
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning"><i class="fas fa-pencil" style="margin: 4px"></i>&nbsp;Update</button>
                        </div>
                    </form> 
                  </div>
                </div>
            </div>
            <!--///////////////update category modal end/////////////////--> 
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
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Select Material</label>
                                    </div>
                                    <div class="col-md-8">
                                        <?php
                                        $category=$productObj->getAllCategory();
                                        while ($catRow=$category->fetch_assoc()){ ?>
                                        <input name="cat_name[]" type="checkbox" value="<?php echo $catRow['cat_id']; ?>">&nbsp;<label><?php echo $catRow['cat_name']; ?></label>&nbsp;&nbsp;
                                        <?php } ?>
                                    </div>
                                </div>
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

        <script src="../../js/product-validation.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script>
//     load update category
    function load_data(x) {
        var url="../controller/product-controller.php?status=edit_category";
        $.post(url, {cat_id:x}, function(data){
            $("#modalBody").html(data).show();
        });
    }
    // load update category  end

//  alert div  
$(function(){
$('#alertMsg').fadeOut(2500);
});
//alert div
</script>
    </body>
</html>


