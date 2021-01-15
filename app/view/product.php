<?php include '../../commons/session.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../DataTables-1.10.22/css/dataTables.bootstrap4.css"/>
        <link rel="stylesheet" href="../../fontawesome-pro-5.13.0-web/css/all.css">
        <link type="text/css" rel="stylesheet" href="../../css/style.css">

        <?php include_once '../../commons/dbConnection.php'; 
        
        include '../model/module-model.php';
            $moduleObj = new Module();
            $moduleResult=$moduleObj->getAllModules();  
            
        include '../model/product-model.php'; 
            $productObj=new Product();
            $productResult=$productObj->getAllProduct();
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
            <div class="dashbord-body" id="dashbord-body" style="padding: 10px;">
                <div class="row container-fluid">
                    <div class="col-sm-2">
                        <button class="btn" onclick="history.go(-1);"><i style="color: #173F5F;" class="fad fa-arrow-alt-circle-left fa-2x"></i></button>
                    </div>
                    <div class="col-sm-8">
                        <h3 style="text-align: center; margin-bottom: 20px;">Product Management</h3>
                    </div>
                    <div class="col-sm-2">
                        
                    </div>
                </div>
                
                
<!--                <div style="padding: 10px;">
                    <div class="row">
                        <div class="col-12"style="background-color: #f5f6f8;padding: 5px;">
                            <a href="dashboard.php">Dashboard</a> / <a>Product Management</a>
                        </div>
                    </div>
                </div>-->
                <div class="row" style="margin: 0px;">
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
                <div  style="padding: 20px;">
                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-6 mb-2" style="text-align: right">
                            <a href="report-all-product.php" class="btn btn-primary"><i class="far fa-download"></i>&nbsp;Export PDF</a>
                        </div>
                    </div>
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
        <script type="text/javascript" src="../../DataTables-1.10.22/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../../DataTables-1.10.22/js/dataTables.bootstrap4.js"></script>
        <script type="text/javascript" src="../../js/popper1.16.0.js"></script>
        <script type="text/javascript" src="../../js/product-validation.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script>
         $(function(){
    $("#product_tbl").dataTable();
  });
        </script>
 
    </body>
</html>


