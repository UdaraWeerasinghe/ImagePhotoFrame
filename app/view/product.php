<?php include '../../commons/session.php';
$userRole=$_SESSION["user"]["role_id"];?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../DataTables/datatables.min.css">
        <link rel="stylesheet" href="../../fontawesome-pro-5.13.0-web/css/all.css">
        <link type="text/css" rel="stylesheet" href="../../css/style.css">

        <?php 
        include '../model/module-model.php';
            $moduleObj = new Module();
            $moduleResult=$moduleObj->getAllModules($userRole);  //load module
            
        include '../model/product-model.php'; 
            $productObj=new Product();
            $productResult=$productObj->getAllProduct();
        
        if(isset($_GET["alert"])){
                ?>
    <input type="hidden" id="alert" value="<?php echo $_REQUEST["alert"]; ?>">  //check for sweat alert
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
            <div class="dashbord-body" id="dashbord-body">
                <div class="row container-fluid">
                    <div class="col-sm-2">
                        <!--<button class="btn" onclick="history.go(-1);"><i style="color: #173F5F;" class="fad fa-arrow-alt-circle-left fa-2x"></i></button>-->
                    </div>
                    <div class="col-sm-8">
                        <h3 style="text-align: center; margin-bottom: 20px;">Product Management</h3>
                    </div>
                    <div class="col-sm-2">
                        
                    </div>
                </div>

                <div class="row" style="margin-bottom: -20px;">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="product.php">Available Design</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="add-design.php">Add New Design</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.php">Manage Category</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div  style="padding: 0px 20px;">
                    <table id="product_tbl" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Color</th>
                                <th>Availability</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($prow=$productResult->fetch_assoc()) {
                                ?>
                            <tr>
                                <td><img width="30px" height="30px" src="../../images/design_image/<?php echo $prow['product_img_1']; ?>">&nbsp;&nbsp;<?php echo $prow['product_name']; ?></td>
                                <td><?php echo $prow['product_color']; ?></td>
                                <td>
                                    <?php
                                    if($prow['product_status']==1){
                                        echo 'Available';
                                    } else {
                                        echo 'Not Available';
                                    }
                                    ?>
                                </td>
                                <th>
                                    <a href="view-product.php?pId=<?php echo $prow['product_id'] ?>" class="btn btn-sm btn-info"><i class="far fa-print-search" style="margin: 4px"></i></a>
                                    <?php
                                    if($prow['product_status']==1){
                                        ?>
                                        <a class="btn btn-sm btn-success">Activate</a>
                                    <?php
                                    } else {
                                        ?>
                                        <a class="btn btn-sm btn-danger">Deactivate</a>
                                        <?php
                                    }
                                    ?>
                                </th>
                            </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>

                    <div class="row" style="margin: 0px;">
                        <div class="col-12">
                        
                        </div>
                    </div>
                </div>
            </div>
         
        </div> 
        
        <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="../../DataTables/datatables.min.js"></script>
        <script type="text/javascript" src="../../js/popper1.16.0.js"></script>
        <script type="text/javascript" src="../../js/product-validation.js"></script>
        <script type="text/javascript" src="../../js/sweetalert2.js"></script>
        <script type="text/javascript" src="../../js/change-password-validation.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script>
        
    $("#product_tbl").dataTable({
        dom: 'Bfrtip',
         buttons: [
            { extend: 'copy', className: 'cusbtn'},
            { extend: 'excel', className: 'cusbtn'},
            { extend: 'pdf', className: 'cusbtn' },
            { extend: 'print', className: 'cusbtn'}
        ]
    });

  
  $( document ).ready(function() {
    var x = $("#alert").val();
    
    if (x=="designAdded"){
    Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Design Successfully Added',
  showConfirmButton: false,
  timer: 1500
});
    }
});
        </script>
 
    </body>
</html>


